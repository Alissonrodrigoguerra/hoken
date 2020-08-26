
                <div class="row">
                  <div class="col-lg-8">
                      <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">{{ __('Conteúdo') }}</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                            <div class="card-body"> 
                            {!! Form::text(config('form.name_selo.name'), config('form.name_selo.label'), config('form.name_seloto.placeholder'))->value( $selo->nome ?? "") !!}
                            
                            {!! Form::select(config('form.tipo.name'), config('form.tipo.label'), ['franquia' => 'Franquia','produto' => 'Produto']) !!}
                            @isset($selo->imagem)
                            <img src="{{asset('storage/'. str_after($selo->imagem, 'public/'))}}" width="200px" alt="{{ $selo->imagem }}">
                            @endisset
                            {!! Form::file(config('form.imagem.name'), config('form.imagem.label')); !!}
                            {!! Form::hidden('Produto_id')->value($product->id) !!}
                            </div>
                            <!-- /.card-body -->
            
                             <div class="card-footer">
                                  <a href="#" class="btn btn-outline-primary"><i class="fas fa-plus-circle"></i> Característica </a>
                                  <a href="#" class="btn btn-outline-primary"><i class="fas fa-plus-circle"></i> Processo </a>
                                  <a href="#" class="btn btn-outline-primary"><i class="fas fa-plus-circle"></i> selo </a>
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
                                          @isset($Blog->id)
                                            @if ($Blog->status_log == 1)
                                             
                                            <option value="1">Público</option>

                                            @else
                                             
                                             <option value="0">Rascunho</option>

                                            @endif
                                          @endisset
                                          <option value="1">Público</option>
                                          <option value="0">Rascunho</option>
                                        </select>
                                      </div></h6>

                                     
                                      <h6 > Data da publicação: <b>@isset($Blog->id){{ $Blog->post_data}}@endisset</b></h6>


                    
                                      <div class="form-group">
                                        <label>Data da Publicação:</label>

                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              <i class="far fa-calendar-alt"></i>
                                            </span>
                                          </div>
                                          <input type="text" name="post_data" class="form-control float-right" id="reservation">
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


              


              
             