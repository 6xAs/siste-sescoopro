@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@section('title', 'Inserir Banner')

<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">@yield('title')</h3>
                    <p class="panel-subtitle">Banner principal do site - Resolução (1600 x 900 px)</p>
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
                    {!! Form::open(['url' => 'input-banner',  'files' => true, 'method' => 'post']) !!}
                    {{ csrf_field() }}
                        <div class="form-group">
                            {!! Form::label('name', 'Nome: ' ) !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome do Banner', 'required' => 'required'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('title', 'Title: ' ) !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Titulo do Banner'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', 'Link: ' ) !!}
                            {!! Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'Ex:htt:\\exemplo.com.br'] ) !!}
                        </div>
                        <div class="form-group">

                            <div class="row">
                                        <div class="col-xs-4 col-md-12">
                                          <a href="#" class="thumbnail">

                                              <img id="visualizar" src="" width="840" height="740" alt="" />
                                          </a>
                                        </div>
                            </div>

                        </div>
                        <div class="form-group">
                            {!! Form::label('image', 'Imagem: *' ) !!}
                            <div class="custom-file">
                                <input type="file" id="exampleInputFile" requered="required"  name="image" onchange="imagePrincipal(this);">
                            </div>
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
