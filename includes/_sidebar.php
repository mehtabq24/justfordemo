<?php session_start(); ?>
<?php error_reporting(0); ?>

<?php 

                $role = "";
                 if (isset($_SESSION['admin_is_login'])) {
                  echo $role =  $_SESSION['admin_is_login'];
                }

                 if (isset($_SESSION['author_is_login'])) {
                  echo $role =  $_SESSION['author_is_login'];
                }

?>
<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                     <li>
                    <a href="http://localhost:8080/mehtab_work/admin/main_dashboard.php" >
                        Dashboard
                    </a>
                </li>
                    <?php
                    echo $role;
                     if ($role=="author") {
                        # code...
                     ?>
                    <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-layout-grid2"></i>
                        <span class="hide-menu">Author's</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="../author/view_authors.php">View Author's</a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
                 <?php if ($role=="admin") {
                        # code...
                     ?>
                    <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-layout-grid2"></i>
                        <span class="hide-menu">Author's</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="../author/view_authors.php">View Author's</a>
                        </li>
                    </ul>
                </li>
                 <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-layout-grid2"></i>
                        <span class="hide-menu">Agent</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="../property/view_property.php">View Agent</a>
                        </li>
                    </ul>
                </li>
               
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-layout-grid2"></i>
                        <span class="hide-menu">Employee</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="../sales/sales.php">Employee</a>
                        </li>
                    </ul>
                </li>
                    <?php } ?>
            </ul>
        </nav>
    </div>
</aside>