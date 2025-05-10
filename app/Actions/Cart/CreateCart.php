<?php

namespace App\Actions\Cart;

use App\Models\Cart;
use App\Models\User;
use Winata\PackageBased\Abstracts\BaseAction;
use Winata\PackageBased\Concerns\ValidationInput;

class CreateCart extends BaseAction
{
    use ValidationInput;

    public function __construct(
        public User $user,
        bool        $usingDBTransaction = false
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

    public function handle(): Cart
    {
        $dataCart = [
            'user_id' => $this->user->id,
        ];
        return Cart::query()->create($dataCart);
    }
}
