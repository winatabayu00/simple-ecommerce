<?php

namespace App\Actions\Order;

use App\Models\Order;
use Illuminate\Validation\ValidationException;
use Winata\PackageBased\Abstracts\BaseAction;
use Winata\PackageBased\Concerns\ValidationInput;

class UpdateOrder extends BaseAction
{
    use ValidationInput;

    public function __construct(
        public Order $order,
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
                'status' => ['required', 'string'],
                'total' => ['required', 'numeric', 'gt:0'],
            ]
        );
        return $this;
    }

    public function handle(): mixed
    {
        $input = Order::getFillableAttribute($this->validatedData);
        return $this->order->update($input);
    }
}
