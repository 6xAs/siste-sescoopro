<section class="wthree-row w3-about py-1">
	<div class="container py-md-4 mt-md-3">
		<h3 class="heading-agileinfo">Nossos Eventos<span>Confira nosos eventos em destaque!</span></h3>
		<span class="w3-line black"></span>

		<div class="card-deck mt-md-5 pt-5">
				@foreach ($evento as $evento)
				<a href="{{URL::to('showevento/'.$evento->id.'/show')}}">
					  <div class="card">
							<img src="images-eventos/{{$evento->image_01}}" class="img-fluid" alt="Image Default">
								<div class="card-body w3ls-card">
									  <a href="#"><h5 class="card-title">{{$evento->title}}</h5></a>
									  <p class="card-text mb-3">{!!$evento->description!!}</p>
									  <script>
										  var data = CKEDITOR.instances.editor.getData();

										  // Your code to save "data", usually through Ajax.
									  </script>

									  <h6>{{date('d/m/y', strtotime($evento->data))}}</h6>
								</div>
					  </div>
				  </a>
				  @endforeach

			</div>

		</div>
</section>
