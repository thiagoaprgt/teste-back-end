<div class="row g-3">
    <div class="col-md-3">
      <label  class="form-label">ID</label>
      <input type="number" name="id" class="form-control" id="filter_id">
    </div>
    <div class="col-md-3">
      <label  class="form-label">Nome</label>
      <input type="text" name="name" class="form-control" id="filter_name">
    </div>  
    <div class="col-md-3">
      <label  class="form-label">Categoria</label>
      <select id="filter_category" name="category" class="form-select" aria-label="Default select example">
        <option value="allCategories" selected>Todas as categorias</option>
          @foreach ($categories as $key => $arrayGroupby)
          <option value="{{ $key }}">{{ $key }}</option>
          @endforeach
                                      
      </select>
    </div>
    <div class="col-md-3">
      <label for="inputZip" class="form-label">URL da imagem</label>
      <input type="text" name="image_url" class="form-control" id="filter_image_url">
    </div>
    
    <div class="col-12">
      <button id="searchFilterSubmit" class="btn btn-primary">Filtrar informações</button>
      
      <button class="btn btn-primary" onclick="resetFilters()">Limpar filtros de Busca</button>

      @include('bootstrap/loading')

    </div>
</div>