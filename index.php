<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: view_admin/dashboard.php");
    exit;
}

include "templates/auth_header.php";
?>


<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

    <div class="container-fluid pt-5">
        <!-- Row -->
        <div class="row justify-content-center mt-5">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-header text-center">
                        <img src="assets/images/logo/Logo_main.png" width="30%" class="mt-2 mb-3" alt="logo-pnm">
                        <h4>SISTEM INFORMASI REIMBURSE</h4>
                        <h6>PT. PERMODALAN NASIONAL MADANI</h6>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-2">
                            <div class="form-group">
                                <label class="col-md-12">Username</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="username" class="form-control form-control-line" name="username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="password" value="password" class="form-control form-control-line" name="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-primary text-white">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "templates/auth_footer.php";
?>