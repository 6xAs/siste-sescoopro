@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@section('title', 'Listar Processo Seletivo')
<script type="text/javascript">
    var date = new DateUtil("dd/MM/yyyy");
</script>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="text-right Right aligned text">

                <a href="{{route('page-inserir-proSeletivo')}}">

                    <button type="button" class="btn btn-primary">Novo Documento</button>
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
                                  <a href="page-inserir-proSeletivo" class="alert-link">Inserir outro Documento?</a>
                            </div>
                        @endif

                        	<div class="row">

                                <table class="table table-striped table-bordered" id="listar" >
                                          <thead>
                                            <tr>
                                              <th scope="col">#Cod-Doc</th>
                                              <th scope="col">Edital</th>
                                              <th scope="col">Título</th>
                                              <th scope="col">Subtítulo</th>
                                              <th scope="col">Data</th>
                                              <th scope="col">Arquivo</th>
                                              <th scope="col">Vizualizar</th>
                                              <th scope="col">Editar</th>

                                            </tr>
                                          </thead>
                                          <tbody>
                                              @foreach( $proSeletivo as $proSeletivo )

                                                  <tr>
                                                    <th scope="row">{{$proSeletivo->id}}</th>
                                                    <td>{{$proSeletivo->number_edital}}</td>
                                                    <td>{{$proSeletivo->title}}</td>
                                                    <td>{{$proSeletivo->subtitle}}</td>
                                                    <td>{{date('d/m/y', strtotime($proSeletivo->data))}}</td>
                                                    <td> <a href="/../processo-seletivo/{{$proSeletivo->file_01}}" target="_blank">{{$proSeletivo->file_01}}</a> </td>
                                                    <td> <a href="{{URL::to('showproSeletivo/'.$proSeletivo->id.'/show')}}"><h3><i class="lnr lnr-eye"></i></h3></a></a> </td>
                                                    <td> <a href="{{URL::to('proSeletivo/'.$proSeletivo->id.'/edit')}}"><h3><i class="lnr lnr-pencil"></i></h3></a> </td>
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
