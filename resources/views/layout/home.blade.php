@extends('layout/layouts')

@section('title', 'Home Page')

@include('layout.navbar')
@section('layout.content')
    <style>
        .rounded-circle {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
    </style>
    <a href="https://api.whatsapp.com/send?phone=6281226562081&text=Halo%2C%20saya%20tertarik%20dengan%20produk%20anda"
        class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
    <div class='container'>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($iklans as $index => $iklan)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}"
                        class="{{ $index === 0 ? 'active' : '' }} bg-dark"
                        aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($iklans as $index => $iklan)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <a href="{{ $iklan->link_produk }}">
                            <img src="{{ asset('public/image/' . $iklan->gambar_iklan) }}" style="width: 100%"
                                alt="Gambar Produk">
                        </a>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next" style="color: black">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container pt-3">
        <div class="row d-flex justify-content-center">
            <div class="col-6 col-md-3 mb-3">
                <div class="card-services text-center d-inline justify-content-center align-items-center mx-auto">
                    <div>
                        <img src="asset/img/1.png" class="card-img-top" alt="icon" style="max-width: 3rem">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Gratis Konsultasi</h5>
                        <p class="card-text">Kebutuhan Acara</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <div class="card-services d-inline text-center justify-content-center align-items-center">
                    <div>
                        <img src="asset/img/2.png" class="card-img-top" alt="icon" style="max-width: 3rem">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Jaminan Kepuasan</h5>
                        <p class="card-text">Kualitas Terbaik</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <div class="card-services d-inline text-center justify-content-center align-items-center">
                    <div>
                        <img src="asset/img/3.png" class="card-img-top" alt="icon" style="max-width: 3rem">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Terpercaya</h5>
                        <p class="card-text">Event-event Nasional</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="container-fluid mt-5">
            <div class="container-fluid mt-5">
                <div class="d-flex w-100 justify-content-between align-items-center mb-3">
                    <h5 class="fs-3 d-inline" style="opacity: 0.8">Produk Sewa</h5>
                    <a href="/all-product" class="btn btn-outline-secondary btn-sm ms-2">Lihat Semua</a>
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
                    @foreach ($products as $product)
                        <div class="col">
                            <div class="card card-layanan" style="height: 21rem;">
                                <img src="{{ asset('public/image/' . $product->gambar) }}" class="card-img-top img-fluid"
                                    alt="Product Image" style="width: 100%; height: 200px; object-fit: cover;">
                                <div class="card-body mx-auto ">
                                    <a href="/product/{{ $product->id }}">
                                        <p class="card-title text-center card-header"
                                            style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; height: 2rem; color: black; list-style-type: none;">
                                            {{ $product->nama_product }}</p>
                                    </a>
                                    <h5 class="card-text text-warning mt-2">Rp. {{ $product->harga_sewa }},- <span
                                            style="font-size: 16px; color: #1d1d1d; opacity: 0.8;"></span> </h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <img src="asset/img/placeholder.png" alt=""
                                                style="width: 10px; object-fit: contain; margin-right: 4px;">
                                            <p class="mb-0"
                                                style="font-size: 12px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
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
            <div class="container-fluid mt-5">
                <div class="d-flex w-100 justify-content-between align-items-center mb-3">
                    <h5 class="fs-3 d-inline" style="opacity: 0.8">Paket Sewa</h5>
                    <a href="/all-paket" class="btn btn-outline-secondary btn-sm ms-2">Lihat Semua</a>
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                    @foreach ($pakets as $data)
                        @php
                            $product = $paketProducts->where('paket_id', $data->id);
                        @endphp
                        <div class="col" style="">
                            <div class="card card-layanan" style="height: 23rem;">
                                <img src="{{ asset('public/image/' . $data->gambar_paket) }}"
                                    class="card-img-top img-fluid" alt="Product Image"
                                    style="width: 100%; height: 200px; object-fit: cover;">
                                <div class="card-body mx-auto mb-0">
                                    <a href="/paket/{{ $data->id }}">
                                        <p class="card-title text-center card-header"
                                            style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; height: 2rem; color: black;
                                        font-size: 11px; list-style-type: none;">
                                            {{ $data->nama_paket }}</p>
                                    </a>
                                    <h5 class="card-text text-warning mt-2">Rp. {{ $data->harga }},- <span
                                            style="font-size: 16px; color: #1d1d1d; opacity: 0.8;"></span> </h5>
                                    <p style="font-size: 8px; font-style: italic">
                                        @foreach ($product as $p)
                                            {{ $loop->iteration }}. {{ $p->product->nama_product }} |
                                        @endforeach
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <img src="asset/img/placeholder.png" alt=""
                                                style="width: 10px; object-fit: contain; margin-right: 4px;">
                                            <p class="mb-0"
                                                style="font-size: 12px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                Grobogan
                                            </p>
                                        </div>
                                        <a class="border" style="border-radius: 10px; padding: 5px" href="https://api.whatsapp.com/send?phone=6281226562081&text={{ urlencode('Halo, saya tertarik dengan produk ' . $data->nama_paket ) }}"><img
                                                src="asset/img/chat.png" style="width: 18px;" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-8 my-auto">
                        <h3 class="text-justify" style="opacity: 0.8; font-size: 42px; font: bold">
                            Sukseskan acaramu dengan Mudah, Murah, dan Cepat bersama <span style="color: #E72929">Sabdha
                                Langit Indonesia!</span>
                        </h3>
                        <p style="font-size: 14px">Ciptakan Acara Tak Terlupakan dengan Sabdha Langit! Pesan sekarang untuk
                            pengalaman menyewa perlengkapan event yang mudah dan efisien. Bersiaplah merayakan momen
                            istimewa dengan Sabdha Langit – Solusi Terbaik untuk Event Anda!</p>
                        <a href="https://api.whatsapp.com/send?phone=6281226562081&text"><button class="btn btn-warning">Hubungi Kami</button></a>
                    </div> <!-- Tutup div col-md-6 -->
                    <div class="col-md-4">
                        <img src="asset/img/icon-semut.png" class="img-fluid rounded" alt="Tentang Kami">
                    </div>
                </div>
            </div>


            <div class="container mt-5">
                <h5 class="text-start fs-3" style="opacity: 0.8">Cara Pemesanan</h5>
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="asset/img/LANGKAH1.png" class="d-block w-100" alt="Langkah Pesan 1">
                        </div>
                        <div class="carousel-item">
                            <img src="asset/img/LANGKAH2.png" class="d-block w-100" alt="Langkah Pesan 2">
                        </div>
                        <div class="carousel-item">
                            <img src="asset/img/LANGKAH3.png" class="d-block w-100" alt="Langkah Pesan 3">
                        </div>
                        <div class="carousel-item">
                            <img src="asset/img/LANGKAH4.png" class="d-block w-100" alt="Langkah Pesan 4">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="text-start mt-5">
                <h2 class="fs-3" style="opacity: 0.8">BTS: Proses Loading Event</h2>
            </div>
            <div class="container-bts mt-4">
                <div class="embed-responsive embed-responsive-16by9">
                    <!-- Kode Iframe YouTube -->
                    <iframe class="embed-responsive-item" width="560" height="315"
                        src="https://www.youtube.com/embed/Sh9zivIVnso?si=YSzE86SJhILuTX5i" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe class="embed-responsive-item" width="560" height="315"
                        src="https://www.youtube.com/embed/kaof_VOrKvU?si=6O1I7p9A0m1XbOqa" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe class="embed-responsive-item" width="560" height="315"
                        src="https://www.youtube.com/embed/HcIAS4EsNPM?si=UvPXM5cnrXbkbCT3" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe class="embed-responsive-item" width="560" height="315"
                        src="https://www.youtube.com/embed/Sh9zivIVnso?si=YSzE86SJhILuTX5i" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
            <div class="text-start mt-4 pb-5">
                <p>Proses di balik layar dari keseruan proses penyewaan alat event CV. Sabdha Langit Indonesia</p>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script></script>


    @endsection
    <style>
        .scroll-card {
            display: flex;
            overflow-x: auto;
            padding: 1rem;
            gap: 1rem;
        }

        .card-layanan {
            min-width: 200px;
            flex: 0 0 auto;
        }

        .scroll-card::-webkit-scrollbar {
            display: none;
            /* Hide scrollbar for Chrome, Safari, and Opera */
        }

        .scroll-card {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>
    <script>
        $(document).ready(function() {
            var silder = $(".owl-carousel");
            silder.owlCarousel({
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: false,
                items: 1,
                stagePadding: 20,
                center: true,
                nav: false,
                margin: 50,
                dots: true,
                loop: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 2
                    },
                    575: {
                        items: 2
                    },
                    768: {
                        items: 2
                    },
                    991: {
                        items: 3
                    },
                    1200: {
                        items: 4
                    }
                }
            });
        });
    </script>
