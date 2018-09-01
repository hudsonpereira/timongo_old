@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Início') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Seja bem vindo <b>{{ Auth::user()->nickname}}</b>, aqui você poderá ler os guias do jogo.</p>
                </div>
            </div>
        </div>

        <!-- <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Páginas') }}</div>

                <div class="card-body">

                    <p>Seja bem vindo <b>{{ Auth::user()->nickname}}</b>, aqui você poderá ler os guias do jogo.</p>
                </div>
            </div>
        </div> -->
    </div>
</div>
@endsection
