<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProductListController extends Controller
{
    public function __construct()
    {
        //construct
    }

    public function fetchSubCategoryProducts(Request $request)
    {

        $storeId = env('STORE_ID');
        $catId = $request->cat_id;
        $subCatId = $request->sub_cat_id;

        // Create a Guzzle client
        $nodeappUrl = env('NODE_APP_URL');
        $fetchProducts = array();
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):'';  
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }
        $perpage = 20;

        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'cat_product', [
                'json' => [
                    'store_id' => $storeId,
                    'cat_id' => $catId,
                    'sub_cat_id' => $subCatId,
                    'user_id' => $data_arr['user_id'],
                    'byname' => null,
                    'min_price' => null,
                    'max_price' => null,
                    'stock' => null,
                    'min_discount' => null,
                    'max_discount' => null,
                    'min_rating' => null,
                    'max_rating' => null,
                    'sort' => null,
                    'sortname' => "null",
                    'sortprice' => null,
                    'page' => 1,
                    'perpage' => $perpage,
                ],
            ]);

            // Check the response status code
            if ($response->getStatusCode() == 200) {
                $fetchProducts = json_decode($response->getBody()->getContents(), true);

                if (!empty($fetchProducts['data'])) {
                    $htmlContent = "<div class='product_list_box'>";
                    foreach ($fetchProducts['data'] as $index => $product) {
                        $isFavourite = $product['isFavourite'] == "true";
                        $isNotified = $product['notify_me'] == "true";
                        $discountText = $product['discountper'] > 0 ? "<div class='discount_text'>" . number_format($product['discountper'], 0) . "%<span>Off</span></div>" : "";
                        $countryFlag = !empty($product['country_icon']) ? "<div class='country_flag'><img src='{$product['country_icon']}' alt='flag'></div>" : "";
                        $wishlistImage = asset('assets/images/' . ($isFavourite ? 'wishlisted.png' : 'wishlist.png'));
                        $notificationImage = asset('assets/images/notification.png');
                        $varientID = $product['varient_id'];
                        $cart_qty = $product['cart_qty'];
                        $defaultQunt = "";
                        if ($cart_qty == 0) {
                            $defaultQunt = "<input type='text' name='qty' value='0' class='input-qty input-rounded' id='qty-$varientID' min='1'>";
                        } else {
                            $defaultQunt = "<input type='text' name='qty' value='$cart_qty' class='input-qty input-rounded' id='qty-$varientID' min='1'>";
                        }
                        // Check stock availability
                        if ($product['stock'] > 0) {
                            $htmlContent .= "
                            <div class='all_product_list'>
                                <div class='product'>
                                    <div class='product_header'>
                                        <div class='product_top_left'>
                                            $discountText
                                            $countryFlag
                                        </div>
                                        <div class='product_top_right'>
                                            <div class='product_wishlist'>
                                                <a href='javascript:void(0);' onclick='addRemoveWishlist(this)' data-varient-id='{$product['varient_id']}'>
                                                    <img id='wishlist-{$product['varient_id']}' src='$wishlistImage' alt='wishlist' style='max-width: 25px;'>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href='" . env('APP_URL') . "product-details'>
                                        <div class='product-img'>
                                            <img class='img-fluid' src='{$product['product_image']}' alt=''>
                                        </div>
                                        <div class='product-body'>
                                            <div class='product_name'>{$product['product_name']}</div>
                                            <div class='product_weight'><span>{$product['quantity']} {$product['unit']}</span></div>
                                        </div>
                                    </a>
                                    <div class='product-footer'>
                                        <div class='product_detail'>
                                            <p class='offer-price'>AED " . number_format($product['price'], 2) . "<br>" .
                        ($product['price'] != $product['mrp'] ? "<span class='regular-price'>AED " . number_format($product['mrp'], 2) . "</span>" : "") .
                        "</p>
                                        </div>
                                        <div class='cart_btn'>
                                            <div class='qtyBox' id='qtyBox'>
                                                <button id='remove-$varientID' class='qty-btn qty-btn-minus' type='button' onclick='addToCart('.$varientID.', '.$cart_qty.',-1)'>-</button>
                                                $defaultQunt
                                                <button id='add-$varientID' class='qty-btn qty-btn-plus' type='button' onclick='addToCart('.$varientID.', '.$cart_qty.', 1)'>+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='subscribe_text'>Subscribe & Save 5%</div>
                                </div>
                            </div>";
                        } else {
                            // Product is unavailable
                            $htmlContent .= "
                                <div class='all_product_list'>
                                    <div class='product'>
                                        <div class='product_header'>
                                            <div class='product_top_left'>
                                                $discountText
                                                $countryFlag
                                            </div>
                                            <div class='product_top_right'>
                                                <div class='product_wishlist'>
                                                    <a href='javascript:void(0);' onclick='addRemoveWishlist(this)' data-varient-id='{$product['varient_id']}'>
                                                        <img id='wishlist-{$product['varient_id']}' src='$wishlistImage' alt='wishlist' style='max-width: 25px;'>
                                                    </a>
                                                </div>
                                                <div class='product_wishlist'>";
                            // Check if the product is available for notification
                            if ($product['notify_me'] == 'false') {
                                $htmlContent .= "
                                                    <a href='javascript:void(0);' onclick='addNofityMe(this)' data-varient-id='{$product['varient_id']}' data-product-id='{$product['product_id']}'>
                                                        <img id='notifyme-{$product['varient_id']}-{$product['product_id']}'
                                                            src='" . asset($product['notify_me'] == 'true' ? 'assets/images/notification-fill.png' : 'assets/images/notification.png') . "'
                                                            alt='wishlist'
                                                            style='max-width: 25px;'>
                                                    </a>";
                            } else {
                                $htmlContent .= "
                                                    <a href='" . env('APP_URL') . "notify'>
                                                        <img id='notifyMe-{$product['varient_id']}' src='" . asset('assets/images/notification-fill.png') . "' alt='wishlist' style='max-width: 25px;'>
                                                    </a>";
                            }
                            $htmlContent .= "
                                                </div>
                                            </div>
                                        </div>
                                        <a href='" . env('APP_URL') . "product-details'>
                                            <div class='product-img'>
                                                <img class='img-fluid' src='{$product['product_image']}' alt=''>
                                            </div>
                                        </a>
                                        <div class='product-body notify_box'>
                                            <div class='product-body'>
                                                <div class='product_name'>{$product['product_name']}</div>
                                                <div class='product_weight'><span>{$product['quantity']} {$product['unit']}</span></div>
                                            </div>
                                            <div class='product_unavailable'>
                                                <div class='product_unavailable_title'>Product Unavailable</div>
                                                <p>You will be notified.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                        }
                    }
                    $htmlContent .= "</div>";
                    echo $htmlContent;
                }

            }

        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'error' => 'Failed to fetch data',
                'details' => $e->getMessage(),
            ]);
        }
    }
}