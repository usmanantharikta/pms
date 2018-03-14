<?php

// echo $_SESSION['level'].'------------------------------'.$_SESSION['division'];

 ?>
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
<title>MB | PMS</title>
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
<body class="page-header-fixed page-quick-sidebar-over-content  page-sidebar-closed"  >
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
								<span class="caption-subject bold uppercase"> Input SPPr </span>
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
                  <h3 class="form-section">General Information</h3>
                  <div class="row">
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
                          </span>
                        </div>
                      </div>
                    </div>
                    <!--/span-->
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
                        <label class="control-label col-md-3">Ship to Address<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-9">
                          <textarea name="ship_to_address" type="text" class="form-control" placeholder="Ship to Address"></textarea>
                          <span class="help-block">
                         </span>
                        </div>
                      </div>
                    </div>
                    <!-- /span -->
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
                        <label style="text-align: left" for="exampleInputFile" class="col-md-2 control-label"><input type="checkbox" name="attachement_id[]" value="'.$key['id_attachement'].'" class="icheck" data-checkbox="icheckbox_square-grey">'.$key['type_attachement'].'</label>
                        <div class="col-md-10">
                          <input type="file" size="5" name="'.$key['id_attachement'].'_attachement[]" multiple="multiple" id="exampleInputFile">
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
                                  <input type="checkbox" name="nonhygienic_id[]" value="'.$key['id_nonhygienic'].'" class="icheck" data-checkbox="icheckbox_square-grey">'.$key['type'].'</label>';
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
                                <input type="checkbox" name="finishing_id[]" value="'.$key['id_finishing'].'" class="icheck" data-checkbox="icheckbox_square-grey">'.$key['kind'].'</label>';
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
                                <input type="checkbox" name="finishing_id[]" value="'.$key['id_finishing'].'" class="icheck" data-checkbox="icheckbox_square-grey">'.$key['kind'].'</label>';
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
                                  <input type="checkbox" name="certification_id[]" value="'.$key['id_certif'].'" class="icheck" data-checkbox="icheckbox_square-grey">'.$key['name'].'</label>';
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
                                  <input type="checkbox" name="other_id[]" value="'.$key['id_other'].'" class="icheck" data-checkbox="icheckbox_square-grey">'.$key['name'].'</label>';
                                }
                                  ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <!-- ./row -->
                  <h3 class="form-section"></h3>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label col-md-3">Man Hours (Dia-Inch)</label>
                        <div class="col-md-9">
                          <input name="mhours" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <!--/span-->
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
                    <!--/span-->
                  </div>
                  <!--/row-->
                  <h3 class="form-section">Spesifikasi</h3>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label col-md-3">Name Project<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-9">
                          <input name="name_project" type="text" class="form-control">
													<span class="help-block"></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label col-md-3">Quantity<span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-9">
                          <input name="quantity" type="text" class="form-control">
													<span class="help-block"></span>
                        </div>
                      </div>
                    </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-3">Unit<span class="required" aria-required="true"> * </span></label>
                      <div class="col-md-9">
                        <input name="satuan" type="text" class="form-control">
												<span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label col-md-3">Description</label>
                    <div class="col-md-9">
                      <textarea name="description" type="text" class="form-control"> </textarea>
                    </div>
                  </div>
                </div>
              </div>
                  <!-- /row -->
								<!-- <h3 class="form-section">Attachment File</h3>
								<div class="row">
									<div class="col-md-12 dropzone" id="my-dropzone">
									</div>
								</div> -->
									<!-- /row -->
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
<script src="../../survey/assets/global/plugins/excanvas.min.js"></script>
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
	get_option();
	$('#sppr').addClass('active open');
	$('#inputSPPr').parent().addClass('active');

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
Metronic.startPageLoading({animate: true});
$(document).ready(function(){

	// $('.datepicker').datepicker();
	$('.date-picker').datepicker({
		// rtl: Metronic.isRTL(),
		autoclose: true,
		format: 'yyyy-mm-dd',
	});

	//dropzone atatch file
	// Dropzone.autoDiscover = false;
	// var foto_upload= new Dropzone("#my-dropzone",{
	// 	autoProcessQueue: false,
	// 	url: '<?php echo site_url().'/marketing/upload_sppr'?>',
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
	// 		var submitButton = document.querySelector("#submit-all")
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
	// 	a.no_sppr=$('[name="no_sppr"]').val();
	// 	c.append("no_sppr_file",a.no_sppr); //Menmpersiapkan token untuk masing masing foto
	// });

	Metronic.stopPageLoading();
	$("#sppr-form").submit(function(event)
	{
		//console.log(formdata);
		var formdata = new FormData($("#sppr-form")[0]); //get data
		Metronic.startPageLoading({animate: true});
		event.preventDefault();
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$.ajax({
			url : '<?php echo site_url().'/marketing/save_sppr'?>',
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
						message: 'Your request has been sent',
            callback: function(){
              window.location.href ="<?php echo site_url().'marketing/list_sppr';?>";
             }
					});

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

function get_po_no(nama){
  var name=['customer_id','order_date', 'no_sppr', 'ref_no', 'contact_no', 'delivery_date', 'email', 'pic', 'fax', 'telp', 'ship_to_address', 'mhours', 'stainless_steel', 'carbon_steel', 'weight', 'me', 'reserved', 'create_by', 'date_create', 'status','name_project', 'quantity', 'satuan', 'description'];
  var n=name.length;
  for (var i = 0; i < name.length; i++) {
    $("[name='"+name[i]+"']").val('');
  }

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


</script>
<!-- END JAVASCRIPTS -->
<!-- END BODY -->
</html>
