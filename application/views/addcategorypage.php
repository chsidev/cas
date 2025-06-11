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
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
</head>
<body class="fix-header card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
		<?php require_once('header.php'); ?>
		<?php require_once('sidebar.php'); ?>
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><?php echo isset($_GET['n'])?'Edit Category':'New Category'; ?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"<?php echo isset($_GET['n'])?'Edit Category':'Add Category'; ?>></li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo isset($_GET['n'])?'Edit Category':'Add New Category'; ?></h4>
                                <form class="form-material m-t-40">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" class="form-control form-control-line" id="name" value="<?php echo isset($_GET['n'])?$_GET['n']:''; ?>" placeholder="Please input category name." required>
									</div>
									<div class="form-group">
										<button type="button" class="btn btn-info waves-effect waves-light m-t-10" onclick="javascript:<?php echo isset($_GET['n'])?'editcategory()':'addcategory()'; ?>;"><?php echo isset($_GET['n'])?'Save':'Add'; ?></button>
									</div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <?php require_once('footer.php'); ?>
        </div>
    </div>
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
    <script src="js/jasny-bootstrap.js"></script>
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
	<script>
	oldcat = "<?php echo isset($_GET['n'])?$_GET['n']:'';?>";
	function addcategory()
	{
		var name = $('#name').val();
		$.post('/newcategory/save',{name:name},function(data){
			if(data=='s'){
				alert('New category has been added successfully!');
			}else if(data=='f'){
				alert('Category Name already exists.');
			}
		});
	}
	function editcategory()
	{
		if(!oldcat) return;
		var name = $('#name').val();
		$.post('/newcategory/edit',{name:name,old:oldcat},function(data){
			if(data=='s'){
				alert('Category Name has been updated!');
				location.href = '/category';
			}
		});
	}
	</script>
</body>
</html>