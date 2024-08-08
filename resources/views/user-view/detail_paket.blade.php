@extends('layout/layouts')

@section('title', 'Detail Paket')

@section('layout.content')

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-red mt-3">
        <div class="container-fluid">
            <button class="btn btn-outline-secondary" onclick="goBack()">
                <i class="fas fa-arrow-left"></i>  Kembali
            </button>
        </div>
    </nav>
</header>
<div class="container mt-3">
    <div class="row">
        <!-- Gambar Produk -->
        <div class="col-md-4 rounded d-flex justify-content-center align-items-center border shadow">
            <img src="{{ asset('public/image/' . $pakets->gambar_paket) }}" alt="Gambar Produk" class="img-fluid rounded" style="max-height: 600px;">
        </div>

        <!-- Detail Produk -->
        <div class="col-md-8">
            <div class="rounded shadow p-4 h-100 border">
                <!-- Nama Produk -->
                <h2 class="fs-2 fw-bold text-center" style="color: #E72929">{{ $pakets->nama_paket }}</h2>
                <!-- Kategori -->
                <p class="mt-3 fs-5"> {{ $pakets->deskripsi }}</p>
                <!-- Harga Sewa -->
                <p class="fs-5"> {{ $pakets->harga }}</p>
                <!-- Deskripsi -->
                <p class="fs-5">
                @foreach ($pakets->paket_product as $index=> $p )
                {{ $index + 1  }} {{$p->product->nama_product}}
                @endforeach</p>
                <!-- Tombol Aksi -->
                <div class="mt-4">
                    <a href="https://api.whatsapp.com/send?phone=+62 81226562081&text=Halo%2C%20saya%20tertarik%20dengan%20produk%20anda. {{ $pakets->nama_paket }} {{ $pakets->gambar }}" class="btn btn-primary me-2 rounded-circle" target="_blank" rel="noopener noreferrer"><i class="fab fa-whatsapp"></i></a>
                    <a href="#" class="btn btn-secondary rounded-circle"><i class="fas fa-share-alt"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
