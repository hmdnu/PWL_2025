# Laporan Praktikum Jobsheet 3


## Praktikum 1

1. Buat database PWL_POS
![db](./public/img/db-pwl-pos.png)
2. Konfigurasi .env
![env](./public/img/env.png)


## Praktikum 2.1
1. Membuat migration tanpa relasi
![migration-without-relation](./public/img/migration.png)
2. Modifikasi file migration
![modify-migration](./public/img/migration-file.png)
3. Migrasi table m_level
![migrate-m-level](./public/img/migrating-m-level.png)
4. Table m_level
![m-level](./public/img/m-level-table.png)
5. Membuat tabel m_kategori
![m-kategori](./public/img/creating-m-kategori.png)
6. Migrasi m_kategori
![m-kategori-migrating](./public/img/migratin-m-kategori.png)


## Praktikum 2.2
1. Buat table m_user
![m-user](./public/img/m_user.png)
2. Modifikasi file migration
```php
 public function up(): void
    {
        Schema::table('m_user', function (Blueprint $table) {
            $table->id('user_id');
            $table->unsignedBigInteger('level_id')->index();
            $table->string('username', 20)->unique();
            $table->string('nama', 100);
            $table->string('password');
            $table->timestamps();

            $table->foreign('level_id')->references('level_id')->on('m_level');
        });
    }
```
3. Migrasai m_user
![migrasi-m-user](./public/img/migrating-m-user.png)

4. Tabel
![tables](./public/img/tables.png)


## Praktikum 3

1. m_level content

![m-level-content](./public/img/m-level-content.png)

2. m_user content
![m-user-content](./public/img/m-user-content.png)

3. m_kategori
![m-kategori](./public/img/m-kategori.png)

4. m_barang
![m-barang](./public/img/m-barang.png)

5. t_stok 
![t-stok](./public/img/t-stok.png)

6. t_penjualan
![t-penjualan](./public/img/t-penjualan.png)

7. t_penjualan_detail
![t-penjualan-detail](./public/img/t-penjualan-detail.png)


----

## Praktikum 4
1. insert m_level
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    //
    public function index()
    {
        DB::insert('insert into m_level (level_kode, level_nama, created_at) values(?,?,?)', ['CUS', 'pelanggan', now()]);

        return 'insert data baru berhasil';
    }
}

```
Data inserted

![insert-m-level](./public/img/insert-m-level.png)


2. update m_level

```php
$row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);

return 'update data berhasil, ' . $row;
```
result

```
mysql> select * from m_level;
+----------+------------+---------------+---------------------+------------+
| level_id | level_kode | level_nama    | created_at          | updated_at |
+----------+------------+---------------+---------------------+------------+
|        1 | ADM        | Administrator | NULL                | NULL       |
|        2 | MNG        | Manager       | NULL                | NULL       |
|        3 | STF        | Staff/Kasir   | NULL                | NULL       |
|        4 | CUS        | Customer      | 2025-03-05 14:24:01 | NULL       |
+----------+------------+---------------+---------------------+------------+
4 rows in set (0.00 sec)
```

3. delete m_level
```php
$row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
return 'data berhasil di hapus ' . $row;
```

result
```
mysql> select * from m_level;
+----------+------------+---------------+------------+------------+
| level_id | level_kode | level_nama    | created_at | updated_at |
+----------+------------+---------------+------------+------------+
|        1 | ADM        | Administrator | NULL       | NULL       |
|        2 | MNG        | Manager       | NULL       | NULL       |
|        3 | STF        | Staff/Kasir   | NULL       | NULL       |
+----------+------------+---------------+------------+------------+
3 rows in set (0.00 sec)
```
4. select m_level
```php
$data = DB::select("select * from m_level");
return view('level', ['data' => $data]);
```

view
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Level Pengguna</title>
</head>
<body>
    <h1>Data level pengguna</h1>

    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>kode level</th>
            <th>nama level</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{$d->level_id}}</td>
            <td>{{$d->level_kode}}</td>
            <td>{{$d->level_nama}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
```

result 
![res-level](./public/img/view-level.png)

----
## Praktikum 5
1. insert

```php
class KategoriController extends Controller
{
    //
    public function index()
    {
        $data = [
            'kategori_kode' => 'SNK',
            'kategori_nama' => 'snack/makanan ringan',
            'created_at' => now(),
            'updated_at' => now()
        ];

        DB::table('m_kategori')->insert($data);
        return 'insert data baru berhasil';
    }
}
```
result
```
+-------------+---------------+----------------------+---------------------+---------------------+
| kategori_id | kategori_kode | kategori_nama        | created_at          | updated_at          |
+-------------+---------------+----------------------+---------------------+---------------------+
|           1 | ELEC          | Elektronik           | 2025-03-05 14:09:48 | 2025-03-05 14:09:48 |
|           2 | FASH          | Fashion              | 2025-03-05 14:09:48 | 2025-03-05 14:09:48 |
|           3 | FOOD          | Makanan              | 2025-03-05 14:09:48 | 2025-03-05 14:09:48 |
|           4 | BOOK          | Buku                 | 2025-03-05 14:09:48 | 2025-03-05 14:09:48 |
|           5 | TOY           | Mainan               | 2025-03-05 14:09:48 | 2025-03-05 14:09:48 |
|           6 | SNK           | snack/makanan ringan | 2025-03-05 14:49:57 | 2025-03-05 14:49:57 |
+-------------+---------------+----------------------+---------------------+---------------------+
```
2. update
```php
$row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'camilan']);
return 'update data berhasil ' . $row;
```

result
```
+-------------+---------------+---------------+---------------------+---------------------+
| kategori_id | kategori_kode | kategori_nama | created_at          | updated_at          |
+-------------+---------------+---------------+---------------------+---------------------+
|           1 | ELEC          | Elektronik    | 2025-03-05 14:09:48 | 2025-03-05 14:09:48 |
|           2 | FASH          | Fashion       | 2025-03-05 14:09:48 | 2025-03-05 14:09:48 |
|           3 | FOOD          | Makanan       | 2025-03-05 14:09:48 | 2025-03-05 14:09:48 |
|           4 | BOOK          | Buku          | 2025-03-05 14:09:48 | 2025-03-05 14:09:48 |
|           5 | TOY           | Mainan        | 2025-03-05 14:09:48 | 2025-03-05 14:09:48 |
|           6 | SNK           | camilan       | 2025-03-05 14:49:57 | 2025-03-05 14:49:57 |
+-------------+---------------+---------------+---------------------+---------------------+
```

3. delete
```php
$row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
return 'delete data berhasil ' . $row;
```
result
```
+-------------+---------------+---------------+---------------------+---------------------+
| kategori_id | kategori_kode | kategori_nama | created_at          | updated_at          |
+-------------+---------------+---------------+---------------------+---------------------+
|           1 | ELEC          | Elektronik    | 2025-03-05 14:09:48 | 2025-03-05 14:09:48 |
|           2 | FASH          | Fashion       | 2025-03-05 14:09:48 | 2025-03-05 14:09:48 |
|           3 | FOOD          | Makanan       | 2025-03-05 14:09:48 | 2025-03-05 14:09:48 |
|           4 | BOOK          | Buku          | 2025-03-05 14:09:48 | 2025-03-05 14:09:48 |
|           5 | TOY           | Mainan        | 2025-03-05 14:09:48 | 2025-03-05 14:09:48 |
+-------------+---------------+---------------+---------------------+---------------------+
```
4. select
```php
$data = DB::table('m_kategori')->get();
return view('kategori', ['data' => $data]);
```
result
```

```


view
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data kategori barang</title>
</head>
<body>
    <h1>Data kategori barang</h1>

    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>kode kategori</th>
            <th>nama kategori</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{$d->kategori_id}}</td>
            <td>{{$d->kategori_kode}}</td>
            <td>{{$d->kategori_nama}}</td>
        </tr>
        @endforeach
    </table>

</body>
</html>
```

result
![kategori-view](./public/img/kategori-barang-view.png)

----
## Praktikum 6 Eloquent ORM


Class UserModel
```php
class UserModel extends Model
{
    //
    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
}
```
Controller
```php
class UserController extends Controller
{
    //
    public function index()
    {
        $user = UserModel::all();
        return view("user", ["data" => $user]);
    }
}
```
View
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data user</title>
</head>
<body>
    <h1>Data user</h1>

    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>username</th>
            <th>nama</th>
            <th>id level pengguna</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{$d->user_id}}</td>
            <td>{{$d->username}}</td>
            <td>{{$d->nama}}</td>
            <td>{{$d->level_id}}</td>
        </tr>
        @endforeach
    </table>

</body>
</html>
```

Result
Mengambil & menampikan data m_user ke client
![data-user](./public/img/data-user.png)


Modifikasi insert data

```php

class UserController extends Controller
{
    //
    public function index()
    {
        // $user = UserModel::all();
        // return view("user", ["data" => $user]);

        $data = [
            'username' => 'customer-1',
            'nama' => 'pelanggan',
            'password' => Hash::make('1234'),
            'level_id' => 3
        ];

        UserModel::insert($data);

        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
}
```
Result
![user-data](./public/img/modified-data-user.png)

Modifikasi update data

```php
class UserController extends Controller
{
    //
    public function index()
    {

        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'pelanggan',
        //     'password' => Hash::make('1234'),
        //     'level_id' => 3
        // ];

        // UserModel::insert($data);


        $data = [
            'nama' => 'pelanggan pertama'
        ];
        UserModel::where('username', 'customer-1')->update($data);

        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
}
```
result
![update-data-user](./public/img/update-data-user.png)
