@include('admin.includes.alerts')
<div class="form-group">
    <label for="name">Nome da Categoria</label>
    <input type="text" class="form-control" name="name" value="{{$category->name ?? old('name')}}">
</div>
<div class="form-group">
    <label for="name">Descrição</label>
   <textarea name="description" id="" cols="30" rows="5" class="form-control">{{$category->description ?? old('description')}}</textarea>
</div>
</div>
