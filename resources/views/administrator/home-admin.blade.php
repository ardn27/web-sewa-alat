<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('asset/style/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Administrator</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="\home-admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="\home-produk">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Produk</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="\home-paket">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Paket Premium</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="\home-iklan">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Iklan</span></a>
            </li>
            <li class="nav-item mt-auto">
                <a class="nav-link" href="\logout-admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Logout</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <br>
            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-center text-gray-800">DASHBOARD</h1>
                    <div class="mt-3 d-flex justify-content-center">
                        <div class="d-flex flex-row justify-content-center">
                            <div class="col" style="width: 39vw">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <p class="card-title">Produk</p>
                                        <h2 class="card-text"><span id="totalProducts">{{ $totalProduct }} Item</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col" style="width: 39vw">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <p class="card-title">Paket Sewa</p>
                                        <h2 class="card-text"><span id="totalProducts">{{ $totalPaket }} Item </span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 mx-auto">
                        <div class="col-md-8">
                            <div class="card text-center m-0">
                                <p>Grafik Product</p>
                                <div class="card-body m-0">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Per-Kategori</h5>
                                    <ul class="list-unstyled" id="categoryList">
                                        <!-- Kategori dan jumlah produk akan dimasukkan di sini oleh JavaScript -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Main Content -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Script untuk inisialisasi Chart -->
    <script>
        var ctx = document.getElementById('myPieChart').getContext('2d');

        // Contoh pengambilan data categories dari Blade Laravel
        var categories = @json($categories);

        console.log(categories); // Pastikan data tercetak di konsol

        var labels = categories.map(function(item) {
            return item.kategori;
        });

        var data = categories.map(function(item) {
            return item.total;
        });

        // Define the colors
        var colors = [
            '#FF6384', // Merah muda
            '#36A2EB', // Biru
            '#FFCE56', // Kuning
            '#4BC0C0', // Hijau
            '#9966FF', // Ungu
            '#FF9F40', // Orange
            '#FF6384', // Merah muda
            '#36A2EB', // Biru
            '#FFCE56', // Kuning
            '#4BC0C0' // Hijau
        ];

        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: colors
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });

        // Update the list of categories and their totals
        var categoryList = document.getElementById('categoryList');
        categories.forEach(function(item, index) {
            var li = document.createElement('li');
            var colorBox = document.createElement('span');
            colorBox.style.backgroundColor = colors[index];
            colorBox.style.display = 'inline-block';
            colorBox.style.width = '10px';
            colorBox.style.height = '10px';
            colorBox.style.marginRight = '10px';
            li.appendChild(colorBox);
            li.appendChild(document.createTextNode(item.kategori + ": " + item.total + " Product"));
            categoryList.appendChild(li);
        });
    </script>

</body>

</html>
