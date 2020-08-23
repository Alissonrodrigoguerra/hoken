
                <div class="row">
                  <div class="col-lg-8">
                      <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">{{ __('Conteúdo') }}</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                            <div class="card-body">
                              {!! Form::hidden('id', $Comentario->post_id ) !!}
                              {!!Form::textarea(config('form.comentario.name'),'', config('form.comentario.placeholder'))->value($Comentario->comment)->wrapperAttrs(['class' => 'col-12'])!!}
                              {!!Form::text(config('form.email.name'), '', config('form.email.label'))->type('email')->value($Comentario->email)->wrapperAttrs(['class' => 'col-xl-6 col-lg-6 col-12'])!!}
                              {!!Form::text(config('form.name.name'), '', config('form.name.label'))->value($Comentario->name)->wrapperAttrs(['class' => 'col-xl-6 col-lg-6 col-12'])!!}
                          <!-- /.card-body -->
                            </div> 
                            <div class="card-footer">
                            </div>
                        </div>
                  
                  </div>
              {{-- Rigth Bar --}}

              <div class="col-lg-4">
                  <div class="col-lg-12">
                      <div class="card card-primary">
                          <div class="card-header">
                              <h3 class="card-title">{{ __('Publicar') }}</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                              <div class="card-body">
                                  <div class="form-group">

                                      <h6 > Status: <div class="form-group">
                                        <select class="form-control" name="status_log">
                                          @isset($Comentario->id)
                                            @if ($Comentario->status_log == 1)
                                             
                                            <option value="1">Público</option>

                                            @else
                                             
                                             <option value="0">Rascunho</option>

                                            @endif
                                          @endisset
                                          <option value="1">Aprovado</option>
                                          <option value="0">Reprovado</option>
                                        </select>
                                      </div></h6>

                                    
                                      <h6 > Data da publicação: <b>@isset($Comentario->id){{ $Comentario->data}}@endisset</b></h6>


                    
                                      <div class="form-group">
                                        <label>Data da Publicação:</label>

                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              <i class="far fa-calendar-alt"></i>
                                            </span>
                                          </div>
                                          <input type="text" name="data" class="form-control float-right" id="reservation">
                                        </div>
                                      <!-- /.input group -->
                                    </div>
                              </div>
                              <!-- /.card-body -->
              
                              <div class="card-footer">
                              <button type="submit"  class="btn btn-primary .hidden-sm .hidden-md ">Publicar</button>
                              </div>
                          </div>
                  </div>
              </div>
              </div>


              


              
             