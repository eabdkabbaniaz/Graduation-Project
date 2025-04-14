<?php
namespace Modules\Student\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Student\App\Http\Requests\AuthRequest;
use Modules\Student\App\Http\Requests\ChangePasswordRequest;
use Modules\Student\Services\AuthService;

class AuthController extends Controller
{
    protected $auth_service;

    public function __construct(AuthService $auth_service)
    {
        $this->auth_service = $auth_service;
    }

    public function login(AuthRequest $request)
    {
        return $this->auth_service->login($request);
    }
    public function changePassword(ChangePasswordRequest $request)
    {
     return   $this->auth_service->changePassword($request); 
    }
    
}
