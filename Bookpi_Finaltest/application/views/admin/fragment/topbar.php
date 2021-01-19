
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


          

            <div class="topbar-divider d-none d-sm-block"></div>
            <?php
              if($this->session->userdata('username')){
                ?>
                <li><div>Welcome <?php echo $this->session->userdata('username')?></div></li>
                <li><?php echo anchor('acc/logout','Logout')?></li>
                <?php } else {?> 
                  <li><?php echo anchor('acc/login','Login')?></li>
                  <?php } ?> 

          </ul>

        </nav>
        <!-- End of Topbar -->
