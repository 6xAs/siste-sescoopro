@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@section('title', 'Editar  Evento')

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
                    {!! Form::model($evento,['route' =>  ['evento.update', $evento->id], 'class' => '','method'=>'PUT','files'=>true]) !!}
                    {{ csrf_field() }}
                        <div class="form-group">
                            {!! Form::label('title', 'Nome do Evento: * ' ) !!}
                            {!! Form::text('title', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nome do Evento', 'required' => 'required'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('local', 'Local do Evento: * ' ) !!}
                            {!! Form::text('local', null, ['class' => 'form-control input-lg', 'placeholder' => 'Descreva o local do Evento', 'required' => 'required'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('date', 'Escolher Data: *' ) !!}
                            {!! Form::date('data', null, ['class' => 'form-control input-lg', 'placeholder' => '', 'required' => 'required'] ) !!}
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
                        <h3 class="panel-title">Adicionar Imagens</h3>
                        <table class="table table-striped table-bordered" >
                                <!-- File_01 -->
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            {!! Form::label('image_01', 'Imagem Principal: ' ) !!}
                                            <div class="">
                                                <input type="file" id="exampleInputFile"  name="image_01" multiple="">

                                            </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            {!! Form::label('image_02', 'Imagem 02: ' ) !!}
                                            <div class="">
                                                <input type="file" id="exampleInputFile"  name="image_02" onchange="mostraUm(this);">
                                            </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            {!! Form::label('image_03', 'Imagem 03: ' ) !!}
                                            <div class="">
                                                <input type="file" id="exampleInputFile"  name="image_03" onchange="mostraUm(this);">
                                            </div>
                                    </td>

                                </tr>
                                <!-- File_02 -->
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            {!! Form::label('image_04', 'Imagem 04: ' ) !!}
                                            <div class="">
                                                <input type="file" id="exampleInputFile"  name="image_04" onchange="mostraUm(this);">
                                            </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            {!! Form::label('image_05', 'Imagem 05: ' ) !!}
                                            <div class="">
                                                <input type="file" id="exampleInputFile"  name="image_05" onchange="mostraUm(this);">
                                            </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            {!! Form::label('image_06', 'Imagem 06: ' ) !!}
                                            <div class="">
                                                <input type="file" id="exampleInputFile"  name="image_06" onchange="mostraUm(this);">
                                            </div>
                                    </td>

                                </tr>
                                <!-- File_03 -->
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            {!! Form::label('image_07', 'Imagem 07: ' ) !!}
                                            <div class="">
                                                <input type="file" id="exampleInputFile"  name="image_07" onchange="mostraUm(this);">
                                            </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            {!! Form::label('image_08', 'Imagem 08: ' ) !!}
                                            <div class="">
                                                <input type="file" id="exampleInputFile"  name="image_08" onchange="mostraUm(this);">
                                            </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            {!! Form::label('image_09', 'Imagem 09: ' ) !!}
                                            <div class="">
                                                <input type="file" id="exampleInputFile"  name="image_09" onchange="mostraUm(this);">
                                            </div>
                                    </td>

                                </tr>
                                <!-- File_04 -->
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            {!! Form::label('image_010', 'Imagem 010: ' ) !!}
                                            <div class="">
                                                <input type="file" id="exampleInputFile"  name="image_010" onchange="mostraUm(this);">
                                            </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            {!! Form::label('image_011', 'Imagem 011: ' ) !!}
                                            <div class="">
                                                <input type="file" id="exampleInputFile"  name="image_011" onchange="mostraUm(this);">
                                            </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            {!! Form::label('image_012', 'Imagem 012: ' ) !!}
                                            <div class="">
                                                <input type="file" id="exampleInputFile"  name="image_012" onchange="mostraUm(this);">
                                            </div>
                                    </td>

                                </tr>
                    </table>

                        {!!Form::submit('ATUALIZAR', ['class' => 'btn btn-primary'])!!}

                    {!! Form::close() !!}
                    @include('pages-panel.modal-delete-evento')
                   <div class="text-fight">
                       <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o"></i> Deletar Evento</button>

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
