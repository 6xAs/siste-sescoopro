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
                    {!! Form::model($licitacao,['route' =>  ['licitacao.update', $licitacao->id], 'class' => '','method'=>'PUT','files'=>true]) !!}                    {{ csrf_field() }}
                    <div class="form-group">
                        {!! Form::label('number_process', 'Número do Processo:* ' ) !!}
                        {!! Form::number('number_process', null, ['class' => 'form-control', 'placeholder' => 'Nome do Processo'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('modalidade', 'Modalidade: * ' ) !!}
                        {!! Form::select('modalidade',
                         [
                             'Pregão'                       => 'Pregão',
                             'concorrência'                 => 'concorrência',
                             'Tomada de Preços'             => 'Tomada de Preços',
                             'Convite'                      => 'Convite',
                             'Concurso'                     => 'Concurso',
                             'Leilão'                       => 'Leilão',

                         ], null, ['class' => 'form-control','placeholder' => 'Selecionar Modalidade']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('edital', 'Edital:* ' ) !!}
                        {!! Form::text('edital', null, ['class' => 'form-control', 'placeholder' => 'Edital'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('objeto', 'Objeto:* ' ) !!}
                        {!! Form::textarea('objeto', null, ['class' => 'form-control', 'placeholder' => 'Descreva o Objeto'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('status', 'Status: * ' ) !!}
                        {!! Form::select('status',
                         [
                             'Em Andamento'                        => 'Em Andamento',
                             'Concluído'                           => 'Concluído',
                             'Cancelado'                           => 'Cancelado',
                             'Anulado'                             => 'Anulado'

                         ], null, ['class' => 'form-control','placeholder' => 'Escolha o status da licitação']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('telefone_fixo', 'Telefone Fixo: ' ) !!}
                        {!! Form::text('telefone_fixo', null, ['class' => 'form-control', 'placeholder' => '(00)3333-3333'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('telefone_celular', 'Telefone Celular: ' ) !!}
                        {!! Form::text('telefone_celular', null, ['class' => 'form-control', 'placeholder' => '(00)0000-0000'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Emial:* ' ) !!}
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ex:mail@mail.com'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('hora_abertura', 'Hora Abertura:* ' ) !!}
                        {!! Form::time('hora_abertura', null, ['class' => 'form-control', 'placeholder' => 'Ex:00:00'] ) !!}
                    </div>
                    <div class="form-group">
                    <div class="form-group">
                        {!! Form::label('data', 'Data:* ' ) !!}
                        {!! Form::date('data', null, ['class' => 'form-control', 'placeholder' => '00/00/00'] ) !!}
                    </div>

                        <table class="table table-condensed">
                            <!-- File_01 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_01', 'Nome Arquivo 01:* ' ) !!}
                                        {!! Form::text('name_file_01', null, ['class' => 'form-control', 'placeholder' => 'Nome do Arquivo 01'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_01', 'Data:* ' ) !!}
                                        {!! Form::date('data_file_01', null, ['class' => 'form-control', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_01', 'Arquivo 01: * ' ) !!}
                                        <div class="">
                                            {!! Form::file('file_01', null, ['class' => 'form-control', 'placeholder' => 'File 01'] ) !!}
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_02 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_02', 'Nome Arquivo 02:* ' ) !!}
                                        {!! Form::text('name_file_02', null, ['class' => 'form-control', 'placeholder' => 'Nome do Arquivo 02'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_02', 'Data:* ' ) !!}
                                        {!! Form::date('data_file_02', null, ['class' => 'form-control', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_02', 'Arquivo 02: * ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_02" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_03 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_03', 'Nome Arquivo 03:* ' ) !!}
                                        {!! Form::text('name_file_03', null, ['class' => 'form-control', 'placeholder' => 'Nome do Arquivo 03'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_03', 'Data:* ' ) !!}
                                        {!! Form::date('data_file_03', null, ['class' => 'form-control', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_03', 'Arquivo 03: * ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_03" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_04 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_04', 'Nome Arquivo 04:* ' ) !!}
                                        {!! Form::text('name_file_04', null, ['class' => 'form-control', 'placeholder' => 'Nome do Arquivo 04'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_04', 'Data:* ' ) !!}
                                        {!! Form::date('data_file_04', null, ['class' => 'form-control', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_04', 'Arquivo 04: * ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_04" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_05 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_05', 'Nome Arquivo 05:* ' ) !!}
                                        {!! Form::text('name_file_05', null, ['class' => 'form-control', 'placeholder' => 'Nome do Arquivo 05'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_05', 'Data:* ' ) !!}
                                        {!! Form::date('data_file_05', null, ['class' => 'form-control', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_05', 'Arquivo 05: * ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_05" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_06 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_06', 'Nome Arquivo 06:* ' ) !!}
                                        {!! Form::text('name_file_06', null, ['class' => 'form-control', 'placeholder' => 'Nome do Arquivo 06'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_06', 'Data:* ' ) !!}
                                        {!! Form::date('data_file_06', null, ['class' => 'form-control', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_06', 'Arquivo 06: * ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_06" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_07 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_07', 'Nome Arquivo 07:* ' ) !!}
                                        {!! Form::text('name_file_07', null, ['class' => 'form-control', 'placeholder' => 'Nome do Arquivo 07'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_07', 'Data:* ' ) !!}
                                        {!! Form::date('data_file_07', null, ['class' => 'form-control', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_07', 'Arquivo 07: * ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_07" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_08 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_08', 'Nome Arquivo 08:* ' ) !!}
                                        {!! Form::text('name_file_08', null, ['class' => 'form-control', 'placeholder' => 'Nome do Arquivo 08'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_08', 'Data:* ' ) !!}
                                        {!! Form::date('data_file_08', null, ['class' => 'form-control', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_08', 'Arquivo 08: * ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_08" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>
                            <!-- File_09 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_09', 'Nome Arquivo 09:* ' ) !!}
                                        {!! Form::text('name_file_09', null, ['class' => 'form-control', 'placeholder' => 'Nome do Arquivo 09'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_09', 'Data:* ' ) !!}
                                        {!! Form::date('data_file_09', null, ['class' => 'form-control', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_09', 'Arquivo 09: * ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_09" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_010 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_010', 'Nome Arquivo 010:* ' ) !!}
                                        {!! Form::text('name_file_010', null, ['class' => 'form-control', 'placeholder' => 'Nome do Arquivo 010'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_010', 'Data:* ' ) !!}
                                        {!! Form::date('data_file_010', null, ['class' => 'form-control', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_010', 'Arquivo 010: * ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_010" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_011 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_011', 'Nome Arquivo 011:* ' ) !!}
                                        {!! Form::text('name_file_011', null, ['class' => 'form-control', 'placeholder' => 'Nome do Arquivo 011'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_011', 'Data:* ' ) !!}
                                        {!! Form::date('data_file_011', null, ['class' => 'form-control', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_011', 'Arquivo 011: * ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_011" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_012 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_012', 'Nome Arquivo 012:* ' ) !!}
                                        {!! Form::text('name_file_012', null, ['class' => 'form-control', 'placeholder' => 'Nome do Arquivo 012'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_012', 'Data:* ' ) !!}
                                        {!! Form::date('data_file_012', null, ['class' => 'form-control', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_012', 'Arquivo 012: * ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_012" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>

                            </tr>

                        </table>


                        {!!Form::submit('INSERIR', ['class' => 'btn btn-primary'])!!}

                    {!! Form::close() !!}
                </div>
                @include('pages-panel.modal-delete-licitacao')
               <div class="text-fight">
                   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o"></i> Deletar este documento</button>

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
