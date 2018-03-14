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
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8"/>
	<title>Edit DKP</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<script src="<?php echo base_url().'assets/livecss.js'?>" type="text/javascript"></script>
	<?php $this->load->view('include/css');?>
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="<?php echo base_url().'assets/global/plugins/dropzone/css/dropzone.css'?>" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css'?>"/>
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
		<?php $this->load->view('include/p_slidebar');?>
		<!-- END SIDEBAR -->
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">
				<?php
				if(isset($_SESSION['username']) && $_SESSION['division']=='project'){
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
										<span class="caption-subject bold uppercase"> Edit DKP | Input Budget</span>
									</div>
									<div class="actions">
										<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
										</a>
										<a href="javascript:;" class="collapse">
										</a>
									</div>
								</div>
								<div class="portlet-body form">
									<!-- BEGIN FORM-->
									<form id="dkp-form" method="post" enctype="multipart/form-data" class="form-horizontal">
										<input type="hidden" name="id_sppr">
										<!-- <input type="hidden" name="id_dkp" value="<?php echo $id_dkp;?>"> -->
										<div class="form-body">
											<h3 class="form-section">General Information</h3>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-3">ID DKP</label>
														<div class="col-md-9">
															<?php

															if(isset($id_dkp)){
																?>
																<input value="<?php echo $id_dkp;?>" name="id_dkp" type="text" class="form-control">
															<?php }
															else{
																?>
																<select id="id_dkp_master" name="id_dkp" class="form-control" id="form_control_1">
																	<!-- <option value=""></option> -->
																	<?php
																	// var_dump($no_sppr_all);
																	foreach ($no_sppr_all as $key) {
																		echo "<option value='".$key['id_dkp']."'>".$key['id_dkp']."</option>";
																	}
																	?>
																</select>
															<?php }?>
															<span class="help-block">
															</span>
														</div>
													</div>
												</div>
												<!--/span-->
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-3">No. SPPr</label>
														<div class="col-md-9">
															<?php

															if(isset($no_sppr)){
																?>
																<input value="<?php echo $no_sppr;?>" name="no_sppr" type="text" class="form-control" placeholder="Nomor SPPr">
															<?php }
															else{
																?>
																<select id="id_sppr" name="no_sppr" class="form-control" id="form_control_1">
																	<!-- <option value=""></option> -->
																	<?php
																	// var_dump($no_sppr_all);
																	foreach ($no_sppr_all as $key) {
																		echo "<option value='".$key['no_sppr']."'>".$key['no_sppr']."</option>";
																	}
																	?>
																</select>
															<?php }?>
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
															<input name="ref_no" type="text" class="form-control" placeholder="Ref. No">
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
															<input name="po_no" type="text" class="form-control" placeholder="PO No">
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
															<input name="contact_no" type="text" class="form-control" placeholder="Contact No">
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
															<input name="email" type="email" class="form-control" placeholder="Email">
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
														<label class="control-label col-md-3">Telp</label>
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
							<div class="form-actions foot-form">
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<button id="submit-first" type="submit" class="btn green">Next</button>
												<button type="button" onclick="goBack()"class="btn default">Cancel</button>
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
				<!-- END SAMPLE FORM PORTLET-->
			</div>
		</div>
		<div class="col-md-12 dkp-isian">
			<!-- material -->
			<div class="portlet red-flamingo box full-height-content full-height-content-scrollable">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-flask"></i>Material
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
						<a href="javascript:;" class="remove">
						</a>
					</div>
				</div>
				<div class="portlet-body" >
					<!-- <a class="btn green" onclick="show_modal('material')">
					<i class="fa fa-plus"></i> Add Material
				</a>
				<a class="btn green" data-toggle='modal' href="#upload_excel">
				<i class="fa fa-plus"></i> Import Material
			</a> -->
			<br>
			<br>
			<table class="table table-striped table-bordered table-hover" id="table_material">
				<thead>
					<tr>
						<th> Id Material</th>
						<th> Action </th>
						<th> Id Material</th>
						<th> Type</th>
						<th> Spesification</th>
						<th> Description </th>
						<th> Material</th>
						<th> Qty</th>
						<th> Basic Price </th>
						<th> UoM</th>
						<th> Weight</th>
						<th> Remarks </th>
						<th> Qty Budget </th>
						<th> BP Budget </th>
						<th> Tot PB</th>
						<th> Update by</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
	<!-- ./end masterial -->
	<!-- BEGIN MANPOWER -->
	<div class="portlet yellow-gold box full-height-content full-height-content-scrollable hide">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-users"></i>ManPower
			</div>
			<div class="tools">
				<a href="javascript:;" class="collapse">
				</a>
				<a href="javascript:;" class="remove">
				</a>
			</div>
		</div>
		<div class="portlet-body ">
			<a class="btn green" onclick="show_modal('manpower')">
				<i class="fa fa-plus"></i> Add Manpower
			</a>
			<br>
			<br>
			<table class="table table-striped table-bordered table-hover" id="table_manpower">
				<thead>
					<tr>
						<th> Id</th>
						<th> Manpower Name</th>
						<th> Description </th>
						<th> Unit</th>
						<th> Qty</th>
						<th> Basic Price</th>
						<th> Total Price </th>
						<th> Action </th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
	<!-- ./END MANPOWER -->
	<!-- BEGIN MACHINERY  -->
	<div class="portlet yellow-lemon box full-height-content full-height-content-scrollable hide">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-cogs"></i>Machinery
			</div>
			<div class="tools">
				<a href="javascript:;" class="collapse">
				</a>
				<a href="javascript:;" class="remove">
				</a>
			</div>
		</div>
		<div class="portlet-body">
			<a class="btn green" onclick="show_modal('machinery')">
				<i class="fa fa-plus"></i> Add Machinery
			</a>
			<br>
			<br>
			<table class="table table-striped table-bordered table-hover" id="table_machinery">
				<thead>
					<tr>
						<th> Id</th>
						<th> Machinery Name</th>
						<th> Description </th>
						<th> Unit</th>
						<th> Qty</th>
						<th> Basic Price</th>
						<th> Total Price </th>
						<th> Action </th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
	<!-- END MACHINERY -->
	<!-- MONEY  -->
	<div class="portlet green-jungle box full-height-content full-height-content-scrollable hide">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-money"></i>Money
			</div>
			<div class="tools">
				<a href="javascript:;" class="collapse">
				</a>
				<a href="javascript:;" class="remove">
				</a>
			</div>
		</div>
		<div class="portlet-body">
			<a class="btn green" onclick="show_modal('money')">
				<i class="fa fa-plus"></i> Add Money
			</a>
			<br>
			<br>
			<table class="table table-striped table-bordered table-hover" id="table_money">
				<thead>
					<tr>
						<th> Id</th>
						<th> Name</th>
						<th> Description </th>
						<th> Unit</th>
						<th> Qty</th>
						<th> Basic Price</th>
						<th> Total Price </th>
						<th> Action </th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
	<!-- ./END MONEY -->
	<!-- BEGIN SUB CONT  -->
	<div class="portlet blue-hoki box full-height-content full-height-content-scrollable  hide">
		<div class="portlet-title" >
			<div class="caption">
				<i class="fa fa-rocket"></i>Sub Contractor
			</div>
			<div class="tools">
				<a href="javascript:;" class="collapse">
				</a>
				<a href="javascript:;" class="remove">
				</a>
			</div>
		</div>
		<div class="portlet-body">
			<a class="btn green" onclick="show_modal('subcont')">
				<i class="fa fa-plus"></i> Add Sub Contractor
			</a>
			<br>
			<br>
			<table class="table table-striped table-bordered table-hover" id="table_subcont">
				<thead>
					<tr>
						<th> Id</th>
						<th> Name Contractor</th>
						<th> Description </th>
						<th> Unit</th>
						<th> Qty</th>
						<th> Basic Price</th>
						<th> Total Price </th>
						<th> Action </th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
	<!-- /END SUB CONT -->
	<!-- BEGIN HSE  -->
	<div class="portlet purple-studio box full-height-content full-height-content-scrollable  hide">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-fire-extinguisher"></i>HSE
			</div>
			<div class="tools">
				<a href="javascript:;" class="collapse">
				</a>
				<a href="javascript:;" class="remove">
				</a>
			</div>
		</div>
		<div class="portlet-body" >
			<a class="btn green" onclick="show_modal('hse')">
				<i class="fa fa-plus"></i> Add HSE
			</a>
			<br>
			<br>
			<table class="table table-striped table-bordered table-hover" id="table_hse">
				<thead>
					<tr>
						<th> Id</th>
						<th> Name HSE</th>
						<th> Description </th>
						<th> Unit</th>
						<th> Qty</th>
						<th> Basic Price</th>
						<th> Total Price </th>
						<th> Action </th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
	<!-- ./END HSE -->
	<!-- BEGITN OTHER -->
	<div class="portlet grey-cascade box full-height-content full-height-content-scrollable  hide">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-cube"></i>Other
			</div>
			<div class="tools">
				<a href="javascript:;" class="collapse">
				</a>
				<a href="javascript:;" class="remove">
				</a>
			</div>
		</div>
		<div class="portlet-body" >
			<a class="btn green" onclick="show_modal('other')">
				<i class="fa fa-plus"></i> Add Other
			</a>
			<br>
			<br>
			<table class="table table-striped table-bordered table-hover" id="table_other">
				<thead>
					<tr>
						<th> Id</th>
						<th> Name </th>
						<th> Description </th>
						<th> Unit</th>
						<th> Qty</th>
						<th> Basic Price</th>
						<th> Total Price </th>
						<th> Action </th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
	<!-- /end other -->
	<!-- BEGIN ATTACHMENT -->
	<div class="portlet red box full-height-content full-height-content-scrollable  ">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-file"></i>Attacment
			</div>
			<div class="tools">
				<a href="javascript:;" class="collapse">
				</a>
				<a href="javascript:;" class="remove">
				</a>
			</div>
		</div>
		<div class="portlet-body" >
			<!-- <form action="#" class="dropzone dz-clickable" id="my-dropzone">
				<div class="dz-default dz-message">
					<span>Drop files here to upload</span>
				</div>
			</form> -->

			<div >
			<ul id="files">
				<?php
				if($files!=''){
					 for ($i=2; $i < count($files) ; $i++) {
				?>
				<li><i class="fa fa-file"></i>
					<a>
					<?php echo $files[$i]; ?></a>
				</li>
			<?php } }?>
			</ul>
		</div>
			<!-- <br> -->
			<br>
			<div class="form-actions">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-offset-4 col-md-8">
								<!-- <button id="upload_doc" class="btn green">Upload</button> -->
							</div>
						</div>
					</div>
					<div class="col-md-3"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- /END ATTACHMENT -->
	<div class="portlet blue box full-height-content full-height-content-scrollable">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-file"></i>Action
			</div>
			<div class="tools">
				<a href="javascript:;" class="collapse">
				</a>
				<a href="javascript:;" class="remove">
				</a>
			</div>
		</div>
		<div class="portlet-body" >
			<div class="form-actions">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-offset-4 col-md-8">
								<button id="submit-all" onclick="sent()" type="submit" class="btn green">Submit</button>
								<button type="button" onclick="goBack()"class="btn default">Cancel</button>
							</div>
						</div>
					</div>
					<div class="col-md-3"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- /END ATTACHMENT -->

</div>
<!-- ./END OTHER -->
<div class="col-md-12">
	<!-- BEGIN SAMPLE FORM PORTLET-->
	<!-- END SAMPLE FORM PORTLET-->
<?php } else {
	echo "You dont have an Access to this page!!";
}?>
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
<!-- BEGIN Modal -->
<div id="material" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Add Material</h4>
			</div>
			<div class="modal-body">
				<!-- <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1"> -->
				<form id="dkp_detail_form" method="post" enctype="multipart/form-data" class="form-horizontal">
					<input type="hidden" name="id_material">
					<div class="form-body">
						<!-- <h3 class="form-section">General Information</h3> -->
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">ID DKP</label>
									<div class="col-md-9">
										<input disabled name="id_dkp" type="text" class="form-control" value="<?php echo $id_dkp;?>" placeholder="">
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!-- /span -->
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">ID Material</label>
									<div class="col-md-9">
										<input name="id_mat" disabled class="js-data-example-ajax form-control">
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Description</label>
									<div class="col-md-9">
										<input name="material_dec" type="text" class="form-control" placeholder="Description">
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Name</label>
									<div class="col-md-9">
										<input disabled name="material_name" type="text" class="form-control" placeholder="Name">
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!-- /span -->
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Quantity</label>
									<div class="col-md-9">
										<input disabled name="qty" type="text" class="form-control" placeholder="Quantity">
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Basic Price</label>
									<div class="col-md-9">
										<input disabled name="basic_price" type="text" class="form-control" placeholder="Quantity">
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Unit</label>
									<div class="col-md-9">
										<input  disabled name="unit" type="text" class="form-control" placeholder="Satuan">
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Weight</label>
									<div class="col-md-9">
										<input disabled name="weight" type="text" class="form-control" placeholder="Basic Price">
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Remarks</label>
									<div class="col-md-9">
										<input disabled name="remarks" type="text" class="form-control" placeholder="Remarks">
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Qty Budget</label>
									<div class="col-md-9">
										<input name="qty_budget" type="number" class="form-control" placeholder="Quantity Budget">
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!--/span-->
							<?php
							if($_SESSION['level']=='spv'){
							?>
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Basic Price Budget</label>
									<div class="col-md-9">
										<input name="basic_price_budget" type="number" class="form-control" placeholder="Basic Price Budget">
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
						<?php }?>
							<!--/span-->
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Keterangan</label>
									<div class="col-md-9">
										<textarea name="keterangan_project" type="number" class="form-control" placeholder=""></textarea>
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
					</div>
				</div>
				<!-- </div> -->
			</form>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn default">Close</button>
				<button type="button" onclick="add()" class="btn green">Save</button>
			</div>
		</div>
	</div>
</div>
<!-- ./END MODAL -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../survey/assets/global/plugins/respond.min.js"></script>
<script src="../../survey/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<?php $this->load->view('include/js');?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url().'assets/global/plugins/dropzone/dropzone.js'?>"></script>
<script src="<?php echo base_url().'assets/admin/pages/scripts/form-samples.js'?>"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url().'assets/global/plugins/datatables/media/js/jquery.dataTables.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js'?>"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url().'assets/js-custom/sort-material.js'?>"></script>


<script>
var flag=true;
var $table='';
var global_id_dkp='';
jQuery(document).ready(function() {
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	QuickSidebar.init(); // init quick sidebar
	Demo.init(); // init demo features
	FormSamples.init();

	//active slide bar
	$('#dkp').addClass('active open');
	$('#editDKP').addClass('active');

	//dataTable material
	global_id_dkp=$('[name="id_dkp"]').val();
	console.log('dkp id: '+global_id_dkp);
	if(global_id_dkp!=''){ //if edit  dkp was click
		initial_table(global_id_dkp);
	} //end if

	var level_user="<?php echo $_SESSION['level'];?>";

	if(level_user!='spv'){
		$('#table_material').DataTable().column(8).visible(false);
		$('#table_material').DataTable().column(13).visible(false);
		$('#table_material').DataTable().column(14).visible(false);
	}

});


function initial_table(id)
{
	$('.dkp-isian').removeClass('hide');
	flag=false;
	$('.foot-form').addClass('hide');
	//dataTables material
	var url='<?php echo site_url().'project/get_materal/'?>'+id;
	$table=$('#table_material').DataTable( {
		"bDestroy": true,
		"ajax":
		{
			"url": url,
			"type": "POST",
			"retrieve": true,
			keys: true,
		},
		"order": [[ 0, 'asc' ]],
		"columnDefs": [
			{
				"targets": [ 0 ],
				"visible": false
			},
			{ type: 'date-uk', targets: 2 }

		]
	});

	//man ManPower
	var table_mp=$('#table_manpower').DataTable( {
		"bDestroy": true,
		"ajax":
		{
			"url": '<?php echo site_url().'engineering/get_manpower/'?>'+id,
			"type": "POST",
			"retrieve": true,
			keys: true,
		},
		"order": [[ 0, 'desc' ]],
		"columnDefs": [
			{
				"targets": [ 0 ],
				"visible": false
			}
		]
	});

	//machinery
	var table_mp=$('#table_machinery').DataTable( {
		"bDestroy": true,
		"ajax":
		{
			"url": '<?php echo site_url().'engineering/get_machinery/'?>'+id,
			"type": "POST",
			"retrieve": true,
			keys: true,
		},
		"order": [[ 0, 'desc' ]],
		"columnDefs": [
			{
				"targets": [ 0 ],
				"visible": false
			}
		]
	});

	//MONEY
	var table_mp=$('#table_money').DataTable( {
		"bDestroy": true,
		"ajax":
		{
			"url": '<?php echo site_url().'engineering/get_money/'?>'+id,
			"type": "POST",
			"retrieve": true,
			keys: true,
		},
		"order": [[ 0, 'desc' ]],
		"columnDefs": [
			{
				"targets": [ 0 ],
				"visible": false
			}
		]
	});
	//subcont
	var table_mp=$('#table_subcont').DataTable( {
		"bDestroy": true,
		"ajax":
		{
			"url": '<?php echo site_url().'engineering/get_subcont/'?>'+id,
			"type": "POST",
			"retrieve": true,
			keys: true,
		},
		"order": [[ 0, 'desc' ]],
		"columnDefs": [
			{
				"targets": [ 0 ],
				"visible": false
			}
		]
	});

	//HSE
	var table_mp=$('#table_hse').DataTable( {
		"bDestroy": true,
		"ajax":
		{
			"url": '<?php echo site_url().'engineering/get_hse/'?>'+id,
			"type": "POST",
			"retrieve": true,
			keys: true,
		},
		"order": [[ 0, 'desc' ]],
		"columnDefs": [
			{
				"targets": [ 0 ],
				"visible": false
			}
		]
	});

	//other_save
	var table_mp=$('#table_other').DataTable( {
		"bDestroy": true,
		"ajax":
		{
			"url": '<?php echo site_url().'engineering/get_other/'?>'+id,
			"type": "POST",
			"retrieve": true,
			keys: true,
		},
		"order": [[ 0, 'desc' ]],
		"columnDefs": [
			{
				"targets": [ 0 ],
				"visible": false
			}
		]
	});
}
</script>

<script>
Metronic.startPageLoading({animate: true}); //loding

$(document).ready(function(){

	//UPLOAD File
	// Dropzone.autoDiscover = false;
	// var foto_upload= new Dropzone("#my-dropzone",{
	// 	autoProcessQueue: false,
	// 	url: '<?php echo site_url().'/engineering/upload_dkp'?>',
	// 	maxFilesize: 10,
	// 	// maxFiles: 24,
	// 	parallelUploads: 24,
	// 	uploadMultiple: true,
	// 	method:"post",
	// 	// acceptedFiles:"*",
	// 	paramName:"userfile",
	// 	// dictInvalidFileType:"Type file ini tidak dizinkan",
	// 	addRemoveLinks:true,
	// 	init: function() {
	// 		var submitButton = document.querySelector("#upload_doc")
	// 		myDropzone = this; // closure
  //
	// 		submitButton.addEventListener("click", function() {
	// 			myDropzone.processQueue(); // Tell Dropzone to process all queued files.
	// 			// this.options.autoProcessQueue = true;
	// 			// autoProcessQueue: true;
	// 		});
	// 	}
	// });
  //
	// //Event ketika Memulai mengupload
	// foto_upload.on("sending",function(a,b,c){
	// 	a.id_dkp=$('[name="id_dkp"]').val();
	// 	c.append("id_dkp_file",a.id_dkp); //Menmpersiapkan token untuk masing masing foto
	// });

	var sppr=$('[name="no_sppr"]').val();
	var id_dkp_master=$("#id_dkp_master").val();
	if(!id_dkp_master){
		getData(sppr);
	}else {
		getData1(id_dkp_master);
	}
	Metronic.stopPageLoading();

}); //end dosumnt rrady

$("#id_dkp_master").change(function(){
	Metronic.startPageLoading({animate: true});
	var id_dkp_master=$("#id_dkp_master").val();
	console.log("selected DKP ID : "+id_dkp_master);
	if(id_dkp_master!=''){
		getData1(id_dkp_master);
	}else{
		var name=['id_sppr', 'no_sppr', 'customer', 'order_date', 'delivery_date', 'pic', 'telp', 'ship_to_address', 'ref_no', 'po_no', 'contact_no', 'email', 'fax',  'mhours', 'stainless_steel', 'carbon_steel', 'weight', 'me', 'reserved', 'create_by', 'date_create', 'status','name_project', 'quantity', 'satuan', 'description'];
		var n=name.length;
		for (var i = 0; i < name.length; i++) {
			$("[name='"+name[i]+"']").val('');
			Metronic.stopPageLoading();

		}
	}
	initial_table(id_dkp_master);
});

function getData1(id){
	$('#files').html(' ');
	var url='<?php echo site_url().'/project/get_id_sppr/'?>'+id;
	$.ajax({
		url : url,
		type: "POST",
		// data: formdata,
		processData: false,
		contentType: false,
		dataType: "JSON",
		success: function(data)
		{
			if(data.no_sppr!=''){
				for(var i=0; i<data.link.length; i++){
					$('#files').append(data.link[i]);
					console.log(data.link[i]);
				}
				getData(data.no_sppr);
			}else{
				var name=['id_sppr', 'no_sppr', 'customer', 'order_date', 'delivery_date', 'pic', 'telp', 'ship_to_address', 'ref_no', 'po_no', 'contact_no', 'email', 'fax',  'mhours', 'stainless_steel', 'carbon_steel', 'weight', 'me', 'reserved', 'create_by', 'date_create', 'status','name_project', 'quantity', 'satuan', 'description'];
				var n=name.length;
				for (var i = 0; i < name.length; i++) {
					$("[name='"+name[i]+"']").val('');
					Metronic.stopPageLoading();

				}
			}
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

function getData(id){
	var url='<?php echo site_url().'/marketing/get_sppr_get_id/'?>'+id;
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
			var name=['id_sppr', 'no_sppr', 'customer', 'order_date', 'delivery_date', 'pic', 'telp', 'ship_to_address', 'ref_no', 'po_no', 'contact_no', 'email', 'fax',  'mhours', 'stainless_steel', 'carbon_steel', 'weight', 'me', 'reserved', 'create_by', 'date_create', 'status','name_project', 'quantity', 'satuan', 'description'];
			var n=name.length;
			for (var i = 0; i < name.length; i++) {
				$("[name='"+name[i]+"']").val(data.master[i]);
			}
			$("[name='customer']").val(data.master[data.master.length-1]);

		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			Metronic.stopPageLoading();
			bootbox.alert({
				title: '<p class="text-danger">Error</p>',
				message: 'Error No data can be edit',
			});
		}
	});
}

var url=''; //url for ajax
var type=''; //for defined tipe dkp detail (material, money, dll)

//show modal genegral
function show_modal(type_){
	type=type_;
	if(type!='group'){
		$('#material').modal('show');
		$('.modal-title').text("Add "+type_);
		// get_option();
	}
	else
	{
		$('#add_group').modal('show');
		$('.modal-title').text("Add New Group" );
	}
}

function show_hide(){
	$('.new_main').removeClass('hide');
}

//save material, money, manpower dll
function add(){
	//dstart loading
	Metronic.startPageLoading({animate: true});
	//cek qty_budget
	$qty=$('[name="qty"]').val();
	$qty_budget=$('[name="qty_budget"]').val();

	$bp=$('[name="basic_price"]').val();
	$bpb=$('[name="basic_price_budget"]').val();

	if(parseFloat($qty_budget) > parseFloat($qty)){
		Metronic.stopPageLoading();
		bootbox.alert({
			title: '<p class="text-danger">Error</p>',
			message: 'Qty Budget must <= Qty project',
		});
		return;
	}

	if(parseFloat($bpb) > parseFloat($bp)){
		Metronic.stopPageLoading();
		bootbox.alert({
			title: '<p class="text-danger">Error</p>',
			message: 'Not Allowed',
		});
		return;
	}
	//cek type
	if(type=='material'){ //if material
		url='<?php echo site_url()."project/material_save"?>'; //save
		// var url1='<?php echo site_url().'project/get_materal/'?>'+id_dkp; //get list
		var elm='_material';
	}
	else if (type=='manpower') { //if manpower
		url='<?php echo site_url()."engineering/manpower_save"?>'; //save
		var url1='<?php echo site_url().'engineering/get_manpower/'?>'+id_dkp; //get list
		var elm='_manpower';
	}
	else if(type=='machinery'){ //if machinery
		url='<?php echo site_url()."engineering/machinery_save"?>'; //save
		var url1='<?php echo site_url().'engineering/get_machinery/'?>'+id_dkp; //get list
		var elm='_machinery';
	}
	else if (type=='money') {
		url='<?php echo site_url()."engineering/money_save"?>'; //save
		var url1='<?php echo site_url().'engineering/get_money/'?>'+id_dkp; //get list
		var elm='_money';
	}
	else if (type=='subcont') {
		url='<?php echo site_url()."engineering/subcont_save"?>'; //save
		var url1='<?php echo site_url().'engineering/get_subcont/'?>'+id_dkp; //get list
		var elm='_subcont';
	}
	else if (type=='hse') {
		url='<?php echo site_url()."engineering/hse_save"?>'; //save
		var url1='<?php echo site_url().'engineering/get_hse/'?>'+id_dkp; //get list
		var elm='_hse';
	}
	else if (type=='other') {
		url='<?php echo site_url()."engineering/other_save"?>'; //save
		var url1='<?php echo site_url().'engineering/get_other/'?>'+id_dkp; //get list
		var elm='_other';
	}
	//ajax save
	var formdata_ = new FormData($("#dkp_detail_form")[0]); //get data
	$.ajax({
		url : url,
		type: "POST",
		data: formdata_,
		processData: false,
		contentType: false,
		dataType: "JSON",
		success: function(data)
		{
			$("#material").modal('hide');
			Metronic.stopPageLoading();
			$('#table_manpower').DataTable().ajax.reload(null, false);
			$('#table_material').DataTable().ajax.reload(null, false);
			$('#table_machinery').DataTable().ajax.reload(null, false);
			$('#table_money').DataTable().ajax.reload(null, false);
			$('#table_subcont').DataTable().ajax.reload(null, false);
			$('#table_hse').DataTable().ajax.reload(null, false);
			$('#table_other').DataTable().ajax.reload(null, false);
			// bootbox.alert({
			// 	title: '<p class="text-success">success</p>',
			// 	message: 'Well Done !!!',
			// });

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
}  //eof add



//delete delete_item
function edit_item(id, colom, table){
	$.ajax({
		url : '<?php echo site_url().'/project/get_item'?>',
		type: "POST",
		data: {'id_item': id,'colom':colom, 'table': table},
		dataType: "JSON",
		success: function(data)
		{
			// $("#material").modal('show');
			show_modal('material');
			//tempel to Form_
			Metronic.stopPageLoading();
			var name=['id_mat', 'id_dkp', 'id_material', 'material_dec', 'material_name', 'qty', 'basic_price', 'unit', 'weight', 'remarks','basic_price_budget', 'keterangan_project'];
			var n=name.length;
			for (var i = 0; i < name.length; i++) {
				$("[name='"+name[i]+"']").val(data.material[i]);
			}
			$("[name='qty_budget']").val(data.material[5]);
			$("[name='basic_price_budget']").val(data.material[6]);

		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Error adding / update data');
			$('#btnSave').text('save'); //change button text
			$('#btnSave').attr('disabled',false); //set button enable
		}
	});
}

//delete delete_item
function sent(){
	bootbox.confirm({
		message: "Are you Sure to Sent this DKP ?",
		buttons: {
			cancel: {
				label: 'No',
				className: 'btn-danger'
			},
			confirm: {
				label: 'Yes',
				className: 'btn-success'
			}
		},
		callback: function (result) {
			if(result){
				$.ajax({
					url : '<?php echo site_url().'/project/sent'?>',
					type: "POST",
					data: {'id_dkp': $('[name="id_dkp"]').val()},
					dataType: "JSON",
					success: function(data)
					{
						console.log('send ' +data.id);
						bootbox.alert({
							title: '<p class="text-success">success</p>',
							message: 'Well Done, This DKP has been send !!!',
						});
						window.location.href = "<?php echo site_url().'project/list_dkp_approval'?>";
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						alert('Error adding / update data');
					}
				});
			}
		}
	});
}

</script>
<!-- END JAVASCRIPTS -->
<!-- END BODY -->
</html>
