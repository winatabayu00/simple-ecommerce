<?php

namespace App\Queries;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Winata\QueryBuilder\Abstracts\BaseQueryBuilder;

class UserQuery extends BaseQueryBuilder
{

    public function getBaseQuery(): Builder
    {
        return User::query();
    }

    public function applyFilterParams(): void
    {
    }
}
