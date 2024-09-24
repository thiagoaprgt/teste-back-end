<?php

    namespace App\Interfaces;

    interface RepositoriesInterface {

        public function getAll(string $filter = null) : array;
        public function getById(string $id) : stdClass |  null;
        public function create(string $id) : stdClass |  null;
        public function update(string $id) : stdClass |  null;
        public function delete(string $di) : void;

    }