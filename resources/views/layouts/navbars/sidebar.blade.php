<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        @if(Auth::user()->role_user == 'adminwe')
            <a class="navbar-brand pt-0" href="{{ route('home') }}">
                <img src="{{ asset('argon') }}/img/brand/WE.png" class="nav-link {{ request()->is('/home') ? 'active' : '' }}" alt="...">
            </a>
        @elseif(Auth::user()->role_user == 'adminjprof')
            <a class="navbar-brand pt-0" href="{{ route('home') }}">
                <img src="{{ asset('argon') }}/img/brand/logojprof.png" class="nav-link {{ request()->is('/home') ? 'active' : '' }}" alt="..." style="">
            </a>
        @elseif(Auth::user()->role_user == 'adminAds')
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/WE.png" class="nav-link {{ request()->is('home') ? 'active' : '' }}" alt="..." style="">
        </a>
        @endif
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                @if(Auth::user()->role_user == 'adminwe')
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/brand/logowe.png">
                            </span>
                        </div>
                    </a>
                @elseif(Auth::user()->role_user == 'adminjprof')
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/brand/logojprof.png">
                            </span>
                        </div>
                    </a>
                @elseif(Auth::user()->role_user == 'adminAds')
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/brand/logowe.png">
                        </span>
                    </div>
                </a>
                @endif
                
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        @if(Auth::user()->role_user == 'adminwe')
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('argon') }}/img/brand/WE.png">
                            </a>
                        @elseif(Auth::user()->role_user == 'adminjprof')
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('argon') }}/img/brand/logojprof.png" style="">
                            </a>
                        @elseif(Auth::user()->role_user == 'adminAds')
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('argon') }}/img/brand/WE.png">
                            </a>
                        @endif
                        
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>

            @if (Auth::user()->role_user == 'adminwe')
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fas fa-chart-line" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Ranks (SmiliarWeb)') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('website') }}">
                                    {{ __('Website') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('youtube') }}">
                                    {{ __('Youtube') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('instagram') }}">
                                    {{ __('Instagram') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('tiktok') }}">
                                    {{ __('Tiktok') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#navbar-examples1" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fas fa-warehouse-alt"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Programmatics') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-examples1">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('ads')}}">
                                    {{ __('Ads Deposit') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('ads_slot')}}">
                                    {{ __('Ads Slot') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('programmatics')}}">
                                    {{ __('Data Programmatics') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#expanditure" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fas fa-window-maximize"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Expanditure') }}</span>
                    </a>

                    <div class="collapse show" id="expanditure">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('mst_expanditure')}}">
                                    {{ __('Master Expanditure') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('bisnisExpanditure')}}">
                                    {{ __('Bisnis Expanditure') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('bisnisIncome')}}">
                                    {{ __('Bisnis Income') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('followers')}}">
                        <i class="fas fa-thumbs-up"></i> {{ __('Followers') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('rivality')}}">
                        <i class="fas fa-landmark"></i> {{ __('Rivality') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#navbar-examples4" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fas fa-address-card" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="">{{ __('AE Data') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-examples4">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('aeEmployee')}}">
                                    {{ __('AE Employee') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('aePerformance')}}">
                                    {{ __('AE Performance') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('measurement')}}">
                                    {{ __('Master Pengukuran') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('events') }}">
                        <i class="fas fa-calendar-alt"></i> {{ __('Events') }}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('performance') }}">
                        <i class="fas fa-tachometer-alt"></i> {{ __('Performance') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples2" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fas fa-users"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('CRM') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-examples2">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('companies') }}">
                                    {{ __('Companies') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contacts') }}">
                                    {{ __('Contacts') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('deals') }}">
                                    {{ __('Deals') }}
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    {{ __('Deals Add') }}
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fas fa-cogs"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Properties') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-examples3">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('kurs')}}">
                                    {{ __('Kurs') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('eventCategory')}}">
                                    {{ __('Kategori Event') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="picEvent">
                                    {{ __('PIC Event') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="statusEvent">
                                    {{ __('Status Event') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="divisi">
                                    {{ __('Divisi') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="coreBisnis">
                                    {{ __('Core Bisnis') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="kategoriBisnis">
                                    {{ __('Kategori Bisnis') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="productBisnis">
                                    {{ __('Product Bisnis') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            @elseif(Auth::user()->role_user == 'adminjprof')
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('performanceJprof') }}">
                        <i class="fas fa-tachometer-alt"></i> {{ __('Performance') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('coreBisnisJprof') }}">
                        <i class="fas fa-calendar-alt"></i> {{ __('Core Bisnis') }}
                    </a>
                </li>
            </ul>
            @elseif(Auth::user()->role_user == 'adminAds')
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fas fa-chart-line" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Programmatics') }}</span>
                    </a>
    
                    <div class="collapse show" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('ads')}}">
                                    {{ __('Ads Deposit') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('ads_slot')}}">
                                    {{ __('Ads Slot') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('programmatics')}}">
                                    {{ __('Data Programmatics') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>    
            @endif
            <!-- Navigation -->
            
        </div>
    </div>
</nav>
