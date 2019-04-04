
@include('template-site.head')

@include('template-site.topo')

@include('template-site.menu')

<section class="banner-1">
</section>
<!-- Notice Details -->
<section class="welcome py-5">
    <div class="container py-md-4 mt-md-3">
        <h2 class="heading-agileinfo">{{$proSeletivo->title}} <span>{{$proSeletivo->subtitle}}</span></h2>
        <span class="w3-line black"></span>
        <div class="row about-tp mt-md-5 pt-5">
            <div class="col-lg-12 welcome-left">
                <h3>Edital: {{$proSeletivo->number_edital}}</h3>
                <h4>{{$proSeletivo->subtitle}}</h4>
                <p>{{date('d/m/y', strtotime($proSeletivo->data))}}</p>
            </div>
            <h2 class="heading-agileinfo">Arquivos</h2>

            <div class="col-lg-12 welcome-right">
                <div class="welcome-right-top">

                    <div class="">
                        <h4><a href="/../processo-seletivo/{{ $proSeletivo->file_01 }}" target="_blank">{{ $proSeletivo->file_01 }}</a></h4>

                    </div>
                </div>
            </div>
            <div class="col-lg-12 welcome-right">
                <div class="">
                    <h4><a href="/../processo-seletivo/{{ $proSeletivo->file_02 }}" target="_blank">{{ $proSeletivo->file_02 }}</a></h4>

                </div>
            </div>

            <div class="col-lg-12 welcome-right">
                <div class="">
                    <h4><a href="/../processo-seletivo/{{ $proSeletivo->file_03 }}" target="_blank">{{ $proSeletivo->file_03 }}</a></h4>

                </div>
            </div>

        </div>
    </div>




</section>
<!-- //Notice Details -->




@include('template-site.infobar')

@include('template-site.footer')

@include('template-site.scriptsjs')
