<?php

namespace App\Services;

use App\Actions\Media\LinkedMediaCollection;
use App\Actions\Product\CreateProduct;
use App\Actions\Product\UpdateProduct;
use App\Actions\ProductSummary\UpdateOrCreateProductSummary;
use App\Enums\MediaCollectionName;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Winata\PackageBased\Abstracts\BaseService;

class ProductService extends BaseService
{
    /**
     * @param Request $request
     * @return void
     * @throws \Throwable
     */
    public function create(Request $request): void
    {
        $product = DB::transaction(function () use ($request) {
            /** @var Product $product */
            $product = (new CreateProduct($request->input()))->execute();
            (new LinkedMediaCollection(
                model: $product,
                request: $request,
                inputName: 'product_photo',
                collection: MediaCollectionName::PRODUCT_PHOTO,
                deletePreviousMedia: false
            ))->execute();

            (new UpdateOrCreateProductSummary($product))->execute();

            return $product->fresh();
        });
        $product->image = $product->getFirstMediaUrl(MediaCollectionName::PRODUCT_PHOTO->value);
        $product->save();
    }

    /**
     * @param Product $product
     * @param Request $request
     * @return void
     * @throws \Throwable
     */
    public function update(Product $product, Request $request): void
    {
        $product = DB::transaction(function () use ($product, $request) {
            (new UpdateProduct($product, $request->input()))->execute();
            (new LinkedMediaCollection(
                model: $product,
                request: $request,
                inputName: 'product_photo',
                collection: MediaCollectionName::PRODUCT_PHOTO,
                deletePreviousMedia: false
            ))->execute();

            return $product->fresh();
        });

        $product->image = $product->getFirstMediaUrl(MediaCollectionName::PRODUCT_PHOTO->value);
        $product->save();
    }
}
