<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Queries\ProductQuery;
use App\Services\ProductService;
use Dentro\Yalr\Attributes;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

#[Attributes\Prefix('products')]
#[Attributes\Name('products', false, true)]
class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->setPageTitle('Products');
        $this->setBreadCrumb(['title' => 'Products']);

    }

    /**
     * @return View
     */
    #[Attributes\Get('', 'index')]
    public function index(): View
    {
        $products = ProductQuery::filterColumn()
            ->orderColumn()
            ->getAllDataPaginated();
        $this->setData('products', $products);
        return $this->view('pages.admin.product.index');
    }

    /**
     * @return View
     */
    #[Attributes\Get('create', 'create')]
    public function create(): View
    {
        return $this->view('pages.admin.product.create');
    }

    /**
     * @param Request $request
     * @param ProductService $service
     * @return RedirectResponse
     * @throws \Throwable
     */
    #[Attributes\Post('create')]
    public function store(Request $request, ProductService $service): \Illuminate\Http\RedirectResponse
    {
        $service->create($request);
        successToast('Successfully Created');
        return back();
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return View
     */
    #[Attributes\Get('{product}/edit', 'edit')]
    public function edit(Request $request, Product $product): View
    {
        setDefaultRequest($product->toArray());
        return $this->view('pages.admin.product.edit');
    }

    /**
     * @param Request $request
     * @param Product $product
     * @param ProductService $service
     * @return RedirectResponse
     * @throws \Throwable
     */
    #[Attributes\Put('{product}/edit')]
    public function update(Request $request, Product $product, ProductService $service): \Illuminate\Http\RedirectResponse
    {
        $service->update($product, $request);
        successToast('Successfully Created');
        return back();
    }

    /**
     * @param Product $product
     * @return RedirectResponse
     */
    #[Attributes\Put('{product}/destroy', 'destroy')]
    public function destroy(Product $product): \Illuminate\Http\RedirectResponse
    {
        $product->delete();
        return back();
    }
}
