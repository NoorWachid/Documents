# BBO: API Event

## Author Notes
- Tanda tanya setelah nama key (parameter atau form-data) berarti opsional
- Tanda `{index}` di request path menunjukkan bahwa itu merupakan parameter

## Structures
### Request Structure
Untuk dapat mengakses API anda harus memiliki API key yang anda dapatkan dari BBO.

##### Collecting Data Example
``` js
(async () => {
	const response = await fetch('http://test.api.bbo.co.id/event', {
		method: 'GET',
		headers: {
			'Api-Key': 'someRandomGeneratedString',
		}
	});
	const data = await response.json();
})();

```

##### Storing Data Example
``` js
(async () => {
	const response = await fetch(`http://test.api.bbo.co.id/event/${eventId}`, {
		method: 'POST',
		headers: {
			'Api-Key': 'someRandomGeneratedString',
		},
		body: URLSearchParams({
			buyer_name: 'John Doe',
			buyer_email: 'john@doe.com',
			buyer_phone: '+62895383900152',
			name: 'John Doe',
			email: 'john@doe.com,
			phone: '+62895383900152',
			address: 'Kaliwungu, Kudus, Jawa Tengah',
			location_id: '20',
			ondate: '0000-00-00',
			type_id: '1',
			qty: '1',
			payment_id: '22', 
		}),
	});
	const data = await response.json();
})();
```

### Response Structure

##### Success Object Example
``` json
{
	"ok": 1,
    	"status_code": 200,
    	"message": "success",
    	"result": []
}
```

##### Failed Object Example
``` json
{
    "ok": 0,
    "status_code": 400,
    "message": "failed",
    "result: [],
}
```

## Booking Flows
##### Regular/Special Ticket
- Buat request ke `/event` untuk mendapat ID event yang anda cari.
- Kemudian buat request ke `/event_detail/{id}` untuk melihat apakah `status` event bisa di booking atau tidak.
- Pilih tipe tiket yang ingin anda beli di index `price_type`.
- Jika event tersebut bisa dibeli, buat request ke `/event_booking/{id}` dengan parameter dan form-data yang diperlukan.

##### Invitation Ticket
- Buat request ke `/event` untuk mendapat ID event yang anda cari.
- Kemudian buat request ke `/event_detail/{id}` untuk melihat apakah `status` event bisa di booking atau tidak.
- Pilih tipe tiket dengan index `use_code` bernilai `1` (satu) yang ingin anda beli di index `price_type`.
- Untuk mengetahui tipe undangan anda valid atau tidak silahkan buat request ke `/voucher_ticket` dengan parameter yang diperlukan.
- Jika event tersebut bisa dibeli, buat request ke `/event_booking/{id}` dengan parameter dan form-data yang diperlukan.

##### Seated Ticket
- Buat request ke `/event` untuk mendapat ID event yang anda cari.
- Kemudian buat request ke `/event_detail/{id}` untuk melihat apakah `status` event bisa di booking atau tidak.
- Pilih tipe tiket dengan index `use_seat` bernilai `1` (satu) yang ingin anda beli di index `price_type`.
- Untuk mengetahui posisi yang belum terisi, buat request ke `/event_seat` dengan parameter yang diperlukan.
- Jika event tersebut bisa dibeli, buat request ke `/event_booking/{id}` dengan parameter dan form-data yang diperlukan.

## List Route

### `event`
Menampilkan list event

##### Path
`GET` `http://api.test.bbo.co.id/event`

##### Parameters
```
page?: Nomor halaman yang ingin dilihat
sort?: latest|popular
location_id?: Filter ID lokasi event
ondate?: Filter pada tanggal

```

##### Response Example
``` json
{
    "ok": "1",
    "status_code": "200",
    "message": "success",
    "result": {
        "list": [
            {
                "id": "37",
                "title": "Test Event Baru",
                "description": "",
                "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/content\/none.gif",
                "address": "Kudus",
                "location_id": "2401",
                "location_name": "Kaliwungu, Kudus, Jawa Tengah - Indonesia",
                "location_latlong": "",
                "price_min": "0",
                "price_max": "0",
                "start_date": "2021-07-22",
                "start_time": "00:00",
                "end_date": "2021-07-23",
                "end_time": "23:59",
                "timezone": "GMT+7",
                "hits": "2",
                "created": "2021-07-22 17:00:39",
                "status": "1",
                "url": "http:\/\/api.test.bbo.co.id\/event_detail\/37"
            },
            {
                "id": "28",
                "title": "PEKAN KEPERAWATAN MUSLIM (PKM) 2021",
                "description": "&amp;nbsp;[SEMINAR KEPERAWATAN TINGKAT NASIONAL] \u203c\ufe0f&lt;br \/&gt;\r\nPEKAN KEPERAWATAN MUSLIM (PKM) 2021&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nHalo mahasiswa keperawatan dan perawat seluruh Indonesia!&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nDi era Pandemi saat ini, perawat perlu mengetahui penatalaksanaan asuhan keperawatan pada pasien dengan penyakit kronis sebagai Komorbid Covid-19. Oleh karena itu, kami Mahasiswa Fakultas Keperawatan Universitas Airlangga mengundang kalian untuk mengikuti Seminar yang kami adakan sebagai berikut.&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nTEMA&amp;nbsp;&lt;br \/&gt;\r\n&amp;ldquo;Optimalisasi Asuhan Keperawatan Pada Pasien dengan Penyakit Kronis Melalui Pendekatan Spiritual di Era Pandemi Covid-19&amp;quot;&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nPEMATERI 1 :&lt;br \/&gt;\r\nDr. Abu Bakar, M.Kep., Ns.Sp.Kep.M.B.&lt;br \/&gt;\r\nMateri : Penatalaksanaan Asuhan Keperawatan Pada Pasien dengan Penyakit Kronis Sebagai Komorbid Covid-19 di Tatanan Klinik dan Komunitas.&amp;nbsp;&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nPEMATERI 2 :&lt;br \/&gt;\r\nDr. Hanik Endang Nihayati, S.Kep.Ns., M.Kep.&lt;br \/&gt;\r\nMateri : Dukungan Psiko-Sosial-Spiritual Pada Penderita Penyakit Kronis Sebagai Komorbid Covid-19 (Implementasi Keperawatan).&amp;nbsp;&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nSAVE THE DATE&lt;br \/&gt;\r\nHari,Tanggal : Sabtu, 24 Juli 2021&lt;br \/&gt;\r\nWaktu : 07.30-selesai&lt;br \/&gt;\r\nTempat\/Media : Via Zoom Meeting&amp;nbsp;&lt;br \/&gt;\r\n&lt;br \/&gt;\r\n&amp;gt;&amp;gt;BENEFITS&amp;lt;&amp;lt;&lt;br \/&gt;\r\nE- sertifikat 2 SKP PPNI&lt;br \/&gt;\r\nSoft copy materi&lt;br \/&gt;\r\nIlmu yang bermanfaat&amp;nbsp;&lt;br \/&gt;\r\nHadiah menarik berupa saldo OVO bagi 3 peserta yang beruntung&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nMORE INFORMATION&lt;br \/&gt;\r\ninstagram : @pkmihec_fkpunair, @skiners_fkpunair&lt;br \/&gt;\r\nwebsite : http:\/\/skinersua.blogspot.com\/&lt;br \/&gt;\r\nYoutube : SKINers FKp Unair&amp;nbsp;&lt;br \/&gt;\r\nEmail : eksisbarengskiners@gmail.com&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nCONTACT PERSON :&lt;br \/&gt;\r\nCP 1 : Putri (081999711671)&lt;br \/&gt;\r\nCP 2 : Wulan (082301351216)&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nOpen Media Partner&amp;nbsp;&lt;br \/&gt;\r\n@eventcampus @eventmahasiswasurabaya @humaninitiative&lt;br \/&gt;\r\n&lt;br \/&gt;\r\n#Eventcampus #Eventmahasiswasurabaya #seminarkeperawatannasional #seminarkesehatan #Seminar2021#COVID-19 #Mahasiswa #Perawat&amp;nbsp; #AsuhanKeperawatan #PenyakitKronis #KomorbidCovid-19 #pkmihec2021 #skinersfkpunair #Unair",
                "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/bigbang\/event\/28\/thumb_flayer-keperawtan.png",
                "address": "Zoom",
                "location_id": "0",
                "location_name": "",
                "location_latlong": "",
                "price_min": "0",
                "price_max": "0",
                "start_date": "2021-07-24",
                "start_time": "07:30",
                "end_date": "2021-07-24",
                "end_time": "17:00",
                "timezone": "GMT+7",
                "hits": "24",
                "created": "2021-06-24 16:49:24",
                "status": "1",
                "url": "http:\/\/api.test.bbo.co.id\/event_detail\/28"
            },
            {
                "id": "33",
                "title": "Webinar Nasional Jurnalistik ",
                "description": "HIMPUNAN MAHASISWA JURUSAN BIOLOGI &amp;quot;LEBAH MADU&amp;quot; PROUDLY PRESENT&lt;br \/&gt;\r\n&lt;br \/&gt;\r\n[WEBINAR NASIONAL]&lt;br \/&gt;\r\n&lt;br \/&gt;\r\n&amp;quot;Up Your Productivity on the Weekend&amp;quot;&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nHello everyone&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nGimana nih liburannya, pasti asik ya. Walaupun saat ini lagi libur panjang, tapi harus tetap produktif serta tidak menghentikan semangat kita untuk belajar jurnalistik dan berburu beasiswa&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nYuk ikut berpartisipasi di event kami dan raih beasiswa impian kalian&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nSave the date :&lt;br \/&gt;\r\nWebinar Jurnalistik (Minggu, 25 Juli 2021)&lt;br \/&gt;\r\n&lt;br \/&gt;\r\n&amp;nbsp;08.30 WIB - Selesai&lt;br \/&gt;\r\n&amp;nbsp;Daring melalui Zoom Meeting&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nPemateri :&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nAhmad Arif&lt;br \/&gt;\r\nNikmatus Sholikah&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nBenefit :&lt;br \/&gt;\r\nE-Sertifikat&amp;nbsp;&lt;br \/&gt;\r\nIlmu yang bermanfaat&lt;br \/&gt;\r\nTips &amp;amp; Trik&lt;br \/&gt;\r\nKesempatan raih beasiswa di luar negeri&amp;nbsp;&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nFree HTM&lt;br \/&gt;\r\nTerbuka untuk umum&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nContact person:&lt;br \/&gt;\r\nWA: 0895334900973 (Ardhena)&lt;br \/&gt;\r\nWA: 089514480749 (Wafi)&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nFind out more about us through&amp;nbsp;&lt;br \/&gt;\r\nInstagram: @beetalk.um&lt;br \/&gt;\r\n@hmjbiologilebahmadu_um &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;br \/&gt;\r\nTwitter: @hmjlebahmadu_um&lt;br \/&gt;\r\nEmail: beetalk.um@gmail.com&lt;br \/&gt;\r\nWebsite: hmj.biologi.um.ac.id",
                "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/bigbang\/event\/33\/thumb_lebah-kentod-copy-2.png",
                "address": "Zoom",
                "location_id": "0",
                "location_name": "",
                "location_latlong": "",
                "price_min": "0",
                "price_max": "0",
                "start_date": "2021-07-25",
                "start_time": "08:30",
                "end_date": "2021-07-25",
                "end_time": "17:00",
                "timezone": "GMT+7",
                "hits": "4",
                "created": "2021-07-12 13:44:05",
                "status": "1",
                "url": "http:\/\/api.test.bbo.co.id\/event_detail\/33"
            },
            {
                "id": "30",
                "title": "National Conference on Accounting (NCoA)",
                "description": "Himpunan Mahasiswa Jurusan Akuntansi Fakultas Ekonomi Univesitas Negeri Malang Proudly Present&lt;br \/&gt;\r\nWEBINAR NASIONAL AKUNTANSI 2021&lt;br \/&gt;\r\nNational Conference on Accounting (NCoA)&lt;br \/&gt;\r\nDengan tema : &amp;quot;Implementasi Strategi Akuntan dalam Mewujudkan Sustainable Development Goals (SDGs) 2030 &amp;quot;&amp;nbsp;&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nPemateri 1: Putri Paramita Agritansia, S.E., M.Acc. (Sustainability Report Specialist, Magister Akuntan, Dosen FEB Universitas Gadjah Mada)&lt;br \/&gt;\r\nPemateri 2: Luthfyana Larasati, BBusCom, MBus, MProfAcc, CPA (Aust.)&lt;br \/&gt;\r\n(Climate Finance Senior Analyst, Climate Policy Initiative. Young Professional Comitee, CPA Australia)&lt;br \/&gt;\r\nModerator: Rizky Firmansyah, S.E., M.S.A.&lt;br \/&gt;\r\n(Dosen FEB Universitas Negeri Malang)&lt;br \/&gt;\r\n&lt;br \/&gt;\r\n&amp;nbsp;Waktu Pelaksanaan&lt;br \/&gt;\r\n&amp;nbsp;Minggu, 25 Juli 2021&lt;br \/&gt;\r\n&amp;nbsp;Pukul : 08.00 WIB - selesai&lt;br \/&gt;\r\n&amp;nbsp;Media : Zoom Meeting (Link akan diberikan di grup Whatsapp peserta)&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nBiaya pendaftaran GRATIS&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nFasilitas: E-Sertifikat, Doorprize, dan Ilmu yang bermanfaat&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nUntuk pendaftaran klik link&amp;nbsp;&lt;br \/&gt;\r\nberikut ini&lt;br \/&gt;\r\n&lt;br \/&gt;\r\n***&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nTunggu apalagi? Buruan daftar karena slot terbatas!!!&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nMore information:&lt;br \/&gt;\r\nInstagram: @ncoa.um @hmjakt_feum&lt;br \/&gt;\r\nWebsite: himaaksi.fe.um.ac.id&lt;br \/&gt;\r\nContact Person :&lt;br \/&gt;\r\nFaiq &amp;nbsp; &amp;nbsp;: 0881-9650-568&lt;br \/&gt;\r\nAndre : 0856-9516-7354&lt;br \/&gt;\r\n&lt;br \/&gt;\r\n#Akuntansi #Webinar2021 #WebinarNasionalAkuntansi #Webinar #Nasional #Akuntansi #WebinarNasional #WebinarAkuntansi #WebinarWithInezCosmetics #NCoA2021 #NationalConferenceonAccounting&amp;nbsp;&lt;br \/&gt;\r\n#HimaAksiFEBUM #SatuJiwaSatuAksi&lt;br \/&gt;\r\n#ProaktifSolidBerintegritas&lt;br \/&gt;\r\n#FakultasEkonomi&lt;br \/&gt;\r\n#EkonomiJoss&lt;br \/&gt;\r\n#UniversitasNegeriMalang",
                "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/bigbang\/event\/30\/thumb_ncoa.png",
                "address": "Zoom",
                "location_id": "0",
                "location_name": "",
                "location_latlong": "",
                "price_min": "0",
                "price_max": "0",
                "start_date": "2021-07-25",
                "start_time": "08:00",
                "end_date": "2021-07-25",
                "end_time": "17:00",
                "timezone": "GMT+7",
                "hits": "9",
                "created": "2021-07-06 14:22:21",
                "status": "1",
                "url": "http:\/\/api.test.bbo.co.id\/event_detail\/30"
            },
            {
                "id": "36",
                "title": "Event baru untuk Iqbal 2",
                "description": "",
                "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/content\/none.gif",
                "address": "",
                "location_id": "0",
                "location_name": "",
                "location_latlong": "",
                "price_min": "0",
                "price_max": "0",
                "start_date": "2021-08-04",
                "start_time": "13:00",
                "end_date": "2021-08-04",
                "end_time": "17:00",
                "timezone": "GMT+7",
                "hits": "0",
                "created": "2021-07-21 17:33:04",
                "status": "1",
                "url": "http:\/\/api.test.bbo.co.id\/event_detail\/36"
            },
            {
                "id": "35",
                "title": "Event baru untuk Iqbal",
                "description": "",
                "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/content\/none.gif",
                "address": "",
                "location_id": "0",
                "location_name": "",
                "location_latlong": "",
                "price_min": "0",
                "price_max": "0",
                "start_date": "2021-08-04",
                "start_time": "13:00",
                "end_date": "2021-08-04",
                "end_time": "17:00",
                "timezone": "GMT+7",
                "hits": "0",
                "created": "2021-07-21 17:32:13",
                "status": "1",
                "url": "http:\/\/api.test.bbo.co.id\/event_detail\/35"
            },
            {
                "id": "34",
                "title": "Test Booking Seat\/Zone",
                "description": "&lt;em&gt;Ini adalah Event Testing untuk Zone Booking &amp;amp; Seat Booking&lt;\/em&gt;&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nTerdapat 5 zone",
                "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/bigbang\/event\/34\/thumb_test-event-banner.PNG",
                "address": "JIExpo Kemayoran, Jl. Benjamin Sueb",
                "location_id": "1246",
                "location_name": "Kemayoran, Jakarta Pusat, DKI Jakarta - Indonesia",
                "location_latlong": "",
                "price_min": "0",
                "price_max": "0",
                "start_date": "2021-09-18",
                "start_time": "09:30",
                "end_date": "2021-09-19",
                "end_time": "17:00",
                "timezone": "GMT+7",
                "hits": "9",
                "created": "2021-07-19 15:28:54",
                "status": "1",
                "url": "http:\/\/api.test.bbo.co.id\/event_detail\/34"
            },
            {
                "id": "1",
                "title": "Big Bang Jakarta 2017",
                "description": "&lt;span title=&quot;Edited&quot;&gt;Big Bang Jakarta! Big Sale Big Entertainment!&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nPameran cuci gudang terbesar pertama dengan segudang kemeriahan! Dapatkan beragam jenis produk dari Kecantikan, Pakaian, Elektronik, Peralatan Rumah, Dapur, Mainan, dan kebutuhan anak dengan harga yang paling terjangkau! Nikmati juga konser musik dan kuliner dari dalam negeri sampai luar negeri! Ada juga wahana permainan untuk anak-anak dan pameran Lego!&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nAcara ini diadakan selama 11 hari dari 22 DESEMBER 2017 - 1 JANUARI 2018 di JIExpo Kemayoran!&lt;\/span&gt;&lt;br \/&gt;\r\n&lt;br \/&gt;\r\n&lt;span&gt;#bigbangjakarta #bbj2017 #bigbangjkt #expoindo #YearEndFestival #bigbangjkt2017&lt;\/span&gt;",
                "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/bigbang\/event\/1\/21568748_341871539571574_205542179710435328_n.jpg",
                "address": "RW.10, East Pademangan Pademangan Central Jakarta City Jakarta 14410",
                "location_id": "1274",
                "location_name": "Pademangan, Jakarta Utara, DKI Jakarta - Indonesia",
                "location_latlong": "-6.146315082026959,106.84579610824585",
                "price_min": "25000",
                "price_max": "25000",
                "start_date": "2017-12-22",
                "start_time": "12:00",
                "end_date": "2018-01-01",
                "end_time": "22:00",
                "timezone": "GMT+7",
                "hits": "95",
                "created": "2019-08-08 10:22:25",
                "status": "2",
                "url": "http:\/\/api.test.bbo.co.id\/event_detail\/1"
            },
            {
                "id": "2",
                "title": "Big Bang Jakarta 2018",
                "description": "&lt;p&gt;Setelah sukses menggelar Big Bang Jakarta 2017, PT Expo Indonesia Jaya kembali menggelar acara tersebut akhir tahun ini. Pameran cuci gudang multiproduk terbesar tersebut berisi konten kegiatan yang beragam dan merangkul banyak kalangan.&lt;\/p&gt;\r\n\r\n&lt;p&gt;Mengangkat tema Pameran Cuci Gudang dan Festival Musik Terbesar Akhir Tahun, PT Expo Indonesia Jaya akan mengusung konsep yang lebih meriah untuk pagelaran 2018.&lt;br \/&gt;\r\nBig Bang Jakarta akan berlangsung pada 21 Desember 2018 hingga 1 Januari 2019 di Jiexpo Kemayoran, Jakarta Pusat. Direktur Komisaris PT Expo Indonesia Jaya Novry Hetharia mengatakan, pihaknya mengadakan diskon besar-besaran untuk banyak produk mulai dari otomotif, &lt;em&gt;furniture&lt;\/em&gt;, &lt;em&gt;home appliance&lt;\/em&gt;, F&amp;amp;B, pakaian, dan produk-produk ternama lainnya.&lt;\/p&gt;\r\n",
                "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/bigbang\/event\/2\/bigbang2.jpg",
                "address": "RW.10, East Pademangan Pademangan Central Jakarta City Jakarta 14410",
                "location_id": "1274",
                "location_name": "Pademangan, Jakarta Utara, DKI Jakarta - Indonesia",
                "location_latlong": "-6.146315082026959,106.84579610824585",
                "price_min": "20000",
                "price_max": "20000",
                "start_date": "2018-12-21",
                "start_time": "12:00",
                "end_date": "2019-01-01",
                "end_time": "22:00",
                "timezone": "GMT+7",
                "hits": "30",
                "created": "2019-08-08 10:26:26",
                "status": "2",
                "url": "http:\/\/api.test.bbo.co.id\/event_detail\/2"
            },
            {
                "id": "3",
                "title": "Big Bang Surabaya 2019",
                "description": "&lt;span&gt;Big Bang Surabaya!&lt;br \/&gt;\r\nPAMERAN CUCI GUDANG TERBESAR DAN FESTIVAL MUSIK TANAH AIR SEGERA HADIR DI SURABAYA!&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nDapatkan beragam jenis produk mulai dari Pakaian, Kecantikan, Elektronik, Peralatan Rumah, dan masih banyak lagi produk menarik lainnya dengan diskon hingga 90% Nikmati juga festival kuliner dan suguhan musik Ramadhan bersama musisi kenamaan tanah air.&lt;br \/&gt;\r\n&lt;br \/&gt;\r\nAcara ini akan diselenggarakan pada tanggal 30 MEI &amp;ndash; 9 JUNI 2019 Di Grand City Convex, Surabaya!&lt;\/span&gt;",
                "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/bigbang\/event\/3\/53490964_1219510618212281_7435477705980300929_n.jpg",
                "address": "Jl. Gubeng Pojok No.1, Ketabang, Kec. Genteng, Kota SBY, Jawa Timur 60272",
                "location_id": "3279",
                "location_name": "Genteng, Surabaya, Jawa Timur - Indonesia",
                "location_latlong": "-7.262574416880436,112.75106549263",
                "price_min": "20000",
                "price_max": "20000",
                "start_date": "2019-05-30",
                "start_time": "12:00",
                "end_date": "2019-06-09",
                "end_time": "22:00",
                "timezone": "GMT+7",
                "hits": "51",
                "created": "2019-08-08 10:22:25",
                "status": "2",
                "url": "http:\/\/api.test.bbo.co.id\/event_detail\/3"
            }
        ],
        "total": "34",
        "pages": "4"
    }
}
```

----------

### `event_detail`
Melihat detail event

##### Path
`GET` `http://api.test.bbo.co.id/event_detail/{id: ID dari event yang ingin dilihat}`

##### Response Example
``` json
{
    "ok": "1",
    "status_code": "200",
    "message": "success",
    "result": {
        "id": "37",
        "title": "Test Event Baru",
        "description": "",
        "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/content\/none.gif",
        "images": [],
        "image_map": "",
        "image_idcard": "http:\/\/api.test.bbo.co.id\/images\/modules\/content\/none.gif",
        "files": "",
        "youtube": "",
        "address": "Kudus",
        "location_id": "2401",
        "location_name": "Kaliwungu, Kudus, Jawa Tengah - Indonesia",
        "location_latlong": "",
        "price_min": "0",
        "price_max": "0",
        "price_info": "",
        "start_date": "2021-07-22",
        "start_time": "00:00",
        "end_date": "2021-07-23",
        "end_time": "23:59",
        "start_booking": "2021-07-22 16:59:03",
        "end_booking": "2021-07-23 16:00:03",
        "timezone": "GMT+7",
        "charge_payment": "1000",
        "status": "1",
        "charge_payment_type": "1",
        "price_type": [
            {
                "type_id": "86",
                "type": "Undangan",
                "currency": "IDR",
                "price_min": "0",
                "price_max": "0",
                "use_code": "1",
                "use_seat": "0",
                "use_quota": "",
                "price_date": "0",
                "info": "",
                "quota": "0",
                "quota_used": "0",
                "date_start": "0000-00-00",
                "date_end": "0000-00-00",
                "is_available": "1",
                "term": [],
                "list": [
                    {
                        "date_id": "0",
                        "ondate": "0000-00-00",
                        "price_id": "86",
                        "price": "0",
                        "quota": "0",
                        "quota_used": "0",
                        "currency": "IDR",
                        "schedule": [
                            {
                                "info": "",
                                "artist": []
                            }
                        ]
                    }
                ]
            }
        ],
        "price_type_info": "",
        "exhibitor": {
            "list": [],
            "more_url": ""
        },
        "url_share": "http:\/\/test.bbo.co.id\/jual\/test-event-baru-evnt37"
    }
}
```

----------

### `event_seat`
Melihat semua seat yang ada pada event jika `use_seat` sama dengan `1` (satu).

##### Path
`POST` `test.api.bbo.co.id/event_seat`

##### FormData
```
event_id: ID event
price_id: ID price (diambil dari `price_type`.`type_id` di `event_detail`)
ondate: Tanggal yang diambil dari `price_type`.`list`.`ondate` di `event_detail`)
```

##### Response Example
```
{
    "ok": "1",
    "status_code": "200",
    "message": "success",
    "result": {
        "image_map": "http:\/\/api.test.bbo.co.id\/images\/modules\/bigbang\/event\/34\/60f53ae6bfad2.png",
        "list": [
            [
                {
                    "row": "1",
                    "column": "1",
                    "name": "A1",
                    "status": "2"
                },
                {
                    "row": "1",
                    "column": "2",
                    "name": "A2",
                    "status": "2"
                },
                {
                    "row": "1",
                    "column": "3",
                    "name": "A3",
                    "status": "1"
                },
                {
                    "row": "1",
                    "column": "4",
                    "name": "A4",
                    "status": "1"
                },
                {
                    "row": "1",
                    "column": "5",
                    "name": "A5",
                    "status": "1"
                },
                {
                    "row": "1",
                    "column": "6",
                    "name": "A6",
                    "status": "1"
                },
                {
                    "row": "1",
                    "column": "7",
                    "name": "A7",
                    "status": "1"
                },
                {
                    "row": "1",
                    "column": "8",
                    "name": "A8",
                    "status": "1"
                },
                {
                    "row": "1",
                    "column": "9",
                    "name": "A9",
                    "status": "2"
                },
                {
                    "row": "1",
                    "column": "10",
                    "name": "A10",
                    "status": "2"
                }
            ],
            [
                {
                    "row": "2",
                    "column": "1",
                    "name": "B1",
                    "status": "2"
                },
                {
                    "row": "2",
                    "column": "2",
                    "name": "B2",
                    "status": "2"
                },
                {
                    "row": "2",
                    "column": "3",
                    "name": "B3",
                    "status": "1"
                },
                {
                    "row": "2",
                    "column": "4",
                    "name": "B4",
                    "status": "1"
                },
                {
                    "row": "2",
                    "column": "5",
                    "name": "B5",
                    "status": "1"
                },
                {
                    "row": "2",
                    "column": "6",
                    "name": "B6",
                    "status": "1"
                },
                {
                    "row": "2",
                    "column": "7",
                    "name": "B7",
                    "status": "1"
                },
                {
                    "row": "2",
                    "column": "8",
                    "name": "B8",
                    "status": "1"
                },
                {
                    "row": "2",
                    "column": "9",
                    "name": "B9",
                    "status": "2"
                },
                {
                    "row": "2",
                    "column": "10",
                    "name": "B10",
                    "status": "2"
                }
            ],
            [
                {
                    "row": "3",
                    "column": "1",
                    "name": "C1",
                    "status": "2"
                },
                {
                    "row": "3",
                    "column": "2",
                    "name": "C2",
                    "status": "2"
                },
                {
                    "row": "3",
                    "column": "3",
                    "name": "C3",
                    "status": "1"
                },
                {
                    "row": "3",
                    "column": "4",
                    "name": "C4",
                    "status": "1"
                },
                {
                    "row": "3",
                    "column": "5",
                    "name": "C5",
                    "status": "1"
                },
                {
                    "row": "3",
                    "column": "6",
                    "name": "C6",
                    "status": "1"
                },
                {
                    "row": "3",
                    "column": "7",
                    "name": "C7",
                    "status": "1"
                },
                {
                    "row": "3",
                    "column": "8",
                    "name": "C8",
                    "status": "1"
                },
                {
                    "row": "3",
                    "column": "9",
                    "name": "C9",
                    "status": "2"
                },
                {
                    "row": "3",
                    "column": "10",
                    "name": "C10",
                    "status": "2"
                }
            ],
            [
                {
                    "row": "4",
                    "column": "1",
                    "name": "D1",
                    "status": "2"
                },
                {
                    "row": "4",
                    "column": "2",
                    "name": "D2",
                    "status": "2"
                },
                {
                    "row": "4",
                    "column": "3",
                    "name": "D3",
                    "status": "1"
                },
                {
                    "row": "4",
                    "column": "4",
                    "name": "D4",
                    "status": "1"
                },
                {
                    "row": "4",
                    "column": "5",
                    "name": "D5",
                    "status": "1"
                },
                {
                    "row": "4",
                    "column": "6",
                    "name": "D6",
                    "status": "1"
                },
                {
                    "row": "4",
                    "column": "7",
                    "name": "D7",
                    "status": "1"
                },
                {
                    "row": "4",
                    "column": "8",
                    "name": "D8",
                    "status": "1"
                },
                {
                    "row": "4",
                    "column": "9",
                    "name": "D9",
                    "status": "2"
                },
                {
                    "row": "4",
                    "column": "10",
                    "name": "D10",
                    "status": "2"
                }
            ],
            [
                {
                    "row": "5",
                    "column": "1",
                    "name": "E1",
                    "status": "2"
                },
                {
                    "row": "5",
                    "column": "2",
                    "name": "E2",
                    "status": "1"
                },
                {
                    "row": "5",
                    "column": "3",
                    "name": "E3",
                    "status": "1"
                },
                {
                    "row": "5",
                    "column": "4",
                    "name": "E4",
                    "status": "1"
                },
                {
                    "row": "5",
                    "column": "5",
                    "name": "E5",
                    "status": "1"
                },
                {
                    "row": "5",
                    "column": "6",
                    "name": "E6",
                    "status": "1"
                },
                {
                    "row": "5",
                    "column": "7",
                    "name": "E7",
                    "status": "1"
                },
                {
                    "row": "5",
                    "column": "8",
                    "name": "E8",
                    "status": "1"
                },
                {
                    "row": "5",
                    "column": "9",
                    "name": "E9",
                    "status": "1"
                },
                {
                    "row": "5",
                    "column": "10",
                    "name": "E10",
                    "status": "2"
                }
            ],
            [
                {
                    "row": "6",
                    "column": "1",
                    "name": "F1",
                    "status": "2"
                },
                {
                    "row": "6",
                    "column": "2",
                    "name": "F2",
                    "status": "1"
                },
                {
                    "row": "6",
                    "column": "3",
                    "name": "F3",
                    "status": "1"
                },
                {
                    "row": "6",
                    "column": "4",
                    "name": "F4",
                    "status": "1"
                },
                {
                    "row": "6",
                    "column": "5",
                    "name": "F5",
                    "status": "1"
                },
                {
                    "row": "6",
                    "column": "6",
                    "name": "F6",
                    "status": "1"
                },
                {
                    "row": "6",
                    "column": "7",
                    "name": "F7",
                    "status": "1"
                },
                {
                    "row": "6",
                    "column": "8",
                    "name": "F8",
                    "status": "1"
                },
                {
                    "row": "6",
                    "column": "9",
                    "name": "F9",
                    "status": "1"
                },
                {
                    "row": "6",
                    "column": "10",
                    "name": "F10",
                    "status": "2"
                }
            ],
            [
                {
                    "row": "7",
                    "column": "1",
                    "name": "G1",
                    "status": "2"
                },
                {
                    "row": "7",
                    "column": "2",
                    "name": "G2",
                    "status": "1"
                },
                {
                    "row": "7",
                    "column": "3",
                    "name": "G3",
                    "status": "1"
                },
                {
                    "row": "7",
                    "column": "4",
                    "name": "G4",
                    "status": "1"
                },
                {
                    "row": "7",
                    "column": "5",
                    "name": "G5",
                    "status": "1"
                },
                {
                    "row": "7",
                    "column": "6",
                    "name": "G6",
                    "status": "1"
                },
                {
                    "row": "7",
                    "column": "7",
                    "name": "G7",
                    "status": "1"
                },
                {
                    "row": "7",
                    "column": "8",
                    "name": "G8",
                    "status": "1"
                },
                {
                    "row": "7",
                    "column": "9",
                    "name": "G9",
                    "status": "1"
                },
                {
                    "row": "7",
                    "column": "10",
                    "name": "G10",
                    "status": "2"
                }
            ],
            [
                {
                    "row": "8",
                    "column": "1",
                    "name": "H1",
                    "status": "1"
                },
                {
                    "row": "8",
                    "column": "2",
                    "name": "H2",
                    "status": "1"
                },
                {
                    "row": "8",
                    "column": "3",
                    "name": "H3",
                    "status": "1"
                },
                {
                    "row": "8",
                    "column": "4",
                    "name": "H4",
                    "status": "1"
                },
                {
                    "row": "8",
                    "column": "5",
                    "name": "H5",
                    "status": "1"
                },
                {
                    "row": "8",
                    "column": "6",
                    "name": "H6",
                    "status": "1"
                },
                {
                    "row": "8",
                    "column": "7",
                    "name": "H7",
                    "status": "1"
                },
                {
                    "row": "8",
                    "column": "8",
                    "name": "H8",
                    "status": "1"
                },
                {
                    "row": "8",
                    "column": "9",
                    "name": "H9",
                    "status": "1"
                },
                {
                    "row": "8",
                    "column": "10",
                    "name": "H10",
                    "status": "1"
                }
            ],
            [
                {
                    "row": "9",
                    "column": "1",
                    "name": "I1",
                    "status": "1"
                },
                {
                    "row": "9",
                    "column": "2",
                    "name": "I2",
                    "status": "1"
                },
                {
                    "row": "9",
                    "column": "3",
                    "name": "I3",
                    "status": "1"
                },
                {
                    "row": "9",
                    "column": "4",
                    "name": "I4",
                    "status": "1"
                },
                {
                    "row": "9",
                    "column": "5",
                    "name": "I5",
                    "status": "1"
                },
                {
                    "row": "9",
                    "column": "6",
                    "name": "I6",
                    "status": "1"
                },
                {
                    "row": "9",
                    "column": "7",
                    "name": "I7",
                    "status": "1"
                },
                {
                    "row": "9",
                    "column": "8",
                    "name": "I8",
                    "status": "1"
                },
                {
                    "row": "9",
                    "column": "9",
                    "name": "I9",
                    "status": "1"
                },
                {
                    "row": "9",
                    "column": "10",
                    "name": "I10",
                    "status": "1"
                }
            ],
            [
                {
                    "row": "10",
                    "column": "1",
                    "name": "J1",
                    "status": "1"
                },
                {
                    "row": "10",
                    "column": "2",
                    "name": "J2",
                    "status": "1"
                },
                {
                    "row": "10",
                    "column": "3",
                    "name": "J3",
                    "status": "1"
                },
                {
                    "row": "10",
                    "column": "4",
                    "name": "J4",
                    "status": "1"
                },
                {
                    "row": "10",
                    "column": "5",
                    "name": "J5",
                    "status": "1"
                },
                {
                    "row": "10",
                    "column": "6",
                    "name": "J6",
                    "status": "1"
                },
                {
                    "row": "10",
                    "column": "7",
                    "name": "J7",
                    "status": "1"
                },
                {
                    "row": "10",
                    "column": "8",
                    "name": "J8",
                    "status": "1"
                },
                {
                    "row": "10",
                    "column": "9",
                    "name": "J9",
                    "status": "1"
                },
                {
                    "row": "10",
                    "column": "10",
                    "name": "J10",
                    "status": "1"
                }
            ]
        ]
    }
}
```

----------

### `event_booking`
Melakukan booking tiket event GET:{"id":"ID dari event"}

##### FormData
```
buyer_name: nama pemesan tiket
buyer_email: email pemesan
buyer_phone: phone pemesan
name: nama visitor1|nama visitor2
email: email visitor1|email visitor2
phone: no telepon visitor1|no telepon visitor2
address: alamat visitor1|alamat visitor2
location_id: ID location visitor1|ID location visitor2
ondate: date visit event visitor1|date visit event visitor2
type_id: ID tipe tiket visitor1|ID tipe tiket visitor2
qty: total tiket
payment_id: table bigbang_payment
voucher_id?: id tabel voucher
row_id?: ID row1|ID row2
column_id?: ID column|ID row 2
```

##### Response Example
``` json
{
    "ok": 1,
    "status_code": 200,
    "message": "Booking event berhasil.",
    "result": {
        "url": "http://api.bbo.z/event_order_detail/16386"
    }
}
```

----------

### `event_order`
List order tiket event yang telah dibeli member

##### Path
`GET` `http://api.test.bbo.co.id/event_order`
##### Parameters
```
page?: 0
status?: 0=registered, 1=approved, 2=canceled, 3=sudah dipakai, 4=tiket expired, 5= refund
```

##### Response Example
``` json
{
    "ok": "1",
    "status_code": "200",
    "message": "success",
    "result": {
        "list": [
            {
                "id": "16456",
                "booking_code": "NCA21071416456",
                "event_id": "30",
                "event_name": "National Conference on Accounting (NCoA)",
                "type_id": "76",
                "type_name": "General",
                "ondate": "0000-00-00",
                "qty": "1",
                "v_code": "0",
                "total": "0",
                "currency": "IDR",
                "status": "1",
                "exp_payment": "2021-07-15 11:37:48",
                "created": "2021-07-14 11:37:48",
                "type_background": "#FFF",
                "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/bigbang\/event\/30\/thumb_ncoa.png",
                "start_date": "2021-07-25",
                "start_time": "08:00",
                "end_date": "2021-07-25",
                "end_time": "17:00",
                "timezone": "GMT+7",
                "url": "http:\/\/api.test.bbo.co.id\/event_order_detail\/16456"
            },
            {
                "id": "16452",
                "booking_code": "Tiket Kadaluarsa",
                "event_id": "31",
                "event_name": "Webinar Kewirausahaan Lebah Madu 2021",
                "type_id": "75",
                "type_name": "General",
                "ondate": "0000-00-00",
                "qty": "1",
                "v_code": "0",
                "total": "0",
                "currency": "IDR",
                "status": "4",
                "exp_payment": "2021-07-09 10:03:12",
                "created": "2021-07-08 10:03:12",
                "type_background": "#FFF",
                "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/bigbang\/event\/31\/thumb_lebah-copy.png",
                "start_date": "2021-07-11",
                "start_time": "08:30",
                "end_date": "2021-07-11",
                "end_time": "17:00",
                "timezone": "GMT+7",
                "url": "http:\/\/api.test.bbo.co.id\/event_order_detail\/16452"
            },
            {
                "id": "16394",
                "booking_code": "Tiket Kadaluarsa",
                "event_id": "21",
                "event_name": "Ayo Event Sekarang!",
                "type_id": "51",
                "type_name": "Regular C &amp; D",
                "ondate": "0000-00-00",
                "qty": "1",
                "v_code": "0",
                "total": "80000",
                "currency": "IDR",
                "status": "4",
                "exp_payment": "2021-05-08 09:50:29",
                "created": "2021-05-07 09:50:28",
                "type_background": "#FFF",
                "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/bigbang\/event\/21\/thumb_untitled222.png",
                "start_date": "2021-07-10",
                "start_time": "09:30",
                "end_date": "2021-07-10",
                "end_time": "17:00",
                "timezone": "GMT+7",
                "url": "http:\/\/api.test.bbo.co.id\/event_order_detail\/16394"
            },
            {
                "id": "16392",
                "booking_code": "Tiket Kadaluarsa",
                "event_id": "21",
                "event_name": "Ayo Event Sekarang!",
                "type_id": "51",
                "type_name": "Regular C &amp; D",
                "ondate": "0000-00-00",
                "qty": "1",
                "v_code": "0",
                "total": "80000",
                "currency": "IDR",
                "status": "4",
                "exp_payment": "2021-05-08 09:48:21",
                "created": "2021-05-07 09:48:19",
                "type_background": "#FFF",
                "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/bigbang\/event\/21\/thumb_untitled222.png",
                "start_date": "2021-07-10",
                "start_time": "09:30",
                "end_date": "2021-07-10",
                "end_time": "17:00",
                "timezone": "GMT+7",
                "url": "http:\/\/api.test.bbo.co.id\/event_order_detail\/16392"
            },
            {
                "id": "16390",
                "booking_code": "Tiket Kadaluarsa",
                "event_id": "21",
                "event_name": "Ayo Event Sekarang!",
                "type_id": "50",
                "type_name": "VIP",
                "ondate": "0000-00-00",
                "qty": "1",
                "v_code": "0",
                "total": "150000",
                "currency": "IDR",
                "status": "4",
                "exp_payment": "2021-05-08 09:43:57",
                "created": "2021-05-07 09:43:55",
                "type_background": "#FFF",
                "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/bigbang\/event\/21\/thumb_untitled222.png",
                "start_date": "2021-07-10",
                "start_time": "09:30",
                "end_date": "2021-07-10",
                "end_time": "17:00",
                "timezone": "GMT+7",
                "url": "http:\/\/api.test.bbo.co.id\/event_order_detail\/16390"
            },
            {
                "id": "16383",
                "booking_code": "Tiket Kadaluarsa",
                "event_id": "22",
                "event_name": "Test 2 Ticket Undangan",
                "type_id": "62",
                "type_name": "Test Seat",
                "ondate": "0000-00-00",
                "qty": "1",
                "v_code": "0",
                "total": "1000",
                "currency": "IDR",
                "status": "4",
                "exp_payment": "2021-05-07 16:53:16",
                "created": "2021-05-06 16:53:16",
                "type_background": "#FFF",
                "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/bigbang\/event\/22\/thumb_drseuss_sometimesthequestions.png",
                "start_date": "2021-05-06",
                "start_time": "00:00",
                "end_date": "2021-05-07",
                "end_time": "23:00",
                "timezone": "GMT+7",
                "url": "http:\/\/api.test.bbo.co.id\/event_order_detail\/16383"
            },
            {
                "id": "16380",
                "booking_code": "Tiket Kadaluarsa",
                "event_id": "22",
                "event_name": "Test 2 Ticket Undangan",
                "type_id": "62",
                "type_name": "Test Seat",
                "ondate": "0000-00-00",
                "qty": "1",
                "v_code": "0",
                "total": "1000",
                "currency": "IDR",
                "status": "4",
                "exp_payment": "2021-05-07 15:46:31",
                "created": "2021-05-06 15:46:31",
                "type_background": "#FFF",
                "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/bigbang\/event\/22\/thumb_drseuss_sometimesthequestions.png",
                "start_date": "2021-05-06",
                "start_time": "00:00",
                "end_date": "2021-05-07",
                "end_time": "23:00",
                "timezone": "GMT+7",
                "url": "http:\/\/api.test.bbo.co.id\/event_order_detail\/16380"
            },
            {
                "id": "16365",
                "booking_code": "Tiket Kadaluarsa",
                "event_id": "24",
                "event_name": "Ayo Test Event Dashboard",
                "type_id": "60",
                "type_name": "Tiket A",
                "ondate": "2021-04-28",
                "qty": "1",
                "v_code": "0",
                "total": "25000",
                "currency": "IDR",
                "status": "4",
                "exp_payment": "2021-04-29 10:13:22",
                "created": "2021-04-28 10:13:22",
                "type_background": "#FFF",
                "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/bigbang\/event\/24\/thumb_logo-bizgital-_-pt-bizgital-indonesia-jaya.png",
                "start_date": "2021-04-24",
                "start_time": "12:30",
                "end_date": "2021-05-30",
                "end_time": "17:30",
                "timezone": "GMT+7",
                "url": "http:\/\/api.test.bbo.co.id\/event_order_detail\/16365"
            },
            {
                "id": "16325",
                "booking_code": "Tiket Kadaluarsa",
                "event_id": "23",
                "event_name": "WEBINAR FESKOM 2021",
                "type_id": "55",
                "type_name": "Tiket Webinar",
                "ondate": "0000-00-00",
                "qty": "1",
                "v_code": "0",
                "total": "25000",
                "currency": "IDR",
                "status": "4",
                "exp_payment": "2021-04-07 09:53:54",
                "created": "2021-04-06 09:53:54",
                "type_background": "#FFF",
                "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/bigbang\/event\/23\/thumb_feskom.jpeg",
                "start_date": "2021-04-10",
                "start_time": "13:00",
                "end_date": "2021-04-10",
                "end_time": "16:00",
                "timezone": "GMT+7",
                "url": "http:\/\/api.test.bbo.co.id\/event_order_detail\/16325"
            },
            {
                "id": "16324",
                "booking_code": "Tiket Kadaluarsa",
                "event_id": "21",
                "event_name": "Ayo Event Sekarang!",
                "type_id": "48",
                "type_name": "VVIP",
                "ondate": "0000-00-00",
                "qty": "1",
                "v_code": "0",
                "total": "350000",
                "currency": "IDR",
                "status": "4",
                "exp_payment": "2021-04-07 09:52:40",
                "created": "2021-04-06 09:52:40",
                "type_background": "#FFF",
                "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/bigbang\/event\/21\/thumb_untitled222.png",
                "start_date": "2021-07-10",
                "start_time": "09:30",
                "end_date": "2021-07-10",
                "end_time": "17:00",
                "timezone": "GMT+7",
                "url": "http:\/\/api.test.bbo.co.id\/event_order_detail\/16324"
            }
        ],
        "total": "44",
        "pages": "5"
    }
}
```

----------

### `event_order_detail`
Detail order tiket event yang telah dibeli member

##### Path
`GET` `http://api.test.bbo.co.id/event_order_detail/{id: ID Order Tiket}`

##### Response Example
``` json
{
    "ok": "1",
    "status_code": "200",
    "message": "success",
    "result": {
        "id": "16456",
        "booking_code": "NCA21071416456",
        "type_id": "76",
        "event_id": "30",
        "v_code": "0",
        "total": "0",
        "currency": "IDR",
        "status": "1",
        "exp_payment": "2021-07-15 11:37:48",
        "params": "",
        "created": "2021-07-14 11:37:48",
        "qty": "1",
        "par_id": "0",
        "is_reschedule": "0",
        "use_seat": "0",
        "booking_id": "16456",
        "qty_shared": "0",
        "start_date": "2021-07-25",
        "total_ticket": "1",
        "start_time": "08:00",
        "end_date": "2021-07-25",
        "end_time": "17:00",
        "timezone": "GMT+7",
        "image": "http:\/\/api.test.bbo.co.id\/images\/modules\/bigbang\/event\/30\/ncoa.png",
        "visitors": [
            {
                "event_name": "National Conference on Accounting (NCoA)",
                "price_id": "76",
                "type_name": "General",
                "ondate": "0000-00-00",
                "name": "Administrator",
                "email": "info.expoindo@gmail.com",
                "phone": "62858483487601",
                "location_name": "Yogyakarta, DI Yogyakarta - Indonesia",
                "address": "Getassrabi Kidul, Serabi Kidul, Getassrabi, Kudus Regency, Central Java, Indonesia",
                "status": "0",
                "created": "2021-07-14 11:37:48",
                "shared_user_id": "0",
                "seat_row": "0",
                "seat_column": "0",
                "seat_name": "00"
            }
        ],
        "payment": "",
        "cancellation": "",
        "instructions": [
            "1. Pesan tiketmu di aplikasi BBO.",
            "3. Instal aplikasi Zoom dan masukan kode Webinar ID dan Passcode pada saat webinar dimulai.",
            "3. Log in by zoom 25 Juli 2021 Pukul 08.00 WIB",
            "",
            "* Tiket berlaku sepanjang kegiatan National Conference on Accounting (NCoA)"
        ],
        "url_coupon": "http:\/\/api.test.bbo.co.id\/merchant_coupon_member?event_id=30",
        "info": ""
    }
}
```

----------

### `event_order_cancellation`
Cancel order tiket event yang telah dibeli member

##### Path
`GET` `http://api.test.bbo.co.id/event_order_cancellation/{id: ID Order Tiket}`

##### Response Example
``` json
{
    "ok": 0,
    "status_code": 400,
    "message": "Pembatalan telah berhasil",
    "result": []
}
```

---------
### `voucher_check`
Untuk mengecek apakah voucher valid atau tidak jika pada `event_detail` `use_code` bernilai `1` (satu)

##### Path
`GET` `http://api.test.bbo.co.id/voucher_check`
