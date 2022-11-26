<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    const HTTP_CODE_UNAUTHORIZED = 401;
    const HTTP_CODE_SUCCESS      = 200;
    const AUTHENTICATION_FAILURE = FALSE;

    /**
     * Create a new AuthController instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $execResult  = [
            'error'   => false,
            'message' => ''
        ];

        $credentials = request(['email', 'password']);
        $token       = auth()->attempt($credentials);

        if ($token === self::AUTHENTICATION_FAILURE)
        {
            $execResult['error']   = true;
            $execResult['message'] = "Acesso não autorizado";

            return response()->json(
                                     $execResult,
                                     self::HTTP_CODE_UNAUTHORIZED
                                   );
        }

        $execResult['message']       = "Autenticação realizada com sucesso";
        $execResult['Authorization'] = [
                                         'type'  => 'bearer',
                                         'token' => $token
                                       ];

        return response()->json(
                                $execResult,
                                self::HTTP_CODE_SUCCESS
                               );
    }

    /**
     * Get the authenticated User.
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $execResult = [
                        'error'   => false,
                        'message' => 'Usuário desconectado com sucesso'
        ];

        auth()->logout();

        return response()->json($execResult);
    }

    /**
     * Refresh a token.
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }
}