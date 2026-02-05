<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Carbon\carbon;
use Psy\Readline\Hoa\Console;
use Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Mews\Purifier\Facades\Purifier;


class ProfileController extends Controller
{

    public function __construct()
    {
        //construct
    }
    // Get terms and condition... G1
    public function getTermsCondition(Request $request)
    {
        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Farm Fresh Milk Order Online | Terms and Conditions | Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "Order farm fresh milk online with QuicKart & enjoy the convenience of having high-quality milk delivered to your door. Explore our app for the best shopping experience.";
        $data_arr['canonical'] = "";
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }

        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');


        $getTermsCondition = array();
        try {
            $client = new Client();
            $response = $client->get($nodeappUrl . 'appterms');


            // Check the response status code
            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $getTermsCondition = json_decode($response->getBody()->getContents(), true);

            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }

        return view('footer/terms-condition', compact('title', 'data_arr', 'getTermsCondition'));
    }
    //Api call for user profile detail...G1

    public function getUserProfile(Request $request)
    {


        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):'';  
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }
     
        if(empty(session()->get('user_id'))){
             return redirect()->route('index');
        }

        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        $user_ID = !empty(session()->get('user_id')) ? session()->get('user_id') : '';
        if (empty($user_ID)) {
        return redirect()->to('/'); // or use '/home' if that's your homepage
        }
        $selectedTab = $request->query('tab', '1');

        $getUserProfile = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'show_profile', [
                'json' => [
                    'user_id' => $user_ID
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $getUserProfile = json_decode($response->getBody()->getContents(), true);

            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }

        // return view('Profile/profile', compact('title', 'data_arr', 'getUserProfile', 'selectedTab'));
        $userName = !empty(session()->get('user_name'))?session()->get('user_name'):'';
        $firstWord = ucfirst(explode(' ', $userName)[0]);
        return view('Profile/profile', compact('title', 'data_arr', 'getUserProfile', 'selectedTab','firstWord' ));
    }

    public function updateUserProfile(Request $request)
    {


        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }

        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):env('USER_ID');
        $selectedTab = $request->query('tab', '1');
        $file = $request->file('image');


        $getUserProfile = array();
        try {
            $client = new Client();
            // $response = $client->post($nodeappUrl . 'edit_profile', [
            //     'json' => [
            //         'user_id' => $user_ID,
            //         'user_name' => $request->profile_name,
            //         'country_code' => $request->country_code,
            //         'user_phone' => $request->user_phone,
            //         'path' => $request->image,
            //     ]
            // ]);
           if($file){
                 $response = $client->post($nodeappUrl . 'edit_profile', [
                    'multipart' => [
                        [
                            'name'     => 'user_id',
                            'contents' => $user_ID
                        ],
                        [
                            'name'     => 'user_name',
                            'contents' => $request->profile_name
                        ],
                        [
                            'name'     => 'country_code',
                            'contents' => $request->country_code
                        ],
                        [
                            'name'     => 'user_phone',
                            'contents' => $request->user_phone
                        ],
                        [
                            'name'     => 'image',
                            'contents' => fopen($file->getPathname(), 'r'),
                            'filename' => $file->getClientOriginalName()
                        ]
                    ]
                ]);
           }else{
             $response = $client->post($nodeappUrl . 'edit_profile', [
                'multipart' => [
                    [
                        'name'     => 'user_id',
                        'contents' => $user_ID
                    ],
                    [
                        'name'     => 'user_name',
                        'contents' => $request->profile_name
                    ],
                    [
                        'name'     => 'country_code',
                        'contents' => $request->country_code
                    ],
                    [
                        'name'     => 'user_phone',
                        'contents' => $request->user_phone
                    ]
                ]
            ]);
           }
           

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $getUserProfile = json_decode($response->getBody()->getContents(), true);
                 return response()->json(['success'=>false,'message'=>$getUserProfile]);
            } 
        } catch (RequestException $e) {
            dd('RequestException:', $e->getMessage(), $e->getTraceAsString());
             if ($e->getResponse()->getStatusCode() == 400 || $e->getResponse()->getStatusCode() == 500) {
                $errorBody = json_decode($e->getResponse()->getBody()->getContents(), true);
                // Now you can access the message
                $errorMessage = $errorBody['message'] ?? 'Bad Request';
                // Optional: log or return
                 return response()->json(['success'=>false,'message'=>$errorMessage]);
            }
        } catch (\Exception $e) {
            dd('RequestException:', $e->getMessage(), $e->getTraceAsString());
             if ($e->getResponse()->getStatusCode() == 400 || $e->getResponse()->getStatusCode() == 500) {
                $errorBody = json_decode($e->getResponse()->getBody()->getContents(), true);
                // Now you can access the message
                $errorMessage = $errorBody['message'] ?? 'Bad Request';
                // Optional: log or return
                 return response()->json(['success'=>false,'message'=>$errorMessage]);
            }
        }

      
    }
    
     public function sendOtp(Request $request)
    {
        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }

        $nodeappUrl = env('NODE_APP_URL');


        if($request->change_type == 'mobile'){
            $rules = [
                'mobile_code' => 'required|numeric'
            ];

            $message = [
                'mobile_code.required' => 'The mobile is required.',
                'mobile_code.numeric' => 'The mobile must be a number.'
            ];    
        }else{
                $rules = [
                'email' => 'required|email:rfc,dns'
            ];

            $message = [
                'email.required' => 'The email is required.'            
            ];
        }
        


        $validated = $request->validate($rules, $message);
        $mobile_code = $request->mobile_code;
        $email = $request->email;
        $country_code = $request->country_code;
        $change_type = $request->change_type;
        $flag_code = $request->flag_code;
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):env('USER_ID');

        $loginUser = array();
        $errorMessage = null;
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'send_otp', [
                'json' => [
                    'user_id' => $user_ID,
                    'new_info' => ($change_type == 'mobile')? $mobile_code : $email,
                    "change_type" => $change_type,
                    "country_code" => $country_code,
                    "dial_code" => $flag_code
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $sendOtpResponse = json_decode($response->getBody()->getContents(), true);
                // print_r($loginUser);
                if ($sendOtpResponse['message'] == "OTP sent successfully") {
                    return response()->json([
                        'success' => true,
                        'number' => $mobile_code,
                        'country_code' => $country_code,
                        'email' => $email,
                        'lastid' => $sendOtpResponse['data']['lastid'],
                        'otp' => $sendOtpResponse['data']['otp'],
                    ]);
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
            // dd('Exception:', $e->getMessage(), $e->getTraceAsString());
             if ($e->getResponse()->getStatusCode() == 400) {
                $errorBody = json_decode($e->getResponse()->getBody()->getContents(), true);
                // Now you can access the message
                $errorMessage = $errorBody['message'] ?? 'Bad Request';
                // Optional: log or return
                 return response()->json(['success'=>false,'message'=>$errorMessage]);
            }
        }
    }

     public function verifyotpsubmit(Request $request)
    {
        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }

        $nodeappUrl = env('NODE_APP_URL');

        $rules = [
            'otp' => 'required|numeric'
        ];

        $message = [
            'otp.required' => 'The mobile field is required.',
        ];


        $validated = $request->validate($rules, $message);
        
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):env('USER_ID');

        $loginUser = array();
        $errorMessage = null;
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'verify_otp_update', [
                'json' => [
                    'lastid' => $request->lastid,
                    'otp' => $request->otp,
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $sendOtpResponse = json_decode($response->getBody()->getContents(), true);
               
                return response()->json([
                        'success' => true,
                        'message' => $sendOtpResponse['message'],
                    ]);
             
            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {
            // $errorMessage = $e->getMessage();
            //dd('RequestException:', $e->getMessage(), $e->getTraceAsString());
            if ($e->getResponse()->getStatusCode() == 400 || $e->getResponse()->getStatusCode() == 500) {
                $errorBody = json_decode($e->getResponse()->getBody()->getContents(), true);
                // Now you can access the message
                $errorMessage = $errorBody['message'] ?? 'Bad Request';
                // Optional: log or return
                 return response()->json(['success'=>false,'message'=>$errorMessage]);
            }
        } catch (\Exception $e) {
            // $errorMessage = $e->getMessage();
            // dd('Exception:', $e->getMessage(), $e->getTraceAsString());
             if ($e->getResponse()->getStatusCode() == 400 || $e->getResponse()->getStatusCode() == 500) {
                $errorBody = json_decode($e->getResponse()->getBody()->getContents(), true);
                // Now you can access the message
                $errorMessage = $errorBody['message'] ?? 'Bad Request';
                // Optional: log or return
                 return response()->json(['success'=>false,'message'=>$errorMessage]);
            }
        }
    }


    //Api call for faq....G1

    public function getFaq(Request $request)
    {


        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }

        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        // $user_ID = env('USER_ID');

        $faqsList = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'faqslist', [
                'json' => [
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $faqsList = json_decode($response->getBody()->getContents(), true);

            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }

        return view('Profile/faq', compact('title', 'data_arr', 'faqsList'));
    }
    
    // Help page
     public function getHelp(Request $request)
     {
         $title = "Contact";
         $data_arr = array();
         $data_arr['title'] = "Quickart";
         $data_arr['keywords'] = "";
         $data_arr['description'] = "";
         $data_arr['canonical'] = "";
         $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
      
         return view('Profile/help', compact('title', 'data_arr'));
     }
 
     // Careers page
     public function careers(Request $request)
     {
         $title = "Career";
         $data_arr = array();
         $data_arr['title'] = "Quickart";
         $data_arr['keywords'] = "";
         $data_arr['description'] = "";
         $data_arr['canonical'] = "";
         $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
      
         return view('footer/careers', compact('title', 'data_arr'));
     }
 
     // Blog page
     public function blog(Request $request)
     {
         $title = "Blog";
         $data_arr = array();
         $data_arr['title'] = "Quickart";
         $data_arr['keywords'] = "";
         $data_arr['description'] = "";
         $data_arr['canonical'] = "";
         $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
      
         return view('footer/blog', compact('title', 'data_arr'));
     }
 
     // Mobile page
     public function mobile(Request $request)
     {
         $title = "Mobile";
         $data_arr = array();
         $data_arr['title'] = "Quickart";
         $data_arr['keywords'] = "";
         $data_arr['description'] = "";
         $data_arr['canonical'] = "";
         $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
      
         return view('footer/mobile', compact('title', 'data_arr'));
     }
 
     // About page
     public function about(Request $request)
     {
         $title = "About";
         $data_arr = array();
         $data_arr['title'] = "Quickart";
         $data_arr['keywords'] = "";
         $data_arr['description'] = "";
         $data_arr['canonical'] = "";
         $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
      
         return view('footer/about', compact('title', 'data_arr'));
     }

}
