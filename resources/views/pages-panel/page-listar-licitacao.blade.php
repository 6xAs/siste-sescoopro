@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@section('title', 'Listar Licitação')
<script type="text/javascript">
    var date = new DateUtil("dd/MM/yyyy");
</script>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">@yield('title')</h3>

                </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                  <button type="button" class="btn btn-success warning_2" data-dismiss="alert" aria-hidden="true">×</button>
                                  {!! Session::get('message') !!}
                                  <a href="page-inserir-licitacao" class="alert-link">Inserir outro Documento?</a>
                            </div>
                        @endif


                        	<div class="row">

                                <table class="table table-striped" id="listar" >
                                          <thead>
                                            <tr>
                                              <th scope="col">#Codid-Doc</th>
                                              <th scope="col">Número Processo </th>
                                              <th scope="col">Modalidade</th>
                                              <th scope="col">Edital</th>
                                              <th scope="col">Data</th>
                                              <th scope="col">Status</th>
                                              <th scope="col">Editar</th>
                                              <th scope="col">Vizualizar</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                              @foreach( $licitacao as $licitacao )

                                                  <tr>
                                                    <th scope="row">{{$licitacao->id}}</th>
                                                    <td>{{$licitacao->number_process}}</td>
                                                    <td>{{$licitacao->modalidade}}</td>
                                                    <td>{{$licitacao->edital}}</td>
                                                    <td>{{date('d/m/y', strtotime($licitacao->data))}}</td>
                                                    <td>{{$licitacao->status}}</td>
                                                    <td> <a href="{{URL::to('licitacao/'.$licitacao->id.'/edit')}}"><h3><i class="lnr lnr-pencil"></i></h3></a> </td>
                                                    <td> <a href="{{URL::to('showlicitacao/'.$licitacao->id.'/show')}}"><h3><i class="lnr lnr-eye"></i></h3></a> </td>
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
