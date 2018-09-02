@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Arsenal') }}</div>

                <div class="card-body">
                    <h1 class="display-5">Utilizando:</h1>
                    @if($armor)
                        <p><img src="images/{{$armor->image}}.gif" alt="" class="img-responsive"> {{ $armor->name }}</p>
                    @endif

                    @if($weapon)
                        <p><img src="images/leather-armor.gif" alt="" class="img-responsive"> Roupa de Couro</p>
                    @endif

                    <h1 class="display-5">Disponível:</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
