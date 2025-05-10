<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Queries\ProductQuery;
use App\Queries\ReviewQuery;
use Dentro\Yalr\Attributes;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

#[Attributes\Prefix('products')]
#[Attributes\Name('products', false, true)]
class ProductController extends Controller
{
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
        return $this->view('pages.app.product.index');
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return View
     */
    #[Attributes\Get('{product}/preview', 'preview')]
    public function preview(Request $request, Product $product): View
    {
        $request->mergeIfMissing([
            'product_id' => $product->id,
        ]);

        $reviews = ReviewQuery::filterColumn()
            ->orderColumn()
            ->build()
            ->paginate(5);

        $this->setData('reviews', $reviews);
        $this->setData('product', $product);
        return $this->view('pages.app.product.preview');
    }
}
