<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\User;
use App\Queries\CartQuery;
use App\Queries\OrderQuery;
use App\Services\ShoppingService;
use Dentro\Yalr\Attributes;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

#[Attributes\Prefix('rating')]
#[Attributes\Name('rating', false, true)]
class RatingController extends Controller
{
    /**
     */
    #[Attributes\Post('give-rating', 'give-rating')]
    public function giveRating(Request $request, ShoppingService $service)
    {
        /** @var User $user */
        $user = auth()->user();
        $service->giveRating($user, $request->input());
        successToast("You Give {$request->input('rating')} Stars Rating");
        return redirect()->back();
    }
}
