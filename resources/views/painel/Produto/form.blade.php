
                <div class="row">
                  <div class="col-lg-8">
                      <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">{{ __('Conteúdo') }}</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                            <div class="card-body">
                              
                            </div>
                            <!-- /.card-body -->
            
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

                  <div class="col-lg-12">
                      <div class="card card-primary">
                          <div class="card-header">
                              <h3 class="card-title">{{ __('Tags') }}</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                              <div class="card-body">
                                  <div class="form-group">
                                      <label>Marque suas tags</label>
                                      <span>e utilize a "," para separar as tags.</span>
                                  <input name="post_tag" value="@isset($Blog->id){{ $Blog->post_tag}}@endisset" type="text" class="form-control" id="exampleInputEmail1" placeholder="Insíra seu título" autocomplete="off" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">

                                    </div>
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                              </div>
                          </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="card card-primary">
                          <div class="card-header">
                              <h3 class="card-title">{{ __('Destaque') }}</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                              <div class="card-body">
                                  <div class="form-group">
                                      <label for="exampleInputFile">Insira um imagem </label>
                                      <span>na medida 600px por 250px</span><br>
                                      <span>
                                        @isset($Blog->post_imagem)
                                        <img src="{{asset('storage/'. str_after($Blog->post_imagem, 'public/'))}}" width="200px" alt="{{ $Blog->post_title }}">
                                        @endisset
                                      </span><br><br>
                                      <div class="input-group">
                                        <div class="custom-file">
                                          <input type="file" name="post_imagem" class="custom-file-input" id="exampleInputFile">
                                          <label class="custom-file-label" for="exampleInputFile">Imagem</label>
                                        </div>
                                        <div class="input-group-append">
                                          <span class="input-group-text" id="">Upload</span>
                                        </div>
                                      </div>
                                    </div>
                              
                              </div>
                            </div>
                              
                              <!-- /.card-body -->
              
                              <div class="card-footer">
                              </div>
                          </div>

                          
                  </div>
              </div>
              </div>


              


              
             