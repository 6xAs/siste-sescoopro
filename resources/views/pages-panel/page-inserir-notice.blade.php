@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@section('title', 'Inserir Notícia')

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
                    {!! Form::open(['url' => 'input-notice',  'files' => true, 'method' => 'post']) !!}
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

                        <table>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('image_01', 'Imagem Principal: ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="image_01" onchange="mostraUm(this);">
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group">

                                        <div class="row">
                                                    <div class="col-xs-4 col-md-12">
                                                      <a href="#" class="thumbnail">

                                                          <img id="mostraU" src="" width="550" height="330" alt="" />
                                                      </a>
                                                    </div>
                                        </div>

                                    </div>

                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('image_02', 'Segunda Imagem: ' ) !!}
                                        <div class="custom-file">
                                            <input type="file" id="exampleInputFile"  name="image_02" onchange="mostraDois(this);">
                                        </div>
                                    </div>

                                </td>

                                <td>
                                    <div class="form-group">

                                        <div class="row">
                                                    <div class="col-xs-4 col-md-12">
                                                      <a href="#" class="thumbnail">

                                                          <img id="mostraD" src="" width="550" height="330" alt="" />
                                                      </a>
                                                    </div>
                                        </div>

                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        {!! Form::label('image_03', 'Terceira Imagem: ' ) !!}
                                        <div class="">
                                            <input type="file" id="exampleInputFile"  name="image_03" onchange="mostraTres(this);">

                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">

                                        <div class="row">
                                                    <div class="col-xs-4 col-md-12">
                                                      <a href="#" class="thumbnail">

                                                          <img id="imageTres" src="" width="550" height="330" alt="" />
                                                      </a>
                                                    </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        </table>

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
