@extends('layouts.app')

@section('content')
<div class="py-2">
    @include('partials.status', ['user' => Auth::user()])
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Explorar') }} - {{ $currentMap->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="text-justify map-description">{{ $currentMap->description }}</p>

                    <h1 class="display-5">Criaturas</h1>

                    <div class="row">
                        @foreach($respawns as $respawn)
                            @php
                                $visibleElementId = str_random(10);
                            @endphp
                            <div class="col-md-3 my-3 text-center">
                                <form id="{{ $visibleElementId }}" action="{{ route('pve-battle', $respawn->token) }}" method="POST">
                                    @csrf
                                    <a href="#" onClick="event.preventDefault(); document.getElementById('{{ $visibleElementId }}').submit() ">
                                        <img src="{{ asset("images/{$respawn->monster->image}.gif") }}" class="mb-1" alt="">
                                    </a>
                                </form>
                                <p class="mb-1">{{ $respawn->monster->name }}</p>
                                <p class="mb-1">{{ "Level {$respawn->level}" }}</p>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $respawn->current_hitpoints * 100 / $respawn->max_hitpoints }}%" aria-valuenow="{{ $respawn->current_hitpoints }}" aria-valuemin="0" aria-valuemax="{{ $respawn->max_hitpoints }}">{{ $respawn->current_hitpoints . '/' . $respawn->max_hitpoints}}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
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
                                @csrf

                                <button class="list-group-item list-group-item-action {{ $currentMap->id == $map->id ? "active" : "" }}" style="cursor: pointer">{{ $map->name }}</button>
                            </form>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
