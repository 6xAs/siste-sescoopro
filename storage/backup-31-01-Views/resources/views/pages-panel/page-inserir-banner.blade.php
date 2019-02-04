@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Inserir Banner</h3>
                    <p class="panel-subtitle">Banner principal do site - Resolução (0000 x 0000 px)</p>
                    <p class="text-primary">ATENÇÃO: Campos com * são obrigatórios</p>
                </div>
                <div class="panel-body">
                    <!-- Form Inserir Banner -->
                    {!! Form::open(['url' => 'input-banner', 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('nome', 'Nome: ' ) !!}
                            {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => ''] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('title', 'Title: ' ) !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => ''] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', 'Link: *' ) !!}
                            {!! Form::text('link', null, ['class' => 'form-control', 'placeholder' => ''] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('image', 'Imagem: *' ) !!}
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile">
                              <label class="custom-file-label" for="customFile">Choose file</label>
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
