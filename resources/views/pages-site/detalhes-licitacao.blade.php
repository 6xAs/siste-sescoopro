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

                <div class="panel-body">
                    <!-- Form Inserir Licitação -->
                    <div class="col-12">
                        <a href="/licitacoes"><button type="button" class="btn btn-primary"> <i class="fa fa-caret-left"></i> VOLTAR  </button></a>

                    </div>
                    <br>

                    <div class="form-group">
                        <h3>{!! Form::label('number_process', 'Número do Processo:* ' ) !!}</h3>
                        <h4>{{$licitacao->number_process}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('modalidade', 'Modalidade: * ' ) !!}</h3>
                        <h4>{{$licitacao->modalidade}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('edital', 'Edital:* ' ) !!}</h3>
                        <h4>{{$licitacao->edital}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('objeto', 'Objeto:* ' ) !!}</h3>
                        <h4>{{$licitacao->objeto}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('status', 'Status: * ' ) !!}</h3>
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
                        <h3>{!! Form::label('email', 'Emial:* ' ) !!}</h3>
                        <h4>{{$licitacao->email}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('hora_abertura', 'Hora Abertura:* ' ) !!}</h3>
                        <h4>{{$licitacao->hora_abertura}}</h4>
                    </div>
                    <div class="form-group">
                    <div class="form-group">
                        <h3>{!! Form::label('data', 'Data:* ' ) !!}</h3>
                        <h4>{{date('d/m/y', strtotime($licitacao->data))}}</h4>
                    </div>

                        <table class="table table-condensed">
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
                                        <h3>{!! Form::label('data_file_01', 'Data: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_01))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_01', 'Arquivo 01:  ' ) !!}</h3>
                                        <div class="">
                                             <a href="/../document-licitacao/{{ $licitacao->file_01 }}" target="_blank">DOWNLOAD</a>

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
                                        <h3>{!! Form::label('data_file_02', 'Data: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_02))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_02', 'Arquivo 02: ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_02 }}" target="_blank">DOWNLOAD</a>

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
                                        <h3>{!! Form::label('data_file_03', 'Data: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_03))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_03', 'Arquivo 03: ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_03 }}" target="_blank">DOWNLOAD</a>
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
                                        <h3>{!! Form::label('data_file_04', 'Data: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_04))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_04', 'Arquivo 04: ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_04 }}" target="_blank">DOWNLOAD</a>
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
                                        <h3>{!! Form::label('data_file_05', 'Data: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_05))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_05', 'Arquivo 05: ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_05 }}" target="_blank">DOWNLOAD</a>

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
                                        <h3>{!! Form::label('data_file_06', 'Data: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_06))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_06', 'Arquivo 06:  ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_06 }}" target="_blank">DOWNLOAD</a>
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
                                        <h3>{!! Form::label('data_file_07', 'Data: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_07))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_07', 'Arquivo 07:  ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_07 }}" target="_blank">DOWNLOAD</a>
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
                                        <h3>{!! Form::label('data_file_08', 'Data: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_08))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_08', 'Arquivo 08: ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_08 }}" target="_blank">DOWNLOAD</a>
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
                                        <h3>{!! Form::label('data_file_09', 'Data: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_09))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_09', 'Arquivo 09: ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_09 }}" target="_blank">DOWNLOAD</a>
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
                                        <h3>{!! Form::label('data_file_010', 'Data: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_010))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_010', 'Arquivo 010:  ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_010 }}" target="_blank">DOWNLOAD</a>

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
                                        <h3>{!! Form::label('data_file_011', 'Data: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_011))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_011', 'Arquivo 011:  ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_011 }}" target="_blank">DOWNLOAD</a>
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
                                        <h3>{!! Form::label('data_file_012', 'Data: ' ) !!}</h3>
                                        <h4>{{date('d/m/y', strtotime($licitacao->data_file_012))}}</h4>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_012', 'Arquivo 012:  ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-licitacao/{{ $licitacao->file_012 }}" target="_blank">DOWNLOAD</a>
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
