<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah user_id</title>
</head>

<body>
    <h1>Form Tambah Data User</hi>
        <form method="post" action="/user/tambah_simpan">
            {{ csrf_field() }}
            <label>Username</Label>
            <br>
            <input type="text" name="username" placeholder="Masukan Username" />
            <br />
            <label>Nama</label>
            <br />
            <input type="text" name="nama" placeholder="Masukan Nama">
            <br />
            <label>Password</label>
            <br />
            <input type="password" name="password" placeholder="Masukan Password">
            <br />
            <label>Level ID</label>
            <br />
            <input type="number" name="level_id" placeholder="Masukan ID Level">
            <br />
            <input type="submit" class="btn btn-success" value="Simpan">
        </form>
</body>

</html>
