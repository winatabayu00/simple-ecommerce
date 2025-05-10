<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Dentro\Yalr\Attributes;
use Illuminate\Contracts\View\View;

#[Attributes\Prefix('')]
#[Attributes\Name('', false, false)]
class AboutUsController extends Controller
{
    /**
     * @return View
     */
    #[Attributes\Get('about-us', 'about-us')]
    public function index(): View
    {
        return $this->view('pages.app.about-us');
    }
}
