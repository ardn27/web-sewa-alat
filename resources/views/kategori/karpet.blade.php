@extends('layout/layouts')

@section('title', 'Karpet')

@include('layout.navbar')
@section('layout.content')
    <a href="https://api.whatsapp.com/send?phone=6281228868914" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
    <div class="header-categories container fluid w-full h-30 bg-primary p-1 rounded">
        <p class="fs-1 text-center text-light">Flooring Karpet</p>
        <p class="fs-4 text-center text-warning">
            {{ $totalCategory }} Product
        </p>
    </div>
    <div class="container mt-4">
        <div class="row justify-content-end">
            <div class="col-md-4">
                <form action="{{ route('kategori.karpet') }}" method="get" id="filterForm">
                    <div class="row g-2 g-lg-3 align-items-center">
                        <div class="col-auto">
                            <label for="sort_by" class="form-label"><i class="fa-solid fa-filter"></i></label>
                        </div>
                        <div class="col">
                            <select name="sort_by" id="sort_by" class="form-select">
                                <option value="lowest_price" {{ $sortBy == 'lowest_price' ? 'selected' : '' }}>Harga Terendah</option>
                                <option value="highest_price" {{ $sortBy == 'highest_price' ? 'selected' : '' }}>Harga Tertinggi</option>
                                <option value="a_z" {{ $sortBy == 'a_z' ? 'selected' : '' }}>A-Z</option>
                                <option value="z_a" {{ $sortBy == 'z_a' ? 'selected' : '' }}>Z-A</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card" style="height: 21rem;">
                        <img src="{{ asset('public/image/' . $product->gambar) }}" class="card-img-top img-fluid"
                            alt="Product Image" style="width: 100%; height: 200px; object-fit: cover;">
                        <div class="card-body mx-auto">
                            <p class="card-title text-center card-header"
                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; height: 2rem;">
                                {{ $product->nama_product }}</p>
                            <h5 class="card-text text-warning mt-2">Rp. {{ $product->harga_sewa }},- <span
                                    style="font-size: 16px; color: #1d1d1d; opacity: 0.8;">/hari</span> </h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <img src="asset/img/placeholder.png" alt="" style="width: 10px; object-fit: contain; margin-right: 4px;">
                                    <p class="mb-0" style="font-size: 12px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        Grobogan
                                    </p>
                                </div>
                                <a class="border" style="border-radius: 10px; padding: 5px"
                                href="https://api.whatsapp.com/send?phone=6281226562081&text={{ urlencode('Halo, saya tertarik dengan produk ' . $product->nama_product ) }}"><img
                                    src="asset/img/chat.png" style="width: 18px;" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sort_by').on('change', function() {
                $('#filterForm').submit();
            });

            $('#filterForm').submit(function(e) {
                e.preventDefault();
                var query = $('#searchInput').val();
                window.location.href = '/karpet?sort_by=' + $('#sort_by').val() + '&query=' + query;
            });
        });
    </script>
@endsection
