<div class="row">
                  
  <div class="col-lg-8">
      <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">{{ __('banner') }}</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputFile"></label>
                <input name="banner_title"  value="@isset($banner->id){{ $banner->Banner_title }}@endisset" type="text" class="form-control" id="exampleInputEmail1" placeholder="Insira um título" >
              </div>
              <div class="form-group">
                <label for="exampleInputFile"></label>
                <input name="banner_subtitle"  value="@isset($banner->id){{ $banner->Banner_subtitle }}@endisset" type="text" class="form-control" id="exampleInputEmail1" placeholder="Insíra um Subtitulo" >
              </div>
              <div class="form-group">
                <label for="exampleInputFile"></label>
                <input name="banner_link"  value="@isset($banner->id){{ $banner->Banner_title }}@endisset" type="text" class="form-control" id="exampleInputEmail1" placeholder="Insíra um link" >
              </div>
              <div class="form-group">
                <select class="form-control"  id="categoria_id" name="slider_id" >
                  @isset($banner->slider_id)
                  @if ($banner->slider_id == 1)
                  <option value="1"> Home </option>

                 @elseif($banner->slider_id == 2)
                
                 <option value="2"> Produto </option>

                 @elseif($banner->slider_id == 3)
                 
                 <option value="3"> Certificado </option>

                 @elseif($banner->slider_id == 0)
                 
                 <option value="0" > Selecione um slider </option>

                 @endif 
                      
                  @endisset 
                 

                   <option value="0" > Selecione um slider </option>
                   <option value="1"> Home </option>
                   <option value="3"> Certificado </option>
                   <option value="2"> Produto </option>

                </select>
              </div>
            </div>
            <!-- /.card-body -->

  </div>
  

          
  </div>

  <div class="col-lg-4">
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
                        @isset($banner->id)
                          @if ($banner->status_log == 1)
                           <option value="1">Público</option>

                          @else
                           
                           <option value="0">Rascunho</option>

                          @endif
                        @endisset
                        <option value="1">Público</option>
                        <option value="0">Rascunho</option>
                      </select>
                    </div></h6>
                    <h6 > Data da publicação: <b>@isset($banner->id){{ $banner->Banner_data}}@endisset</b></h6>


  
                    <div class="form-group">
                      <label>Data da Publicação:</label>

                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="text" name="banner_data" value="@isset($banner->id){{ $banner->Banner_data}}@endisset" class="form-control float-right" id="reservation">
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
            <h3 class="card-title">{{ __('Destaque') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputFile">Insira um imagem </label>
                    <span>na medida 1920px por 1080px</span><br>
                    <span>
                      @isset($banner->Banner_imagem)
                      <img src="{{url('storage/app/'. $banner->Banner_imagem)}}" width="200px" alt="{{ $banner->Banner_title }}">
                      @endisset
                    </span><br><br>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="banner_imagem" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Imagem</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Insira um imagem </label>
                    <span>na medida 720px por 480px</span><br>
                    <span>
                      @isset($banner->Banner_imagem_moblie)
                      <img src="{{url('storage/app/'. $banner->Banner_imagem_moblie)}}" width="200px" alt="{{ $banner->Banner_title }}">
                      @endisset
                    </span><br><br>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="Banner_imagem_moblie" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Imagem Responsive</label>
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






