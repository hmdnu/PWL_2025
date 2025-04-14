@extends('layout.app')

@section('title', 'Home')

@section('content')
    @include('partials.navbar')
    <h1 class="text-2xl p-10">List Room</h1>
    <section class="p-10 grid grid-cols-3 justify-items-center gap-10">
        @foreach ($rooms as $room)
            <div class="card bg-base-300 w-80 shadow-sm">
                <figure>
                    <img
                        src="{{@asset('/img/classroom.png')}}"
                        alt="Shoes"/>
                </figure>
                <div class="card-body">
                    <h2 class="card-title">{{$room->name}}</h2>
                    <div class="card-actions flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <div aria-label="info" class="status status-info"></div>
                            <p>{{$room->status}}</p>
                        </div>
                        <a href="{{url('/room',['id' => $room->id])}}" class="btn btn-soft btn-primary">
                            Rents
                        </a>
                    </div>
                </div>
            </div>
        @endforeach


    </section>
@endsection
