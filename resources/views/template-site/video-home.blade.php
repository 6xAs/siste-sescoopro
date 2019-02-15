<!-- video -->
	<section class="video-grid1">
		<div class="demo-bg1">
			<div class="pop-bg text-center position-relative py-5">
				<div class="arrow-container animated fadeInDown">
					<a href="#small-dialog1" class="arrow-2 popup-with-zoom-anim">
						<i class="fa fa-play" aria-hidden="true"></i>
					</a>
					<div class="arrow-1 animated hinge infinite zoomIn"></div>
				</div>
				<!--  video-button-popup -->
				<div id="small-dialog1" class="mfp-hide">
					<div class="agileits_modal_body">
						@foreach ($video as $video)
							<iframe width="268" height="180" src="{{$video->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						@endforeach
					</div>
				</div>
				<!-- // video-button-popup -->
			</div>
		</div>
	</section>
<!-- //video -->
