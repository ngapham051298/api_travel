<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccountRequest;
use App\Services\UserService;
use Exception;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function create(CreateAccountRequest $request)
    {
        try {
            $account = $this->userService->create($request);
            return _success(
                $account,
                __('message.createAccountSuccess'),
                HTTP_CREATED
            );
        } catch (Exception $e) {
            Log::error(
                __METHOD__ . ' - ' . __LINE__ + ' - ' . $e->getMessage()
            );
        }
    }
}
