
@include('template-site.head')

@include('template-site.topo')

@include('template-site.menu')
<section class="banner-1">
</section>
<!-- Notice Details -->
<section class="welcome py-5">
    <div class="container py-md-8 mt-md-8">
        <h2 class="heading-agileinfo">Lista de Cooperativas<span></span></h2>
        <span class="w3-line black"></span>
        <div class="row about-tp mt-md-5 pt-5">
            <div class="col-md-12">

                <h4>PANORAMA DO COOPERATIVISMO - 2017</h4>
                <p>Panorama com os números de cooperativas registradas na OCB/RO, bem como o quantitativo de cooperados e empregados.</p><br>
                    <a href="{{asset('document/lista-de-cooperativas-2017-coopssane.pdf')}}" target="_blank"> <button type="button" class="btn btn-success" name="button">CLIQUE AQUI PARA BAIXAR A LISTA DE COOPERATIVAS</button> </a> <br>

                <p>Cooperativas registradas na OCB</p>
            </div>

        </div>

</div>

</section>
<!-- //Notice Details -->

@include('template-site.infobar')

@include('template-site.footer')

@include('template-site.scriptsjs')
