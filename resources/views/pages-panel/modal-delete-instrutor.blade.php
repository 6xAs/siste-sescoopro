<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h2 class="modal-title">Deletar Instrutor</h2>
                       </div>
                       <div class="modal-body">
                           <h2>Você deletará este instrutor.</h2>
                           <div class="form-group">

                                <p>{{ $instrutor->name}}</p>

                           </div>

                       </div>
                       <div class="modal-footer">
                               <!-- Form para deletar isto -->
                               {!! Form::open(['route'=> ['deletarinstrutor.destroy', $instrutor->id],'method'=>'DELETE']) !!}

                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    {!!Form::submit('DELETAR', ['class' => 'btn btn-lg btn-danger', 'data' => 'modal'])!!}
                                                     <br><br>
                              {!! Form::close() !!}

                       </div>
                   </div><!-- /.modal-content -->
               </div><!-- /.modal-dialog -->
</div>
