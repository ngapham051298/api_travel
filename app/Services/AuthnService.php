<?php
namespace App\Services;

use App\Repositories\Authn\AuthnRepositoryInterface;

class AuthnService
{
    protected $authnInterface;
    public function __construct(AuthnRepositoryInterface $authnInterface)
    {
        $this->authnInterface = $authnInterface;
    }

    public function register($param)
    {
        $attributes = [
            'email' => $param['email'],
            'password' => $param['password'],
            'name' => $param['email'],
        ];
        $user = $this->authnInterface->create($attributes);
        // $data = [
        //     'token' => $user->createToken('MyApp')->accessToken,
        //     'name' => $user->name,
        // ];
        return $user;
    }
}
