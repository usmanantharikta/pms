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
        <a href="<?php echo site_url('/project');?>">
        <i class="icon-home"></i>
        <span class="title">Home</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
        </a>
      </li>
      <!-- <li id="sppr" class="">
        <a href="javascript:;">
        <i class="icon-settings"></i>
        <span class="title">SPPr</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
        </a>
        <ul class="sub-menu">
          <li>
            <a id="listSPPr" href="<?php echo site_url('/engineering/list_sppr');?>">
            List SPPr</a>
          </li>
        </ul>
      </li> -->
      <li id="dkp" class="">
        <a href="javascript:;">
        <i class="icon-book-open"></i>
        <span class="title">DKP</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
        </a>
        <ul class="sub-menu">
          <li id="editDKP">
            <a href="<?php echo site_url().'project/edit_dkp';?>">Edit DKP</a>
          </li>
          <li>
            <a id="listDKPBiasa" href="<?php echo site_url('/project/list_dkp');?>">
            List DKP</a>
          </li>
          <?php
          // if($_SESSION['level']=='kabag')
          // {
           ?>
           <li>
             <a id="listApproval" href="<?php echo site_url('/project/list_dkp_approval');?>">
             List DKP Approval</a>
           </li>
         <?php //} ?>
          <li>
            <a id="listApproved" href="<?php echo site_url('/project/list_dkp_approved');?>">
            List DKP Approved</a>
          </li>
        </ul>
      </li>
    </ul>
    <!-- END SIDEBAR MENU -->
  </div>
</div>
