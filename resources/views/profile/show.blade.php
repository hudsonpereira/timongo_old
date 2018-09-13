@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->nickname . ', ' . $user->getTitle() }} <span class="float-right">Level {{ $user->level }}</span></div>
                <div class="card-body">
                    <p>Última atividade: {{ $user->updated_at->diffForHumans() }}.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
