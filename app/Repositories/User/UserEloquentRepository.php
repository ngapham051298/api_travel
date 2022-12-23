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

    public function showUser($userId)
    {
        return $this->find($userId)
            ->leftJoin('roles', 'roles.id', 'users.role_id')
            ->select('users.*', 'roles.name as role_name')
            ->first();
    }
}
