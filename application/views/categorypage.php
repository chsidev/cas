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
      <!-- You can change the theme colors from here -->    
      <link href="css/colors/blue.css" id="theme" rel="stylesheet">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->    <!--[if lt IE 9]>    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <body class="fix-header card-no-border">
      <!-- ============================================================== -->    <!-- Preloader - style you can find in spinners.css -->    <!-- ============================================================== -->    
      <div class="preloader">
         <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
         </svg>
      </div>
      <!-- ============================================================== -->    <!-- Main wrapper - style you can find in pages.scss -->    <!-- ============================================================== -->    
      <div id="main-wrapper">
         <?php require_once('header.php'); ?>		<?php require_once('sidebar.php'); ?>        <!-- ============================================================== -->        <!-- Page wrapper  -->        <!-- ============================================================== -->        
         <div class="page-wrapper">
            <!-- ============================================================== -->            <!-- Bread crumb and right sidebar toggle -->            <!-- ============================================================== -->            
            <div class="row page-titles">
               <div class="col-md-5 align-self-center">
                  <h3 class="text-themecolor">Category</h3>
               </div>
               <div class="col-md-7 align-self-center">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                     <li class="breadcrumb-item">pages</li>
                     <li class="breadcrumb-item active">Table basic</li>
                  </ol>
               </div>
            </div>
            <!-- ============================================================== -->            <!-- End Bread crumb and right sidebar toggle -->            <!-- ============================================================== -->            <!-- ============================================================== -->            <!-- Container fluid  -->            <!-- ============================================================== -->            
            <div class="container-fluid">
               <!-- ============================================================== -->                <!-- Start Page Content -->                <!-- ============================================================== -->                
               <div class="row">
                  <div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="form-group">
								<button type="button" class="btn btn-info waves-effect waves-light m-t-10" onclick="javascript:location.href='/newcategory';">Add New Category</button>
							</div>
						</div>
					</div>
                     <div class="card">
                        <div class="card-body">
                           <h4 class="card-title">Categories</h4>
                           <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                           <div class="table-responsive m-t-40">
                              <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                 <thead>
                                    <tr>
                                       <th>№</th>
                                       <th>Category</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
									$i=1;
									foreach($categories as $category) { ?>                                            
                                    <tr>
                                       <td><?php echo $i++; ?></td>
                                       <td><?php echo $category['name']; ?></td>
										<td class="text-nowrap">
											<a href="#" data-toggle="tooltip" data-original-title="Edit" onclick="javascript:edit('<?php echo $category['name'];?>');"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
											<a href="#" data-toggle="tooltip" data-original-title="Close" onclick="javascript:del(<?php echo $category['id'];?>);"> <i class="fa fa-close text-danger"></i> </a>
										</td>
                                    </tr>
                                    <?php } ?>                                        
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- ============================================================== -->                <!-- End PAge Content -->                <!-- ============================================================== -->            
            </div>
            <!-- ============================================================== -->            <!-- End Container fluid  -->            <!-- ============================================================== -->            
			<?php require_once('footer.php'); ?>        
         </div>
         <!-- ============================================================== -->        <!-- End Page wrapper  -->        <!-- ============================================================== -->    
      </div>
      <!-- ============================================================== -->    <!-- End Wrapper -->    <!-- ============================================================== -->    <!-- ============================================================== -->    <!-- All Jquery -->    <!-- ============================================================== -->    <script src="../assets/plugins/jquery/jquery.min.js"></script>    <!-- Bootstrap tether Core JavaScript -->    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>    <!-- slimscrollbar scrollbar JavaScript -->    <script src="js/jquery.slimscroll.js"></script>    <!--Wave Effects -->    <script src="js/waves.js"></script>    <!--Menu sidebar -->    <script src="js/sidebarmenu.js"></script>    <!--stickey kit -->    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>    <!--Custom JavaScript -->    <script src="js/custom.min.js"></script>    <!-- This is data table -->    <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>    <!-- start - This is for export functionality only -->    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>    <!-- end - This is for export functionality only -->    <script>    $(document).ready(function() {	    $('#example23').DataTable({			dom: 'Bfrtip',			buttons: [				'copy', 'csv', 'excel', 'pdf', 'print'			]		});    });      </script>    <!-- ============================================================== -->    <!-- Style switcher -->    <!-- ============================================================== -->
	  <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
	  <script>
	  function edit(i) {
		  location.href = '/newcategory?n='+i;
	  }
	  function del(i) {
		  $.post('/category/del',{i:i},function(){
			  location.reload();
		  });
	  }
	  </script>
   </body>
</html># Change 0 on 2019-08-11
# Change 0 on 2019-08-15
# Change 0 on 2019-08-24
# Change 2 on 2019-09-05
# Change 1 on 2019-09-04
# Change 0 on 2019-10-30
# Change 1 on 2019-10-30
# Change 0 on 2019-11-29
# Change 2 on 2019-11-29
# Change 0 on 2019-12-06
# Change 2 on 2019-12-25
# Change 2 on 2020-04-25
# Change 1 on 2020-05-17
# Change 0 on 2020-07-02
# Change 3 on 2020-07-17
# Change 0 on 2020-07-18
# Change 0 on 2020-08-02
# Change 1 on 2020-08-06
