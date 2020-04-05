# SATGAS SIAGA COVID19 TULUNGAGUNG
---------------------
 SATGAS SIAGA COVID19 TULUNGAGUNG adalah aplikasi untuk mendapatkan update terbaru persebaran mengenai virus Corona (COVID-19) di Tulungagung.


## Instalasi
---------------

**1. Clone repository ini ke dalam repository lokal kamu**

```
$ git clone https://github.com/alfanjauhari/tulungagung-covid19.git
```
Tunggu beberapa saat dan masuk ke dalam folder crona dengan menjalankan perintah `$ cd tulungagung-covid19`

**2. Install Peduli Corona dengan composer dan npm**

```
$ composer install && npm install
```
Proses mungkin akan memakan beberapa menit tergantung kualitas internet kamu.

**3. Setting User dan Nama Database pada file .env**

Jalankan perintah untuk merename atau mengcopy file .env.example menjadi .env `$ cp -rf .env.example .env`<br>

Setting User dan Database seperti dibawah ini;
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=(nama_database)
DB_USERNAME=(user_database)
DB_PASSWORD=(password_database)
```
**4. Migrate Database Untuk mengisi database yang masih kosong**

Pastikan sudah menjalankan step ke 3 :

```
$ php artisan covid:go
```

**5. Konfigurasi Key**

Konfigurasi key untuk memastikan aplikasi Peduli Corona berjalan lancar dengan menjalankan perintah :

```
$ php artisan key:generate
```


**6. Jalankan aplikasi Peduli Corona**

Setelah proses instalasi di atas, kamu sudah bisa menjalankan aplikasi dengan menjalankan perintah 

```
$ php artisan serve
```
Atau jika kalian menggunakan Laragon atau sejenisnya, kalian bisa membuka langsung di browser dengan menulis http://crona.test/ di URL bar.

## Creators
---------------
Aplikasi dibuat oleh dua orang dari Tulungagung dibantu dengan kontributor yang bersedia meluangkan waktu dan tenaganya.

1. [Muhammad Surya Maulana](https://github.com/suryamaulana)
2. [Muhammad Alfan Jauhari](https://github.com/alfanjauhari)
3. [Para Kontributor](#kontributor)


## Kontributor
Kontributor untuk aplikasi Peduli Corona, terima kasih atas kontribusinya. 

1. [Defri Indra Mahardika](https://github.com/defrindr)
2. [M Faruq](https://github.com/mfaruq10) 
3. Kamu kah selanjutnya?

## Kontribusi
Kamu ingin menjadi gabungan dari SATGAS SIAGA COVID19 TULUNGAGUNG? Kamu bisa membaca panduan untuk [berkontribusi kami](KONTRIBUSI.md).

## LICENSE
Repository ini berada di bawah lisensi [MIT LICENSE](LICENSE)