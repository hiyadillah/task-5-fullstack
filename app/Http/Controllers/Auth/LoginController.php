<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        return view('auth.login')->with('registrasi');
    }
    public function show(Request $req){
        $input = $req->all();
        
        $validated = Validator::make($input,[
            'email' => 'required|email|max:35',
            'password' => 'required|unique:users|min:8',
        ]);
        // CEK JIKA VALIDASI GAGAL
        if($validated->fails()) return response()->json(['error'=>$validated->errors()]);
        // CEK APAKAH LOGIN BERHASIL ATAU TIDAK
        if(!Auth::attempt(['email' => $input['email'],'password' => $input['password']])) {
            // KEMBALIKAN RESPON INVALID
            return back()->with(['login'=>'Invalid Login Credential']);
        }
        // IKAT USER YANG TELAH LOGIN
        $user = Auth::user();
        // BUAT TOKEN
        $tokenResult = $user->createToken('authToken');
        if(!$tokenResult) return back()->with('message','Login Failed');
        $req->session()->put('accessToken', $tokenResult->accessToken);
        return redirect()->route('profile');
    }
    public function logout(Request $req){
        
        if(Auth::logout()) return response([
            'message'=>'Unable to Log Out'
        ]);
        return redirect()->route('landing');
    }
}
