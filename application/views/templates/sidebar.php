        <!-- MENU Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">
                        <li class="has-submenu">
                            <a href="<?= base_url('dashboard'); ?>"><i class="mdi mdi-airplay"></i>Dashboard</a>
                        </li>
                        <?php

                        if (!$this->session->userdata('role_id')) {
                            redirect('auth');
                        }

                        ?>

                        <?php
                        $role_id = $this->session->userdata('role_id');
                        $queryMenu = "SELECT `user_menu`.`id`, `menu`,`name`
                                    FROM `user_menu` JOIN `user_access_menu`
                                      ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                                   WHERE `user_access_menu`.`role_id` = $role_id
                                ORDER BY `user_access_menu`.`menu_id` ASC
                                ";
                        $menu = $this->db->query($queryMenu)->result_array();
                        ?>
                        <!-- LOOPING MENU -->
                        <!-- <?php foreach ($menu as $m) : ?> -->
                            <?php
                            $menuId = $m['id'];
                            $querySubMenu = "SELECT *
                                               FROM `user_sub_menu` JOIN `user_menu` 
                                                 ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                              WHERE `user_sub_menu`.`menu_id` = $menuId
                                                AND `user_sub_menu`.`is_active` = 1
                                    ";
                            $subMenu = $this->db->query($querySubMenu)->result_array();
                            ?>
                            <?php foreach ($subMenu as $sm) : ?>
                                <li class="has-submenu <?php if($title == $sm['title']){ echo "active";}?>">
                                    <a href="<?= base_url($sm['url']); ?>"><i class="<?= $sm['icons']; ?>"></i><?= $sm['title']; ?></a>
                                </li>

                            <?php endforeach; ?>
                        <!-- <?php endforeach; ?> -->
                        <li class="has-submenu"></li>
                    </ul>
                    <!-- End navigation menu -->
                </div> <!-- end #navigation -->
            </div> <!-- end container -->
        </div>
        <!-- end MENU -->