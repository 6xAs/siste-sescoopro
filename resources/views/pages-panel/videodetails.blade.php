@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@section('title', 'Detalhes do Vídeo')

<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">@yield('title')</h3>
                    <h4 class="text-primary">ATENÇÃO: Apenas um vídeo poderá ser inserido de cada vez, ou seja
                    , o próximo vídeo terá de ser excluído para que um novo se atualize.</h4>

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
                                  <a href="{{ route('page-inserir-banner') }}" class="alert-link">Inserir outro Banner?</a>
                            </div>
                        @endif


                        	<div class="row">
                                <!-- Form Edit Banner -->
                                {!! Form::model($video,['route' =>  ['editvideo.update', $video->id], 'class' => '','method'=>'PUT','files'=>true]) !!}
                                {{ csrf_field() }}
                                <div class="form-group">
                                    {!! Form::label('name', 'Nome: ' ) !!}
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome do Vídeo'] ) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('link', 'Link: ' ) !!}
                                    {!! Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'Ex:https://www.youtube.com/embed/videoseries?list=PLx0sYbCqOb8TBPRdmBHs5Iftvv9TPboYG'] ) !!}
                                </div>

                                     <div class="form-group">

                                         <div class="row">
                                                     <div class="col-xs-4 col-md-12">
                                                       <a href="#" class="thumbnail">

                                                           <iframe width="260" height="180" src="{{$video->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                       </a>
                                                     </div>
                                         </div>

                                     </div>


                                      {!!Form::submit('ATUALIZAR', ['class' => 'btn btn-primary'])!!}


                                {!! Form::close() !!}
                                @include('pages-panel.modal-deletevideo')
                               <div class="text-fight">
                                   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o"></i> Deletar Vídeo</button>

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
