@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@section('title', 'Cadastrar Curso')

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
                    <!-- Form Inserir Banner -->
                    {!! Form::open(['url' => 'input-curso',  'files' => true, 'method' => 'post']) !!}
                    {{ csrf_field() }}
                        <div class="form-group">
                            {!! Form::label('curso', 'Nome do Curso: * ' ) !!}
                            {!! Form::text('curso', null, ['class' => 'form-control', 'placeholder' => 'Nome do Curso', 'required' => 'required'] ) !!}
                        </div>
                        <div class="form-group">

                            {!! Form::label('instrutor', 'Instrutor:* ' ) !!}
                            <select class="form-control" name="instrutor" required="required">
                                <option value="" disabled selected>Escolha uma instrutor...</option>
                                @foreach ($instrutor as $instrutor)
                                    <option value="{{$instrutor->name}}">{{$instrutor->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            {!! Form::label('carga_h', 'Carga Horária: ' ) !!}
                            {!! Form::time('carga_h', null, ['class' => 'form-control', 'placeholder' => 'Carga Horária','required' => 'required'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('horario', 'Horário: ' ) !!}
                            {!! Form::time('horario', null, ['class' => 'form-control', 'placeholder' => 'Horário','required' => 'required'] ) !!}
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

                             ], null, ['class' => 'form-control','placeholder' => 'Escolha uma cidade...', 'required' => 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('local', 'Local do Curso:* ' ) !!}
                            {!! Form::text('local', null, ['class' => 'form-control', 'placeholder' => 'Local do Curso','required' => 'required'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('publico_alvo', 'Público Alvo:* ' ) !!}
                            {!! Form::text('publico_alvo', null, ['class' => 'form-control', 'placeholder' => 'Público Alvo','required' => 'required'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('conteudo_programatico', 'Conteúdo Programático:* ' ) !!}
                            {!! Form::textarea('conteudo_programatico', null, ['class' => 'form-control', 'placeholder' => 'Descreva o conteúdo programático do curso', 'required' => 'required'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('data', 'Data: *' ) !!}
                            {!! Form::date('data', null, ['class' => 'form-control', 'placeholder' => '', 'required' => 'required'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('video', 'Video Link: ' ) !!}
                            {!! Form::text('video', null, ['class' => 'form-control', 'placeholder' => 'Ex:https://www.youtube.com/embed/videoseries?list=PLx0sYbCqOb8TBPRdmBHs5Iftvv9TPboYG'] ) !!}
                        </div>

                        <table>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_01', 'Arquivo 01:  ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_01" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">

                                        <div class="row">
                                                    <div class="col-xs-4 col-md-12">
                                                      <a href="#" class="thumbnail">
                                                           <iframe id="mostraU" width="550" height="330"></iframe>

                                                      </a>
                                                    </div>
                                        </div>

                                    </div>

                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_02', 'Arquivo 02: ' ) !!}
                                        <div class="custom-file">
                                            <input type="file" id="exampleInputFile"  name="file_02" onchange="mostraDois(this);">
                                        </div>
                                    </div>

                                </td>

                                <td>
                                    <div class="form-group">

                                        <div class="row">
                                                    <div class="col-xs-4 col-md-12">
                                                      <a href="#" class="thumbnail">
                                                          <iframe id="mostraD" width="550" height="330"></iframe>

                                                      </a>
                                                    </div>
                                        </div>

                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('file_03', 'Arquivo 03: ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="file_03" onchange="mostraTres(this);">

                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">

                                        <div class="row">
                                                    <div class="col-xs-4 col-md-12">
                                                      <a href="#" class="thumbnail">
                                                          <iframe id="imageTres" width="550" height="330"></iframe>

                                                      </a>
                                                    </div>
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
