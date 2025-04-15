@extends('layout.app')

@section('title', 'Rental Pending')

@section('content')
    @include('partials.sidebar')

    <section class="p-10">
        {{-- rental pending --}}
        <section>
            <h1 class="mb-5">Rental Pending</h1>
            <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name Tenant</th>
                            <th>Room Image</th>
                            <th>Room Name</th>
                            <th>Room Floor</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Ended</th>
                            <th>Status</th>
                            <th>Attachment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rentals as $rental)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $rental->tenant_name }}</td>
                                <td>
                                    <a href="{{ asset("storage/$rental->room_image") }}" target="_blank"
                                        rel="noopener noreferrer">
                                        <img src="{{ asset("storage/$rental->room_image") }}" alt="room image"
                                            class="size-20 object-cover">
                                    </a>
                                </td>
                                <td>{{ $rental->room_name }}</td>
                                <td>{{ $rental->room_floor }}</td>
                                <td>{{ $rental->start_date }}</td>
                                <td>{{ $rental->end_date }}</td>
                                <td>{{ $rental->ended ?? '-' }}</td>
                                <td>
                                    <span
                                        class="badge font-semibold
                                    @if ($rental->status === 'active') badge-success
                                    @elseif($rental->status === 'pending')
                                        badge-warning
                                    @else
                                        badge-error @endif">
                                        {{ ucfirst($rental->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a target="_blank" href="{{ asset('storage/' . $rental->attachment) }}"
                                        class="text-blue-500 hover:underline">Attachment</a>
                                </td>
                                <td>
                                    <button
                                        onclick="document.getElementById('modal-approve-{{ $rental->id }}').showModal()"
                                        class="btn btn-soft btn-success">Approve</button>
                                </td>
                            </tr>
                            <x-confirm-modal id="modal-approve-{{ $rental->id }}" title="Approve this rental?"
                                message="Would you approve {{ $rental->tenant_name }} rent?"
                                action="/dashboard/rental/{{ $rental->id }}/approve" method="GET" />
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>


    </section>
@endsection
