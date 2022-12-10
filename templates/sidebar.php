<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav mt-3">
            <ul id="sidebarnav">
                <?php if ($user["role_id"] == 1) : ?>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../view_dashboard/dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../view_reimburse/reimburse.php" aria-expanded="false"><i class="mdi mdi-file-document-box"></i><span class="hide-menu">Reimburse</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../view_pengguna/pengguna.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Pengguna</span></a></li>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../view_pengguna/profile.php" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Profile Saya</span></a></li>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../logout.php" onclick="return confirm('Yakin ingin keluar dari aplikasi?');" aria-expanded="false"><i class="mdi mdi-logout"></i><span class="hide-menu">Logout</span></a></li>
                    </li>
                <?php else : ?>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../view_dashboard/dashboard_karyawan.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../view_reimburse/reimburse.php" aria-expanded="false"><i class="mdi mdi-file-document-box"></i><span class="hide-menu">Reimburse</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../view_pengguna/profile.php" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Profile Saya</span></a></li>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../logout.php" onclick="return confirm('Yakin ingin keluar dari aplikasi?');" aria-expanded="false"><i class="mdi mdi-logout"></i><span class="hide-menu">Logout</span></a></li>
                <?php endif; ?>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>