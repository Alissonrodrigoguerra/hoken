
                <div class="row">
                  <div class="col-lg-8">
                      <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">{{ __('Conteúdo') }}</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                            <div class="card-body"> 
                           
                            @php $name = "" @endphp
                            @isset($produto->id)  @php $name = $produto->name @endphp @endisset
                            {!! Form::text(config('form.name_produto.name'), config('form.name_produto.label'), config('form.name_produto.placeholder'))->value($name) !!}
       
                            @php $link = "" @endphp
                            @isset($produto->id) @php $link = $produto->link @endphp @endisset
                            {!! Form::text(config('form.link.name'), config('form.link.label'), config('form.link.placeholder'))->value($link) !!}
                            
                            @php $Video_link = "" @endphp
                            @isset($produto->id) @php $Video_link = $produto->Video_link  @endphp @endisset
                            {!! Form::text(config('form.Video_link.name'), config('form.Video_link.label'), config('form.Video_link.placeholder') )->value($Video_link) !!}
                            @isset($produto->imagem_destaque)
                            <img src="{{asset('storage/'. str_after($produto->imagem_destaque, 'public/'))}}" width="200px" alt="{{ $produto->imagem_destaque }}">
                            @endisset
                            {!! Form::file(config('form.imagem_destaque.name'), config('form.imagem_destaque.label')); !!}
                            @isset($produto->imagem_backgound)
                            <img src="{{asset('storage/'. str_after($produto->imagem_backgound, 'public/'))}}" width="200px" alt="{{ $produto->post_title }}">
                            @endisset
                            {!! Form::file(config('form.imagem_backgound.name'), config('form.imagem_backgound.label')) !!}



                            </div>
                            <!-- /.card-body -->
            
                             <div class="card-footer">
                              @isset($produto->id)
                                  <a href="{{ route('cor.index', $produto->id )}}" class="btn btn-outline-primary"><i class="fas fa-plus-circle"></i> Cor </a> 
                                  <a href="{{ route('cor.index', $produto->id )}}" class="btn btn-outline-primary"><i class="fas fa-plus-circle"></i> Característica </a>
                                  <a href="{{ route('cor.index', $produto->id )}}" class="btn btn-outline-primary"><i class="fas fa-plus-circle"></i> Processo </a>
                                  <a href="{{ route('cor.index', $produto->id )}}" class="btn btn-outline-primary"><i class="fas fa-plus-circle"></i> selo </a>
                              @endisset
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
                                          @isset($produto->id)
                                            @if ($produto->status_log == 1)
                                             
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
                                          @isset($produto->id)
                                            @if ($produto->destaque == 1)
                                             <option value="1">Sim</option>

                                            @else
                                             
                                             <option value="Null">Não</option>

                                            @endif
                                          @endisset
                                          <option value="1">Sim</option>
                                          <option value="Null">Não</option>
                                        </select>
                                      </div></h6>
                                      <h6 > Data da publicação: <b>@isset($produto->id){{ $produto->updated_at}}@endisset</b></h6>


                    
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


              


              
             