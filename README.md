<h1>News Portal API</h1>
<p>News Portal API adalah sebuah API (Application Programming Interface) berbasis web untuk membaca, menambahkan, mengubah, dan menghapus berita dari berbagai sumber. Aplikasi ini dikembangkan menggunakan framework Laravel versi 9 dan menggunakan database MySQL.</p>

<h2>Fitur</h2>
<p>News Portal API memiliki fitur sebagai berikut:</p> 
  <ol>
    <li>Menambahkan Berita: News Portal API dapat menambahkan berita baru ke dalam database.</li>
    <li>Melihat Berita: News Portal API memungkinkan pengguna untuk melihat semua berita yang tersedia di database.</li>
    <li>Mengubah Berita: News Portal API memungkinkan pengguna untuk mengubah berita yang sudah ada di database.</li>
    <li>Menghapus Berita: News Portal API memungkinkan pengguna untuk menghapus berita yang sudah ada di database.</li>
  </ol>

<h2>Cara Menggunakan Aplikasi</h2>
<p>Aplikasi News Portal API dapat diakses menggunakan Postman untuk melakukan permintaan HTTP ke API.</p>

<h2>Teknologi yang Digunakan</h2>
<p>Aplikasi ini dikembangkan menggunakan teknologi sebagai berikut:</p>
<ol>
  <li>Backend: Aplikasi ini menggunakan PHP sebagai bahasa pemrograman backend dengan framework Laravel. Database yang digunakan adalah MySQL.</li>
  <li>Postman: Postman adalah aplikasi yang digunakan untuk menguji, menguji coba, dan berinteraksi dengan API. Dalam Postman, pengguna dapat membuat permintaan HTTP ke server API dan memeriksa respons dari server tersebut. Postman menyediakan antarmuka pengguna grafis yang memungkinkan pengguna untuk dengan mudah menambahkan header, parameter, dan payload ke permintaan, serta memeriksa respons dari server dengan mudah. Postman sangat berguna bagi pengembang dan tim pengembangan API untuk memudahkan proses pengembangan dan pengujian API.</li>
</ol>

<h2>Instalasi</h2>
<p>Berikut adalah langkah-langkah untuk menginstal News Portal API:</p>

<ol>
  <li>Clone repository ini <a href="https://github.com/aldistate/news-portal-API.git">https://github.com/aldistate/news-portal-API.git</a> atau download repository ini dan extract ke dalam folder yang diinginkan.</li>
  <li>Jalankan perintah 'composer install' pada terminal di folder aplikasi.</li>
  <li>Salin file .env.example menjadi .env , jalankan perintah 'cp .env.example .env' pada terminal</li>
  <li>Buat key baru untuk aplikasi, jalankan perintah 'php artisan key:generate' pada terminal</li>
  <li>Buatlah sebuah database baru di MySQL dengan nama 'news-portal-api'.</li>
  <li>Buka file .env dan ubah konfigurasi database sesuai dengan database yang sudah dibuat.</li>
  <li>Jalankan migrasi database, dengan perintah 'php artisan migrate'</li>
  <li>Jalankan server development, dengan perintah 'php artisan serve'</li>
  <li>Buka web browser dan akses http://localhost:8000 untuk membuka aplikasi.</li>
</ol>


<!-- <h2>Penggunaan</h2>
<p>Untuk menggunakan aplikasi Pembayaran Air, ikuti langkah-langkah berikut:</p>

<ol>
  <li>Buka aplikasi melalui web browser dengan mengakses http://localhost:8000.</li>
  <li>Pada halaman utama, akan terdapat tabel daftar pelanggan yang sudah terdaftar.</li>
  <li>Untuk menambahkan data pelanggan baru, klik tombol "Tambah Pembayaran Air" pada bagian atas tabel.</li>
  <li>Isikan data pelanggan pada form yang muncul dan klik tombol "Create Tagihan".</li>
  <li>Data pelanggan baru akan muncul pada tabel di halaman utama.</li>
  <li>Untuk melihat detail tagihan pelanggan, klik tombol bergambar mata pada kolom aksi pada tabel pelanggan.</li>
  <li>Pada halaman detail tagihan, akan ditampilkan informasi detail tagihan pelanggan.</li>
  <li>Untuk mengedit data pelanggan, klik tombol bergambar pensil pada kolom aksi pada tabel pelanggan di halaman utama.</li>
  <li>Pada halaman edit pelanggan, ubah data pelanggan dan klik tombol "Update Tagihan".</li>
  <li>Data pelanggan akan terupdate pada tabel di halaman utama.</li>
  <li>Untuk menghapus data pelanggan, klik tombol bergambar tong sampah pada kolom aksi pada tabel pelanggan di halaman utama.</li>
</ol> -->
<br>
<p>Demikianlah dokumentasi mengenai cara menggunakan aplikasi News Portal API. Dengan API ini, pengguna dapat melakukan operasi CRUD (Create, Read, Update, Delete) pada berita.
</p>
<p>
API ini dibangun dengan menggunakan framework Laravel versi 9, yang merupakan salah satu framework PHP paling populer. Framework Laravel menyediakan banyak fitur dan fungsionalitas yang berguna untuk membangun aplikasi web, termasuk API.
</p>
<p>Semoga aplikasi ini bisa membantu teman-teman yang ingin belajar bagaimana membuat API sederhana dengan Laravel dan MySQL. Jangan ragu untuk mengembangkan aplikasi ini lebih jauh, menambahkan fitur baru, atau memperbaiki kode yang ada untuk meningkatkan performa dan fungsionalitasnya. Terima kasih telah membaca, semoga bermanfaat!</p>