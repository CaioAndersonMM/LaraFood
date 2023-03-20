@include('admin.includes.alerts')
<div class="form-group">
    <label for="name">Nome do Plano</label>
    <input type="text" class="form-control" name="name" value="{{$plans->name ?? old('name')}}">
</div>
<div class="form-group">
    <label for="price">Preço do Plano</label>
    <input type="text" class="form-control" name="price" value="{{$plans->price ?? old('price')}}">
</div>
<div class="form-group">
    <label for="description">Descrição do Plano</label>
    <input type="text" class="form-control" name="description" value="{{$plans->description ?? old('description')}}">
</div>
