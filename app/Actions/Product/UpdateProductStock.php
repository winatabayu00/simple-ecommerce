<?php

namespace App\Actions\Product;

use App\Enums\ResponseCode;
use App\Models\Product;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;
use Winata\Core\Response\Exception\BaseException;
use Winata\PackageBased\Abstracts\BaseAction;
use Winata\PackageBased\Concerns\ValidationInput;

class UpdateProductStock extends BaseAction
{
    use ValidationInput;

    public Product $product;

    public function __construct(
        public array $inputs,
        bool           $usingDBTransaction = false
    )
    {
        parent::__construct($usingDBTransaction);
    }

    /**
     * @return BaseAction
     * @throws AuthorizationException
     * @throws BaseException
     * @throws ValidationException
     */
    public function rules(): BaseAction
    {
        $this->validate(
            inputs: $this->inputs,
            rules: [
                'product_id' => 'required|uuid',
                'quantity' => 'required|integer',
            ]
        );

        $this->product = Product::query()->findOrFail($this->inputs['product_id']);

        $newStock = $this->validatedData['quantity'];
        $stock = $this->product->stock + $newStock;

        if ($stock < 0){
            throw new BaseException(rc: ResponseCode::ERR_ITEM_OUT_OFF_STOCK);
        }

        return $this;
    }

    public function handle(): Product
    {
        $newStock = $this->validatedData['quantity'];
        $this->product->stock += $newStock;
        $this->product->save();

        return $this->product;
    }
}
