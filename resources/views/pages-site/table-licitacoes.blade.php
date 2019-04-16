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
                <h2 class="heading-agileinfo">Documentos de Licitações<span></span></h2>
                </div>
                <div class="panel-body">
                    <!-- Form Inserir Licitação -->
                    <div class="col-12">
                        <a href="/"><button type="button" class="btn btn-primary"> VOLTAR AO SITE </button></a>

                    </div>
                    <br>
                    <table class="table table-striped" id="listar" >
                              <thead>
                                <tr>
                                  <th scope="col">Número Processo</th>
                                  <th scope="col">Modalidade</th>
                                  <th scope="col">ano</th>
                                  <th scope="col">Edital</th>
                                  <th scope="col">Data</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Vizualizar</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach( $licitacao as $licitacao )

                                      <tr>
                                        <td>{{$licitacao->number_process}}</td>
                                        <td>{{$licitacao->modalidade}}</td>
                                        <td>{{$licitacao->ano}}</td>
                                        <td>{{$licitacao->edital}}</td>
                                        <td>{{date('d/m/y', strtotime($licitacao->data))}}</td>
                                        <td>{{$licitacao->status}}</td>
                                        <td> <a href="{{URL::to('detalhes/'.$licitacao->id.'/licitacao')}}"><h3><i class="lnr lnr-eye"></i></h3></a> </td>
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
