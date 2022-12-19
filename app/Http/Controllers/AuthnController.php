<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthnRequest;
use App\Services\AuthnService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            return _success($user, 'User register successfully', HTTP_CREATED);
        } catch (Exception $e) {
            Log::error(__METHOD__ . ' -' . __LINE__ . ' : ' . $e->getMessage());
            return _errorSystem();
        }
    }

    public function login(Request $request)
    {
        if (
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])
        ) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['name'] = $user->name;

            return _success($success, 'User login successfully.', HTTP_SUCCESS);
        } else {
            return _error(null, 'Unauthorised', HTTP_FORBIDDEN);
        }
    }
}
