@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@section('title', 'Detalhes da Notícia em Destaque')

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
                                  <a href="{{ route('page-inserir-noticedestaque') }}" class="alert-link">Inserir outro Notícia em Destaque?</a>
                            </div>
                        @endif


                        	<div class="row">
                                <!-- Form Edit Banner -->
                                <!-- Form Inserir Banner -->
                                {!! Form::model($noticeDestaque,['route' =>  ['noticedestaque.update', $noticeDestaque->id], 'class' => '','method'=>'PUT','files'=>true]) !!}
                                {{ csrf_field() }}
                                    <div class="form-group">
                                        {!! Form::label('title', 'Título Principal da Notícia: * ' ) !!}
                                        {!! Form::text('title', null, ['class' => 'form-control input-lg', 'placeholder' => 'Título Principal da Notícia'] ) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('subtitle', 'Subtitulo da Notícia: ' ) !!}
                                        {!! Form::text('subtitle', null, ['class' => 'form-control input-lg', 'placeholder' => 'Subtitulo'] ) !!}
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

                                         ], null, ['class' => 'form-control input-lg','placeholder' => 'Escolha uma editoria...']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('date', 'Escolher Data: ' ) !!}
                                        {!! Form::date('data', null, ['class' => 'form-control input-lg', 'placeholder' => ''] ) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('description', 'Descrição:* ' ) !!}
                                        {!! Form::textarea('description', null, ['class' => 'form-control input-lg', 'id' => 'editor', 'placeholder' => 'Descreva o conteúdo da notícia...'] ) !!}
                                        <script>
                                               ClassicEditor
                                                   .create( document.querySelector( '#editor' ) )
                                                   .catch( error => {
                                                       console.error( error );
                                                   } );
                                         </script>
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

                                    {!!Form::submit('ATUALIZAR', ['class' => 'btn btn-primary'])!!}

                                {!! Form::close() !!}
                                @include('pages-panel.modal-delete-noticeDestaque')
                               <div class="text-fight">
                                   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o"></i> Deletar Notícia</button>

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
