<?php

namespace App\Services;
use App\Repositories\User\UserRepositoryInterface;

class UserService
{
    protected $userInterface;
    public function __construct(UserRepositoryInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function create($request)
    {
        $attribute = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'phone' => $request->phone,
            'role_id' => $request->role_id,
        ];
        $user = $this->userInterface->create($attribute);
        return $user;
    }
}
