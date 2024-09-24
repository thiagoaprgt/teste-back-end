<?php

namespace App\ProductsRepository;

use App\Interfaces\RepositoriesInterface;
use App\Models\products;


class ProductsRepository {

    protected $model;

    public function __construct() {

        $this->model = new App\Models\products;

    }

    public function getAll(string $filter = null) {
        $this->model->toArray();
    }

    public function getById(string $id) {

    }
    public function create(string $id) {

    }

    public function update(string $id) {

    }

    public function delete(string $di) {

    }

}