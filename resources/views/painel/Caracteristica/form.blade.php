
                <div class="row">
                  <div class="col-lg-8">
                      <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">{{ __('Conteúdo') }}</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                            <div class="card-body"> 
                              
                            {!! Form::text(config('form.name_produto.name'), config('form.name_produto.label'), config('form.name_produto.placeholder')) !!}
                            {!! Form::text(config('form.link.name'), config('form.link.label'), config('form.link.placeholder')) !!}
                            {!! Form::text(config('form.Video_link.name'), config('form.Video_link.label'), config('form.Video_link.placeholder') ) !!}
                            {!! Form::file(config('form.imagem_destaque.name'), config('form.imagem_destaque.label')); !!}
                            {!! Form::file(config('form.imagem_backgound.name'), config('form.imagem_backgound.label')) !!}



                            </div>
                            <!-- /.card-body -->
            
                             <div class="card-footer">
                                  <a href="#" class="btn btn-outline-primary"><i class="fas fa-plus-circle"></i> Cor </a> 
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

                                      <h6 > Destaque: <div class="form-group">
                                        <select class="form-control" name="destaque">
                                          @isset($Blog->id)
                                            @if ($Blog->destaque == 1)
                                             <option value="1">Sim</option>

                                            @else
                                             
                                             <option value="Null">Não</option>

                                            @endif
                                          @endisset
                                          <option value="1">Sim</option>
                                          <option value="Null">Não</option>
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
                  <div class="col-lg-12">
                      <div class="card card-primary">
                          <div class="card-header">
                              <h3 class="card-title">{{ __('Categorias') }}</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->

                              <div class="card-body">
                                  <div class="form-group">
                                      <label>Categorias</label>
                                      <a  onclick="location.reload();" id="categoria_refresh" class="float-right">&nbsp;	<i class="fas fa-sync"></i></a>
                                      <select class="form-control"  id="categoria_id" name="categoria_id" >
                                        @foreach ($Categorias as $categoria)
                                         <option value="{{$categoria->id}}">{{$categoria->categoria_title}} </option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="mensagem_return"></div>

                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                                  <a href="#" data-toggle="modal" data-target="#modal-xl-adicionar"><i class="fas fa-plus-circle"></i> Adicionar nova categoria</a>
                                  <a href="#" id="remover_categoria" class="float-right" ><i class="fas fa-trash-alt"></i> Remover categoria</a>
                              </div>
                        
                          </div>
                  </div>
              </div>
              </div>


              


              
             