<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\JsonResponse;
/**
 * Class ForgotPasswordController.
 */
class ForgotPasswordController extends Controller
{
    // use SendsPasswordResetEmails;

    // /**
    //  * Display the form to request a password reset link.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function showLinkRequestForm()
    // {
    //     dd('sa');
    //     return view('frontend.auth.passwords.email');
    // }

    use SendsPasswordResetEmails;

    // Send password reset link response
    protected function sendResetLinkResponse($response)
    {
        return new JsonResponse(['message' => trans($response)], 200);
    }

    // Send password reset link failed response
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return new JsonResponse(['error' => trans($response)], 400);
    }
}
