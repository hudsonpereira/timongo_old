<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->nickname }}</div>
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed tempore minus sit laboriosam rem laudantium ex, porro ullam! Labore, ab.</p>
                    <div class="row">
                        <!-- Bars -->
                        <div class="col-md-6">
                            <div class="row text-center">
                                <div class="col-md-2">
                                    <i class="em em-heart"></i>
                                </div>
                                <div class="col-md-10">
                                    <div class="progress" style="height:100%">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $user->hitpoints }}%" aria-valuenow="{{ $user->hitpoints }}" aria-valuemin="0" aria-valuemax="{{ $user->max_hitpoints }}">{{ $user->hitpoints . '/' . $user->max_hitpoints}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Skills -->
                        <div class="col-md-6 mt-2 mt-md-0">
                            <img class="p-1 border border-primary " src="{{ asset('images/brutal-strike.png') }}" alt="Brual Strike" />
                            <img class="p-1" src="{{ asset('images/front-sweep.png') }}" alt="Front Sweep" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>