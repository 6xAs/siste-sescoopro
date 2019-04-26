<!-- Banner Slider -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">

    </ol>
        <div class="carousel-inner">

                <div class="carousel-item active">
                  <img class="d-block w-100" src="images/banner-home.jpg" alt="First slide">
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

</div>
