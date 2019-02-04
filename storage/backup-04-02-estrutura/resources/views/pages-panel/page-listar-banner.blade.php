@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Listar Banners</h3>

                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                              <button type="button" class="btn btn-success warning_2" data-dismiss="alert" aria-hidden="true">×</button>
                              {!! Session::get('message') !!}
                              <a href="page-inserir-banner" class="alert-link">Inserir outro Banner?</a>
                        </div>
                    @endif


                	<div class="row">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                            <input name="consulta" id="txt_consulta" placeholder="Consultar" type="text" class="form-control">
                        </div>
                        <table class="table table-striped" id="tabela" class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Nome</th>
                                      <th scope="col">Title</th>
                                      <th scope="col">Link</th>
                                      <th scope="col">Ações</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach( $banner as $banner )

                                          <tr>
                                            <th scope="row">{{$banner->id}}</th>
                                            <td>{{$banner->name}}</td>
                                            <td>{{$banner->title}}</td>
                                            <td>{{$banner->link}}</td>
                                            <td> <a href="#"><h4><i class="lnr lnr-pencil"></i></h4></a> </td>
                                          </tr>

                                      @endforeach

                                  </tbody>
                                  <script>
                                  $('input#txt_consulta').quicksearch('table#tabela tbody tr');
                                  </script>
                        </table>


                	</div>
                </div>

                </div>
            </div>
            <!-- END OVERVIEW -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<div class="clearfix"></div>

@include('template-panel.footer')
