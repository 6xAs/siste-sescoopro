
@include('template-site.head')

@include('template-site.topo')

@include('template-site.menu')
<script type="text/javascript">
    window.onload = function()
    {
        CKEDITOR.replace( 'texto' );
    };
</script>
<section class="banner-1">
</section>
<!-- Notice Details -->
<!--gallery-->
<section class="gallery py-5">
    <div class="container py-md-4 mt-md-3">
        <h2 class="heading-agileinfo">{{ $evento->title }}<span>{{ $evento->local }} - Realizado em:  {{date('d/m/y', strtotime($evento->data))}}</span></h2>
        <span class="w3-line black"></span>
        <div class="row gallery-info mt-md-5 pt-5">
            <div class="col-md-3 col-sm-6 gallery-grids">
                <a href="" class="gallery-box" data-lightbox="example-set" data-title="">
                    <img src="/../images-eventos/{{ $evento->image_01 }}" alt="image" class="img-fluid zoom-img">
                </a>
            </div>
            <div class="col-md-3 col-sm-6 gallery-grids">
                <a href="" class="gallery-box" data-lightbox="example-set" data-title="">
                    <img src="/../images-eventos/{{ $evento->image_02 }}" alt="image" class="img-fluid zoom-img">
                </a>
            </div>
            <div class="col-md-3 col-sm-6 gallery-grids">
                <a href="#" class="gallery-box" data-lightbox="example-set" data-title="">
                    <img src="/../images-eventos/{{ $evento->image_03 }}" alt="image" class="img-fluid zoom-img">
                </a>
            </div>
            <div class="col-md-3 col-sm-6 gallery-grids">
                <a href="#" class="gallery-box" data-lightbox="example-set" data-title="">
                    <img src="/../images-eventos/{{ $evento->image_04 }}" alt="image" class="img-fluid zoom-img">
                </a>
            </div>
            <div class="col-md-3 col-sm-6 gallery-grids">
                <a href="#" class="gallery-box" data-lightbox="example-set" data-title="">
                    <img src="/../images-eventos/{{ $evento->image_05 }}" alt="image" class="img-fluid zoom-img">
                </a>
            </div>
            <div class="col-md-3 col-sm-6 gallery-grids">
                <a href="#" class="gallery-box" data-lightbox="example-set" data-title="">
                    <img src="/../images-eventos/{{ $evento->image_06 }}" alt="image" class="img-fluid zoom-img">
                </a>
            </div>
            <div class="col-md-3 col-sm-6 gallery-grids">
                <a href="#" class="gallery-box" data-lightbox="example-set" data-title="">
                    <img src="/../images-eventos/{{ $evento->image_07 }}" alt="image" class="img-fluid zoom-img">
                </a>
            </div>
            <div class="col-md-3 col-sm-6 gallery-grids">
                <a href="#" class="gallery-box" data-lightbox="example-set" data-title="">
                    <img src="/../images-eventos/{{ $evento->image_08 }}" alt="image" class="img-fluid zoom-img">
                </a>
            </div>
            <div class="col-md-3 col-sm-6 gallery-grids">
                <a href="#" class="gallery-box" data-lightbox="example-set" data-title="">
                    <img src="/../images-eventos/{{ $evento->image_09 }}" alt="image" class="img-fluid zoom-img">
                </a>
            </div>
            <div class="col-md-3 col-sm-6 gallery-grids">
                <a href="#" class="gallery-box" data-lightbox="example-set" data-title="">
                    <img src="/../images-eventos/{{ $evento->image_010 }}" alt="image" class="img-fluid zoom-img">
                </a>
            </div>
            <div class="col-md-3 col-sm-6 gallery-grids">
                <a href="#" class="gallery-box" data-lightbox="example-set" data-title="">
                    <img src="/../images-eventos/{{ $evento->image_011 }}" alt="image" class="img-fluid zoom-img">
                </a>
            </div>
            <div class="col-md-3 col-sm-6 gallery-grids">
                <a href="#" class="gallery-box" data-lightbox="example-set" data-title="">
                    <img src="/../images-eventos/{{ $evento->image_012 }}" alt="image" class="img-fluid zoom-img">
                </a>
            </div>

        </div>
        <script src="js/lightbox-plus-jquery.min.js"></script>
    </div>
</section>


<!-- //Notice Details -->


@include('template-site.infobar')

@include('template-site.footer')

@include('template-site.scriptsjs')
