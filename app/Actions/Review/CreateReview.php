<?php

namespace App\Actions\Review;

use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;
use Winata\PackageBased\Abstracts\BaseAction;
use Winata\PackageBased\Concerns\ValidationInput;

class CreateReview extends BaseAction
{
    use ValidationInput;

    public function __construct(
        public User $user,
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
                'product_id' => ['required', 'string'],
                'rating' => ['required', 'numeric'],
                'comment' => ['required', 'string'],
            ]
        );

        return $this;
    }

    /**
     * @return Review
     */
    public function handle(): Review
    {
        $input = Review::getFillableAttribute($this->validatedData);
        $input['user_id'] = $this->user->id;
        return Review::query()->create($input);
    }
}
