
@include('template-site.head')

@include('template-site.topo')

@include('template-site.menu')
<section class="banner-1">
</section>
<!-- Notice Details -->
<section class="welcome py-5">
    <div class="container py-md-4 mt-md-3">
        <h2 class="heading-agileinfo">{{$noticeDestaque->title}} <span>{{$noticeDestaque->subtitle}}</span></h2>
        <span class="w3-line black"></span>
        <div class="row about-tp mt-md-5 pt-5">
            <div class="col-lg-12 welcome-left">
                <h3>{{$noticeDestaque->editoria}}</h3>
                <p>{{date('d/m/y', strtotime($noticeDestaque->data))}}</p>

                {!!$noticeDestaque->description!!}
                <script>
                    var data = CKEDITOR.instances.editor.getData();

                    // Your code to save "data", usually through Ajax.
                </script>

            </div>
            <div class="col-lg-12 welcome-right">
                <div class="boxVideo">

                    <img src="/../images-notices/{{$noticeDestaque->image_01}}" alt="" class="img-fluid">

                    <iframe  src="{{$noticeDestaque->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

            <div class="col-lg-6 welcome-right">
                <div class="welcome-right-top">
                    <img src="/../images-notices/{{$noticeDestaque->image_01}}" alt="Imagem" class="img-fluid">

                </div>
            </div>
            <div class="col-lg-12 welcome-right">
                <div class="boxVideo">
                    <iframe  src="{{$noticeDestaque->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

        </div>
    </div>
    <h2 class="heading-agileinfo">Mais imagens</h2>
    <table>
        <tr>
            <td>
                <div class="col-lg-8">
                    <img src="/../images-notices/{{$noticeDestaque->image_02}}" alt="Imagem" class="img-fluid">
                </div>

            </td>
            <td>
                <div class="col-lg-8">
                    <img src="/../images-notices/{{$noticeDestaque->image_03}}" alt="" class="img-fluid">
                </div>
            </td>

        </tr>
    </table>


</section>
<!-- //Notice Details -->




@include('template-site.infobar')

@include('template-site.footer')

@include('template-site.scriptsjs')
