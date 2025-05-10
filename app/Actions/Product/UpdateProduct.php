<?php

namespace App\Actions\Product;

use App\Models\Product;
use Illuminate\Validation\ValidationException;
use Winata\PackageBased\Abstracts\BaseAction;
use Winata\PackageBased\Concerns\ValidationInput;

class UpdateProduct extends BaseAction
{
    use ValidationInput;

    public function __construct(
        public Product $product,
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
                'name' => 'sometimes|required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'sometimes|required|numeric|min:0',
                'stock' => 'sometimes|required|integer|min:0',
                'image' => 'nullable|string',
            ]
        );
        return $this;
    }

    public function handle(): Product
    {
        $input = Product::getFillableAttribute($this->validatedData);
        $this->product->update($input);

        return $this->product;
    }
}
