@extends('layout.app')
@section('title', 'Room')

@section('content')
    @include('partials.sidebar')
    <section class="p-10">
        <h1>Room</h1>
        <button onclick="document.getElementById('modal-create').showModal()" class="my-5 btn btn-primary">Add Room
        </button>
        <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Floor</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    @foreach ($rooms as $room)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>
                                <a href="{{ asset("storage/$room->image") }}" target="_blank">
                                    <img class="size-20 object-cover" src="{{ asset("storage/$room->image") }}"
                                        alt="class" />
                                </a>
                            </td>
                            <td>{{ $room->name }}</td>
                            <td>{{ $room->floor }}</td>
                            <td>
                                <span
                                    class="badge font-semibold
                                    @if ($room->status === 'available') badge-success
                                    @elseif($room->status === 'maintenance')
                                        badge-warning
                                    @else
                                        badge-error @endif">
                                    {{ ucfirst($room->status) }}
                                </span>
                            </td>
                            <td>
                                <button onclick="document.getElementById('modal-edit-{{ $room->id }}').showModal()"
                                    class="btn btn-soft btn-primary btn-sm mr-1">Edit
                                </button>
                                <button onclick="document.getElementById('modal-del-{{ $room->id }}').showModal()"
                                    class="btn btn-soft btn-error btn-sm">Delete
                                </button>
                            </td>
                        </tr>
                        <x-confirm-modal id="modal-del-{{ $room->id }}" title="Delete Room" method="DELETE"
                            message="Are you sure want to delete {{ $room->name }}"
                            action="/dashboard/room/{{ $room->id }}/delete" />

                        <x-form-modal id='modal-edit-{{ $room->id }}' title="Edit room {{ $room->name }}"
                            action="/dashboard/room/{{ $room->id }}/edit" method="PATCH">

                            <div class="flex flex-col gap-5">
                                <input type="text" name="name" required placeholder="name" class="input"
                                    value="{{ $room->name }}" />
                                @error('name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror

                                <input type="text" name="floor" required placeholder="floor" class="input"
                                    value="{{ $room->floor }}" />
                                @error('floor')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror

                                <select name="status" class="select">
                                    <option disabled selected>Status</option>
                                    <option>Available</option>
                                    <option>Maintenance</option>
                                    <option>Inavailable</option>
                                </select>

                                @error('status')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror

                                <input type="file" name="room_image" class="file-input file-input-primary" />
                                @error('room_image')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                                <button class="btn btn-info btn-soft place-self-start">Edit</button>
                            </div>
                        </x-form-modal>
                    @endforeach
                </tbody>
            </table>
        </div>

        <x-form-modal id="modal-create" title="Add Room" action="/dashboard/room/create">
            <div class="flex flex-col gap-5">
                <input type="text" name="name" required placeholder="name" class="input" />
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <input type="text" name="floor" required placeholder="floor" class="input" />
                @error('floor')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <input type="file" name="room_image" required class="file-input file-input-primary" />
                @error('room_image')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
                <button class="btn btn-primary btn-soft place-self-start">Create</button>
            </div>
        </x-form-modal>
    </section>
@endsection
