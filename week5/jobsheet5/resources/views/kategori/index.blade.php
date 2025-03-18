@extends('layouts.app')

@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')

@section('content')
    <div class="container">
        <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">Add</a>

        <div class="card">
            <div class="card-header">Data Kategori</div>
            <div class="card-body">
                {!! $dataTable->table() !!}
            </div>
        </div>
    </div>

    @push('scripts')
        {!! $dataTable->scripts() !!}
    @endpush
@endsection
