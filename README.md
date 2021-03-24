# Laravel Admin

Aplikasi Laravel admin

### Instalasi

```sh
$ git clone https://github.com/meeftah/laravel-admin.git
$ cd laravel-admin
$ composer update
```

Sesuaikan database di .env

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hadir_core2
DB_USERNAME=root
DB_PASSWORD=
```

`migrate --seed` untuk membuat tabel dan data
```sh
$ php artisan migrate --seed
```

Dan jalankan menggunakan perintah

`migrate --seed` untuk membuat tabel dan data
```sh
$ php artisan serve
```

Akses web aplikasi di http://localhost:8000 menggunakan email **superadmin@admin.com** dan password **123456**
