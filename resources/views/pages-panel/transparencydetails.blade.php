@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@include('scripts.script_formselect')

@section('title', 'Detalhes Deste Documento - Transparência')

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
                                  <a href="{{ route('page-inserir-transparency') }}" class="alert-link">Inserir outro Documento?</a>
                            </div>
                        @endif


                        	<div class="row">
                                <!-- Form Edit Banner -->
                                <!-- Form Inserir Banner -->
                                {!! Form::model($transparency,['route' =>  ['transparency.update', $transparency->id], 'class' => '','method'=>'PUT','files'=>true]) !!}
                                {{ csrf_field() }}
                                <div class="form-group">
                                    {!! Form::label('ano', 'Tipo de Documento: * ' ) !!}
                                    <select class="form-control" id="docMain" onchange="selectDocument(this.value)" name="docMain">
                                       <option value="" disabled selected>Selecione um documento</option>

                                       <option value="Contratos">Contratos</option>
                                       <option value="Demonstrações Contábeis">Demonstrações Contábeis</option>
                                       <option value="Editais e Licitações">Editais e Licitações</option>
                                       <option value="Gestão Financeira">Gestão Financeira</option>
                                       <option value="Gestão Orçamentária">Gestão Orçamentária</option>
                                       <option value="Integridade e Conduta Ética">Integridade e Conduta Ética</option>
                                       <option value="Normativos">Normativos</option>
                                       <option value="Recursos Humanos">Recursos Humanos</option>
                                       <option value="Relatório de Gestão">Relatório de Gestão</option>
                                       <option value="Transferências">Transferências</option>

                                    </select>
                                </div>
                                    <div class="form-group">
                                        {!! Form::label('ano', 'Subtipo de Documento: * ' ) !!}
                                        <select class="form-control" id="subDoc" name="subDoc">

                                                <option value="" disabled selected>Selecione um sub documento</option>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('document_name', 'Nome do Documento: * ' ) !!}
                                        {!! Form::text('document_name', null, ['class' => 'form-control', 'placeholder' => 'Nome do Documento'] ) !!}
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


                                         ], null, ['class' => 'form-control','placeholder' => 'Escolha o ano']) !!}
                                    </div>


                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    {!! Form::label('file_01', 'Arquivo 01:* ' ) !!}
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
                                        <!-- Código em espera
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
                                        -->

                                    </table>


                                    {!!Form::submit('ATUALIZAR', ['class' => 'btn btn-primary'])!!}

                                {!! Form::close() !!}
                                @include('pages-panel.modal-delete-transparency')
                               <div class="text-fight">
                                   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o"></i> Deletar este documento</button>

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
