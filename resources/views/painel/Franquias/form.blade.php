<div class="row">
                  
  <div class="col-lg-8">
      <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">{{ __('Conteúdo') }}</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
            <div class="card-body">
              {!! Form::text('nome', 'Nome da franquia')->value($Franquias->nome?? '') !!}  
              {!! Form::text('codigo', 'Código Franquia')->value($Franquias->codigo?? '') !!}
              {!! Form::select('tipo','Tipo', ['vendas'=>'Vendas','pos_vendas'=>'Pós Vendas','venda_pos_vendas'=>'Vendas e Pós Vendas']) !!}  
              {!! Form::text('Rua', 'Rua')->value($Franquias->Rua?? '') !!}  
              {!! Form::text('Numero', 'Número')->value($Franquias->Numero?? '') !!}  
              {!! Form::text('Bairro', 'Bairro')->value($Franquias->Bairro?? '') !!}  
              {!! Form::text('CEP', 'CEP')->value($Franquias->CEP?? '') !!}  
              {!! Form::text('Whatsapp', 'Whatsapp')->value($Franquias->Telefone?? '') !!}  
              {!! Form::text('Telefone', 'Telefone')->value($Franquias->Telefone?? '') !!}  
              {!! Form::text('email', 'E-mail')->value($Franquias->email?? '')->type('email') !!}  
              {!! Form::text('referencia', 'Referência')->value($Franquias->referencia?? '') !!}  
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
                        @isset($Franquias->id)
                          @if ($Franquias->status_log == 1)
                           <option value="1">Público</option>

                          @else
                           
                           <option value="0">Rascunho</option>

                          @endif
                        @endisset
                        <option value="1">Público</option>
                        <option value="0">Rascunho</option>
                      </select>
                    </div></h6>
                    <h6 > Data da publicação: <b>@isset($Franquias->id){{ $Franquias->Banner_data}}@endisset</b></h6>


  
                    <div class="form-group">
                      <label>Data da Publicação:</label>

                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="text" name="banner_data" value="@isset($Franquias->id){{ $Franquias->Banner_data}}@endisset" class="form-control float-right" id="reservation">
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






