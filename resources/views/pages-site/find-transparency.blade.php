
@include('template-site.head')

@include('template-site.topo')

@include('template-site.menu')

@include('scripts.script_formselect')

@section('title', 'Transparência')

<section class="banner-1">
</section>
<!-- Notice Details -->
<section class="welcome py-5">
    <div class="container py-md-8 mt-md-8">
        <div class="col-md-12">

                    <h2 class="heading-agileinfo">@yield('title')</h2>


                    <div class="panel-body">
                        <!-- Form Inserir Banner -->
                        {!! Form::open(['url' => 'find-transparency',  'files' => true, 'method' => 'post']) !!}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <h4>{!! Form::label('ano', 'Tipo de Documento: ' ) !!}</h4>
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
                                <h4>{!! Form::label('ano', 'Subtipo de Documento: ' ) !!}</h4>
                                <select class="form-control input-lg" id="subDoc" name="subDoc" required="required">

                                        <option value="" disabled selected>Selecione um sub documento</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <h4>{!! Form::label('ano', 'Ano: ' ) !!}</h4>
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

                            <div class="heading-agileinfo">

                                {!!Form::submit('ENCONTRAR DOCUMENTO', ['class' => 'btn btn-primary'])!!}

                            </div>

                        {!! Form::close() !!}
                    </div>

        </div>
        <div class="">
            @if(Session::has('message'))
                <div class="alert alert-success">
                      <button type="button" class="btn btn-success warning_2" data-dismiss="alert" aria-hidden="true">×</button>
                      {!! Session::get('message') !!}

                </div>
            @endif
        </div>
        <div class="col-md-12">
            @foreach ($transparency as $transparency)
                <div class="row inner_w3l_agile_grids-1 mt-md-5 pt-8">
                    <div class="col-md-12 w3layouts_news_left_grid1">
                        <a href="{{URL::to('detalhes/'.$transparency->id.'/transparency')}}">
                            <div class="new_top">
                                <h3>{!! Form::label('docMain', 'Tipo de Documento: ' ) !!}</h3>
                                <h4>{{$transparency->docMain}}</h4>
                                <h3>{!! Form::label('subDoc', 'Sub Tipo de documento:  ' ) !!}</h3>
                                <h4>{{$transparency->subDoc}}</h4>
                                <h3>{!! Form::label('ano', 'Ano: ' ) !!}</h3>
                                <h4>{{$transparency->ano}}</h4>

                            </div>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="heading-agileinfo">
            <a href="/trasparencies" target="_blank"> <button type="button" class="btn btn-success" name="button">TODOS OS DOCUMENTOS</button> </a>
        </div>
    </div>

</section>


@include('template-site.infobar')

@include('template-site.footer')

@include('template-site.scriptsjs')
