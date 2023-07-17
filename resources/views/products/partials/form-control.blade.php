<div class="form-group">
  <label for="name">Nama Produk</label>
  <input type="text" name="name" value="{{ old('name') ?? $product->name }}" class="form-control mb-2" id="name" autocomplete="off" autofocus>
  @error('name')
      <div class="text-danger">
        {{ $message }}
      </div>
  @enderror
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="price">Harga</label>
      <input type="text" placeholder="ex : 25000" name="price" value="{{ old('price') ?? $product->price }}" class="form-control mb-2" id="price">
      @error('price')
          <div class="text-danger">
            {{ $message }}
          </div>
      @enderror
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label for="discount">Harga Diskon</label>
      <input type="text" placeholder="ex : 12000" name="discount" value="{{ old('discount') ?? $product->discount }}" class="form-control mb-2" id="discount">
      @error('discount')
          <div class="text-danger">
            {{ $message }}
          </div>
      @enderror
    </div>
  </div>
</div>

<div class="form-group">
  <label for="category">Kategori</label>
  <select name="category" class="form-control mb-2" id="category">
    <option disabled selected>Pilih Satu!</option>
    @foreach ($categories as $category)
        <option {{ $product->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
  </select>
  @error('category')
      <div class="text-danger">
        {{ $message }}
      </div>
  @enderror
</div>

<div class="form-group">
  <label for="description">Deskripsi</label>
  <textarea name="description" id="description" class="form-control mb-2" cols="30" rows="6">{{ old('description') ?? $product->description }}</textarea>
  @error('description')
    <div class="text-danger">
      {{ $message }}
    </div>
  @enderror
</div>

<div class="form-group">
  <label for="thumbnail">Foto</label><br>
  <input type="file" name="thumbnail" id="thumbnail">
  @error('thumbnail')
      <div class="text-danger">
        {{ $message }}
      </div>
  @enderror
</div>

<button type="submit" class="btn btn-primary mt-3">{{ $submit ?? 'update' }}</button>