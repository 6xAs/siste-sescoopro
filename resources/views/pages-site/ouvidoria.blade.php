
@include('template-site.head')

@include('template-site.topo')

@include('template-site.menu')
<section class="banner-1">
</section>
<!-- Notice Details -->
<section class="welcome py-5">
    <div class="container py-md-8 mt-md-8">
        <h2 class="heading-agileinfo">Ouvidoria<span></span></h2>
        <span class="w3-line black"></span>
        <div class="row about-tp mt-md-5 pt-5">
          <div class="contact_grid_right mt-5">
            @if(Session::has('message'))
                <div class="alert alert-success">
                      <button type="button" class="btn btn-success warning_2" data-dismiss="alert" aria-hidden="true">×</button>
                      {!! Session::get('message') !!}
                      <a href="page-inserir-notice" class="alert-link">Inserir outra Notícia?</a>
                </div>
            @endif
  					<h6>Preencha o formulário para entrar em cotato.</h6>
                    <form name="form" post="/post-ouvidoria">
                      <div class="form-group">
                        <label for="formGroupExampleInput">Seu Email</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ex: seunome@mail.com">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput">Tipo de Relato</label>
                        <select class="form-control" name="tipo_relato">


                        </select>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ex: seunome@mail.com">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Another label</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                      </div>
                    </form>
  				</div>


        </div>
        <br><br>



</div>

</section>
<!-- //Notice Details -->




@include('template-site.infobar')

@include('template-site.footer')

@include('template-site.scriptsjs')
