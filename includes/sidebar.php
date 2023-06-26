<?php session_start(); ?>
<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <img src="media/OJYTSC11.png" alt="" width="50" style="margin-right:10px;">
        <h4>FQ Proparty Development</h4>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="dashboard.php">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-home"></i>Building</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="add-building.php">Add Building</a>
                        </li>
                        <li>
                            <a href="building-list.php">Building List</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="zmdi zmdi-city-alt"></i>Apartment</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="add-apt.php">Add Apartment</a>
                        </li>
                        <li>
                            <a href="apt-list.php">Apartment List</a>
                        </li>
                        <li>
                            <a href="apt-blank-list.php">Blank Apartment List</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="zmdi zmdi-accounts"></i>Tenant</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="add-tenant.php">Add Tenant</a>
                        </li>
                        <li>
                            <a href="tenants-list.php">Tenant List</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="zmdi zmdi-male-female"></i>Staff</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="add-staff.php">Add Staff</a>
                        </li>
                        <li>
                            <a href="staff-list.php">Staff List</a>
                        </li>
                        <li>
                            <a href="add-staff-role.php">Add/Delete Staff Role</a>
                        </li>
                        <li>
                            <a href="staff-payment.php">Staff Payment</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas  fa-bar-chart-o"></i>Rent</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="rent-status.php">Rent Status</a>
                        </li>
                        <li>
                            <a href="rent-collect.php">Collect Rent</a>
                        </li>
                        <li>
                            <a href="invoices.php">Invoices</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="zmdi zmdi-file-text"></i>Deed</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="deed-list.php">Deed List</a>
                        </li>
                    </ul>
                </li>
                <?php if ($_SESSION['usertype'] == "admin") { ?>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-users"></i>Manager</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="add-manager.php">Add Manager</a>
                            </li>
                            <li>
                                <a href="manager-list.php">Manager List</a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <li>
                    <a href="check-complain.php">
                        <i class="fas fa-check-square"></i>Check Complain</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->