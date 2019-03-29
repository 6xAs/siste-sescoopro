@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@section('title', 'Listar Cooperativa')
<script type="text/javascript">
    var date = new DateUtil("dd/MM/yyyy");
</script>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="text-right Right aligned text">

                <a href="{{route('page-inserir-cooperativa')}}">

                    <button type="button" class="btn btn-primary">Nova Cooperativa</button>
                </a>
            </div>
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">@yield('title')</h3>

                </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                  <button type="button" class="btn btn-success warning_2" data-dismiss="alert" aria-hidden="true">×</button>
                                  {!! Session::get('message') !!}
                                  <a href="page-inserir-cooperativa" class="alert-link">Inserir outra Cooperativa?</a>
                            </div>
                        @endif


                        	<div class="row">

                                <table class="table table-striped table-bordered" id="listar" >
                                          <thead>
                                            <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">Cooperativa</th>
                                              <th scope="col">Nome Fantasia</th>
                                              <th scope="col">CNPJ</th>
                                              <th scope="col">Número Registro</th>
                                              <th scope="col">Nome Presidente</th>
                                              <th scope="col">Status</th>
                                              <th scope="col">Ações</th>
                                              <th scope="col">Visualizar</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                              @foreach( $cooperativa as $cooperativa )

                                                  <tr>
                                                    <th>{{$cooperativa->id}}</th>
                                                    <td>{{$cooperativa->nome_cooperativa}}</td>
                                                    <td>{{$cooperativa->nome_fantasia}}</td>
                                                    <td>{{$cooperativa->cnpj}}</td>
                                                    <td>{{$cooperativa->numero_registro}}</td>
                                                    <td>{{$cooperativa->nome_presidente}}</td>
                                                    <td>{{$cooperativa->status_cooperativa}}</td>
                                                    <td> <a href="{{URL::to('cooperativa/'.$cooperativa->id.'/edit')}}"><h3><i class="lnr lnr-pencil"></i></h3></a></td>
                                                    <td> <a href="{{URL::to('showcooperativa/'.$cooperativa->id.'/show')}}"><h3><i class="lnr lnr-eye"></i></h3></a></a> </td>
                                                  </tr>

                                              @endforeach

                                          </tbody>
                                </table>
                                <!-- Script da Tabela -->
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                    $('#listar').DataTable();
                                    } );

                                </script>

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
