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
						<div class="portlet-body">
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
										<!-- /span -->
										<!-- <div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">PO No.</label>
												<div class="col-md-9">
													<input name="po_no" type="text" class="form-control" placeholder="Nomor SPPr">
													<span class="help-block">
													 </span>
												</div>
											</div>
										</div> -->
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
											<a href="<?php echo site_url().'/marketing/create_sppr'?>" id="sample_editable_1_new" class="btn green">
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
							<!-- <table id="default-table" class="table table-striped table-bordered table-hover" id="table_sppr">
               <thead>
                    <tr>
                        <th> NO SPPr </th>
                        <th> Customer </th>
												<th> Order Date </th>
                        <th> Delivery Date </th>
												<th> Status </th>
                        <th> Detail Project </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table> -->
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
<?php $this->load->view('include/footer');?>
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
					<input type="hidden" name="id_sppr">
					<div class="form-body">
						<h3 class="form-section">General Information</h3>
						<div class="row">
							<div class="col-md-12" style="  padding-left: 0px;  padding-right: 0px;">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">Customer<span class="required" aria-required="true"> * </span></label>
										<div class="col-md-9">
											<input name="customer" type="text" class="form-control js-data-example-ajax" placeholder="Name Customer">
											<span class="help-block">
										</span>
										</div>
									</div>
								</div>
								<!-- /span -->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">No. SPPr<span class="required" aria-required="true"> * </span></label>
										<div class="col-md-9">
											<input name="no_sppr" type="text" class="form-control" placeholder="Nomor SPPr">
											<span class="help-block">
												Dont Change No SPPr
											</span>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<div class="col-md-12" style="  padding-left: 0px;  padding-right: 0px;">

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">PO No.<span class="required" aria-required="true"> * </span></label>
									<div class="col-md-9">
										<input name="po_no" type="text" class="form-control id_customer" placeholder="PO. No">
										<span class="help-block">
										 </span>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3 ">Ref. No<span class="required" aria-required="true"> * </span></label>
									<div class="col-md-9">
										<input name="ref_no" type="text" class="form-control" placeholder="Ref. NO">
										<span class="help-block">
										 </span>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
							<div class="col-md-6 hide">
								<div class="form-group">
									<label class="control-label col-md-3">ID Customer<span class="required" aria-required="true"> * </span></label>
									<div class="col-md-9">
										<input  name="customer_id" type="text" class="form-control " placeholder="ID Customer">
										<span class="help-block">
									</span>
									</div>
								</div>
							</div>
							<!-- /span -->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">Order Date<span class="required" aria-required="true"> * </span></label>
									<div class="col-md-9">
										<input name="order_date" type="text" class="form-control date-picker" placeholder="Order Date" >
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
										<input name="contact_no" type="text" class="form-control" placeholder="Contact No">
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">Delivery Date<span class="required" aria-required="true"> * </span></label>
									<div class="col-md-9">
										<input name="delivery_date" type="text" class="form-control date-picker" placeholder="Delivery Date">
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
										<input name="email" type="email" class="form-control" placeholder="Email ">
										<span class="help-block">
										 </span>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">PIC<span class="required" aria-required="true"> * </span></label>
									<div class="col-md-9">
										<input name="pic" type="text" class="form-control" placeholder="PIC">
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
										<input name="fax" type="text" class="form-control" placeholder="Fax">
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!-- /span -->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">Telp<span class="required" aria-required="true"> * </span></label>
									<div class="col-md-9">
										<input name="telp" type="text" class="form-control" placeholder="Telp">
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
										<textarea name="ship_to_address" type="text" class="form-control" placeholder="Ship to Address"></textarea>
										<span class="help-block">
									 </span>
									</div>
								</div>
							</div>
						</div>
						<!--/row-->
						<h3 class="form-section">Attachment</h3>
						<div class="row">
							<div class="col-md-12 ">
								<?php
								foreach ($attach as $key) {
									// echo '<label>
									// <input type="checkbox" name="attachement_id[]" value="'.$key['id_attachement'].'" class="icheck" data-checkbox="icheckbox_square-grey">'.$key['type_attachement'].'</label>';
									echo '<div class="form-group">
									<label style="text-align: left" for="exampleInputFile" class="col-md-2 control-label"><input type="checkbox" id="attachment_'.$key['id_attachement'].'" name="attachement_id[]" value="'.$key['id_attachement'].'" class="icheck" data-checkbox="icheckbox_square-grey">'.$key['type_attachement'].'</label>
									<div class="col-md-10">
										<input type="file" name="'.$key['id_attachement'].'_attachement[]" multiple="multiple" id="exampleInputFile">
										<p class="help-block">
										</p>
									</div>
									</div>';
								}
									?>
							</div>
						</div>
						<!-- ./row -->
						<h3 class="form-section">Non Hygienic</h3>
						<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<!-- <label class="control-label col-md-3">Non Hygienic</label> -->
										<div class="col-md-9">
											<div class="input-group">
												<div class="icheck-inline ">
													<?php
													foreach ($nonhyg as $key) {
														echo '<label>
														<input id="nonhygienic_'.$key['id_nonhygienic'].'" type="checkbox" name="nonhygienic_id[]" value="'.$key['id_nonhygienic'].'" class="icheck" data-checkbox="icheckbox_square-grey">'.$key['type'].'</label>';
													}
														?>
												</div>
											</div>
										</div>
									</div>
								</div>
						</div>
						<!-- ./row -->
						<h3 class="form-section">Finishing</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label style="text-align: left" class="control-label col-md-2">Stainless Steel</label>
									<div class="col-md-10">
										<div class="input-group">
											<div class="icheck-inline ">
												<?php
												foreach ($finishing as $key) {
													if($key['type']=='Stainless Steel'){
													echo '<label>
													<input id="finishing_'.$key['id_finishing'].'" type="checkbox" name="finishing_id[]" value="'.$key['id_finishing'].'" class="icheck" data-checkbox="icheckbox_square-grey">'.$key['kind'].'</label>';
													}
												}
													?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /row -->
						<!-- <h3 class="form-section">Finishing | </h3> -->
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label  style="text-align: left" class="control-label col-md-2">Carbon Steel</label>
									<div class="col-md-10">
										<div class="input-group">
											<div class="icheck-inline ">
												<?php
												foreach ($finishing as $key) {
													if($key['type']!='Stainless Steel'){
													echo '<label>
													<input id="finishing_'.$key['id_finishing'].'"  type="checkbox" name="finishing_id[]" value="'.$key['id_finishing'].'" class="icheck" data-checkbox="icheckbox_square-grey">'.$key['kind'].'</label>';
													}
												}
													?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /row -->
						<h3 class="form-section">Certification</h3>
						<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<!-- <label class="control-label col-md-3">Certification</label> -->
										<div class="col-md-9">
											<div class="input-group">
												<div class="icheck-inline ">
													<?php
													foreach ($certif as $key) {
														echo '<label>
														<input id="certification_'.$key['id_certif'].'" type="checkbox" name="certification_id[]" value="'.$key['id_certif'].'" class="icheck" data-checkbox="icheckbox_square-grey">'.$key['name'].'</label>';
													}
														?>
												</div>
											</div>
										</div>
									</div>
								</div>
						</div>
						<!-- ./row -->
						<h3 class="form-section">Other</h3>
						<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<!-- <label class="control-label col-md-3">Other</label> -->
										<div class="col-md-9">
											<div class="input-group">
												<div class="icheck-inline ">
													<?php
													foreach ($other as $key) {
														echo '<label>
														<input id="other_'.$key['id_other'].'" type="checkbox" name="other_id[]" value="'.$key['id_other'].'" class="icheck" data-checkbox="icheckbox_square-grey">'.$key['name'].'</label>';
													}
														?>
												</div>
											</div>
										</div>
									</div>
								</div>
						</div>
						<!-- ./row -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">Man Hours (Dia-Inch)</label>
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
									<label class="control-label col-md-3">Weight (KG)</label>
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
				 <table  id="table-file" class="table table-bordered table-hover ">
				 </table>
				 <div class="row" >
					 <div class="col-md-12" style="padding-left: 150px">
					 <ul class="feeds" id="files">
					</ul>
					</div>
				 </div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button id="btn-edit" class="btn btn-success hide" onclick="save_edit()"> Save </button>
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

	$('.date-picker').datepicker({
		// rtl: Metronic.isRTL(),
		autoclose: true,
		format: 'yyyy-mm-dd',
	});

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

		$('[name="customer"]').change(function(){
			console.log('name : '+$('[name="customer"]').val());
			var name=$(this).val();
			get_po_no(name);
			if(name==0){
				window.location.href="<?php echo site_url().'marketing/input_customer';?>";
			}
		});

		$('[name="po_no"]').change(function(){
			console.log('name : '+$('[name="po_no"]').val());
			var po_no=$(this).val();
			embed_data(po_no);
			if(po_no==0){
				window.location.href="<?php echo site_url().'marketing/input_customer';?>";
			}
		});

	});
</script>

<script>
function get_po_no(nama){
  var name=['customer_id','order_date', 'no_sppr', 'ref_no', 'contact_no', 'delivery_date', 'email', 'pic', 'fax', 'telp', 'ship_to_address', 'mhours', 'stainless_steel', 'carbon_steel', 'weight', 'me', 'reserved', 'create_by', 'date_create', 'status','name_project', 'quantity', 'satuan', 'description'];
  var n=name.length;
  // for (var i = 0; i < name.length; i++) {
  //   $("[name='"+name[i]+"']").val('');
  // }

	$.ajax({
		url : '<?php echo site_url().'marketing/get_po_no/'?>'+nama,
		type: "GET",
		// data: {'nama': nama},
		dataType: "JSON",
		success: function(data)
		{
			$('.id_customer').select2({
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

function embed_data(po_no){
  console.log('po :'+po_no);
  $.ajax({
    url : '<?php echo site_url().'marketing/get_order_data/'?>',
    type: "POST",
    data: {'po_no': po_no},
    dataType: "JSON",
    success: function(data)
    {
      var name=['customer_id','order_date'];
      var n=name.length;
      for (var i = 0; i < name.length; i++) {
        $("[name='"+name[i]+"']").val(data.result[i]);
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
}


function show_detail(sppr)
{
	$("#show-detail").modal('show');
	$("#btn-edit").addClass('hide');
	console.log(sppr+' was request to view detail');
	Metronic.startPageLoading({animate: true});
	var url='<?php echo site_url().'/marketing/get_sppr_get_id/'?>'+sppr;
	general_ajax(url);
}

function edit(sppr)
{
	$("#show-detail").modal('show');
	$("#btn-edit").removeClass('hide');
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
	var name=['id_sppr', 'no_sppr', 'customer', 'order_date', 'delivery_date', 'pic', 'telp', 'ship_to_address', 'ref_no', 'po_no', 'contact_no', 'email', 'fax',  'mhours', 'stainless_steel', 'carbon_steel', 'weight', 'me', 'reserved', 'create_by', 'date_create', 'status','name_project', 'quantity', 'satuan', 'description'];
	var n=name.length;
	for (var i = 0; i < name.length; i++) {
		$("[name='"+name[i]+"']").val(data.master[i]);
	}

	get_option();

	// for (var i = 0; i < data.attachment.length; i++) {
	// 	console.log("sadsadad");
	// 	$('#attachment_1').parent().addClass('checked');
	// 		// $('#atth').append('<label><input type="checkbox" name="attachement_id" checked class="icheck" data-checkbox="icheckbox_square-grey">'+data.attachment[i].type_attachement+'</label>');
	// }

	// for (var i = 0; i < data.nonhygienic.length; i++) {
	// 		$('#nonh').append('<label><input type="checkbox" checked class="icheck" data-checkbox="icheckbox_square-grey">'+data.nonhygienic[i].type+'</label>')
	// }
  //
	// for (var i = 0; i < data.finishing.length; i++) {
	// 	if(data.finishing[i].type=='Stainless Steel'){
	// 		$('#ss').append('<label><input type="checkbox" checked class="icheck" data-checkbox="icheckbox_square-grey">'+data.finishing[i].kind+'</label>');
	// 	}
	// 	if(data.finishing[i].type=='Carbon Steal') {
	// 		$('#cs').append('<label><input type="checkbox" checked class="icheck" data-checkbox="icheckbox_square-grey">'+data.finishing[i].kind+'</label>');
	// 	}
	// }

	// for(var i=0; i<data.link.length; i++){
	// 	$('#files').append(data.link[i]);
	// 	console.log(data.link[i]);
	// }

	var table_file=$('#table-file').dataTable( {
		"bDestroy": true,
		data: data.table,
		columns: [
			{ title: "Type" },
			{ title: "Detail" },
			{ title: "Nama File" },
			{ title: "Action" }
		],
	});

	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	// $('#attachment_5').parent().addClass('checked');
	for (var i = 0; i < data.attachment.length; i++) {
		console.log("sadsadad");
		// $('#attachment_'+data.attachment[i].id_attachement).parent().addClass('checked');
		$('#attachment_'+data.attachment[i].id_attachement).iCheck('check');
			// $('#atth').append('<label><input type="checkbox" name="attachement_id" checked class="icheck" data-checkbox="icheckbox_square-grey">'+data.attachment[i].type_attachement+'</label>');
	}

	for (var i = 0; i < data.nonhygienic.length; i++) {
		// $('#nonhygienic_'+data.nonhygienic[i].id_nonhygienic).parent().addClass('checked');
			// $('#nonh').append('<label><input type="checkbox" checked class="icheck" data-checkbox="icheckbox_square-grey">'+data.nonhygienic[i].type+'</label>')
		$('#nonhygienic_'+data.nonhygienic[i].id_nonhygienic).iCheck('check');
	}
	for (var i = 0; i < data.finishing.length; i++) {
		// $('#finishing_'+data.finishing[i].id_finishing).parent().addClass('checked');
		$('#finishing_'+data.finishing[i].id_finishing).iCheck('check');
	}
	for (var i = 0; i < data.certif.length-1; i++) {
		// $('#certification_'+data.certif[i]).parent().addClass('checked');
		$('#certification_'+data.certif[i]).iCheck('check');
	}
	for (var i = 0; i < data.other.length-1; i++) {
		// $('#other_'+data.other[i]).parent().addClass('checked');
		$('#other_'+data.other[i]).iCheck('check');
	}

}
//cancel SPPr
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
								$("#form-filter").submit();
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


function get_option(){
	$.ajax({
		url : '<?php echo site_url().'marketing/get_name_customer'?>',
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

$("#form-filter").submit(function(event){
	event.preventDefault();
	Metronic.startPageLoading({animate: true});
	// ajax adding data to database
	var formData = new FormData($("form#form-filter")[0]);
	$.ajax({
		url: "<?php echo site_url('marketing/filter'); ?>",
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
					{ title: "Order ID MB" },
					{ title: "PO NO" },
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

//save Edit
function save_edit()
{
		var formdata = new FormData($("#sppr-form")[0]); //get data
		Metronic.startPageLoading({animate: true});
		event.preventDefault();
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$.ajax({
			url : '<?php echo site_url().'/marketing/save_edit'?>',
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
						message: 'SPPr has been edited',
					});
					reset_form();
					$("#show-detail").modal('hide');

				}else{
					var pesan="";
					for (var i = 0; i < data.inputerror.length; i++)
					{
						// $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
						// $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
						pesan+=data.inputerror[i]+"<br>";
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
		}); /// ajax
}

function hold(sppr){
	console.log("no sppr : "+sppr);
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
					var url='<?php echo site_url().'/marketing/hold/'?>'+sppr;
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
								$("#form-filter").submit();
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

function done(sppr){
	console.log("no sppr : "+sppr);
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
					var url='<?php echo site_url().'/marketing/done/'?>'+sppr;
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
								$("#form-filter").submit();
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

function unhold(sppr){
	console.log("no sppr : "+sppr);
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
					var url='<?php echo site_url().'/marketing/unhold/'?>'+sppr;
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
								$("#form-filter").submit();
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

function delete_file(link)
{
	console.log(link);
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
					var url='<?php echo site_url().'/marketing/delete_file/'?>';
					$.ajax({
							url : url,
							type: "POST",
							data: {'file': link},
							// data: formdata,
							// processData: false,
							// contentType: false,
							dataType: "JSON",
							success: function(data)
							{
								Metronic.stopPageLoading();
								var sppr=$('[name="no_sppr"]').val();
								var url='<?php echo site_url().'/marketing/get_sppr_get_id/'?>'+sppr;
								general_ajax(url);
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
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
