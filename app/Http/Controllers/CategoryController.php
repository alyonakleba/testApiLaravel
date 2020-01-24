<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\App;
use Modules\Category\CategoryService;
use Modules\Category\Models\Category;
use Request;

class CategoryController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return $this->getCategoryService()->get()->toJson(JSON_NUMERIC_CHECK);
    }

    /**
     * @param CategoryRequest $request
     * @return mixed
     */
    public function create(CategoryRequest $request)
    {
        return $this->getCategoryService()->create($request->all());
    }

    /**
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        return $this->getCategoryService()->getById($id);
    }

    /**
     * @param CategoryRequest $request
     * @param $id
     * @return array
     */
    public function update(CategoryRequest $request, $id)
    {
        $params = $request->all();
        $params[Category::ID] = $id;
        return $this->getCategoryService()->update($params);
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $this->getCategoryService()->delete($id);
        return response('', 204);
    }

    /**
     * @return CategoryService
     */
    private function getCategoryService()
    {
        return App::make(CategoryService::class);
    }
}
