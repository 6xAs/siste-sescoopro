
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
<section class="welcome py-5">
    <div class="container py-md-4 mt-md-3">
        <h2 class="heading-agileinfo">{{$notice->title}} <span>{{$notice->subtitle}}</span></h2>
        <span class="w3-line black"></span>
        <div class="row about-tp mt-md-5 pt-5">
            <div class="col-lg-12 welcome-left">
                <h3>{{$notice->editoria}}</h3>
                <p>{{date('d/m/y', strtotime($notice->data))}}</p>
                {!!$notice->description!!}
                <script>
                    var data = CKEDITOR.instances.editor.getData();

                    // Your code to save "data", usually through Ajax.
                </script>
            </div>

            <div class="col-lg-12 welcome-right">
                <div class="boxVideo">

                    <img src="/../images-notices/{{$notice->image_01}}" alt="" class="img-fluid">
                </div>
            </div>
            <br>
            <div class="col-lg-12 welcome-right">
                <div class="boxVideo">
                    <img src="/../images-notices/{{$notice->image_02}}" alt="Imagem" class="img-fluid">
                </div>
            </div>
            <br>
            <div class="col-lg-12 welcome-right">
                <div class="boxVideo">
                    <img src="/../images-notices/{{$notice->image_03}}" alt="Imagem" class="img-fluid">

                </div>
            </div>
            <br>
            <div class="col-lg-12 welcome-right">
                <div class="boxVideo">

                    <iframe  src="{{$notice->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <br>
        </div>
    </div>
</section>
<!-- //Notice Details -->


@include('template-site.infobar')

@include('template-site.footer')

@include('template-site.scriptsjs')
