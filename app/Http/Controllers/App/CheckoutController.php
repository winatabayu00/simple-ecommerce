<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Request\Authentication\LoginRequest;
use Dentro\Yalr\Attributes;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Winata\Core\Response\Exception\BaseException;

#[Attributes\Prefix('shop')]
#[Attributes\Name('shop', false, true)]
class CheckoutController extends Controller
{
    /**
     * @return View
     */
    #[Attributes\Get('checkout', 'checkout')]
    public function index(): View
    {
        return $this->view('pages.authentication.login');
    }
}
