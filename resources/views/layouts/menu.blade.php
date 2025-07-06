<nav class="mt-2" style="margin-top: 10px;">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if (\Auth::check())
            @if (isset($company) && \Request::is('*companies/'.$company->id.'*'))
                <li class="nav-header">{{ strtoupper($company->name) }}</li>

                <li class="nav-header">GESTÃO DE</li>

                <li class="nav-item">
                    <a href="{{ route('companies.rooms.index', $company->id) }}" class="nav-link {{ \Request::is('*rooms*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clinic-medical"></i>
                        <p>Salas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('companies.schedulings.index', $company->id) }}" class="nav-link {{ (\Request::is('*schedulings*') && \Request::is('*access_requests*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Agendamentos</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('companies.access_requests.index', $company->id) }}" class="nav-link {{ \Request::is('*access_requests*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tv"></i>
                        <p>Solicitações de Acesso</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-arrow-left"></i>
                        <p>Voltar</p>
                    </a>
                </li>
            @else
                <li class="nav-header">GESTÃO DE</li>

                <li class="nav-item">
                    <a href="{{ route('companies.index') }}" class="nav-link {{ \Request::is('*companies*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hospital"></i>
                        <p>Clínicas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('schedulings.index') }}" class="nav-link {{ \Request::is('*schedulings*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Meus Agendamentos</p>
                    </a>
                </li>

                @if (\Auth::check() && \Auth::user()->hasRole('admin'))
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ \Request::is('*roles*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-lock"></i>
                            <p>Perfis de Usuário</p>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="#" class="nav-link {{ \Request::is('*logout*') ? 'active' : '' }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            @endif
        @else
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link {{ \Request::is('*login*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-sign-in-alt"></i>
                    <p>Login</p>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link {{ \Request::is('*register*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-plus"></i>
                    <p>Cadastro</p>
                </a>
            </li>
        @endif
    </ul>
</nav>