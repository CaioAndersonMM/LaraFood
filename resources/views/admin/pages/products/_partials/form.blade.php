@include('admin.includes.alerts')
<div class="form-group">
    <label for="name">* Título do Produto</label>
    <input type="text" class="form-control" name="title" value="{{$product->title ?? old('title')}}">
</div>
<div class="form-group">
    <label for="name">Descrição</label>
   <textarea name="description" id="" cols="30" rows="5" class="form-control">{{$product->description ?? old('description')}}</textarea>
</div>
<div class="form-group">
    <label for="name">* Valor do Produto </label>
    <input type="text" class="form-control" name="price" value="{{$product->price ?? old('price')}}">
</div>
<div class="form-group">
    <label for="image">Imagem:</label>
    <br>
    <input type="file" name="image">
</div>
</div>
