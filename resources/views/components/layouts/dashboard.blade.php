<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .container-fluid {
            margin-top: 0 !important; /* Atur margin atas menjadi 0 */
            padding-top: 0 !important; /* Atur padding atas menjadi 0 */
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-store"></i>
                </div>
                <div class="sidebar-brand-text mx-3">UCHI PARFUME</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            @if(auth()->user()->hasRole('owner'))
                <li class="nav-item">
                    <a class="nav-link" href="/pos">
                        <i class="fas fa-cash-register"></i>
                        <span>Point of Sale</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/penjualan">
                        <i class="fas fa-chart-bar"></i>
                        <span>Data Penjualan</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pengeluaran">
                        <i class="fas fa-money-bill-wave"></i>
                        <span>Pengeluaran</span></a>
                </li>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">MASTER ADMIN</div>
                <li class="nav-item">
                    <a class="nav-link" href="/master-penjualan">
                        <i class="fas fa-database"></i>
                        <span>Master Data Penjualan</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/produk">
                        <i class="fas fa-box"></i>
                        <span>Produk</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/stok">
                        <i class="fas fa-warehouse"></i>
                        <span>Stok Produk</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/restok">
                        <i class="fas fa-truck-loading"></i>
                        <span>Restok</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cabang">
                        <i class="fas fa-code-branch"></i>
                        <span>Cabang</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin-cabang">
                        <i class="fas fa-user-shield"></i>
                        <span>Admin Cabang</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/supplier">
                        <i class="fas fa-users"></i>
                        <span>Supplier</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/absensi">
                        <i class="fas fa-user-clock"></i>
                        <span>Absensi Karyawan</span>
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/penjualan/input">
                        <i class="fas fa-cart-plus"></i>
                        <span>Input Penjualan</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/stok/cek">
                        <i class="fas fa-search"></i>
                        <span>Cek Sisa Stok</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/omset">
                        <i class="fas fa-chart-line"></i>
                        <span>Omset Cabang</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/produk/rangking">
                        <i class="fas fa-trophy"></i>
                        <span>Rangking Produk</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/checkin">
                        <i class="fas fa-user-check"></i>
                        <span>Checkin/Checkout</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/penjualan/edit">
                        <i class="fas fa-edit"></i>
                        <span>Edit Penjualan</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pengeluaran/input">
                        <i class="fas fa-wallet"></i>
                        <span>Input Pengeluaran</span></a>
                </li>
            @endif

            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="/img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="/settings">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    @yield('dashboard-content')
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan ini sebelum </body> -->
    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/sbadmin/js/sb-admin-2.min.js"></script>

    <script>
        // Sidebar toggle behavior
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            document.getElementById('wrapper').classList.toggle('toggled');
        });

        // Optional: Tambahkan log untuk memastikan tombol profil berfungsi
        document.getElementById('userDropdown').addEventListener('click', function () {
            console.log('Tombol profil diklik!');
        });
    </script>
</body>

</html>