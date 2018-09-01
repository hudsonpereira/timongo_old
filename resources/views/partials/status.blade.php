<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->nickname . ', ' . $user->getTitle() }} <span class="float-right">Level {{ $user->level }}</span></div>
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed tempore minus sit laboriosam rem laudantium ex, porro ullam! Labore, ab.</p>
                    <div class="row">
                        <!-- Bars -->
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="em em-heart"></i>
                                </div>
                                <div class="col-md-10">
                                    <div class="progress" style="height:100%">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $user->current_hitpoints }}%" aria-valuenow="{{ $user->current_hitpoints }}" aria-valuemin="0" aria-valuemax="{{ $user->max_hitpoints }}">{{ $user->current_hitpoints . '/' . $user->max_hitpoints}}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Experience -->
                            <div class="row mt-2">
                                <div class="col-md-2">
                                    <i class="em em-crossed_swords"></i>
                                </div>
                                <div class="col-md-10">
                                    <div class="progress" style="height:100%">
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ $user->experience * 100 / $user->tnl() }}%" aria-valuenow="{{ $user->experience }}" aria-valuemin="0" aria-valuemax="{{ $user->max_hitpoints }}">{{ $user->experience . '/' . $user->tnl()}}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Energy -->
                            <div class="row mt-2">
                                <div class="col-md-2">
                                    <i class="em em-zap"></i>
                                </div>
                                <div class="col-md-10">
                                    <div class="progress" style="height:100%">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $user->current_energy * 100 / $user->max_energy }}%" aria-valuenow="{{ $user->current_energy }}" aria-valuemin="0" aria-valuemax="{{ $user->max_energy }}">{{ $user->current_energy . '/' . $user->max_energy}}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Mana -->
                            <div class="row mt-2">
                                <div class="col-md-2">
                                    <i class="em em-gem"></i>
                                </div>
                                <div class="col-md-10">
                                    <p class="text-center">{{ $user->mana_stone }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Skills -->
                        <div class="col-md-6 mt-2 mt-md-0">
                            <img class="p-1" src="{{ asset('images/brutal-strike.png') }}" alt="Brual Strike" data-toggle="popover" title="Brual Strike" data-content="Some content inside the popover"/>
                            <img class="p-1" src="{{ asset('images/front-sweep.png') }}" alt="Front Sweep" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @if ($user->isDead())
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><i class="em em-skull"></i> Você está <b>morto</b>!</div>
                    <div class="card-body">
                        @if($user->dead_until >= Carbon\Carbon::now())
                            <p class="alert alert-warning">Você poderá ressucitar <b>{{ $user->dead_until->diffForHumans() }}</b>. Recarregue a página depois deste horário.</p>
                        @else
                            <form action="{{ route('revive') }}" method="POST">
                                @csrf
                                <button class="btn-primary">Reviver</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>