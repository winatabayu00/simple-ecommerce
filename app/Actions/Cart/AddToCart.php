<?php

namespace App\Actions\Cart;

use App\Enums\ResponseCode;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;
use Winata\Core\Response\Exception\BaseException;
use Winata\PackageBased\Abstracts\BaseAction;
use Winata\PackageBased\Concerns\ValidationInput;

class AddToCart extends BaseAction
{
    use ValidationInput;

    public function __construct(
        public array $inputs,
        bool         $usingDBTransaction = false
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
        $validated = $this->validate(
            inputs: $this->inputs,
            rules: [
                'user_id' => ['required', 'int'],
                'cart_id' => ['required', 'uuid'],
                'product_id' => ['required', 'uuid'],
                'quantity' => ['required', 'numeric', 'gt:0'],
            ]
        );

        User::query()->findOrFail($validated['user_id']);
        Cart::query()->findOrFail($validated['cart_id']);
        Product::query()->findOrFail($validated['product_id']);

        return $this;
    }

    public function handle(): CartItem
    {
        $input = CartItem::getFillableAttribute($this->validatedData);
        return CartItem::query()->create($input);
    }
}
