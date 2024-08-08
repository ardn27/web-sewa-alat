<nav class="navbar fixed-top navbar-expand-lg shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a class="navbar-brand fw-bold" href="/"><img src="asset/img/logo-sabdha-langit.PNG" alt="logo sabdha langit"
                style="margin-left: 2rem; width: 4rem;"></a>
        <div class="search-bar" id="navbarSupportedContent">
            <div class="dropdown">
                <button class="btn btn-lg dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="color: ##E72929"> Kategori
                </button>
                <div class="kategori-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/videotron">LED Videotron</a>
                    <a class="dropdown-item" href="/penutup-ruangan">Penutup Ruangan</a>
                    <a class="dropdown-item" href="/tempat-duduk">Meja Kursi & Sofa</a>
                    <a class="dropdown-item" href="/pendingin">AC Kipas</a>
                    <a class="dropdown-item" href="/karpet">Karpet Flooring</a>
                    <a class="dropdown-item" href="/panggung">Panggung</a>
                    <a class="dropdown-item" href="/tenda">Tenda Sarnafil</a>
                    <a class="dropdown-item" href="/pengamanan">Protector</a>
                    <a class="dropdown-item" href="/genset">Genset</a>
                    <!-- Tambahkan lebih banyak item jika diperlukan -->
                </div>
            </div>
            <form class="d-flex" action="{{ route('autocomplete') }}" method="GET" role="search">
                <input class="search form-control border-2 me-2" id="searchInput" style="border: 2px solid #7FC7D9"
                    type="search" placeholder="Mau sewa apa hari ini..." aria-label="Search" name="query">
                <button class="button-search btn btn-outline-secondary bg-white" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                <!-- Dropdown untuk hasil pencarian -->
                <div class="dropdown-menu" id="searchDropdown" aria-labelledby="dropdownMenuButton">
                    <!-- Hasil pencarian akan muncul di sini -->
                </div>
            </form>
        </div>
    </div>
</nav>

<div id="loadingIndicator" style="display: none;">
    Loading...
</div>

<div class="container" style="margin-top: 6rem">
    @yield('layout.content')
</div>

<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Handler untuk input pengguna
        $('#searchInput').on('input', function() {
            var query = $(this).val();

            // Lakukan permintaan AJAX untuk mendapatkan rekomendasi konten
            $.ajax({
                url: '/search', // Endpoint untuk autocomplete
                method: 'GET',
                data: {
                    query: query
                },
                success: function(data) {
                    // Kosongkan dropdown sebelum memperbarui dengan rekomendasi baru
                    $('#searchDropdown').empty();

                    // Periksa apakah ada rekomendasi yang diterima dari server
                    if (data.html !== '') {
                        // Tambahkan HTML rekomendasi ke dalam dropdown
                        $('#searchDropdown').html(data.html);
                        $('#searchDropdown')
                    .show(); // Tampilkan dropdown setelah mengupdate data
                    } else {
                        // Jika tidak ada rekomendasi, sembunyikan dropdown
                        $('#searchDropdown').hide();
                    }
                },
                error: function(err) {
                    console.error('Error fetching search results:', err);
                }
            });
        });

        // Handler untuk tombol pencarian
        $('form').submit(function(e) {
            e.preventDefault(); // Mencegah form dari submit

            var query = $('#searchInput').val(); // Ambil nilai pencarian dari input pengguna

            // Redirect ke halaman hasil pencarian dengan query yang sesuai
            window.location.href = '/search?query=' + query;
        });

        // Handler untuk menutup dropdown saat mengklik di luar dropdown
        $(document).click(function(event) {
            var target = $(event.target);
            if (!target.closest('.dropdown').length && !target.closest('.search').length) {
                $('#searchDropdown').hide();
            }
        });
    });

</script>
