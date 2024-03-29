@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@include('scripts.script_formselect')

@section('title', 'Inserir Transparência')

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
                    {!! Form::open(['url' => 'input-transparency',  'files' => true, 'method' => 'post']) !!}
                    {{ csrf_field() }}
                    <div class="form-group">
                        {!! Form::label('ano', 'Tipo de Documento: * ' ) !!}
                        <select class="form-control input-lg" id="docMain" onchange="selectDocument(this.value)" name="docMain" required="required">
                           <option value="" disabled selected>Selecione um documento</option>

                           <option value="Contratos">Contratos</option>
                           <option value="Demonstrações Contábeis">Demonstrações Contábeis</option>
                           <option value="Editais e Licitações">Editais e Licitações</option>
                           <option value="Gestão Financeira">Gestão Financeira</option>
                           <option value="Gestão Orçamentária">Gestão Orçamentária</option>
                           <option value="Integridade e Conduta Ética">Integridade e Conduta Ética</option>
                           <option value="Normativos">Normativos</option>
                           <option value="Planejamento">Planejamento</option>
                           <option value="Recursos Humanos">Recursos Humanos</option>
                           <option value="Relatório de Gestão">Relatório de Gestão</option>
                           <option value="Transferências">Transferências</option>

                        </select>
                    </div>
                        <div class="form-group">
                            {!! Form::label('ano', 'Subtipo de Documento: * ' ) !!}
                            <select class="form-control input-lg" id="subDoc" name="subDoc" required="required">

                                    <option value="" disabled selected>Selecione um sub documento</option>

                            </select>
                        </div>

                        <div class="form-group">
                            {!! Form::label('document_name', 'Nome do Documento:* ' ) !!}
                            {!! Form::text('document_name', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Documento'] ) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('ano', 'Ano: * ' ) !!}
                            {!! Form::select('ano',
                             [
                                 '2010'                        => '2010',
                                 '2011'                        => '2011',
                                 '2012'                        => '2012',
                                 '2013'                        => '2013',
                                 '2014'                        => '2014',
                                 '2015'                        => '2015',
                                 '2016'                        => '2016',
                                 '2017'                        => '2017',
                                 '2018'                        => '2018',
                                 '2019'                        => '2019'


                             ], null, ['class' => 'form-control input-lg','placeholder' => 'Escolha o ano', 'required' => 'required']) !!}
                        </div>

                        <table class="table table-striped table-bordered">
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
