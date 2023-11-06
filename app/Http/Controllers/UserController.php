<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Helper\ResponseHelper;
use App\Mail\OTPMail;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller {

    public function UserLogin(Request $request): JsonResponse {
        try {
            $UserEmail = $request->UserEmail;
            $OTP = rand(100000, 999999);
            $details = ['code' => $OTP];
            Mail::to($UserEmail)->send(new OTPMail($details));
            $data = User::updateOrCreate(['email' => $UserEmail], ['email' => $UserEmail, 'otp' => $OTP]);
            return ResponseHelper::Out('success', "A 6 Digit OTP has been send to your email address", 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', $e, 200);
        }
    }

    public function VerifyLogin(Request $request): JsonResponse {
        $UserEmail = $request->UserEmail;
        $OTP = $request->OTP;
        //Verify OTP and get user
        $verification = User::where('email', $UserEmail)->where('otp', $OTP)->first();

        if ($verification) {
            // Update OTP and create JWT token
            $user = User::where('email', $UserEmail)->where('otp', $OTP)->update(['otp' => '0']);
            $token = JWTToken::CreateToken($UserEmail, $user->id);
            // $token = JWTToken::CreateToken('test@example.com', 123);
            // dd($token);

            return ResponseHelper::Out('success', "", 200)->cookie('token', $token, 60 * 24 * 30);

        } else {
            return ResponseHelper::Out('fail', null, 401);
        }
    }

    function UserLogout() {
        return redirect('/userLoginPage')->cookie('token', '', -1);
    }

}
