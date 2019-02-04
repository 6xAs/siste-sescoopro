@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@section('title', 'Editar Banner')

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
                                  <a href="page-inserir-banner" class="alert-link">Inserir outro Banner?</a>
                            </div>
                        @endif


                        	<div class="row">
                                <!-- Form Edit Banner -->
                                {!! Form::model($banner,['route' =>  ['editbanner.update', $banner->id], 'class' => '','method'=>'PUT','files'=>true]) !!}
                                {{ csrf_field() }}
                                    <div class="form-group">
                                        {!! Form::label('name', 'Nome: ' ) !!}
                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => ''] ) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('title', 'Title: ' ) !!}
                                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => ''] ) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('link', 'Link: ' ) !!}
                                        {!! Form::text('link', null, ['class' => 'form-control', 'placeholder' => ''] ) !!}
                                    </div>


                                     <div class="form-group">

                                         <div class="row">
                                                     <div class="col-xs-4 col-md-12">
                                                       <a href="#" class="thumbnail">

                                                           <img id="visualizar" src="/../images-banner/{{ $banner->image }}" width="840" height="560" alt="" />
                                                       </a>
                                                     </div>
                                         </div>

                                     </div>

                                      <div class="form-group">
                                          <input type="file" id="exampleInputFile"  name="image" onchange="imagePrincipal(this);">
                                      </div>
                                      {!!Form::submit('ATUALIZAR', ['class' => 'btn btn-primary'])!!}


                                {!! Form::close() !!}
                                @include('pages-panel.modal-delete')
                               <div class="text-fight">
                                   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o"></i> Deletar Banner</button>

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
