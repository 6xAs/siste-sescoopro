@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@section('title', 'Listar Curso')
<script type="text/javascript">
    var date = new DateUtil("dd/MM/yyyy");
</script>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="text-right Right aligned text">

                <a href="{{route('page-inserir-curso')}}">

                    <button type="button" class="btn btn-primary">Novo Curso</button>
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
                                  <a href="page-inserir-curso" class="alert-link">Inserir outro Curso?</a>
                            </div>
                        @endif


                        	<div class="row">

                                <table class="table table-striped table-bordered" id="listar" >
                                          <thead>
                                            <tr>
                                              <th scope="col">#Cod-Curso</th>
                                              <th scope="col">Curso</th>
                                              <th scope="col">Instrutor</th>
                                              <th scope="col">Carga Horária</th>
                                              <th scope="col">Horário</th>
                                              <th scope="col">Data</th>
                                              <th scope="col">Cidade</th>
                                              <th scope="col">Local</th>
                                              <th scope="col">Editar</th>
                                              <th scope="col">Visualizar</th>

                                            </tr>
                                          </thead>
                                          <tbody>
                                              @foreach( $curso as $curso )

                                                  <tr>
                                                    <th scope="row">{{$curso->id}}</th>
                                                    <td>{{$curso->curso}}</td>
                                                    <td>{{$curso->instrutor}}</td>
                                                    <td>{{$curso->carga_h}}</td>
                                                    <td>{{$curso->horario}}</td>
                                                    <td>{{ date('d/m/y', strtotime($curso->data)) }}</td>
                                                    <td>{{$curso->cidade}}</td>
                                                    <td>{{$curso->local}}</td>
                                                    <td> <a href="{{URL::to('curso/'.$curso->id.'/edit')}}"><h3><i class="lnr lnr-pencil"></i></h3></a> </td>
                                                    <td> <a href="{{URL::to('showcurso/'.$curso->id.'/show')}}"><h3><i class="lnr lnr-eye"></i></h3></a></a> </td>
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
