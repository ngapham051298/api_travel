<?php
namespace App\Services;

use App\Repositories\Authn\AuthnRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthnService
{
    protected $authnInterface;
    protected $userInterface;
    protected $mailService;
    public function __construct(
        AuthnRepositoryInterface $authnInterface,
        UserRepositoryInterface $userInterface,
        MailService $mailService
    ) {
        $this->authnInterface = $authnInterface;
        $this->userInterface = $userInterface;
        $this->mailService = $mailService;
    }

    public function register($param)
    {
        $attributes = [
            'email' => $param['email'],
            'password' => $param['password'],
            'name' => $param['email'],
        ];
        return $this->authnInterface->create($attributes);
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
            $this->mailService->sendMail(
                $param['email'],
                __('message.login'),
                ['title' => 'Login', 'name' => $user->name],
                'login_success'
            );
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
        return $this->userInterface->showUser($userId);
    }

    public function update($request)
    {
        $user = Auth::user();
        $userId = $user->id;
        $attributes = $request->all();
        $user = $this->userInterface->update($userId, $attributes);
        return $user;
    }

    public function changePassword($request)
    {
        $user = Auth::user();
        $checkPassword = Hash::check($request->old_password, $user->password);
        if (!$checkPassword) {
            return _error(
                null,
                __('message.current_password_error'),
                HTTP_BAD_REQUEST
            );
        }
        $user->password = $request->password;
        $user->save();
        return _success($user, __('message.success'), HTTP_CREATED);
    }
}
