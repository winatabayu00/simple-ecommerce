<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Request\Authentication\LoginRequest;
use App\Models\User;
use Dentro\Yalr\Attributes;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Winata\Core\Response\Exception\BaseException;

#[Attributes\Prefix('auth')]
#[Attributes\Name('auth', false, true)]
class LoginController extends Controller
{
    /**
     * @return View
     */
    #[Attributes\Get('login', 'login')]
    public function loginView(): View
    {
        return $this->view('pages.authentication.login');
    }

    /**
     * @throws BaseException
     * @throws ValidationException
     */
    #[Attributes\Post('login')]
    public function doLogin(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        /** @var User $user */
        $user = auth()->user();
        if ($user->isAdmin()){

            return redirect()->intended(route('admin.dashboard.index'));
        }else{
            return redirect()->intended(route('home'));
        }

    }

    /**
     * Destroy an authenticated session.
     */
    #[Attributes\Delete('logout', 'logout')]
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('auth.login'));
    }
}
