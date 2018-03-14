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
	<title>List DKP Approval</title>
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
		<?php $this->load->view('include/p_slidebar');?>
		<!-- END SIDEBAR -->
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">
				<?php
				if(isset($_SESSION['username']) && $_SESSION['division']=='project'){
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
										<span class="caption-subject bold uppercase"> List DKP Approval </span>
									</div>
									<div class="actions">
										<!-- <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
									</a> -->
								</div>
							</div>
							<div class="portlet-body">
								<button class="btn btn-success" onclick="reload_tab()">Reload Table <i class="fa fa-refresh"></i></button>
								<br>
								<br>
								<table class="table table-striped table-bordered table-hover" id="table_dkp_draf">
									<thead>
										<tr>
											<th> ID DKP </th>
											<th> NO SPPr </th>
											<th> Customer </th>
											<th> Order Date </th>
											<th> Delivery Date </th>
											<th> Detail Project </th>
											<th> Tag Number</th>
											<th> Status </th>
											<th> Action </th>
										</tr>
									</thead>
									<tbody>
									</tbody>
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
	<div class="col-md-12" style="padding-left: 150px">
		<ul class="feeds" id="files">
		</ul>
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
	$('#dkp').addClass('active open');
	$('#listApproval').parent().addClass('active');
	//dataTables
	var url='<?php echo site_url().'/project/get_dkp_approval'?>';
	$table=$('#table_dkp_draf').DataTable( {
		"ajax":
		{
			"url": url,
			"type": "POST",
			"retrieve": true,
			keys: true,
		},
				"order": [[ 0, 'desc' ]],
	});
});

function approve_dkp(id_dkp)
{
	console.log('idnya : '+id_dkp);
	bootbox.confirm({
		message: "Are you sure want Approve this DKP ?",
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
					url : '<?php echo site_url().'/project/approve'?>',
					type: "POST",
					data: {'id_dkp': id_dkp},
					dataType: "JSON",
					success: function(data)
					{
						console.log('send ' +data.id);
						bootbox.alert({
							title: '<p class="text-success">success</p>',
							message: 'Well Done, This DKP has been Approved!!!',
						});
						$('#table_dkp_draf').DataTable().ajax.reload(null, false);
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

function reload_tab()
{
	$('#table_dkp_draf').DataTable().ajax.reload(null, false);
}

</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
