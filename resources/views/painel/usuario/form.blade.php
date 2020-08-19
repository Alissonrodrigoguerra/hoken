<div class="row ">
                  
  <div class="col-lg-12 ">
      <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">{{ __('usuario') }}</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputFile">Nome Completo</label>
                <input name="name"  value="@isset($usuario->id){{ $usuario->name }}@endisset" type="text" class="form-control" id="exampleInputEmail1" placeholder="Insira um título" >
              </div>
              <div class="form-group">
                <label for="exampleInputFile">E-mail</label>
                <input name="email"  value="@isset($usuario->id){{ $usuario->email }}@endisset" type="text" class="form-control" id="exampleInputEmail1" placeholder="Insira um título" >
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Senha</label>
                <input name="password"   type="password" class="form-control" id="exampleInputEmail1" placeholder="Insira um título" >
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Confirmação de senha</label>
                <input name="password_confirmation"   type="password" class="form-control" id="exampleInputEmail1" placeholder="Insira um título" >
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Cargo</label>
                <select class="form-control"  name="categoria_id" >
                 @isset($usuario->cargo_id)
                 @if ($usuario->status == 1)
                  <option value="1"> Cliente </option>

                 @elseif($usuario->status == 0)
                
                 <option value="0"> Root </option>

                 @endif 
                      
                  @endisset 
                 
                  <option value="0" >  </option>
                   <option value="0" > Administrador</option>
                   <option value="1"> Cliente </option>
                

                </select>
              </div>
              
             
              <div class="form-group">
                <label for="exampleInputFile">Status</label>
                <select class="form-control"   name="status" >
                  @isset($usuario->status)
                  @if ($usuario->status == 1)
                  <option value="1"> Ativo </option>

                 @elseif($usuario->status == 0)
                
                 <option value="0"> Inativo </option>

                 @endif 
                      
                  @endisset 
                 
                  <option value="0" > Deseja liberar acesso a este usuário? </option>
                   <option value="0" > Ativo</option>
                   <option value="1"> Inativo </option>
                

                </select>
              </div>
             

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit"  class="btn btn-primary .hidden-sm .hidden-md ">Registrar</button>
              </div>

  </div>
</div>
</div>






