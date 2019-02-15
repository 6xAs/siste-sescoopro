<!-- Banner Slider -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">Hello</li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
        <div class="carousel-inner">

                <div class="carousel-item active">
                  <img class="d-block w-100" src="images/bg3.jpg" alt="First slide">
                  <div class="carousel-caption d-none d-md-block">
                    <h3></h3>
                  </div>
                </div>
                <!-- O loop entrará aqui -->
                @foreach ($banner as $banner)

                        <div class="carousel-item">
                          <a href="{{$banner->link}}"><img class="d-block w-100" src="images-banner/{{$banner->image}}" ></a>
                          <div class="carousel-caption d-none d-md-block">
                            <h3>{{$banner->title}}</h3>
                          </div>
                        </div>

                @endforeach
        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Voltar</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
</div>
