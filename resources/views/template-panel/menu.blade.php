<!-- MENU  -->
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="{{ route('home-panel') }}" class=""><i class="lnr lnr-home"></i> <span>Home</span></a></li>
                <!-- Banner -->
                <li>
                    <a href="#subPages1" data-toggle="collapse" class="collapsed"><i class="lnr lnr-bookmark"></i> <span>Banner</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages1" class="collapse ">
                        <ul class="nav">
                            <li><a href="{{ route('page-inserir-banner') }}" class="">Inserir</a></li>
                            <li><a href="{{ route('page-listar-banner') }}" class="">Listar</a></li>
                        </ul>
                    </div>
                </li>
                <!--// Banner -->
                <!-- Noticia -->
                <li>
                    <a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="fa fa-address-card"></i> <span>Notícias</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages2" class="collapse ">
                        <ul class="nav">
                            <li><a href="{{ route('page-inserir-notice') }}" class="">Inserir</a></li>
                            <li><a href="{{ route('page-listar-notice') }}" class="">Listar</a></li>

                        </ul>
                    </div>
                </li>
                <!--// Noticia -->
                <!-- Noticia  Destaque -->
                <li>
                    <a href="#subPages3" data-toggle="collapse" class="collapsed"><i class="fa fa-star"></i> <span>Notícia Destaque</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages3" class="collapse ">
                        <ul class="nav">
                            <li><a href="{{ route('page-inserir-noticedestaque') }}" class="">Inserir Notícia Destaque</a></li>
                            <li><a href="{{ route('page-listar-noticedestaque') }}" class="">Listar Notícia Destaque</a></li>

                        </ul>
                    </div>
                </li>
                <!--// Noticia Destaque -->
                <!-- Eventos -->
                <li>
                    <a href="#subPages4" data-toggle="collapse" class="collapsed"><i class="lnr lnr-rocket"></i> <span>Eventos</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages4" class="collapse ">
                        <ul class="nav">
                            <li><a href="#" class="">Inserir</a></li>
                            <li><a href="#" class="">Listar</a></li>
                        </ul>
                    </div>
                </li>
                <!--// Eventos -->
                <!-- Cursos -->
                <li>
                    <a href="#subPages4" data-toggle="collapse" class="collapsed"><i class="lnr lnr-book"></i> <span>Cursos</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages4" class="collapse ">
                        <ul class="nav">
                            <li><a href="#" class="">Inserir</a></li>
                            <li><a href="#" class="">Listar</a></li>
                        </ul>
                    </div>
                </li>
                <!--// Cursos -->

                <!-- Galeria Imagens -->
                <li>
                    <a href="#subPages6" data-toggle="collapse" class="collapsed"><i class="lnr lnr-picture"></i> <span>Galeria Imagens</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages6" class="collapse ">
                        <ul class="nav">
                            <li><a href="#" class="">Inserir</a></li>
                            <li><a href="#" class="">Listar</a></li>
                        </ul>
                    </div>
                </li>
                <!--// Galeria Imagens -->
                <!-- Video Site -->
                <li>
                    <a href="#subPages7" data-toggle="collapse" class="collapsed"><i class="lnr lnr-camera-video"></i> <span>Video Site</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages7" class="collapse ">
                        <ul class="nav">
                            <li><a href="#" class="">Inserir</a></li>
                            <li><a href="#" class="">Listar</a></li>
                        </ul>
                    </div>
                </li>
                <!--// Video Site -->
                <!-- Licitações -->
                <li>
                    <a href="#subPages8" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-add"></i> <span>Licitações</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages8" class="collapse ">
                        <ul class="nav">
                            <li><a href="{{route('page-inserir-licitacao')}}" class="">Inserir</a></li>
                            <li><a href="{{route('page-listar-licitacao')}}" class="">Listar</a></li>
                        </ul>
                    </div>
                </li>
                <!--// Licitações -->
                <!-- Transparência -->
                <li>
                    <a href="#subPages9" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Transparência</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages9" class="collapse ">
                        <ul class="nav">
                            <li><a href="{{route('page-inserir-transparency')}}" class="">Inserir</a></li>
                            <li><a href="{{route('page-listar-transparency')}}" class="">Listar</a></li>
                        </ul>
                    </div>
                </li>
                <!--// Transparência -->
                <li><a href="#" class=""><i class="lnr lnr-users"></i> <span>Instrutores</span></a></li>
                <li><a href="#" class=""><i class="lnr lnr-graduation-hat"></i> <span>Banco Talentos</span></a></li>
                <li><a href="#" class=""><i class="lnr lnr-power-switch"></i> <span>Sair</span></a></li>

            </ul>
        </nav>
    </div>
</div>
<!--// MENU -->
