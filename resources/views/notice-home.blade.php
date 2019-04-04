<!-- Notice Home -->
<section class="services py-1">
    <div class="container py-md-4 mt-md-3">
        <h2 class="heading-agileinfo">Notícias em Destaque</span></h2>
        <span class="w3-line black"></span>

            <div class="container">
            @foreach ($noticeDestaque as $noticeDestaque)
                  <div class="row">
                          <a href="{{URL::to('noticedestaque/'.$noticeDestaque->id.'/details')}}">
                                <div id="noticia-destaque" class="col-md-6">
                                  <div class="item-noticia">
                                     <!-- inicio noticia destaque -->
                                     <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                                             <div class="carousel-inner">
                                                 <!-- O loop entrará aqui -->
                                                     <div class="carousel-item active" data-interval="50000">
                                                       <img class="d-block w-100" src="images-destaque_notices/{{$noticeDestaque->image_01}}" alt="Second slide">

                                                     </div>


                                                     <div class="carousel-item">
                                                       <img class="d-block w-100" src="images-destaque_notices/{{$noticeDestaque->image_01}}" alt="Second slide">
                                                       <div class="carousel-caption d-none d-md-block">
                                                         <h3>{{$noticeDestaque->title}}</h3>
                                                         <h2>{{$noticeDestaque->editoria}}</h2>
                                                         <h6>{{date('d/m/y', strtotime($noticeDestaque->editoria))}}</h6>

                                                       </div>
                                                     </div>
                                                     <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                     <span class="sr-only">Voltar</span>
                                                     </a>
                                                     <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                     <span class="sr-only">Next</span>
                                                     </a>

            @endforeach

                                             </div>
                            </a>

                         </div>
                         <!--// noticia destaque -->
                      </div>
                    </div>
                    <div id="lista-noticias" class="col-md-6 bk-lista-noticia">

                      <div class="row">
                           <!-- Início Notícias -->
                           @foreach ($notice as $notice)
                                <div class="item-noticia col-md-6">
                                  <a href="{{URL::to('notice/'.$notice->id.'/details')}}">
                                    <span class="category-title" style="color:#20B2AA">{{$notice->editoria}}</span>
                                    <div class="informacoes">
                                     <h5>{{$notice->title}}</h5>
                                     <p style="color:#A9A9A9">{{date('d/m/y', strtotime($notice->data))}}</p>
                                     <p>{{$notice->subtitle}}</p>

                                    </div>
                                  </a>
                                </div>
                           @endforeach
                        <!--  -->

                      </div>

                    </div>

                </div>
            </div>
    </div>
    <div class="heading-agileinfo">
        <a href="/noticias-sescoopro"> <button class="btn btn-success" type="button" name="button">Veja todas as notícias</button> </a>
    </div>

</section>
