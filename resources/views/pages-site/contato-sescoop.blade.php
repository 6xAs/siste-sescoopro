
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
                      <a href="page-inserir-notice" class="alert-link">Inserir outra Notícia?</a>
                </div>
            @endif
  					<h6>Preencha o formulário para entrar em cotato.</h6>
  					<form action="#" method="post">
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
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d273690.1704056744!2d-74.59673804968976!3d40.72070782081099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1521532554788" class="map" style="border:0" allowfullscreen=""></iframe>
				</div>


</div>

</section>
<!-- //Notice Details -->




@include('template-site.infobar')

@include('template-site.footer')

@include('template-site.scriptsjs')
