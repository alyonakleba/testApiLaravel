<?php

namespace Modules\Attribute;

use Analogue\ORM\EntityCollection;
use Analogue\ORM\System\Mapper;
use Modules\Attribute\Mappers\AttributeMapper;
use Modules\Attribute\Models\Attribute;
use Modules\LibraryModule\BaseService;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class AttributeService extends BaseService
{
    public function __construct()
    {
        app('analogue')->register(Attribute::class, AttributeMapper::class);
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
     * @return Attribute
     * @throws BadRequestHttpException
     */
    public function getById($id)
    {
        $attribute = $this->getMapper()->find($id);
        if (!$attribute) {
            throw new BadRequestHttpException('Wrong Id number for attribute!');
        }
        return $attribute;
    }

    public function create(array $params)
    {
        $params[Attribute::ID] = 0;
        return $this->getMapper()->store($this->build($params));
    }

    public function update(array $params)
    {
        $attribute = $this->getById($params[Attribute::ID]);
        $this->setAllParams($attribute, $params);

        return $this->getMapper()->store($attribute);
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
     * @return Attribute
     */
    public function build(array $params)
    {
        return new Attribute(
            $params[Attribute::ID],
            $params[Attribute::NAME],
            $params[Attribute::CATEGORY_ID]
        );
    }

    /**
     * @return Mapper
     */
    private function getMapper()
    {
        return app('analogue')->mapper(Attribute::class);
    }
}
