<form acticon="/searchFilters" method="POST" class="row g-3">
    <div class="col-md-3">
      <label for="inputEmail4" class="form-label">ID</label>
      <input type="number" class="form-control" id="filter_id">
    </div>
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label">name</label>
      <input type="password" class="form-control" id="filter_name">
    </div>  
    <div class="col-md-3">
      <label for="inputState" class="form-label">Categoria</label>
      <select id="filter_category" class="form-select" aria-label="Default select example">
          
          @foreach ($categories as $key => $arrayGroupby)
          <option value="{{ $key }}">{{ $key }}</option>
          @endforeach
                                      
      </select>
    </div>
    <div class="col-md-3">
      <label for="inputZip" class="form-label">URL da imagem</label>
      <input type="text" class="form-control" id="filter_image_url">
    </div>
    
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Filtrar informações</button>
    </div>
  </form>