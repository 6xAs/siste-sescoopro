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
                    <h1 class="panel-title">Bem vindo ao painel de controle do site!</h1>
                    <p class="panel-subtitle">Data: </p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="metric">

                                <span class="icon"><i class="lnr lnr-rocket"></i></span>
                                <p>
                                    <span class="number">00</span>
                                    <span class="title">Notícias</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                                <p>
                                    <span class="number">203</span>
                                    <span class="title">Sales</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-eye"></i></span>
                                <p>
                                    <span class="number">274,678</span>
                                    <span class="title">Visits</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                <p>
                                    <span class="number">35%</span>
                                    <span class="title">Conversions</span>
                                </p>
                            </div>
                        </div>
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
