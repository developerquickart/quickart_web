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


class AddressController extends Controller
{

    public function __construct()
    {
        //construct
    }
    //Api call show address list...G1

    public function showAddressList(Request $request)
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
        $user_ID = !empty(session()->get('user_id')) ? session()->get('user_id') : '';
        if (empty($user_ID)) {
        return redirect()->to('/'); // or use '/home' if that's your homepage
        }  

        $showAddressList = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'show_address', [
                'json' => [
                    'user_id' => $data_arr['user_id'],
                    "store_id" => $store_ID
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $showAddressList = json_decode($response->getBody()->getContents(), true);
            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }

        return view('Address/address-list', compact('title', 'data_arr', 'showAddressList'));
    }


    //Delete address api call... G1
    public function deleteAddressAPICall(Request $request)
    {
        $nodeappUrl = env('NODE_APP_URL');
        // $store_ID = env('STORE_ID');
        // $user_ID = env('USER_ID');
        // dd(
        //     "'json' cart_id => $request->cartID, user_id => $user_ID, cancel_reason => $request->canecelReason"
        // );
         $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
        try {

            $url = $nodeappUrl . 'remove_address';
            $payload = [
                "address_id" => $request->addressId,
                "user_id" => $data_arr['user_id'],
            ];


            $client = new Client();
            $response = $client->post($url, [
                'json' => $payload,
                'http_errors' => false,
            ]);
            $statusCode = $response->getStatusCode();
            $rawBody = (string) $response->getBody();
            $responseBody = json_decode($rawBody, true);
            if (!is_array($responseBody)) {
                $responseBody = [];
            }
            $message = $responseBody['message'] ?? env('ERRORMSG');
            $status = (int) ($responseBody['status'] ?? 0);

            if ($statusCode == 200 && $status === 1) {
                return response()->json([
                    'success' => true,
                    'action' => 1,
                    'message' => $message,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'action' => $status,
                    'message' => $message,
                ], $statusCode >= 400 ? $statusCode : 200);
            }
        } catch (RequestException $e) {
            $message = env('ERRORMSG');
            $statusCode = 500;
            if ($e->hasResponse()) {
                $statusCode = $e->getResponse()->getStatusCode();
                $body = json_decode((string) $e->getResponse()->getBody(), true);
                if (is_array($body) && !empty($body['message'])) {
                    $message = (string) $body['message'];
                }
            }
            return response()->json([
                'success' => false,
                'action' => 0,
                'message' => $message,
            ], $statusCode);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'action' => 0,
                'message' => env('ERRORMSG'),
            ], 500);
        }
    }

    // App info api call including places... Aniket 
    public function getmap()
    {
        $addresstype = "profile";
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

        $appInfo = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'app_info', [
                'json' => [
                    'user_id' => $data_arr['user_id'],
                    'platform' => "web",
                    'app_name' => "customer",
                    'device_id' => "jivan fcm token",
                    'actual_device_id' => "",
                    'store_id' => $store_ID
                ]
            ]);

            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $appInfo = json_decode($response->getBody()->getContents(), true);
            } else {
                $errorMessage = "Unexpected status code: " . $statusCode;
                return response()->json(['error' => $errorMessage], $statusCode);
            }
        } catch (RequestException $e) {
            $errorMessage = $e->getMessage();
            return response()->json(['error' => $errorMessage], 500);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return response()->json(['error' => $errorMessage], 500);
        }
        return view('Address/google-map', compact('title', 'addresstype', 'data_arr', 'appInfo', 'user_ID'));
    }

    // Address page route call... Aniket
    public function Address()
    {$user_ID = !empty(session()->get('user_id')) ? session()->get('user_id') : '';
        if (empty($user_ID)) {
        return redirect()->to('/'); // or use '/home' if that's your homepage
        } 
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
         $getUser = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'show_profile', [
                'json' => [
                    'user_id' => $data_arr['user_id']
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $getUser = json_decode($response->getBody()->getContents(), true);
// echo "<pre>";print_r($getUser);echo "</pre>";exit;

            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }

        return view('Address/add-address', compact('data_arr','getUser'));
    }

   
    // Add Address api call... Aniket
   public function addaddress(Request $request)
    {
        $user_ID = !empty(session()->get('user_id')) ? session()->get('user_id') : '';
        if (empty($user_ID)) {
        return redirect()->to('/'); // or use '/home' if that's your homepage
        } 
        // Validation rules
        $rules = [
            // 'google-map' => 'required',
            'house_no' => 'required|string|max:255', // Address Details (House No Building & Block No & Area)
            'landmark' => 'nullable|string|max:255', // Landmark & Area Name (Optional)
            'address_type' => 'required|in:Home,Work,Others', // Save as (Home, Work, Others)
            'Uname' => 'required|string|max:255', // Receiver Name
            'number' => 'required|string|max:15', // Phone Number
            'email' => 'required|email:rfc,dns|max:255', // Email (valid for any domain)
            'address' => 'required'
        ];

        // Custom error messages (optional)
        $messages = [
            // 'google-map.required'=> 'Please select an address on Google Maps',
            'house_no.required' => 'Please enter House No & Building & Block No & Area',
            'address_type.required' => 'Please select an address type (Home, Work, Others).',
            'Uname.required' => 'Please enter name',
            'number.required' => 'Please enter number',
            'email.required' => 'Please enter email',
            'email.email' => 'Please enter a valid email address.',
            'address.required' => 'Please select address',
        ];


        // Validate the request
        $request->validate($rules, $messages);
        // dd($validatedData);

        $type = $request->input('address_type');
        $receiver_name = $request->input('Uname');
        $receiver_phone = $request->input('number');
        $receiver_phone_code = $request->input('country_code');
        $receiver_email = $request->input('email');
        $house_no = $request->input('house_no');
        $landmark = $request->input('landmark');
        $lat = $request->input('latitude');
        $lng = $request->input('longitude');
        $society_name = $request->input('address');
        $dial_code = $request->input('flagcode');
        $file = $request->file('image');
        
        $addedFrom = $request->input('addedFrom');
        $tab = $request->input('tab');
        //dd($type, $receiver_name, $receiver_phone, $receiver_phone_code, $receiver_email, $house_no, $landmark, $lat, $lng, $society_name, $dial_code);


        // Retrieve the parameters from the request
        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');

        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($user_ID); 
        }
        $addAddress = array();

        try {
            $client = new Client();
            // $response = $client->post($nodeappUrl . 'add_address', [
            //     'json' => [
            //         "user_id" => $user_ID,
            //         "type" => $type, // Dynamic address type
            //         "receiver_name" => $receiver_name,
            //         "receiver_phone" => $receiver_phone,
            //         "receiver_phone_code" => $receiver_phone_code,
            //         "receiver_email" => $receiver_email,
            //         "house_no" => $house_no, // Dynamic house number
            //         "landmark" => $landmark,
            //         "lat" => $lat,
            //         "lng" => $lng,
            //         "society_name" => $society_name,
            //         "dial_code" => $dial_code,
            //         "device_id" => ""
            //     ]
            // ]);

           if($file){
                 $response = $client->post($nodeappUrl . 'add_address', [
                    'multipart' => [
                        [
                            'name'     => 'user_id',
                            'contents' => $user_ID
                        ],
                        [
                            'name'     => 'type',
                            'contents' => $type
                        ],
                        [
                            'name'     => 'receiver_name',
                            'contents' => $receiver_name
                        ],
                        [
                            'name'     => 'receiver_phone',
                            'contents' => $receiver_phone
                        ],
                         [
                            'name'     => 'receiver_phone_code',
                            'contents' => $receiver_phone_code
                        ],
                          [
                            'name'     => 'receiver_email',
                            'contents' => $receiver_email
                        ],
                          [
                            'name'     => 'house_no',
                            'contents' => $house_no
                        ],
                          [
                            'name'     => 'landmark',
                            'contents' => $landmark
                        ],
                         [
                            'name'     => 'lat',
                            'contents' => $lat
                        ],
                         [
                            'name'     => 'lng',
                            'contents' => $lng
                        ],
                          [
                            'name'     => 'society_name',
                            'contents' => $society_name
                        ],
                         [
                            'name'     => 'dial_code',
                            'contents' => $dial_code
                        ],
                        [
                            'name'     => 'device_id',
                            'contents' => ''
                        ],
                        [
                            'name'     => 'image',
                            'contents' => fopen($file->getPathname(), 'r'),
                            'filename' => $file->getClientOriginalName()
                        ]
                    ]
                ]);
           }else{
             $response = $client->post($nodeappUrl . 'add_address', [
                    'multipart' => [
                        [
                            'name'     => 'user_id',
                            'contents' => $user_ID
                        ],
                        [
                            'name'     => 'type',
                            'contents' => $type
                        ],
                        [
                            'name'     => 'receiver_name',
                            'contents' => $receiver_name
                        ],
                        [
                            'name'     => 'receiver_phone',
                            'contents' => $receiver_phone
                        ],
                         [
                            'name'     => 'receiver_phone_code',
                            'contents' => $receiver_phone_code
                        ],
                          [
                            'name'     => 'receiver_email',
                            'contents' => $receiver_email
                        ],
                          [
                            'name'     => 'house_no',
                            'contents' => $house_no
                        ],
                          [
                            'name'     => 'landmark',
                            'contents' => $landmark
                        ],
                         [
                            'name'     => 'lat',
                            'contents' => $lat
                        ],
                         [
                            'name'     => 'lng',
                            'contents' => $lng
                        ],
                          [
                            'name'     => 'society_name',
                            'contents' => $society_name
                        ],
                         [
                            'name'     => 'dial_code',
                            'contents' => $dial_code
                        ],
                        [
                            'name'     => 'device_id',
                            'contents' => ''
                        ]
                    ]
                ]);
           }

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $addAddress = json_decode($response->getBody()->getContents(), true);
                // dd($addAddress);
            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {
            $errorMessage = $e->getMessage();
            dd($errorMessage);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            dd($errorMessage);
        }

        // Always treat the newly saved address as the cart/checkout + header selection.
        $newAddressId = $this->extractAddressIdFromAddResponse($addAddress);
        if ($newAddressId === null || $newAddressId === '') {
            $newAddressId = $this->resolveLatestAddressIdFromApi(
                $user_ID,
                $lat,
                $lng,
                $house_no,
                $type
            );
        }

        $displayHouse = trim((string) $house_no);
        if ($society_name !== null && trim((string) $society_name) !== '') {
            $societyTrim = trim((string) $society_name);
            if ($displayHouse === '' || stripos($displayHouse, $societyTrim) === false) {
                $displayHouse = trim($displayHouse . ($displayHouse !== '' ? ', ' : '') . $societyTrim);
            }
        }
        if ($displayHouse === '') {
            $displayHouse = 'Selected location';
        }

        $selectedAddressPayload = [
            'address_id' => $newAddressId !== null && $newAddressId !== '' ? (string) $newAddressId : null,
            'house_no' => $displayHouse,
            'type' => $type,
            'lat' => $lat,
            'lng' => $lng,
        ];

        // Update header delivery location immediately (ETA strip uses this session).
        if (is_numeric($lat) && is_numeric($lng)) {
            session()->put('delivery_user_lat', (float) $lat);
            session()->put('delivery_user_lng', (float) $lng);
            session()->put('delivery_location_name', $displayHouse);
        }

        // Durable + one-request flash so cart/header JS always pick this address.
        session()->put('qk_preferred_cart_address', $selectedAddressPayload);
        session()->flash('qk_cart_selected_address', $selectedAddressPayload);
        session()->flash('qk_header_address_just_saved', $selectedAddressPayload);
        session()->save();

        $redirectTab = ($tab !== null && $tab !== '') ? $tab : '1';
        $cartRedirect = url('cart?tab=' . $redirectTab . '&addedFrom=cart&addressSaved=1');

        if ($addedFrom == 'login') {
            session()->forget('qk_must_complete_address');
            return $this->redirectAfterAddressSaved($selectedAddressPayload, $cartRedirect);
        }

        if ($addedFrom == 'header') {
            // Always land on cart with the new address selected so header + cart stay in sync.
            return $this->redirectAfterAddressSaved($selectedAddressPayload, $cartRedirect);
        }

        if ($addedFrom == 'cart') {
            return $this->redirectAfterAddressSaved($selectedAddressPayload, $cartRedirect);
        }

        if ($addedFrom == 'trailcart') {
            return $this->redirectAfterAddressSaved(
                $selectedAddressPayload,
                url('trial-pack-cart?addedFrom=trailcart&addressSaved=1')
            );
        }

        // Default (any other entry): cart with this address selected.
        return $this->redirectAfterAddressSaved($selectedAddressPayload, $cartRedirect);
    }

    /**
     * Write localStorage on an intermediate page, then redirect — avoids stale cart/header selection.
     */
    private function redirectAfterAddressSaved(array $selectedAddress, string $redirectUrl)
    {
        return response()->view('Address.address-saved-redirect', [
            'selectedAddress' => $selectedAddress,
            'redirectUrl' => $redirectUrl,
        ]);
    }

    private function extractAddressIdFromAddResponse($addAddress)
    {
        if (!is_array($addAddress) || empty($addAddress)) {
            return null;
        }

        $candidates = [
            $addAddress['address_id'] ?? null,
            $addAddress['id'] ?? null,
            $addAddress['data']['address_id'] ?? null,
            $addAddress['data']['id'] ?? null,
            $addAddress['data']['data']['address_id'] ?? null,
            $addAddress['data']['data']['id'] ?? null,
        ];

        $responseData = $addAddress['data'] ?? null;
        if (is_array($responseData) && isset($responseData[0]) && is_array($responseData[0])) {
            $candidates[] = $responseData[0]['address_id'] ?? null;
            $candidates[] = $responseData[0]['id'] ?? null;
        }

        foreach ($candidates as $candidate) {
            if ($candidate !== null && $candidate !== '') {
                return $candidate;
            }
        }

        return null;
    }

    /**
     * If add_address response omits address_id, resolve it from show_address (newest / best match).
     */
    private function resolveLatestAddressIdFromApi($userId, $lat, $lng, $houseNo, $type)
    {
        if (empty($userId) || empty(env('NODE_APP_URL'))) {
            return null;
        }

        try {
            $client = new Client();
            $response = $client->post(env('NODE_APP_URL') . 'show_address', [
                'json' => [
                    'user_id' => $userId,
                    'store_id' => env('STORE_ID'),
                ],
                'http_errors' => false,
                'timeout' => 10,
            ]);
            if ($response->getStatusCode() !== 200) {
                return null;
            }
            $payload = json_decode($response->getBody()->getContents(), true);
            $list = [];
            if (is_array($payload) && !empty($payload['data']) && is_array($payload['data'])) {
                $list = $payload['data'];
            }
            if (empty($list)) {
                return null;
            }

            $bestId = null;
            $bestScore = -1;
            $targetLat = is_numeric($lat) ? (float) $lat : null;
            $targetLng = is_numeric($lng) ? (float) $lng : null;
            $targetHouse = strtolower(trim((string) $houseNo));
            $targetType = strtolower(trim((string) $type));

            foreach ($list as $index => $row) {
                if (!is_array($row)) {
                    continue;
                }
                $id = $row['address_id'] ?? $row['id'] ?? null;
                if ($id === null || $id === '') {
                    continue;
                }
                $score = $index; // later items often newer
                $rowHouse = strtolower(trim((string) ($row['house_no'] ?? '')));
                $rowType = strtolower(trim((string) ($row['type'] ?? '')));
                if ($targetHouse !== '' && $rowHouse === $targetHouse) {
                    $score += 1000;
                }
                if ($targetType !== '' && $rowType === $targetType) {
                    $score += 100;
                }
                if ($targetLat !== null && $targetLng !== null
                    && isset($row['lat'], $row['lng'])
                    && is_numeric($row['lat']) && is_numeric($row['lng'])) {
                    $dLat = abs((float) $row['lat'] - $targetLat);
                    $dLng = abs((float) $row['lng'] - $targetLng);
                    if ($dLat < 0.0008 && $dLng < 0.0008) {
                        $score += 500;
                    }
                }
                if ($score >= $bestScore) {
                    $bestScore = $score;
                    $bestId = $id;
                }
            }

            return $bestId;
        } catch (\Throwable $e) {
            \Log::warning('resolveLatestAddressIdFromApi failed', ['message' => $e->getMessage()]);
            return null;
        }
    }

    
    // Edit Address api call... Aniket
    public function editAddress(Request $request)
    {
       
       $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
       if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($user_ID); 
        }
        $rules = [
            'house_no' => 'required|string|max:255',
            'landmark' => 'nullable|string|max:255',
            'address_type' => 'required|in:Home,Work,Others',
            'Uname' => 'required|string|max:255',
            'number' => 'required|string|max:15',
            'email' => 'required|email:rfc,dns|max:255',
            'address' => 'required'
        ];

        $messages = [
            'house_no.required' => 'Please enter House No & Building & Block No & Area',
            'address_type.required' => 'Please select an address type (Home, Work, Other).',
            'Uname.required' => 'Please enter name',
            'number.required' => 'Please enter number',
            'email.required' => 'Please enter email',
            'email.email' => 'Please enter a valid email address.',
             'address.required' => 'Please select address',
        ];

        $request->validate($rules, $messages);

        $address_id = $request->input('address_id');
        $type = $request->input('address_type');
        $receiver_name = $request->input('Uname');
        $receiver_phone = $request->input('number');
        $receiver_phone_code = $request->input('country_code');
        $receiver_email = $request->input('email');
        $house_no = $request->input('house_no');
        $landmark = $request->input('landmark');
        $lat = $request->input('latitude');
        $lng = $request->input('longitude');
        $society_name = $request->input('address');
        $dial_code = $request->input('flagcode');
        $file = $request->file('image');
        // dd($type, $receiver_name, $receiver_phone, $receiver_phone_code, $receiver_email, $house_no, $landmark, $lat, $lng, $society_name, $dial_code);

        $nodeappUrl = env('NODE_APP_URL');
        // $user_ID = env('USER_ID');
        $addAddress = array();

        

        try {
            $client = new Client();
            // $response = $client->post($nodeappUrl . 'edit_address', [
            //     'json' => [
            //         "address_id" => $address_id,
            //         "user_id" => $user_ID,
            //         "type" => $type,
            //         "receiver_name" => $receiver_name,
            //         "receiver_phone" => $receiver_phone,
            //         "receiver_phone_code" => $receiver_phone_code,
            //         "receiver_email" => $receiver_email,
            //         "house_no" => $house_no,
            //         "landmark" => $landmark,
            //         "lat" => $lat,
            //         "lng" => $lng,
            //         "society_name" => $society_name,
            //         "dial_code" => $dial_code,
            //         "device_id" => ""
            //     ]
            // ]);

            if($file){
                 $response = $client->post($nodeappUrl . 'edit_address', [
                    'multipart' => [
                        [
                            'name'     => 'address_id',
                            'contents' => $address_id
                        ],
                        [
                            'name'     => 'user_id',
                            'contents' => $user_ID
                        ],
                        [
                            'name'     => 'type',
                            'contents' => $type
                        ],
                        [
                            'name'     => 'receiver_name',
                            'contents' => $receiver_name
                        ],
                        [
                            'name'     => 'receiver_phone',
                            'contents' => $receiver_phone
                        ],
                         [
                            'name'     => 'receiver_phone_code',
                            'contents' => $receiver_phone_code
                        ],
                          [
                            'name'     => 'receiver_email',
                            'contents' => $receiver_email
                        ],
                          [
                            'name'     => 'house_no',
                            'contents' => $house_no
                        ],
                          [
                            'name'     => 'landmark',
                            'contents' => $landmark
                        ],
                         [
                            'name'     => 'lat',
                            'contents' => $lat
                        ],
                         [
                            'name'     => 'lng',
                            'contents' => $lng
                        ],
                          [
                            'name'     => 'society_name',
                            'contents' => $society_name
                        ],
                         [
                            'name'     => 'dial_code',
                            'contents' => $dial_code
                        ],
                        [
                            'name'     => 'device_id',
                            'contents' => ''
                        ],
                        [
                            'name'     => 'image',
                            'contents' => fopen($file->getPathname(), 'r'),
                            'filename' => $file->getClientOriginalName()
                        ]
                    ]
                ]);
           }else{
             $response = $client->post($nodeappUrl . 'edit_address', [
                    'multipart' => [
                         [
                            'name'     => 'address_id',
                            'contents' => $address_id
                        ],
                        [
                            'name'     => 'user_id',
                            'contents' => $user_ID
                        ],
                        [
                            'name'     => 'type',
                            'contents' => $type
                        ],
                        [
                            'name'     => 'receiver_name',
                            'contents' => $receiver_name
                        ],
                        [
                            'name'     => 'receiver_phone',
                            'contents' => $receiver_phone
                        ],
                         [
                            'name'     => 'receiver_phone_code',
                            'contents' => $receiver_phone_code
                        ],
                          [
                            'name'     => 'receiver_email',
                            'contents' => $receiver_email
                        ],
                          [
                            'name'     => 'house_no',
                            'contents' => $house_no
                        ],
                          [
                            'name'     => 'landmark',
                            'contents' => $landmark
                        ],
                         [
                            'name'     => 'lat',
                            'contents' => $lat
                        ],
                         [
                            'name'     => 'lng',
                            'contents' => $lng
                        ],
                          [
                            'name'     => 'society_name',
                            'contents' => $society_name
                        ],
                         [
                            'name'     => 'dial_code',
                            'contents' => $dial_code
                        ],
                        [
                            'name'     => 'device_id',
                            'contents' => ''
                        ]
                    ]
                ]);
           }

            $statusCode = $response->getStatusCode();
            $addAddress = json_decode($response->getBody()->getContents(), true);
            $apiStatus = isset($addAddress['status']) ? (string) $addAddress['status'] : '';
            $apiSuccess = isset($addAddress['success']) ? (string) $addAddress['success'] : '';
            $isSuccessfulPayload = in_array($apiStatus, ['1', 'true', 'TRUE'], true)
                || in_array($apiSuccess, ['1', 'true', 'TRUE'], true);

            if (in_array($statusCode, [200, 201], true) && ($isSuccessfulPayload || empty($addAddress))) {
                return response()->json([
                    'success' => true,
                    'address' => $addAddress
                ]);
            }

            $errorMessage = !empty($addAddress['message']) ? $addAddress['message'] : env('ERRORMSG');
            return response()->json(['success' => false, 'message' => $errorMessage]);
        } catch (RequestException $e) {
            $errorMessage = $e->getMessage();
            dd('Exception:', $e->getMessage(), $e->getTraceAsString());
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

     //   return redirect()->route('address.list');
    }
}
