@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@include('template-panel.form-mascara')

@include('scripts.script_formselectLicitacao')

@section('title', 'Inserir Patrimônio')

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
                    {!! Form::open(['url' => 'input-patrimonio',  'files' => true, 'method' => 'post']) !!}
                    {{ csrf_field() }}
                    <div class="form-group">
                        {!! Form::label('nome_patrimonio', 'Nome Patrimônio:* ' ) !!}
                        {!! Form::text('nome_patrimonio', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome patrimônio', 'required' => 'required'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('num_patrimonio', 'Número Patrimônio:* ' ) !!}
                        {!! Form::number('num_patrimonio', null, ['class' => 'form-control input-lg', 'placeholder' => 'Descreva o número deste patrimônio', 'required' => 'required'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('marca', 'Marca do Produto(objeto):* ' ) !!}
                        {!! Form::text('marca', null, ['class' => 'form-control input-lg', 'placeholder' => 'Descreva a marca do patrimônio', 'required' => 'required'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('num_nota_fiscal', 'Número Nota Fiscal:* ' ) !!}
                        {!! Form::text('num_nota_fiscal', null, ['class' => 'form-control input-lg', 'placeholder' => 'Descreva o número da nota fiscal', 'required' => 'required'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('data_compra', 'Data da Compra:* ' ) !!}
                        {!! Form::date('data_compra', null, ['class' => 'form-control input-lg', 'placeholder' => 'Data da compra', 'required' => 'required'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('ano_compra', 'Ano da Compra:* ' ) !!}
                        {!! Form::text('ano_compra', null, ['class' => 'form-control input-lg', 'placeholder' => 'Ano da compra', 'required' => 'required'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('num_serie', 'Número de Série:* ' ) !!}
                        {!! Form::text('num_serie', null, ['class' => 'form-control input-lg', 'placeholder' => 'Número de Série', 'required' => 'required'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('garantia', 'Garantia:* ' ) !!}
                        {!! Form::text('garantia', null, ['class' => 'form-control input-lg', 'placeholder' => 'Garantia', 'required' => 'required'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('valor', 'Valor:* ' ) !!}
                        {!! Form::text('valor', null, ['class' => 'form-control input-lg', 'placeholder' => 'Valor do Produto', 'required' => 'required'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('situacao', 'Situação: ' ) !!}
                        {!! Form::textarea('situacao', null, ['class' => 'form-control input-lg', 'placeholder' => 'Descreva a situação atual do produto'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('usuario', 'Usuário: ' ) !!}
                        {!! Form::text('usuario', null, ['class' => 'form-control input-lg', 'placeholder' => 'Descreva o usuário que utiliza este produto'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('setor', 'Setor: ' ) !!}
                        {!! Form::text('setor', null, ['class' => 'form-control input-lg', 'placeholder' => 'Descreva o o setor onde este produto se encontra'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('data_baixa', 'Data Baixa: ' ) !!}
                        {!! Form::date('data_baixa', null, ['class' => 'form-control input-lg', 'placeholder' => 'Data da baixa'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('empresa', 'Empresa: ' ) !!}
                        {!! Form::text('empresa', null, ['class' => 'form-control input-lg', 'placeholder' => 'Descreva a empresa onde o produto foi comprado'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('cnpj', 'CNPJ: ' ) !!}
                        {!! Form::text('cnpj', null, ['class' => 'form-control input-lg', 'placeholder' => 'Ex:00.000.000/0001-00'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fone_empresa', 'Telefone da Empresa: ' ) !!}
                        {!! Form::text('fone_empresa', null, ['class' => 'form-control input-lg', 'placeholder' => 'Ex: (00)0000-0000'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email_empresa', 'Email da Empresa: ' ) !!}
                        {!! Form::text('email_empresa', null, ['class' => 'form-control input-lg', 'placeholder' => 'Ex: email@mail.com'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('vendedor', 'Vendedor: ' ) !!}
                        {!! Form::text('vendedor', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do vendedor que vendeu esse produto'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('rua', 'Rua: ' ) !!}
                        {!! Form::text('rua', null, ['class' => 'form-control input-lg', 'placeholder' => 'Rua'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('bairro', 'Bairro: ' ) !!}
                        {!! Form::text('bairro', null, ['class' => 'form-control input-lg', 'placeholder' => 'bairro'] ) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Observacao: ' ) !!}
                        {!! Form::text('description', null, ['class' => 'form-control input-lg', 'placeholder' => 'Observações'] ) !!}
                    </div>

                        <table class="table table-condensed">
                            <!-- File_01 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('name_file_01', 'Nome Arquivo 01:* ' ) !!}
                                        {!! Form::text('name_file_01', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 01'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_01', 'Data:* ' ) !!}
                                        {!! Form::date('data_file_01', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_01', 'Arquivo 01: * ' ) !!}
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
                                        {!! Form::label('name_file_02', 'Nome Arquivo 02:* ' ) !!}
                                        {!! Form::text('name_file_02', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 02'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_02', 'Data:* ' ) !!}
                                        {!! Form::date('data_file_02', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
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
                                        {!! Form::text('name_file_03', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Arquivo 03'] ) !!}
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('data_file_03', 'Data:* ' ) !!}
                                        {!! Form::date('data_file_03', null, ['class' => 'form-control input-lg', 'placeholder' => '00/00/00'] ) !!}
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


                        </table>


                        {!!Form::submit('INSERIR', ['class' => 'btn btn-primary'])!!}

                    {!! Form::close() !!}
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
