<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.7.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Mb | PMS</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<script src="<?php echo base_url().'assets/livecss.js'?>" type="text/javascript"></script>
<?php $this->load->view('include/css');?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- <link href="<?php echo base_url().'assets/global/plugins/datatables/datatables.min.css'?>" rel="stylesheet" type="text/css" /> -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css'?>"/>
<!-- END PAGE LEVEL PLUGINS -->
</head>
<style>
.form-horizontal .control-label {
    /*text-align: left;*/
}
</style>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content  page-sidebar-closed">
<!-- BEGIN HEADER -->
<?php $this->load->view('include/header'); ?>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
<?php $this->load->view('include/slidebar');?>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<?php
			if(isset($_SESSION['username']) && $_SESSION['division']=='marketing'){
				?>
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
				Project Management System<br><small> PT PRAKARSALANGGENG MAJUBERSAMA</small>
			</h3>
			<div class="page-bar">
			</div>
			<!-- END PAGE HEADER-->

			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet light bordered ">
						<div class="portlet-title">
							<div class="caption font-green-haze">
								<i class="icon-settings font-green-haze"></i>
								<span class="caption-subject bold uppercase"> List Order ID MB</span>
							</div>
							<div class="actions">
								<!-- <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
								</a> -->
							</div>
						</div>
						<div class="portlet-body">
							<!-- ./form body -->
						<hr>
						</div>
						<div class="portlet-body table-responsive">
							<!-- BEGIN TABLE -->
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											<a href="<?php echo site_url().'marketing/input_customer'?>" id="sample_editable_1_new" class="btn green">
											Add New <i class="fa fa-plus"></i>
										</a>
										</div>
									</div>
									<div class="col-md-6">
										<!-- <div class="btn-group pull-right">
											<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="javascript:;">
													Print </a>
												</li>
												<li>
													<a href="javascript:;">
													Save as PDF </a>
												</li>
												<li>
													<a href="javascript:;">
													Export to Excel </a>
												</li>
											</ul>
										</div> -->
									</div>
								</div>
							</div>
							<table  id="table-filter" class="table table-bordered table-hover ">
							</table>
						</div>
						<!-- /END BODY PORTLET -->
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
<!-- END CONTENT -->
<?php } else {
	echo "You dont have an Access to this page!!";
}?>
<!-- BEGIN QUICK SIDEBAR -->
<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php $this->load->view('include/footer');?>

<!-- END FOOTER -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../survey/assets/global/plugins/respond.min.js"></script>
<script src="../../survey/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<?php $this->load->view('include/js');?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url().'assets/global/plugins/datatables/media/js/jquery.dataTables.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js'?>"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url().'assets/admin/pages/scripts/form-samples.js'?>"></script>
<script>
var $table='';
	jQuery(document).ready(function() {
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	QuickSidebar.init(); // init quick sidebar
	Demo.init(); // init demo features
	FormSamples.init();

	$('.datepicker').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd',
	});
	$('#customer').addClass('active open');
	$('#list-customer').parent().addClass('active');

	//dataTables
		// var url='<?php echo site_url().'/marketing/get_sppr'?>';
		// 	$table=$('#table_sppr').DataTable( {
		// 	"ajax":
		// 	{
		// 			"url": url,
		// 			"type": "POST",
		// 			"retrieve": true,
		// 			keys: true,
		// 	},
		// });
	});
	get_list_customer();

function get_list_customer()
{
	Metronic.startPageLoading({animate: true});
	// ajax adding data to database
	var formData = new FormData($("form#form-filter")[0]);
	$.ajax({
		url: "<?php echo site_url('marketing/get_customer'); ?>", //get data from controller and db
		type: 'POST',
		data: formData,
		dataType: "JSON",
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function(data) {
			Metronic.stopPageLoading();
			var table='';
				table=$('#table-filter').dataTable( {
					"bDestroy": true,
					data: data.data,
	        columns: [
	            { title: "ID Customer" },
	            { title: "Name Customer" },
	            { title: "Order ID" },
	            { title: "NO PO" },
	            { title: "Date PO" },
							// { title: "Detail Project" },
              // { title: "Action" }
	        ],
          columnDefs: [
              { type: 'date-dd-mmm-yyyy', targets: 2 }
         ],
          dom : "<'row'<'col-sm-2'l><'col-sm-6'><'col-sm-4'f>>"+'rtip',
					// dom: 'lBrtip',
					// buttons: [
					// 		'copy', 'csv', 'excel', 'pdf', 'print'
					// ],
          buttons: {
          buttons: [
                { extend: 'copy', text: '<i class="fa fa-files-o" aria-hidden="true"></i> Copy', className: 'btn btn-circle blue-chambray' },
                { extend: 'excel',text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel', className: 'btn btn-circle blue-chambray' },
                { extend: 'csv',text: '<i class="fa fa-file-code-o" aria-hidden="true"></i> CSV', className: 'btn btn-circle blue-chambray' },
                { extend: 'pdf',text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF', className: 'btn btn-circle blue-chambray' },
                { extend: 'print',text: '<i class="fa fa-print" aria-hidden="true"></i> Print', className: 'btn btn-circle blue-chambray' },
            ]
          },
				});
		},
		error: function(jqXHR, textStatus, errorThrown) {
			Metronic.stopPageLoading();
			alert('Error saving data ');
		}
	});
}

function reset_form()
{
  $('form#form-filter')[0].reset(); // reset form on modals
	$("#form-filter").submit();
}

</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
