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
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo base_url().'assets/global/plugins/dropzone/css/dropzone.css'?>" rel="stylesheet"/>
<!-- END PAGE LEVEL STYLES -->
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
									<span class="caption-subject bold uppercase"> Input Customer </span>
								</div>
								<div class="actions">
						<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
						</a>
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form id="sppr-form" method="post" enctype="multipart/form-data" class="form-horizontal">
						<div class="form-body">
							<h3 class="form-section">Form Inpu New Customer</h3>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">Name Customer<span class="required" aria-required="true"> * </span></label>
										<div class="col-md-9">
											<input name="customer" type="text" class="js-data-example-ajax form-control" placeholder="Name Customer">
											<span class="help-block">
												<button type="button" class="btn btn-info" onclick="add_cus()"> <i class="fa fa-plus"> </i>Add New</button>
											</span>
										</div>
									</div>
								</div>
								<!-- /span -->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">Order ID_MB<span class="required" aria-required="true"> * </span></label>
										<div class="col-md-9">
											<input name="order_id" type="text" class="form-control js-data-order" placeholder="PO. No">
											<span class="help-block">
											</span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6 new-order-id hide">
									<div class="form-group">
										<label class="control-label col-md-3">New Order ID_MB<span class="required" aria-required="true"> * </span></label>
										<div class="col-md-9">
											<input name="new_order_id" type="text" class="form-control " placeholder="New Order ID MB ">
											<span class="help-block">
												Tahun-Divisi-Kode Cutomer -No Urut
											</span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">PO No. / Contract<span class="required" aria-required="true"> * </span></label>
										<div class="col-md-9">
											<input name="no_po" type="text" class="form-control" placeholder="PO. No">
											<span class="help-block">
											</span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6 new_main hide">
									<div class="form-group">
										<label class="control-label col-md-3">New Name Customer<span class="required" aria-required="true"> * </span></label>
										<div class="col-md-9">
											<input name="name_cus" type="text" class="form-control" placeholder="Input New type">
											<span>
												<a class="btn green" onclick="save_customer()">
												<i class="fa fa-save"></i> save
											</a>
										</span>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">Date Order<span class="required" aria-required="true"> * </span></label>
									<div class="col-md-9">
										<input name="date_po" type="text" class="form-control date-picker" placeholder="Order Date" >
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<!--/row-->
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										<button id="submit-all" type="submit" class="btn green">Submit</button>
										<button type="button" onclick="goBack()" class="btn default">Cancel</button>
									</div>
								</div>
							</div>
							<div class="col-md-6">
							</div>
						</div>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
	<?php } else {
		echo "You dont have an Access to this page!!";
	}?>
	<!-- END SAMPLE FORM PORTLET-->
</div>
</div>
<!-- END PAGE CONTENT-->
</div>
</div>
</div>
<!-- END CONTENT -->
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
<script src="../../survey/assets/global/plugins/excanvas.min.js">et_order()
	{</script>
<![endif]-->
<?php $this->load->view('include/js');?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url().'assets/global/plugins/dropzone/dropzone.js'?>"></script>
<script src="<?php echo base_url().'assets/admin/pages/scripts/form-samples.js'?>"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script>
jQuery(document).ready(function() {
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	QuickSidebar.init(); // init quick sidebar
	Demo.init(); // init demo features
	FormSamples.init();
	$('#customer').addClass('active open');
	$('#input-customer-menu').parent().addClass('active');
	// $('#list-customer').parent().addClass('active');
	get_option();

	$('[name="customer"]').change(function(){
		console.log('name : '+$('[name="customer"]').val());
		var name=$(this).val();
		get_order(name);
		if(name=='0'){
			add_cus();
		}else {
			$(".new_main").addClass('hide');
		}
	});

	$('[name="order_id"]').change(function(){
		console.log('name order : '+$('[name="order"]').val());
		var order=$(this).val();
		if(order=='0'){
			$(".new-order-id").removeClass('hide');
		}else {
			$(".new-order-id").addClass('hide');
		}
	});

});

function add_cus()
{
	$(".new_main").removeClass('hide');
}

</script>

<script>
Metronic.startPageLoading({animate: true});
$(document).ready(function(){

	// $('.datepicker').datepicker();

	$('.date-picker').datepicker({
		// rtl: Metronic.isRTL(),
		autoclose: true,
		format: 'yyyy-mm-dd',
	});

	Metronic.stopPageLoading();
	$("#sppr-form").submit(function(event)
	{
		//console.log(formdata);
		var formdata = new FormData($("#sppr-form")[0]); //get data
		Metronic.startPageLoading({animate: true});
		event.preventDefault();
		$('.form-group').removeClass('has-error'); // clear error class
		// $('.help-block').empty(); // clear error string
		$.ajax({
			url : '<?php echo site_url().'/marketing/save_customer'?>',
			type: "POST",
			data: formdata,
			processData: false,
			contentType: false,
			dataType: "JSON",
			success: function(data)
			{
				Metronic.stopPageLoading();

				if(data.status){
					bootbox.alert({
						title: '<p class="text-success">Success</p>',
						message: 'New Customer has been save',
					});
					get_option();
				}else{
					var pesan="";
					for (var i = 0; i < data.inputerror.length; i++)
					{
						$('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
						$('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
						pesan+=data.error_string[i]+"<br>";
					}

					bootbox.alert({
						title: '<p class="text-danger">Error!!</p>',
						message: pesan,
					});

				}
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				Metronic.stopPageLoading();

				bootbox.alert({
					title: '<p class="text-danger">Error</p>',
					message: 'Error adding / update data',
				});
				// alert('Error adding / update data');
				$('#btnSave').text('save'); //change button text
				$('#btnSave').attr('disabled',false); //set button enable
			}
		});
	}); //end ajax save
}); //end dosumnt rrady

function get_option(){
	$.ajax({
		url : '<?php echo site_url().'marketing/get_name'?>',
		type: "GET",
		dataType: "JSON",
		success: function(data)
		{
			$('.js-data-example-ajax').select2({
				data: data.result
			});
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			Metronic.stopPageLoading();
			bootbox.alert({
				title: '<p class="text-danger">Error</p>',
				message: 'Error adding / update data',
			});
			// alert('Error adding / update data');
			$('#btnSave').text('save'); //change button text
			$('#btnSave').attr('disabled',false); //set button enable
		}
	});
}

function get_order(id){
	$.ajax({
		url : '<?php echo site_url().'marketing/get_order/'?>'+id,
		type: "POST",
		dataType: "JSON",
		success: function(data)
		{
			$('.js-data-order').select2({
				data: data.order
			});
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			Metronic.stopPageLoading();
			bootbox.alert({
				title: '<p class="text-danger">Error</p>',
				message: 'Error adding / update data',
			});
			// alert('Error adding / update data');
			$('#btnSave').text('save'); //change button text
			$('#btnSave').attr('disabled',false); //set button enable
		}
	});
}

function save_customer()
{
	var formdata = new FormData($("#sppr-form")[0]); //get data
	Metronic.startPageLoading({animate: true});
	event.preventDefault();
	$('.form-group').removeClass('has-error'); // clear error class
	// $('.help-block').empty(); // clear error string
	$.ajax({
		url : '<?php echo site_url().'/marketing/save_name'?>',
		type: "POST",
		data: formdata,
		processData: false,
		contentType: false,
		dataType: "JSON",
		success: function(data)
		{
			Metronic.stopPageLoading();
			get_option();
			$('[name="customer"]').val(data.id).trigger('change')
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			Metronic.stopPageLoading();

			bootbox.alert({
				title: '<p class="text-danger">Error</p>',
				message: 'Error adding / update data',
			});
			// alert('Error adding / update data');
			$('#btnSave').text('save'); //change button text
			$('#btnSave').attr('disabled',false); //set button enable
		}
	});
}
</script>
<!-- END JAVASCRIPTS -->
<!-- END BODY -->
</html>
