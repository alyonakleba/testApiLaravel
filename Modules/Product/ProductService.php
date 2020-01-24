<?php

namespace Modules\Product;

use Analogue\ORM\EntityCollection;
use Analogue\ORM\System\Mapper;
use Modules\Product\Mappers\ProductMapper;
use Modules\Product\Models\Product;
use Modules\LibraryModule\BaseService;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ProductService extends BaseService
{
    public function __construct()
    {
        app('analogue')->register(Product::class, ProductMapper::class);
    }

    /**
     * @return EntityCollection
     */
    public function get()
    {
        return $this->getMapper()->get();
    }

    /**
     * @param $id
     * @return Product
     * @throws BadRequestHttpException
     */
    public function getById($id)
    {
        $product = $this->getMapper()->find($id);
        if (!$product) {
            throw new BadRequestHttpException('Wrong Id number for product!');
        }
        return $product;
    }

    public function create(array $params)
    {
        $params[Product::ID] = 0;
        return $this->getMapper()->store($this->build($params));
    }

    public function update(array $params)
    {
        $product = $this->getById($params[Product::ID]);
        $this->setAllParams($product, $params);

        return $this->getMapper()->store($product);
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $this->getMapper()->delete($this->getById($id));
        return true;
    }

    /**
     * @param array $params
     * @return Product
     */
    public function build(array $params)
    {
        return new Product(
            $params[Product::ID],
            $params[Product::NAME],
            $params[Product::CATEGORY_ID]
        );
    }

    /**
     * @return Mapper
     */
    private function getMapper()
    {
        return app('analogue')->mapper(Product::class);
    }
}
