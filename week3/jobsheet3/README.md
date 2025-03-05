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


