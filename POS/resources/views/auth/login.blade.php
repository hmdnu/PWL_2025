@extends('layout.app')

@section('title', 'Login')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-base-100 px-4">
        <div class="w-full max-w-sm p-6 bg-base-200 rounded-box shadow-md">
            <h1 class="text-2xl font-bold text-center mb-6">Login</h1>

            <form action="/login" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="id" class="label">
                        <span class="label-text">No Induk</span>
                    </label>
                    <input type="text" name="no_induk" id="id" class="input input-bordered w-full" required>
                </div>

                <div x-data="{ show: false }">
                    <label for="password" class="label">
                        <span class="label-text">Password</span>
                    </label>

                    <div class="relative">
                        <input :type="show ? 'text' : 'password'" name="password" id="password"
                            class="input input-bordered w-full pr-10" required>
                        <button type="button" @click="show = !show"
                            class="absolute right-2 top-1/2 -translate-y-1/2 text-sm text-gray-500">
                            <span x-text="show ? 'Hide' : 'Show'"></span>
                        </button>
                    </div>
                </div>

                @error('no_induk')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <div class="pt-2">
                    <button type="submit" class="btn btn-primary w-full">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
