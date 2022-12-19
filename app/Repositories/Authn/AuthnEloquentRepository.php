<?php
namespace App\Repositories\Authn;

use App\Models\User;
use App\Repositories\Base\BaseEloquentRepository;

class AuthnEloquentRepository extends BaseEloquentRepository implements
    AuthnRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }
}
