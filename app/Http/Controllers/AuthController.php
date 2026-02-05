<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RequestException;
use Symfony\Component\HttpFoundation\Session\Session;

class AuthController extends Controller
{
    public function __construct() {}

    // display login page
    public function login()
    {
        return view('Auth.login');
    }

    // display login otp page.
    public function loginotp($id)
    {
        $email = session('email');
        $number = session('number');
        $name = session('name');
        $country_code = session('country_code');
        $id = session('id');

        return view("Auth.otp", compact('email', 'number', 'country_code', 'id', 'name'));
    }

    // display register page.
    public function register(Request $request)
    {
        $number = session('number');
        $country_code = session('country_code');
        $flag_code = session('flag_code');

        return view("Auth.sign-up", compact('number', 'country_code', 'flag_code'));
    }

    // otp api call
   public function loginOtpSubmit(Request $request)
    {
        $title = "Quickart-category";
        $data_arr = [
            'title' => "Quickart",
            'keywords' => "",
            'description' => "",
            'canonical' => "",
        ];

        $nodeappUrl = env('NODE_APP_URL');

        $rules = [
            'otp' => 'required|min:4',
        ];

        $messages = [
            'otp.required' => 'The OTP field is required.',
            'otp.min' => 'The OTP must be at least 4 digits.',
        ];

        $validated = $request->validate($rules, $messages);

        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'verify_otp', [
                'json' => [
                    "user_phone" => $request->number,
                    "otp" => $request->otp,
                    "device_id" => "",
                    "country_code" => $request->country_code,
                    "user_email" => $request->user_email,
                    "name" => $request->name,
                    "referral_code" => $request->referral_code,
                    "is_terms_cond_unable" => true,
                    "actual_device_id" => "",
                    "is_whatapp_msg_unable" => "1",
                    "uuid" => ""
                ]
            ]);

            if ($response->getStatusCode() == 201 || $response->getStatusCode() == 200) {
                $verifyotp = json_decode($response->getBody()->getContents(), true);

                if ($verifyotp['message'] == "Phone Verified! login successfully") {
                    // return redirect()->route('index');
                    $request->session()->put('user_id', $verifyotp['data']['id']);
                    $request->session()->put('user_phone', $verifyotp['data']['email']);
                    $request->session()->put('user_email', $verifyotp['data']['user_phone']);
                    $request->session()->put('user_name', $verifyotp['data']['name']);
                     return response()->json([
                        'success' => true,'message'=>"Phone Verified! login successfully"]);
                } else {
                    return response()->json([
                        'success' => false,'message'=>"Enter a valid OTP."]);
                    // echo 'Enter a valid OTP.';
                    // exit;
                }
            } elseif ($response->getStatusCode() == '400 Bad Request') {
                $verifyotp = json_decode($response->getBody()->getContents(), true);

                if ($verifyotp['message'] == "Wrong OTP") {
                    // echo 'Enter a valid OTP.';
                    // exit;
                    return response()->json([
                        'success' => false,'message'=>"Enter a valid OTP."]);
                }
            } else {
                return response()->json([
                        'success' => false,'message'=>"Failed to verify OTP. Please try again."]);
                // echo 'Failed to verify OTP. Please try again.';
            }
        } catch (RequestException $e) {
            // $errorMessage = $e->getMessage();
            // dd('RequestException:', $errorMessage, $e->getTraceAsString());
            if ($e->getResponse()->getStatusCode() == 400) {
                $errorBody = json_decode($e->getResponse()->getBody()->getContents(), true);
                // Now you can access the message
                $errorMessage = $errorBody['message'] ?? 'Bad Request';
                // Optional: log or return
                 return response()->json(['success'=>false,'message'=>$errorMessage]);
            }
        } catch (\Exception $e) {
            // $errorMessage = $e->getMessage();
            // dd('RequestException:', $errorMessage, $e->getTraceAsString());
            if ($e->getResponse()->getStatusCode() == 400) {
                $errorBody = json_decode($e->getResponse()->getBody()->getContents(), true);
                // Now you can access the message
                $errorMessage = $errorBody['message'] ?? 'Bad Request';
                // Optional: log or return
                 return response()->json(['success'=>false,'message'=>$errorMessage]);
            }
        }
    }


    // resent otp api call
    public function resend_otp(Request $request)
    {
        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";

        $nodeappUrl = env('NODE_APP_URL');
        $number = $request->number;
        $country_code = $request->country_code;

        $Resentotp = array();
        $errorMessage = null;
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'resend_otp', [
                'json' => [
                    "user_phone" => $number,
                    "country_code" => $country_code
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $Resentotp = json_decode($response->getBody()->getContents(), true);
                 return response()->json([
                        'success' => true,
                        'message' => $Resentotp['message']
                        ]);
            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {
            $errorMessage = $e->getMessage();
            dd('RequestException:', $errorMessage, $e->getTraceAsString());
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            dd('Exception:', $errorMessage, $e->getTraceAsString());
        }
    }


    //login api call
     //login api call
    public function loginsubmit(Request $request)
    {
        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";

        $nodeappUrl = env('NODE_APP_URL');

        $rules = [
            'number' => 'required|numeric'
        ];

        $message = [
            'number.required' => 'The mobile field is required.',
            'number.numeric' => 'The mobile field must be a number.'
        ];


        $validated = $request->validate($rules, $message);
        $number = $request->number;
        $country_code = $request->country_code;
        $flag_code = $request->flag_code;

        $loginUser = array();
        $errorMessage = null;
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'login', [
                'json' => [
                    'user_phone' => $number,
                    'country_code' => $country_code,
                    "is_whatapp_msg_unable" => true,
                    "is_terms_cond_unable" => true,
                    "dial_code" => $flag_code
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $loginUser = json_decode($response->getBody()->getContents(), true);
                if ($loginUser['message'] == "go to register details page") {
                    return response()->json([
                        'success' => true,
                        'number' => $number,
                        'country_code' => $country_code,
                        'data_arr' => $data_arr,
                        'errorMessage' => $errorMessage,
                        'flag_code' => $flag_code,
                        'popup' => 'register'
                    ]);
                    // return redirect()->route('register')->with([
                    //     'number' => $number,
                    //     'country_code' => $country_code,
                    //     'data_arr' => $data_arr,
                    //     'errorMessage' => $errorMessage,
                    //     'flag_code' => $flag_code,
                    // ]);
                } elseif ($loginUser['message'] == "Verify OTP for Login") {
                    $randomString = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 24);
                    $combinedString = $loginUser['data']['id'] . $randomString;
                    $encodedId = base64_encode($combinedString);
                    $userString = substr($encodedId, 0, 32);
                    // $request->session()->put('user_id', $loginUser['data']['id']);
                    $code = $loginUser['code'];
                    $email = $loginUser['data']['email'];
                    $name = $loginUser['data']['name'];
                    $referral_code = $loginUser['data']['referral_code'];

                    return response()->json([
                        'success' => true,
                        'id' => $userString,
                        'code' => $code,
                        'email' => $email,
                        'number' => $number,
                        'name' => $name,
                        'referral_code' => $referral_code,
                        'country_code' => $country_code,
                        'popup' => 'otp'
                    ]);
                    // return redirect()->route('loginotp', ['id' => $userString])->with([
                    //     'code' => $code,
                    //     'email' => $email,
                    //     'number' => $number,
                    //     'name' => $name,
                    //     'referral_code' => $referral_code,
                    //     'country_code' => $country_code,
                    // ]);
                }
            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {
            // $errorMessage = $e->getMessage();
            //dd('RequestException:', $e->getMessage(), $e->getTraceAsString());
            if ($e->getResponse()->getStatusCode() == 400) {
                $errorBody = json_decode($e->getResponse()->getBody()->getContents(), true);
                // Now you can access the message
                $errorMessage = $errorBody['message'] ?? 'Bad Request';
                // Optional: log or return
                 return response()->json(['success'=>false,'message'=>$errorMessage]);
            }
        } catch (\Exception $e) {
            // $errorMessage = $e->getMessage();
            //dd('Exception:', $e->getMessage(), $e->getTraceAsString());
             if ($e->getResponse()->getStatusCode() == 400) {
                $errorBody = json_decode($e->getResponse()->getBody()->getContents(), true);
                // Now you can access the message
                $errorMessage = $errorBody['message'] ?? 'Bad Request';
                // Optional: log or return
                 return response()->json(['success'=>false,'message'=>$errorMessage]);
            }
        }
    }

    // register api call
    public function registeruser(Request $request)
    {
        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";

        $nodeappUrl = env('NODE_APP_URL');

        $number = $request->number;
        $country_code = $request->country_code;
        $flag_code = $request->flag_code;
        $isTermsCondAccepted = filter_var($request->input('accept'), FILTER_VALIDATE_BOOLEAN);

        
        $rules = [
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'number' => 'required',
            'accept' => 'accepted',
        ];

        $message = [
            'name.required' => 'The name is required.',
            'email.required' => 'The email  is required.',
            'number.required' => 'The number is required.',
            'accept.accepted' => 'Please aaccept treams and conditions',
        ];


        $validated = $request->validate($rules, $message);
        
        $signup = array();
        $errorMessage = null;
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'register_details', [
                'json' => [
                    "user_phone" => $request->number,
                    "country_code" => $request->country_code,
                    "user_email" => $request->email,
                    "name" => $request->name,
                    "referral_code" => $request->referral_code,
                    "is_terms_cond_unable" => $isTermsCondAccepted,
                    "is_whatapp_msg_unable" => true,
                    "device_id" => "",
                    "dial_code" => $request->flag_code,
                    "actual_device_id" => "",
                    "uuid" => "",
                    "platform"=>"web"
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {

                $signup = json_decode($response->getBody()->getContents(), true);

                if ($signup['message'] == "Verify OTP") {
                    $randomString = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 24);
                    $combinedString = $signup['data']['id'] . $randomString;
                    $encodedId = base64_encode($combinedString);
                    $userString = substr($encodedId, 0, 32);

                    // $request->session()->put('user_id', $signup['data']['id']);
                    $email = $signup['data']['email'];
                    $name = $signup['data']['name'];
                    $referral_code = $signup['data']['referral_code'];


                    // return redirect()->route('loginotp', ['id' => $userString])->with([
                    //     'email' => $email,
                    //     'number' => $number,
                    //     'name' => $name,
                    //     'referral_code' => $referral_code,
                    //     'country_code' => $country_code,
                    // ]);
                    // print_r($signup['data']);

                     return response()->json([
                        'success' => true,
                        'id' => $userString,
                        'email' => $email,
                        'number' => $number,
                        'name' => $name,
                        'referral_code' => $referral_code,
                        'country_code' => $country_code,
                        'popup' => 'otp'
                    ]);
                }
            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {
            if ($e->getResponse()->getStatusCode() == 400) {
                $errorBody = json_decode($e->getResponse()->getBody()->getContents(), true);
                // Now you can access the message
                $errorMessage = $errorBody['message'] ?? 'Bad Request';
                // Optional: log or return
                 return response()->json(['success'=>false,'message'=>$errorMessage]);
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            dd('Exception:', $e->getMessage(), $e->getTraceAsString());
            if ($e->getResponse()->getStatusCode() == 400) {
                $errorBody = json_decode($e->getResponse()->getBody()->getContents(), true);
                // Now you can access the message
                $errorMessage = $errorBody['message'] ?? 'Bad Request';
                // Optional: log or return
                 return response()->json(['success'=>false,'message'=>$errorMessage]);
            }
        }
    }
    
    public function userLogout(Request $request)
    {
        session()->forget('user_id'); 
        session()->forget('user_phone'); 
        session()->forget('user_email'); 

        return "success";
    
    }


    public function userDeactivateSubmit(Request $request)
    {
        $title = "Quickart Delete Account";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";

        $nodeappUrl = env('NODE_APP_URL');

        $country_code = $request->countryCode;
        $user_phone = $request->userMobile;
     
        $loginUser = array();
        $errorMessage = null;
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'user_deactivate', [
                'json' => [
                    "user_id"=> "",
                    "platform"=>"web",
                    "country_code"=>$country_code,
                    "user_phone"=> $user_phone,
                    "deactivate_by"=> "Customer",
                    "activate_deactivate_status"=>"deactivate"
                ]
            ]);

            $statusCode = $response->getStatusCode();
            
            if ($statusCode == 200) {
              $deleteUser = json_decode($response->getBody()->getContents(), true);
              return response()->json(['res'=>true,'message'=>$deleteUser['message']]);
            }else {
              $deleteUser = json_decode($response->getBody()->getContents(), true);    
              return response()->json(['res'=>false,'message'=>$deleteUser['message']]);
            }
            
        } catch (RequestException $e) {
            $errorMessage = $e->getMessage();
           // dd('RequestException:', $e->getMessage(), $e->getTraceAsString());
           return response()->json(['res'=>false,'message'=>$e->getTraceAsString()]);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            if ($e->getResponse()->getStatusCode() == 400) {
                $errorBody = json_decode($e->getResponse()->getBody()->getContents(), true);
                // Now you can access the message
                $errorMessage = $errorBody['message'] ?? 'Bad Request';
                // Optional: log or return
                 return response()->json(['res'=>false,'message'=>$errorMessage]);
            }
         //   dd('Exception:', $e->getMessage(), $e->getTraceAsString());
        //   return response()->json(['res'=>false,'message'=>$e->getTraceAsString()]);
        }
    }

}
