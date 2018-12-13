<?php
require_once __DIR__.'/../../vendor/autoload.php';
$admin = new Admin();

?>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            <?php
                $id = Session::get('userID');
                $getAdminImage = $admin->getAdminProfile($id);
                if($getAdminImage){
                    foreach ($getAdminImage as $data) {

            ?>
                    <img src="<?php echo $data['image']; ?>" class="img-circle" alt="User Image">
            <?php } } ?>
        </div>
        <div class="pull-left info">
          <p><?php echo Session::get("username");?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Tutions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="tutioncreate.php"><i class="fa fa-circle-o"></i> Create Tutions</a></li>
            <li><a href="tutionactive.php"><i class="fa fa-circle-o"></i> Active Tutions</a></li>
            <li><a href="tutiondeactive.php"><i class="fa fa-circle-o"></i> Completed tutions</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Teachers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="teacherfree.php"><i class="fa fa-circle-o"></i> Free Teachers</a></li>
            <li><a href="teacherpaid.php"><i class="fa fa-circle-o"></i> Paid Teachers</a></li>
            <li><a href="teacheractive.php"><i class="fa fa-circle-o"></i> Active Teachers</a></li>
            <li><a href="teacherdeactive.php"><i class="fa fa-circle-o"></i> Deactive Teachers</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Gardians</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="gardianactive.php"><i class="fa fa-circle-o"></i> Active Gardians</a></li>
            <li><a href="gardiandeactive.php"><i class="fa fa-circle-o"></i> Deactive Gardians</a></li>

          </ul>

        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Rules</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
            <ul class="treeview-menu">
                <li><a href="seerulesfortution.php"><i class="fa fa-circle-o"></i> All Rules</a></li>
                <li><a href="createrulesfortution.php"><i class="fa fa-circle-o"></i> Create Rules</a></li>

            </ul>

        </li>


          <li class="treeview">
              <a href="#">
                  <i class="fa fa-folder"></i> <span>Admin</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="createadmin.php"><i class="fa fa-circle-o"></i> Create Admin</a></li>
                  <li><a href="adminlist.php"><i class="fa fa-circle-o"></i> Admin List</a></li>

              </ul>
          </li>


          <li class="treeview">
              <a href="#">
                  <i class="fa fa-folder"></i> <span>Social</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="addsocialmedia.php"><i class="fa fa-circle-o"></i> Add Socail Media</a></li>
                  <li><a href="sociallist.php"><i class="fa fa-circle-o"></i> Social Media List</a></li>

              </ul>
          </li>

          <li class="treeview">
              <a href="#">
                  <i class="fa fa-folder"></i> <span>Request</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="seetutionrequest.php"><i class="fa fa-circle-o"></i> Tution Request</a></li>
                  <li><a href="seetutorrequest.php"><i class="fa fa-circle-o"></i> Teacher Request</a></li>

              </ul>
          </li>


          <li class="treeview">
              <a href="#">
                  <i class="fa fa-folder"></i> <span>Footer Image</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="addfooterimage.php"><i class="fa fa-circle-o"></i> Add Footer Image</a></li>
                  <li><a href="footerimagelist.php"><i class="fa fa-circle-o"></i> Footer Image Listt</a></li>

              </ul>
          </li>


          <li class="treeview">
              <a href="#">
                  <i class="fa fa-folder"></i> <span>Contact</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="showcontact.php"><i class="fa fa-circle-o"></i> See Message List</a></li>
              </ul>
          </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
