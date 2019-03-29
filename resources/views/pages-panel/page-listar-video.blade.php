@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@section('title', 'Listar Vídeo')

<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="text-right Right aligned text">

                <a href="{{route('page-inserir-video')}}">

                    <button type="button" class="btn btn-primary">Novo Vídeo</button>
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
                                  <a href="page-inserir-video" class="alert-link">Inserir outro Vídeo?</a>
                            </div>
                        @endif


                        	<div class="row">

                                <table class="table table-striped table-bordered" id="listar" >
                                          <thead>
                                            <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">Nome</th>
                                              <th scope="col">Vídeo</th>
                                              <th scope="col">Ações</th>

                                            </tr>
                                          </thead>
                                          <tbody>
                                              @foreach( $video as $video )

                                                  <tr>
                                                    <th scope="row">{{$video->id}}</th>
                                                    <td>{{$video->name}}</td>
                                                    <td><iframe width="268" height="180" src="{{$video->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                                                    <td> <a href="{{URL::to('video/'.$video->id.'/edit')}}"><h3><i class="lnr lnr-pencil"></i></h3></a> </td>
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
