@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@section('title', 'Inserir Notícia em Destaque')

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
                    {!! Form::open(['url' => 'input-noticedestaque',  'files' => true, 'method' => 'post']) !!}
                    {{ csrf_field() }}
                        <div class="form-group">
                            {!! Form::label('title', 'Título Principal da Notícia: * ' ) !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título Principal da Notícia'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('subtitle', 'Subtitulo da Notícia: ' ) !!}
                            {!! Form::text('subtitle', null, ['class' => 'form-control', 'placeholder' => 'Subtitulo'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('editoria', 'Editoria: * ' ) !!}
                            {!! Form::select('editoria',
                             [
                                'Geral'             => 'Geral',
                                 'Educação'         => 'Educação',
                                 'Economia'         => 'Economia',
                                 'Esporte'          => 'Esporte',
                                 'Eventos'          => 'Eventos',
                                 'Cooperação'       => 'Cooperação',
                                 'Saúde'            => 'Saúde',
                                 'Legislativo'      => 'Legislativo'

                             ], null, ['class' => 'form-control','placeholder' => 'Escolha uma editoria...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('date', 'Escolher Data: ' ) !!}
                            {!! Form::date('data', null, ['class' => 'form-control', 'placeholder' => ''] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Descrição:* ' ) !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descreva o conteúdo da notícia...'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('image_01', 'Imagem Principal: ' ) !!}
                            <div class="custom-file">
                                <p>Obs: Essa imagem deve ter: 565 x 552 px </p>
                                {!! Form::file('image_01', null, ['class' => 'form-control', 'placeholder' => ''] ) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('image_02', 'Segunda Imagem: ' ) !!}
                            <div class="custom-file">
                                <p>Obs: Essa imagem deve ter: 565 x 552 px </p>
                                {!! Form::file('image_02', null, ['class' => 'form-control', 'placeholder' => ''] ) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('image_03', 'Terceira Imagem: ' ) !!}
                            <div class="custom-file">
                                <p>Obs: Essa imagem deve ter: 565 x 552 px </p>
                                {!! Form::file('image_03', null, ['class' => 'custom-file-input', 'placeholder' => ''] ) !!}

                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('video', 'Video Link: ' ) !!}
                            {!! Form::text('video', null, ['class' => 'form-control', 'placeholder' => 'Ex:https://www.youtube.com/embed/videoseries?list=PLx0sYbCqOb8TBPRdmBHs5Iftvv9TPboYG'] ) !!}
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


@include('template-panel.footer')
