<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    const HTTP_CODE_UNAUTHORIZED = 401;
    const HTTP_CODE_SUCCESS      = 200;
    const AUTHENTICATION_FAILURE = FALSE;


    public function index ()
    {
        return view('auth.login');
    }
    /**
     * Create a new AuthController instance.
     * @return void
     */
    public function login()
    {
        $execResult  = [
            'error'   => false,
            'message' => ''
        ];

        $credentials = request(['email', 'password']);
        $result      = auth()->attempt($credentials);

        if ($result === self::AUTHENTICATION_FAILURE)
        {
            $execResult['error']   = true;
            $execResult['message'] = "Acesso não autorizado";

            return response()->json(
                                     $execResult,
                                     self::HTTP_CODE_UNAUTHORIZED
                                   );
        }

        return redirect(route('admin.dashboard'));
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

        return redirect(route('login'));
    }

    /**
     * Refresh a token.
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function pageRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->nome . " " . $request->sobrenome;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);

        if($user->save())
        {
            return response()->json("Usuário registrado com sucesso");
        }
        
        return response()->json("Não foi possível registrar o usuário");
    }
}