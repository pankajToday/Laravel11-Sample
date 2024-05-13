<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationMail;
use App\Models\EmailVerification;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use App\Http\Requests\User\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Inertia\Inertia;


class LoginController extends Controller
{

    use Authenticatable  ;

    protected $username = 'name';

    function showLoginForm()
    {
         return Inertia::render('Website' );
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:40'],
            'password' => ['required', "max:10"],
        ]);

        $credentials = $request->only('email', 'password');
        $user = User::where([ 'email'=> $request->email ] )->first();

        if( Auth::attempt($credentials))
        {
            Auth::login($user);
            $authUser = Auth::user() ;
        }
        else{
            return response()->json(['status' => 'failed', 'message' => 'The email is not registered, Please Signup.', 'user_data' => []]);
        }

        if ( $authUser ) {
            $user = User::where('id', $authUser->id )->first();

            return response()->json(['status' => 'success', 'message' => 'login successful!', 'user_data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ]]);
        }
        return response()->json(['status' => 'failed', 'message' => 'Email is invalid!', 'user_data' => []]);
    }

    public function profileShow(){

        $user=  Auth::user();
        $profile = [
            'id' => $user->id ,
            'name' => $user->name ,
            'email' => $user->email
        ];

        return Inertia::render('Profile/Show', compact('profile'));

    }

    public function profile()
    {
        $user = Auth::user();
        return [
            'id' => $user->id,
            'first_name' => $user->name,
            'email' => $user->email,
            'role_id' => $user->role_id,


        ];
    }

    public function signUp(Request $request)
    {

        $request->validate([
            'email' => ['required', 'max:40', 'min:10', 'unique:users'],
            'password' => ['required_with:password_confirmation', 'confirmed', 'min:5', "max:10"],
            'password_confirmation' => ['required'],
            'name' => ['required'],
           // 'last_name' => ['string'],
         //   'mobile' => ['required', 'max:10', 'min:10', 'unique:users'],
        ]);

        $user = User::where('email', request('email'))->first();
        request()->request->add(['username' => request('email')]);

        if (!$user) {

            try{
                DB::beginTransaction();

                $user = new User();
                $user->role_id = 2;
                // $user->slug = Str::slug(request('first_name') . ' ' . request('last_name'));
                $user->email = request('email');
                $user->password = Hash::make(request('password'));
               // $user->mobile = request('mobile');
                $user->name = request('name');
               // $user->last_name = request('last_name');
                $user->save();

                Auth::login( $user );

                // Send verification mail
                $token = Str::random(64);

                $data = EmailVerification::where('email', $user->email )->first();
                if( !$data ){
                    $data =  new EmailVerification();
                }
                $data->token =$token;
                $data->email = $user->email ;
                $data->save();


                Mail::to($request->email)->send(new VerificationMail($token, $user->name , $user->email));

                DB::commit();

                return response()->json(['data'=>Auth::user(),'message'=>'sign-up successfully done.', 'status' => 200]);
            }
            catch (\Exception $e){
                DB::rollBack();
                return response()->json(['data'=>$e->getCode() .' : '. $e->getLine(),'message'=>'Something went wrong!', 'status' => 500]);
            }
        }
        else{

            Auth::login( $user );
            return response()->json(['data'=>Auth::user(),'message'=>'user already exist.', 'status' => 200]);
        }

    }

    function forgetPassword()
    {
        $user = User::where('email', request('email'))->first();

        if ($user) {
            $token = Password::getRepository()->create($user);
            $user->sendPasswordResetNotification($token);

            PasswordReset::where('email', request('email'))->delete();
            $data = ['email' => request('email'),  'token' => $token, 'created_at' => date('Y-m-d H:i')];
            PasswordReset::create($data);

            return response()->json(['status' => 200, 'message' => 'Reset link send on email.']);
        }

        return response()->json(['status' => 500, 'message' => 'Unable to send reset link on email!']);
    }

    public function resetPasswordShow(Request $request, $token)
    {
        $password = PasswordReset::where('token', $token)->first();
        return Inertia::render('Auth/ResetPassword', ['data' => $password]);
    }

    function resetPassword()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required_with:confirm_password', 'confirmed', 'max:10', 'min:5'],
            'password_confirmation' => ['required', 'max:10', 'min:5']
        ]);

        $passwordData = PasswordReset::where('email', request('email'))->where(function ($q) {
            $q->orWhere('token', request('token'));
        })
            ->first();
        if ($passwordData) {
            PasswordReset::where('email', request('email'))->delete();

            $user = User::where('email', request('email'))->first();
            if ($user) {
                $user->password = Hash::make(request('password'));
                $user->save();

                if (Auth::attempt(['email' => request('email'), "password" => request('password')])) {
                    // return response()->json(['status' => 200 , 'message' => 'Password is changed successfully.']);
                }

                return response()->json(['status' => 200, 'message' => 'Password is changed successfully.']);
            }
            return response()->json(['status' => 500, 'message' => 'User not found to given email.']);
        }
        return response()->json(['status' => 500, 'message' => 'Unable to change password!']);
    }

    function updateProfile(ProfileUpdateRequest $request)
    {
        $user = User::where('id', Auth::id())->first();

        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;


            $user->save();

            return response()->json(['message' => 'User profile updated.', 'status' => 200]);
        }

        return response()->json(['message' => 'unable to update user profile!', 'status' => 500]);
    }

    function updateProfilePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required_with:password_confirmation', 'confirmed', 'min:5', "max:10"],
            'password_confirmation' => ['required'],
        ]);

        $user = User::where('id', Auth::id())->first();

        if ($user && Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json(['message' => 'User password updated.', 'status' => 200]);
        }

        return response()->json(['message' => 'unable to update user password!', 'status' => 500]);
    }

    public function profileDelete(Request $request)
    {
        $user =  User::where('id' , Auth::id())->first();
        if( $user )
        {
            $user->delete();

            $request->session()->invalidate();
            return response()->json([ 'message' => 'User profile deleted.' ,'status' =>200]);
        }
        return response()->json([ 'message' => 'Unable to delete User!' ,'status' =>500]);
    }

    public function logout(Request $request){

        if ($request->hasSession()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        $request->session()->invalidate();
        Auth::logout();

        return response()->json(['status' => 200, 'message' => 'User logout!']);
    }

    public function VerifyToLogin($token)
    {
        $data = EmailVerification::where('token', $token)->first();

        $user =  User::where('email', $data->email)->first();
        $user->update(['email_verified_at' => now()]);

        DB::table('email_verification')->where(['email'=> $user->email])->delete();

        return redirect('/');
    }



}
