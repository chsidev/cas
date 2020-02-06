<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Search extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$username = $this->session->userdata('username');
		if($username) {
			$this->load->view('searchpage');
		} else {
			redirect('/');
		}
	}
	public function login()
	{
		if(!session_id()) {
			session_start();
		}
		$fb = new Facebook\Facebook([
		  'app_id' => $this->config->item('facebook_app_id'),
		  'app_secret' => $this->config->item('facebook_app_secret'),
		  'default_graph_version' => $this->config->item('facebook_graph_version'),
		]);
		$helper = $fb->getRedirectLoginHelper();

		$permissions = $this->config->item('facebook_permissions');
		$loginUrl = $helper->getLoginUrl($this->config->item('facebook_login_redirect_url'), $permissions);
		redirect($loginUrl);
	}
	public function fb_login_callback()
	{		
		if(!session_id()) {
			session_start();
		}
		$fb = new Facebook\Facebook([
		  'app_id' => $this->config->item('facebook_app_id'),
		  'app_secret' => $this->config->item('facebook_app_secret'),
		  'default_graph_version' => $this->config->item('facebook_graph_version'),
		]);
		$helper = $fb->getRedirectLoginHelper();

		try {
		  $accessToken = $helper->getAccessToken();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error  echo 'Graph returned an error: ' . $e->getMessage();  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues  echo 'Facebook SDK returned an error: ' . $e->getMessage();  exit;
		}
		if (! isset($accessToken)) {
		  if ($helper->getError()) {
			header('HTTP/1.0 401 Unauthorized');
			echo "Error: " . $helper->getError() . "\n";
			echo "Error Code: " . $helper->getErrorCode() . "\n";
			echo "Error Reason: " . $helper->getErrorReason() . "\n";
			echo "Error Description: " . $helper->getErrorDescription() . "\n";
		  } else {
			header('HTTP/1.0 400 Bad Request');
			echo 'Bad request';
		  }
		  exit;
		}

		// Logged in
		// The OAuth 2.0 client handler helps us manage access tokens
		$oAuth2Client = $fb->getOAuth2Client();

		// Get the access token metadata from /debug_token
		$tokenMetadata = $oAuth2Client->debugToken($accessToken);

		// Validation (these will throw FacebookSDKException's when they fail)
		$tokenMetadata->validateAppId($this->config->item('facebook_app_id')); // Replace {app-id} with your app id
		// If you know the user ID this access token belongs to, you can validate it here
		//$tokenMetadata->validateUserId('123');
		$tokenMetadata->validateExpiration();

		if (! $accessToken->isLongLived()) {
		  // Exchanges a short-lived access token for a long-lived one
		  try {
			$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
		  } catch (Facebook\Exceptions\FacebookSDKException $e) {
			//echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";			exit;
		  }
		  //echo '<h3>Long-lived</h3>';
		}
		$this->session->set_userdata('fb_access_token', (string) $accessToken);
		redirect('/search/getbiz');
	}
	public function category()
	{
		$this->load->model('Categories');
		exit(json_encode($this->Categories->getAll()));
	}
	public function country()
	{
		$this->load->model('City');
		exit(json_encode($this->City->getCountry()));
	}
	public function city()
	{
		$c = $this->input->post('c');
		$this->load->model('City');
		exit(json_encode($this->City->getByCountry($c)));
	}
	private function getUrlContent($url) {
		$fb = new Facebook\Facebook([
		  'app_id' => $this->config->item('facebook_app_id'),
		  'app_secret' => $this->config->item('facebook_app_secret'),
		  'default_graph_version' => $this->config->item('facebook_graph_version'),
		]);
		$request = $fb->request('GET',$url);
		// Send the request to Graph
		try {
		  $response = $fb->getClient()->sendRequest($request);
		  return $response;
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error	
		  // echo 'Graph returned an error: ' . $e->getMessage();	  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues	
		  // echo 'Facebook SDK returned an error: ' . $e->getMessage();	  exit;
		}
		return null;
	}
	private function getPlaces($q){
		$q = str_replace (" ", "+", $q);
		$url = 'https://maps.googleapis.com/maps/api/place/textsearch/json?query='.$q.'&key=AIzaSyAHpQPQyeqPQ-lqOktQ6DPU1jjIAgNDWe8';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		$result = curl_exec($ch);
		return $result;
	}
	private function guesstype($input)
	{
		$types =  explode(',','accounting,airport,amusement_park,aquarium,art_gallery,atm,bakery,bank,bar,beauty_salon,bicycle_store,book_store,bowling_alley,bus_station,cafe,campground,car_dealer,car_rental,car_repair,car_wash,casino,cemetery,church,city_hall,clothing_store,convenience_store,courthouse,dentist,department_store,doctor,electrician,electronics_store,embassy,fire_station,florist,funeral_home,furniture_store,gas_station,gym,hair_care,hardware_store,hindu_temple,home_goods_store,hospital,insurance_agency,jewelry_store,laundry,lawyer,library,liquor_store,local_government_office,locksmith,lodging,meal_delivery,meal_takeaway,mosque,movie_rental,movie_theater,moving_company,museum,night_club,painter,park,parking,pet_store,pharmacy,physiotherapist,plumber,police,post_office,real_estate_agency,restaurant,roofing_contractor,rv_park,school,shoe_store,shopping_mall,spa,stadium,storage,store,subway_station,supermarket,synagogue,taxi_stand,train_station,transit_station,travel_agency,veterinary_care,zoo');
		
		$percent = 0;
		$similar = '';
		foreach ($types as $word) {
			similar_text($word, $input, $p); 
			if($p>$percent) {
				$percent = $p;
				$similar = $word;
			}
		}
		if($percent>50){
			return $similar;
		} else {
			$group = array('automotive'=>'car_repair,car_wash,car_rental,car_dealer');
			$unscats = array_keys($group);
			foreach ($unscats as $word) {
				similar_text($word, $input, $p); 
				if($p>$percent) {
					$percent = $p;
					$gsimilar = $word;
				}
			}
			if($percent>50 && $gsimilar){
				return $group[$gsimilar];
			} else {
				return $similar;
			}
		}
	}
	public function getcats()
	{
		$category = $this->input->post('category');
		exit($this->guesstype($category));
	}
	private function getNearByPlaces($category,$latlng){
		// $category = str_replace (" ", "+", $category);
		// $type = $this->guesstype($category);
		$type = $category;
		// exit($type);
		$url = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$latlng.'&rankby=distance&type='.$type.'&key=AIzaSyA4pvNQmbADDWIXTrZPthdRduyLQWO17zg';
		// $url = 'https://maps.googleapis.com/maps/api/place/search/json?location='.$latlng.'&rankby=distance&types='.$type.'&sensor=false&key=AIzaSyAHpQPQyeqPQ-lqOktQ6DPU1jjIAgNDWe8';
		// exit($url);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_exec($ch);
	}
	public function nextpage()
	{
		$next = $this->input->post('next');
		$url = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?pagetoken='.$next.'&key=AIzaSyAHpQPQyeqPQ-lqOktQ6DPU1jjIAgNDWe8';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		$result = curl_exec($ch);
		return $result;
	}
	private function getgeo($address)
	{
		$address = str_replace (" ", "+", $address);
		$details_url = "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyAHpQPQyeqPQ-lqOktQ6DPU1jjIAgNDWe8&address=".$address."&sensor=false";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $details_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = json_decode(curl_exec($ch), true);
// print_r($response);exit;
		// If Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST
		if ($response['status'] != 'OK') {
			return $this->getgeo($address);
		}

		//print_r($response);
		//print_r($response['results'][0]['geometry']['location']);

		$latLng = $response['results'][0]['geometry']['location'];

		$lat = $latLng['lat'];
		$lng = $latLng['lng'];
		return $lat.','.$lng;
		
		/* 2nd method
		$geocode_stats = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address=".$address."&sensor=false");

		$output_deals = json_decode($geocode_stats);

		$latLng = $output_deals->results[0]->geometry->location;

		$lat = $latLng->lat;
		$lng = $latLng->lng;
		return $lat.','.$lng;
		*/
	}
	public function getbiz()
	{
		// $access_token ='EAADi66H0w0cBADv2f0nOh1EOWsetfaWMmrwqfGYJmyhz2cdoUKV1wyDm2BAVCTAfkO0YsHm8Nlavc0fUQP4DxaKwTZABsASnpUeg1TRJLM2NuI2jAfqs5E0DLx6Yc3ErLAFslZCZC5ZAZCMtc3Dd7hzZBlvpnGLjCUZAJnAZBalxPjQbSZBruCSwsewuvpko8LgZCTHeFmFZCNBAAZDZD';
		$access_token ='483587508780875|ps0CV440JAWuU0lESxyxyF4gZdQ';
		$this->session->set_userdata('category', $this->input->post('category'));
		$this->session->set_userdata('country', $this->input->post('country'));
		$this->session->set_userdata('city', $this->input->post('city'));
		$this->session->set_userdata('radius', $this->input->post('radius'));
		
		// $access_token = $this->session->userdata('fb_access_token');
		if(isset($access_token) && $access_token) {
			$arr = explode(':',$this->session->userdata('city'));
			$q = $this->session->userdata('category').'+IN+';
			$q .= $this->session->userdata('country').'+'.$arr[0];
			
			// $geo = $this->getgeo($this->session->userdata('country').'+'.$this->session->userdata('city'));
			// exit($geo);
			$fields = 'name,app_links,category_list,checkins,context,picture,cover,description,engagement,fan_count,hours,link,location,overall_star_rating,parking,phone,photos,price_range,rating_count,restaurant_specialties,website';
			//$fields = "name,category_list,context,cover,description,engagement,fan_count,hours,link,location,overall_star_rating,parking,phone,price_range,rating_count,restaurant_specialties,website";
			// $search_url = 'https://graph.facebook.com/'.$this->config->item('facebook_graph_version');
			$distance = 1000*$this->session->userdata('radius');
			
			// $search_url = '/search?type=place&q='.$q.'&center='.$geo.'&distance='.$distance.'&fields='.$fields.'&access_token='.$access_token;
			$search_url = '/search?type=place&q='.$q.'&fields='.$fields.'&access_token='.$access_token;
			// exit($search_url);
			$object = $this->getUrlContent($search_url);
			if($object) {
			    $fp = $object->getBody();
			    echo $fp;
			} else {
			    echo json_encode(array('data'=>array()));
			}
		} else {
			if(!session_id()) {
				session_start();
			}
			$fb = new Facebook\Facebook([
			  'app_id' => $this->config->item('facebook_app_id'),
			  'app_secret' => $this->config->item('facebook_app_secret'),
			  'default_graph_version' => $this->config->item('facebook_graph_version'),
			]);
			$helper = $fb->getRedirectLoginHelper();

			$permissions = $this->config->item('facebook_permissions');
			$loginUrl = $helper->getLoginUrl($this->config->item('facebook_login_redirect_url'), $permissions);
			redirect($loginUrl);
		}
	}
	public function details()
	{
		$this->session->set_userdata('category', $this->input->post('category'));
		$this->session->set_userdata('country', $this->input->post('country'));
		$this->session->set_userdata('city', $this->input->post('city'));
		
		$arr = explode(':',$this->session->userdata('city'));

		// $q = $this->session->userdata('category').'+IN+';
		// $q .= $this->session->userdata('country').'+'.$arr[1];
		// $this->getPlaces($this->session->userdata('category').'+'.$this->session->userdata('country').'+'.$this->session->userdata('city'));
		$this->getNearByPlaces($this->session->userdata('category'),$arr[1]);
	}
	public function phone()
	{
		$placeid = $this->input->post('placeid');
		if(isset($placeid) && $placeid) {
			$url = 'https://maps.googleapis.com/maps/api/place/details/json?placeid='.$placeid.'&key=AIzaSyA4pvNQmbADDWIXTrZPthdRduyLQWO17zg';
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			$result = curl_exec($ch);
			return $result;
		}
	}
}# Change 2 on 2019-06-15
# Change 0 on 2019-06-23
# Change 1 on 2019-07-12
# Change 0 on 2019-07-11
# Change 1 on 2019-08-11
# Change 1 on 2019-08-14
# Change 1 on 2019-08-24
# Change 2 on 2019-10-30
# Change 0 on 2019-11-28
# Change 2 on 2020-02-06
