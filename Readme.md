# Project Developer API - Komisi & Pembayaran

Project ini dibuat sebagai jawaban dari soal developer pada file PDF.

## 🎯 Deskripsi Proyek

REST API untuk:
- Menampilkan komisi marketing berdasarkan omzet per bulan.
- Melakukan manajemen pembayaran cicilan transaksi (pembayaran kredit).

Frontend menggunakan HTML sederhana (nilai plus jika ingin menggunakan React).

---

## ✨ Fitur Utama

✅ API Komisi Marketing  
✅ API Pembayaran Kredit (create, read, delete)  
✅ CRUD data pembayaran via form HTML  
✅ Struktur database MySQL sesuai ketentuan soal

---

## 🛠️ Teknologi

- PHP (Native)
- MySQL
- HTML
- REST API

---

## 📁 Struktur Folder


/api
\|- index.php               // Entry point API
\|- koneksi.php             // Koneksi ke MySQL
\|- KomisiController.php    // Logic komisi marketing
\|- PembayaranController.php// Logic pembayaran cicilan
\|- pembayaran.php          // CRUD HTML pembayaran

````

---

## ⚙️ Cara Install & Menjalankan

### 1️⃣ Siapkan Database

1. Jalankan script SQL berikut di MySQL:

```sql
CREATE DATABASE IF NOT EXISTS db_penjualan;
USE db_penjualan;

CREATE TABLE IF NOT EXISTS marketing (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

INSERT INTO marketing (id, name) VALUES
(1, 'Alfandy'),
(2, 'Mery'),
(3, 'Danang');

CREATE TABLE IF NOT EXISTS penjualan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    transaction_number VARCHAR(20) NOT NULL,
    marketing_id INT NOT NULL,
    date DATE NOT NULL,
    cargo_fee BIGINT DEFAULT 0,
    total_balance BIGINT DEFAULT 0,
    grand_total BIGINT DEFAULT 0,
    FOREIGN KEY (marketing_id) REFERENCES marketing(id)
);

INSERT INTO penjualan (id, transaction_number, marketing_id, date, cargo_fee, total_balance, grand_total) VALUES
(1, 'TRX001', 1, '2023-05-22', 25000, 3000000, 3025000),
(2, 'TRX002', 3, '2023-05-22', 25000, 320000, 345000),
(3, 'TRX003', 1, '2023-05-22', 0, 65000000, 65000000),
(4, 'TRX004', 1, '2023-05-23', 10000, 70000000, 70010000),
(5, 'TRX005', 2, '2023-05-23', 10000, 80000000, 80010000),
(6, 'TRX006', 3, '2023-05-23', 12000, 44000000, 44012000),
(7, 'TRX007', 1, '2023-06-01', 0, 75000000, 75000000),
(8, 'TRX008', 2, '2023-06-02', 0, 85000000, 85000000),
(9, 'TRX009', 2, '2023-06-01', 0, 175000000, 175000000),
(10, 'TRX010', 3, '2023-06-01', 0, 75000000, 75000000),
(11, 'TRX011', 2, '2023-06-01', 0, 750020000, 750020000),
(12, 'TRX012', 3, '2023-06-01', 0, 130000000, 120000000);

CREATE TABLE IF NOT EXISTS pembayaran (
    id INT AUTO_INCREMENT PRIMARY KEY,
    penjualan_id INT NOT NULL,
    payment_date DATE NOT NULL,
    amount_paid BIGINT NOT NULL,
    notes VARCHAR(255),
    FOREIGN KEY (penjualan_id) REFERENCES penjualan(id)
);
````

2. Sesuaikan koneksi database di `koneksi.php`:

```php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "db_penjualan";
```

---

### 2️⃣ Jalankan Server PHP

Di terminal:

```
php -S localhost:8000
```

---

### 3️⃣ Akses API

**API Komisi**

```
GET http://localhost:8000/api/index.php?action=get_komisi
```

**API Get Pembayaran**

```
GET http://localhost:8000/api/index.php?action=get_pembayaran
```

**API Tambah Pembayaran**

```
POST http://localhost:8000/api/index.php?action=add_pembayaran
Content-Type: application/json

{
  "penjualan_id": 1,
  "payment_date": "2025-06-28",
  "amount_paid": 500000,
  "notes": "Cicilan pertama"
}
```

---

### 4️⃣ Akses CRUD HTML (opsional)

Untuk manajemen pembayaran via form:

```
http://localhost:8000/api/pembayaran.php
```

---

## 🚀 Postman Collection

File Postman collection disertakan dalam folder `/postman_collection.json`.

Import ke Postman untuk mencoba endpoint.

---

## 🌸 Penilaian Nilai Plus

Jika menggunakan React untuk frontend, buat halaman frontend terpisah yang memanggil API menggunakan fetch/axios.

---

## 🙏 Terima Kasih

Semoga bermanfaat dan sesuai ekspektasi. Jika ada pertanyaan atau saran, silakan hubungi saya.

```