<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->nickname }}</div>
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed tempore minus sit laboriosam rem laudantium ex, porro ullam! Labore, ab.</p>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $user->hitpoints }}%" aria-valuenow="{{ $user->hitpoints }}" aria-valuemin="0" aria-valuemax="{{ $user->max_hitpoints }}"></div>
                            </div>

                            <div class="progress mt-2">
                              <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>