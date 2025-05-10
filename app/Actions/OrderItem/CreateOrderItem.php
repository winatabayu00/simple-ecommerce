<?php

namespace App\Actions\OrderItem;

use App\Models\OrderItem;
use Illuminate\Validation\ValidationException;
use Winata\PackageBased\Abstracts\BaseAction;
use Winata\PackageBased\Concerns\ValidationInput;

class CreateOrderItem extends BaseAction
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
     * @throws ValidationException
     */
    public function rules(): BaseAction
    {
        $this->validate(
            inputs: $this->inputs,
            rules: [
                'order_id' => ['required', 'uuid'],
                'product_id' => ['required', 'uuid'],
                'quantity' => ['required', 'numeric', 'gt:0'],
                'price' => ['required', 'numeric', 'gt:0'],
            ]
        );
        return $this;
    }

    public function handle(): OrderItem
    {
        $input = OrderItem::getFillableAttribute($this->validatedData);
        return OrderItem::query()->create($input);
    }
}
