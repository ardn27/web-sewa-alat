@extends('layout/layouts')

@section('title', 'Hasil Pencarian')

<header>
    @include('layout.navbar')
</header>


@section('layout.content')
<a href="https://api.whatsapp.com/send?phone=6281228868914" class="whatsapp-float" target="_blank">
    <i class="fab fa-whatsapp"></i>
</a>
<div class="header-categories container fluid w-full h-30 bg-primary p-1 rounded" style="margin-top: 7rem">
    <p class="fs-1 text-center text-light">Paket Sewa</p>
    <p class="fs-4 text-center text-warning">
        {{ $resultsTotals }} Product
    </p>
</div>
<div class="container-fluid mt-5">
    <div class="container mt-4">
        <div class="row justify-content-end">
            <div class="col-md-4">
                <form action="{{ route('allPaket') }}" method="get" id="filterForm">
                    <div class="row g-2 g-lg-3 align-items-center">
                        <div class="col-auto">
                            <label for="sort_by" class="form-label"><i class="fa-solid fa-filter"></i></label>
                        </div>
                        <div class="col">
                            <select name="sort_by" id="sort_by" class="form-select">
                                <option value="lowest_price" {{ $sortBy == 'lowest_price' ? 'selected' : '' }}>Harga
                                    Terendah</option>
                                <option value="highest_price" {{ $sortBy == 'highest_price' ? 'selected' : '' }}>Harga
                                    Tertinggi</option>
                                <option value="a_z" {{ $sortBy == 'a_z' ? 'selected' : '' }}>A-Z</option>
                                <option value="z_a" {{ $sortBy == 'z_a' ? 'selected' : '' }}>Z-A</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="gap-2 row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($pakets as $data)
            @php
            $product = $paketProducts->where('paket_id', $data->id);
        @endphp
                <div class="col" style="">
                    <div class="card card-layanan" style="height: 23rem;">
                        <img src="{{ asset('public/image/' . $data->gambar_paket) }}" class="card-img-top img-fluid"
                            alt="Product Image" style="width: 100%; height: 200px; object-fit: cover;">
                        <div class="card-body mx-auto mb-0">
                            <a href="/product/{{$data->id}}">
                            <p class="card-title text-center card-header"
                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; height: 2rem; color: black;
                                font-size: 11px; list-style-type: none;">
                                {{ $data->nama_paket }}</p></a>
                            <h5 class="card-text text-warning mt-2">Rp. {{ $data->harga}},- <span
                                    style="font-size: 16px; color: #1d1d1d; opacity: 0.8;">/hari</span> </h5>
                                    <p style="font-size: 8px; font-style: italic">
                                        @foreach ($product as $p)
                                                        {{ $p->product->nama_product }},
                                                @endforeach
                                    </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <img src="asset/img/placeholder.png" alt="" style="width: 10px; object-fit: contain; margin-right: 4px;">
                                    <p class="mb-0" style="font-size: 12px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        Grobogan
                                    </p>
                                </div>
                                <a class="border" style="border-radius: 10px; padding: 5px" href=""><img src="asset/img/chat.png" style="width: 18px;" alt=""></a>
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
            window.location.href = '/all-paket?sort_by=' + $('#sort_by').val() + '&query=' + query;
        });
    });
</script>
@endsection
