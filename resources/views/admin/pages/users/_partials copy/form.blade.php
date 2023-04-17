@include('admin.includes.alerts')
<div class="form-group">
    <label for="name">Nome do Usuário</label>
    <input type="text" class="form-control" name="name" value="{{$user->name ?? old('name')}}">
</div>
<div class="form-group">
    <label for="name">Email do Usuário</label>
    <input type="email" class="form-control" name="email" value="{{$user->email ?? old('email')}}">
</div>
<div class="form-group">
    <label for="name">Senha </label>
    <input type="password" class="form-control" name="password" placeholder="Digite uma senha de 8 dígitos">
</div>
</div>
