@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@section('title', 'Listar Transparência')
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
                                  <a href="page-inserir-transparency" class="alert-link">Inserir outro Documento?</a>
                            </div>
                        @endif


                        	<div class="row">

                                <table class="table table-striped" id="listar" >
                                          <thead>
                                            <tr>
                                              <th scope="col">#Cod-Doc</th>
                                              <th scope="col">Tipo Documento</th>
                                              <th scope="col">Subtipo Documento</th>
                                              <th scope="col">Nome Documento</th>
                                              <th scope="col">Ano</th>
                                              <th scope="col">Arquivo</th>
                                              <th scope="col">Ações</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                              @foreach( $transparency as $transparency )

                                                  <tr>
                                                    <th scope="row">{{$transparency->id}}</th>
                                                    <td>{{$transparency->docMain}}</td>
                                                    <td>{{$transparency->subDoc}}</td>
                                                    <td>{{$transparency->document_name}}</td>
                                                    <td>{{$transparency->ano}}</td>
                                                    <td> <a href="document-transparency/{{$transparency->file_01}}" target="_blank">DOWNLOAD</a> </td>
                                                    <td> <a href="{{URL::to('transparency/'.$transparency->id.'/edit')}}"><h4><i class="lnr lnr-pencil"></i></h4></a> </td>
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
