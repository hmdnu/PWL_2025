@extends('layout.app')

@section('title', 'Room Detail')

@section('content')
    <div class="p-10">
        <h1 class="text-2xl mb-4 text-center">{{ $room->name }} - Room Detail</h1>
        <section class="bg-base-200 dark:bg-base-300 p-10 rounded-lg">
            <div class="card w-full max-w-lg bg-base-100 shadow-lg mx-auto">
                <figure class="w-full">
                    <img src="{{ asset('/img/classroom.png') }}" alt="Classroom Image" class="w-full object-cover h-64">
                </figure>
                <div class="card-body text-white">
                    <h2 class="card-title text-center">{{ $room->name }}</h2>
                    <p class="text-sm text-center">Floor: {{ $room->floor }}</p>
                    <!-- Displaying the Status -->
                    <div class="text-center mt-4">
                        <p>Status:
                            <span
                                class="badge
                                    @if($room->status === 'available')
                                        badge-success
                                    @elseif($room->status === 'maintenance')
                                        badge-warning
                                    @else
                                        badge-error
                                    @endif">
                                {{ ucfirst($room->status) }}
                            </span>
                        </p>
                    </div>

                    <!-- Display Rent form if available -->
                    @if ($room->status === 'available')
                        <form  action="{{ url('/room/rent/' . $room->id . '/tenant/' . auth()->user()->id)}}" enctype="multipart/form-data" method="POST" class="mt-6">
                            @csrf
                            <div class="mt-4">
                                <label for="start_date" class="block text-sm">Start Date</label>
                                <input type="date" id="start_date" name="start_date" required class="input input-bordered w-full">
                            </div>
                            <div class="mt-4">
                                <label for="end_date" class="block text-sm">End Date</label>
                                <input type="date" id="end_date" name="end_date" class="input input-bordered w-full">
                            </div>
                            <div class="mt-4">
                                <label for="attachment" class="block text-sm">Attachment</label>
                                <input required type="file" name="attachment" class="file-input file-input-primary" />
                            </div>
                            <button type="submit" class="btn btn-primary w-full mt-6">Rent Room</button>
                        </form>
                    @else
                        <p class="mt-4 text-center text-sm text-gray-400">This room is not available for rent at the moment.</p>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
