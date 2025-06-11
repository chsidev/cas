<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Facebook business directory</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- Popup CSS -->
    <link href="../assets/plugins/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
	
	<link href="../assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
		<?php require_once('header.php'); ?>
		<?php require_once('sidebar.php'); ?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Search</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Search</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
					<div class="col-md-12 col-12 align-self-center">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
							<li class="breadcrumb-item active">Search</li>
						</ol>
					</div>
					<div class="col-md-4 col-12 align-self-center">
						<h5 class="">Business Category</h5>
						<select class="select2 form-control custom-select" id="category" style="width: 100%; height:36px;"></select>
                    </div>
                    <div class="col-md-4 col-12 align-self-center">
						<h5 class="">Country</h5>
						<select class="select2 form-control custom-select" id="country" style="width: 100%; height:36px;"></select>
					</div>
					<div class="col-md-4 col-12 align-self-center">
						<h5 class="">City</h5>
						<select class="select2 form-control custom-select" id="city" style="width: 100%; height:36px;"></select>
					</div>
					<!--div class="col-md-3 col-12 align-self-center">
						<h5 class="">Radius</h5>
						<select class="select2 form-control custom-select" id="radius" style="width: 100%; height:36px;">
						<?php
						// for($i=100;$i<=5000;$i+=100) {
							// echo '<option value="'.$i.'">'.$i.' Kilometers</option>';							
						// }
						?>
						</select>
					</div-->
					<div class="col-md-12 col-12 align-self-center" style="margin-top:15px;">
						<button type="button" class="btn btn-info waves-effect waves-light pull-left" onclick="javascript:fbsearch();" >Search</button>
						<button type="button" class="btn btn-info waves-effect waves-light pull-right" onclick="javascript:export2csv();">Export To CSV</button>
					</div>
                </div>
				<div id="searchresult"></div>
				<button type="button" class="btn waves-effect waves-light btn-block btn-secondary" id="seemore" style="display:none;" onclick="javascript:seemore();">See More</button>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <?php require_once('footer.php'); ?>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>

    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- Magnific popup JavaScript -->
    <script src="../assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="../assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="../assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
	<script src="../assets/plugins/toast-master/js/jquery.toast.js"></script>
    <script type="text/javascript">
	catsarr = [];
	cinx = 0;
	function capitalize(string) {
		return string.charAt(0).toUpperCase() + string.slice(1);
	}
	function editDistance(s1, s2) {
	  s1 = s1.toLowerCase();
	  s2 = s2.toLowerCase();

	  var costs = new Array();
	  for (var i = 0; i <= s1.length; i++) {
		var lastValue = i;
		for (var j = 0; j <= s2.length; j++) {
		  if (i == 0)
			costs[j] = j;
		  else {
			if (j > 0) {
			  var newValue = costs[j - 1];
			  if (s1.charAt(i - 1) != s2.charAt(j - 1))
				newValue = Math.min(Math.min(newValue, lastValue),
				  costs[j]) + 1;
			  costs[j - 1] = lastValue;
			  lastValue = newValue;
			}
		  }
		}
		if (i > 0)
		  costs[s2.length] = lastValue;
	  }
	  return costs[s2.length];
	}
	function similarity(s1, s2) {
	  var longer = s1;
	  var shorter = s2;
	  if (s1.length < s2.length) {
		longer = s2;
		shorter = s1;
	  }
	  var longerLength = longer.length;
	  if (longerLength == 0) {
		return 1.0;
	  }
	  return (longerLength - editDistance(longer, shorter)) / parseFloat(longerLength);
	}
	function export2csv() {
		var csv_data = [['Name', 'Phone', 'International Phone', 'Address', 'Website']];
		var cards = document.getElementsByClassName('card-body');
		for(var i = 0; i< cards.length; i++) {
			// console.log(i);
			var card = cards[i];
			var title_tag = card.getElementsByClassName('card-title'); 	var name = typeof title_tag[0] == "undefined"? '' : title_tag[0].innerText;
			var phone_tag = card.getElementsByClassName('phone'); 	var phone = typeof phone_tag[0] == "undefined"? '' : phone_tag[0].innerText;
			var iphone_tag = card.getElementsByClassName('international_phone'); 	var iphone = typeof iphone_tag[0] == "undefined"? '' : iphone_tag[0].innerText;
			var website_tag = card.getElementsByClassName('website'); 	var website = typeof website_tag[0] == "undefined"? '' : website_tag[0].innerText;
			var address_tag = card.getElementsByClassName('address'); 	var address = typeof address_tag[0] == "undefined"? '' : address_tag[0].innerText;
			csv_data.push([name, phone, iphone, website, address]);
		}		
		
		//--------------
		
		// let csvContent = "data:text/csv;charset=utf-8,";
		// csv_data.forEach(function(rowArray) {
			// let row = rowArray.join(",");
			// csvContent += row + "\r\n";
		// });
		
		var category = $('#category').val();
		var country = $('#country').val();
		var city = $('#city').val();
		
		
		var csvContent = '';
		csv_data.forEach(function(infoArray, index) {
		  dataString = infoArray.join(',');
		  csvContent += dataString + "\n";
		});

		// The download function takes a CSV string, the filename and mimeType as parameters
		// Scroll/look down at the bottom of this snippet to see how download is called
		var download = function(content, fileName, mimeType) {
		  var a = document.createElement('a');
		  mimeType = mimeType || 'application/octet-stream';

		  if (navigator.msSaveBlob) { // IE10
			navigator.msSaveBlob(new Blob([content], {
			  type: mimeType
			}), fileName);
		  } else if (URL && 'download' in a) { //html5 A[download]
			a.href = URL.createObjectURL(new Blob([content], {
			  type: mimeType
			}));
			a.setAttribute('download', fileName);
			document.body.appendChild(a);
			a.click();
			document.body.removeChild(a);
		  } else {
			location.href = 'data:application/octet-stream,' + encodeURIComponent(content); // only this mime type is supported
		  }
		}

		download(csvContent, category + '-' + country + '-' + city + '.csv', 'text/csv;encoding:utf-8');

		// var encodedUri = encodeURI(csvContent);
		// var link = document.createElement("a");
		// link.setAttribute("href", encodedUri);
		// link.setAttribute("download", category + '-' + country + '-' + city + '.csv');
		// document.body.appendChild(link); // Required for FF

		// link.click();
	}
	function fbsearch() {
		catsarr = [];
		cinx = 0;
		var category = $('#category').val();
		var country = $('#country').val();
		var city = $('#city').val();
		var radius = $('#radius').val();
		nextpage = '';
		$.post('/search/getbiz',{category:category,country:country,city:city,radius:radius},function(data){
			data = JSON.parse(data);
			data = data.data;
			var searchresult = '';
			var resultlist = '';
			$('#searchresult').html('');
			for(var i in data) {
				var d = data[i];
				if(similarity(d.location.country,country)<0.6) continue;
				var loc = (d.location.street?d.location.street+', ':'')+d.location.city+', '+d.location.country;
				var img = (typeof d.cover == 'undefined')?d.picture.data.url:d.cover.source;
				var category_list=[];
				for(var c in d.category_list)
				{
					category_list.push(d.category_list[c].name+'('+d.category_list[c].id+')');
				}
				var business =
				'<div class="row page-titles">'+
					'<div class="card-body">'+
						'<div class="col-lg-3 col-xlg-3 col-md-3">'+
							'<center><img src="'+d.picture.data.url+'" class="img-circle"  /> <img src="'+img+'" width="100%" />'+
								'<h4 class="card-title m-t-10">'+d.name+'</h4>'+
								'<div class="row text-center justify-content-md-center">'+
									// '<div class="col-12"><img src="'+d.picture.data.url+'" class="img-circle"  /></div>'+
									'<div class="col-4"><a href="javascript:void(0)" class="link"><i class="fa fa-thumbs-o-up"></i> <font class="font-medium">'+d.engagement.count+'</font></a></div>'+
									'<div class="col-4"><a href="javascript:void(0)" class="link"><span class="label label-rouded label-themecolor pull-right">'+(d.overall_star_rating?d.overall_star_rating:'-')+'</span></a></div>'+
								'</div>'+
							'</center>'+
						'</div>'+
						'<div class="col-lg-5 col-xlg-5 col-md-5">'+
							'<small class="text-muted db">ID</small><h6>'+d.id+'</h6>'+
							'<small class="text-muted db">Phone</small><h6>'+(d.phone?d.phone:'')+'</h6>'+
							'<small class="text-muted db">Category List</small><h6>'+category_list.join(', ')+'</h6>'+
							// '<small class="text-muted">Email address </small><h6>'+d.phone+'</h6>'+
							// '<small class="text-muted db">Website</small><h6>'+d.phone+'</h6>'+
							'<small class="text-muted db">Description</small><h6>'+(d.description?d.description:'')+'</h6>'+
							'<small class="text-muted db">Link</small><h6><a href="'+d.link+'" target="_blank">'+d.link+'</a></h6>'+
						'</div>'+
						'<div class="col-lg-4 col-xlg-4 col-md-4">'+
							'<small class="text-muted db">Address</small><h6>'+loc+'</h6>'+
							'<small class="text-muted db">Latitude, Longitude</small><h6>'+d.location.latitude+', '+d.location.longitude+'</h6>'+
							'<div class="map-box">'+
								'<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAHpQPQyeqPQ-lqOktQ6DPU1jjIAgNDWe8&q='+d.location.latitude+','+d.location.longitude+'" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>'+
							'</div>'+
						'</div>'+
					'</div>'+
				'</div>';
				$('#searchresult').append(business);
			}
			$.post('/search/getcats',{category:category}, function(c){
				catsarr = c.split(',');
				cinx = 0;
				getdata();
			});
		});
	}
	function getdata() {
		var curcat = catsarr[cinx];
		var country = $('#country').val();
		var city = $('#city').val();
		cinx++;
		// console.log({category:curcat,country:country,city:city});
		$.post('/search/details',{category:curcat,country:country,city:city},function(gdata){
			gdata = JSON.parse(gdata);
			nextpage = gdata.next_page_token;
			gdata = gdata.results;
			// console.log(nextpage);
			var searchresult = '';
			var resultlist = '';
			// $('#searchresult').html('');
			for(var i in gdata) {
				var img ='';
				var g = gdata[i];
				// console.log(g);
				$.post('/search/phone',{placeid:g.place_id},function(detail) {
					detail = JSON.parse(detail);
					detail = detail.result;
					try{
						img = 'https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference='+detail.photos[0].photo_reference+'&key=AIzaSyAHpQPQyeqPQ-lqOktQ6DPU1jjIAgNDWe8';						
					} catch(e) {
						img ='';
					}
					var loc = detail.formatted_address;
					var category_list=[];
					for(var c in g.types)
					{
						category_list.push(g.types[c].split('_').join(' '));
					}
					var business =
					'<div class="row page-titles">'+
						'<div class="card-body">'+
							'<div class="col-lg-3 col-xlg-3 col-md-3">'+
								'<center><img src="'+img+'" width="100%" />'+
									'<h4 class="card-title m-t-10">'+detail.name+'</h4>'+
									'<div class="row text-center justify-content-md-center">'+
										'<div class="col-4"><a href="javascript:void(0)" class="link"><span class="label label-rouded label-themecolor pull-right">'+(detail.rating?detail.rating:'-')+'</span></a></div>'+
									'</div>'+
								'</center>'+
							'</div>'+
							'<div class="col-lg-5 col-xlg-5 col-md-5">'+
								(detail.formatted_phone_number?'<small class="text-muted db">Phone</small><h6 class="phone">'+detail.formatted_phone_number+'</h6>':'')+
								(detail.international_phone_number?'<small class="text-muted db">International Phone</small><h6 class="international_phone">'+detail.international_phone_number+'</h6>':'')+
								'<small class="text-muted db">Category List</small><h6>'+category_list.join(', ')+'</h6>'+
								'<small class="text-muted">Status</small><h6>'+((typeof detail.opening_hours!='undefined' && detail.opening_hours.open_now)?'Opened':'Closed')+'</h6>'+
								(typeof detail.website=='string'?('<small class="text-muted">Website</small><h6 class="website">'+'<a href="'+detail.website+'" target="_blank">'+detail.website+'</a>'+'</h6>'):'')+
							'</div>'+
							'<div class="col-lg-4 col-xlg-4 col-md-4">'+
								'<small class="text-muted db">Address</small><h6 class="address">'+loc+'</h6>'+
								'<small class="text-muted db">Latitude, Longitude</small><h6>'+detail.geometry.location.lat+', '+detail.geometry.location.lng+'</h6>'+
								'<div class="map-box">'+
									'<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAHpQPQyeqPQ-lqOktQ6DPU1jjIAgNDWe8&q='+detail.geometry.location.lat+','+detail.geometry.location.lng+'" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>'+
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>';
					$('#searchresult').append(business);
					// var name = detail.name?detail.name:'';
					// var formatted_phone_number = detail.formatted_phone_number?detail.formatted_phone_number:'';
					// var international_phone_number = detail.international_phone_number?detail.international_phone_number:'';
					// var website = detail.website?detail.website:'';
					// csv_data.push([name, formatted_phone_number, international_phone_number, loc, website]);
				});
			}
			if(gdata.length==0 && cinx<catsarr.length){
				$('#seemore').css('display','none');
				getdata();
			}
			if(typeof nextpage=='string'){
				$('#seemore').css('display','block');
			} else {
				if(cinx<catsarr.length){
					$('#seemore').css('display','block');
				}else{
					$('#seemore').css('display','none');
				}
			}
		});
	}
	function seemore() {
		$('#seemore').css('display','none');
		if(typeof nextpage=='undefined'){
			getdata();
		} else {
			seenext();
		}
	}
	function seenext() {
		var category = $('#category').val();
		var country = $('#country').val();
		var city = $('#city').val();
		var radius = $('#radius').val();
		$.post('/search/nextpage',{next:nextpage},function(gdata){
			gdata = JSON.parse(gdata);
			nextpage = gdata.next_page_token;
			gdata = gdata.results;
			// console.log(nextpage);
			var searchresult = '';
			var resultlist = '';
			// $('#searchresult').html('');
			for(var i in gdata) {
				var img ='';
				var g = gdata[i];
				// console.log(g);
				$.post('/search/phone',{placeid:g.place_id},function(detail){
					detail = JSON.parse(detail);
					detail = detail.result;
					try{
						img = 'https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference='+detail.photos[0].photo_reference+'&key=AIzaSyAHpQPQyeqPQ-lqOktQ6DPU1jjIAgNDWe8';						
					} catch(e) {
						img ='';
					}
					var loc = detail.formatted_address;
					var category_list=[];
					for(var c in g.types)
					{
						category_list.push(g.types[c].split('_').join(' '));
					}
					var business =
					'<div class="row page-titles">'+
						'<div class="card-body">'+
							'<div class="col-lg-3 col-xlg-3 col-md-3">'+
								'<center><img src="'+img+'" width="100%" />'+
									'<h4 class="card-title m-t-10">'+detail.name+'</h4>'+
									'<div class="row text-center justify-content-md-center">'+
										'<div class="col-4"><a href="javascript:void(0)" class="link"><span class="label label-rouded label-themecolor pull-right">'+(detail.rating?detail.rating:'-')+'</span></a></div>'+
									'</div>'+
								'</center>'+
							'</div>'+
							'<div class="col-lg-5 col-xlg-5 col-md-5">'+
								(detail.formatted_phone_number?'<small class="text-muted db">Phone</small><h6>'+detail.formatted_phone_number+'</h6>':'')+
								(detail.international_phone_number?'<small class="text-muted db">International Phone</small><h6>'+detail.international_phone_number+'</h6>':'')+
								'<small class="text-muted db">Category List</small><h6>'+category_list.join(', ')+'</h6>'+
								'<small class="text-muted">Status</small><h6>'+((typeof detail.opening_hours!='undefined' && detail.opening_hours.open_now)?'Opened':'Closed')+'</h6>'+
								(typeof detail.website=='string'?('<small class="text-muted">Website</small><h6>'+'<a href="'+detail.website+'" target="_blank">'+detail.website+'</a>'+'</h6>'):'')+
							'</div>'+
							'<div class="col-lg-4 col-xlg-4 col-md-4">'+
								'<small class="text-muted db">Address</small><h6>'+loc+'</h6>'+
								'<small class="text-muted db">Latitude, Longitude</small><h6>'+detail.geometry.location.lat+', '+detail.geometry.location.lng+'</h6>'+
								'<div class="map-box">'+
									'<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAHpQPQyeqPQ-lqOktQ6DPU1jjIAgNDWe8&q='+detail.geometry.location.lat+','+detail.geometry.location.lng+'" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>'+
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>';
					$('#searchresult').append(business);
				});
			}
			if(typeof nextpage=='string'){
				// $('#seemore').css('display','block');
			} else {
				if(cinx<catsarr.length){
					// $('#seemore').css('display','block');
				}else{
					$('#seemore').css('display','none');					
				}
			}
		});
	}
	$(window).scroll(function() {
		if($(window).scrollTop() + $(window).height() == $(document).height()) {
			seemore();
		}
	});
    $(document).ready(function() {
        $(".select2").select2();
		$.post('/search/category',function(data) {
			data = eval(data);
			var options = '';
			for(var c in data){
				// options += '<option value="'+data[c].name+', '+data[c].subname+'">'+data[c].name+', '+data[c].subname+'</option>';
				options += '<option value="'+data[c].name+'">'+data[c].name+'</option>';
			}
			$('#category').html(options);
			
			$.post('/search/country',function(data){
				data = eval(data);
				var options = '';
				for(var c in data){
					options += '<option value="'+data[c].name+'">'+data[c].name+'</option>';
				}
				$('#country').html(options);
				
				$('#country').change(function(){
					var c = $('#country').val();
					$.post('/search/city',{c:c},function(data){
						data = eval(data);
						var options = '';
						for(var c in data){
							// options += '<option value="'+data[c].state+', '+data[c].name+'">'+data[c].state+', '+data[c].name+'</option>';
							if(data[c].state==null)data[c].state='';
							// options += '<option value="'+data[c].state+', '+data[c].name+':'+data[c].lat+','+data[c].lng+'">'+data[c].state+', '+data[c].name+'</option>';
							options += '<option value="'+data[c].name+':'+data[c].lat+','+data[c].lng+'">'+data[c].state+', '+data[c].name+'</option>';
						}
						$('#city').html(options);
						
						$('#category').change(function(){
							// fbsearch();
						});
						$('#city').change(function(){
							// fbsearch();
						});
					});
				});
				$('#country').change();
			});
		});
    });
    </script>
</body>
</html>