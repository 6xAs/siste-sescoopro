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
                    <h1 class="">Bem a área de cursos!</h1>
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
                                        <span class="number">Meus Cursos</span>
                                        <span class="title"></span>
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
