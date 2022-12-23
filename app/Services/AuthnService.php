<?php
namespace App\Services;

use App\Repositories\Authn\AuthnRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthnService
{
    protected $authnInterface;
    protected $userInterface;
    public function __construct(
        AuthnRepositoryInterface $authnInterface,
        UserRepositoryInterface $userInterface
    ) {
        $this->authnInterface = $authnInterface;
        $this->userInterface = $userInterface;
    }

    public function register($param)
    {
        $attributes = [
            'email' => $param['email'],
            'password' => $param['password'],
            'name' => $param['email'],
        ];
        $user = $this->authnInterface->create($attributes);

        return $user;
    }
    public function login($param)
    {
        if (
            Auth::attempt([
                'email' => $param['email'],
                'password' => $param['password'],
            ])
        ) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['name'] = $user->name;
            return [
                'token' => $success['token'],
                'users' => $user,
            ];
        }
        return false;
    }

    public function profile()
    {
        $user = Auth::user();
        $userId = $user->id;
        $profile = $this->userInterface->showUser($userId);
        return $profile;
    }
}
