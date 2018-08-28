@extends('layouts.app')

@section('content')
<div class="py-2">
    @include('partials.status', ['user' => Auth::user()])
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Explorar') }} - {{ $userMap->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="text-justify map-description">{{ $userMap->description }}</p>

                    <img src="{{ asset('images/badger.gif') }}" alt="">
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-2 mt-md-0">
            <div class="card">
                <div class="card-header">{{ __('Mapas') }}</div>

                <div class="card-body">
                    <div class="list-group">
                        @foreach($maps as $map)
                            <form action="{{ route('travel', $map->id)}}" method="POST">
                                {{ csrf_field() }}

                                <button role="submit" class="list-group-item disabled {{ $userMap->id == $map->id ? "active" : "" }}">{{ $map->name }}</button>
                            </form>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
