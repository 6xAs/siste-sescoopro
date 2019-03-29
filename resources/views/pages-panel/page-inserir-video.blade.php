@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@section('title', 'Inserir Vídeo Site')

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
                    {!! Form::open(['url' => 'input-video',  'files' => true, 'method' => 'post']) !!}
                    {{ csrf_field() }}
                        <div class="form-group">
                            {!! Form::label('name', 'Nome: ' ) !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome do Vídeo'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('link', 'Link: * ' ) !!}
                            {!! Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'Ex:https://www.youtube.com/embed/videoseries?list=PLx0sYbCqOb8TBPRdmBHs5Iftvv9TPboYG', 'required' => 'requird'] ) !!}
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

<!--// Form Inserir Banner -->

<!-- Form deprecied
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
-->

@include('template-panel.footer')
