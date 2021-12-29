# API Tiket Pihak Ke-Tiga

#### Notification

##### Request Line
- Method: POST
- URL: api.test.bbo.co.id/event_thirdparty_notification

##### Headers
| Key | Value |
|-----|-------|
| Access-Key | kunci akses yang didapat dari admin > Event > Event Price |
| Content-Type | x-www-form-urlencoded |

##### Payload
| Key | Value |
|-----|-------| 
| booking_code | kode yang ditukarkan ditempat event |
| qty | kuantitas tiket |
| ondate | tanggal tiket dengan format 'YYYY-MM-DD' |
| buyer_name | nama pembeli |
| buyer_email | email pembeli |
| buyer_phone | nomor hp pembeli |
| buyer_address | alamat pembeli |
