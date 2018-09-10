@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-2">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ _('Status de progresso') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h3>Iniciação</h3>

                            <img src="{{ $skills->first()->renderImage() }}" alt="">
                        </div>
                        <div class="col-md-4">
                            <h3>Skill básico</h3>
                        </div>
                        <div class="col-md-4">
                            <h3>Skill de TDR</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Habilidades') }}</div>

                <div class="card-body">
                    @foreach($skills as $skill)
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ $skill->renderImage() }}" alt="{{ $skill->name }}">
                            </div>
                            <div class="col-md-5">
                                <p class="font-weight-bold">{{ $skill->name }}</p>
                                <p>{{ $skill->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
