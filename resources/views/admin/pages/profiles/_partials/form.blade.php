@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome do Perfil</label>
    <input type="text" class="form-control" name="name" value="{{$profile->name ?? old('name')}}" required>
</div>
<div class="form-group">
    <label for="description">Descrição do Perfil</label>
    <input type="text" class="form-control" name="description" value="{{$profile->description ?? old('description')}}">
</div>
