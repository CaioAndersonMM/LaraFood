@include('admin.includes.alerts')

<div class="form-group">
    <label for="name">Nome da Permissão</label>
    <input type="text" class="form-control" name="name" value="{{$permission->name ?? old('name')}}" required>
</div>
<div class="form-group">
    <label for="description">Descrição da Permissão</label>
    <input type="text" class="form-control" name="description" value="{{$permission->description ?? old('description')}}" required>
</div>
