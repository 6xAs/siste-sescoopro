@include('template-panel.head')

@include('template-panel.topo')

@include('template-panel.menu')

@include('scripts.script_formselect')

@section('title', 'Detalhes Deste Edital - Processo Seletivo')

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
                        <button type="button" class="btn btn-primary"> GERAR PDF </button>

                    </div>
                    <br>

                    <div class="form-group">
                        <h3>{!! Form::label('number_edital', 'Edital: ' ) !!}</h3>
                        <h4>{{$proSeletivo->number_edital}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('title', 'Título:  ' ) !!}</h3>
                        <h4>{{$proSeletivo->title}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('document_name', 'Sub Título: ' ) !!}</h3>
                        <h4>{{$proSeletivo->subtitle}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('data', 'Data:* ' ) !!}</h3>
                        <h4>{{date('d/m/y', strtotime($proSeletivo->data))}}</h4>
                    </div>
                    <div class="form-group">
                        <h3>{!! Form::label('observacao', 'Observações: ' ) !!}</h3>
                        <h4>{{$proSeletivo->observacao}}</h4>
                    </div>

                        <table class="table table-condensed">
                            <!-- File_01 -->
                            <tr>

                                <td>
                                    <div class="form-group">
                                        <h3>{!! Form::label('file_01', 'Arquivo 01: * ' ) !!}</h3>
                                        <div class="">
                                             <a href="/../processo-seletivo/{{ $proSeletivo->file_01 }}" target="_blank">{{ $proSeletivo->file_01 }}</a>

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
                                            <a href="/../processo-seletivo/{{ $proSeletivo->file_02 }}" target="_blank">{{ $proSeletivo->file_02 }}</a>

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
                                            <a href="/../processo-seletivo/{{ $proSeletivo->file_03 }}" target="_blank">{{ $proSeletivo->file_03 }}</a>
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

@include('template-panel.footer')
