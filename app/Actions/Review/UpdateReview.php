<?php

namespace App\Actions\Review;

use App\Models\Review;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;
use Winata\PackageBased\Abstracts\BaseAction;
use Winata\PackageBased\Concerns\ValidationInput;

class UpdateReview extends BaseAction
{
    use ValidationInput;

    public function __construct(
        public Review $review,
        public array  $inputs,
        bool          $usingDBTransaction = false
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
                'rating' => ['required', 'string'],
                'comment' => ['required', 'string'],
            ]
        );

        return $this;
    }

    /**
     * @return mixed
     */
    public function handle(): mixed
    {
        $input = Review::getFillableAttribute($this->validatedData);
        return $this->review->update($input);
    }
}
