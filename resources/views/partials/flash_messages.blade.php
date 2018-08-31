<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                  {!! session('success') !!}
                </div>
            @endif
        </div>
    </div>
</div>