<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Modules\Product\Models\Product;
use Modules\Product\ProductService;
use Request;

use App\Http\Requests;

class ProductController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->getProductService()->get()->toJson(JSON_NUMERIC_CHECK);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create(Requests\ProductRequest $request)
    {
        return $this->getProductService()->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        return $this->getProductService()->getById($id);
    }

    /**
     * @param Requests\ProductRequest $request
     * @param $id
     * @return Product
     */
    public function update(Requests\ProductRequest $request, $id)
    {
        $params = $request->all();
        $params[Product::ID] = $id;
        return $this->getProductService()->update($params);
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $this->getProductService()->delete($id);
        return response('', 204);
    }

    /**
     * @return ProductService
     */
    private function getProductService()
    {
        return App::make(ProductService::class);
    }
}
