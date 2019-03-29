@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@section('title', 'Inserir Instrutor')

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
                    {!! Form::open(['url' => 'input-instrutor',  'files' => true, 'method' => 'post']) !!}
                    {{ csrf_field() }}
                        <div class="form-group">
                            {!! Form::label('name', 'Nome: * ' ) !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome Instrutor', 'required' => 'required'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email: * ' ) !!}
                            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'instrutor@exemple.com.br', 'required' => 'required'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('data_nascimento', 'Data Nascimento:* ' ) !!}
                            {!! Form::date('data_nascimento', null, ['class' => 'form-control', 'placeholder' => '', 'required' => 'required'] ) !!}
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                {!! Form::label('sexo', 'Sexo: * ' ) !!}
                                {!! Form::select('sexo',
                                 [
                                     'Masculino'                  => 'Masculino',
                                     'Feminino'                   => 'Feminino',


                                 ], null, ['class' => 'form-control','placeholder' => 'Escolha o sexo', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                {!! Form::label('estado_civil', 'Estado Civil:* ' ) !!}
                                {!! Form::select('estado_civil',
                                 [
                                     'Solteiro'                => 'Solteiro',
                                     'Casado'                  => 'Casado',
                                     'Viúvo'                   => 'Viúvo',
                                     'Divorciado'              => 'Divorciado',


                                 ], null, ['class' => 'form-control','placeholder' => 'Escolha o estado civil', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('rua', 'Rua:  ' ) !!}
                            {!! Form::text('rua', null, ['class' => 'form-control', 'placeholder' => 'Rua'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('bairro', 'Bairro:  ' ) !!}
                            {!! Form::text('bairro', null, ['class' => 'form-control', 'placeholder' => 'Bairro'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('number', 'Número:  ' ) !!}
                            {!! Form::number('number', null, ['class' => 'form-control', 'placeholder' => 'Ex: 1212'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('objetivo', 'Objetivo:  ' ) !!}
                            {!! Form::textarea('objetivo', null, ['class' => 'form-control', 'placeholder' => 'Descreva o Objetivo...'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('formation', 'Formação:  ' ) !!}
                            {!! Form::text('formation', null, ['class' => 'form-control', 'placeholder' => 'Descreva a formação educacional do instrutor'] ) !!}
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                {!! Form::label('idiomas', 'Idioma de Preferência:  ' ) !!}
                                {!! Form::select('idiomas',
                                 [
                                     'Inglês'                => 'Inglês',
                                     'Espanhol'              => 'Espanhol',
                                     'Outros'                => 'Outros',
                                     'Nenhum'                => 'Nenhum',

                                 ], null, ['class' => 'form-control','placeholder' => 'Escolha o idioma que mais domina']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('informatica', 'Experiência Profissional:  ' ) !!}
                            {!! Form::textarea('experiency', null, ['class' => 'form-control', 'placeholder' => ''] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('informatica', 'Experiência em Informática:  ' ) !!}
                            {!! Form::textarea('informatica', null, ['class' => 'form-control', 'placeholder' => ''] ) !!}
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
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
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
