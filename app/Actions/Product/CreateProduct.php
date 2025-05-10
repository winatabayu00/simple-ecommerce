<?php

namespace App\Actions\Product;

use App\Models\Product;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;
use Winata\PackageBased\Abstracts\BaseAction;
use Winata\PackageBased\Concerns\ValidationInput;

class CreateProduct extends BaseAction
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
     * @throws AuthorizationException
     */
    public function rules(): BaseAction
    {
        $this->validate(
            inputs: $this->inputs,
            rules: [
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'image' => 'nullable|string',
            ]
        );
        return $this;
    }

    public function handle(): Product
    {
        $input = Product::getFillableAttribute($this->validatedData);
        return Product::query()->create($input);
    }
}
