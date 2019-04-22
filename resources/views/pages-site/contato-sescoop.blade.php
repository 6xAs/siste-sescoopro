
@include('template-site.head')

@include('template-site.topo')

@include('template-site.menu')
<section class="banner-1">
</section>
<!-- Notice Details -->
<section class="welcome py-5">
    <div class="container py-md-8 mt-md-8">
        <h2 class="heading-agileinfo">Nosso Contato<span></span></h2>
        <span class="w3-line black"></span>
        <div class="row about-tp mt-md-5 pt-5">
          <div class="contact_grid_right mt-5">
            @if(Session::has('message'))
                <div class="alert alert-success">
                      <button type="button" class="btn btn-success warning_2" data-dismiss="alert" aria-hidden="true">×</button>
                      {!! Session::get('message') !!}
                     
                </div>
            @endif
  					<h6>Preencha o formulário para entrar em cotato.</h6>
  					<form action="post-contato" method="post">
                        {{ csrf_field() }}
  						<div class="contact_left_grid">
  							<input type="text" name="name" placeholder="Nome" required="">
  							<input type="email" name="email" placeholder="Email" required="">
  							<input type="text" name="assunto" placeholder="Subject" required="">
  							<textarea name="message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Mensagem...</textarea>
  							<input type="submit" value="Enviar">
  							<input type="reset" value="Limpar">
  							<div class="clearfix"> </div>
  						</div>
  					</form>
  				</div>


        </div>
        <br><br>
        <div class="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3943.3094580963048!2d-63.90072348521535!3d-8.756926593709881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x92325ccfe9306af3%3A0x866291ced44d3642!2sR.+Quintino+Bocai%C3%BAva%2C+1671+-+Olaria%2C+Porto+Velho+-+RO%2C+76801-250!5e0!3m2!1spt-BR!2sbr!4v1555427201679!5m2!1spt-BR!2sbr" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>


</div>

</section>
<!-- //Notice Details -->




@include('template-site.infobar')

@include('template-site.footer')

@include('template-site.scriptsjs')
