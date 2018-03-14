
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
<title>HOME | ENGINEERING</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<script src="<?php echo base_url().'assets/livecss.js'?>" type="text/javascript"></script>
<?php $this->load->view('include/css');?>
</head>
<style>
.form-horizontal .control-label {
    text-align: left;
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
				<!-- <ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Form Stuff</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Material Design Form Controls</a>
					</li>
				</ul> -->
			</div>
			<!-- END PAGE HEADER-->

			<!-- BEGIN PAGE CONTENT-->
      <div class="row">
        <div class="col-md-12">
          <form id='save-form'  method="post" enctype="multipart/form-data">
            <!-- <input type="hidden" name="nik" value="<?php echo $_SESSION['nik'];?>"> -->
            <!-- <div id='user' class="form-group">
              <select id='nik' name="username" class="form-control select2" style="width: 100%;">
                <option value=''> -----------------------Select One ID-----------------------</option>
                <?php
                  foreach ($user as $key ) {
                    echo '<option value="'.$key['nik'].'">'.$key['nik'].'-'.$key['full_name'].'-'.$key['division'].'</option>';
                  }
                ?>
              </select>
                <span class="help-block"></span>
            </div> -->
            <div class="form-group">
              <label>User ID </label>
              <div class="input-group ">
                <div class="input-group-addon">
                  <i class="fa fa-lock"></i>
                </div>
                <select id='username' name="username" class="form-control select2" style="width: 100%;">
                  <!-- <option> -----------------------Select One -----------------------</option> -->
                  <option value=''> -----------------------Select One ID-----------------------</option>
                  <?php
                    foreach ($user as $key ) {
                      echo '<option value="'.$key['nik'].'">'.$key['nik'].'-'.$key['full_name'].'-'.$key['division'].'</option>';
                    }
                  ?>
                </select>
              </div>
              <span class="help-block old_password"></span>
            </div>
            <div class="form-group">
              <label>Jenis User (Level)</label>
              <div class="input-group ">
                <div class="input-group-addon">
                  <i class="fa fa-lock"></i>
                </div>
                <select id='level' name="level" class="form-control select2" style="width: 100%;">
                  <!-- <option> -----------------------Select One -----------------------</option> -->
                  <option value="staf">STAFF</option>
                  <option value="manager">MANAGER</option>
                  <option value="directure">DIRECTURE</option>
                  <option value="admin">ADMIN</option>
                </select>
              </div>
              <span class="help-block old_password"></span>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
              <label>New Password</label>
              <div class="input-group ">
                <div class="input-group-addon">
                  <i class="fa fa-lock"></i>
                </div>
                <input name="new_password" type="password" class="form-control" placeholder="Input New Password">
              </div>
              <span class="help-block new_password"></span>

            </div>
            <!-- /.form-group -->
            <div class="form-group">
              <label>Re-Password</label>
              <div class="input-group ">
                <div class="input-group-addon">
                  <i class="fa fa-lock"></i>
                </div>
                <input name="re_password" type="password" class="form-control" placeholder="Re Input New Password">
              </div>
              <span class="help-block re_password"></span>

            </div>
            <!-- /.form-group -->
          </form>
          <!-- ./end form -->
        </div>
        <!-- ./col -->
        <div class="">
          <button type="submit" onclick="create_user()" class="btn bg-olive">Create</button>
          <button onclick="reset()" class="btn btn-warning">Reset</button>
        </div>
      </div>
      <!-- /.row -->
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
<div class="page-footer">
<div class="page-footer-inner">
	 2014 &copy; Metronic by keenthemes.
</div>
<div class="scroll-to-top">
	<i class="icon-arrow-up"></i>
</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../survey/assets/global/plugins/respond.min.js"></script>
<script src="../../survey/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<?php $this->load->view('include/js');?>
<script>
jQuery(document).ready(function() {
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
$('#sppr').removeClass('active open');
$('#home').addClass('active open');
});

// var $table=$('#table_report').DataTable();
$(document).ready(function(){
  $("#create").addClass('active');
  $("#create").parent().parent().addClass('active menu-open');
  // parent().parent().addClass('active');

  //Initialize Select2 Elements
  $('.select2').select2({
    placeholder: "Please Select One",
    allowClear: true
  });
  // editor $('.textarea').wysihtml5()
  // $('.textarea').wysihtml5();
  // $('.textarea').html('usman antharikta naik');
  //Date picker
  var dateToday = new Date();
  $('#datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    startDate: dateToday,
  });
});
$('button .btn').click(function(event) {
     event.preventDefault(event);
});

function create_user(){
         var formdata = new FormData($("#save-form")[0]);
        //  event.preventDefault();
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
           $.ajax({
               url : '<?php echo site_url('/admin/save_user') ?>',
               type: "POST",
               data: formdata,
               processData: false,
               contentType: false,
               dataType: "JSON",
               success: function(data)
               {
                 if(data.status){
                   bootbox.alert({
                     title: '<p class="text-success">Success</p>',
                     message: 'Success Create User',
                     callback : function (){
                       location.reload();
                     }
                   });
               }else{
                 var pesan="";
                 for (var i = 0; i < data.inputerror.length; i++)
                    {
                      $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                      $('.'+data.inputerror[i]).text(data.error_string[i]); //select span help-block class set text error string
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
                   alert('Error adding / update data');
                   $('#btnSave').text('save'); //change button text
                   $('#btnSave').attr('disabled',false); //set button enable
               }
           });
       } //end ajax save

function reset()
{
  $('#add-form')[0].reset(); // reset form on modals
}

</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
