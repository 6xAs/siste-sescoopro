@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@include('template-panel.form-mascara')

@section('title', 'Inserir Cooperativa')



<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">@yield('title')</h3>
                    <p class="panel-subtitle"></p>
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
                    <!-- Form Inserir Banner -->
                    {!! Form::open(['url' => 'input-cooperativa',  'files' => true, 'name' => 'form1', 'method' => 'post']) !!}
                        {{ csrf_field() }}
                        <div class="form-group">
                            {!! Form::label('nome_fantasia', 'Nome da Cooperativa: * ' ) !!}
                            {!! Form::text('nome_fantasia', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome Fantasia da Cooperativa', 'required' => 'required'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('nome_cooperativa', 'Nome Fantasia: * ' ) !!}
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
                            {!! Form::label('email', 'Email: ' ) !!}
                            {!! Form::text('email', null, ['class' => 'form-control input-lg', 'placeholder' => 'exemplo@mail.com'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('cidade', 'Cidade: ' ) !!}
                            {!! Form::text('cidade', null, ['class' => 'form-control input-lg', 'placeholder' => 'Digite a cidade'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('estado', 'Estado: ' ) !!}
                            {!! Form::text('estado', null, ['class' => 'form-control input-lg', 'placeholder' => 'Digite o Estado', 'required' => 'required'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('atividade_economica', 'Atividade Econômica: ' ) !!}
                            {!! Form::textarea('atividade_economica', null, ['class' => 'form-control input-lg', 'placeholder' => 'Descreva a atividade econômica'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status_cooperativa', 'Status Cooperativa: ' ) !!}
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
                            {!! Form::label('cpf_presidente', 'CPF Presidente: ' ) !!}
                            {!! Form::text('cpf_presidente', null, ['class' => 'form-control input-lg cpf-mask', 'placeholder' => 'Ex:000.000.000-00', 'id' => 'cpf'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('cel_presidente', 'Celular Presidente: ' ) !!}
                            {!! Form::text('cel_presidente', null, ['class' => 'form-control input-lg', 'placeholder' => 'Ex:99999-9999', 'id' => 'celular'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('rua', 'Rua: ' ) !!}
                            {!! Form::text('rua', null, ['class' => 'form-control input-lg', 'placeholder' => 'Endereço da Cooperativa'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('bairro', 'Bairro: ' ) !!}
                            {!! Form::text('bairro', null, ['class' => 'form-control input-lg', 'placeholder' => 'Endereço da Cooperativa'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('numero', 'Número: ' ) !!}
                            {!! Form::number('numero', null, ['class' => 'form-control input-lg', 'placeholder' => 'Ex:1234'] ) !!}
                        </div>
                        <div class="form-group">

                            {!! Form::label('cep', 'CEP: ' ) !!}
                            {!! Form::text('cep', null, ['class' => 'form-control input-lg', 'placeholder' => 'Ex:00.000-000', 'id' => 'cep'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('telefone_empresarial_1', 'Telefone Empresarial 1: ' ) !!}
                            {!! Form::text('telefone_empresarial_1', null, ['class' => 'form-control input-lg', 'placeholder' => 'Ex:3333-3333', 'id' => 'telefone'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('telefone_empresarial_2', 'Telefone Empresarial 2: ' ) !!}
                            {!! Form::text('telefone_empresarial_2', null, ['class' => 'form-control input-lg', 'placeholder' => 'Ex:3333-3333'] ) !!}
                        </div>


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

<!--// Form Inserir Banner -->

<!-- Form deprecied
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control input-lg" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
-->

@include('template-panel.footer')
