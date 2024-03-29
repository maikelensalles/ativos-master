<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/logo.png" class="navbar-brand-img" alt="..." style=" max-width: 250px; max-height: 90px;">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/semfoto.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Seja bem vindo(a)!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('Meu Perfil') }}</span>
                    </a>
                    {{--<a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>--}}
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Sair') }}</span>
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
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/logo.png" class="navbar-brand-img" alt="..." style=" max-width: 250px; max-height: 90px;">
                        </a>
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
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fas fa-home text-warning"></i> {{ __('Paginal principal') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('propostas.index') }}">
                        <i class="fas fa-file-contract text-default"></i> {{ __('Propostas') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contratos.index') }}">
                        <i class="fas fa-file-signature text-info"></i> {{ __('Contratos') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('resgates.index') }}">
                        <i class="fas fa-hand-holding-usd text-success"></i> {{ __('Enviar Resgate') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('novidades.index') }}">
                        <i class="fas fa-calendar-plus text-danger"></i> {{ __('Novidades') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('gestores.index') }}">
                        <i class="fas fa-map-pin text-primary"></i> {{ __('Novos Gestores') }}
                    </a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link " href="#navbar" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar">
                        <i class="fas fa-angle-double-right text-warning"></i>
                        <span class="nav-link-text">{{ __('Mais') }}</span>
                    </a>

                    <div class="collapse show" id="navbar">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    <i class="ni ni-fat-delete"></i>
                                    {{ __('Dados cadastrais') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    <i class="ni ni-fat-delete"></i>
                                    {{ __('Gerenciar usuários') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('roles.index') }}">
                                    <i class="ni ni-fat-delete"></i>
                                    {{ __('Gerenciar funsões') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('grupos.index') }}">
                                    <i class="ni ni-fat-delete"></i>
                                    {{ __('Grupos WhatsApp') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('propostas.search') }}">
                                    <i class="ni ni-fat-delete"></i>
                                    {{ __('Simulador') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>