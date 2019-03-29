@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@section('title', 'Listar Instrutor')
<script type="text/javascript">
    var date = new DateUtil("dd/MM/yyyy");
</script>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="text-right Right aligned text">

                <a href="{{route('page-inserir-notice')}}">

                    <button type="button" class="btn btn-primary">Novo Instrutor</button>
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
                                  <a href="page-inserir-instrutor" class="alert-link">Inserir outro Instrutor?</a>
                            </div>
                        @endif


                        	<div class="row">

                                <table class="table table-striped table-bordered" id="listar" >
                                          <thead>
                                            <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">Nome</th>
                                              <th scope="col">Email</th>
                                              <th scope="col">Experiência Profissional</th>
                                              <th scope="col">Formação</th>
                                              <th scope="col">Ações</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                              @foreach( $instrutor as $instrutor )

                                                  <tr>
                                                    <th scope="row">{{$instrutor->id}}</th>
                                                    <td>{{$instrutor->name}}</td>
                                                    <td>{{$instrutor->email}}</td>
                                                    <td>{{$instrutor->experiency}}</td>
                                                    <td>{{$instrutor->formation}}</td>
                                                    <td> <a href="{{URL::to('instrutor/'.$instrutor->id.'/edit')}}"><h3><i class="lnr lnr-pencil"></i></h3></a> </td>
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
