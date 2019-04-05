@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@include('template-panel.form-mascara')

@section('title', 'Detalhes da Cooperativa')

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
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                  <button type="button" class="btn btn-success warning_2" data-dismiss="alert" aria-hidden="true">×</button>
                                  {!! Session::get('message') !!}
                                  <a href="{{ route('page-inserir-cooperativa') }}" class="alert-link">Inserir outra Cooperativa?</a>
                            </div>
                        @endif


                        	<div class="row">
                                <!-- Form Edit Banner -->
                                <!-- Form Inserir Banner -->
                                {!! Form::model($cooperativa,['route' =>  ['cooperativa.update', $cooperativa->id], 'class' => '','method'=>'PUT','files'=>true]) !!}
                                {{ csrf_field() }}
                                <div class="form-group">
                                    {!! Form::label('nome_cooperativa', 'Nome da Cooperativa: * ' ) !!}
                                    {!! Form::text('nome_cooperativa', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome da Cooperativa', 'required' => 'required'] ) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('cnpj', 'CNPJ: * ' ) !!}
                                    {!! Form::text('cnpj', null, ['class' => 'form-control input-lg', 'placeholder' => 'Ex:000.000/0000-00', 'id' => 'cnpj', 'required' => 'required'] ) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('numero_registro', 'Número de Registro:* ' ) !!}
                                    {!! Form::text('numero_registro', null, ['class' => 'form-control input-lg', 'placeholder' => 'Número Registro', 'required' => 'required'] ) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('data_registro', 'Data de Registro:* ' ) !!}
                                    {!! Form::date('data_registro', null, ['class' => 'form-control input-lg', 'placeholder' => '', 'required' => 'required'] ) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('data_contribuicao', 'Data Constituição: * ' ) !!}
                                    {!! Form::date('data_contribuicao', null, ['class' => 'form-control input-lg', 'placeholder' => '', 'required' => 'required'] ) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('mandato', 'Mandato:* ' ) !!}
                                    {!! Form::text('mandato', null, ['class' => 'form-control input-lg', 'placeholder' => '', 'required' => 'required'] ) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('numero_cooperados', 'Número de Cooperados:* ' ) !!}
                                    {!! Form::number('numero_cooperados', null, ['class' => 'form-control input-lg', 'placeholder' => 'Número de Cooperados', 'required' => 'required'] ) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('numero_funcionarios', 'Número de Funcionários:* ' ) !!}
                                    {!! Form::number('numero_funcionarios', null, ['class' => 'form-control input-lg', 'placeholder' => 'Número de Funcionários', 'required' => 'required'] ) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email', 'Email:* ' ) !!}
                                    {!! Form::text('email', null, ['class' => 'form-control input-lg', 'placeholder' => 'exemplo@mail.com', 'required' => 'required'] ) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('cidade', 'Cidade: * ' ) !!}
                                    {!! Form::select('cidade',
                                     [
                                         'Porto Velho'                  => 'Porto Velho',
                                         'Jí-Paraná'                    => 'Jí-Paraná',
                                         'Ariquemes'                    => 'Ariquemes',
                                         'Vilhena'                      => 'Vilhena',
                                         'Cacoal'                       => 'Cacoal',
                                         'Rolim de Moura'               => 'Rolim de Moura',
                                         'Jaru'                         => 'Jaru',
                                         'Guajará Mirim'                => 'Guajará Mirim',
                                         'Machadinho do Oeste'           => 'Machadinho do Oeste',
                                         'Buritis'                      => 'Buritis',
                                         'Pimenta Bueno'                => 'Pimenta Bueno',
                                         'Ouro Preto do Oeste'          => 'Ouro Preto do Oeste',
                                         'Espigão do Oeste'              => 'Espigão do Oeste',
                                         'Nova Mamoré'                  => 'Nova Mamoré',
                                         'Candeias do Jamarí'           => 'Candeias do Jamarí',
                                         'Cujubim'                      => 'Cujubim',
                                         'Alta Floresta do Oeste'        => 'Alta Floresta do Oeste',
                                         'São Miguel do Guaporé'        => 'São Miguel do Guaporé',
                                         'Alto Paraíso'                 => 'Alto Paraíso',
                                         'Nova Brasilândia do Oeste'     => 'Nova Brasilândia do Oeste',
                                         'São Francisco do Guaporé'     => 'São Francisco do Guaporé',
                                         'Presidente Médici'            => 'Presidente Médici',
                                         'Costa Marques'                => 'Costa Marques',
                                         'Cerejeiras'                   => 'Cerejeiras',
                                         'Colorado do Oeste'            => 'Colorado do Oeste',
                                         'Monte Negro'                  => 'Monte Negro',
                                         'Alvorada do Oeste'             => 'Alvorada do Oeste',
                                         'Campo Novo de Rondônia'       => 'Campo Novo de Rondônia',
                                         'Alto Alegre dos Parecis'      => 'Alto Alegre dos Parecis',
                                         'Seringueiras'                 => 'Seringueiras',
                                         'Urupá'                        => 'Urupá',
                                         'Mirante da Serra'             => 'Mirante da Serra',
                                         'Vale do Anari'                => 'Vale do Anari',
                                         'Chupinguaia'                  => 'Chupinguaia',
                                         'Theobroma'                    => 'Theobroma',
                                         'Itapuã do Oeste'              => 'Itapuã do Oeste',
                                         'Ministro Andrezza'            => 'Ministro Andrezza',
                                         'Novo Horizonte do Oeste'      => 'Novo Horizonte do Oeste',
                                         'Governador Jorge Teixeira'    => 'Governador Jorge Teixeira',
                                         'Curumbiara'                   => 'Curumbiara',
                                         'Nova União'                   => 'Nova União',
                                         'Vale do Paraíso'              => 'Vale do Paraíso',
                                         'Santa Luzia do Oeste'          => 'Santa Luzia do Oeste',
                                         'Cacaulândia'                  => 'Cacaulândia',
                                         'Paracis'                      => 'Paracis',
                                         'Cabixi'                       => 'Cabixi',
                                         'São Felipe do Oeste'           => 'São Felipe do Oeste',
                                         'Teixeiropolis'                => 'Teixeiropolis',
                                         'Rio Crespo'                   => 'Rio Crespo',
                                         'Castanheiras'                 => 'Castanheiras',
                                         'Primavera de Rondônia'        => 'Primavera de Rondônia',
                                         'Pimenteiras do Oeste'         => 'Pimenteiras do Oeste'

                                     ], null, ['class' => 'form-control input-lg','placeholder' => 'Escolha uma cidade...', 'required' => 'required']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('estado', 'Estado:* ' ) !!}
                                    {!! Form::text('estado', null, ['class' => 'form-control input-lg', 'placeholder' => 'Digite o Estado', 'required' => 'required'] ) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('atividade_economica', 'Atividade Econômica:* ' ) !!}
                                    {!! Form::textarea('atividade_economica', null, ['class' => 'form-control input-lg', 'placeholder' => 'Descreva a atividade econômica', 'required' => 'required'] ) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('status_cooperativa', 'Status Cooperativa:* ' ) !!}
                                    {!! Form::select('status_cooperativa',
                                     [
                                         'Adimplente'                => 'Adimplente',
                                         'Inadimplente'              => 'Inadimplente',
                                         'Inativo'                   => 'Inativo',

                                     ], null, ['class' => 'form-control input-lg','placeholder' => 'Escolha o estatus da cooperativa', 'required' => 'required']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('nome_presidente', 'Nome Presidente:* ' ) !!}
                                    {!! Form::text('nome_presidente', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome Presidente', 'required' => 'required'] ) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('cpf_presidente', 'CPF Presidente:* ' ) !!}
                                    {!! Form::text('cpf_presidente', null, ['class' => 'form-control input-lg cpf-mask', 'placeholder' => 'Ex:000.000.000-00', 'id' => 'cpf', 'required' => 'required'] ) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('cel_presidente', 'Celular Presidente:* ' ) !!}
                                    {!! Form::text('cel_presidente', null, ['class' => 'form-control input-lg', 'placeholder' => 'Ex:99999-9999', 'id' => 'celular', 'required' => ''] ) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('rua', 'Rua: ' ) !!}
                                    {!! Form::text('rua', null, ['class' => 'form-control input-lg', 'placeholder' => 'Endereço da Cooperativa', 'required' => ''] ) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('bairro', 'Bairro: ' ) !!}
                                    {!! Form::text('bairro', null, ['class' => 'form-control input-lg', 'placeholder' => 'Endereço da Cooperativa', 'required' => ''] ) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('numero', 'Número: ' ) !!}
                                    {!! Form::number('numero', null, ['class' => 'form-control input-lg', 'placeholder' => 'Ex:1234', 'required' => ''] ) !!}
                                </div>
                                <div class="form-group">

                                    {!! Form::label('cep', 'CEP: ' ) !!}
                                    {!! Form::text('cep', null, ['class' => 'form-control input-lg', 'placeholder' => 'Ex:00.000-000', 'id' => 'cep', 'required' => '', 'onKeyPress' => 'MascaraCep(form1.cep);' ] ) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('telefone_empresarial_1', 'Telefone Empresarial 1: ' ) !!}
                                    {!! Form::text('telefone_empresarial_1', null, ['class' => 'form-control input-lg', 'placeholder' => 'Ex:3333-3333', 'id' => 'telefone', 'required' => ''] ) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('telefone_empresarial_2', 'Telefone Empresarial 2: ' ) !!}
                                    {!! Form::text('telefone_empresarial_2', null, ['class' => 'form-control input-lg', 'placeholder' => 'Ex:3333-3333', 'required' => ''] ) !!}
                                </div>


                                    {!!Form::submit('ATUALIZAR', ['class' => 'btn btn-primary'])!!}

                                {!! Form::close() !!}
                                @include('pages-panel.modal-delete-cooperativa')
                               <div class="text-fight">
                                   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o"></i> Deletar Cooperativa</button>

                               </div>
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
