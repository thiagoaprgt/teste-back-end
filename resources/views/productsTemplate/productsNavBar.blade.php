<nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <div class="navbar-brand" href="#">Bara de navegação</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Barra de Navegação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Logout</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Produtos
                            </a>
                            <ul class="dropdown-menu">                            
                            
                            <li><a class="dropdown-item" href="/newProducts">Cadastrar Produto</a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <div class="dropdown-item"> 
                                    Categoria                           
                                    <select id="selectcategories" class="form-select" aria-label="Default select example">
                                        
                                        @foreach ($categories as $key => $arrayGroupby)
                                        <option value="{{ $key }}">{{ $key }}</option>
                                        @endforeach
                                                                    
                                    </select>
                                    <a href="/newCategory" class="btn btn-success d-inline-flex focus-ring py-1 px-2 text-decoration-none border rounded-2">➕</a>                            
                                    <button class="btn btn-danger d-inline-flex focus-ring py-1 px-2 text-decoration-none border rounded-2" id="submitDeleteCategory">🗑️</button>                            
                                </div>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a download class="dropdown-item" href="../assets/txt/products.txt">Modelo de arquivo para importar</a></li>
                            </ul>
                        </li>
                    </ul>

                    <div class="d-flex mt-3" role="search">
                        <input  type="file" id="importJsonFromTxt" name="importJsonFromTxt" accept=".txt" class="form-control me-2"  placeholder="file">
                        <button id="submitUpload" class="btn btn-outline-success">Importar</button>
                    </div>
                    
                </div>
                </div>
            </div>
        </nav>