# 🌿 Developer API & Frontend - Komisi dan Pembayaran

Proyek ini dibuat sebagai bagian dari demonstrasi kemampuan pengembangan aplikasi backend dan frontend menggunakan berbagai framework modern serta dalam keterbatasan perangkat Android.

---

## 🎯 Deskripsi Proyek

Aplikasi ini menyediakan:

✅ REST API untuk:

- Menghitung komisi marketing berdasarkan omzet per bulan
- Menyimpan dan menampilkan pembayaran cicilan transaksi penjualan

✅ Frontend React untuk:

- Menampilkan data komisi secara dinamis

✅ CRUD sederhana dengan PHP Native dan MySQL

✅ Dokumentasi lengkap & Postman Collection

---

## 🌱 Tentang Proyek Ini

Proyek ini sepenuhnya dikembangkan **menggunakan perangkat Android**:

- Terminal emulator **Termux**
- Node.js & npm Termux
- PHP Development Server Termux
- GitHub mobile untuk version control
- Browser Android untuk pengujian React

Hal ini menunjukkan adaptasi dalam keterbatasan device dan tetap memenuhi standar pengembangan aplikasi modern.

---

## 🛠️ Teknologi yang Digunakan

- **PHP Native** (REST API)
- **Laravel Framework** (pengetahuan & kesiapan menggunakan Laravel jika project dikembangkan lebih lanjut)
- **Yii Framework** (pengetahuan arsitektur MVC, ActiveRecord, RBAC)
- **MySQL Database**
- **React.js** (frontend dynamic table)
- **Postman** (API testing)
- **Node.js** (React development server)

---

```
## 📁 Struktur Folder

/PHP
\|- index.php // Entry point API
\|- koneksi.php // MySQL connection
\|- KomisiController.php // Komisi calculation logic
\|- PembayaranController.php// Payment management logic
\|- pembayaran.php // CRUD HTML view
\|- CRUD.Pembayaran.php // UI | CRUD Table
/React_Basic
\|- src/App.js // React table
postman_collection.json // Collection to test API
README.md // Project documentation

```

````


## ⚙️ Cara Install & Menjalankan

### 📌 1️⃣ Siapkan Database

Jalankan script SQL berikut:

```sql
CREATE DATABASE IF NOT EXISTS db_penjualan;
USE db_penjualan;

CREATE TABLE IF NOT EXISTS marketing (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);
INSERT INTO marketing (id, name) VALUES
(1, 'Alfandy'), (2, 'Mery'), (3, 'Danang');

CREATE TABLE IF NOT EXISTS penjualan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    transaction_number VARCHAR(20),
    marketing_id INT,
    date DATE,
    cargo_fee BIGINT,
    total_balance BIGINT,
    grand_total BIGINT,
    FOREIGN KEY (marketing_id) REFERENCES marketing(id)
);

INSERT INTO penjualan (...); -- Data lengkap disediakan di file SQL

CREATE TABLE IF NOT EXISTS pembayaran (
    id INT AUTO_INCREMENT PRIMARY KEY,
    penjualan_id INT,
    payment_date DATE,
    amount_paid BIGINT,
    notes VARCHAR(255),
    FOREIGN KEY (penjualan_id) REFERENCES penjualan(id)
);
````

---

### 📌 2️⃣ Konfigurasi koneksi database

Edit file `PHP/koneksi.php`:

```php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "db_penjualan";
```

---

### 📌 3️⃣ Jalankan server PHP

Masuk ke folder `PHP`:

```bash
php -S localhost:8000
```

---

### 📌 4️⃣ Jalankan frontend React

Masuk ke folder `React_Basic`:

```bash
cd React_Basic
npm install;
npx start
```

Pengguna `Termux`

```bash
cd React_Basic
npm install
npx react-scripts start
```

---

### 📌 5️⃣ Akses API & Frontend

- API Komisi: `http://localhost:8000/index.php?action=get_komisi`
- API Pembayaran: `http://localhost:8000/index.php?action=get_pembayaran`
- React Frontend: `http://localhost:3000`

---

## 🧩 Contoh API Endpoint

### ✅ GET Komisi Marketing

```
GET /index.php?action=get_komisi
```

Response:

```json
[
  {
    "marketing": "Alfandy",
    "bulan": "Mei",
    "omzet": 138000000,
    "komisi_persen": 2.5,
    "komisi_nominal": 3450000
  }
]
```

---

### ✅ POST Pembayaran

```
POST /index.php?action=add_pembayaran
Content-Type: application/json

{
  "penjualan_id": 1,
  "payment_date": "2025-07-08",
  "amount_paid": 500000,
  "notes": "Cicilan pertama"
}
```

---

## 🚀 Postman Collection

Import file `postman_collection.json` untuk mencoba semua endpoint.

---

## 🌿 Kontribusi Framework

Meskipun implementasi awal menggunakan PHP Native, proyek ini **disiapkan untuk dapat diporting ke framework modern**, seperti:

- **Laravel** (RESTful controller, Eloquent ORM, Middleware)
- **Yii2** (MVC, Gii Generator, RBAC)
- **React.js** (Frontend SPA)

Proyek ini menunjukkan:

- Pemahaman struktur REST API
- Pemahaman konsep MVC
- Pemahaman frontend React
- Kemampuan bekerja dalam keterbatasan perangkat

---

## 🙏 Terima Kasih

Terima kasih sudah meluangkan waktu membaca dokumentasi ini.
Jika ada pertanyaan atau ingin kolaborasi, silakan hubungi saya.

---

## ✨ Catatan Penutup

Proyek ini dikembangkan sepenuhnya menggunakan:

- **Perangkat Android**
- **Termux Terminal**
- **React development server di Android**
- **MySQL Server**
