// // JavaScript untuk menangani acara input dari pengguna
// document.getElementById('search-input').addEventListener('input', function() {
//     var query = this.value.trim();

//     // Kirim permintaan AJAX untuk mendapatkan rekomendasi hasil pencarian
//     fetch('/search?query=' + query)
//         .then(response => response.json())
//         .then(products => {
//             displaySuggestions(products);
//         })
//         .catch(error => console.error('Error fetching search suggestions:', error));
// });

// // Fungsi untuk menampilkan rekomendasi hasil pencarian
// function displaySuggestions(products) {
//     var suggestionList = document.getElementById('suggestion-list');
//     suggestionList.innerHTML = ''; // Bersihkan daftar rekomendasi sebelum menampilkan yang baru

//     if (products.length > 0) {
//         products.forEach(product => {
//             var listItem = document.createElement('li');
//             listItem.classList.add('dropdown-item');
//             listItem.textContent = product.nama_product + ' - ' + product.deskripsi; // Sesuaikan dengan struktur data produk Anda
//             suggestionList.appendChild(listItem);
//         });

//         document.getElementById('search-suggestions').classList.add('show'); // Tampilkan daftar rekomendasi
//     } else {
//         document.getElementById('search-suggestions').classList.remove('show'); // Sembunyikan daftar rekomendasi jika tidak ada hasil
//     }
// }
// document.getElementById('search-form').addEventListener('submit', function(event) {
//     event.preventDefault(); // Mencegah formulir dari submit

//     var query = document.getElementById('search-input').value.trim(); // Mendapatkan nilai query dari input pencarian

//     if (query) {
//         var searchUrl = 'http://127.0.0.1:8000/search?query=' + encodeURIComponent(query);
//         window.location.href = searchUrl; // Melakukan redirect ke halaman hasil pencarian dengan query yang sesuai
//     }
// });


// // Tangani aksi form pencarian
// document.getElementById('searchForm').addEventListener('submit', function(event) {
//     event.preventDefault(); // Hindari pengiriman form standar
//     var query = document.getElementById('searchInput').value;

//     // Tampilkan elemen loading
//     document.getElementById('loadingIndicator').style.display = 'block';

//     // Lakukan permintaan AJAX untuk pencarian
//     fetch('/search?query=' + query)
//         .then(response => response.json())
//         .then(data => {
//             displaySearchResults(data);
//             // Sembunyikan elemen loading setelah mendapatkan hasil pencarian
//             document.getElementById('loadingIndicator').style.display = 'none';
//         })
//         .catch(error => console.error('Error fetching search results:', error));
// });

