'use strict';

var App = angular.module('portalApp',['ui.router','angularMoment']);

App.run(function($rootScope, $templateCache) {
    $rootScope.$on('$routeChangeStart', function(event, next, current) {
        if (typeof(current) !== 'undefined'){
            $templateCache.remove(current.templateUrl);
        }
    });
});

App.directive('myEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if (event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.myEnter);
                    angular.element('#all').triggerHandler('click');
                });
                event.preventDefault();
            }
        });
    };
});

App.constant('API_CONFIG', {
  'url' : 'http://api-portalsomoscoop-hmlg.ocb.org.br/'
  //'url' : 'http://api.somoscooperativismo.coop.br/'
  //'url' : 'http://api.portal-ocb.dev/'
});

App.run(function($rootScope,$location, $http, $state, API_CONFIG) {
    $rootScope.$on("$locationChangeSuccess", function() {
        var url = $location.absUrl();
        // medida apenas para versão OS Merge 077-2017. Excluir na proxima entrega.
        var getEBPC = url.split('/');
        if (getEBPC[3] == '#%2FEBPC') {
          $state.go('EBPC');
        } else if (getEBPC[3] == '#%2FEBPC-sobre') {
          $state.go('EBPC-sobre');
        } else if (getEBPC[3] == '#%2FEBPC-diretrizes') {
          $state.go('EBPC-diretrizes');
        } else if (getEBPC[3] == '#%2FEBPC-submissao' ) {
          $state.go('EBPC-submissao');
        } else if (getEBPC[3] == '#%2FEBPC-contato' ) {
          $state.go('EBPC-contato');
        } else if (getEBPC[3] == '#%2FEBPC-programacao' ) {
          $state.go('EBPC-programacao');
        }         
        //até aqui.      
        var rotas = function() {
            $http.get(API_CONFIG.url + 'routes')
            .then(function (result) {
                var allRoutes = result.data;
                var rota = [];
                angular.forEach(allRoutes, function(value) {
                    var path = value.split('/');
                    var caminhoRota = path[1]; // posição da rota no array
                    if (rota.indexOf(caminhoRota) == -1 && caminhoRota != undefined)
                        this.push(caminhoRota);
                }, rota);
                rota[0] = '/';
                var caminho = url.substr(API_CONFIG.url.length-4, url.length);
                var descPath = caminho.split('/');

                if (caminho.indexOf('noticia') != -1 && descPath[1] != undefined) {
                    $http.get(API_CONFIG.url + 'portal/noticia/'+ descPath[1])
                    .then(function (result){
                        var noticia = result.data;
                        noticia.noticia[0].url = trataUrl(noticia.noticia[0].titulo);

                        if (noticia.noticia[0].url != descPath[2]) {
                            $state.go('pagina-nao-encontrada');    
                        }
                    })
                }

                if (caminho.indexOf('servico') != -1 && descPath[1] != undefined) {
                    $http.get(API_CONFIG.url + 'portal/servico/'+ descPath[1])
                    .then(function (result){
                        var servico = result.data;
                        servico.servico[0].url = trataUrl(servico.servico[0].descricao);

                        if (servico.servico[0].url != descPath[2]) {
                            $state.go('pagina-nao-encontrada');    
                        }
                    })
                }
            });
        };
        rotas();
    });
});

App.config(['$stateProvider', '$urlRouterProvider','$locationProvider', function($stateProvider, $urlRouterProvider, $locationProvider){

    $locationProvider.html5Mode(true).hashPrefix('!');
    $urlRouterProvider.otherwise("/pagina-nao-encontrada");
                
    $stateProvider
        .state('index', {
            controller: function (API_CONFIG, $scope, $state, $http, $anchorScroll) {
                $anchorScroll();
                $state.go("/");
                $scope.query = {
                  search: '',
                  filter: '',
                  limit: '4',
                  order: '-id',
                  page: 1
                };
                $scope.searchResult = {
                  data: [],
                  count: 0,
                  countNoticia: 0,
                  countServico: 0
                };
                
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };
            }
        })
        .state('/', {
            url: "/",
            templateUrl: "html/home.html" ,
            controller: function(API_CONFIG, $scope, $http, $state, $sce, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "index";
                $scope.url_api = API_CONFIG.url;
                $scope.noticias = {};
                $scope.query = {
                    search: '',
                    filter: '',
                    limit : '4',
                    order : '-id',
                    page  : 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };

                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };

                $scope.goNoticiaSingle = goNoticiaSingle;
                $scope.urlVideo = urlVideo;

                var getNoticia = getNoticia;

                getNoticia();

                function goNoticiaSingle(id, url) {
                    $state.go('noticia-single',{id:id, url:url});
                    return;
                }

                function urlVideo(url) {
                    url = 'http://www.youtube.com/embed/' + youtube_parser(url);
                    return $sce.trustAsResourceUrl(url);
                }
                function getNoticia() {
                    $http.get(API_CONFIG.url + 'portal/noticia-destaque/all')
                    .then(function (result) {
                        $scope.noticias = result.data;
                        for (var i = 0; i < $scope.noticias.destaque_principal.data.length; i++) {
                            $scope.noticias.destaque_principal.data[i].data_publicacao = moment($scope.noticias.destaque_principal.data[i].data_publicacao).format('DD/MM/YYYY');
                            $scope.noticias.destaque_principal.data[i].url = trataUrl($scope.noticias.destaque_principal.data[i].titulo);
                        }
                        for (var i = 0; i < $scope.noticias.destaques.data.length; i++) {
                            $scope.noticias.destaques.data[i].data_publicacao = moment($scope.noticias.destaques.data[i].data_publicacao).format('DD/MM/YYYY');
                            $scope.noticias.destaques.data[i].url = trataUrl($scope.noticias.destaques.data[i].titulo);
                            $scope.noticias.destaques.data[i].sub_titulo = $scope.noticias.destaques.data[i].sub_titulo.length > 80 
                                                                            ? $scope.noticias.destaques.data[i].sub_titulo.substring(0, 80) + '...'
                                                                            : $scope.noticias.destaques.data[i].sub_titulo;
                            $scope.noticias.destaques.data[i].titulo = $scope.noticias.destaques.data[i].titulo.length > 50 
                                                                        ? $scope.noticias.destaques.data[i].titulo.substring(0, 50) + '...'
                                                                        : $scope.noticias.destaques.data[i].titulo;                                                
                        }
                        return;
                    });
                }
                function youtube_parser(url){
                    if (url == undefined || url == '') {
                        return;
                    }
                    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
                    var match = url.match(regExp);
                    return (match&&match[7].length==11)? match[7] : false;
                }
            }
        })
        .state('pagina-nao-encontrada', {
            url: "/pagina-nao-encontrada",
            templateUrl: "html/pagina-nao-encontrada.html",
            controller: function(API_CONFIG, $scope, $http, $state, $sce, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "pagina-nao-encontrada";
            }
        })        
        .state('noticias', {
            url: "/noticias/:ultimasTags",
            templateUrl: "html/noticias.html" ,
            controller: function(API_CONFIG, $scope, $http, $sce, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "noticias";

                $scope.queryCategorias = {
                    categoria : 0,
                    ramo      : 0
                };
                $scope.noticias = [];
                $scope.categorias = [];
                $scope.queryCategorias = {
                    search: '',
                    filter: '',
                    limit : '9999',
                    order : '-id',
                    page  : 1
                };
                $scope.servicoRamo = '';
                $scope.queryServicoRamo = {
                    filter: '',
                    limit : '9999',
                    order : '-id',
                    page  : 1
                };
                $scope.tags = [];
                $scope.firstPage = 1;
                $scope.query = {
                    search   : '',
                    filter   : '',
                    limit    : '15',
                    order    : '-id',
                    page     : 1,
                    categoria: 0,
                    ramo     : 0
                };

                $scope.limitPage = 1;

                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };

                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };          

                var getNoticias         = getNoticias;
                var getCategorias       = getCategorias;
                var getServicoRamo      = getServicoRamo;

                $scope.previousPage     = previousPage;
                $scope.nextPage         = nextPage;
                $scope.goPage           = goPage;
                $scope.lessPage         = lessPage;
                $scope.morePage         = morePage;
                $scope.html             = html;
                $scope.ultimasHoras     = ultimasHoras;
                $scope.ultimosDias      = ultimosDias;
                $scope.ultimosDias      = ultimosDias;
                $scope.ultimosMeses     = ultimosMeses;
                $scope.ultimasTags      = ultimasTags;
                $scope.categoriaChange  = categoriaChange;
                $scope.ramoChange       = ramoChange;

                if (angular.isDefined($stateParams.ultimasTags)) { 
                    ultimasTags($stateParams.ultimasTags);
                } else {
                    getNoticias();
                }

                getCategorias();
                getTagsCount();
                getServicoRamo();

                function getServicoRamo () {
                    $http.get(API_CONFIG.url + 'portal/ramos?searchFields=name:like&search=' + $scope.queryServicoRamo.filter + '&sortedBy=' + $scope.queryServicoRamo.order + '&orderBy=name&per_page=' + $scope.queryServicoRamo.limit + '&page=' + $scope.queryServicoRamo.page + '&selected_only=' + $scope.queryServicoRamo.selected_only)
                    .then(function (result) {
                        $scope.servicoRamo = result.data;
                        return;
                    });
                }

                function categoriaChange() {
                    $scope.query.categoria = $scope.entity.categoria;
                    $scope.query.page = 1;
                    getNoticias();
                }

                function ramoChange() {
                    $scope.query.ramo = $scope.entity.ramo;
                    getNoticias();
                }

                function ultimasHoras(horas) {
                    $scope.query.filter = horas + "-horas";
                    $scope.query.page = 1;
                    getNoticias();
                }

                function ultimosDias(dias) {
                    $scope.query.filter = dias + "-dias";
                    $scope.query.page = 1;
                    getNoticias();
                }

                function ultimosMeses(meses) {
                    $scope.query.filter = meses + "-meses";
                    $scope.query.page = 1;
                    getNoticias();
                }

                function ultimasTags(tag) {
                    $scope.query.page = 1;
                    getNoticias();
                }

                function html(content) {
                    content = htmlReplaceYoutube(content);
                    return $sce.trustAsHtml(content);
                }

                function morePage () {
                    $scope.firstPage = $scope.firstPage + 5;
                    if (($scope.noticias.last_page-($scope.firstPage+4))<0) {
                        $scope.limitPage = 5 + ($scope.noticias.last_page-($scope.firstPage+4));
                    }
                    if ($scope.firstPage+4 >= $scope.noticias.last_page) {
                        $scope.firstPage = $scope.noticias.last_page - 5;
                        $scope.limitPage = 5;
                    }

                    goPage ($scope.firstPage);
                }

                function lessPage () {
                    $scope.firstPage = $scope.firstPage - 5;
                    if ($scope.firstPage<=0) {
                        $scope.firstPage = 1;
                    }
                    $scope.limitPage = 5 ;
                    goPage ($scope.firstPage);
                }

                function goPage (page) {
                    $scope.query.page = page;
                    getNoticias();
                }

                function previousPage () {
                    $scope.query.page = $scope.query.page - 1;
                    $scope.firstPage = $scope.query.page;
                    if ($scope.query.page<=5) {
                        $scope.firstPage = 1;
                    }
                    if ($scope.query.page<=1) {
                        $scope.query.page = 1;
                        $scope.firstPage  = 1;
                        return;
                    }
                    getNoticias();
                }

                function nextPage () {
                    if (($scope.query.page + 1) > $scope.noticias.last_page) {
                        return;
                    }
                    if (($scope.noticias.last_page-($scope.firstPage+5))<0) {
                        $scope.limitPage = 5 + ($scope.noticias.last_page-($scope.query.page+5));
                    }
                    $scope.query.page = $scope.query.page + 1;
                    if ($scope.query.page>5 && $scope.firstPage+4 < $scope.noticias.last_page) {
                        $scope.firstPage = $scope.noticias.last_page - 5;
                        $scope.limitPage = 5;
                    }
                    getNoticias();
                }

                function getNoticias () {
                    $http.get(API_CONFIG.url + 'portal/noticias?searchFields=name:like&search=' + $scope.query.filter + '&sortedBy=' + $scope.query.order + '&orderBy=name&per_page=' + $scope.query.limit + '&page=' + $scope.query.page + '&selected_only=' + $scope.query.selected_only + '&date_filter&categoria=' + $scope.query.categoria + '&ramo=' + $scope.query.ramo)
                    .then(function (result) {
                        $scope.noticias = result.data;
                        for (var i=0; i < $scope.noticias.data.length; i++) {
                            $scope.noticias.data[i].data_publicacao = moment($scope.noticias.data[i].data_publicacao).format('DD/MM/YYYY');
                            $scope.noticias.data[i].url = trataUrl($scope.noticias.data[i].titulo);
                        }
                        $scope.limitPage = 1;
                        if (($scope.noticias.total/$scope.query.limit)>5) $scope.limitPage = 5;
                        else if (($scope.noticias.total/$scope.query.limit)>4) $scope.limitPage = 5;
                        else if (($scope.noticias.total/$scope.query.limit)>3) $scope.limitPage = 4;
                        else if (($scope.noticias.total/$scope.query.limit)>2) $scope.limitPage = 3;
                        else if (($scope.noticias.total/$scope.query.limit)>1) $scope.limitPage = 2;
                        return;
                    });
                }

                function getCategorias () {
                    $http.get(API_CONFIG.url + 'portal/categorias?searchFields=name:like&search=' + $scope.queryCategorias.filter + '&sortedBy=' + $scope.queryCategorias.order + '&orderBy=name&per_page=' + $scope.queryCategorias.limit + '&page=' + $scope.queryCategorias.page + '&selected_only=' + $scope.queryCategorias.selected_only)
                    .then(function (result) {
                        $scope.categorias = result.data;
                        return;
                    });
                }

                function getTagsCount () {
                    $http.get(API_CONFIG.url + 'portal/noticia-tagcount')
                    .then(function (result) {
                        $scope.tags = result.data;
                        return;
                    });
                }
            }
        })
        .state('noticia-single', {
            url: "/noticia/:id/:url",
            templateUrl: "html/noticia-single.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $sce, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "noticia-single";
                $scope.noticias = {};
                $scope.facebookShare = facebookShare;
                $scope.html = html;
                $scope.query = {
                    search: '',
                    filter: '',
                    limit : '4',
                    order : '-id',
                    page  : 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                

                var idNoticia = $stateParams.id;
                var getNoticia = getNoticia;
                getNoticia();

                function html(content) {
                    content = htmlReplaceYoutube(content);
                    return $sce.trustAsHtml(content);
                }

                function facebookShare(id) {
                    return API_CONFIG.url + "/noticia/#/noticia/"+id;
                }

                function getNoticia () {
                    $http.get(API_CONFIG.url + 'portal/noticia/' + idNoticia + '??searchFields=name:like&search=' + $scope.query.filter + '&sortedBy=' + $scope.query.order + '&orderBy=name&per_page=' + $scope.query.limit + '&page=' + $scope.query.page + '&selected_only=' + $scope.query.selected_only)
                    .then(function (result) {
                        $scope.noticias = result.data;
                        var tags = $scope.noticias.noticia[0].tags.split(";");
                        $scope.noticias.noticia[0].tags = tags;
                        for (var i = 0; i < $scope.noticias.relacionadas.data.length; i++) {
                            $scope.noticias.relacionadas.data[i].data_publicacao = moment($scope.noticias.relacionadas.data[i].data_publicacao).format('DD/MM/YYYY');
                            $scope.noticias.relacionadas.data[i].url = trataUrl($scope.noticias.relacionadas.data[i].titulo);
                        }
                        return;
                    });
                }
            }
        })
        .state('biblioteca', {
            url: "/biblioteca",
            templateUrl: "html/biblioteca.html",
            controller: function (API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "biblioteca";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                
                $scope.getSearch = function() {
                $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                  .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                }
            }
        })
        .state('contato', {
            url: "/contato",
            templateUrl: "html/contato.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "contato";
                $scope.entity = {
                    'nome'     : '',
                    'email'    : '',
                    'celular'  : '',
                    'fixo'     : '',
                    'mensagem' : '',
                };

                $scope.enviarContato  = enviarContato;
                $scope.captcha = '';
                $scope.estados = [];
                $scope.queryEstados = {
                    search: '',
                    filter: '',
                    limit : '9999',
                    order : '-id',
                    page  : 1
                };
                $scope.getEstados = getEstados;
                $scope.assuntos = [];
                $scope.queryAssuntos = {
                    search: '', 
                    filter: '',
                    limit : '9999',
                    order : '-id',
                    page  : 1
                };
                $scope.getAssuntos = getAssuntos;
                $scope.query = {
                    search: '', 
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };

                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };

                getEstados();
                getAssuntos();

                function enviarContato(event) {
                    event.preventDefault();
                    var data = angular.toJson($scope.entity);
                    var entity = angular.fromJson(data);
                                            
                    if (angular.isUndefined(entity.assunto) || entity.assunto <= 0) {
                        alert('Informe o assunto do contato!')
                        return;
                    }

                    var url = API_CONFIG.url + 'portal/contato';
                    $http({
                        method: 'POST',
                        url: url,
                        data: entity
                    }).then(function (result) {
                        alert('Contato enviado com sucesso!')
                        $scope.entity = {
                            'nome'     : '',
                            'email'    : '',
                            'celular'  : '',
                            'fixo'     : '',
                            'mensagem' : '',
                        };
                    });
                }

                function getEstados () {
                    $http.get(API_CONFIG.url + 'portal/estados?searchFields=name:like&search=' + $scope.queryEstados.filter + '&sortedBy=' + $scope.queryEstados.order + '&orderBy=name&per_page=' + $scope.queryEstados.limit + '&page=' + $scope.queryEstados.page + '&selected_only=' + $scope.queryEstados.selected_only)
                    .then(function (result) {
                        $scope.estados = result.data;
                        return;
                    });
                }

                function getAssuntos () {
                    $http.get(API_CONFIG.url + 'portal/assuntos?searchFields=name:like&search=' + $scope.queryAssuntos.filter + '&sortedBy=' + $scope.queryAssuntos.order + '&orderBy=name&per_page=' + $scope.queryAssuntos.limit + '&page=' + $scope.queryAssuntos.page + '&selected_only=' + $scope.queryAssuntos.selected_only)
                    .then(function (result) {
                        $scope.assuntos = result.data;
                        return;
                    });
                }
            }
        })
        .state('editais-licitacoes', {
            url: "/editais-licitacoes",
            templateUrl: "html/editais-licitacoes.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, moment, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "editais-licitacoes";
                $scope.url_api = API_CONFIG.url;
                $scope.entity = {
                    tipocontrato : '',
                    status       : '',
                    periodo      : ''
                }
                $scope.tipocontratos = [];
                $scope.queryTipocontratos = {
                    search: '',
                    filter: '',
                    limit : '9999',
                    order : '-id',
                    page  : 1
                };
                $scope.getTipocontratos    = getTipocontratos;

                $scope.edital_periodo = [];
                $scope.getEditalPeriodo    = getEditalPeriodo;

                $scope.edital = [];
                $scope.query = {
                    search: '',
                    filter: '',
                    limit : '6',
                    order : '-id',
                    page  : 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };

                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
                $scope.getEdital = getEdital;
                $scope.firstPage = 1;
                $scope.previousPage = previousPage;
                $scope.nextPage = nextPage;
                $scope.goPage = goPage;
                $scope.lessPage = lessPage;
                $scope.morePage = morePage;
                $scope.html = html;
                $scope.tipodocumento_selected = '';
                $scope.editalSelecionado = editalSelecionado;
                $scope.edital_selecionado = 0;
                $scope.botEncontrar = botEncontrar;
                getTipocontratos();
                getEditalPeriodo();

                function editalSelecionado(id) {
                    if ($scope.edital_selecionado == id ) {
                        $scope.edital_selecionado = 0;
                        return;    
                    }
                    $scope.edital_selecionado = id;
                }

                function getTipocontratos () {
                    $http.get(API_CONFIG.url + 'portal/tipocontratos?searchFields=name:like&search=' + $scope.queryTipocontratos.filter + '&sortedBy=' + $scope.queryTipocontratos.order + '&orderBy=name&per_page=' + $scope.queryTipocontratos.limit + '&page=' + $scope.queryTipocontratos.page + '&selected_only=' + $scope.queryTipocontratos.selected_only)
                    .then(function (result) {
                        $scope.tipocontratos = result.data;
                        return;
                    });
                }

                function getEditalPeriodo () {
                    $http.get(API_CONFIG.url + 'portal/edital-periodo?tipodocumento=' + $scope.entity.tipodocumento)
                    .then(function (result) {
                        $scope.edital_periodo = result.data;
                        return;
                    });
                }

                function html(content) {
                    content = htmlReplaceYoutube(content);
                    return $sce.trustAsHtml(content);
                }

                function morePage () {
                    $scope.firstPage = $scope.firstPage + 5;
                    if (($scope.edital.last_page-($scope.firstPage+4))<0) {
                        $scope.limitPage = 5 + ($scope.edital.last_page-($scope.firstPage+4));
                    }
                    if ($scope.firstPage+4 >= $scope.edital.last_page) {
                        $scope.firstPage = $scope.edital.last_page - 5;
                        $scope.limitPage = 5;
                    }
                    goPage ($scope.firstPage);
                }

                function lessPage () {
                    $scope.firstPage = $scope.firstPage - 5;
                    if ($scope.firstPage<=0) {
                        $scope.firstPage = 1;
                    }
                    $scope.limitPage = 5 ;
                    goPage ($scope.firstPage);
                }

                function goPage (page) {
                    $scope.query.page = page;
                    getEdital();
                }

                function previousPage () {
                    $scope.query.page = $scope.query.page - 1;
                    $scope.firstPage = $scope.query.page;
                    if ($scope.query.page<=5) {
                        $scope.firstPage = 1;
                    }
                    if ($scope.query.page<=1) {
                        $scope.query.page = 1;
                        $scope.firstPage  = 1;
                    }
                    getEdital();
                }

                function nextPage () {
                    if (($scope.query.page + 1) > $scope.edital.last_page) {
                        return;
                    }
                    if (($scope.edital.last_page-($scope.firstPage+5))<0) {
                        $scope.limitPage = 5 + ($scope.edital.last_page-($scope.query.page+5));
                    }
                    $scope.query.page = $scope.query.page + 1;
                    if ($scope.query.page>5 && $scope.firstPage+4 < $scope.edital.last_page) {
                        $scope.firstPage = $scope.edital.last_page - 5;
                        $scope.limitPage = 5;
                    }
                    getEdital();
                }

                function botEncontrar() {
                    $scope.query.page = 1;
                    getEdital();
                }

                function getEdital () {
                    $scope.edital_selecionado = 0;
                    $http.get(API_CONFIG.url + 'portal/edital?searchFields=name:like&search=' + $scope.query.filter + '&sortedBy=' + $scope.query.order + '&orderBy=name&per_page=' + $scope.query.limit + '&page=' + $scope.query.page + '&tipocontrato=' + $scope.entity.tipocontrato + '&status=' + $scope.entity.status + '&periodo=' + $scope.entity.periodo)
                    .then(function (result) {
                        $scope.edital = result.data;
                        for (var i=0; i < $scope.edital.data.length; i++) {
                            $scope.edital.data[i].periodo = moment($scope.edital.data[i].periodo).format('DD/MM/YYYY');
                        }

                        $scope.limitPage = 1;
                        if (($scope.edital.total/$scope.query.limit)>5) $scope.limitPage = 5;
                        else if (($scope.edital.total/$scope.query.limit)>4) $scope.limitPage = 5;
                        else if (($scope.edital.total/$scope.query.limit)>3) $scope.limitPage = 4;
                        else if (($scope.edital.total/$scope.query.limit)>2) $scope.limitPage = 3;
                        else if (($scope.edital.total/$scope.query.limit)>1) $scope.limitPage = 2;
                        return;
                    });
                }
            }
        })
        .state('como-funciona-uma-cooperativa', {
            url: "/como-funciona-uma-cooperativa",
            templateUrl: "html/como-funciona-uma-cooperativa.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "como-funciona-uma-cooperativa";
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('como-montar-uma-cooperativa', {
            url: "/como-montar-uma-cooperativa",
            templateUrl: "html/como-montar-uma-cooperativa.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "como-montar-uma-cooperativa";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };
            }
        })
        .state('historia-do-cooperativismo', {
            url: "/historia-do-cooperativismo",
            templateUrl: "html/historia-do-cooperativismo.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "historia-do-cooperativismo";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('historia-do-sistema-ocb', {
            url: "/historia-do-sistema-ocb",
            templateUrl: "html/historia-do-sistema-ocb.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "historia-do-sistema-ocb";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('o-que-e-cooperativismo', {
            url: "/o-que-e-cooperativismo",
            templateUrl: "html/o-que-e-cooperativismo.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "o-que-e-cooperativismo";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };              
            }
        })
        .state('central-da-marca', {
            url: "/central-da-marca",
            templateUrl: "html/central-da-marca.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "central-da-marca";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('quero-iniciar-uma-cooperativa', {
            url: "/quero-iniciar-uma-cooperativa",
            templateUrl: "html/quero-iniciar-uma-cooperativa.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "quero-iniciar-uma-cooperativa";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };
            }
        })
        .state('page-aci', {
            url: "/aci",
            templateUrl: "html/page-aci.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "page-aci";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };              
            }
        })
        .state('contribuicoes-cooperativistas', {
            url: "/contribuicoes-cooperativistas",
            templateUrl: "html/contribuicoes-cooperativistas.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "contribuicoes-cooperativistas";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };
            }
        })
        .state('contribuicao-sindical', {
            url: "/contribuicao-sindical",
            templateUrl: "html/contribuicao-sindical.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "contribuicao-sindical";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };
            }
        })
        .state('page-cncoop', {
            url: "/cncoop",
            templateUrl: "html/page-cncoop.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "page-cncoop";
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };
                $scope.noticias = {};
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };

                var getNoticia = getNoticia;
                getNoticia();

                function getNoticia () {
                    $http.get(API_CONFIG.url + 'portal/cncoop-noticias?searchFields=name:like&search=' + $scope.query.filter + '&sortedBy=' + $scope.query.order + '&orderBy=name&per_page=' + $scope.query.limit + '&page=' + $scope.query.page + '&selected_only=' + $scope.query.selected_only + '&date_filter')
                    .then(function (result) {
                        $scope.noticias = result.data;
                        for (var i=0; i < $scope.noticias.data.length; i++) {
                            $scope.noticias.data[i].data_publicacao = moment($scope.noticias.data[i].data_publicacao).format('DD/MM/YYYY');
                            $scope.noticias.data[i].url = trataUrl($scope.noticias.data[i].titulo);
                        }
                        return;
                    });
                }
            }
        })
        .state('page-legislacao', {
            url: "/legislacao",
            templateUrl: "html/page-legislacao.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "page-legislacao";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };              
            }
        })
        .state('page-codigo-civil', {
            url: "/codigo-civil",
            templateUrl: "html/page-codigo-civil.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "page-codigo-civil";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };              
            }
        })
        .state('page-constituicao-federal', {
            url: "/constituicao-federal",
            templateUrl: "html/page-constituicao-federal.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "page-constituicao-federal";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('page-ocb', {
            url: "/ocb",
            templateUrl: "html/page-ocb.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "page-ocb";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };              
            }
        })
        .state('premiacoes', {
            url: "/premiacoes",
            templateUrl: "html/premiacoes.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "premiacoes";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };              
            }
        })
        .state('executivo', {
            url: "/executivo",
            templateUrl: "html/executivo.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "executivo";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };              
            }
        })
        .state('legislativo', {
            url: "/legislativo",
            templateUrl: "html/legislativo.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "legislativo";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };              
            }
        })
        .state('judiciario', {
            url: "/judiciario",
            templateUrl: "html/judiciario.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "judiciario";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('internacional', {
            url: "/internacional",
            templateUrl: "html/internacional.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "internacional";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('page-sescoop', {
            url: "/sescoop",
            templateUrl: "html/page-sescoop.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "page-sescoop";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };              
            }
        })
        .state('formacao-profissional', {
            url: "/formacao-profissional",
            templateUrl: "html/formacao-profissional.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "formacao-profissional";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };              
            }
        })
        .state('monitoramento', {
            url: "/monitoramento",
            templateUrl: "html/monitoramento.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "monitoramento";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };
            }
        })
        .state('promocao-social', {
            url: "/promocao-social",
            templateUrl: "html/promocao-social.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "promocao-social";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('perguntas-frequentes', {
            url: "/perguntas-frequentes",
            templateUrl: "html/perguntas-frequentes.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "perguntas-frequentes";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('publicacoes', {
            url: "/publicacoes",
            templateUrl: "html/publicacoes.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "publicacoes";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };              
            }
        })
        .state('compendio-de-boas-praticas-de-governanca-cooperativa', {
            url: "/compendio-de-boas-praticas-de-governanca-cooperativa",
            templateUrl: "html/compendio-de-boas-praticas-de-governanca-cooperativa.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "compendio-de-boas-praticas-de-governanca-cooperativa";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };              
            }
        })
        .state('manual-contabilidade-do-ramo-agropecuario', {
            url: "/manual-contabilidade-do-ramo-agropecuario",
            templateUrl: "html/manual-contabilidade-do-ramo-agropecuario.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "manual-contabilidade-do-ramo-agropecuario";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('manual-de-governanca-cooperativa', {
            url: "/manual-de-governanca-cooperativa",
            templateUrl: "html/manual-de-governanca-cooperativa.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "manual-de-governanca-cooperativa";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('manual-de-orientacao-para-conselho-fiscal', {
            url: "/manual-de-orientacao-para-conselho-fiscal",
            templateUrl: "html/manual-de-orientacao-para-conselho-fiscal.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "manual-de-orientacao-para-conselho-fiscal";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };               
            }
        })
        .state('manual-de-recolhimento-I', {
            url: "/manual-de-recolhimento-I",
            templateUrl: "html/manual-de-recolhimento-I.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "manual-de-recolhimento-I";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };              
            }
        })
        .state('manual-de-recolhimento-II', {
            url: "/manual-de-recolhimento-II",
            templateUrl: "html/manual-de-recolhimento-II.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "manual-de-recolhimento-II";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('manual-operacional-do-ramo-transporte', {
            url: "/manual-operacional-do-ramo-transporte",
            templateUrl: "html/manual-operacional-do-ramo-transporte.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "manual-operacional-do-ramo-transporte";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('manual-tributario-do-ramo-transporte', {
            url: "/manual-tributario-do-ramo-transporte",
            templateUrl: "html/manual-tributario-do-ramo-transporte.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "manual-tributario-do-ramo-transporte";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('manual-contabil-do-ramo-transporte', {
            url: "/manual-contabil-do-ramo-transporte",
            templateUrl: "html/manual-contabil-do-ramo-transporte.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "manual-contabil-do-ramo-transporte";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('cartilha-cooperativismo-e-eleicoes', {
            url: "/cartilha-cooperativismo-e-eleicoes",
            templateUrl: "html/cartilha-cooperativismo-e-eleicoes.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "cartilha-cooperativismo-e-eleicoes";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };              
            }
        })
        .state('cartilha-guia-de-seguros-rurais-e-proagro', {
            url: "/cartilha-guia-de-seguros-rurais-e-proagro",
            templateUrl: "html/cartilha-guia-de-seguros-rurais-e-proagro.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "cartilha-guia-de-seguros-rurais-e-proagro";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('agenda-institucional-do-cooperativismo', {
            url: "/agenda-institucional-do-cooperativismo",
            templateUrl: "html/agenda-institucional-do-cooperativismo.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "agenda-institucional-do-cooperativismo";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('diagnostico-do-ramo-consumo', {
            url: "/diagnostico-do-ramo-consumo",
            templateUrl: "html/diagnostico-do-ramo-consumo.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "diagnostico-do-ramo-consumo";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('diagnostico-do-ramo-educacional', {
            url: "/diagnostico-do-ramo-educacional",
            templateUrl: "html/diagnostico-do-ramo-educacional.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "diagnostico-do-ramo-educacional";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('diagnostico-do-ramo-mineral', {
            url: "/diagnostico-do-ramo-mineral",
            templateUrl: "html/diagnostico-do-ramo-mineral.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "diagnostico-do-ramo-mineral";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('guia-pratico-para-dirigentes-de-cooperativas', {
            url: "/guia-pratico-para-dirigentes-de-cooperativas",
            templateUrl: "html/guia-pratico-para-dirigentes-de-cooperativas.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "guia-pratico-para-dirigentes-de-cooperativas";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('livro-cooperativismo-de-credito', {
            url: "/livro-cooperativismo-de-credito",
            templateUrl: "html/livro-cooperativismo-de-credito.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "livro-cooperativismo-de-credito";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('publicacoes-single', {
            url: "/publicacoes-single",
            templateUrl: "html/publicacoes-single.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "publicacoes-single";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('ramos-detalhes', {
            url: "/ramos-detalhes",
            templateUrl: "html/ramos-detalhes.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "ramos-detalhes";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('ramo-agropecuario', {
            url: "/ramo-agropecuario",
            templateUrl: "html/ramo-agropecuario.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "ramo-agropecuario";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('ramo-producao', {
            url: "/ramo-producao",
            templateUrl: "html/ramo-producao.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "ramo-producao";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('ramo-consumo', {
            url: "/ramo-consumo",
            templateUrl: "html/ramo-consumo.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "ramo-consumo";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('ramo-credito', {
            url: "/ramo-credito",
            templateUrl: "html/ramo-credito.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "ramo-credito";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('ramo-educacional', {
            url: "/ramo-educacional",
            templateUrl: "html/ramo-educacional.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "ramo-educacional";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('ramo-especial', {
            url: "/ramo-especial",
            templateUrl: "html/ramo-especial.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "ramo-especial";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('ramo-habitacional', {
            url: "/ramo-habitacional",
            templateUrl: "html/ramo-habitacional",
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "ramo-habitacional";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('ramo-infraestrutura', {
            url: "/ramo-infraestrutura",
            templateUrl: "html/ramo-infraestrutura",
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "ramo-infraestrutura";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('ramo-mineral', {
            url: "/ramo-mineral",
            templateUrl: "html/ramo-mineral",
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "ramo-mineral";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('ramo-saude', {
            url: "/ramo-saude",
            templateUrl: "html/ramo-saude",
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "ramo-saude";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('ramo-trabalho', {
            url: "/ramo-trabalho",
            templateUrl: "html/ramo-trabalho",
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "ramo-trabalho";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('ramo-transporte', {
            url: "/ramo-transporte",
            templateUrl: "html/ramo-transporte",
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "ramo-transporte";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('ramo-turismo', {
            url: "/ramo-turismo",
            templateUrl: "html/ramo-turismo",
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "ramo-turismo";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('ramos', {
            url: "/ramos",
            templateUrl: "html/ramos.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "ramos";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('resultado-busca', {
            url: "/resultado-busca/:rota/:parametro",
            templateUrl: "html/resultado-busca.html",
            controller: function (API_CONFIG, $scope, $http, $stateParams, $sce, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "resultado-busca";
                var parametro = $stateParams.parametro;
                var route = $stateParams.rota;
                $scope.html = html;
                $scope.limitPage = 5;
                $scope.firstPage = 1;
                $scope.previousPage = previousPage;
                $scope.nextPage = nextPage;
                $scope.goPage = goPage;
                $scope.lessPage = lessPage;
                $scope.morePage = morePage;
                $scope.html = html;
                $scope.ultimasHoras = ultimasHoras;
                $scope.ultimosDias = ultimosDias;
                $scope.ultimosDias = ultimosDias;
                $scope.ultimosMeses = ultimosMeses;
                $scope.pesquisaChange = pesquisaChange;
                $scope.query = {
                    search: '',
                    filter: '',
                    pesquisa: '',
                    limit: '8',
                    order: '-id',
                    page: 1
                };
                $scope.result = {
                    noticia: [],
                    servico: [],
                    search: $stateParams.parametro
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                getPesquisa();

                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };

                function ultimasHoras(horas) {
                    $scope.query.filter = horas + "-horas";
                    $scope.query.page = 1;
                    getPesquisa();
                }

                function ultimosDias(dias) {
                    $scope.query.filter = dias + "-dias";
                    $scope.query.page = 1;
                    getPesquisa();
                }

                function ultimosMeses(meses) {
                    $scope.query.filter = meses + "-meses";
                    $scope.query.page = 1;
                    getPesquisa();
                }

                function html(content) {
                    content = htmlReplaceYoutube(content);
                    return $sce.trustAsHtml(content);
                }

                function morePage() {
                    var lastPage = $scope.result.last_page;
                    $scope.firstPage = $scope.firstPage + 5;
                    if ((lastPage - ($scope.firstPage + 4)) < 0) {
                        $scope.limitPage = 5 + (lastPage - ($scope.firstPage + 4));
                    }
                    if ($scope.firstPage + 4 >= lastPage) {
                        $scope.firstPage = lastPage - 5;
                        $scope.limitPage = 5;
                    }
                    goPage($scope.firstPage);
                }

                function lessPage() {
                    $scope.firstPage = $scope.firstPage - 5;
                    if ($scope.firstPage <= 0) {
                        $scope.firstPage = 1;
                    }
                    $scope.limitPage = 5;
                    goPage($scope.firstPage);
                }

                function goPage(page) {
                    $scope.query.page = page;
                    getPesquisa();
                }

                function previousPage() {
                    $scope.query.page = $scope.query.page - 1;
                    $scope.firstPage = $scope.query.page;
                    if ($scope.query.page <= 5) {
                        $scope.firstPage = 1;
                    }
                    if ($scope.query.page <= 1) {
                        $scope.query.page = 1;
                        $scope.firstPage = 1;
                        return;
                    }
                  getPesquisa();
                }

                function nextPage() {
                    var lastPage = $scope.result.last_page;
                    if (($scope.query.page + 1) > lastPage) {
                        return;
                    }
                    if ((lastPage - ($scope.firstPage + 5)) < 0) {
                        $scope.limitPage = 5 + (lastPage - ($scope.query.page + 5));
                    }
                    $scope.query.page = $scope.query.page + 1;
                    if ($scope.query.page > 5 && $scope.firstPage + 4 < lastPage) {
                        $scope.firstPage = lastPage - 5;
                        $scope.limitPage = 5;
                    }
                    getPesquisa();
                }

                function pesquisaChange() {
                    $scope.query.pesquisa = $("#filtro-pesquisa").val();
                    route = $scope.query.pesquisa;
                    $scope.query.page = 1;
                    getPesquisa();
                }

                function getPesquisa() {
                    $http.get(API_CONFIG.url + 'portal/search?route=' + route + '&search=' + parametro + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page + '&filter=' + $scope.query.filter)
                    .then(function (result) {
                        var data = result.data;

                        if (typeof data.servico != 'undefined') {
                            $scope.result = data.servico;
                            for (var i = 0; i < $scope.result.data.length; i++) {
                                validaServico($scope.result.data[i]);
                            }
                        }

                        if (typeof data.noticia != 'undefined') {
                            $scope.result = data.noticia;
                            for (var i = 0; i < $scope.result.data.length; i++) {
                                validaNoticia($scope.result.data[i]);
                            }
                        }

                        if (typeof data.todos != 'undefined') {
                            $scope.result = data.todos;
                            for (var i = 0; i < $scope.result.data.length; i++) {
                                if ($scope.result.data[i].tipo == 'servico') {
                                    validaServico($scope.result.data[i]);
                                } else if ($scope.result.data[i].tipo == 'noticia') {
                                    validaNoticia($scope.result.data[i]);
                                }
                            }
                        }

                        $scope.limitPage = 1;
                        if (($scope.result.total / $scope.query.limit) > 5)
                            $scope.limitPage = 5;
                        else if (($scope.result.total / $scope.query.limit) > 4)
                            $scope.limitPage = 5;
                        else if (($scope.result.total / $scope.query.limit) > 3)
                            $scope.limitPage = 4;
                        else if (($scope.result.total / $scope.query.limit) > 2)
                            $scope.limitPage = 3;
                        else if (($scope.result.total / $scope.query.limit) > 1)
                            $scope.limitPage = 2;

                        $scope.result.search = parametro;
                        $scope.result.route = route;
                    });
                }

                function validaServico(data) {
                    data.conteudo = limitaDescricao(removeTagsHtml(data.conteudo));
                    data.url = trataUrl(data.descricao);
                    data.href = 'servico-single({id: ' + data.id + ', descricao: "' + data.url + '"})';
                }

                function validaNoticia(data) {
                    if (data.data_publicacao != null) {
                        data.created_at = moment(data.data_publicacao).format('DD/MM/YYYY');
                    } else {
                        data.created_at = '';
                    }
                    data.conteudo = limitaDescricao(removeTagsHtml(data.conteudo));
                    data.url = trataUrl(data.titulo);
                    data.href = 'noticia-single({id: ' + data.id + ', url: "' + data.url + '"})';
                }
            }
        })
        .state('revista-saber-cooperar', {
            url: "/revista-saber-cooperar",
            templateUrl: "html/revista-saber-cooperar.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
              $anchorScroll();
              $scope.bodylayout = "revista-saber-cooperar";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };              
          }
        })
        .state('revista-setembro-outubro-2014', {
            url: "/revista-setembro-outubro-2014",
            templateUrl: "html/revista-setembro-outubro-2014.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-setembro-outubro-2014";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('revista-setembro-outubro-2012', {
            url: "/revista-setembro-outubro-2012",
            templateUrl: "html/revista-setembro-outubro-2012.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-setembro-outubro-2012";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('revista-novembro-dezembro-2015', {
            url: "/revista-novembro-dezembro-2015",
            templateUrl: "html/revista-novembro-dezembro-2015.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-novembro-dezembro-2015";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('revista-novembro-dezembro-2013', {
            url: "/revista-novembro-dezembro-2013",
            templateUrl: "html/revista-novembro-dezembro-2013.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-novembro-dezembro-2013";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('revista-novembro-dezembro-2012', {
            url: "/revista-novembro-dezembro-2012",
            templateUrl: "html/revista-novembro-dezembro-2012.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-novembro-dezembro-2012";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('revista-novembro-2014', {
            url: "/revista-novembro-2014",
            templateUrl: "html/revista-novembro-2014.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-novembro-2014";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('revista-novembro-2013', {
            url: "/revista-novembro-2013",
            templateUrl: "html/revista-novembro-2013.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-novembro-2013";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('revista-novembro-2012', {
            url: "/revista-novembro-2012",
            templateUrl: "html/revista-novembro-2012.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-novembro-2012";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('revista-novembro-2011', {
            url: "/revista-novembro-2011",
            templateUrl: "html/revista-novembro-2011.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-novembro-2011";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('revista-marco-abril-2015', {
            url: "/revista-marco-abril-2015",
            templateUrl: "html/revista-marco-abril-2015.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-marco-abril-2015";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('revista-marco-abril-2014', {
            url: "/revista-marco-abril-2014",
            templateUrl: "html/revista-marco-abril-2014.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-marco-abril-2014";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('revista-marco-abril-2013-edicao-especial', {
            url: "/revista-marco-abril-2013-edicao-especial",
            templateUrl: "html/revista-marco-abril-2013-edicao-especial.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-marco-abril-2013-edicao-especial";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('revista-marco-abril-2013', {
            url: "/revista-marco-abril-2013",
            templateUrl: "html/revista-marco-abril-2013.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-marco-abril-2013";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('revista-maio-junho-2014', {
            url: "/revista-maio-junho-2014",
            templateUrl: "html/revista-maio-junho-2014.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-maio-junho-2014";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('revista-maio-junho-2013', {
            url: "/revista-maio-junho-2013",
            templateUrl: "html/revista-maio-junho-2013.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-maio-junho-2013";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('revista-junho-2011', {
            url: "/revista-junho-2011",
            templateUrl: "html/revista-junho-2011.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-junho-2011";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('revista-julho-agosto-2015', {
            url: "/revista-julho-agosto-2015",
            templateUrl: "html/revista-julho-agosto-2015.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-julho-agosto-2015";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };   
            }
        })
        .state('revista-julho-agosto-2014', {
            url: "/revista-julho-agosto-2014",
            templateUrl: "html/revista-julho-agosto-2014.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-julho-agosto-2014";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };   
            }
        })
        .state('revista-julho-agosto-2013', {
            url: "/revista-julho-agosto-2013",
            templateUrl: "html/revista-julho-agosto-2013.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-julho-agosto-2013";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };   
            }
        })
        .state('revista-julho-agosto-2012', {
            url: "/revista-julho-agosto-2012",
            templateUrl: "html/revista-julho-agosto-2012.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-julho-agosto-2012";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };   
            }
        })
        .state('revista-julho-2011', {
            url: "/revista-julho-2011",
            templateUrl: "html/revista-julho-2011.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-julho-2011";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('revista-janeiro-fevereiro-2013', {
            url: "/revista-janeiro-fevereiro-2013",
            templateUrl: "html/revista-janeiro-fevereiro-2013.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-janeiro-fevereiro-2013";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('revista-dezembro-2015', {
            url: "/revista-dezembro-2015",
            templateUrl: "html/revista-dezembro-2015.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-dezembro-2015";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('revista-dezembro-2010', {
            url: "/revista-dezembro-2010",
            templateUrl: "html/revista-dezembro-2010.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "revista-dezembro-2010";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('EBPC', {
            url: "/EBPC",
            templateUrl: "html/EBPC.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "EBPC";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('EBPC-sobre', {
            url: "/EBPC-sobre",
            templateUrl: "html/EBPC-sobre.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "EBPC-sobre";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('EBPC-diretrizes', {
            url: "/EBPC-diretrizes",
            templateUrl: "html/EBPC-diretrizes.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "EBPC-diretrizes";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('EBPC-programacao', {
            url: "/EBPC-programacao",
            templateUrl: "html/EBPC-programacao.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "EBPC-programacao";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('EBPC-submissao', {
            url: "/EBPC-submissao",
            templateUrl: "html/EBPC-submissao.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "EBPC-submissao";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                   
            }
        })
        .state('EBPC-contato', {
            url: "/EBPC-contato",
            templateUrl: "html/EBPC-contato.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "EBPC-contato";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };   
            }
        })
        .state('servico-single', {
            url: "/servico/:id/:descricao",
            templateUrl: "html/servico-single.html",
            controller: function(API_CONFIG, $scope, $http, $stateParams, $sce, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "servico-single";
                $scope.servicos = {};
                $scope.query = {
                    search: '',
                    filter: '',
                    limit : '4',
                    order : '-id',
                    page  : 1
                };
                $scope.html = html;
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };

                var idServico = $stateParams.id;
                var getServico = getServico;
                getServico();

                function html(content) {
                    content = htmlReplaceYoutube(content);
                    return $sce.trustAsHtml(content);
                }

                function getServico () {
                    $http.get(API_CONFIG.url + 'portal/servico/' + idServico +'??searchFields=name:like&search=' + $scope.query.filter + '&sortedBy=' + $scope.query.order + '&orderBy=name&per_page=' + $scope.query.limit + '&page=' + $scope.query.page + '&selected_only=' + $scope.query.selected_only)
                    .then(function (result) {
                        $scope.servicos = result.data
                        for (var i = 0; i < $scope.servicos.relacionadas.data.length; i++) {
                            $scope.servicos.relacionadas.data[i].url = trataUrl($scope.servicos.relacionadas.data[i].descricao);
                        }                        
                        return;
                    });
                }
            }
        })
        .state('servicos', {
            url: "/servicos",
            templateUrl: "html/servicos.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $sce, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "servicos";
                $scope.servicoTema = {id : 0};
                $scope.servicoRamo = {id : 0};
                $scope.servicoTemaSelecionado = '';
                $scope.servicoRamoSelecionado = '';
                $scope.servicos = [];
                $scope.query = {
                    search: '', 
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.queryServicos = {
                    search: '',
                    filter: '',
                    limit : '9999',
                    order : '-id',
                    page  : 1
                };
                $scope.temas = [];
                $scope.queryServicoTema = {
                    search: '',
                    filter: '',
                    limit : '9999',
                    order : '-id',
                    page  : 1
                };
                $scope.ramos = [];
                $scope.queryServicoRamo = {
                    search: '',
                    filter: '',
                    limit : '9999',
                    order : '-id',
                    page  : 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };

                $scope.getServicos = getServicos;
                $scope.html = html;
                $scope.temaRamoSelecionado = temaRamoSelecionado;

                var getServicoTema = getServicoTema;
                var getServicoRamo = getServicoRamo;
                getServicos();
                getServicoTema();
                getServicoRamo();

                function temaRamoSelecionado() {
                    return $scope.servicoTemaSelecionado!='' &&  $scope.servicoRamoSelecionado!='';
                }

                function html(content) {
                    content = htmlReplaceYoutube(content);
                    return $sce.trustAsHtml(content);
                }

                function getServicoTema () {
                    $http.get(API_CONFIG.url + 'portal/temas?searchFields=name:like&search=' + $scope.queryServicoTema.filter + '&sortedBy=' + $scope.queryServicoTema.order + '&orderBy=name&per_page=' + $scope.queryServicoTema.limit + '&page=' + $scope.queryServicoTema.page + '&selected_only=' + $scope.queryServicoTema.selected_only)
                    .then(function (result) {
                        $scope.temas = result.data;
                        return;
                    });
                }

                function getServicoRamo () {
                    $http.get(API_CONFIG.url + 'portal/ramos?searchFields=name:like&search=' + $scope.queryServicoRamo.filter + '&sortedBy=' + $scope.queryServicoRamo.order + '&orderBy=name&per_page=' + $scope.queryServicoRamo.limit + '&page=' + $scope.queryServicoRamo.page + '&selected_only=' + $scope.queryServicoRamo.selected_only)
                    .then(function (result) {
                        $scope.ramos = result.data;
                        return;
                    });
                }

                function getServicos () {
                    $scope.servicoTemaSelecionado = $scope.servicoTema != null ? $scope.servicoTema.descricao : null;
                    $scope.servicoRamoSelecionado = $scope.servicoRamo != null ? $scope.servicoRamo.descricao : null;
                    $scope.servicoTemaIdSelecionado = $scope.servicoTema != null ? $scope.servicoTema.id : null;
                    $scope.servicoRamoIdSelecionado = $scope.servicoRamo != null ? $scope.servicoRamo.id : null;


                    $http.get(API_CONFIG.url + 'portal/servicos?servicoTema=' + $scope.servicoTemaIdSelecionado + '&servicoRamo=' + $scope.servicoRamoIdSelecionado + '&searchFields=name:like&search=' + $scope.queryServicos.filter + '&sortedBy=' + $scope.queryServicos.order + '&orderBy=name&per_page=' + $scope.queryServicos.limit + '&page=' + $scope.queryServicos.page + '&selected_only=' + $scope.queryServicos.selected_only)
                    .then(function (result) {
                        $scope.servicos = result.data;
                        for (var i = 0; i < $scope.servicos.data.length; i++) {
                            $scope.servicos.data[i].url = trataUrl($scope.servicos.data[i].descricao);
                        }
                        return;
                    });
                }
            }
        })
        .state('sistemas-ocb', {
            url: "/sistemas-ocb",
            templateUrl: "html/sistemas-ocb.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "sistemas-ocb";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                 
            }
        })
        .state('sou-cooperado', {
            url: "/sou-cooperado",
            templateUrl: "html/sou-cooperado.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll, $sce, $state) {
                $anchorScroll();
                $scope.bodylayout = "sou-cooperado";
                $scope.url_api = API_CONFIG.url;
                $scope.noticias = {};
                $scope.query = {
                    search: '',
                    filter: '',
                    limit : '4',
                    order : '-id',
                    page  : 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
                $scope.goNoticiaSingle = goNoticiaSingle;
                $scope.urlVideo = urlVideo;

                var getNoticia = getNoticia;
                getNoticia();

                function goNoticiaSingle(id,titulo) {
                    $state.go('noticia-single',{id:id,titulo:titulo});
                    return;
                }
                function urlVideo(url) {
                    url = 'http://www.youtube.com/embed/' + youtube_parser(url);
                    return $sce.trustAsResourceUrl(url);
                }
                function getNoticia () {
                    $http.get(API_CONFIG.url + 'portal/noticia-destaque/all')
                    .then(function (result) {
                        $scope.noticias = result.data;
                        for (var i=0; i < $scope.noticias.destaque_principal.data.length; i++) {
                            $scope.noticias.destaque_principal.data[i].data_publicacao = moment($scope.noticias.destaque_principal.data[i].data_publicacao).format('DD/MM/YYYY');

                        }
                        for (var i=0; i < $scope.noticias.destaques.data.length; i++) {
                            $scope.noticias.destaques.data[i].data_publicacao = moment($scope.noticias.destaques.data[i].data_publicacao).format('DD/MM/YYYY');
                            $scope.noticias.destaques.data[i].sub_titulo = $scope.noticias.destaques.data[i].sub_titulo.length > 80 
                                                                                                    ? $scope.noticias.destaques.data[i].sub_titulo.substring(0, 80) + '...'
                                                                                                    : $scope.noticias.destaques.data[i].sub_titulo;
                        }
                        return;
                    });
                }
                function youtube_parser(url) {
                    if (url == undefined || url == '') {
                        return;
                    }
                    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
                    var match = url.match(regExp);
                    return (match&&match[7].length==11)? match[7] : false;
                }
            }
        })
        .state('trabalhe-conosco', {
            url: "/trabalhe-conosco",
            templateUrl: "html/trabalhe-conosco.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "trabalhe-conosco";
                $scope.trabalhos = {};
                $scope.query = {
                    search: '',
                    filter: '',
                    limit : '4',
                    order : '-id',
                    page  : 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };
                var getTrabalhos     = getTrabalhos;
                getTrabalhos();

                function getTrabalhos () {
                    $http.get(API_CONFIG.url + 'portal/trabalheconosco?searchFields=name:like&search=' + $scope.query.filter + '&sortedBy=' + $scope.query.order + '&orderBy=name&per_page=' + $scope.query.limit + '&page=' + $scope.query.page + '&selected_only=' + $scope.query.selected_only)
                    .then(function (result) {
                        $scope.trabalhos = result.data
                        return;
                    });
                }
            }
        })
        .state('transparencia-cncoop', {
            url: "/transparencia-cncoop",
            templateUrl: "html/transparencia-cncoop.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "transparencia-cncoop";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('transparencia-ocb', {
            url: "/transparencia-ocb",
            templateUrl: "html/transparencia-ocb.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.bodylayout = "transparencia-ocb";
                $scope.query = {
                    search: '',
                    filter: '',
                    limit: '4',
                    order: '-id',
                    page: 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };                
            }
        })
        .state('transparencia-sescoop', {
            url: "/transparencia-sescoop",
            templateUrl: "html/transparencia-sescoop.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.url_api = API_CONFIG.url;
                $scope.bodylayout = "transparencia";
                $scope.entity = {
                    tipodocumento: '',
                    ano: ''
                }
                $scope.tipodocumentos = [];
                $scope.queryTipodocumentos = {
                    search: '',
                    filter: '',
                    limit : '9999',
                    order : '-id',
                    page  : 1
                };
                $scope.getTipodocumentos = getTipodocumentos;
                $scope.transparencia_ano = [];
                $scope.getTransparenciaAno = getTransparenciaAno;
                $scope.transparencias = [];
                $scope.query = {
                    search: '',
                    filter: '',
                    limit : '6',
                    order : '-id',
                    page  : 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };
                $scope.getTransparencias = getTransparencias;
                $scope.firstPage = 1;
                $scope.previousPage = previousPage;
                $scope.nextPage = nextPage;
                $scope.goPage = goPage;
                $scope.lessPage = lessPage;
                $scope.morePage = morePage;
                $scope.html = html;
                $scope.tipodocumento_selected = '';
                $scope.transparenciaSelecionado = transparenciaSelecionado;
                $scope.transparencia_selecionado = 0;
                $scope.botEncontrar = botEncontrar;
                getTipodocumentos();
                getTransparenciaAno();

                function botEncontrar() {
                    $scope.query.page = 1;
                    getTransparencias();
                }

                function transparenciaSelecionado(id) {
                    if ($scope.edital_selecionado == id ) {
                        $scope.edital_selecionado = 0;
                        return;    
                    }
                    $scope.transparencia_selecionado = id;
                }

                function getTipodocumentos () {
                    $http.get(API_CONFIG.url + 'portal/tipodocumentos?searchFields=name:like&search=' + $scope.queryTipodocumentos.filter + '&sortedBy=' + $scope.queryTipodocumentos.order + '&orderBy=name&per_page=' + $scope.queryTipodocumentos.limit + '&page=' + $scope.queryTipodocumentos.page + '&selected_only=' + $scope.queryTipodocumentos.selected_only)
                    .then(function (result) {
                        $scope.tipodocumentos = result.data;
                        return;
                    });
                }

                function getTransparenciaAno () {
                    $http.get(API_CONFIG.url + 'portal/transparencia-ano?tipodocumento=' + $scope.entity.tipodocumento)
                    .then(function (result) {
                        $scope.transparencia_ano = result.data;
                        return;
                    });
                }

                function html(content) {
                    content = htmlReplaceYoutube(content);
                    return $sce.trustAsHtml(content);
                }

                function morePage () {
                    $scope.firstPage = $scope.firstPage + 5;
                    if (($scope.transparencias.last_page-($scope.firstPage+4))<0) {
                        $scope.limitPage = 5 + ($scope.transparencias.last_page-($scope.firstPage+4));
                    }
                    if ($scope.firstPage+4 >= $scope.transparencias.last_page) {
                        $scope.firstPage = $scope.transparencias.last_page - 5;
                        $scope.limitPage = 5;
                    }

                    goPage ($scope.firstPage);
                }

                function lessPage () {
                    $scope.firstPage = $scope.firstPage - 5;
                    if ($scope.firstPage<=0) {
                        $scope.firstPage = 1;
                    }
                    $scope.limitPage = 5 ;
                    goPage ($scope.firstPage);
                }

                function goPage (page) {
                    $scope.query.page = page;
                    getTransparencias();
                }

                function previousPage () {
                    $scope.query.page = $scope.query.page - 1;
                    $scope.firstPage = $scope.query.page;
                    if ($scope.query.page<=5) {
                        $scope.firstPage = 1;
                    }
                    if ($scope.query.page<=1) {
                        $scope.query.page = 1;
                        $scope.firstPage  = 1;
                        return;
                    }
                    getTransparencias();
                }

                function nextPage () {
                    if (($scope.query.page + 1) > $scope.transparencias.last_page) {
                        return;
                    }
                    if (($scope.transparencias.last_page-($scope.firstPage+5))<0) {
                        $scope.limitPage = 5 + ($scope.transparencias.last_page-($scope.query.page+5));
                    }
                    $scope.query.page = $scope.query.page + 1;
                    if ($scope.query.page>5 && $scope.firstPage+4 < $scope.transparencias.last_page) {
                        $scope.firstPage = $scope.transparencias.last_page - 5;
                        $scope.limitPage = 5;
                    }
                    getTransparencias();
                }

                function getTransparencias () {
                    $http.get(API_CONFIG.url + 'portal/transparencias-arquivo?searchFields=name:like&search=' + $scope.query.filter + '&sortedBy=' + $scope.query.order + '&orderBy=name&per_page=' + $scope.query.limit + '&page=' + $scope.query.page + '&tipodocumento=' + $scope.entity.tipodocumento + '&ano=' + $scope.entity.ano)
                    .then(function (result) {
                        $scope.transparencias = result.data;
                        $scope.limitPage = 1;
                        if (($scope.transparencias.total/$scope.query.limit)>5) $scope.limitPage = 5;
                        else if (($scope.transparencias.total/$scope.query.limit)>4) $scope.limitPage = 5;
                        else if (($scope.transparencias.total/$scope.query.limit)>3) $scope.limitPage = 4;
                        else if (($scope.transparencias.total/$scope.query.limit)>2) $scope.limitPage = 3;
                        else if (($scope.transparencias.total/$scope.query.limit)>1) $scope.limitPage = 2;
                        return;
                    });
                }
            }
        })
        .state('transparencia', {
            url: "/transparencia",
            templateUrl: "html/transparencia.html" ,
            controller: function(API_CONFIG, $scope, $http, $stateParams, $anchorScroll) {
                $anchorScroll();
                $scope.url_api = API_CONFIG.url;
                $scope.bodylayout = "transparencia";
                $scope.entity = {
                    tipodocumento: '',
                    ano          : ''
                }
                $scope.tipodocumentos = [];
                $scope.queryTipodocumentos = {
                    search: '',
                    filter: '',
                    limit : '9999',
                    order : '-id',
                    page  : 1
                };
                $scope.getTipodocumentos = getTipodocumentos;
                $scope.transparencia_ano = [];
                $scope.getTransparenciaAno = getTransparenciaAno;
                $scope.transparencias = [];
                $scope.query = {
                    search: '',
                    filter: '',
                    limit : '6',
                    order : '-id',
                    page  : 1
                };
                $scope.searchResult = {
                    data: [],
                    count: 0,
                    countNoticia: 0,
                    countServico: 0
                };
                $scope.getSearch = function() {
                    $http.get(API_CONFIG.url + 'portal/search?search=' + $scope.query.search + '&per_page=' + $scope.query.limit + '&page=' + $scope.query.page)
                    .then(function (result) {
                        var data = result.data;
                        $scope.searchResult.data = data;
                        $scope.searchResult.count = data.servico.total + data.noticia.total;
                        $scope.searchResult.countNoticia = data.noticia.total;
                        $scope.searchResult.countServico = data.servico.total;
                    });
                };
                $scope.getTransparencias = getTransparencias;
                $scope.firstPage = 1;
                $scope.previousPage = previousPage;
                $scope.nextPage = nextPage;
                $scope.goPage = goPage;
                $scope.lessPage = lessPage;
                $scope.morePage = morePage;
                $scope.html = html;
                $scope.tipodocumento_selected = '';
                $scope.transparenciaSelecionado = transparenciaSelecionado;
                $scope.transparencia_selecionado = 0;
                $scope.botEncontrar = botEncontrar;
                getTipodocumentos();
                getTransparenciaAno();

                function botEncontrar() {
                    $scope.query.page = 1;
                    getTransparencias();
                }

                function transparenciaSelecionado(id) {
                    if ($scope.edital_selecionado == id ) {
                        $scope.edital_selecionado = 0;
                        return;    
                    }
                    $scope.transparencia_selecionado = id;
                }

                function getTipodocumentos () {
                    $http.get(API_CONFIG.url + 'portal/tipodocumentos?searchFields=name:like&search=' + $scope.queryTipodocumentos.filter + '&sortedBy=' + $scope.queryTipodocumentos.order + '&orderBy=name&per_page=' + $scope.queryTipodocumentos.limit + '&page=' + $scope.queryTipodocumentos.page + '&selected_only=' + $scope.queryTipodocumentos.selected_only)
                    .then(function (result) {
                        $scope.tipodocumentos = result.data;
                        return;
                    });
                }
                function getTransparenciaAno () {
                    $http.get(API_CONFIG.url + 'portal/transparencia-ano?tipodocumento=' + $scope.entity.tipodocumento)
                    .then(function (result) {
                        $scope.transparencia_ano = result.data;
                        return;
                    });
                }

                function html(content) {
                    content = htmlReplaceYoutube(content);
                    return $sce.trustAsHtml(content);
                }

                function morePage () {
                    $scope.firstPage = $scope.firstPage + 5;
                    if (($scope.transparencias.last_page-($scope.firstPage+4))<0) {
                        $scope.limitPage = 5 + ($scope.transparencias.last_page-($scope.firstPage+4));
                    }
                    if ($scope.firstPage+4 >= $scope.transparencias.last_page) {
                        $scope.firstPage = $scope.transparencias.last_page - 5;
                        $scope.limitPage = 5;
                    }
                    goPage ($scope.firstPage);
                }

                function lessPage () {
                    $scope.firstPage = $scope.firstPage - 5;
                    if ($scope.firstPage<=0) {
                        $scope.firstPage = 1;
                    }
                    $scope.limitPage = 5 ;
                    goPage ($scope.firstPage);
                }

                function goPage (page) {
                    $scope.query.page = page;
                    getTransparencias();
                }

                function previousPage () {
                    $scope.query.page = $scope.query.page - 1;
                    $scope.firstPage = $scope.query.page;
                    if ($scope.query.page<=5) {
                        $scope.firstPage = 1;
                    }
                    if ($scope.query.page<=1) {
                        $scope.query.page = 1;
                        $scope.firstPage  = 1;
                        return;
                    }
                    getTransparencias();
                }

                function nextPage () {
                    if (($scope.query.page + 1) > $scope.transparencias.last_page) {
                        return;
                    }
                    if (($scope.transparencias.last_page-($scope.firstPage+5))<0) {
                        $scope.limitPage = 5 + ($scope.transparencias.last_page-($scope.query.page+5));
                    }
                    $scope.query.page = $scope.query.page + 1;
                    if ($scope.query.page>5 && $scope.firstPage+4 < $scope.transparencias.last_page) {
                        $scope.firstPage = $scope.transparencias.last_page - 5;
                        $scope.limitPage = 5;
                    }
                    getTransparencias();
                }

                function getTransparencias () {
                    $http.get(API_CONFIG.url + 'portal/transparencias-arquivo?searchFields=name:like&search=' + $scope.query.filter + '&sortedBy=' + $scope.query.order + '&orderBy=name&per_page=' + $scope.query.limit + '&page=' + $scope.query.page + '&tipodocumento=' + $scope.entity.tipodocumento + '&ano=' + $scope.entity.ano)
                    .then(function (result) {
                        $scope.transparencias = result.data;
                        $scope.limitPage = 1;
                        if (($scope.transparencias.total/$scope.query.limit)>5) $scope.limitPage = 5;
                        else if (($scope.transparencias.total/$scope.query.limit)>4) $scope.limitPage = 5;
                        else if (($scope.transparencias.total/$scope.query.limit)>3) $scope.limitPage = 4;
                        else if (($scope.transparencias.total/$scope.query.limit)>2) $scope.limitPage = 3;
                        else if (($scope.transparencias.total/$scope.query.limit)>1) $scope.limitPage = 2;
                        return;
                    });
                }
            }
        })
    }]);

function htmlReplaceYoutube(content) {
    content = String(content);
    var regExp1 = /<img class="ta-insert-video" src="(.*?)" ta-insert-video="(.*?)" contenteditable="false" allowfullscreen="true" frameborder="0" style="(.*?)"(.*?)\/>/g;
    var regExp2 = /<img class="ta-insert-video" src="(.*?)" ta-insert-video="(.*?)" contenteditable="false" allowfullscreen="true" frameborder="0"(.*?)\/>/g;
    content = content.replace(regExp1, replaceWithFn1);
    content = content.replace(regExp2, replaceWithFn2);
    return content;
}

function replaceWithFn1(str, p1, p2, p3) {
    return '<div class="auto-resizable-iframe"><div><iframe  src="' + p2 + '"  style="' + p3 + '" frameborder="0" allowfullscreen></iframe></div></div>';
}

function replaceWithFn2(str, p1, p2) {
    return '<div class="auto-resizable-iframe"><div><iframe  src="' + p2 + '"  style="width: 490px; height: 380px" frameborder="0" allowfullscreen></iframe></div></div>';
}

function trataUrl(elemento) {
    var charEspeciais = "áàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ";
    var charNormais = "aaaaaeeeeiiiiooooouuuucAAAAAEEEEIIIIOOOOOUUUUC";
    var novoElemento = "";
    var retorno = "";

    for (var i = 0; i < elemento.length; i++) {
        if (charEspeciais.indexOf(elemento.charAt(i)) != -1) {
            novoElemento += charNormais.substr(charEspeciais.search(elemento.substr(i, 1)), 1);
        } else {
            novoElemento += elemento.substr(i, 1);
        }
    }
    novoElemento = novoElemento.replace(/[^a-zA-Z 0-9]/g, '').toLowerCase();
    for (var j = 0; j < novoElemento.length; j++) {
        if (novoElemento[j].indexOf(' ') != -1) {
            retorno += novoElemento[j].replace(' ', '-');
        } else {
            retorno += novoElemento[j];
        }
    }
    return retorno;
}

function removeTagsHtml(string) {
    return string.replace(/<.*?>/g, '');
}

function limitaDescricao(description) {
    if (description.length > 320) {
        return description.substr(0, 320).concat('...');
    } else {
        return description;
    }
}