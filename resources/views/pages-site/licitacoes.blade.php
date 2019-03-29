
@include('template-site.head')

@include('template-site.topo')

@include('template-site.menu')

@section('title', 'Licitações')


<section class="banner-1">
</section>
<!-- Notice Details -->
<section class="welcome py-5">
    <div class="container py-md-8 mt-md-8">
        <div class="col-md-12">

                <div class="new_top">
                    <h2 class="heading-agileinfo">@yield('title')
                        <span>Encontre aqui a licitação que você procura <br><br>
                            <a href="/licitacoes" target="_blank"> <button type="button" class="btn btn-success" name="button">DOCUMENTOS DE LICITAÇÕES</button> </a>
                        </span></h2>
                </div>

        </div>


        <span class="w3-line black"></span>
        <div class="row about-tp mt-md-5 pt-5">



        </div>
    </div>




</section>
<!-- //Notice Details -->




@include('template-site.infobar')

@include('template-site.footer')

@include('template-site.scriptsjs')
