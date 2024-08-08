@extends('layout/layouts')

@section('title', 'Hasil Pencarian')

<header>
    @include('layout.navbar')
</header>


@section('layout.content')
<a href="https://api.whatsapp.com/send?phone=6281228868914" class="whatsapp-float" target="_blank">
    <i class="fab fa-whatsapp"></i>
</a>
<div class="header-categories container fluid w-full h-30 bg-primary p-1 rounded " style="margin-top: 7rem">
    <p class="fs-1 text-center text-light">Hasil Pencarian</p>
    <p class="fs-4 text-center text-warning">
        {{ $resultsTotals }} Product
    </p>
</div>
<div class="container-fluid">
    <div class="container-fluid mt-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
            @foreach ($results as $product)
                <div class="col">
                    <div class="card card-layanan" style="height: 21rem;">
                        <img src="{{ asset('public/image/' . $product->gambar) }}" class="card-img-top img-fluid"
                            alt="Product Image" style="width: 100%; height: 200px; object-fit: cover;">
                        <div class="card-body mx-auto ">
                            <a href="/product/{{$product->id}}">
                            <p class="card-title text-center card-header"
                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; height: 2rem; color: black; list-style-type: none;">
                                {{ $product->nama_product }}</p></a>
                            <h5 class="card-text text-warning mt-2">Rp. {{ $product->harga_sewa }},- <span
                                    style="font-size: 16px; color: #1d1d1d; opacity: 0.8;">/hari</span> </h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <img src="asset/img/placeholder.png" alt="" style="width: 10px; object-fit: contain; margin-right: 4px;">
                                    <p class="mb-0" style="font-size: 12px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        Grobogan
                                    </p>
                                </div>
                                <a class="border" style="border-radius: 10px; padding: 5px" href="https://api.whatsapp.com/send?phone=6281228868914&text={{ urlencode('Halo, saya tertarik dengan produk Anda: ' . $product->nama_product . '. Berikut adalah gambar produk: ' . asset('public/image/' . $product->gambar)) }}"><img src="asset/img/chat.png" style="width: 18px;" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
