@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

<!-- Content Home -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h1 class="">Bem vindo!</h1>
                    <p class="">Hoje: {{ $dateDay }}</p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <!-- Blocos -->
                        <a href="{{route('page-listar-banner')}}">
                            <div class="col-md-3">
                                <div class="metric">

                                    <span class="icon"><i class="fa fa-bookmark "></i></span>
                                    <p>
                                        <span class="number">Banners</span>
                                        <span class="title">{{$banner_count}}</span>
                                    </p>
                                </div>
                            </div>

                        </a>
                        <a href="{{route('page-listar-notice')}}">
                            <div class="col-md-3">
                                <div class="metric">

                                    <span class="icon"><i class="fa fa-address-card"></i></span>
                                    <p>
                                        <span class="number">Notícias</span>
                                        <span class="title">{{$notice_count}}</span>
                                    </p>
                                </div>
                            </div>

                        </a>
                        <a href="{{route('page-listar-transparency')}}">
                            <div class="col-md-3">
                                <div class="metric">

                                    <span class="icon"><i class="fa fa-address-book "></i></span>
                                    <p>
                                        <span class="number">Transp.</span>
                                        <span class="title">{{$transparency_count}}</span>
                                    </p>
                                </div>
                            </div>

                        </a>
                        <a href="{{route('page-listar-licitacao')}}">
                            <div class="col-md-3">
                                <div class="metric">

                                    <span class="icon"><i class="fa fa-cart-plus "></i></span>
                                    <p>
                                        <span class="number">Licitação</span>
                                        <span class="title">{{$licitacao_count}}</span>
                                    </p>
                                </div>
                            </div>

                        </a>
                        <a href="{{route('page-listar-curso')}}">
                            <div class="col-md-3">
                                <div class="metric">

                                    <span class="icon"><i class="fa fa-book "></i></span>
                                    <p>
                                        <span class="number">Cursos</span>
                                        <span class="title">{{$curso_count}}</span>
                                    </p>
                                </div>
                            </div>

                        </a>
                        <a href="{{route('page-listar-instrutor')}}">
                            <div class="col-md-3">
                                <div class="metric">

                                    <span class="icon"><i class="fa fa-book "></i></span>
                                    <p>
                                        <span class="number">Instrutor</span>
                                        <span class="title">{{$instrutor_count}}</span>
                                    </p>
                                </div>
                            </div>

                        </a>

                        <a href="{{route('page-listar-cooperativa')}}">
                            <div class="col-md-3">
                                <div class="metric">

                                    <span class="icon"><i class="fa fa-users "></i></span>
                                    <p>
                                        <span class="number">List Coop</span>
                                        <span class="title">{{$cooperativa_count}}</span>
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a href="{{route('page-listar-proSeletivo')}}">
                            <div class="col-md-3">
                                <div class="metric">

                                    <span class="icon"><i class="fa fa-thumbs-up "></i></span>
                                    <p>
                                        <span class="number">Pro Seletivo</span>
                                        <span class="title">{{$proSeletivo_count}}</span>
                                    </p>
                                </div>
                            </div>

                        </a>



                        <!--// Blocos -->

                    </div>

                </div>
            </div>
            <!-- END OVERVIEW -->

                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END Content Home -->





@include('template-panel.footer')
