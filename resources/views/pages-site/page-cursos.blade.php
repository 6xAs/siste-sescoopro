
@include('template-site.head')

@include('template-site.topo')

@include('template-site.menu')

@section('title', 'Cursos')


<section class="services py-5">
    <div class="container py-md-4 mt-md-3">
        <h2 class="heading-agileinfo">@yield('title') <span>Confira aqui nossos cursos</span></h2>
        <span class="w3-line black"></span>
        <!-- Loop Notice -->
        @foreach ($curso as $curso)
            <div class="row inner_w3l_agile_grids-1 mt-md-5 pt-8">
                <div class="col-md-12 w3layouts_news_left_grid1">
                    <a href="{{URL::to('nossoscursos/'.$curso->id.'/details')}}">
                        <div class="new_top">

                            <h2 class="mb-12 mt-12">{{$curso->curso}}</h2>
                            <h3>Instrutor: {{$curso->instrutor}}</h3>
                            <h3>Carga Horária: {{$curso->carga_h}}h</h3>
                            <h3>Horário: {{$curso->horario}}</h3>
                            <h3>Cidade: {{$curso->cidade}}</h3>
                            <h3>Local: {{$curso->local}}</h3>
                            <h3>Data do Curso: {{date('d/m/y', strtotime($curso->data))}}</h3>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach

</section>


@include('template-site.infobar')

@include('template-site.footer')

@include('template-site.scriptsjs')
