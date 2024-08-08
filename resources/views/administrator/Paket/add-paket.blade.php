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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="asset/style/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Administrator</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="\home-admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="\home-produk">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Produk</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="\home-paket">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Paket Premium</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="\home-iklan">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Iklan</span>
                </a>
            </li>
            <li class="nav-item mt-auto">
                <a class="nav-link" href="\logout-admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Logout</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <br>
            <div id="content">
                <div class="container-fluid">
                    <form action="/add-paket-function" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_paket" class="form-label">Nama Paket</label>
                            <input type="text" class="form-control" id="nama_paket" name="nama_paket" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">Gambar Produk</label>
                            <input type="file" name="gambar_paket" id="gambar_paket" class="form-control"
                                aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" required>
                        </div>
                        <div class="mb-3">
                            <label for="Kategori" class="form-label">Product</label>
                            <div id="product-container">
                                <select class="form-select form-control mb-2" name="products[]" id="id_product">
                                    @foreach ($products as $data)
                                    <option value="{{$data->id}}">{{$data->nama_product}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="button" class="btn btn-secondary" id="add-product">Tambah Produk</button>
                        </div>
                        <button type="submit" class="btn btn-warning">Submit</button>
                    </form>
                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; KlinikUntag 2023</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>

    <script>
        document.getElementById('add-product').addEventListener('click', function() {
            var container = document.getElementById('product-container');
            var newProduct = document.createElement('select');
            newProduct.className = 'form-select form-control mb-2';
            newProduct.name = 'products[]';
            newProduct.innerHTML = `
                @foreach ($products as $data)
                <option value="{{ $data->id }}">{{ $data->nama_product }}</option>
                @endforeach
            `;
            container.appendChild(newProduct);
        });
    </script>
</body>

</html>
