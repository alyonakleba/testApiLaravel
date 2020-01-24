<?php

namespace Modules\Category;

use Analogue\ORM\EntityCollection;
use Analogue\ORM\System\Mapper;
use Modules\Category\Mappers\CategoryMapper;
use Modules\Category\Models\Category;
use Modules\LibraryModule\BaseService;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CategoryService extends BaseService
{
    public function __construct()
    {
        app('analogue')->register(Category::class, CategoryMapper::class);
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
     * @return Category
     * @throws BadRequestHttpException
     */
    public function getById($id)
    {
        $category = $this->getMapper()->find($id);
        if (!$category) {
            throw new BadRequestHttpException('Wrong Id number for category!');
        }
        return $category;
    }

    public function create(array $params)
    {
        $params[Category::ID] = 0;
        return $this->getMapper()->store($this->build($params));
    }

    public function update(array $params)
    {
        $category = $this->getById($params[Category::ID]);
        $this->setAllParams($category, $params);

        return $this->getMapper()->store($category);
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
     * @return Category
     */
    public function build(array $params)
    {
        return new Category(
            $params[Category::ID],
            $params[Category::NAME],
            $params[Category::IS_ACTIVE]
        );
    }

    /**
     * @return Mapper
     */
    private function getMapper()
    {
        return app('analogue')->mapper(Category::class);
    }
}
