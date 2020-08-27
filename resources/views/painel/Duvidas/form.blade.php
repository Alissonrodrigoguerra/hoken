<div class="row">
                  
  <div class="col-lg-8">
      <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">{{ __('Duvidas') }}</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
            <div class="card-body">
              {!! Form::text('name', 'Modelo Manual')->value($Duvidas->nome?? '') !!}  
              <div class="form-group">
                <div class="mb-3">
                    <label for="exampleInputFile"></label>
                    <textarea name="post_content"  class="textarea"  style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">@isset($Duvidas->id){{ $Duvidas->descripiton }}@endisset</textarea>
                  </div>
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
                        @isset($Duvidas->id)
                          @if ($Duvidas->status_log == 1)
                           <option value="1">Público</option>

                          @else
                           
                           <option value="0">Rascunho</option>

                          @endif
                        @endisset
                        <option value="1">Público</option>
                        <option value="0">Rascunho</option>
                      </select>
                    </div></h6>
                    <h6 > Data da publicação: <b>@isset($Duvidas->id){{ $Duvidas->Banner_data}}@endisset</b></h6>


  
                    <div class="form-group">
                      <label>Data da Publicação:</label>

                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="text" name="banner_data" value="@isset($Duvidas->id){{ $Duvidas->Banner_data}}@endisset" class="form-control float-right" id="reservation">
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






