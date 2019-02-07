<div class="panel-body">
    <!-- Form Inserir Banner -->
    {!! Form::open(['url' => 'input-banner',  'files' => true, 'method' => 'post']) !!}
    {{ csrf_field() }}

        <div class="form-group">
            {!! Form::label('image', 'Imagem: *' ) !!}
            <div class="custom-file">
                {!! Form::file('avatar', null, ['class' => 'form-control', 'placeholder' => ''] ) !!}
            </div>
        </div>

        {!!Form::submit('INSERIR', ['class' => 'btn btn-primary'])!!}

    {!! Form::close() !!}
</div>
