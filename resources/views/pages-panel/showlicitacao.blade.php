@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@include('scripts.script_formselect')

@section('title', 'Detalhes Deste Documento - Licitação')

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
                        <h3>{!! Form::label('modalidade', 'Ano:  ' ) !!}</h3>
                        <h4>{{$licitacao->ano}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('modalidade', 'Modalidade:  ' ) !!}</h3>
                        <h4>{{$licitacao->modalidade}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('edital', 'Edital: ' ) !!}</h3>
                        <h4>{{$licitacao->edital}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('tipo_licitacao', 'Tipo de Licitação: ' ) !!}</h3>
                        <h4>{{$licitacao->tipo_licitacao}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('number_process', 'Número do Processo: ' ) !!}</h3>
                        <h4>{{$licitacao->number_process}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('objeto', 'Objeto: ' ) !!}</h3>
                        {!!$licitacao->objeto!!}
                        <script>
                            var data = CKEDITOR.instances.editor.getData();

                            // Your code to save "data", usually through Ajax.
                        </script>

                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('local', 'Local da Licitação: ' ) !!}</h3>
                        <h4>{{$licitacao->local}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('status', 'Status:  ' ) !!}</h3>
                        <h4>{{$licitacao->status}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('telefone_fixo', 'Telefone Fixo: ' ) !!}</h3>
                        <h4>{{$licitacao->telefone_fixo}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('telefone_celular', 'Telefone Celular: ' ) !!}</h3>
                        <h4>{{$licitacao->telefone_celular}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('email', 'E-mail: ' ) !!}</h3>
                        <h4>{{$licitacao->email}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('data', 'Data da Abertura: ' ) !!}</h3>
                        <h4>{{date('d/m/y', strtotime($licitacao->data))}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('hora_abertura', 'Hora da Abertura: ' ) !!}</h3>
                        <h4>{{$licitacao->hora_abertura}}</h4>
                    </div>

                        <table class="table table-striped table-bordered">
                            <!-- File_01 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('name_file_01', 'Nome Arquivo 01: ' ) !!}</h3>
                                        <h4>{{$licitacao->name_file_01}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('data_file_01', 'Data da Publicação: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_01))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_01', 'Arquivo 01:  ' ) !!}</h3>
                                        <div class="">
                                             <a href="/../document-licitacao/{{ $licitacao->file_01 }}" target="_blank">{{ $licitacao->file_01 }}</a>

                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_02 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('name_file_02', 'Nome Arquivo 02: ' ) !!}</h3>
                                        <h4>{{$licitacao->name_file_02}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('data_file_02', 'Data da Publicação: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_02))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_02', 'Arquivo 02: ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_02 }}" target="_blank">{{ $licitacao->file_02 }}</a>

                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_03 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('name_file_03', 'Nome Arquivo 03: ' ) !!}</h3>
                                        <h4>{{$licitacao->name_file_03}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('data_file_03', 'Data da Publicação: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_03))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_03', 'Arquivo 03: ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_03 }}" target="_blank">{{ $licitacao->file_03 }}</a>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_04 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('name_file_04', 'Nome Arquivo 04: ' ) !!}</h3>
                                        <h4>{{$licitacao->name_file_04}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('data_file_04', 'Data da Publicação: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_04))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_04', 'Arquivo 04: ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_04 }}" target="_blank">{{ $licitacao->file_04 }}</a>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_05 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('name_file_05', 'Nome Arquivo 05: ' ) !!}</h3>
                                        <h4>{{$licitacao->name_file_05}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('data_file_05', 'Data da Publicação: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_05))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_05', 'Arquivo 05: ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_05 }}" target="_blank">{{ $licitacao->file_05 }}</a>

                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_06 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('name_file_06', 'Nome Arquivo 06: ' ) !!}</h3>
                                        <h4>{{$licitacao->name_file_06}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('data_file_06', 'Data da Publicação: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_06))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_06', 'Arquivo 06:  ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_06 }}" target="_blank">{{ $licitacao->file_06 }}</a>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_07 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('name_file_07', 'Nome Arquivo 07: ' ) !!}</h3>
                                        <h4>{{$licitacao->name_file_07}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('data_file_07', 'Data da Publicação: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_07))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_07', 'Arquivo 07:  ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_07 }}" target="_blank">{{ $licitacao->file_07 }}</a>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_08 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('name_file_08', 'Nome Arquivo 08: ' ) !!}</h3>
                                        <h4>{{$licitacao->name_file_08}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('data_file_08', 'Data da Publicação: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_08))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_08', 'Arquivo 08: ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_08 }}" target="_blank">{{ $licitacao->file_08 }}</a>
                                        </div>
                                    </div>

                                </td>
                            <!-- File_09 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('name_file_09', 'Nome Arquivo 09: ' ) !!}</h3>
                                        <h4>{{$licitacao->name_file_09}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('data_file_09', 'Data da Publicação: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_09))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_09', 'Arquivo 09: ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_09 }}" target="_blank">{{ $licitacao->file_09 }}</a>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_010 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('name_file_010', 'Nome Arquivo 010: ' ) !!}</h3>
                                        <h4>{{$licitacao->name_file_010}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('data_file_010', 'Data da Publicação: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_010))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_010', 'Arquivo 010:  ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_010 }}" target="_blank">{{ $licitacao->file_010 }}</a>

                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_011 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('name_file_011', 'Nome Arquivo 011: ' ) !!}</h3>
                                        <h4>{{$licitacao->name_file_011}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('data_file_011', 'Data da Publicação: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_011))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_011', 'Arquivo 011:  ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_011 }}" target="_blank">{{ $licitacao->file_011 }}</a>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_012 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('name_file_012', 'Nome Arquivo 012: ' ) !!}</h3>
                                        <h4>{{$licitacao->name_file_012}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('data_file_012', 'Data da Publicação: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_012))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_012', 'Arquivo 012:  ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_012 }}" target="_blank">{{ $licitacao->file_012 }}</a>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_013 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('name_file_013', 'Nome Arquivo 013: ' ) !!}</h3>
                                        <h4>{{$licitacao->name_file_013}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('data_file_013', 'Data da Publicação: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_013))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_013', 'Arquivo 013:  ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_013 }}" target="_blank">{{ $licitacao->file_012 }}</a>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_014 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('name_file_014', 'Nome Arquivo 014: ' ) !!}</h3>
                                        <h4>{{$licitacao->name_file_014}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('data_file_014', 'Data da Publicação: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_014))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_014', 'Arquivo 014:  ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_014 }}" target="_blank">{{ $licitacao->file_012 }}</a>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_015 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('name_file_015', 'Nome Arquivo 015: ' ) !!}</h3>
                                        <h4>{{$licitacao->name_file_015}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('data_file_015', 'Data da Publicação: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_015))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_015', 'Arquivo 015:  ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_015 }}" target="_blank">{{ $licitacao->file_012 }}</a>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_016 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('name_file_016', 'Nome Arquivo 016: ' ) !!}</h3>
                                        <h4>{{$licitacao->name_file_016}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('data_file_016', 'Data da Publicação: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_016))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_016', 'Arquivo 016:  ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_016 }}" target="_blank">{{ $licitacao->file_012 }}</a>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_017 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('name_file_017', 'Nome Arquivo 017: ' ) !!}</h3>
                                        <h4>{{$licitacao->name_file_017}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('data_file_017', 'Data da Publicação: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_017))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_017', 'Arquivo 017:  ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_017 }}" target="_blank">{{ $licitacao->file_012 }}</a>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_018 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('name_file_018', 'Nome Arquivo 018: ' ) !!}</h3>
                                        <h4>{{$licitacao->name_file_018}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('data_file_018', 'Data da Publicação: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_018))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_018', 'Arquivo 018:  ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_018 }}" target="_blank">{{ $licitacao->file_012 }}</a>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_019 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('name_file_019', 'Nome Arquivo 019: ' ) !!}</h3>
                                        <h4>{{$licitacao->name_file_019}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('data_file_019', 'Data da Publicação: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_019))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_019', 'Data da Publicação:  ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_019 }}" target="_blank">{{ $licitacao->file_012 }}</a>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_020 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('name_file_020', 'Nome Arquivo 020: ' ) !!}</h3>
                                        <h4>{{$licitacao->name_file_020}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('data_file_020', 'Data da Publicação: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_020))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_020', 'Arquivo 020:  ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_020 }}" target="_blank">{{ $licitacao->file_012 }}</a>
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
