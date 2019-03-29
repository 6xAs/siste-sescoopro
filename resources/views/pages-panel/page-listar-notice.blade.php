@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@section('title', 'Listar Notícia')
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

                    <button type="button" class="btn btn-primary">Nova Notícia</button>
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
                                  <a href="page-inserir-notice" class="alert-link">Inserir outra Notícia?</a>
                            </div>
                        @endif


                        	<div class="row">

                                <table class="table table-striped table-bordered" id="listar" >
                                          <thead>
                                            <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">Título</th>
                                              <th scope="col">Subtítulo</th>
                                              <th scope="col">Editoria</th>
                                              <th scope="col">Data</th>
                                              <th scope="col">Principal Imagem</th>
                                              <th scope="col">Ações</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                              @foreach( $notice as $notice )

                                                  <tr>
                                                    <th scope="row">{{$notice->id}}</th>
                                                    <td>{{$notice->title}}</td>
                                                    <td>{{$notice->subtitle}}</td>
                                                    <td>{{$notice->editoria}}</td>
                                                    <td>{{date('d/m/y', strtotime($notice->data))}}</td>
                                                    <td><img class="img-responsive " src="images-notices/{{$notice->image_01}}" width="300" height="125" alt="" /></td>
                                                    <td> <a href="{{URL::to('notice/'.$notice->id.'/edit')}}"><h3><i class="lnr lnr-pencil"></i></h3></a> </td>
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
