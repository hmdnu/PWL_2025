# Laporan praktikum jobsheet 5.2

## Praktikum 1

### download adminlte template

download dengan command linux

```sh
wget https://github.com/ColorlibHQ/AdminLTE/archive/refs/tags/v3.2.0.tar.gz -P ./public
```

extract filenya

```sh
tar -xf public/v3.2.0.tar.gz -C public/
```

rename ke adminlte

```sh
mv public/AdminLTE-3.2.0 public/adminlte
```

membuat template.blade.php

[Full file](https://github.com/hmdnu/PWL_2025/tree/main/week5/jobsheet5.2/resources/views/layouts/template.blade.php)

dikarenakan line code yg banyak saya hanya akan membuat href ke filenya saja yang sudah di modifikasi

list components
1. [header.blade.php](https://github.com/hmdnu/PWL_2025/tree/main/week5/jobsheet5.2/resources/views/layouts/header.blade.php)
2. [sidebar.blade.php](https://github.com/hmdnu/PWL_2025/tree/main/week5/jobsheet5.2/resources/views/layouts/sidebar.blade.php)
3. [breadcrumb.blade.php](https://github.com/hmdnu/PWL_2025/tree/main/week5/jobsheet5.2/resources/views/layouts/breadcrumb.blade.php)
4. [footer.blade.php](https://github.com/hmdnu/PWL_2025/tree/main/week5/jobsheet5.2/resources/views/layouts/footer.blade.php)
