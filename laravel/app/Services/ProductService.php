<?php 
class ProductService
{
    protected $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        if ($this->repository->findByCode($data['code'])) {
            throw new \Exception('Product with the same code already exists', 409);
        }
        if (str_contains($data['price'], ',')) {
            $data['price'] = str_replace(',', '.', $data['price']);
        }
        return $this->repository->create($data);
    }
}
