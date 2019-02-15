@include('template-panel.head')

@include('template-site.topo2')


<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading">

                    <h3 class="panel-title">@yield('title')</h3>
                    @if(count($errors) > 0)
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach($errors->all() as $error)

                                      <p><b>{!!$error!!}</b></p>

                                  @endforeach
                              </ul>
                          </div>
              @endif

                </div>

                <div class="panel-body">
                    <!-- Form Inserir Licitação -->
                    <div class="col-12">
                        <a href="/trasparencies"><button type="button" class="btn btn-primary"> <i class="fa fa-caret-left"></i> VOLTAR  </button></a>

                    </div>
                    <br>

                    <div class="form-group">
                        <h3>{!! Form::label('docMain', 'Tipo de Documento: ' ) !!}</h3>
                        <h4>{{$transparency->docMain}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('subDoc', 'Sub Tipo de documento:  ' ) !!}</h3>
                        <h4>{{$transparency->subDoc}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('document_name', 'Nome do Documento: ' ) !!}</h3>
                        <h4>{{$transparency->document_name}}</h4>
                    </div>


                        <table class="table table-condensed">
                            <!-- File_01 -->
                            <tr>

                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_01', 'Arquivo 01: * ' ) !!}</h3>
                                        <div class="">
                                             <a href="/../document-transparency/{{ $transparency->file_01 }}" target="_blank">DOWNLOAD</a>

                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_02 -->
                            <tr>

                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_02', 'Arquivo 02: * ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-transparency/{{ $transparency->file_02 }}" target="_blank">DOWNLOAD</a>

                                        </div>
                                    </div>

                                </td>

                            </tr>
                            <!-- File_03 -->
                            <tr>

                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_03', 'Arquivo 03: * ' ) !!}</h3>
                                        <div class="">
                                            <a href="/../document-transparency/{{ $transparency->file_03 }}" target="_blank">DOWNLOAD</a>
                                        </div>
                                    </div>

                                </td>

                            </tr>


                        </table>


                </div>


            </div>
            <!-- END OVERVIEW -->
        </div>

    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<div class="clearfix"></div>
<div class="clearfix"></div>

@include('template-panel.footer')
