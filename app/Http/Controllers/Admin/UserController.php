<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Queries\UserQuery;
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
        $customers = UserQuery::where('role', '!=', 'admin')
            ->filterColumn()
            ->orderColumn()
            ->getAllData();

        $this->setData('customers', $customers);
        return $this->view('pages.admin.user.index');
    }
}
