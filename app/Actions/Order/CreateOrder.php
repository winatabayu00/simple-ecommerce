<?php

namespace App\Actions\Order;

use App\Models\Order;
use Illuminate\Validation\ValidationException;
use Winata\PackageBased\Abstracts\BaseAction;
use Winata\PackageBased\Concerns\ValidationInput;

class CreateOrder extends BaseAction
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
        $validated = $this->validate(
            inputs: $this->inputs,
            rules: [
                'user_id' => ['required', 'int'],
                'status' => ['required', 'string'],
                'total' => ['required', 'numeric', 'gt:0'],
            ]
        );

        return $this;
    }

    public function handle(): Order
    {
        $input = Order::getFillableAttribute($this->validatedData);
        return Order::query()->create($input);
    }
}
