@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@include('scripts.script_formselect')

@section('title', 'Detalhes Deste Edital - Processo Seletivo')

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
                                  <a href="{{ route('page-inserir-proSeletivo') }}" class="alert-link">Inserir outro Documento?</a>
                            </div>
                        @endif


                        	<div class="row">
                                <!-- Form Edit Banner -->
                                <!-- Form Inserir Banner -->
                                {!! Form::model($proSeletivo,['route' =>  ['proSeletivo.update', $proSeletivo->id], 'class' => '','method'=>'PUT','files'=>true]) !!}
                                {{ csrf_field() }}
                                    <div class="form-group">
                                        {!! Form::label('number_edital', 'Número do Edital:* ' ) !!}
                                        {!! Form::text('number_edital', null, ['class' => 'form-control input-lg', 'placeholder' => 'Ex:111/2018', 'required'] ) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('title', 'Título Principal:* ' ) !!}
                                        {!! Form::text('title', null, ['class' => 'form-control input-lg', 'placeholder' => 'Descreva o Título Principal', 'required'] ) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('subtitle', 'Sub Título:* ' ) !!}
                                        {!! Form::text('subtitle', null, ['class' => 'form-control input-lg', 'placeholder' => 'Descreva o sub título'] ) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('data', 'Data:* ' ) !!}
                                        {!! Form::date('data', null, ['class' => 'form-control input-lg', 'placeholder' => 'data', 'required'] ) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('observacao', 'Observação:* ' ) !!}
                                        {!! Form::textarea('observacao', null, ['class' => 'form-control input-lg', 'placeholder' => 'Descreva a observação'] ) !!}
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


                                    {!!Form::submit('ATUALIZAR', ['class' => 'btn btn-primary'])!!}

                                {!! Form::close() !!}
                                @include('pages-panel.modal-delete-proSeletivo')
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
