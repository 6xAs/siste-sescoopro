@include('template-panel.head')

@include('template-panel.head')

@include('template-site.topo2')

<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading">

                    <h3 class="panel-title">@yield('title')</h3>
                    @if(count($errors) > 0)
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach($errors->all() as $error)

                                      <p><b>{!!$error!!}</b></p>

                                  @endforeach
                              </ul>
                          </div>
              @endif

                </div>
                <div class="container py-md-8 mt-md-8">
                <h2 class="heading-agileinfo">Documentos Transparência<span></span></h2>
                </div>

                <div class="panel-body">
                    <!-- Form Inserir Licitação -->
                    <div class="col-12">
                        <a href="/"><button type="button" class="btn btn-primary"> VOLTAR AO SITE </button></a>

                    </div>
                    <br>
                    <div class="row">

                        <table class="table table-striped" id="listar" >
                                  <thead>
                                    <tr>
                                      <th scope="col">#Cod-Doc</th>
                                      <th scope="col">Tipo Documento</th>
                                      <th scope="col">Subtipo Documento</th>
                                      <th scope="col">Nome Documento</th>
                                      <th scope="col">Ano</th>
                                      <th scope="col">Vizualizar</th>

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
                                            <td> <a href="{{URL::to('detalhes/'.$transparency->id.'/transparency')}}"><h3><i class="lnr lnr-eye"></i></h3></a></a> </td>
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
