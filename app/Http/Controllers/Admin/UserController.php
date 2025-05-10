<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Dentro\Yalr\Attributes;
use Illuminate\Contracts\View\View;

#[Attributes\Prefix('users')]
#[Attributes\Name('users', false, true)]
class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->setPageTitle('Users Management');
        $this->setBreadCrumb(['title' => 'Users Management']);
    }
    /**
     * @return View
     */
    #[Attributes\Get('', 'index')]
    public function index(): View
    {
        return $this->view('pages.admin.user.index');
    }
}
