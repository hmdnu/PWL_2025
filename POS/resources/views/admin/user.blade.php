@extends('layout.app')

@section('title', 'User')

@section('content')
    @include('partials.sidebar')
    <section class="p-10">
        <h1>User</h1>
        <button onclick="document.getElementById('modal-create').showModal()" class="btn btn-primary my-5">Add User
        </button>
        <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No Induk</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $user->no_induk }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td class="flex gap-2">
                                <button onclick="document.getElementById('modal-edit-{{ $user->id }}').showModal()"
                                    class="btn btn-soft btn-primary btn-sm">Edit
                                </button>
                                <button onclick="document.getElementById('modal-del-{{ $user->id }}').showModal()"
                                    class="btn btn-soft btn-error btn-sm">Delete
                                </button>
                            </td>
                        </tr>

                        <x-confirm-modal id="modal-del-{{ $user->id }}" title="Delete User" method="DELETE"
                            message="Are you sure you want to delete {{ $user->name }}?"
                            action="/dashboard/user/{{ $user->id }}/delete" method="DELETE" />

                        <x-form-modal id="modal-edit-{{ $user->id }}" title="Edit {{ $user->name }}"
                            action="/dashboard/user/{{ $user->id }}/edit" method="PATCH">
                            <fieldset class="fieldset flex flex-col">
                                <legend class="fieldset-legend">Name</legend>
                                <input type="text" required name="name" class="input" value="{{ $user->name }}" />
                                <legend class="fieldset-legend">Email</legend>
                                <input type="email" required name="email" class="input" value="{{ $user->email }}" />

                            </fieldset>
                            <button class="btn btn-primary btn-soft place-self-start">Edit</button>
                        </x-form-modal>
                    @endforeach
                </tbody>
            </table>
        </div>

        <x-form-modal id="modal-create" title="Create User" btn="Create" action="/dashboard/user/create">
            <div class="flex gap-5 flex-col mb-5">
                <input type="text" name="no_induk" class="input" placeholder="No Induk" value="{{ old('no_induk') }}">
                @error('no_induk')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <input type="text" name="name" class="input" placeholder="Name" value="{{ old('name') }}">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <input type="email" name="email" class="input" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <input type="password" name="password" class="input" placeholder="Password">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <input type="password" name="password_confirmation" class="input" placeholder="Repeat Password">
            </div>
            <button class="btn btn-primary place-self-start">Create</button>
        </x-form-modal>
    </section>

    @if (session('modal'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                document.getElementById('{{ session('modal') }}')?.showModal();
            });
        </script>
    @endif
@endsection
