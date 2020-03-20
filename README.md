
# Livecode Indonesia Mengoding - batch Palembang

## 0. Setup & konfigurasi (5 poin)

Setelah clone repositori ini: 
- masuk ke folder live-code di terminal lalu berikan perintah ```composer install``` untuk mendownload folder vendor.
- buat duplikat dari file .env.example lalu simpan file dengan nama .env
- jalankan ```php artisan key:generate```
- jangan lupa buat branch sendiri. Untuk memudahkan penilaian, nama branch HARUS sesuai nama username gitlab masing-masing. 
- soal sudah siap dikerjakan. ```php artisan serve```

## 1. Soal ERD (20 poin)
Seorang klien ingin dibuatkan sebuah web portal forum desainer grafis. Berikut deskripsi web nya:
- user dapat menyimpan data : id, name, email, password. (5 poin)
- user dapat membuat dan mengupdate portofolio. 
- 1 user dapat memiliki banyak portofolio. 1 portofilio hanya dimiliki 1 user. (5 poin)
- 1 portofolio menyimpan data: project_name, url_image (alamat url gambar). (5 poin)
- 1 user dapat mengikuti (following) ke banyak user lainnya, 1 user dapat diikuti (followed) oleh banyak user lainnya. (5 poin)

Buatlah desain ERD untuk keperluan membuat portal web tersebut lalu export ke dalam format gambar (PNG). Kamu bisa gunakan Mysql Workbench atau melalui aplikasi online menggambar ERD seperti https://www.draw.io/ .

Simpan file PNG tersebut di dalam folder images dan simpan folder images tersebut di folder public di project Laravel livecode ini. 

## 2. Soal Migrations (20 poin)
Buat file migrations yang diimplementasi dari desain ERD yang sudah dibuat di soal No. 1.  

## 3. Soal Model (10)
Buatlah Model untuk merepresentasikan data Portofolio pada database. Pastikan Model terhubung dengan tabel yang tepat. (10 point)

## 4. Soal Controller (10 poin)
Buatlah controller untuk mengatur fitur portofolio yang melingkupi:
* menampilkan keseluruhan data portofolio (3 poin)
* menampilkan halaman form untuk membuat portofolio. (3 poin)
* menyimpan data portofolio baru ke database. (4 poin)

## 5. Templating Blade & Routing (25 poin)
- Pada project ini kamu diminta untuk memasangkan template dari SB-Admin-2 https://startbootstrap.com/themes/sb-admin-2/. Kami sudah memasangkan asset-asset yang sudah didownload dari halaman SB-Admin-2 di folder public. Tugas kamu adalah memperbaiki template master blade yang terdapat di folder resources/views/layouts/master.blade.php dan hubungkan dengan asset-asset yang diperlukan.  (5 poin)
- Web memiliki 3 url untuk dibuatkan halaman route dan tampilan blade nya. ketentuannya seperti berikut (10 poin): 

| url                         | keterangan      |
|----------                   |  -------------- |
| ```'/'```                   | menampilkan gambar PNG desain ERD yang sudah dibuat di soal no. 1  |
| ```'/portofolio' ```        | menampilkan tabel berisi data portofolio |
| ```'/portofolio/create'```  | menampilkan form untuk membuat portofolio baru  |

- pasangkanlah script berikut ini ke HANYA ke halaman blade untuk menampilkan data pada tabel portofolio (pada url ```'/portofolio'```). (10 poin)

```html
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Memasangkan script sweet alert',
        icon: 'success',
        confirmButtonText: 'Cool'
    })
</script>

```
- Jika pemasangan script pada poin sebelumnya berhasil maka akan menampilkan alert seperti ini di halaman portofolio tersebut: 
![swal-example.gif](swal-example.gif?raw=true)

## 6. Alur Portofolio(10 poin)
Buatlah alur menu portofolio dengan gambaran seperti berikut: 
- di halaman portofolio index (url: ```'/portofolio'```) terdapat table menampilkan seluruh data portofolio. juga terdapat tombol hyperlink yang menuju ke halaman create portofolio (url: ```'/portofolio/create'```). (3 poin)
- di halaman create menampilkan form untuk membuat portofolio baru. (3 poin)
- setelah form disubmit maka data portofolio baru disimpan di database dan halaman di redirect ke halaman portofolio index (url: ```'/portofolio'```) dengan data pada tabel yang terbaru. (4 poin)

## 7. Palindrome Angka (20 poin)
Buatlah route dengan nama url ```'/palindrome-angka/{angka}'```. Parameter ```{angka}``` pada url adalah sebuah angka yang akan diolah di server (bisa di controller atau melalui function closure langsung di web.php ). 
route tersebut akan mengembalikan angka selanjutnya yang mengandung nilai angka palindrome. 
Contoh, jika angka adalah 27, maka route akan me-return nilai 33 karena angka 33 adalah angka palindrom. Jika angka dari awal sudah merupakan palindrome, maka route harus mencari angka selanjutnya yang palindrome. Contoh, jika angka adalah 8, walaupun dia sudah palindrome, harus mencari angka selanjutnya yang palindrome, yaitu 9.

Contoh test case seperti berikut: 
- ```localhost:8000/palindrome-angka/8``` akan mengembalikan angka 9
- ```localhost:8000/palindrome-angka/10``` akan mengembalikan angka 11
- ```localhost:8000/palindrome-angka/117``` akan mengembalikan angka 121
-  ```localhost:8000/palindrome-angka/175``` akan mengembalikan angka 181
-  ```localhost:8000/palindrome-angka/1000``` akan mengembalikan angka 1001

### Catatan: 
- route boleh ditampilkan dengan view blade atau tidak memakai view tidak apa-apa langsung return nilai nya saja di browser. 
- angka satu digit (1 sampai 9) adalah palindrome.
- TIDAK BOLEH menggunakan function bawaan dari PHP seperti ```strrev()``` untuk mengolah data angka palindrome. HANYA gunakan looping biasa saja. 

