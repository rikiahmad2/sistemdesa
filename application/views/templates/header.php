<!-- Main Container -->
<div id="main-container">
    <header class="navbar navbar-inverse navbar-fixed-top">
        <!-- Left Header Navigation -->
        <ul class="nav navbar-nav-custom">
            <!-- Main Sidebar Toggle Button -->
            <li>
                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                    <i class="fa fa-ellipsis-v fa-fw animation-fadeInRight" id="sidebar-toggle-mini"></i>
                    <i class="fa fa-bars fa-fw animation-fadeInRight" id="sidebar-toggle-full"></i>
                </a>
            </li>
            <!-- END Main Sidebar Toggle Button -->

            <!-- Header Link -->
            <li class="hidden-xs animation-fadeInQuick">
                <a href="../pilihan.php"><strong>SELAMAT DATANG DI SISTEM INFORMASI WARGA DESA</strong></a>
            </li>
            <!-- END Header Link -->
        </ul>
        <!-- END Left Header Navigation -->

        <!-- Right Header Navigation -->
        <ul class="nav navbar-nav-custom pull-right">
            <!-- Alternative Sidebar Toggle Button -->
            <li>
                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt');this.blur();">
                    <h5><strong><?=$data['nik']?></strong> A.N. <strong><?=$data['nama'] ?></strong></h5>
                </a>
            </li>
            <!-- END Alternative Sidebar Toggle Button -->

            <!-- User Dropdown -->
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?=base_url('store/foto/'.$data['foto'].'')?>" alt="avatar">
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-header">
                        <strong>ADMINISTRATOR</strong>
                    </li>
                    <li>
                        <a href="<?=base_url('Home/profile')?>">
                            <i class="fa fa-pencil-square fa-fw pull-right"></i>
                            Profile
                        </a>
                    </li>
                    <li class="divider"><li>
                        <li>
                            <a href="<?=base_url('Home/logout')?>" onclick="return confirm('Apakah Anda Yakin Ingin Logout ?');">
                                <i class="fa fa-power-off fa-fw pull-right"></i>
                                Log out
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END User Dropdown -->
            </ul>
            <!-- END Right Header Navigation -->
        </header>
                    <!-- END Header -->