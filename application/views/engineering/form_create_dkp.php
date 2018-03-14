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
	<title>Create DKP | Edit DKP</title>
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
		<?php $this->load->view('include/e_slidebar');?>
		<!-- END SIDEBAR -->
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">
				<?php
				if(isset($_SESSION['username']) && $_SESSION['division']=='engineering'){
					?>
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
								<span>Create New DKP</span>
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
										<span class="caption-subject bold uppercase"> Create New DKP </span>
									</div>
									<div class="actions">
										<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
										</a>
										<a href="javascript:;" class="collapse">
										</a>
									</div>
								</div>
								<div class="portlet-body table-responsive form">
									<!-- BEGIN FORM-->
									<form id="dkp-form" method="post" enctype="multipart/form-data" class="form-horizontal">
										<input type="hidden" name="id_sppr">
										<input type="hidden" name="id_dkp" value="<?php echo $id_dkp;?>">
										<div class="form-body">
											<h3 class="form-section">General Information</h3>
											<div class="row">
												<div class="col-md-12 hide">
													<div class="form-group">
														<label class="control-label col-md-3">ID Material Counter</label>
														<div class="col-md-9">
															<input id="id_dkp_modal" name="id_counter" type="text" class="form-control" value="<?php echo $id_material_counter;?>" placeholder="">
															<span class="help-block">
															</span>
														</div>
													</div>
												</div>
												<!-- /span -->
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-3">No. SPPr</label>
														<div class="col-md-9">
															<?php
															if(isset($no_sppr)){
																?>
																<input value="<?php echo $no_sppr;?>" name="no_sppr" type="text" class="form-control" placeholder="Nomor SPPr">
																<span class="help-block red-text">
																	Dont Change This Field !!!
																</span>
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
																<!-- <span class="help-block has-error">
																	Please Select One
																</span> -->
															<?php }?>
														</div>
													</div>
												</div>
												<!--/span-->
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-3">DKP No<span class="required" aria-required="true"> * </span></label>
														<div class="col-md-9">
															<input name="dkp_no" value="<?php if(isset($dkp_no)) echo $dkp_no;?>"type="text" class="form-control" placeholder="DKP No">
															<span class="help-block">
																<!-- Please Insert DKP NO on here !!!! -->
															</span>
														</div>
													</div>
												</div>
												<!--/span-->
												<?php if(!isset($dkp_no))
												{
													?>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-3">DWG No</label>
														<div class="col-md-9">
															<input name="dwg_no" value="<?php if(isset($dwg_no)) echo $dwg_no;?>"type="text" class="form-control" placeholder="DWG No">
															<span class="help-block">
																<!-- Please Insert DKP NO on here !!!! -->
															</span>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-3">Tag Number<span class="required" aria-required="true"> * </span></label>
														<div class="col-md-9">
															<input name="tag_number" value="<?php if(isset($dwg_no)) echo $dwg_no;?>"type="text" class="form-control" placeholder="Tag Number">
															<span class="help-block">
																<!-- Please Insert DKP NO on here !!!! -->
															</span>
														</div>
													</div>
												</div>
											<?php } ?>
												<!--/span-->
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-3">Ref. No</label>
														<div class="col-md-9">
															<input disabled name="ref_no" type="text" class="form-control" placeholder="Ref. No">
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
															<input disabled name="customer" type="text" class="form-control" placeholder="Name Customer">
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
															<input disabled name="po_no" type="text" class="form-control" placeholder="PO No">
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
															<input disabled name="order_date" type="text" class="form-control" placeholder="dd/mm/yyyy">
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
															<input disabled name="contact_no" type="text" class="form-control" placeholder="Contact No">
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
															<input disabled name="delivery_date" type="text" class="form-control" placeholder="dd/mm/yyyy">
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
															<input disabled name="email" type="email" class="form-control" placeholder="Email">
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
															<input disabled name="pic" type="text" class="form-control" placeholder="PIC">
															<span class="help-block">
															</span>
														</div>
													</div>
												</div>
												<!-- /span -->
												<!-- <div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-3">Fax</label>
														<div class="col-md-9">
															<input disabled name="fax" type="text" class="form-control" placeholder="Fax">
															<span class="help-block">
															</span>
														</div>
													</div>
												</div> -->
												<!-- /span -->
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-3">Telp</label>
														<div class="col-md-9">
															<input disabled name="telp" type="text" class="form-control" placeholder="Telp">
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
															<textarea disabled name="ship_to_address" type="text" class="form-control" placeholder="Ship to Address"></textarea>
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
												<button id="submit-first" type="submit" class="btn green">Submit</button>
												<!-- <button type="button" onclick="goBack()" class="btn default">Cancel</button> -->
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
		<div class="col-md-12 dkp-isian hide">
			<!-- material -->
			<div class="portlet red-flamingo box full-height-content full-height-content-scrollable">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-flask"></i>Material
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
						<!-- <a href="javascript:;" class="remove">
						</a> -->
					</div>
				</div>
				<div class="portlet-body table-responsive" >
					<a class="btn green btn-add" onclick="show_modal('material')">
						<i class="fa fa-plus"></i> Add Material
					</a>
					<a class="btn green btn-add" data-toggle='modal' href="#upload_excel">
						<i class="fa fa-plus "></i> Import Material
					</a>
					<br>
					<br>
					<table class="table table-striped table-bordered table-hover" id="table_material">
						<thead>
							<tr>
								<th> Action </th>
								<th> ID </th>
								<th> Id Material</th>
								<th> Type</th>
								<th> Spesification</th>
								<th> Description </th>
								<th> Material Name</th>
								<th> Qty</th>
								<th> UoM</th>
								<th> Weight (KG)</th>
								<th> Basic Price</th>
								<th> Tot Basic Price</th>
								<th> Remarks </th>
								<th> Status </th>
								<th> Create By </th>
								<th> Update By </th>
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
						<!-- <a href="javascript:;" class="remove">
						</a> -->
					</div>
				</div>
				<div class="portlet-body table-responsive ">
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
						<!-- <a href="javascript:;" class="remove">
						</a> -->
					</div>
				</div>
				<div class="portlet-body table-responsive">
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
						<!-- <a href="javascript:;" class="remove">
						</a> -->
					</div>
				</div>
				<div class="portlet-body table-responsive">
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
			<div class="portlet blue-hoki box full-height-content full-height-content-scrollable hide">
				<div class="portlet-title" >
					<div class="caption">
						<i class="fa fa-rocket"></i>Sub Contractor
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
						<!-- <a href="javascript:;" class="remove">
						</a> -->
					</div>
				</div>
				<div class="portlet-body table-responsive">
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
			<div class="portlet purple-studio box full-height-content full-height-content-scrollable hide">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-fire-extinguisher"></i>HSE
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
						<!-- <a href="javascript:;" class="remove">
						</a> -->
					</div>
				</div>
				<div class="portlet-body table-responsive" >
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
			<div class="portlet grey-cascade box full-height-content full-height-content-scrollable hide">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-cube"></i>Other
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
						<!-- <a href="javascript:;" class="remove">
						</a> -->
					</div>
				</div>
				<div class="portlet-body table-responsive" >
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
			<div class="portlet red box full-height-content full-height-content-scrollable">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-file"></i>Attachment
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
						<!-- <a href="javascript:;" class="remove">
						</a> -->
					</div>
				</div>
				<div class="portlet-body table-responsive" >
					 <ul class="list-file">
						 <?php
						 		if(isset($files)){
								for ($i=2; $i < count($files) ; $i++) {
						 ?>
						 <li><i class="fa fa-file"></i>
							 <a download target="_blank" href="<?php echo base_url().'uploads/dkp/'.$id_dkp.'/'.$files[$i]; ?>" >
							 <?php echo $files[$i]; ?></a>
						 </li>
					 <?php } }?>
					 </ul>
					 <div class="upload-file">
					<form action="#" class="dropzone dz-clickable" id="my-dropzone">
						<div class="dz-default dz-message">
							<span>Drop files here to upload</span>
						</div>
					</form>
					<br>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-offset-4 col-md-8">
										<button id="upload_doc" class="btn green">Upload</button>
									</div>
								</div>
							</div>
							<div class="col-md-3"></div>
						</div>
					</div>
				</div>
				</div>
			</div>
			<!-- /END ATTACHMENT -->
			<div class="attacment-file portlet blue box full-height-content full-height-content-scrollable">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-file"></i>Action
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
						<!-- <a href="javascript:;" class="remove">
						</a> -->
					</div>
				</div>
				<div class="portlet-body table-responsive" >
					<div class="form-actions">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-offset-4 col-md-8">
										<button id="submit-all" onclick="sent()" type="submit" class="btn green btn-open">Submit</button>
										<button id="submit-all" onclick="sent_approve()" type="submit" class="btn green btn-approve btn-approval hide">Approve</button>
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
				<form id="dkp_detail_form" method="post" enctype="multipart/form-data" class="form-horizontal">
					<input type="hidden" name="id_sppr">
					<div class="form-body">
						<!-- <h3 class="form-section">General Information</h3> -->
						<div class="row">
							<div class="col-md-12 ">
								<div class="form-group">
									<label class="control-label col-md-3">ID DKP</label>
									<div class="col-md-9">
										<input id="id_dkp_modal" name="id_dkp" type="text" class="form-control" value="<?php echo $id_dkp;?>" placeholder="">
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!-- /span -->
							<div class="col-md-12 hide">
								<div class="form-group">
									<label class="control-label col-md-3">ID Material Actual</label>
									<div class="col-md-9">
										<input  name="id_material" type="text" class="form-control" value="" placeholder="">
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!-- /span -->
							<div class="col-md-12 ">
								<div class="form-group">
									<label class="control-label col-md-3">ID Material </label>
									<div class="col-md-9">
										<input id="id_dkp_modal" name="material_no" type="text" class="form-control" value="" placeholder="">
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!-- /span -->
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Group<span class="required" aria-required="true"> * </span></label>
									<div class="col-md-9">
										<input name="group_id" class="js-data-example-ajax form-control">
										<span class="help-block">
											<a class="btn green" onclick="show_modal_type('group')">
												<i class="fa fa-plus"></i> Add
											</a>
										</span>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Description<span class="required" aria-required="true"> * </span></label>
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
									<label class="control-label col-md-3">Name<span class="required" aria-required="true"> * </span></label>
									<div class="col-md-9">
										<input name="material_name" type="text" class="form-control" placeholder="Name">
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!-- /span -->
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Quantity<span class="required" aria-required="true"> * </span></label>
									<div class="col-md-9">
										<input name="qty" type="number" class="form-control" placeholder="Quantity">
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Unit<span class="required" aria-required="true"> * </span></label>
									<div class="col-md-9">
										<input name="unit" type="text" class="form-control" placeholder="Unit">
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Weight(KG)</label>
									<div class="col-md-9">
										<input name="weight" type="text" class="form-control" placeholder="Weight">
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Basic Price<span class="required" aria-required="true"> * </span></label>
									<div class="col-md-9">
										<input name="basic_price" type="text" class="form-control" placeholder="Basic Price">
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-3">Total Basic Price<span class="required" aria-required="true"> * </span></label>
									<div class="col-md-9">
										<input name="tot_basic_price" type="text" class="form-control">
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
										<textarea name="remarks" type="text" class="form-control" placeholder="Remarks"></textarea>
										<span class="help-block">
										</span>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
					</div>
				</div>
			</form>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn default">Close</button>
				<button type="button" onclick="add()" class="btn green">Save</button>
			</div>
		</div>
	</div>
</div>
<!-- ./END MODAL -->
<!-- BEGIN Modal -->
<div id="add_group" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Add Type</h4>
			</div>
			<div class="modal-body">
				<div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
					<form id="type_form" method="post" enctype="multipart/form-data" class="form-horizontal">
						<input type="hidden" name="id_sppr">
						<div class="form-body">
							<!-- <h3 class="form-section">General Information</h3> -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label col-md-3">Type<span class="required" aria-required="true"> * </span></label>
										<div class="col-md-9">
											<input name="level1" class="main-group form-control">
											<span class="help-block">
												<a class="btn green" onclick="show_hide()">
													<i class="fa fa-plus"></i> Add
												</a>
											</span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-12 new_main hide">
									<div class="form-group">
										<label class="control-label col-md-3">New Type<span class="required" aria-required="true"> * </span></label>
										<div class="col-md-9">
											<input name="main_name" type="text" class="form-control" placeholder="Input New type">
											<span>
												<a class="btn green" onclick="save_type_main()">
													<i class="fa fa-save"></i> save
												</a>
											</span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label col-md-3">New Group<span class="required" aria-required="true"> * </span></label>
										<div class="col-md-9">
											<input name="level2" type="text" class="form-control" placeholder="Description">
											<span class="help-block">
											</span>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn default">Close</button>
				<button type="button" onclick="add_type()" class="btn green">Save</button>
			</div>
		</div>
	</div>
</div>
<!-- ./END MODAL -->
<!-- BEGIN Modal -->
<div id="upload_excel" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Import Material</h4>
			</div>
			<div class="modal-body">
				<form action="#" class="dropzone dz-clickable" id="my-dropzone-excel">
					<div class="dz-default dz-message">
						<span>Drop files here to upload</span>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn default">Close</button>
				<button type="button" id="reset_file" class="btn btn-red">Reset</button>
				<button type="button" id="import-excel" class="btn green">Import</button>
			</div>
		</div>
	</div>
</div>
<input type="hidden" name="status_prog" value="<?php if(isset($status_prog)) echo $status_prog;?>">
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
<!-- <script src="https://cdn.datatables.net/plug-ins/1.10.16/sorting/date-dd-MMM-yyyy.js" type="text/javascript"></script> -->
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url().'assets/global/plugins/datatables/media/js/jquery.dataTables.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js'?>"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url().'assets/js-custom/sort-material.js'?>"></script>
<script>
var status_prog='';
var global_id_dkp='';
var flag=true;
var $table='';
var id_dkp='';
jQuery(document).ready(function() {
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	QuickSidebar.init(); // init quick sidebar
	Demo.init(); // init demo features
	FormSamples.init();

	//active slide bar
	$('#dkp').addClass('active open');
	$('#createDKP').addClass('active');

	//dataTable material
	id_dkp=$('[name="id_dkp"]').val();
	global_id_dkp=id_dkp;
	console.log('dkp id: '+id_dkp);
	if(id_dkp!=''){ //if edit  dkp was click
		initial_table(id_dkp);
	} //end if

	var status_prog='<?php if(isset($status_prog)) echo $status_prog;?>';
	if(status_prog=='approval'){
		$(".btn-approval").removeClass('hide');
		$(".btn-open").addClass('hide');
		$(".list-file").removeClass('hide');
	}

	//

	var basic_price=$('[name="basic_price"]');
	basic_price.keyup(function(){
		console.log('bp : '+$(this).val());
		$('[name="tot_basic_price"]').val(parseInt($(this).val())*parseInt($('[name="qty"]').val()));
	});

	var qty=$('[name="qty"]');
	qty.keyup(function(){
		// console.log('bp : '+$(this).val());
		$('[name="tot_basic_price"]').val(parseInt($(this).val())*parseInt($('[name="basic_price"]').val()));
	});

});

//reset form
function reset_form()
{
	$('#dkp_detail_form')[0].reset(); // reset form on modals
}

function initial_table(id_dkp)
{
	$('.dkp-isian').removeClass('hide');
	flag=false;
	$('.foot-form').addClass('hide');
	//dataTables material
	var url='<?php echo site_url().'engineering/get_materal/'?>'+id_dkp;
	$table=$('#table_material').DataTable( {
		"bDestroy": true,
		"ajax":
		{
			"url": url,
			"type": "POST",
			"retrieve": true,
			keys: true,
		},
		"order": [[ 1, 'desc' ]],
		"columnDefs": [
			{
				"targets": [ 1 ],
				"visible": false
			},
		 { type: 'date-uk', targets: 2 }
		],
		"drawCallback": function( settings ) {
				var api = this.api();

				// Output the data for the visible rows to the browser's console
				if(api.data().length==0){
					$('.table_material').addClass('hide');
				}else{
					$('.table_material').removeClass('hide');
				}
				// var status_prog='<?php (isset($status_prog)) ? 'approved' : ''; ?>';
				var status_prog='<?php if(isset($status_prog)) echo $status_prog;?>';
				var level_login='<?php if(isset($_SESSION['level'])) echo $_SESSION['level'];?>';
				// var status_prog=$('[name="status_prog"]').val();
				if(status_prog=='approved' || status_prog=='hold'){
				// api.column( 0 ).visible( false );
				$(".button-edit").addClass('hide');
				$(".approved").removeClass('hide');
				$(".upload-file").addClass('hide');
				$(".list-file").removeClass('hide');
				$('.attacment-file').addClass('hide');
				$('.btn-add').hide();
				}else {
				api.column( 0 ).visible( true );
				}
				console.log('levelnya :'+level_login);
				if(level_login=='kabag'){
					$(".button-cancel").removeClass('hide');
				}else {
					$(".button-cancel").addClass('hide');
				}
			}
	});

	//dataTables material approved
	// var url='<?php echo site_url().'engineering/get_materal/'?>'+id_dkp;
	// $table=$('#table_material_approved').DataTable( {
	// 	"bDestroy": true,
	// 	"ajax":
	// 	{
	// 		"url": url,
	// 		"type": "POST",
	// 		"retrieve": true,
	// 		keys: true,
	// 	},
	// 	"order": [[ 1, 'desc' ]],
	// 	"columnDefs": [
	// 		{
	// 			"targets": [ 1 ],
	// 			"visible": false
	// 		},
	// 		{
	// 			"targets": [ 0 ],
	// 			"visible": false
	// 		}
	// 	]
	// });

	//man ManPower
	var table_mp=$('#table_manpower').DataTable( {
		"bDestroy": true,
		"ajax":
		{
			"url": '<?php echo site_url().'engineering/get_manpower/'?>'+id_dkp,
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
			"url": '<?php echo site_url().'engineering/get_machinery/'?>'+id_dkp,
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
			"url": '<?php echo site_url().'engineering/get_money/'?>'+id_dkp,
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
			"url": '<?php echo site_url().'engineering/get_subcont/'?>'+id_dkp,
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
			"url": '<?php echo site_url().'engineering/get_hse/'?>'+id_dkp,
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
			"url": '<?php echo site_url().'engineering/get_other/'?>'+id_dkp,
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
	Dropzone.autoDiscover = false;
	var foto_upload= new Dropzone("#my-dropzone",{
		autoProcessQueue: false,
		url: '<?php echo site_url().'/engineering/upload_dkp'?>',
		maxFilesize: 20,
		// maxFiles: 24,
		parallelUploads: 24,
		uploadMultiple: true,
		method:"post",
		// acceptedFiles:"*",
		paramName:"userfile",
		// dictInvalidFileType:"Type file ini tidak dizinkan",
		addRemoveLinks:true,
		init: function() {
			var submitButton = document.querySelector("#upload_doc")
			myDropzone = this; // closure

			submitButton.addEventListener("click", function() {
				myDropzone.processQueue(); // Tell Dropzone to process all queued files.
				// this.options.autoProcessQueue = true;
				// autoProcessQueue: true;
			});
		}
	});

	//Event ketika Memulai mengupload
	foto_upload.on("sending",function(a,b,c){
		a.id_dkp=$('[name="id_dkp"]').val();
		c.append("id_dkp_file",a.id_dkp); //Menmpersiapkan token untuk masing masing foto
	});

		foto_upload.on("success", function(file, response) {
			location.reload();
		});

	var excel_upload= new Dropzone("#my-dropzone-excel",{
		autoProcessQueue: false,
		url: '<?php echo site_url().'/engineering/upload_excel'?>',
		maxFilesize: 20,
		maxFiles: 1,
		// parallelUploads: 24,
		// uploadMultiple: true,
		method:"post",
		// acceptedFiles:"*",
		paramName:"userfile",
		// dictInvalidFileType:"Type file ini tidak dizinkan",
		addRemoveLinks:true,
		init: function() {
			var submitButton1 = document.querySelector("#import-excel")
			myDropzone1 = this; // closure

			submitButton1.addEventListener("click", function() {
				myDropzone1.processQueue(); // Tell Dropzone to process all queued files.
				// this.options.autoProcessQueue = true;
				// autoProcessQueue: true;
			});

			var reset_file= document.querySelector("#reset_file")
			reset_file.addEventListener('click', function(){
				myDropzone1.removeAllFiles();
			});
		}
	});

	//Event ketika Memulai mengupload
	excel_upload.on("sending",function(a,b,c){
		a.id_dkp=$('[name="id_dkp"]').val();
		c.append("id_dkp_file",a.id_dkp); //Menmpersiapkan token untuk masing masing foto
		a.sppr=$('[name="no_sppr"]').val();
		c.append("no_sppr",a.sppr); //Menmpersiapkan token untuk masing masing foto
	});

	//selesai upload
	excel_upload.on("success", function(file, response) {
		excel_upload.removeFile(file);
		// console.log(response.status);
		var obj = jQuery.parseJSON(response)
		console.log(obj.status);
		console.log(obj.message);
		if(obj.status){
			bootbox.alert({
				title: '<p class="text-success">success</p>',
				message: obj.message,
			});
			// location.reload();
			$('#table_material').DataTable().ajax.reload(null, false);
			$("#upload_excel").modal('hide');
		}
	});

	var sppr=$('[name="no_sppr"]').val();
	getData(sppr);
	Metronic.stopPageLoading();

	//submit dkp master using ajax
	$("#dkp-form").submit(function(event)
	{
		event.preventDefault(); //not reload
		//console.log(formdata);
		var dkp_input=$("[name='dkp_no']").val();
		if(dkp_input==''){
			$("[name='dkp_no']").next().text('Cannot Empty !!!');
			$("[name='dkp_no']").parent().parent().addClass('has-error');
			alert('DKP NO Cannot Empty !!');
			return;
		}

		var tag_no=$("[name='tag_number']").val();
		if(tag_no==''){
			$("[name='tag_number']").next().text('Cannot Empty !!!');
			$("[name='tag_number']").parent().parent().addClass('has-error');
			alert('Tag Number Cannot Empty !!');
			return;
		}
		var formdata = new FormData($("#dkp-form")[0]); //get data form
		Metronic.startPageLoading({animate: true});
		$('.form-group').removeClass('has-error'); // clear error class
		// $('.help-block').empty(); // clear error string
		$.ajax({
			url : '<?php echo site_url().'/engineering/save_dkp_master'?>', //function on controller
			type: "POST",
			data: formdata, //data
			processData: false,
			contentType: false,
			dataType: "JSON",
			success: function(data)
			{
				$('#id_dkp_modal').val(data.dkp_id); //assigment id dkp master for other table such as material man power etc
				global_id_dkp=data.dkp_id;
				window.location.href="<?php echo site_url().'engineering/create_dkp?sppr=';?>"+$('[name="no_sppr"]').val()+'&id_dkp='+data.dkp_id+'&dkp_no='+data.dkp_no;
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

$("#id_sppr").change(function(){
	Metronic.startPageLoading({animate: true});
	var no_sppr=$("#id_sppr").val();
	console.log("no sppr: "+no_sppr);
	if(no_sppr!=''){
		getData(no_sppr);
	}else{
		var name=['id_sppr', 'no_sppr', 'customer', 'order_date', 'delivery_date', 'pic', 'telp', 'ship_to_address', 'ref_no', 'po_no', 'contact_no', 'email', 'fax',  'mhours', 'stainless_steel', 'carbon_steel', 'weight', 'me', 'reserved', 'create_by', 'date_create', 'status','name_project', 'quantity', 'satuan', 'description'];
		var n=name.length;
		for (var i = 0; i < name.length; i++) {
			$("[name='"+name[i]+"']").val('');
			Metronic.stopPageLoading();

		}
	}
});

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
			var name=['id_sppr', 'no_sppr', 'customer', 'order_date', 'delivery_date', 'pic', 'telp', 'ship_to_address', 'ref_no', 'po_no', 'contact_no', 'email', 'fax',  'mhours', 'stainless_steel', 'carbon_steel', 'weight', 'me', 'reserved', 'create_by', 'date_create', 'status','name_project', 'quantity', 'satuan', 'description', 'customer'];
			var n=name.length;
			for (var i = 0; i < name.length; i++) {
				$("[name='"+name[i]+"']").val(data.master[i]);
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

var url=''; //url for ajax
var type=''; //for defined tipe dkp detail (material, money, dll)

//show modal genegral
function show_modal(type_){
	reset_form();
	$('[name="id_dkp"]').val(global_id_dkp);
	type=type_;
	if(type!='group'){
		$('#material').modal('show');
		$('.modal-title').text('Add '+type_);
		get_option();
	}
	else
	{
		$('#add_group').modal('show');
		$('.modal-title').text("Add New Group" );
	}

	//update material no
	$('[name="material_no"]').val('MT-'+$('[name="no_sppr"]').val()+'-'+$('[name="id_counter"]').val());
}

function show_modal_type(type_){
	$('#add_group').modal('show');
	$('.modal-title').text("Add New Group" );
}

function show_hide(){
	$('.new_main').removeClass('hide');
}

function get_option(){
	$.ajax({
		url : '<?php echo site_url().'engineering/get_group'?>',
		type: "GET",
		dataType: "JSON",
		success: function(data)
		{
			$('.js-data-example-ajax').select2({
				data: data.result
			});
			$('.main-group').select2({
				data: data.main
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
//save material, money, manpower dll
function add(){
	//dstart loading
	Metronic.startPageLoading({animate: true});
	//cek type
	if(type=='material'){ //if material
		url='<?php echo site_url()."engineering/material_save"?>'; //save
		var url1='<?php echo site_url().'engineering/get_materal/'?>'+id_dkp; //get list
		var elm='_material';
	}
	else if (type=='edit') {
		url='<?php echo site_url()."engineering/edit_material"?>'; //save
		var url1='<?php echo site_url().'engineering/get_materal/'?>'+id_dkp; //get list
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
			if(type!='edit'){
				$('[name="id_counter"]').val(parseInt($('[name="id_counter"]').val())+1);
			}
			Metronic.stopPageLoading();
			$('#table_manpower').DataTable().ajax.reload(null, false);
			$('#table_material').DataTable().ajax.reload(null, false);
			$('#table_machinery').DataTable().ajax.reload(null, false);
			$('#table_money').DataTable().ajax.reload(null, false);
			$('#table_subcont').DataTable().ajax.reload(null, false);
			$('#table_hse').DataTable().ajax.reload(null, false);
			$('#table_other').DataTable().ajax.reload(null, false);
			bootbox.alert({
				title: '<p class="text-success">success</p>',
				message: 'Well Done !!!',
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
}  //eof add

function save_type_main(){

	var url_n='<?php echo site_url()."engineering/save_main_type"?>'; //save
	var formdata = new FormData($("#type_form")[0]); //get data
	$.ajax({
		url : url_n,
		type: "POST",
		data: formdata,
		processData: false,
		contentType: false,
		dataType: "JSON",
		success: function(data)
		{
			// console.log("sucsess");
			// $('#new_main').removeClass('hide');
			get_option();
			$('[name="level1"]').val(data.id).trigger('change')
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

function add_type()
{
	var url_new='<?php echo site_url()."engineering/save_type"?>'; //save
	var formdata = new FormData($("#type_form")[0]); //get data
	$.ajax({
		url : url_new,
		type: "POST",
		data: formdata,
		processData: false,
		contentType: false,
		dataType: "JSON",
		success: function(data)
		{
			// console.log("sucsess");
			$('#add_group').modal('hide');
			get_option();
			$('[name="group_id"]').val(data.id).trigger('change')
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

//delete delete_item
function cancel_item(id, colom, table){
	console.log(id+ '  ' + table);
	bootbox.confirm({
		message: "This is a confirm with custom button text and color! Do you like it?",
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
			console.log('This was logged in the callback: ' + result);
			if(result){
				$.ajax({
					url : '<?php echo site_url().'/engineering/cancel_item'?>',
					type: "POST",
					data: {'id_item': id,'colom':colom, 'table': table},
					dataType: "JSON",
					success: function(data)
					{
						if(data.status){
						// bootbox.alert('success delete data');
						$('.modal-transaction').modal('hide');
						$('#table_manpower').DataTable().ajax.reload(null, false);
						$('#table_material').DataTable().ajax.reload(null, false);
						$('#table_machinery').DataTable().ajax.reload(null, false);
						$('#table_money').DataTable().ajax.reload(null, false);
						$('#table_subcont').DataTable().ajax.reload(null, false);
						$('#table_hse').DataTable().ajax.reload(null, false);
						$('#table_other').DataTable().ajax.reload(null, false);
					}else{
						bootbox.alert({
							title: '<p class="text-success">Error</p>',
							message: 'Cannot cancel , Status item is '+data.item+' !!!',
						});
					}
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						alert('Error adding / update data');
						$('#btnSave').text('save'); //change button text
						$('#btnSave').attr('disabled',false); //set button enable
					}
				});
			}
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
					url : '<?php echo site_url().'/engineering/sent'?>',
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
						window.location.href = "<?php echo site_url().'engineering/list_dkp_approval'?>";
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

function edit_item(id, colom, table){
	$.ajax({
		url : '<?php echo site_url().'/engineering/get_material_by_id'?>',
		type: "POST",
		data: {'id_item': id,'colom':colom, 'table': table},
		dataType: "JSON",
		success: function(data)
		{
			show_modal('edit');
			// bootbox.alert('success delete data');
			var col=['dkp_id', 'id_material', 'material_no','material_dec', 'material_name', 'qty', 'unit', 'weight', 'remarks', 'basic_price', 'tot_basic_price'];
			for(var i=0; i<col.length; i++){
				$('[name="'+col[i]+'"]').val(data.material[i]);
			}
			$('[name="group_id"]').val(data.material[data.material.length-1]).trigger('change');
			// $("#material").modal('show');

		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Error adding / update data');
			$('#btnSave').text('save'); //change button text
			$('#btnSave').attr('disabled',false); //set button enable
		}
	});
}

function sent_approve(){
	bootbox.confirm({
	message: "Are you sure to approve this DKP?",
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
						url : '<?php echo site_url().'/engineering/approve'?>',
						type: "POST",
						// data: {'id_dkp': $('[name="id_dkp"]').val()},
						data: {'id_dkp': id_dkp},
						dataType: "JSON",
						success: function(data)
						{
							console.log('send ' +data.id);
							bootbox.alert({
								title: '<p class="text-success">success</p>',
								message: 'Well Done, This DKP has been approved !!!',
							});
							window.location.href = "<?php echo site_url().'engineering/list_dkp_approved'?>";

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
