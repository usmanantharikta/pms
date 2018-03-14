<div class="page-sidebar-wrapper">
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
        <a href="<?php echo site_url('/engineering');?>">
        <i class="icon-home"></i>
        <span class="title">Home</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
        </a>
      </li>
      <li id="sppr" class="">
        <a href="javascript:;">
        <i class="icon-book-open"></i>
        <span class="title">SPPr</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
        </a>
        <ul class="sub-menu">
          <!-- <li id="question">
            <a href="<?php echo site_url();?>">Quesioner</a>
          </li> -->
          <li>
            <a id="listSPPr" href="<?php echo site_url('/engineering/list_sppr');?>">
            List SPPr</a>
          </li>
        </ul>
      </li>
      <?php if($_SESSION['level']!='estimator'){
        ?>
      <li id="dkp" class="">
        <a href="javascript:;">
        <i class="icon-note"></i>
        <span class="title">DKP</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
        </a>
        <ul class="sub-menu">
          <li id="createDKP">
            <a href="<?php echo site_url().'engineering/create_dkp';?>">Create New DKP</a>
          </li>
          <li>
            <a id="dkp_draf" href="<?php echo site_url('/engineering/list_dkp_draf');?>">
            List DKP Draf</a>
          </li>
          <?php
          // if($_SESSION['level']=='kabag')
          // {
           ?>
           <li>
             <a id="listApproval" href="<?php echo site_url('/engineering/list_dkp_approval');?>">
             List DKP Approval</a>
           </li>
         <?php //} ?>
          <li>
            <a id="listApproved" href="<?php echo site_url('/engineering/list_dkp_approved');?>">
            List DKP Approved</a>
          </li>
        </ul>
      </li>
    <?php } ?>
      <?php if($_SESSION['level']=='estimator'){
        ?>
      <li id="estimator">
        <a href="javascript:;">
        <i class="icon-credit-card"></i>
        <span class="title">Estimator</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
        </a>
        <ul class="sub-menu">
          <!-- <li id="question">
            <a href="<?php echo site_url();?>">Quesioner</a>
          </li> -->
          <li>
            <a id="listApprovalEstimator" href="<?php echo site_url('/estimator/list_dkp');?>">
            List DKP</a>
          </li>
        </ul>
      </li>
    <?php } ?>
    </ul>
    <!-- END SIDEBAR MENU -->
  </div>
</div>
