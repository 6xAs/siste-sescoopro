@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@include('template-panel.form-mascara')

@include('scripts.script_formselectLicitacao')

@section('title', 'Inserir Licitação')

<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">@yield('title')</h3>
                    <p class="text-primary">ATENÇÃO: Campos com * são obrigatórios</p>
                </div>
                    @if(count($errors) > 0)
                      <div class="alert alert-danger">
                          <ul>
                              @foreach($errors->all() as $error)

                                  <p><b>{!!$error!!}</b></p>

                              @endforeach
                          </ul>
                      </div>
                  @endif

                <div class="panel-body">
                    <!-- Form Inserir Licitação -->
                    {!! Form::open(['url' => 'input-licitacao',  'files' => true, 'method' => 'post']) !!}
                    {{ csrf_field() }}
                    <div class="form-group">
                        {!! Form::label('ano', 'Ano: * ' ) !!}
                        {!! Form::select('ano',
                         [
                             '2019'    =>  '2019',
                             '2018'    =>  '2018',
                             '2017'    =>  '2017',
                             '2016'    =>  '2016',
                             '2015'    =>  '2015',


                         ], null, ['class' => 'form-control input-lg', 'placeholder' => 'Selecione o Ano', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('modalidade', 'Modalidade: ' ) !!}
                        {!! Form::select('modalidade',
                         [
                             'Convite'              =>  'Convite',
                             'Dispensa'             =>  'Dispensa',
                             'Inexigibilidade'      =>  'Inexigibilidade',
                             'Pregão'               =>  'Pregão',


                         ], null, ['class' => 'form-control input-lg', 'placeholder' => 'Modalidade', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('edital', 'Edital:* ' ) !!}
                        {!! Form::text('edital', null, ['class' => 'form-control input-lg', 'placeholder' => 'Edital', 'required' => 'required'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('tipo_licitacao', 'Tipo de Licitação: * ' ) !!}
                        {!! Form::select('tipo_licitacao',
                         [
                             'Menor preço por item'         => 'Menor preço por item',
                             'Menor preço por lote'         => 'Menor preço por lote',
                             'Menor preço global'           => 'Menor preço global',


                         ], null, ['class' => 'form-control input-lg','placeholder' => 'Selecionar o tipo de licitação', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('number_process', 'Número do Processo:* ' ) !!}
                        {!! Form::text('number_process', null, ['class' => 'form-control input-lg', 'placeholder' => 'Número do Processo', 'required' => 'required'] ) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('objeto', 'Objeto:* ' ) !!}
                        {!! Form::textarea('objeto', null, ['class' => 'form-control input-lg', 'id' => 'editor', 'placeholder' => 'Descreva o Objeto...'] ) !!}
                        <script>
                               ClassicEditor
                                   .create( document.querySelector( '#editor' ) )
                                   .catch( error => {
                                       console.error( error );
                                   } );
                         </script>
                    </div>
                    <div class="form-group">
                        {!! Form::label('local', 'Local da Licitação:* ' ) !!}
                        {!! Form::text('local', null, ['class' => 'form-control input-lg', 'placeholder' => 'Descreva o Endereço', 'required' => 'required'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('status', 'Status: * ' ) !!}
                        {!! Form::select('status',
                         [
                             'Em Andamento'                        => 'Em Andamento',
                             'Concluído'                           => 'Concluído',
                             'Cancelado'                           => 'Cancelado',
                             'Anulado'                             => 'Anulado',
                             'Suspenso'                            => 'Suspenso',

                         ], null, ['class' => 'form-control input-lg','placeholder' => 'Escolha o status da licitação', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('telefone_fixo', 'Telefone Fixo: ' ) !!}
                        {!! Form::text('telefone_fixo', null, ['class' => 'form-control input-lg', 'id' => 'telefone', 'placeholder' => '(00)3333-3333'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('telefone_celular', 'Telefone Celular: ' ) !!}
                        {!! Form::text('telefone_celular', null, ['class' => 'form-control input-lg', 'id' => 'celular', 'placeholder' => '(00)0000-0000'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'E-mail:* ' ) !!}
                        {!! Form::text('email', null, ['class' => 'form-control input-lg', 'placeholder' => 'Ex: mail@mail.com', 'required' => 'required'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('data', 'Data de Abertura:* ' ) !!}
                        {!! Form::date('data', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00', 'required' => 'required'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('hora_abertura', 'Hora da Sessão:* ' ) !!}
                        {!! Form::time('hora_abertura', null, ['class' => 'form-control input-lg', 'placeholder' => 'Ex:00:00', 'required' => 'required'] ) !!}
                    </div>
                    <div class="form-group">


                    <table class="table table-striped table-bordered" >
                            <!-- File_01 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_01', 'Nome Arquivo 01: ' ) !!}
                                        {!! Form::text('name_file_01', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 01'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_01', 'Data da Publicação: ' ) !!}
                                        {!! Form::date('data_file_01', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_01', 'Arquivo 01:  ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_01" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_02 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_02', 'Nome Arquivo 02: ' ) !!}
                                        {!! Form::text('name_file_02', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 02'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_02', 'Data da Publicação: ' ) !!}
                                        {!! Form::date('data_file_02', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_02', 'Arquivo 02:  ' ) !!}
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
                                        {!! Form::label('name_file_03', 'Nome Arquivo 03: ' ) !!}
                                        {!! Form::text('name_file_03', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 03'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_03', 'Data da Publicação: ' ) !!}
                                        {!! Form::date('data_file_03', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_03', 'Arquivo 03:  ' ) !!}
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
                                        {!! Form::label('name_file_04', 'Nome Arquivo 04: ' ) !!}
                                        {!! Form::text('name_file_04', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 04'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_04', 'Data da Publicação: ' ) !!}
                                        {!! Form::date('data_file_04', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_04', 'Arquivo 04:  ' ) !!}
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
                                        {!! Form::label('name_file_05', 'Nome Arquivo 05: ' ) !!}
                                        {!! Form::text('name_file_05', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 05'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_05', 'Data da Publicação: ' ) !!}
                                        {!! Form::date('data_file_05', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_05', 'Arquivo 05:  ' ) !!}
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
                                        {!! Form::label('name_file_06', 'Nome Arquivo 06: ' ) !!}
                                        {!! Form::text('name_file_06', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 06'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_06', 'Data da Publicação: ' ) !!}
                                        {!! Form::date('data_file_06', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_06', 'Arquivo 06:  ' ) !!}
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
                                        {!! Form::label('name_file_07', 'Nome Arquivo 07: ' ) !!}
                                        {!! Form::text('name_file_07', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 07'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_07', 'Data da Publicação: ' ) !!}
                                        {!! Form::date('data_file_07', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_07', 'Arquivo 07:  ' ) !!}
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
                                        {!! Form::label('name_file_08', 'Nome Arquivo 08: ' ) !!}
                                        {!! Form::text('name_file_08', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 08'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_08', 'Data da Publicação: ' ) !!}
                                        {!! Form::date('data_file_08', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_08', 'Arquivo 08:  ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_08" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>
                            <!-- File_09 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_09', 'Nome Arquivo 09: ' ) !!}
                                        {!! Form::text('name_file_09', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 09'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_09', 'Data da Publicação: ' ) !!}
                                        {!! Form::date('data_file_09', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_09', 'Arquivo 09:  ' ) !!}
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
                                        {!! Form::label('name_file_010', 'Nome Arquivo 010: ' ) !!}
                                        {!! Form::text('name_file_010', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 010'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_010', 'Data da Publicação: ' ) !!}
                                        {!! Form::date('data_file_010', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_010', 'Arquivo 010:  ' ) !!}
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
                                        {!! Form::label('name_file_011', 'Nome Arquivo 011: ' ) !!}
                                        {!! Form::text('name_file_011', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 011'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_011', 'Data da Publicação: ' ) !!}
                                        {!! Form::date('data_file_011', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_011', 'Arquivo 011:  ' ) !!}
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
                                        {!! Form::label('name_file_012', 'Nome Arquivo 012: ' ) !!}
                                        {!! Form::text('name_file_012', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 012'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_012', 'Data da Publicação: ' ) !!}
                                        {!! Form::date('data_file_012', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_012', 'Arquivo 012:  ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_012" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            <!-- File_013 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_013', 'Nome Arquivo 013: ' ) !!}
                                        {!! Form::text('name_file_013', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 013'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_013', 'Data da Publicação: ' ) !!}
                                        {!! Form::date('data_file_013', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_013', 'Arquivo 013:  ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_013" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            <!-- File_014 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_014', 'Nome Arquivo 014: ' ) !!}
                                        {!! Form::text('name_file_014', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 014'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_014', 'Data da Publicação: ' ) !!}
                                        {!! Form::date('data_file_014', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_014', 'Arquivo 014:  ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_014" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            <!-- File_015 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_015', 'Nome Arquivo 015: ' ) !!}
                                        {!! Form::text('name_file_015', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 015'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_015', 'Data da Publicação: ' ) !!}
                                        {!! Form::date('data_file_015', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_015', 'Arquivo 015:  ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_015" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            <!-- File_016 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_016', 'Nome Arquivo 016: ' ) !!}
                                        {!! Form::text('name_file_016', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 016'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_016', 'Data da Publicação: ' ) !!}
                                        {!! Form::date('data_file_016', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_016', 'Arquivo 016:  ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_016" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            <!-- File_017 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_017', 'Nome Arquivo 017: ' ) !!}
                                        {!! Form::text('name_file_017', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 017'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_017', 'Data da Publicação: ' ) !!}
                                        {!! Form::date('data_file_017', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_017', 'Arquivo 017:  ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_017" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            <!-- File_018 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_018', 'Nome Arquivo 018: ' ) !!}
                                        {!! Form::text('name_file_018', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 018'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_018', 'Data da Publicação: ' ) !!}
                                        {!! Form::date('data_file_018', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_018', 'Arquivo 018:  ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_018" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>
                            <!-- File_019 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_019', 'Nome Arquivo 019: ' ) !!}
                                        {!! Form::text('name_file_019', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 019'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_019', 'Data da Publicação: ' ) !!}
                                        {!! Form::date('data_file_019', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_019', 'Arquivo 019:  ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_019" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            <!-- File_020 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_020', 'Nome Arquivo 020: ' ) !!}
                                        {!! Form::text('name_file_020', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 020'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_020', 'Data da Publicação: ' ) !!}
                                        {!! Form::date('data_file_020', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_020', 'Arquivo 020:  ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_020" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>
                            </tr>

                </table>


                        {!!Form::submit('INSERIR', ['class' => 'btn btn-primary'])!!}


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
