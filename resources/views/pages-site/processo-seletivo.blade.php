
@include('template-site.head')

@include('template-site.topo')

@include('template-site.menu')

@section('title', 'Processo Seletivo')


<section class="services py-5">
    <div class="container py-md-4 mt-md-3">
        <h2 class="heading-agileinfo">@yield('title') <span>Confira aqui todos os documentos do processo seletivo</span></h2>
        <span class="w3-line black"></span>
        <!-- Loop Notice -->
        @foreach ($proSeletivo as $proSeletivo)
            <div class="row inner_w3l_agile_grids-1 mt-md-5 pt-8">
                <div class="col-md-12 w3layouts_news_left_grid1">
                    <a href="{{URL::to('proseletivo/'.$proSeletivo->id.'/details')}}">
                        <div class="new_top">

                            <h3 class="mb-8 mt-8">{{$proSeletivo->title}}</h3>
                            <h5>Edital: {{$proSeletivo->number_edital}}</h5>
                            <h6>Data: {{date('d/m/y', strtotime($proSeletivo->data))}}</h6>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach

</section>


@include('template-site.infobar')

@include('template-site.footer')

@include('template-site.scriptsjs')
