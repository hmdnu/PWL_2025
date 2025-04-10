# Laporan Praktikum Jobsheet 4


## Praktikum 1

1. m_user db content
![m-user-content](./img/m-user-db.png)

2. UserModel.php

```php
class UserModel extends Model
{
    //
    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';

    protected $fillable = ['level_id', 'username', 'nama', 'password'];
}
```

3. UserController.php
```php

class UserController extends Controller
{
    //
    public function index()
    {

        $data = [
            'level_id' => 2,
            'username' => 'manager-2',
            'nama' => 'manager 2',
            'password' => Hash::make('1234'),
        ];

        UserModel::create($data);
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
}
```

4. setelah di edit

```
SQLSTATE[HY000]: General error: 1364 Field 'password' doesn't 
have a default value (Connection: mysql, SQL: insert into `m_user` (`level_id`, `username`, `nama`, `updated_at`, `created_at`) values (2, manager-3, manager 3, 2025-03-09 08:58:23, 2025-03-09 08:58:23))
```
terjadi error karena $fillable tidak ada column password


## Praktikum 2.1

![user-data](./img/user-data.png)


```php
$user = UserModel::find(1);
return view('user', ['data' => $user]);
``` 
kode diatas digunakan untuk mengambil data dari index pertama dari database


```php
$user = UserModel::where('level_id', 1)->first();
```
kode tersebut juga berfungsi sama
begitu juga dengan kode dibawah ini

```php
$user = UserModel::firstWhere('level_id', 1);

```

```php
 $user = UserModel::findOr(1, ['username', 'nama'], function () {
            abort(404);
    });
```
kode diatas memiliki behaviour yang sama tetapi hanya mengambil 2 kolom username dan nama, method tersebut juga bisa mengkondisikan jika data tidak ditemukan, dalam case ini dia akan meng abort

## Praktikum 2.2

```php
$user = UserModel::findOrFail(1);
```
kode tsb digunakan untuk mengambil data pertama di database, tapi akan return exception jika gagal

```php
$user = UserModel::where('username', 'manager9')->firstOrFail();
```
kode tsb mengambil data yang memiliki username manager9, jika tidak ada maka akan return exception not found (gagal)


## Praktikum 2.3


retrieving aggregrates

```php
$user = UserModel::where('level_id', 2)->count();
return view('user', ['data' => $user]);
```

```html
<table border="1" cellpadding="2" cellspacing="0">
    <tr>
        <th>Jumlah  Pengguna</th>
    </tr>
    <tr>         
        <td>{{$data}}</td>
    </tr>
</table>
```
result

![agg](./img/aggregate-data-user.png)

## Praktikum 2.4

```php
 $user = UserModel::firstOrCreate(
        [   
            'username' => 'manager',
            'nama' => 'Manager',
        ]
    );
```

kode diatas digunakan untuk mengambil data user dengan kolom username dan nama, mengambil data pertama
jika data tidak ada maka buat data tersebut


```php
$user = UserModel::firstOrCreate(
        [
            'username' => 'manager22',
            'nama' => 'Manager 22',
            'password' => Hash::make('12345'),
            'level_id' => 2
        ]
    );
```
kode diatas adalah case jika data tidak ada maka method firstOrCreate akan membuat data tersebut

table m_user
```
+---------+----------+-----------+---------------+--------------------------------------------------------------+---------------------+---------------------+
| user_id | level_id | username  | nama          | password                                                     | created_at          | updated_at          |
+---------+----------+-----------+---------------+--------------------------------------------------------------+---------------------+---------------------+
|       1 |        1 | admin     | Administrator | $2y$12$/uxJHC83m/4ms.0aWZxNX.O7d2OrYuPKOMe2h0Pr/zNpnLH1eU/K. | NULL                | NULL                |
|       2 |        2 | manager   | Manager       | $2y$12$RWSO0mlklSGljMfWDuexjuqF4sK5WUmJH2adAAn8U4HIJ1/cchz2K | NULL                | NULL                |
|       3 |        3 | staff     | Staff/Kasir   | $2y$12$C8zioQOOv18t5I8ncoOYyOduetvvs7F.NM.LsN5JlyQNYnVKYNeT. | NULL                | NULL                |
|       4 |        2 | manager-2 | manager 2     | $2y$12$DddbWiv3ZQwM5wwc3i7wOedlGJxnsq5EGnDKS1Od9B6Ccl0zm54Ka | 2025-03-09 08:47:16 | 2025-03-09 08:47:16 |
|       5 |        2 | manager22 | Manager 22    | $2y$12$KnPhriasXOqvEMwqe4mBrOz6W9p6GbUnbL.TlySfUrqTXeYDmcFoO | 2025-03-09 10:31:17 | 2025-03-09 10:31:17 |
+---------+----------+-----------+---------------+--------------------------------------------------------------+---------------------+---------------------+
```

```php
$user = UserModel::firstOrNew(
    [
        'username' => 'manager',
        'nama' => 'Manager',
    ]
);

```
kode diatas memiliki fungsi yang sama, tetapi tidak disimpan di database


```php
$user = UserModel::firstOrNew(
    [
        'username' => 'manager33',
        'nama' => 'Manager 33',
        'password' => Hash::make('12345'),
        'level_id' => 2
    ]
);
```
jika tidak ada data yang mirip di database, maka method itu akan menyimpan di memori


```php
$user->save()
```
kode diatas digunakan untuk menyimpan data di database

```
+---------+----------+-----------+---------------+--------------------------------------------------------------+---------------------+---------------------+
| user_id | level_id | username  | nama          | password                                                     | created_at          | updated_at          |
+---------+----------+-----------+---------------+--------------------------------------------------------------+---------------------+---------------------+
|       1 |        1 | admin     | Administrator | $2y$12$/uxJHC83m/4ms.0aWZxNX.O7d2OrYuPKOMe2h0Pr/zNpnLH1eU/K. | NULL                | NULL                |
|       2 |        2 | manager   | Manager       | $2y$12$RWSO0mlklSGljMfWDuexjuqF4sK5WUmJH2adAAn8U4HIJ1/cchz2K | NULL                | NULL                |
|       3 |        3 | staff     | Staff/Kasir   | $2y$12$C8zioQOOv18t5I8ncoOYyOduetvvs7F.NM.LsN5JlyQNYnVKYNeT. | NULL                | NULL                |
|       4 |        2 | manager-2 | manager 2     | $2y$12$DddbWiv3ZQwM5wwc3i7wOedlGJxnsq5EGnDKS1Od9B6Ccl0zm54Ka | 2025-03-09 08:47:16 | 2025-03-09 08:47:16 |
|       5 |        2 | manager22 | Manager 22    | $2y$12$KnPhriasXOqvEMwqe4mBrOz6W9p6GbUnbL.TlySfUrqTXeYDmcFoO | 2025-03-09 10:31:17 | 2025-03-09 10:31:17 |
|       6 |        2 | manager33 | Manager 33    | $2y$12$Yqw5kmTJTAxs9J7yDyu.jePRPk9S0vU.lxIdpmSduFczYITqyUruC | 2025-03-09 12:14:24 | 2025-03-09 12:14:24 |
+---------+----------+-----------+---------------+--------------------------------------------------------------+---------------------+---------------------+
```

## Praktikum 2.5

method ``isDirty()`` digunakan untuk mengecek jika attribute berubah sejak terakhir disimpan 
method ``isclean()`` digunakan untuk mengecek jika attribute tidak berubah sejak terakhir disimpan

```php
$user = UserModel::create([
    'username' => 'manager55',
    'nama' => 'Manager55',
    'password' => Hash::make('12345'),
    'level_id' => 2,
]);

$user->username = 'manager56';

$user->isDirty(); // true
$user->isDirty('username'); // true
$user->isDirty('nama'); // false
$user->isDirty(['nama', 'username']); // true

$user->save();

$user->isDirty(); // false
$user->isClean('username'); // false
$user->isClean('nama'); // true
$user->isClean(['nama', 'username']); // false

$user->save();

$user->isDirty(); // false
$user->isClean(); // true

dd($user->isDirty()); 
```
pada kode tersebut di line terakhir outputnya adalah false karena data tidak berubah ketika terakhir disimpan


```php
$user = UserModel::create([
    'username' => 'manager11',
    'nama' => 'Manager11',
    'password' => Hash::make('12345'),
    'level_id' => 2,
]);

$user->username = 'manager12';

$user->save();

$user->wasChanged(); // true
$user->wasChanged('username'); // true
$user->wasChanged(['username', 'level_id']); // true
$user->wasChanged('nama'); // false

dd($user->wasChanged(['nama', 'username'])); // true

```

**`wasChanged()`** digunakan untuk memeriksa apakah data telah berubah **setelah disimpan** ke database. 

## Praktikum 2.6

### read

```php
$user = UserModel::all();
return view("user", ["data" => $user]);
```
kode diatas mengambil semua data di tabel m_user dan mengembalikannya ke client

![user-data](./img/user-data-p2.6.png)

### create

route untuk menampilkan html tambah user

```php
Route::get('/user/tambah', [UserController::class, 'tambah']);
```

method tambah() untuk merender file html userTambah
```php
public function tambah()
{
    return view('userTambah');
}
```

![tambah-user](./img/tambah-user.png)


```php
public function tambah_simpan(Request $request)
{
    UserModel::create([
        'username' => $request->username,
        'nama' => $request->nama,
        'password' => Hash::make('$request->password'),
        'level_id' => $request->level_id
    ]);

    return redirect('/user');
}
```

kode diatas digunakan untuk membuat data, ``$request`` adalah parameter untuk mengambil data dari form input di client

### update

link ubah redirect page ke /user/ubah/{id-user} dan merender informasi dari table ke client

![ubah](./img/ubah-page.png)


kode dibawah digunakan untuk mengupdate data ketika form di isi

```php
public function ubah_simpan($id, Request $request)
{
    $user = UserModel::find($id);
    $user->username = $request->username;
    $user->nama = $request->nama;
    $user->password = Hash::make('$request->password');
    $user->level_id = $request->level_id;
    $user->save();

    return redirect('/user');
}
```

### delete
```php
public function hapus($id)
{
    $user = UserModel::find($id);
    $user->delete();

    return redirect("/user");
}
```
kode diatas digunakan untuk menghapus data sesuai id yang ditangkap


## Praktikum 2.7

```php
class UserModel extends Model
{
    //
    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';

    protected $fillable = ['level_id', 'username', 'nama', 'password'];

    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
}
```
class UserModel

```php
class LevelModel extends Model
{
    protected $table = 'm_level';
    protected $primaryKey = 'level_id';

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class);
    }
}
```
class LevelModel untuk memberikan relasi ke UserModel

hasil
![user-relation](./img/data-user-relation.png)

