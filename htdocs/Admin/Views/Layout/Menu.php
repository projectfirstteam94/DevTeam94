<?php
    include_once ("../../Model/model_hoadon.php");
    $donhang = laySoDonHang();
?>
<header class="main-header">
    <a href="Home.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="hoadon.php">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning"> <?php echo $donhang;?></span>
                    </a>
                </li>
                <li class="dropdown user user-menu">
                <li>
                    <a href="../../../DesignerUser">
                        <i class="fa fa-fw fa-desktop"></i> <span>Web Business</span>
                    </a>
                </li>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li>
                <a href="Home.php">
                    <i class="fa fa-dashboard"></i> <span>Sản Phẩm</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
            <li>

                <a href="hoadon.php">
                    <i class="fa fa-dashboard"></i> <span>Hóa Đơn</span> <span class="badge"><?php echo $donhang;?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
            <li>
                <a href="doanhthu.php">
                    <i class="fa fa-dashboard"></i> <span>Doanh Thu</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
            <li>
                <a href="khuyenmai.php">
                    <i class="fa fa-dashboard"></i> <span>Khuyến Mại</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
