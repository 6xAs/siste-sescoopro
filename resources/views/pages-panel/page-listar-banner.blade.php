@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@section('title', 'Listar Banner')

<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="text-right Right aligned text">

                <a href="{{route('page-inserir-banner')}}">

                    <button type="button" class="btn btn-primary">Novo Banner</button>
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
                                  <a href="page-inserir-banner" class="alert-link">Inserir outro Banner?</a>
                            </div>
                        @endif


                        	<div class="row">

                                <table class="table table-striped" id="listar" >
                                          <thead>
                                            <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">Nome</th>
                                              <th scope="col">Title</th>
                                              <th scope="col">Link</th>
                                              <th scope="col">Imagem</th>
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
                                                    <td><img class="img-responsive " src="images-banner/{{$banner->image}}" width="350" height="215" alt="" /></td>
                                                    <td> <a href="{{URL::to('banner/'.$banner->id.'/edit')}}"><h3><i class="lnr lnr-pencil"></i></h3></a> </td>
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
