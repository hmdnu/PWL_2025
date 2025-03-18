# Laporan Praktikum Jobsheet 5

## Praktikum 1

### installing adminLTE template via docker sail

```
sail composer require jeroennoten/laravel-adminlte
```

jika sudah terinstall maka akan muncul ini di composer.json

```json
"require": {
    "php": "^8.2",
    "jeroennoten/laravel-adminlte": "^3.15",
    "laravel/framework": "^12.0",
    "laravel/tinker": "^2.10.1"
},
```

### applying template

app.blade.php

```php
@extends('adminlte::page')
{{-- Extend and customize the browser title --}}
@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle')
        | @yield('subtitle')
    @endif
@stop
{{-- Extend and customize the page content header --}}
@section('content_header')
    @hasSection('content_header_title')
        <h1 class="text-muted">
            @yield('content_header_title')
            @hasSection('content_header_subtitle')
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    @yield('content_header_subtitle')
                </small>
            @endif
        </h1>
    @endif
@stop
{{-- Rename section content to content_body --}}
@section('content')
    @yield('content_body')
@stop
{{-- Create a common footer --}}
@section('footer')
    <div class="float-right">
        Version: {{ config('app.version', '1.0.0') }}
    </div>
    <strong>
        <a href="{{ config('app.company_url', '#') }}">
            {{ config('app.company_name', 'My company') }}
        </a>
    </strong>
@stop
{{-- Add common Javascript/Jquery code --}}
@push('js')
    <script>
        $(document).ready(function() {
            // Add your common script logic here...
        });
    </script>
@endpush
{{-- Add common CSS customizations --}}
@push('css')
    <style type="text/css">
        {{-- You can add AdminLTE customizations here --}}
        /*
                .card-header {
                border-bottom: none;
                }
                .card-title {
                font-weight: 600;
                }
                */
    </style>
@endpush

```

welcome.blade.php

```php
@extends('layouts.app')

{{-- Customize layout sections --}}
@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Welcome')

{{-- Content body: main page content --}}
@section('content_body')
    <p>Welcome to this beautiful admin panel.</p>
@stop

{{-- Push extra CSS --}}
@push('css')
    {{-- Add extra stylesheets here --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}
@push('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@endpush

```

view dari page welcome.blade.php

![welcome.blade](./resource/welcome.png)


