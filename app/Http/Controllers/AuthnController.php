<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthnRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Services\AuthnService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthnController extends Controller
{
    protected $authnService;
    public function __construct(AuthnService $authnService)
    {
        $this->authnService = $authnService;
    }
    public function register(AuthnRequest $request)
    {
        try {
            $param = $request->all();
            $user = $this->authnService->register($param);
            return _success($user, __('message.registerSuccess'), HTTP_CREATED);
        } catch (Exception $e) {
            Log::error(
                __METHOD__ . ' - ' . __LINE__ . ' : ' . $e->getMessage()
            );
            return _errorSystem();
        }
    }

    public function login(Request $request)
    {
        try {
            $param = $request->all();
            $user = $this->authnService->login($param);
            if ($user) {
                return _success(
                    $user,
                    __('message.loginSuccess'),
                    HTTP_SUCCESS
                );
            }
            return _error(null, __('message.notFound'), HTTP_NOT_FOUND);
        } catch (Exception $e) {
            Log::error(
                __METHOD__ . ' - ' . __LINE__ . ' : ' . $e->getMessage()
            );
            return _errorSystem();
        }
    }

    public function profile()
    {
        try {
            $user = $this->authnService->profile();
            return _success($user, __('message.success'), HTTP_SUCCESS);
        } catch (Exception $e) {
            Log::error(
                __METHOD__ . ' - ' . __LINE__ . ' : ' . $e->getMessage()
            );
            return _errorSystem();
        }
    }

    public function update(UpdateProfileRequest $request)
    {
        try {
            $user = $this->authnService->update($request);
            return _success($user, __('message.success'), HTTP_SUCCESS);
        } catch (Exception $e) {
            Log::error(
                __METHOD__ . ' - ' . __LINE__ . ' : ' . $e->getMessage()
            );
            return _errorSystem();
        }
    }
    public function changePassword(PasswordRequest $request)
    {
        try {
            return $this->authnService->changePassword($request);
        } catch (Exception $e) {
            Log::error(
                __METHOD__ . ' - ' . __LINE__ . ' : ' . $e->getMessage()
            );
            return _errorSystem();
        }
    }
}
