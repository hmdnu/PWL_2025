{{-- resources/views/profile.blade.php --}}
@extends('layout.app')

@section('title', 'Profile')

@section('content')
    @include('partials.navbar')
    <div class="p-10">
        <h1 class="text-3xl font-bold mb-4">My Profile</h1>

        <div class="bg-base-200 p-6 rounded-lg mb-8 text-white">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
            <p><strong>No Induk:</strong> {{ $user->no_induk }}</p>
        </div>

        <h2 class="text-2xl mb-3">Rental History</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse($rentals as $rental)
                <div class="card bg-base-200 shadow-md text-white">
                    <div class="card-body">
                        <h3 class="card-title">{{ $rental->room->name }}</h3>
                        <p>Room ID : {{$rental->room->id}}</p>
                        <p>Floor: {{ $rental->room->floor }}</p>
                        <p>Status:
                            <span class="badge
                                @if($rental->status === 'active')
                                 badge-success
                                @elseif($rental->status === 'pending')
                                 badge-warning
                                @else
                                 badge-error
                                @endif">
                                {{ ucfirst($rental->status) }}
                            </span>
                        </p>
                        <p>Start: {{ $rental->start_date }}</p>
                        <p>End: {{ $rental->end_date ?? '-' }}</p>
                        <p>Rental end: {{$rental->ended ?? '-'}}</p>
                        @if($rental->attachment)
                            <a href="{{ asset('storage/' . $rental->attachment) }}" class="text-blue-400 underline"
                               target="_blank">View Attachment</a>
                        @endif
                        @if($rental->status === 'active')
                            <a href='{{"/rent/end?rentalId={$rental->id}&roomId={$rental->room_id}"}}'
                               class="btn btn-soft btn-error mt-5">End Rent</a>
                        @endif

                    </div>
                </div>
            @empty
                <p class="text-gray-400">You haven't rented any rooms yet.</p>
            @endforelse
        </div>
    </div>
@endsection
