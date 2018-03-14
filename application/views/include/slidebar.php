<div class="page-sidebar-wrapper" style="background-color: #9E9E9E" >
  <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
  <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
  <div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <ul class="page-sidebar-menu page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
      <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
      <li class="sidebar-toggler-wrapper">
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="sidebar-toggler">
        </div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
      </li>
      <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
      <li class="sidebar-search-wrapper">
        <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
        <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
        <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
        <form class="sidebar-search " action="extra_search.html" method="POST">
          <a href="javascript:;" class="remove">
          <i class="icon-close"></i>
          </a>
          <!-- <div class="input-group">
            <input type="text" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
            <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
            </span>
          </div> -->
        </form>
        <!-- END RESPONSIVE QUICK SEARCH FORM -->
      </li>
      <li id="home" class="">
        <a href="<?php echo site_url('/marketing');?>">
        <i class="icon-home"></i>
        <span class="title">Home</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
        </a>
      </li>
      <li id="sppr" class="">
        <a href="javascript:;">
        <i class="icon-note"></i>
        <span class="title">SPPr</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
        </a>
        <ul class="sub-menu">
          <!-- <li id="question">
            <a href="<?php echo site_url();?>">Quesioner</a>
          </li> -->
          <!-- <li>
            <a id="home" href="<?php echo site_url('/marketing');?>">
            Home</a>
          </li> -->
          <li>
            <a id="inputSPPr" href="<?php echo site_url('/marketing/create_sppr');?>">
            Input SPPr</a>
          </li>
          <li>
            <a id="listSPPr" href="<?php echo site_url('/marketing/list_sppr');?>">
            List SPPr</a>
          </li>
          <!--
          <li>
            <a href="form_icheck.html">
            iCheck Controls</a>
          </li>-->
        </ul>
      </li>
      <li id="customer" class="">
        <a href="javascript:;">
        <i class="icon-users"></i>
        <span class="title">Customer</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
        </a>
        <ul class="sub-menu">
          <li >
            <a id="input-customer-menu" href="<?php echo site_url().'marketing/input_customer';?>">Input New Customer</a>
          </li>
          <li>
            <a id="list-customer" href="<?php echo site_url().'marketing/list_customer';?>">
            List Order ID MB</a>
          </li>
        </ul>
      </li>
      <?php if($_SESSION['level']=='admin'){
        ?>
        <li id="customer" class="">
          <a href="javascript:;">
          <i class="icon-users"></i>
          <span class="title">Customer</span>
          <span class="selected"></span>
          <span class="arrow open"></span>
          </a>
          <ul class="sub-menu">
            <li id='create'><a href="<?php echo site_url().'/admin/create_user'?>"><i class="fa fa-circle-o"></i> Create User</a></li>
            <li id='reset'><a href="<?php echo site_url().'/admin/reset_password'?>"><i class="fa fa-circle-o"></i> Reset Password</a></li>
            <li id='add_employ'><a href="<?php echo site_url().'/admin/add_employ'?>"><i class="fa fa-circle-o"></i> Add Employee</a></li>
          </ul>
        </li>
      <?php } ?>
    </ul>
    <!-- END SIDEBAR MENU -->
  </div>
</div>
