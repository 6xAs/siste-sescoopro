@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@include('scripts.script_formselect')

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
                    <!-- Form Inserir Licitação -->
                    <div class="col-12">
                        <button type="button" class="btn btn-primary"> GERAR PDF </button>

                    </div>
                    <br>
                    <div class="form-group">
                        <h3>{!! Form::label('status_cooperativa', 'Status da Cooperativa: ' ) !!}</h3>
                        <h4>{{$cooperativa->status_cooperativa}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('nome_cooperativa', 'Cooperativa: ' ) !!}</h3>
                        <h4>{{$cooperativa->nome_cooperativa}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('cnpj', 'CNPJ: ' ) !!}</h3>
                        <h4>{{$cooperativa->cnpj}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('numero_registro', 'Número Registro:  ' ) !!}</h3>
                        <h4>{{$cooperativa->numero_registro}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('data_contribuição', 'Data Contribuição: ' ) !!}</h3>
                        <h4>{{ date('d/m/y', strtotime($cooperativa->data_contribuicao)) }}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('data_registro', 'Data Registro: ' ) !!}</h3>
                        <h4>{{ date('d/m/y', strtotime($cooperativa->data_registro)) }}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('numero_cooperados', 'Número de Cooperados: ' ) !!}</h3>
                        <h4>{{$cooperativa->numero_cooperados}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('email', 'Email: ' ) !!}</h3>
                        <h4>{{$cooperativa->email}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('numero_funcionarios', 'Número de Funcionários: ' ) !!}</h3>
                        <h4>{{$cooperativa->numero_funcionarios}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('nome_presidente', 'Nome Presidente: ' ) !!}</h3>
                        <h4>{{$cooperativa->nome_presidente}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('cpf_presidente', 'CPF Presidente: ' ) !!}</h3>
                        <h4>{{$cooperativa->cpf_presidente}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('cel_presidente', 'Celular Presidente: ' ) !!}</h3>
                        <h4>{{$cooperativa->cel_presidente}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('mandato', 'Mandato: ' ) !!}</h3>
                        <h4>{{$cooperativa->mandato}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('rua', 'Rua: ' ) !!}</h3>
                        <h4>{{$cooperativa->rua}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('bairro', 'Bairro: ' ) !!}</h3>
                        <h4>{{$cooperativa->bairro}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('numero', 'Número: ' ) !!}</h3>
                        <h4>{{$cooperativa->numero}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('cep', 'CEP: ' ) !!}</h3>
                        <h4>{{$cooperativa->cep}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('telefone_empresarial_1', 'Telefone 01: ' ) !!}</h3>
                        <h4>{{$cooperativa->telefone_empresarial_1}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('telefone_empresarial_2', 'Telefone 02: ' ) !!}</h3>
                        <h4>{{$cooperativa->telefone_empresarial_2}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('cidade', 'Cidade: ' ) !!}</h3>
                        <h4>{{$cooperativa->cidade}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('estado', 'Estado: ' ) !!}</h3>
                        <h4>{{$cooperativa->estado}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('atividade_economica', 'Atividade Econômica: ' ) !!}</h3>
                        <h4>{{$cooperativa->atividade_economica}}</h4>
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
