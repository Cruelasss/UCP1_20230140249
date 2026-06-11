<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<img src="https://img.shields.io/badge/Laravel-12.x-red?style=flat-square&logo=laravel" alt="Laravel">
<img src="https://img.shields.io/badge/PHP-8.2-blue?style=flat-square&logo=php" alt="PHP">
<img src="https://img.shields.io/badge/Sanctum-API%20Auth-green?style=flat-square" alt="Sanctum">
<img src="https://img.shields.io/badge/Scramble-API%20Docs-orange?style=flat-square" alt="Scramble">
</p>

---

# PWF — Pemrograman Web Framework

Proyek Laravel untuk mata kuliah **Pemrograman Web Framework** — Program Studi Informatika.

---

## 📚 Daftar Pertemuan

| Pertemuan | Topik |
|-----------|-------|
| Pertemuan 1 | Instalasi & Setup Laravel |
| Pertemuan 2 | Routing & Controller |
| Pertemuan 3 | Blade Template & View |
| Pertemuan 5 | Database & Eloquent ORM |
| Pertemuan 6 | Authentication (Laravel Breeze) |
| Pertemuan 9 | **API CRUD dengan Laravel Sanctum** ✅ |

---

## 🔌 Pertemuan 9 — API CRUD (Laravel Sanctum)

### Tujuan Pembelajaran
Memahami cara membangun RESTful API dengan Laravel menggunakan **Laravel Sanctum** sebagai autentikasi berbasis token dan **Scramble** sebagai dokumentasi API otomatis.

### Teknologi yang Digunakan
- **Laravel Sanctum** — Autentikasi API berbasis Bearer Token
- **Scramble** — Auto-generate dokumentasi API
- **Postman** — Testing endpoint API

### Base URL
```
http://127.0.0.1:8000
```

---

## 📋 Daftar Endpoint API

### 🔑 Autentikasi

| Method | Endpoint | Auth | Deskripsi |
|--------|----------|------|-----------|
| `POST` | `/api/login` | ❌ Publik | Login & dapatkan Bearer Token |

### 🗂️ Category

| Method | Endpoint | Auth | Deskripsi |
|--------|----------|------|-----------|
| `GET` | `/api/category` | ❌ Publik | Lihat semua kategori |
| `GET` | `/api/category/{id}` | ❌ Publik | Lihat 1 kategori |
| `POST` | `/api/category` | ✅ Token | Tambah kategori baru |
| `PUT` | `/api/category/{id}` | ✅ Token | Update kategori |
| `DELETE` | `/api/category/{id}` | ✅ Token | Hapus kategori |

### 📦 Product

| Method | Endpoint | Auth | Deskripsi |
|--------|----------|------|-----------|
| `GET` | `/api/product` | ❌ Publik | Lihat semua produk |
| `GET` | `/api/product/{id}` | ❌ Publik | Lihat 1 produk |
| `POST` | `/api/product` | ✅ Token | Tambah produk baru |
| `PUT` | `/api/product/{id}` | ✅ Token | Update produk (hanya pemilik) |
| `DELETE` | `/api/product/{id}` | ✅ Token | Hapus produk (hanya pemilik) |

---

## 🧪 Hasil Pengujian API (Postman)

### 1. Login — Mendapatkan Bearer Token
> `POST /api/login` | Status: **200 OK**

Kirim email dan password yang terdaftar untuk mendapatkan `access_token`.

![Login](Screenshoot/Pertemuan-9/Login.png)

---

### 2. GET Category — Lihat Semua Kategori
> `GET /api/category` | Status: **200 OK** | Auth: ❌ Tidak perlu token

![Get Category](Screenshoot/Pertemuan-9/Get-Category.png)

---

### 3. POST Category — Tambah Kategori Baru
> `POST /api/category` | Status: **201 Created** | Auth: ✅ Bearer Token

Request Body:
```json
{
    "name": "Perlengkapan Rumah"
}
```

![Post Category](Screenshoot/Pertemuan-9/Post-Category.png)

---

### 4. PUT Category — Update Kategori
> `PUT /api/category/{id}` | Status: **200 OK** | Auth: ✅ Bearer Token

Request Body:
```json
{
    "name": "Perlengkapan Dapur"
}
```

![Put Category](Screenshoot/Pertemuan-9/Put-Category.png)

---

### 5. DELETE Category — Hapus Kategori
> `DELETE /api/category/{id}` | Status: **200 OK** | Auth: ✅ Bearer Token

![Delete Category](Screenshoot/Pertemuan-9/Delete-Category.png)

---

### 6. GET Product — Lihat Semua Produk
> `GET /api/product` | Status: **200 OK** | Auth: ❌ Tidak perlu token

Response menyertakan relasi `category` dari setiap produk.

![Get Product](Screenshoot/Pertemuan-9/Get-Product.png)

---

### 7. POST Product — Tambah Produk Baru
> `POST /api/product` | Status: **201 Created** | Auth: ✅ Bearer Token

Request Body:
```json
{
    "name": "Buku Tulis",
    "qty": 50,
    "price": 5000,
    "category_id": 1
}
```

`user_id` diisi otomatis dari token yang login.

![Post Product](Screenshoot/Pertemuan-9/Post-Product.png)

---

### 8. PUT Product — Update Produk
> `PUT /api/product/{id}` | Status: **200 OK** | Auth: ✅ Bearer Token (harus pemilik)

Request Body:
```json
{
    "name": "Buku Tulis A5",
    "qty": 75,
    "price": 6000,
    "category_id": 1
}
```

![Put Product](Screenshoot/Pertemuan-9/Put-Product.png)

---

### 9. DELETE Product — Hapus Produk
> `DELETE /api/product/{id}` | Status: **200 OK** | Auth: ✅ Bearer Token (harus pemilik)

![Delete Product](Screenshoot/Pertemuan-9/Delete-Product.png)

---

## 📖 Dokumentasi API Otomatis (Scramble)

Akses dokumentasi interaktif di:
```
http://127.0.0.1:8000/docs/api
```

---

## ⚙️ Cara Menjalankan Proyek

```bash
# 1. Clone & masuk ke direktori
git clone <repo-url>
cd PWF-20230140249

# 2. Install dependency
composer install
npm install

# 3. Salin file environment
cp .env.example .env
php artisan key:generate

# 4. Konfigurasi database di .env, lalu jalankan migrasi
php artisan migrate

# 5. Jalankan server
php artisan serve
```

---

## 👨‍💻 Informasi Mahasiswa

| | |
|---|---|
| **NIM** | 20230140249 |
| **Mata Kuliah** | Pemrograman Web Framework |
| **Framework** | Laravel 12.x |
