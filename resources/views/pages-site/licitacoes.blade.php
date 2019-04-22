
@include('template-site.head')

@include('template-site.topo')

@include('template-site.menu')

@section('title', 'Licitações')


<section class="banner-1">
</section>

<section class="welcome py-5">
    <div class="container py-md-8 mt-md-8">
        <div class="col-md-12">

                    <h2 class="heading-agileinfo">@yield('title')</h2>


                            {!! Form::open(['url' => 'find-licitacao',  'files' => true, 'method' => 'post']) !!}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <h4>{!! Form::label('modalidade', 'Modalidade: ' ) !!}</h4>
                                {!! Form::select('modalidade',
                                 [
                                     'Convite'    =>  'Convite',
                                     'Dispensa'    =>  'Dispensa',
                                     'Inexigibilidade'    =>  'Inexigibilidade',
                                     'Pregão'    =>  'Pregão',


                                 ], null, ['class' => 'form-control input-lg', 'placeholder' => 'Tipo de Licitação', 'required' => 'required']) !!}
                            </div>
                            <div class="form-group">
                                <h4>{!! Form::label('ano', 'Período: ' ) !!}</h4>
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
                                <h4>{!! Form::label('status', 'Status: ' ) !!}</h4>
                                {!! Form::select('status',
                                 [
                                     'Em Andamento'                        => 'Em Andamento',
                                     'Concluído'                           => 'Concluído',
                                     'Cancelado'                           => 'Cancelado',
                                     'Anulado'                             => 'Anulado',
                                     'Suspenso'                            => 'Suspenso',

                                 ], null, ['class' => 'form-control input-lg','placeholder' => 'Escolha o status da licitação', 'required' => 'required']) !!}
                            </div>

                            <div class="heading-agileinfo">

                                {!!Form::submit('ENCONTRAR DOCUMENTO', ['class' => 'btn btn-primary'])!!}

                            </div>

                            {!! Form::close() !!}

        </div>
        <div class="">
            @if(Session::has('message'))
                <div class="alert alert-success">
                      <button type="button" class="btn btn-success warning_2" data-dismiss="alert" aria-hidden="true">×</button>
                      {!! Session::get('message') !!}

                </div>
            @endif
        </div>

        <div class="heading-agileinfo">

            <a href="/licitacoes" target="_blank"> <button type="button" class="btn btn-success" name="button">TODOS OS DOCUMENTOS</button> </a>
        </div>
    </div>




</section>





@include('template-site.infobar')

@include('template-site.footer')

@include('template-site.scriptsjs')
