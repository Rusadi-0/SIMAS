        <!-- TOPBAR start -->
        <div class="topbar-main shadow-sm">
            <div class="container-fluid">

                <!-- Logo container-->
                <div class="logo">
                    <!-- Text Logo -->
                    <!--<a href="index.html" class="logo">-->
                    <!--Annex-->
                    <!--</a>-->
                    <!-- Image Logo -->
                    <a href="<?= base_url('dashboard'); ?>" class="logo">
                        <img src="<?= base_url('assets/'); ?>images/logo-sm.png" alt="" height="22" class="logo-small">
                        <img src="<?= base_url('assets/'); ?>images/SIMAS.png" alt="" height="16" class="logo-large">
                    </a>

                </div>
                <!-- End Logo container-->


                <div class="menu-extras topbar-custom">

                    <ul class="list-inline float-right mb-0">
                        <!-- User-->
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="user" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <center><a href="<?= base_url('profile'); ?>"><img style="border: solid;width: 130px;" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="user" class="mb-3 mt-1 rounded-circle"></a></center>
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <!-- <h5 class="text-center"><?php echo ucwords($user['name']); ?></h5> -->
                                    <h5 class="text-center">Profile</h5>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                            </div>
                        </li>
                        <li class="menu-item list-inline-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>

                    </ul>
                </div>
                <!-- end menu-extras -->

                <div class="clearfix"></div>

            </div> <!-- end container -->
        </div>
        <!-- end TOPBAR -->