@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Explorar') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Mapas') }}</div>

                <div class="card-body">
                    <div class="list-group">
                      <a href="#" class="list-group-item list-group-item-action active">Centro da cidade</a>
                      <a href="#" class="list-group-item list-group-item-action">Floresta Negra</a>
                      <a href="#" class="list-group-item list-group-item-action">Torre do Ancião</a>
                      <a href="#" class="list-group-item list-group-item-action">Caverna de Goblin</a>
                      <a href="#" class="list-group-item list-group-item-action disabled">Vulcão atormentado</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
