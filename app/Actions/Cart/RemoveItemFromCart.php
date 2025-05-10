<?php

namespace App\Actions\Cart;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;
use Winata\PackageBased\Abstracts\BaseAction;
use Winata\PackageBased\Concerns\ValidationInput;

class RemoveItemFromCart extends BaseAction
{
    use ValidationInput;

    public function __construct(
        public CartItem $cartItem,
        bool            $usingDBTransaction = false
    )
    {
        parent::__construct($usingDBTransaction);
    }

    /**
     * @return BaseAction
     */
    public function rules(): BaseAction
    {
        return $this;
    }

    public function handle(): bool|null
    {
        return $this->cartItem->delete();
    }
}
