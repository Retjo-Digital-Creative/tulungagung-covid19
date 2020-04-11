# SATGAS SIAGA COVID19 TULUNGAGUNG
---------------------
 SATGAS SIAGA COVID19 TULUNGAGUNG adalah aplikasi untuk mendapatkan update terbaru persebaran mengenai virus Corona (COVID-19) di Tulungagung yang dikembangkan oleh para [Creators](#creator) dan [Kontributror](#kontributor) yang bersedia meluangkan waktunya untuk berkontribusi membuat Aplikasi yang berbasis website [SATGAS SIAGA COVID19 TULUNGAGUNG](#satgas-siaga-covid19-tulungagung).

## Table Of Contents
- [SATGAS SIAGA COVID19 TULUNGAGUNG](#satgas-siaga-covid19-tulungagung)
  - [Table Of Contents](#table-of-contents)
  - [Creators](#creators)
  - [Kontributror](#kontributor)
  - [Instalasi](#Instalasi)
  - [Dokumentasi API dan Konfigurasi Chart](#dokumentasi-api-dan-konfigurasi-chart)
  - [List Application Programming Interface (API)](#list-api)
  - [License](#license)
 SATGAS SIAGA COVID19 TULUNGAGUNG
 

## Creators
---------------
Aplikasi dibuat oleh dua orang dari Tulungagung dibantu dengan kontributor yang bersedia meluangkan waktu dan tenaganya.

<table>
    <tr>
      <td align="center">
        <a href="https://www.instagram.com/surya_maulana70"><img src="https://avatars3.githubusercontent.com/u/29894661?v=3" width="100px;" alt=""/><br />
        <sub><b>Muhammad Surya</b></sub></a><br /> 
        <a href="#ideas-suryamaulana" title="Ideas, Planning, & Testing">🤔</a>
        <a href="https://github.com/alfanjauhari/tulungagung-covid19/commits?author=suryamaulana" title="Code">💻</a>
        <a href="#maintenance-suryamaulana" title="Maintenance">🚧</a>
        <a href="#suryamaulana" title="Infrastructure (Hosting, Build-Tools, etc)">🚇</a>
        <a href="https://github.com/alfanjauhari/tulungagung-covid19/commits?author=suryamaulana" title="Documentation">📖</a>
        </td>
      <td align="center">
        <a href="https://www.instagram.com/alfanjauhari_"><img src="https://avatars3.githubusercontent.com/u/57592351?v=3" width="100px;" alt=""/><br />
        <sub><b>Alfan Jauhari</b></sub></a><br /> 
        <a href="https://github.com/alfanjauhari/tulungagung-covid19/commits?author=alfanjauhari" title="Code">💻</a> 
        <a href="#ideas-alfanjauhari" title="Ideas, Planning, & Testing">🤔</a> 
        <a href="#maintenance-alfanjauhari" title="Maintenance">🚧</a>
        <a href="#question-alfanjauhari" title="Answering Questions">💬</a>
        <a href="#code-reviewer" title="Reviewed Pull Requests">👀</a>
      </td>
    </tr>
</table>

## Kontributor
Kontributor untuk aplikasi SATGAS COVID19 TULUNGAGUNG. 

<table>
    <tr>
      <td align="center">
        <a href="https://www.instagram.com/defrindr"><img src="https://avatars2.githubusercontent.com/u/37988569?v=3" width="100px;" alt=""/><br />
        <sub><b>Defri Indra M</b></sub></a><br /> 
        <a href="https://github.com/alfanjauhari/tulungagung-covid19/commits?author=defri Indra M" title="Code">💻</a>
        <a href="#ideas-defrindr" title="Ideas, Planning, & Testing">🤔</a>
        </td>
      <td align="center">
        <a href="https://www.instagram.com/mfaruq10"><img src="https://avatars3.githubusercontent.com/u/9819957?v=3" width="100px;" alt=""/><br />
        <sub><b>M Faruq</b></sub></a><br /> 
        <a href="https://github.com/alfanjauhari/tulungagung-covid19/commits?author=mfaruq" title="Design">🎨</a> 
        </td>
      <td align="center">
        <a href="https://www.instagram.com/saddamazyazy"><img src="https://avatars3.githubusercontent.com/u/9819957?v=3" width="100px;" alt=""/><br />
        <sub><b>Saddam Azy</b></sub></a><br /> 
        <a href="https://github.com/alfanjauhari/tulungagung-covid19/commits?author=mfaruq" title="Code">💻</a>
        <a href="#ideas-alfanjauhari" title="Ideas, Planning, & Testing">🤔</a>  
      </td>
    </tr>
</table>


## Instalasi
---------------

**1. Clone repository ini ke dalam repository lokal kamu**

```
$ git clone https://github.com/alfanjauhari/tulungagung-covid19.git
```
Tunggu beberapa saat dan masuk ke dalam folder crona dengan menjalankan perintah `$ cd tulungagung-covid19`

**2. Install Aplikasi dengan composer dan npm**

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

Konfigurasi key untuk memastikan aplikasi berjalan lancar dengan menjalankan perintah :

```
$ php artisan key:generate
```


**6. Jalankan aplikasi**

Setelah proses instalasi di atas, kamu sudah bisa menjalankan aplikasi dengan menjalankan perintah 

```
$ php artisan serve
```
Atau jika kalian menggunakan Laragon atau sejenisnya, kalian bisa membuka langsung di browser dengan menulis http://crona.test/ di URL bar.

## Dokumentasi API dan Konfigurasi Chart

**1. Konfigurasi Chart**
Konfigurasi Chart Menggunakan API dari ```/chart``` dan menggunakan javascript pada file ```resources/views/home/landing.blade.php Line 666-734```<br>


Controller API Chart ada di directory /app/Http/Controller/Api/ApiController.php

```php
    public function chart(){
		$data = array(
			'jumlah_positif' => array(), // as array
			'jumlah_meninggal' => array(), // as array
			'jumlah_sembuh' => array(), // as array
			'jumlah_odp' => array(), // as array
			'jumlah_pdp' => array() // as array
		);
		$dates = array(); // as array
		for($i=6; $i>=0; $i--){ // Looping 7x Untuk mengambil data 7 hari terakhir (array start from 0)
            $date = date('Y-m-d', strtotime("-{$i} day"));
            // $temp adalah pernyataan yang dikirim ke database server dan di looping 7x untuk mengambil data 7 hari terakhir
			$temp = DB::select("SELECT SUM(jumlah_positif) as jumlah_positif, SUM(jumlah_meninggal) as jumlah_meninggal, SUM(jumlah_sembuh) as jumlah_sembuh, SUM(jumlah_odp) as jumlah_odp, SUM(jumlah_pdp) as jumlah_pdp FROM (SELECT * FROM (SELECT * FROM ((SELECT * FROM data_covid_tulungagung as a) UNION ALL (SELECT a.id, a.nama_kecamatan, b.jumlah_positif, b.jumlah_meninggal, b.jumlah_sembuh, b.jumlah_odp, b.jumlah_pdp, b.created_at, b.updated_at from data_histories as b inner join data_covid_tulungagung a on a.id = b.data_id)) tbl where DATE(updated_at) <= '{$date}' order by updated_at desc) tbl GROUP BY id) tbl");
			if(!empty($temp[0])){
				$data['jumlah_positif'][] = $temp[0]->jumlah_positif; // mengambil jumlah positif
				$data['jumlah_meninggal'][] = $temp[0]->jumlah_meninggal; // mengambil jumlah meninggal
				$data['jumlah_sembuh'][] = $temp[0]->jumlah_sembuh; // mengambil jumlah sembuh
				$data['jumlah_odp'][] = $temp[0]->jumlah_odp; // mengambil jumlah odp
				$data['jumlah_pdp'][] = $temp[0]->jumlah_pdp; // mengambil jumlah pdp
			}
			$dates[] = $date;
		}
		return response()->json([ // memunculkan output ke bentuk json
			'data' => $data,
			'date' => $dates
		])->withHeaders($this->headers);
    }
```
Berikut Konfigurasi JavaScriptnya :
```javascript
    <script>
        $(document).ready(function(){
            $.ajax ({
               url: '/chart',
               method: 'get',
               success: function(data){
                    window.chartColors = {
                        red: 'rgb(255, 99, 132)',
                        orange: 'rgb(255, 159, 64)',
                        yellow: 'rgb(255, 205, 86)',
                        green: 'rgb(75, 192, 192)',
                        blue: 'rgb(54, 162, 235)',
                        purple: 'rgb(153, 102, 255)',
                        grey: 'rgb(201, 203, 207)'
                    };

                    Chart.Line($("#graph").get(0).getContext("2d"), {
                        data: {
                            labels: data.date,
                            datasets: [
                                {
                                    label: 'jumlah positif',
                                    borderColor: window.chartColors.red,
                                    backgroundColor: window.chartColors.red,
                                    fill: false,
                                    data: data.data.jumlah_positif,
                                },
                                /*{ /* Untuk Menampilkan Line Jumlah Meninggal*/
                                    label: 'jumlah meninggal',
                                    borderColor: window.chartColors.orange,
                                    backgroundColor: window.chartColors.orange,
                                    fill: false,
                                    data: data.data.jumlah_meninggal,
                                },
                                { /* Untuk Menampilkan Line Jumlah Sembuh*/
                                    label: 'jumlah sembuh',
                                    borderColor: window.chartColors.yellow,
                                    backgroundColor: window.chartColors.yellow,
                                    fill: false,
                                    data: data.data.jumlah_sembuh,
                                },
                                { /* Untuk Menampilkan Line Jumlah Orang Dalam Pengwasan*/
                                    label: 'jumlah odp',
                                    borderColor: window.chartColors.green,
                                    backgroundColor: window.chartColors.green,
                                    fill: false,
                                    data: data.data.jumlah_odp,
                                },*/
                                {
                                    label: 'jumlah pdp',
                                    borderColor: window.chartColors.blue,
                                    backgroundColor: window.chartColors.blue,
                                    fill: false,
                                    data: data.data.jumlah_pdp,
                                },
                            ]
                        },
                        options: {
                            responsive: true,
                            hoverMode: 'index',
                            stacked: false,
                            title: {
                                display: true,
                                text: 'Grafik Data Corona Tulungagung'
                            }
                        }
                    });
                } 
            });
        });
``` 

**2. API Chart**

Berikut adalah Output dari API chartnya :

```json
{
  "data": {
    "jumlah_positif": [
      "0",
      "0",
      "0",
      "0",
      "0",
      "0",
      "7"
    ],
    "jumlah_meninggal": [
      "0",
      "0",
      "0",
      "0",
      "0",
      "0",
      "0"
    ],
    "jumlah_sembuh": [
      "0",
      "0",
      "0",
      "0",
      "0",
      "0",
      "0"
    ],
    "jumlah_odp": [
      "17",
      "17",
      "17",
      "17",
      "17",
      "17",
      "784"
    ],
    "jumlah_pdp": [
      "2",
      "2",
      "2",
      "2",
      "2",
      "2",
      "72"
    ]
  },
  "date": [
    "2020-04-05",
    "2020-04-06",
    "2020-04-07",
    "2020-04-08",
    "2020-04-09",
    "2020-04-10",
    "2020-04-11"
  ]
}

```

## List API

**1. API Histori Kasus**

Api history kasus berada di ```/api```
<br>
Controller API Histori Kasus ada di directory /app/Http/Controller/Api/ApiController.php

```php
    public function getData()
    {
    	$data = DataCovid::with('history')->get();
    	return response()->json($data)->withHeaders($this->headers);
    }
```

Output daru API Histori Kasus

```json
[
  {
    "id": 1,
    "nama_kecamatan": "SENDANG",
    "jumlah_positif": 0,
    "jumlah_meninggal": 0,
    "jumlah_sembuh": 0,
    "jumlah_odp": 6,
    "jumlah_pdp": 3,
    "created_at": "2020-03-29T23:26:00.000000Z",
    "updated_at": "2020-04-11T08:17:27.000000Z",
    "history": []
  },
  {
    "id": 2,
    "nama_kecamatan": "PAGERWOJO",
    "jumlah_positif": 0,
    "jumlah_meninggal": 0,
    "jumlah_sembuh": 0,
    "jumlah_odp": 14,
    "jumlah_pdp": 0,
    "created_at": "2020-03-29T23:26:10.000000Z",
    "updated_at": "2020-04-11T08:17:17.000000Z",
    "history": []
  },
  {
    "id": 3,
    "nama_kecamatan": "KARANGREJO",
    "jumlah_positif": 0,
    "jumlah_meninggal": 0,
    "jumlah_sembuh": 0,
    "jumlah_odp": 36,
    "jumlah_pdp": 2,
    "created_at": "2020-03-29T23:26:26.000000Z",
    "updated_at": "2020-04-11T08:16:39.000000Z",
    "history": []
  },
  {
    "id": 4,
    "nama_kecamatan": "KAUMAN",
    "jumlah_positif": 0,
    "jumlah_meninggal": 0,
    "jumlah_sembuh": 0,
    "jumlah_odp": 28,
    "jumlah_pdp": 5,
    "created_at": "2020-03-29T23:26:35.000000Z",
    "updated_at": "2020-04-11T08:17:05.000000Z",
    "history": []
  },
  {
    "id": 5,
    "nama_kecamatan": "NGANTRU",
    "jumlah_positif": 1,
    "jumlah_meninggal": 0,
    "jumlah_sembuh": 0,
    "jumlah_odp": 45,
    "jumlah_pdp": 4,
    "created_at": "2020-03-29T23:26:44.000000Z",
    "updated_at": "2020-04-11T08:16:27.000000Z",
    "history": []
  },
  {
    "id": 6,
    "nama_kecamatan": "GONDANG",
    "jumlah_positif": 0,
    "jumlah_meninggal": 0,
    "jumlah_sembuh": 0,
    "jumlah_odp": 17,
    "jumlah_pdp": 2,
    "created_at": "2020-03-29T23:26:51.000000Z",
    "updated_at": "2020-03-29T23:26:51.000000Z",
    "history": []
  },
  {
    "id": 7,
    "nama_kecamatan": "TULUNGAGUNG",
    "jumlah_positif": 2,
    "jumlah_meninggal": 0,
    "jumlah_sembuh": 0,
    "jumlah_odp": 36,
    "jumlah_pdp": 5,
    "created_at": "2020-03-29T23:27:03.000000Z",
    "updated_at": "2020-04-11T08:15:55.000000Z",
    "history": []
  },
  {
    "id": 8,
    "nama_kecamatan": "BOYOLANGU",
    "jumlah_positif": 0,
    "jumlah_meninggal": 0,
    "jumlah_sembuh": 0,
    "jumlah_odp": 72,
    "jumlah_pdp": 7,
    "created_at": "2020-03-29T23:27:15.000000Z",
    "updated_at": "2020-04-11T08:15:40.000000Z",
    "history": []
  },
  {
    "id": 11,
    "nama_kecamatan": "PAKEL",
    "jumlah_positif": 0,
    "jumlah_meninggal": 0,
    "jumlah_sembuh": 0,
    "jumlah_odp": 139,
    "jumlah_pdp": 4,
    "created_at": "2020-03-29T23:28:12.000000Z",
    "updated_at": "2020-04-11T08:12:50.000000Z",
    "history": []
  },
  {
    "id": 12,
    "nama_kecamatan": "KEDUNGWARU",
    "jumlah_positif": 1,
    "jumlah_meninggal": 0,
    "jumlah_sembuh": 0,
    "jumlah_odp": 54,
    "jumlah_pdp": 7,
    "created_at": "2020-03-29T23:28:41.000000Z",
    "updated_at": "2020-04-11T08:16:10.000000Z",
    "history": []
  },
  {
    "id": 13,
    "nama_kecamatan": "BANDUNG",
    "jumlah_positif": 2,
    "jumlah_meninggal": 0,
    "jumlah_sembuh": 0,
    "jumlah_odp": 62,
    "jumlah_pdp": 4,
    "created_at": "2020-03-29T23:29:02.000000Z",
    "updated_at": "2020-04-11T08:12:31.000000Z",
    "history": []
  },
  {
    "id": 14,
    "nama_kecamatan": "BESUKI",
    "jumlah_positif": 0,
    "jumlah_meninggal": 0,
    "jumlah_sembuh": 0,
    "jumlah_odp": 24,
    "jumlah_pdp": 2,
    "created_at": "2020-03-29T23:29:17.000000Z",
    "updated_at": "2020-04-11T08:11:46.000000Z",
    "history": []
  },
  {
    "id": 15,
    "nama_kecamatan": "CAMPURDARAT",
    "jumlah_positif": 1,
    "jumlah_meninggal": 0,
    "jumlah_sembuh": 0,
    "jumlah_odp": 50,
    "jumlah_pdp": 9,
    "created_at": "2020-03-29T23:29:31.000000Z",
    "updated_at": "2020-04-11T08:13:08.000000Z",
    "history": []
  },
  {
    "id": 16,
    "nama_kecamatan": "TANGGUNGGUNUNG",
    "jumlah_positif": 0,
    "jumlah_meninggal": 0,
    "jumlah_sembuh": 0,
    "jumlah_odp": 22,
    "jumlah_pdp": 0,
    "created_at": "2020-03-29T23:29:42.000000Z",
    "updated_at": "2020-04-11T08:13:22.000000Z",
    "history": []
  },
  {
    "id": 17,
    "nama_kecamatan": "KALIDAWIR",
    "jumlah_positif": 0,
    "jumlah_meninggal": 0,
    "jumlah_sembuh": 0,
    "jumlah_odp": 54,
    "jumlah_pdp": 0,
    "created_at": "2020-03-29T23:29:50.000000Z",
    "updated_at": "2020-04-11T08:13:45.000000Z",
    "history": []
  },
  {
    "id": 18,
    "nama_kecamatan": "PUCANGLABAN",
    "jumlah_positif": 0,
    "jumlah_meninggal": 0,
    "jumlah_sembuh": 0,
    "jumlah_odp": 5,
    "jumlah_pdp": 1,
    "created_at": "2020-03-29T23:30:02.000000Z",
    "updated_at": "2020-04-11T08:14:14.000000Z",
    "history": []
  },
  {
    "id": 19,
    "nama_kecamatan": "REJOTANGAN",
    "jumlah_positif": 0,
    "jumlah_meninggal": 0,
    "jumlah_sembuh": 0,
    "jumlah_odp": 45,
    "jumlah_pdp": 4,
    "created_at": "2020-03-29T23:30:09.000000Z",
    "updated_at": "2020-04-11T08:14:34.000000Z",
    "history": []
  },
  {
    "id": 20,
    "nama_kecamatan": "SUMBERGEMPOL",
    "jumlah_positif": 0,
    "jumlah_meninggal": 0,
    "jumlah_sembuh": 0,
    "jumlah_odp": 40,
    "jumlah_pdp": 8,
    "created_at": "2020-03-29T23:34:18.000000Z",
    "updated_at": "2020-04-11T08:15:21.000000Z",
    "history": []
  },
  {
    "id": 21,
    "nama_kecamatan": "NGUNUT",
    "jumlah_positif": 3,
    "jumlah_meninggal": 2,
    "jumlah_sembuh": 2,
    "jumlah_odp": 35,
    "jumlah_pdp": 5,
    "created_at": "2020-03-29T23:34:26.000000Z",
    "updated_at": "2020-04-11T09:05:52.000000Z",
    "history": [                   /* HISTORI KASUS */
      {
        "id": 1,
        "data_id": 21,
        "jumlah_positif": 0,
        "jumlah_meninggal": 0,
        "jumlah_sembuh": 0,
        "jumlah_odp": 35,
        "jumlah_pdp": 5,
        "created_at": "2020-03-29T23:34:26.000000Z",
        "updated_at": "2020-04-11T08:27:21.000000Z"
      }
    ]
  }
]
```
**2. API Kasus Tanpa Histori**

API Kasus Tanpa Histori berada di ```/api/covid```
<br>
Controller API Kasus Tanpa Histori ada di directory /app/Http/Controller/Api/CovidController.php

```php
class CovidController extends Controller
{
	public function fetchData(){
		$data = DataCovid::select(
			[
				"nama_kecamatan", //mengambil nama kecamatan
                "jumlah_odp", // mengambil jumlah odp
				"jumlah_pdp", // mengambil jumlah pdp
				"jumlah_positif", // mengambil jumlah positif
				"jumlah_sembuh", // mengambil jumlah sembuh
				"jumlah_meninggal", // mengambil jumlah meninggal 
				DB::raw("jumlah_odp + jumlah_pdp + jumlah_sembuh + jumlah_positif + jumlah_meninggal as jumlah_total") // total
			])->get();
		return response()->json($data); //  memunculkan data kedalam bentuk json
	}
}
```

Output API Kasus Tanpa Histori

```json
[
  {
    "nama_kecamatan": "SENDANG",
    "jumlah_odp": 6,
    "jumlah_pdp": 3,
    "jumlah_positif": 0,
    "jumlah_sembuh": 0,
    "jumlah_meninggal": 0,
    "jumlah_total": 9
  },
  {
    "nama_kecamatan": "PAGERWOJO",
    "jumlah_odp": 14,
    "jumlah_pdp": 0,
    "jumlah_positif": 0,
    "jumlah_sembuh": 0,
    "jumlah_meninggal": 0,
    "jumlah_total": 14
  },
  {
    "nama_kecamatan": "KARANGREJO",
    "jumlah_odp": 36,
    "jumlah_pdp": 2,
    "jumlah_positif": 0,
    "jumlah_sembuh": 0,
    "jumlah_meninggal": 0,
    "jumlah_total": 38
  },
  {
    "nama_kecamatan": "KAUMAN",
    "jumlah_odp": 28,
    "jumlah_pdp": 5,
    "jumlah_positif": 0,
    "jumlah_sembuh": 0,
    "jumlah_meninggal": 0,
    "jumlah_total": 33
  },
  {
    "nama_kecamatan": "NGANTRU",
    "jumlah_odp": 45,
    "jumlah_pdp": 4,
    "jumlah_positif": 1,
    "jumlah_sembuh": 0,
    "jumlah_meninggal": 0,
    "jumlah_total": 50
  },
  {
    "nama_kecamatan": "GONDANG",
    "jumlah_odp": 17,
    "jumlah_pdp": 2,
    "jumlah_positif": 0,
    "jumlah_sembuh": 0,
    "jumlah_meninggal": 0,
    "jumlah_total": 19
  },
  {
    "nama_kecamatan": "TULUNGAGUNG",
    "jumlah_odp": 36,
    "jumlah_pdp": 5,
    "jumlah_positif": 2,
    "jumlah_sembuh": 0,
    "jumlah_meninggal": 0,
    "jumlah_total": 43
  },
  {
    "nama_kecamatan": "BOYOLANGU",
    "jumlah_odp": 72,
    "jumlah_pdp": 7,
    "jumlah_positif": 0,
    "jumlah_sembuh": 0,
    "jumlah_meninggal": 0,
    "jumlah_total": 79
  },
  {
    "nama_kecamatan": "PAKEL",
    "jumlah_odp": 139,
    "jumlah_pdp": 4,
    "jumlah_positif": 0,
    "jumlah_sembuh": 0,
    "jumlah_meninggal": 0,
    "jumlah_total": 143
  },
  {
    "nama_kecamatan": "KEDUNGWARU",
    "jumlah_odp": 54,
    "jumlah_pdp": 7,
    "jumlah_positif": 1,
    "jumlah_sembuh": 0,
    "jumlah_meninggal": 0,
    "jumlah_total": 62
  },
  {
    "nama_kecamatan": "BANDUNG",
    "jumlah_odp": 62,
    "jumlah_pdp": 4,
    "jumlah_positif": 2,
    "jumlah_sembuh": 0,
    "jumlah_meninggal": 0,
    "jumlah_total": 68
  },
  {
    "nama_kecamatan": "BESUKI",
    "jumlah_odp": 24,
    "jumlah_pdp": 2,
    "jumlah_positif": 0,
    "jumlah_sembuh": 0,
    "jumlah_meninggal": 0,
    "jumlah_total": 26
  },
  {
    "nama_kecamatan": "CAMPURDARAT",
    "jumlah_odp": 50,
    "jumlah_pdp": 9,
    "jumlah_positif": 1,
    "jumlah_sembuh": 0,
    "jumlah_meninggal": 0,
    "jumlah_total": 60
  },
  {
    "nama_kecamatan": "TANGGUNGGUNUNG",
    "jumlah_odp": 22,
    "jumlah_pdp": 0,
    "jumlah_positif": 0,
    "jumlah_sembuh": 0,
    "jumlah_meninggal": 0,
    "jumlah_total": 22
  },
  {
    "nama_kecamatan": "KALIDAWIR",
    "jumlah_odp": 54,
    "jumlah_pdp": 0,
    "jumlah_positif": 0,
    "jumlah_sembuh": 0,
    "jumlah_meninggal": 0,
    "jumlah_total": 54
  },
  {
    "nama_kecamatan": "PUCANGLABAN",
    "jumlah_odp": 5,
    "jumlah_pdp": 1,
    "jumlah_positif": 0,
    "jumlah_sembuh": 0,
    "jumlah_meninggal": 0,
    "jumlah_total": 6
  },
  {
    "nama_kecamatan": "REJOTANGAN",
    "jumlah_odp": 45,
    "jumlah_pdp": 4,
    "jumlah_positif": 0,
    "jumlah_sembuh": 0,
    "jumlah_meninggal": 0,
    "jumlah_total": 49
  },
  {
    "nama_kecamatan": "SUMBERGEMPOL",
    "jumlah_odp": 40,
    "jumlah_pdp": 8,
    "jumlah_positif": 0,
    "jumlah_sembuh": 0,
    "jumlah_meninggal": 0,
    "jumlah_total": 48
  },
  {
    "nama_kecamatan": "NGUNUT",
    "jumlah_odp": 35,
    "jumlah_pdp": 5,
    "jumlah_positif": 0,
    "jumlah_sembuh": 0,
    "jumlah_meninggal": 0,
    "jumlah_total": 40
  }
]
```
**2. API Kasus Dengan Option Tertentu**
API Kasus Dengan Option tertentu berfungsi untuk mengambil salah satu data contohnya Jumlah Positif, Jumlah Meninggal, Jumlah Negatif, Jumlah ODP, Jumlah PDP.
<br>
Controller API Kasus Dengan Option Tertentu ada di directory /app/Http/Controller/Api/ApiController.php

```php
    public function getDataWithQuery($query)
    {
    	switch ($query) {
    		case 'positif':
    		case 'Positif':
    			$value = DataCovid::sum('jumlah_positif'); // mengambil jumlah positif
    			$data['Jumlah Positif'] = $value;
    			return response()->json($data)->withHeaders($this->headers);
    			break;

    		case 'sembuh':
    		case 'Sembuh':
    			$value = DataCovid::sum('jumlah_sembuh'); // mengambil jumlah sembuh
    			$data['Jumlah Sembuh'] = $value;
    			return response()->json($data)->withHeaders($this->headers);
    			break;

    		case 'meninggal':
    		case 'Meninggal':
    			$value = DataCovid::sum('jumlah_meninggal'); // mengambil jumlah meninggal
    			$data['Jumlah Meninggal'] = $value;
    			return response()->json($data)->withHeaders($this->headers);
    			break;

    		case 'odp':
    		case 'ODP':
    			$value = DataCovid::sum('jumlah_odp'); // mengambil jumlah odp
    			$data['Jumlah ODP'] = $value;
    			return response()->json($data)->withHeaders($this->headers);
    			break;

    		case 'pdp':
    		case 'PDP':
    			$value = DataCovid::sum('jumlah_pdp'); // mengambil jumlah pdp
    			$data['Jumlah PDP'] = $value;
    			return response()->json($data)->withHeaders($this->headers);
    			break;
    		
    		default:
    			return redirect()->route('api.data.get');
    			break;
    	}
    }
```

API Berada Pada List berikut:

API Untuk Mengambil Data Positif : ```/api/query/positif```
Output :

```json
{"Jumlah Positif":"7"}
```

API Untuk Mengambil Data Meninggal : ```/api/query/meninggal```
Output :

```json
{"Jumlah Meninggal":0}
```

API Untuk Mengambil Data PDP : ```/api/query/pdp```
Output :

```json
{"Jumlah PDP":"72"}
```

API Untuk Mengambil Data ODP : ```/api/query/odp```
Output :

```json
{"Jumlah ODP":"784"}
```

### Kontribusi 
Kamu ingin menjadi gabungan dari SATGAS SIAGA COVID19 TULUNGAGUNG? Kamu bisa membaca panduan untuk [berkontribusi kami](KONTRIBUSI.md).

## LICENSE
Repository ini berada di bawah lisensi [MIT LICENSE](LICENSE)