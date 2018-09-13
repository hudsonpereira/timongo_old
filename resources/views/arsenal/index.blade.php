@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Arsenal') }}</div>

                <div class="card-body">
                    <p class="text-justify">Aqui você encontra seu arsenal de equipamentos.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Equipados</div>
                <div class="card-body">
                    <div class="row justify-content-around">
                        <div class="col-sm-3 arsenal"></div>
                        <div class="col-sm-3 arsenal"></div>
                        <div class="col-sm-3 arsenal"></div>
                    </div>

                    <div class="row justify-content-around my-2 text-center">
                        <div class="col-sm-3 arsenal"></div>
                        <div class="col-sm-3 arsenal">
                            @if($armor)
                                <img src="images/{{$armor->image}}.gif" alt="" class="img-responsive py-3">
                            @endif
                            <!-- <img src="images/leather-armor.gif" alt="" class="img-responsive py-3"> -->
                        </div>
                        <div class="col-sm-3 arsenal">
                            @if($weapon)
                                <img src="images/leather-armor.gif" alt="" class="img-responsive py-3">
                            @endif
                            <!-- <img src="images/leather-armor.gif" alt="" class="img-responsive py-3"> -->
                        </div>
                    </div>

                    <div class="row justify-content-around">
                        <div class="col-sm-3 arsenal"></div>
                        <div class="col-sm-3 arsenal"></div>
                        <div class="col-sm-3 arsenal"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
