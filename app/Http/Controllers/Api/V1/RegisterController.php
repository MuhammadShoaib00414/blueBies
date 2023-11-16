<?php

namespace App\Http\Controllers\API\V1;


use App\Events\Frontend\Auth\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Frontend\Auth\UserRepository;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Hash; // Import the Hash class
use Illuminate\Support\Facades\Auth;
/**
 * Class RegisterController.
 */
class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * RegisterController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route(home_route());
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        abort_unless(config('access.registration'), 404);

        return view('frontend.auth.register');
    }

    /**
     * @param RegisterRequest $request
     *
     * @throws \Throwable
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    

    public function register(Request $request)
    {
        dd('test');
        $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', Rule::unique('users')],
            'password' => ['required', 'string', 'min:8'], // Add password validation
        ]);
    
        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
    
        // Issue an access token for the user
        $token = $user->createToken('AppName')->accessToken;
    
        // You can customize the response data as needed
        $response = [
            'message' => 'Registration successful',
            'access_token' => $token,
        ];
    
        return response()->json($response, 201);
    }
    
}
