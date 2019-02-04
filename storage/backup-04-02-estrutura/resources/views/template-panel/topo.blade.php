
<body>
	<!-- WRAPPER -->
	<div id="wrapper">
    <!-- TOPO  -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="brand">

			<a href="home-panel"><img src="assets/img/sescoop-ocb.png" alt="Klorofil Logo" class="img-responsive logo"></a>

        </div>
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
            </div>
            <form class="navbar-form navbar-left">
                <div class="input-group">
                    <input type="text" value="" class="form-control" placeholder="Search dashboard...">
                    <span class="input-group-btn"><button type="button" class="btn btn-primary">Buscar</button></span>
                </div>
            </form>

            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="lnr lnr-alarm"></i>
                            <span class="badge bg-danger">5</span>
                        </a>
                        <ul class="dropdown-menu notifications">
                            <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Avisos de modificações</a></li>
                            <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>Avisos de modificações</a></li>
                            <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Avisos de modificações</a></li>
                            <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Avisos de modificaçõesr</a></li>
                            <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Avisos de modificações</a></li>
                            <li><a href="#" class="more">Ver todos os avisos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Ajuda</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Cadastro de Noticias</a></li>
                            <li><a href="#">Transparência</a></li>
                            <li><a href="#">Cadastro de Licitações</a></li>
                            <li><a href="#">Adm de Participantes</a></li>
                        </ul>
                    </li>

					<!-- Authentication Links -->
					@if (Auth::guest())
						<li><a href="{{ route('login') }}">Login</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>

							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="{{ route('logout') }}"
										onclick="event.preventDefault();
												 document.getElementById('logout-form').submit();">
										Logout
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
								</li>
							</ul>
						</li>
					@endif
            </div>
        </div>
    </nav>
    <!--// TOPO  -->
