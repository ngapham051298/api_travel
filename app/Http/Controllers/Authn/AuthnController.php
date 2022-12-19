<?php

namespace App\Http\Controllers\Authn;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthnRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class AuthnController extends Controller
{
    //     protected $authnService;
    // public function __construct(
    //     Auth
    // )
    // {

    // }
    public function register(AuthnRequest $request)
    {
        try {
            $param = $request->all();
        } catch (Exception $e) {
            Log::error(__METHOD__ . ' -' . __LINE__ . ' : ' . $e->getMessage());
            return _errorSystem();
        }
    }
}
