<?php
interface ProductRepositoryInterface
{
    public function findByCode(string $code);
    public function create(array $data);
}
