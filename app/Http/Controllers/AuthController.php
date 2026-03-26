<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RequestException;
use Illuminate\Support\Facades\DB;
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
                    $request->session()->put('pending_login_user', [
                        'id' => $verifyotp['data']['id'] ?? null,
                        'email' => $verifyotp['data']['email'] ?? null,
                        'user_phone' => $verifyotp['data']['user_phone'] ?? null,
                        'name' => $verifyotp['data']['name'] ?? null,
                    ]);

                    return response()->json([
                        'success' => true,
                        'otp_verified' => true,
                        'requires_location_check' => true,
                        'message' => "OTP verified. Please confirm your location to continue.",
                    ]);
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

    public function checkLoginLocationRange(Request $request)
    {
        try {
            $validated = $request->validate([
                'lat' => 'required|numeric|between:-90,90',
                'lng' => 'required|numeric|between:-180,180',
            ]);

            $pendingUser = $request->session()->get('pending_login_user');
            if (empty($pendingUser) || empty($pendingUser['id'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Session expired. Please verify OTP again.',
                ], 422);
            }

            $lat = (float) $validated['lat'];
            $lng = (float) $validated['lng'];

            $nearestStore = DB::selectOne(
                "SELECT
                    id,
                    name,
                    max_delivery_distance,
                    ST_DWithin(
                        location,
                        ST_SetSRID(ST_MakePoint(?, ?), 4326)::geography,
                        COALESCE(max_delivery_distance, 10000)
                    ) AS in_range,
                    ST_Distance(
                        location,
                        ST_SetSRID(ST_MakePoint(?, ?), 4326)::geography
                    ) AS distance_meters
                 FROM stores
                 ORDER BY distance_meters ASC
                 LIMIT 1",
                [$lng, $lat, $lng, $lat]
            );

            if (!$nearestStore) {
                return response()->json([
                    'success' => false,
                    'message' => 'Store location is not configured.',
                ], 422);
            }

            $isInRange = in_array((string) $nearestStore->in_range, ['1', 't', 'true', 'TRUE'], true);

            if (!$isInRange) {
                $alreadyWaitlisted = false;
                try {
                    $alreadyWaitlisted = DB::table('zap_wishlist')
                        ->where('user_id', (int) $pendingUser['id'])
                        ->exists();
                } catch (\Throwable $e) {
                    \Log::warning('zap_wishlist check failed during out-of-range flow', [
                        'message' => $e->getMessage(),
                        'user_id' => (int) $pendingUser['id'],
                    ]);
                }

                return response()->json([
                    'success' => true,
                    'in_range' => false,
                    'message' => 'You are out of range, please join wishlist',
                    'already_waitlisted' => $alreadyWaitlisted,
                    'distance_meters' => (float) $nearestStore->distance_meters,
                    'store_name' => $nearestStore->name,
                ]);
            }

            // Finalize login only after location gate passes.
            $request->session()->put('user_id', $pendingUser['id']);
            $request->session()->put('user_phone', $pendingUser['email']);
            $request->session()->put('user_email', $pendingUser['user_phone']);
            $request->session()->put('user_name', $pendingUser['name']);
            $request->session()->forget('pending_login_user');

            return response()->json([
                'success' => true,
                'in_range' => true,
                'message' => 'Location verified. Login successful.',
                'distance_meters' => (float) $nearestStore->distance_meters,
                'store_name' => $nearestStore->name,
            ]);
        } catch (\Throwable $e) {
            \Log::error('checkLoginLocationRange failed', [
                'message' => $e->getMessage(),
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Unable to validate location right now. Please try again shortly.',
            ], 422);
        }
    }

    public function joinWaitlist(Request $request)
    {
        $pendingUser = $request->session()->get('pending_login_user');
        if (empty($pendingUser) || empty($pendingUser['id'])) {
            return response()->json([
                'success' => false,
                'message' => 'Session expired. Please verify OTP again.',
            ], 422);
        }

        $userId = (int) $pendingUser['id'];

        try {
            $existing = DB::table('zap_wishlist')
                ->where('user_id', $userId)
                ->first();

            if (!$existing) {
                DB::table('zap_wishlist')->insert([
                    'user_id' => $userId,
                    'created_at' => now(),
                ]);
            }
        } catch (\Throwable $e) {
            \Log::error('joinWaitlist failed', [
                'message' => $e->getMessage(),
                'user_id' => $userId,
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Unable to join waitlist right now. Please try again shortly.',
            ], 422);
        }

        return response()->json([
            'success' => true,
            'message' => 'You have been added to the waitlist.',
        ]);
    }

}
