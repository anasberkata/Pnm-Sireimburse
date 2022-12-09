        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand" href="index.html">
                        <b class="logo-icon">
                            <img src="../assets/images/logo/Logo_main_2.png" alt="homepage" class="dark-logo" width="100%" />
                            <img src="../assets/images/logo/Logo_main_2.png" alt="homepage" class="light-logo" width="100%" />
                        </b>
                        <span class="logo-text">
                            <img src="../assets/images/logo/logo-text.png" alt="homepage" class="dark-logo" />
                            <img src="../assets/images/logo/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-end ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../assets/images/users/<?= $user["gambar"] ?>" alt="user" class="rounded-circle" width="31">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../view_pengguna/profile.php"><i class="mdi mdi-account m-r-5 m-l-5"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="../logout.php" onclick="return confirm('Yakin ingin keluar dari aplikasi?');"><i class="mdi mdi-logout m-r-5 m-l-5"></i>
                                    Logout</a>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>