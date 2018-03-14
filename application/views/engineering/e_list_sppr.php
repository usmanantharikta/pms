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
	<title>List SPPr</title>
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
<body class="page-header-fixed page-quick-sidebar-over-content  page-sidebar-closed">
	<!-- BEGIN HEADER -->
	<?php $this->load->view('include/header'); ?>
	<!-- END HEADER -->
	<div class="clearfix">
	</div>
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<?php $this->load->view('include/e_slidebar');?>
		<!-- END SIDEBAR -->
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">
				<?php
				if(isset($_SESSION['username']) && $_SESSION['division']=='engineering'){
					?>
					<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
					<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
									<h4 class="modal-title">Modal title</h4>
								</div>
								<div class="modal-body">
									Widget settings form goes here
								</div>
								<div class="modal-footer">
									<button type="button" class="btn blue">Save changes</button>
									<button type="button" class="btn default" data-dismiss="modal">Close</button>
								</div>
							</div>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					</div>
					<!-- /.modal -->
					<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
					<!-- BEGIN PAGE HEADER-->
					<h3 class="page-title">
						Project Management System<br><small> PT PRAKARSALANGGENG MAJUBERSAMA</small>
					</h3>
					<div class="page-bar">
						<ul class="page-breadcrumb">
							<li>
								<a href="<?php echo site_url().'engineering';?>">Engineering</a>
								<i class="fa fa-circle"></i>
							</li>
							<li>
								<span>List SPPr</span>
							</li>
						</ul>
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
										<span class="caption-subject bold uppercase"> List SPPr </span>
									</div>
									<div class="actions">
										<!-- <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
									</a> -->
								</div>
							</div>
							<div class="portlet-body table-responsive">
								<form id="form-filter" method="post" enctype="multipart/form-data" class="form-horizontal">
									<div class="form-body">
										<h3 class="form-section">Filter</h3>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label col-md-3">No. SPPr</label>
													<div class="col-md-9">
														<!-- <input name="no_sppr" type="text" class="form-control" placeholder="Nomor SPPr"> -->
														<select name="no_sppr" class="form-control">
															<option value=""></option>
															<?php
															foreach ($sppr as $key) {
																echo '<option value="'.$key['no_sppr'].'">'.$key['no_sppr'].'</option>';
															}
															?>
														</select>
														<span class="help-block">
														</span>
													</div>
												</div>
											</div>
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label col-md-3">Customer</label>
													<div class="col-md-9">
														<!-- <input name="customer" type="text" class="form-control" placeholder="Name Customer"> -->
														<select name="customer" class="form-control">
															<option value=""></option>
															<?php
															foreach ($customer as $key) {
																echo '<option value="'.$key['id_customer'].'">'.$key['name_customer'].'</option>';
															}
															?>
														</select>
														<span class="help-block">
														</span>
													</div>
												</div>
											</div>
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label col-md-3">Order Date</label>
													<div class="col-md-9">
														<input name="order_date" type="text" class="form-control datepicker">
														<span class="help-block">
														</span>
													</div>
												</div>
											</div>
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label col-md-3">Delivery Date</label>
													<div class="col-md-9">
														<input name="delivery_date" type="text" class="form-control datepicker" >
														<span class="help-block">
														</span>
													</div>
												</div>
											</div>
										</div>
										<!-- row -->
									</div>
									<!-- ./form body -->
									<div class="modal-footer">
										<button type="button" class="btn btn-warning" onclick="reset_form()">Reset</button>
										<button type="submit" class="btn btn-success" >Filter</button>

									</div>
								</form>
								<hr>
							</div>
							<div class="portlet-body table-responsive">
								<!-- BEGIN TABLE -->
								<div class="table-toolbar">
									<div class="row">
										<div class="col-md-6">
											<div class="btn-group">
												<a onclick="reload_tab()" id="sample_editable_1_new" class="btn green">
													Reload Table <i class="fa fa-refresh"></i>
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
											<!-- /END TABLE -->
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
			<?php $this->load->view('include/footer'); ?>
			<!-- END FOOTER -->

			<!-- BEGIN MODAL -->
			<!-- /.modal -->
			<div class="modal fade" id="show-detail" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-full">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal Title</h4>
						</div>
						<div class="modal-body">
							<form id="sppr-form" method="post" enctype="multipart/form-data" class="form-horizontal">
								<div class="form-body">
									<h3 class="form-section">General Information</h3>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">No. SPPr</label>
												<div class="col-md-9">
													<input name="no_sppr" type="text" class="form-control" placeholder="Nomor SPPr">
													<span class="help-block">
													</span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Ref. No</label>
												<div class="col-md-9">
													<input name="ref_no" type="text" class="form-control" placeholder="Nomor SPPr">
													<span class="help-block">
													</span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Customer</label>
												<div class="col-md-9">
													<input name="customer" type="text" class="form-control" placeholder="Name Customer">
													<span class="help-block">
													</span>
												</div>
											</div>
										</div>
										<!-- /span -->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">PO No.</label>
												<div class="col-md-9">
													<input name="po_no" type="text" class="form-control" placeholder="Nomor SPPr">
													<span class="help-block">
													</span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Order Date</label>
												<div class="col-md-9">
													<input name="order_date" type="text" class="form-control" placeholder="dd/mm/yyyy">
													<span class="help-block">
													</span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Contact No</label>
												<div class="col-md-9">
													<input name="contact_no" type="text" class="form-control" placeholder="Nomor SPPr">
													<span class="help-block">
													</span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Delivery Date</label>
												<div class="col-md-9">
													<input name="delivery_date" type="text" class="form-control" placeholder="dd/mm/yyyy">
													<span class="help-block">
													</span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Email</label>
												<div class="col-md-9">
													<input name="email" type="email" class="form-control" placeholder="dd/mm/yyyy">
													<span class="help-block">
													</span>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">PIC</label>
												<div class="col-md-9">
													<input name="pic" type="text" class="form-control" placeholder="Name Customer">
													<span class="help-block">
													</span>
												</div>
											</div>
										</div>
										<!-- /span -->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Fax</label>
												<div class="col-md-9">
													<input name="fax" type="text" class="form-control" placeholder="Name Customer">
													<span class="help-block">
													</span>
												</div>
											</div>
										</div>
										<!-- /span -->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Telp</label>
												<div class="col-md-9">
													<input name="telp" type="text" class="form-control" placeholder="Name Customer">
													<span class="help-block">
													</span>
												</div>
											</div>
										</div>
										<!-- /span -->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Ship to Address</label>
												<div class="col-md-9">
													<textarea name="ship_to_address" type="text" class="form-control" placeholder="Name Customer"></textarea>
													<span class="help-block">
													</span>
												</div>
											</div>
										</div>
										<!-- /span -->
										<!-- <div class="col-md-6">
										<div class="form-group has-error">
										<label class="control-label col-md-3"></label>
										<div class="col-md-9">
										<select name="foo" class="select2me form-control">
										<option value="1">Abc</option>
										<option value="1">Abc</option>
										<option value="1">This is a really long value that breaks the fluid design for a select2</option>
									</select>
									<span class="help-block">
									This field has error. </span>
								</div>
							</div>
						</div> -->
						<!--/span-->
					</div>
					<!--/row-->
					<!-- <h3 class="form-section">Supporting Information</h3> -->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Attachement</label>
								<div class="col-md-9">
									<div class="input-group">
										<div id="atth" class="icheck-inline ">

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Non Hygienic</label>
								<div class="col-md-9">
									<div class="input-group">
										<div id="nonh" class="icheck-inline ">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- <h3 class="form-section">Finishing</h3> -->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Stainless Steel</label>
								<div class="col-md-9">
									<div class="input-group">
										<div id="ss" class="icheck-inline ">
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Carbon Steel</label>
								<div class="col-md-9">
									<div class="input-group">
										<div id="cs" class="icheck-inline ">
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Man Hours</label>
								<div class="col-md-9">
									<input name="mhours" type="text" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Stainless Steel</label>
								<div class="col-md-9">
									<input name="stainless_steel" type="text" class="form-control">
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Carbon Steel</label>
								<div class="col-md-9">
									<input name="carbon_steel" type="text" class="form-control">
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Weight</label>
								<div class="col-md-9">
									<input name="weight" type="text" class="form-control">
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">ME</label>
								<div class="col-md-9">
									<input name="me" type="text" class="form-control">
								</div>
							</div>
						</div>
						<!--/span-->
						<!-- <div class="col-md-6">
						<div class="form-group">
						<label class="control-label col-md-3">Country</label>
						<div class="col-md-9">
						<select class="form-control">
						<option>Country 1</option>
						<option>Country 2</option>
					</select>
				</div>
			</div>
		</div> -->
		<!--/span-->
	</div>
	<!--/row-->
	<h3 class="form-section">Spesifikasi</h3>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3">Nama Project</label>
				<div class="col-md-9">
					<input name="name_project" type="text" class="form-control">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3">Quantity</label>
				<div class="col-md-9">
					<input name="quantity" type="text" class="form-control">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3">Satuan</label>
				<div class="col-md-9">
					<input name="satuan" type="text" class="form-control">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-md-3">Deskripsi</label>
				<div class="col-md-9">
					<textarea name="description" type="text" class="form-control"> </textarea>
				</div>
			</div>
		</div>
	</div>
	<h3 class="form-section">Attachement File</h3>
	<div class="row" >
		<div class="col-md-12" style="padding-left: 50px; padding-right: 50px">
			<table  id="table-file" class="table table-bordered table-hover ">
			</table>
		</div>
	</div>
</div>
</form>
</div>
<div class="modal-footer">
	<button type="button" class="btn default" data-dismiss="modal">Close</button>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- END MODAL -->


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
	$('#sppr').addClass('active open');
	$('#question').removeClass('active');
	$('#inputSPPr').parent().removeClass('active');
	$('#listSPPr').parent().addClass('active');

	$("#form-filter").submit();
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
</script>

<script>
function show_detail(sppr)
{
	$("#show-detail").modal('show');
	console.log(sppr+' was request to view detail');
	Metronic.startPageLoading({animate: true});
	var url='<?php echo site_url().'/marketing/get_sppr_get_id/'?>'+sppr;
	general_ajax(url);
}

function general_ajax(url)
{
	$.ajax({
		url : url,
		type: "POST",
		// data: formdata,
		processData: false,
		contentType: false,
		dataType: "JSON",
		success: function(data)
		{
			Metronic.stopPageLoading();
			embed_form(data);
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			Metronic.stopPageLoading();
			bootbox.alert({
				title: '<p class="text-danger">Error</p>',
				message: 'Error adding / update data',
			});
		}
	});
}

function embed_form(data){
	$('#atth').html('');
	$('#nonh').html('');
	$('#ss').html('');
	$('#cs').html('');
	$("#files").html('');
	var name=['no_sppr', 'customer', 'order_date', 'delivery_date', 'pic', 'telp', 'ship_to_address', 'ref_no', 'po_no', 'contact_no', 'email', 'fax',  'mhours', 'stainless_steel', 'carbon_steel', 'weight', 'me', 'reserved', 'create_by', 'date_create', 'status', 'ddd', 'name_project', 'quantity', 'satuan', 'description'];
	var n=name.length;
	for (var i = 0; i < name.length; i++) {
		$("[name='"+name[i]+"']").val(data.master[i]);
	}

	for (var i = 0; i < data.attachment.length; i++) {
		$('#atth').append('<label><input type="checkbox" name="attachement_id" checked class="icheck" data-checkbox="icheckbox_square-grey">'+data.attachment[i].type_attachement+'</label>')
	}

	for (var i = 0; i < data.nonhygienic.length; i++) {
		$('#nonh').append('<label><input type="checkbox" checked class="icheck" data-checkbox="icheckbox_square-grey">'+data.nonhygienic[i].type+'</label>')
	}

	for (var i = 0; i < data.finishing.length; i++) {
		if(data.finishing[i].type=='Stainless Steel'){
			$('#ss').append('<label><input type="checkbox" checked class="icheck" data-checkbox="icheckbox_square-grey">'+data.finishing[i].kind+'</label>');
		}
		if(data.finishing[i].type=='Carbon Steal') {
			$('#cs').append('<label><input type="checkbox" checked class="icheck" data-checkbox="icheckbox_square-grey">'+data.finishing[i].kind+'</label>');
		}
	}


		var table_file=$('#table-file').dataTable( {
			"bDestroy": true,
			data: data.table,
			columns: [
				{ title: "Type" },
				{ title: "Detail" },
				{ title: "Nama File" },
			],
		});

	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
}

function cancel(sppr){
	bootbox.confirm({
		message: "Are you sure ?",
		buttons: {
			confirm: {
				label: 'Yes',
				className: 'btn-success'
			},
			cancel: {
				label: 'No',
				className: 'btn-danger'
			}
		},
		callback: function (result) {
			if(result){
				Metronic.startPageLoading({animate: true});
				var url='<?php echo site_url().'/marketing/cancel/'?>'+sppr;
				$.ajax({
					url : url,
					type: "POST",
					// data: formdata,
					processData: false,
					contentType: false,
					dataType: "JSON",
					success: function(data)
					{
						Metronic.stopPageLoading();
						$table.ajax.reload( null, false );
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						Metronic.stopPageLoading();
						bootbox.alert({
							title: '<p class="text-danger">Error</p>',
							message: 'Error adding / update data',
						});
					}
				});
			}
		}
	});
}

$("#form-filter").submit(function(event){
	event.preventDefault();
	Metronic.startPageLoading({animate: true});
	// ajax adding data to database
	var formData = new FormData($("form#form-filter")[0]);
	$.ajax({
		url: "<?php echo site_url('engineering/get_sppr'); ?>",
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
				data: data.isi,
				columns: [
					{ title: "No SPPr" },
					{ title: "Customer" },
					{ title: "Order Date" },
					{ title: "Delivery Date" },
					{ title: "Status" },
					{ title: "Detail Project" },
					{ title: "Action" }
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
});

function reset_form()
{
	$('form#form-filter')[0].reset(); // reset form on modals
	$("#form-filter").submit();
}

function reload_tab()
{
	$("#form-filter").submit();
}

</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
