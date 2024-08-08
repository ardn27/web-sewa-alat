<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('asset/style/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ 'vendor/datatables/dataTables.bootstrap4.min.css' }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

                    <!-- body -->
                    <form action="/edit-paket-function" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="{{ $data->id }}" aria-describedby="emailHelp">
                        <!-- form text field -->
                        <div class="mb-3">
                            <label for="exampleInputText" class="form-label">Nama Paket</label>
                            <input type="text" class="form-control" id="nama_paket" name="nama_paket"
                                value="{{ $data->nama_paket }}" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text"></div>
                        </div>
                        <!-- end form text field -->
                        <!-- form text field -->
                        <div class="mb-3">
                            <label for="exampleInputText" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                value="{{ $data->deskripsi }}" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text"></div>
                        </div>
                        <!-- end form text field -->
                        <!-- form text field -->
                        <div class="mb-3">
                            <label for="exampleInputText" class="form-label">Harga Sewa</label>
                            <input type="text" class="form-control" id="harga_sewa" name="harga"
                                value="{{ $data->harga }}" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text"></div>
                        </div>
                        <!-- end form text field -->
                        <div class="mb-3">
                            <label for="Kategori" class="form-label">Product</label>
                            <div id="product-container">
                                @foreach ($data->paket_product as $product)
                                    <select name="products[]" class="form-select form-control mb-2" name="products[]" id="id_product">
                                        <option value="{{ $product->product->id }}">{{ $product->product->nama_product }}</option>
                                        @foreach ($products as $p)
                                        <option value="{{$p->id}}">{{$p->nama_product}}</option>
                                        @endforeach
                                    </select>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">Gambar Paket*</label>
                            <input type="file" name="gambar_paket" id="gambar_paket" class="form-control"
                                aria-describedby="emailHelp" value="{{$data->gambar_paket}}">
                            <img class="image-fluid mb-3 mt-3" src="{{ asset('public/image/' . $data->gambar_paket) }}"
                                alt="" style="max-width: 100px">
                        </div>
                        <button type="submit" class="btn btn-warning">Submit</button>
                    </form>
                    <!-- end body -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Sabdha Langit 2024</span>
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

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script></script>
</body>

</html>
