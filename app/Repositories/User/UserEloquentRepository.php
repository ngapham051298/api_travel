<?php
namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\Base\BaseEloquentRepository;

class UserEloquentRepository extends BaseEloquentRepository implements
    UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }
}
