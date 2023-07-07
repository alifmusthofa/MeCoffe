<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">



    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php $session = session() ?>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- INI BAGIAN SAMPING -->
        <!-- INI BAGIAN SAMPING -->
        <!-- INI BAGIAN SAMPING -->
        <!-- ------------------------------------------------------------------------------- -->
        <!-- ------------------------------------------------------------------------------- -->
        <!-- ------------------------------------------------------------------------------- -->
        <!-- ------------------------------------------------------------------------------- -->
        <!-- ------------------------------------------------------------------------------- -->
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Mecofee</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/admin">
                    <i class=""></i>
                    <span>Dashboard</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i></i>
                    <span>Atribut</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Jenis Atribut</h6>
                        <a class="collapse-item" href="/admin/categories">Ukuran</a>
                        <a class="collapse-item" href="#">#</a>
                        <a class="collapse-item" href="#">#</a>
                    </div>
                </div>
            </li>

            <!-- Navbar Pemesanan -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i></i>
                    <span>Pemesanan</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('/admin/pemesanan') ?>">Proses</a>
                        <a class="collapse-item" href="<?= base_url('/admin/terkirim') ?>">Terkirim</a>
                    </div>
                </div>
            </li>

            <!-- Navbar Personil -->
            <?php if ($session->get('role') == 1) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/auth/register') ?>">
                        <i></i>
                        <span>personil</span></a>
                </li>
            <?php endif; ?>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->


        <!-- Ini adalah code untuk content dan top bar -->
        <!-- Ini adalah code untuk content dan top bar -->
        <!-- Ini adalah code untuk content dan top bar -->
        <!-- ------------------------------------------------------------------------------- -->
        <!-- ------------------------------------------------------------------------------- -->
        <!-- ------------------------------------------------------------------------------- -->
        <!-- ------------------------------------------------------------------------------- -->
        <!-- ------------------------------------------------------------------------------- -->
        <!-- ------------------------------------------------------------------------------- -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $session->get('username') ?></span>
                                <img class="img-profile rounded-circle" src="/img/undraw_profile.svg">
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/auth/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>




                <!-- Begin Page Content -->
                <!-- Begin Page Content -->
                <!-- Begin Page Content -->
                <!-- ------------------------------------- -->
                <!-- ------------------------------------- -->
                <!-- ------------------------------------- -->
                <div class="container-fluid">

                    <!-- Begin Page Content -->
                    <div class="container-fluid">



                        <?= $this->renderSection('content'); ?>


                    </div>
                    <!-- /.container-fluid -->


                </div>
                <!-- akhir Page Content -->
                <!-- ------------------------------------- -->
                <!-- ------------------------------------- -->
                <!-- ------------------------------------- -->


            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>

            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/chart-area-demo.js"></script>
    <script src="/js/demo/chart-pie-demo.js"></script>
    <script>
        $(".delete").on("submit", function() {
            return confirm("Do you want to remove this?");
        });
    </script>
</body>

</html>