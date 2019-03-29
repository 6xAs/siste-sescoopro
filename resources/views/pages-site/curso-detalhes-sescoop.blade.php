
@include('template-site.head')

@include('template-site.topo')

@include('template-site.menu')
<section class="banner-1">
</section>
<!-- Notice Details -->
<section class="welcome py-5">
    <div class="container py-md-12 mt-md-12">
        <h2 class="heading-agileinfo">{{$curso->curso}} <span></span></h2>

        <span class="w3-line black"></span>
        <div class="row about-tp mt-md-5 pt-5">

            <div class="col-lg-12 welcome-left">
                <figure>
                    <div class="boxVideo">
                        <iframe src="{{$curso->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <br>
                    <h5>Instrutor: {{$curso->instrutor}}</h5>
                    <h5>Carga Horária: {{$curso->carga_h}}h</h5>
                    <h5>Horário: {{$curso->horario}}</h5>
                    <h5>Cidade: {{$curso->cidade}}</h5>
                    <h5>Local: {{$curso->local}}</h5>
                    <h5>Data do Curso: {{date('d/m/y', strtotime($curso->data))}}</h5>
                </figure>




            </div>


        </div>
    </div>
    <h2 class="heading-agileinfo">Arquivos Disponíveis do Curso</h2>
    <table>
        <tr>
            <td>
                <div class="col-lg-8">
                    <div class="">
                         <a href="/../cursos/{{ $curso->file_01 }}" target="_blank">{{ $curso->file_01 }}</a>

                    </div>
                </div>

            </td>
            <td>
                <div class="col-lg-8">
                    <div class="">
                         <a href="/../cursos/{{ $curso->file_02 }}" target="_blank">{{ $curso->file_02 }}</a>

                    </div>
                </div>
            </td>
            <td>
                <div class="col-lg-8">
                    <div class="">
                         <a href="/../cursos/{{ $curso->file_03 }}" target="_blank">{{ $curso->file_03 }}</a>

                    </div>
                </div>
            </td>
        </tr>
    </table>
    <div class="">
        <h5 class="heading-agileinfo">
            <span> <br><br>
                <a href="/inscricao-curso" target="_blank"> <button type="button" class="btn btn-success" name="button">QUERO ME CANDIDATAR</button> </a>
            </span></h5>
    </div>


</section>
<!-- //Notice Details -->




@include('template-site.infobar')

@include('template-site.footer')

@include('template-site.scriptsjs')
