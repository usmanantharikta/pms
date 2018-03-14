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
<title>Create BPMB</title>
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
<?php $this->load->view('include/ppc_slidebar');?>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<?php
			if(isset($_SESSION['username']) && $_SESSION['division']=='ppc'){
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
								<span class="caption-subject bold uppercase"> Create New BPMB </span>
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

                          if(!isset($id_dkp_all)){
                            ?>
                          <input value="<?php echo $id_dkp;?>" name="id_dkp" type="text" class="form-control" placeholder="Nomor SPPr">
                        <?php }
                        else{
                        ?>
                        <select id="id_dkp_master" name="id_dkp" class="form-control" id="form_control_1">
                          <!-- <option value=""></option> -->
                          <?php
                          // var_dump($no_sppr_all);
                          foreach ($id_dkp_all as $key) {
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
                          <input value="<?php echo $no_sppr;?>" name="no_sppr" type="text" class="form-control" placeholder="Nomor SPPr">
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
                          <input name="ref_no" type="text" class="form-control" >
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
                          <input name="po_no" type="text" class="form-control" placeholder="PO No.">
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
                          <input name="email" type="email" class="form-control" >
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
                          <input name="pic" type="text" class="form-control">
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
                          <input name="fax" type="text" class="form-control">
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
                          <input name="telp" type="text" class="form-control" >
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
                          <textarea name="ship_to_address" type="text" class="form-control" ></textarea>
                          <span class="help-block">
                         </span>
                        </div>
                      </div>
                    </div>
                    <!-- /span -->
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">project_name</label>
												<div class="col-md-9">
													<textarea name="name_project" type="text" class="form-control" ></textarea>
													<span class="help-block">
												 </span>
												</div>
											</div>
										</div>
										<!-- /span -->
                  </div>
                  <!--/row-->
                <div class="form-actions foot-form">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                          <button id="submit-first" type="submit" class="btn green">Next</button>
                          <button type="button" class="btn default">Cancel</button>
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
							<a href="javascript:;" class="remove">
							</a>
						</div>
					</div>
					<div class="portlet-body" >
						<br>
						<br>
						<form id="form_bpmb" method="post" enctype="multipart/form-data" class="form-horizontal">
							  <div class="form-body">
									<table class="table table-striped table-bordered table-hover" id="table_material">
									 <thead>
												<tr>
													<th class="table-checkbox">
														<!-- <input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/> -->
													</th>
														<th> Action </th>
														<th> Id Material</th>
														<th> Id Material</th>
														<th> Type</th>
														<th> Spc</th>
														<th> Description </th>
														<th> Material Name</th>
														<!-- <th> Qty</th> -->
														<th> Unit</th>
														<th> Weight (KG)</th>
														<th> Tgl Butuh </th>
														<th> Qty Bgt </th>
														<th> Qty PR </th>
														<th> Qty BPMB </th>
														<th> Qty BPB	 </th>

														<!-- <th> Tot PB (Rp)</th> -->
												</tr>
										</thead>
										<tbody>
										</tbody>
								</table>
							</div>
				</form>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-offset-5 col-md-6">
								<button id="submit-first" onclick="build_bpmb()" class="btn green">Create BPMB</button>
								<button type="button" onclick="cancel_ch()" class="btn default">Cancel</button>
							</div>
						</div>
					</div>
					<div class="col-md-6">
					</div>
				</div>
				<!-- button -->
				</div>
				</div>
				<!-- ./end masterial -->
				<!-- BEGIN ATTACHMENT -->
				<div class="portlet red box full-height-content full-height-content-scrollable hide">
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
						<div >
						<ul id="files">
						</ul>
					</div>
				</div>
				</div>
				<!-- /END ATTACHMENT -->
				<div class="portlet blue box full-height-content full-height-content-scrollable hide">
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
											<button type="button" class="btn default">Cancel</button>
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
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Add Material</h4>
			</div>
			<div class="modal-body">
				<!-- <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1"> -->
					<form id="form-bpmb-final" method="post" enctype="multipart/form-data" class="form-horizontal">
						<input type="hidden" name="id_material">
						<input type="hidden" name="qty_requested">
						<div class="form-body">
							<!-- <h3 class="form-section">General Information</h3> -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-3">BPMB NO</label>
										<div class="col-md-9">
											<input name="bpmb_no" type="text" class="form-control" placeholder="BPMB NO">
											<span class="help-block">
											 </span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6 ">
                  <div class="form-group">
                    <label class="control-label col-md-3">Tanggal</label>
                    <div class="col-md-9">
                      <input name="create_date" type="text" disabled class="form-control datepicker" value="<?php echo date('Y-m-d'); ?>" placeholder="Tanggal">
                      <span class="help-block">
                       </span>
                    </div>
                  </div>
                </div>
                <!--/span-->
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label col-md-3">Project Name</label>
                    <div class="col-md-9">
                      <input name="name_proj" type="text" class="form-control" value="" placeholder="">
                      <span class="help-block">
                    </span>
                    </div>
                  </div>
                </div>
                <!-- /span -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label col-md-3">NO SPPr</label>
                    <div class="col-md-9">
                      <input name="no_sppr_bpmb" type="text" class="form-control" value="" placeholder="">
                      <span class="help-block">
                    </span>
                    </div>
                  </div>
                </div>
                <!-- /span -->
								<div class="col-md-6 hide">
									<div class="form-group">
										<label class="control-label col-md-3">ID DKP</label>
										<div class="col-md-9">
											<input name="dkp_id_bpmb" type="text" class="form-control" value="<?php echo $id_dkp;?>" placeholder="">
											<span class="help-block">
										</span>
										</div>
									</div>
								</div>
								<!-- /span -->
								<div class="col-md-6 ">
									<div class="form-group">
										<label class="control-label col-md-3">DKP NO</label>
										<div class="col-md-9">
											<input name="dkp_no_bpmb" type="text" class="form-control" value="<?php echo $id_dkp;?>" placeholder="">
											<span class="help-block">
										</span>
										</div>
									</div>
								</div>
								<!-- /span -->
								<div class="col-md-6 ">
									<div class="form-group">
										<label class="control-label col-md-3">Title</label>
										<div class="col-md-9">
											<input name="nama_project" type="text" class="form-control" value="<?php echo $id_dkp;?>" placeholder="">
											<span class="help-block">
										</span>
										</div>
									</div>
								</div>
								<!-- /span -->
								<div class="col-md-6 hide">
									<div class="form-group">
										<label class="control-label col-md-3">ID Material</label>
										<div class="col-md-9">
											<input name="material_id" class="js-data-example-ajax form-control">
											<span class="help-block">
											 </span>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-12">
									<table id="bpmb-tab" class="table table-striped table-bordered table-hover">
									 <thead>
												<tr>
														<th style="display: none"> asdas</th>
														<th> Id Material</th>
														<th> Komponen</th>
														<th> Jenis Bahan</th>
														<th> Nama Bahan</th>
														<th> Qty </th>
														<th> Unit</th>
														<th> Tgl Butuh</th>
														<th> Keterangan </th>
												</tr>
										</thead>
										<tbody class="isi-table">

										</tbody>
								</table>
								</div>
						</div>
					</div>
			<!-- </div> -->
		</form>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn default">Close</button>
				<button type="button" onclick="save_bpmb_final()" class="btn green">Save</button>
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
<script>
var flag=true;
var $table='';
var global_id_dkp='';
jQuery(document).ready(function() {

	//setup metronic
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	QuickSidebar.init(); // init quick sidebar
	Demo.init(); // init demo features
	FormSamples.init();

	//active slide bar
	$('#bpmb').addClass('active open');
	$('#createBPMB').addClass('active');

	//date datepicker
	$('.datepicker').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd',
	});

	//dataTable material
	global_id_dkp=$('[name="id_dkp"]').val(); //get dkp id
	getData1(global_id_dkp); //get data sppr by dkp_id
	console.log('dkp id: '+global_id_dkp);
	if(global_id_dkp!=''){ //if edit  dkp was click
		initial_table(global_id_dkp);
	} //end if


		$('#table_material').find('.group-checkable').change(function () {
				$('.checkboxes').parent().removeClass('checked');
				var set = jQuery(this).attr("data-set");
				var checked = jQuery(this).is(":checked");
				jQuery(set).each(function () {
						if (checked) {
								$(this).attr("checked", true);
								$(this).parents('tr').addClass("active");
						} else {
								$(this).attr("checked", false);
								$(this).parents('tr').removeClass("active");
								$('.checkboxes').parent().removeClass('checked');
						}
				});
				jQuery.uniform.update(set);
		});

		$('#table_material').on('change', 'tbody tr .checkboxes', function () {
				$(this).parents('tr').toggleClass("active");
		});
});

function cancel_ch()
{
	console.log("sdasdsa");
	//$('.checkboxes').attr('checked', true); // Unchecks it
	$('.checkboxes').attr("checked", false);
	$('.checkboxes').parents('tr').removeClass("active");
	$('.checkboxes').parents('span').removeClass("checked");
}

function initial_table(id)
{
	$('.dkp-isian').removeClass('hide');
	flag=false;
	$('.foot-form').addClass('hide');
		//dataTables material
	var url='<?php echo site_url().'ppc/get_material_progress/'?>'+id;
		$table=$('#table_material').DataTable( {
			"bDestroy": true,
		"ajax":
		{
				"url": url,
				"type": "POST",
				"retrieve": true,
				keys: true,
		},
		"order": [[ 1, 'asc' ]],
		"columnDefs": [
	 {
			 "targets": [ 1 ],
			 "visible": false
	 },
	 {
			 "targets": [ 2 ],
			 "visible": false
	 }
 ],
 "drawCallback": function( settings ) {
	 Metronic.init(); // init metronic core components

	 }
	});
}
</script>

<script>
Metronic.startPageLoading({animate: true}); //loding

$(document).ready(function(){

	var sppr=$('[name="no_sppr"]').val();
	// getData(sppr);
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

	 //get sppr_id by id_dkp
	 function getData1(id){
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
						getData(data.no_sppr);
						for(var i=0; i<data.link.length; i++){
							$('#files').append(data.link[i]);
							console.log(data.link[i]);
						}
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
		 Metronic.startPageLoading({animate: true});
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
						$('[name=nama_project]').val(data.master[22]+'-'+data.master[23]+'-'+data.master[24]);
						$('[name="customer"]').val(data.master[data.master.length-1]);
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

	 function build_bpmb()
	 {
		 Metronic.startPageLoading({animate: true});
		 $('.isi-table').html('');
		 var formdata_ = new FormData($("#form_bpmb")[0]); //get data
		 $.ajax({
				 url : '<?php echo site_url().'/ppc/build_bpmb'?>',
				 type: "POST",
				 // data: {'id_item': id,'colom':colom, 'table': table},
				 data: formdata_,
				 processData: false,
				 contentType: false,
				 dataType: "JSON",
				 success: function(data)
				 {
					 var isi='';
					 for (var i = 0; i < data.table.length; i++) {
						 isi+='<tr>';
						 for (var j = 0; j < data.table[i].length-1; j++) {
						 	isi+='<td>';
							isi+=data.table[i][j];
							isi+='</td>';
						 }
						 isi+='</td>';
					 }
					 // $("#material").modal('show');
					 $('.isi-table').html(isi);
					 $('[name="no_sppr_bpmb"]').val(data.material_no[1]);
					 $('[name="material_id"]').val(data.material_no[2]);
					 $("#material").modal('show');
					 $('#bpmb-tab td:nth-child(1)').hide();
					 $('[name="name_proj"]').val($('[name="customer"]').val());
					 $('[name="dkp_id_bpmb"]').val(data.dkp[0]);
					 $('[name="dkp_no_bpmb"]').val(data.dkp[1]);
					 $('[name="bpmb_no"]').val(data.bpmb_no);
					 console.log(data);
					 Metronic.stopPageLoading();

				 },
				 error: function (jqXHR, textStatus, errorThrown)
				 {
					 Metronic.stopPageLoading();

						 alert('Error, Please select one');
						 $('#btnSave').text('save'); //change button text
						 $('#btnSave').attr('disabled',false); //set button enable
				 }
		 });
	 }

	 function save_bpmb_final()
	 {
		 $('.help-block').removeClass('has-error'); // clear error class
 			$('.help-block').empty(); // clear error string
		 Metronic.startPageLoading({animate: true});
		  var id_bpmb=$('[name="bpmb_no"]').val();
		 if(id_bpmb==''){
			 Metronic.stopPageLoading();
			 bootbox.alert({
				 title: '<p class="text-danger">Error</p>',
				 message: 'Error BPMB NO cannot empty',
			 });
			 return;
		 }
		 // $('.isi-table').html('');
		 var formd = new FormData($("#form-bpmb-final")[0]); //get data
		 $.ajax({
				 url : '<?php echo site_url().'/ppc/save_bpmb_final'?>',
				 type: "POST",
				 // data: {'id_item': id,'colom':colom, 'table': table},
				 data: formd,
				 processData: false,
				 contentType: false,
				 dataType: "JSON",
				 success: function(data)
				 {
					 if(data.status){
						 Metronic.stopPageLoading();
						 $("#material").modal('hide');
						 initial_table($('[name="dkp_id_bpmb"]').val());
				 	}else{
						for (var i = 0; i < data.inputerror.length; i++) {
							$('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
							$('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error');
						}
						Metronic.stopPageLoading();
					}
				 },
				 error: function (jqXHR, textStatus, errorThrown)
				 {
					 Metronic.stopPageLoading();

						 alert('Error, Please select one');
						 $('#btnSave').text('save'); //change button text
						 $('#btnSave').attr('disabled',false); //set button enable
				 }
		 });
	 }

</script>
