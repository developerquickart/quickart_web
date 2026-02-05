<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Carbon\carbon;
use Symfony\Component\HttpFoundation\Session\Session;

class BannersController extends Controller
{

    public function __construct()
    {
        //construct
    }

    //Banner product list...G1
    public function productList(Request $request)
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

        $bannerId = $request->query('banner-id');
        $bannerType = $request->query('banner-type');
        $perpage = 20;
        // $name = $request->query('name');
        // $brandId = $request->query('brand_id');

        $productList = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'searchbybanner', [
                'json' => [
                    'user_id' => $data_arr['user_id'],
                    'store_id' => $store_ID,
                    'keyword' => "",
                    'byname' => "null",
                    'min_price' => "null",
                    'max_price' => "null",
                    'stock' => "null",
                    'min_discount' => "null",
                    'max_discount' => "null",
                    'sort' => "null",
                    'sortname' => "null",
                    'sortprice' => "null",
                    'cat_id' => "null",
                    'sub_cat_id' => "null",
                    'device_id' => "UP1A.231005.007",
                    'brand_id' => "",
                    'banner_id' => $bannerId,
                    "banner_type"=>$bannerType,
                    'perpage' => $perpage,
                    'page' => 1,
                    "platform" => "web"
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $productList = json_decode($response->getBody()->getContents(), true);
                
            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }


        if ($request->ajax()) {
            $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):'';  
            $store_ID = env('STORE_ID');
            $bannerId = $request->query('banner-id');
            $bannerType = $request->query('banner-type');
            $page = $request->page;
            $perpage = 20;
          // dd("jivan");
            $productList = array();
            try {
                $client = new Client();
                $response = $client->post($nodeappUrl . 'searchbybanner', [
                    'json' => [
                        'user_id' => $data_arr['user_id'],
                        'store_id' => $store_ID,
                        'keyword' => "",
                        'byname' => "null",
                        'min_price' => "null",
                        'max_price' => "null",
                        'stock' => "null",
                        'min_discount' => "null",
                        'max_discount' => "null",
                        'sort' => "null",
                        'sortname' => "null",
                        'sortprice' => "null",
                        'cat_id' => "null",
                        'sub_cat_id' => "null",
                        'device_id' => "UP1A.231005.007",
                        'brand_id' => "",
                        'banner_id' => $bannerId,
                        "banner_type"=>$bannerType,
                        'perpage' => $perpage,
                        'page' => $page,
                        "platform" => "web"
                    ]
                ]);

                $statusCode = $response->getStatusCode();

                if ($statusCode == 200) {
                    $productList = json_decode($response->getBody()->getContents(), true);
                    $productList = $productList['data'];
                } else {
                    $errorMessage = env('ERRORMSG');
                }
            } catch (RequestException $e) {

                $errorMessage = $e->getMessage();
            } catch (\Exception $e) {

                $errorMessage = $e->getMessage();
            }

            return view('Banners.banner-product-list-partial', compact('productList'));

        }

        return view('Banners/banner-product-list', compact('title', 'data_arr', 'productList'));
    }


    public function addRemoveWishlist(Request $request)
    {

        //dd($request->all());
        // $title = "Quickart-category";
        // $data_arr = array();
        // $data_arr['title'] = "Quickart";
        // $data_arr['keywords'] = "";
        // $data_arr['description'] = "";
        // $data_arr['canonical'] = "";


        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        $user_ID =  !empty(session()->get('user_id'))?session()->get('user_id'):'';  

        //  $productList = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'add_rem_wishlist', [
                'json' => [

                    "user_id" => $user_ID,
                    "varient_id" => $request->varient_id,
                    "store_id" => $store_ID,
                    "platform" => "web"
                ]
            ]);

            $statusCode = $response->getStatusCode();
            // dd($response);
            if ($statusCode == 200) {
                $productList = json_decode($response->getBody()->getContents(), true);

                return response()->json([
                    'success' => true,
                    'action' => ($productList['message'] == "Added to Wishlist") ? 'added' : 'removed',
                    'message' => ($productList['message'] == "Added to Wishlist") ? 'added' : 'removed',
                     'name' => $productList['product_name'],
                ]);
            } else {
                // $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }

        //  return view('Banners/banner-product-list', compact('title', 'data_arr', 'addRemoveWishlist'));
    }

    public function showWishlist(Request $request)
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
        $productList = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'show_wishlist', [
                'json' => [
                    "user_id" => $user_ID,
                    "store_id" => $store_ID,
                    "byname" => "null",
                    "min_price" => "null",
                    "max_price" => "null",
                    "stock" > "null",
                    "min_discount" => "null",
                    "max_discount" => "null",
                    "is_subscription" => 1,
                    "device_id" => "",
                    "platform" => "web"
                ]
            ]);
            $statusCode = $response->getStatusCode();
            // dd($response);
            if ($statusCode == 200) {
                $productList = json_decode($response->getBody()->getContents(), true);
            } else {
                // $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {
            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
        }
        return view('Profile/wishlist', compact('title', 'data_arr', 'productList'));
    }
    
    public function offers(Request $request)
    {
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        $store_ID = env('STORE_ID');
        
         $nodeappUrl = env('NODE_APP_URL');
        $offerBanner = array();
         try {
                $client = new Client();
                $response = $client->post($nodeappUrl . 'offer', [
                    'json' => [
                        'store_id' => $store_ID,
                    ]
                ]);

                $statusCode = $response->getStatusCode();

                if ($statusCode == 200) {
                    $offerData = json_decode($response->getBody()->getContents(), true);
                    $offerBanner = $offerData['data'];
                } else {
                    $errorMessage = env('ERRORMSG');
                }
            } catch (RequestException $e) {

                $errorMessage = $e->getMessage();
            } catch (\Exception $e) {

                $errorMessage = $e->getMessage();
            }
         return view('Offers/offer-detail',compact('data_arr','offerBanner'));
    }
}
