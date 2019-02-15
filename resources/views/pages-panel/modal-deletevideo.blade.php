<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h2 class="modal-title">Deletar Vídeo</h2>
                       </div>
                       <div class="modal-body">
                           <h2>Você deletará este vídeo.</h2>
                           <div class="form-group">

                                <iframe width="260" height="180" src="{{$video->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                           </div>
                           <p>Gostaria mesmo de deletar este vídeo?</p>


                       </div>
                       <div class="modal-footer">
                               <!-- Form para deletar isto -->
                               {!! Form::open(['route'=> ['deletarvideo.destroy', $video->id],'method'=>'DELETE']) !!}

                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    {!!Form::submit('DELETAR', ['class' => 'btn btn-lg btn-danger', 'data' => 'modal'])!!}
                                                     <br><br>
                              {!! Form::close() !!}

                       </div>
                   </div><!-- /.modal-content -->
               </div><!-- /.modal-dialog -->
</div>
