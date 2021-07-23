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
	const response = await fetch('http://api.test.bbo.co.id/event', {
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
	const response = await fetch(`http://api.test.bbo.co.id/event/${eventId}`, {
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
- Jika tiket event tersebut bisa dibeli, buat request ke `/event_booking/{id}` dengan parameter dan form-data yang diperlukan.

##### Invitation Ticket
- Buat request ke `/event` untuk mendapat ID event yang anda cari.
- Kemudian buat request ke `/event_detail/{id}` untuk melihat apakah `status` event bisa di booking atau tidak.
- Pilih tipe tiket dengan index `use_code` bernilai `1` (satu) yang ingin anda beli di index `price_type`.
- Untuk mengetahui tipe undangan anda valid atau tidak silahkan buat request ke `/voucher_ticket` dengan parameter yang diperlukan.
- Jika tiket event tersebut bisa dibeli, buat request ke `/event_booking/{id}` dengan parameter dan form-data yang diperlukan. Pastikan juga `payment_id` untuk tipe ini diisi '4'.

##### Seated Ticket
- Buat request ke `/event` untuk mendapat ID event yang anda cari.
- Kemudian buat request ke `/event_detail/{id}` untuk melihat apakah `status` event bisa di booking atau tidak.
- Pilih tipe tiket dengan index `use_seat` bernilai `1` (satu) yang ingin anda beli di index `price_type`.
- Untuk mengetahui posisi yang belum terisi, buat request ke `/event_seat` dengan parameter yang diperlukan.
- Jika tiket event tersebut bisa dibeli, buat request ke `/event_booking/{id}` dengan parameter dan form-data yang diperlukan.

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

Daftar status pada index object response `list.status`:
- `1`, bisa dibooking.
- `2`, disabled. 
- `3`, sudah di booking.


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
            ]
        ]
    }
}
```

----------

### `event_booking`
Melakukan booking tiket event

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
