@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@include('scripts.script_formselect')

@section('title', 'Detalhes do Curso')

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

                <div class="panel-body">
                    <!-- Form Inserir Licitação -->
                    <div class="col-12">
                        <button type="button" class="btn btn-primary"> GERAR PDF </button>

                    </div>
                    <br>

                    <div class="form-group">
                        <h3>{!! Form::label('curso', 'Curso: ' ) !!}</h3>
                        <h4>{{$curso->curso}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('instrutor', 'Instrutor: ' ) !!}</h3>
                        <h4>{{$curso->instrutor}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('carga_h', 'Carga Horária:  ' ) !!}</h3>
                        <h4>{{$curso->carga_h}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('horario', 'Horário: ' ) !!}</h3>
                        <h4>{{$curso->horario}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('cidade', 'Cidade: ' ) !!}</h3>
                        <h4>{{$curso->cidade}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('local', 'Local: ' ) !!}</h3>
                        <h4>{{$curso->local}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('publico_alvo', 'Público Alvo: ' ) !!}</h3>
                        <h4>{{$curso->publico_alvo}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('conteudo_programatico', 'Conteúdo Programático: ' ) !!}</h3>
                        <h4>{{$curso->conteudo_programatico}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('data', 'Data: ' ) !!}</h3>
                        <h4>{{ date('d/m/y', strtotime($curso->data)) }}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('data', 'Vídeo: ' ) !!}</h3>
                        <iframe width="268" height="180" src="{{$curso->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>

                        <table class="table table-condensed">
                            <!-- File_01 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_01', 'Arquivo 01: * ' ) !!}</h3>
                                        <div class="">
                                             <a href="/../cursos/{{ $curso->file_01 }}" target="_blank">{{ $curso->file_01 }}</a>

                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_02 -->
                            <tr>

                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_02', 'Arquivo 02: * ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../cursos/{{ $curso->file_02 }}" target="_blank">{{ $curso->file_02 }}</a>

                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_03 -->
                            <tr>

                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_03', 'Arquivo 03: * ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../cursos/{{ $curso->file_03 }}" target="_blank">{{ $curso->file_03 }}</a>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                        </table>
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
