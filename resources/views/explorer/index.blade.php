@extends('layouts.app')

@section('content')
<div class="py-2">
    @include('partials.status', compact('user'))
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Explorar') }} - {{ $currentMap->name }} ({{ $currentArea->name }})</div>

                <div class="card-body">
                    <p class="text-justify map-description">{{ $currentMap->description }}</p>

                    <h1 class="display-5">Explorar</h1>

                    <p class="text-justify">Aqui são listadas as áreas já exploradas de cada mapa.</p>
                    <div class="row my-4">
                        @foreach($areas as $area)
                            <div class="col-md-9">
                                <h4 class="display-5">{{ $area->name }}</h4>
                            </div>
                            <div class="col-md-3">
                                @unless($currentArea->id == $area->id)
                                    <button class="btn btn-secondary">Viajar</button>
                                @endif
                            </div>
                        @endforeach
                    </div>

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
                            @if ($user->isAtMap($map))
                                <button class="list-group-item list-group-item-action active" style="cursor: pointer">{{ $map->name }}</button>
                            @else
                                <form action="{{ route('travel', $map->id)}}" method="POST">
                                    @csrf
                                    <button class="list-group-item list-group-item-action" style="cursor: pointer">{{ $map->name }}</button>
                                </form>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            @if ($users->isNotEmpty())
                <div class="card my-md-2">
                    <div class="card-header">{{ __('Jogadores neste mapa') }}</div>

                    <div class="card-body">
                        <div class="list-group">
                            @foreach($users as $user)
                                <a href="{{ route('profile', $user->slug) }}" class="list-group-item list-group-item-action">{{ "{$user->nickname}, {$user->getTitle()} - Level {$user->level}" }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
