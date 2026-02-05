<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotifyMeController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubscriptionOrderController;
use App\Http\Controllers\TrialPackController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DailyOrderController;
use App\Http\Controllers\RepeatOrderController;



Route::get('/notify', function () {
    $data_arr = array();
    $data_arr['title'] = "Quickart";
    $data_arr['keywords'] = "";
    $data_arr['description'] = "";
    $data_arr['canonical'] = "";
    return view('notify', ['data_arr' => $data_arr]);
});





Route::get('/return-refund', function () {
    $data_arr = array();
    $data_arr['title'] = "Quickart";
    $data_arr['keywords'] = "";
    $data_arr['description'] = "";
    $data_arr['canonical'] = "";
    return view('footer/return-refund', ['data_arr' => $data_arr]);
});
Route::get('/privacy-policy', function () {
    $data_arr = array();
    $data_arr['title'] = "Quickart";
    $data_arr['keywords'] = "";
    $data_arr['description'] = "";
    $data_arr['canonical'] = "";
    return view('footer/privacy-policy', ['data_arr' => $data_arr]);
});

Route::get('/add-address', function () {
    $data_arr = array();
    $data_arr['title'] = "Quickart";
    $data_arr['keywords'] = "";
    $data_arr['description'] = "";
    $data_arr['canonical'] = "";
    return view('Address/add-address', ['data_arr' => $data_arr]);
});
Route::get('/login', function () {
    $data_arr = array();
    $data_arr['title'] = "Quickart";
    $data_arr['keywords'] = "";
    $data_arr['description'] = "";
    $data_arr['canonical'] = "";
    return view('login', ['data_arr' => $data_arr]);
});


Route::get('/login', function () {
    $data_arr = array();
    $data_arr['title'] = "Quickart";
    $data_arr['keywords'] = "";
    $data_arr['description'] = "";
    $data_arr['canonical'] = "";
    return view('login', ['data_arr' => $data_arr]);
});
Route::get('/otp', function () {
    $data_arr = array();
    $data_arr['title'] = "Quickart";
    $data_arr['keywords'] = "";
    $data_arr['description'] = "";
    $data_arr['canonical'] = "";
    return view('otp', ['data_arr' => $data_arr]);
});
Route::get('/sign-up', function () {
    $data_arr = array();
    $data_arr['title'] = "Quickart";
    $data_arr['keywords'] = "";
    $data_arr['description'] = "";
    $data_arr['canonical'] = "";
    return view('sign-up', ['data_arr' => $data_arr]);
});

Route::get('/rating-reviews', function () {
    $data_arr = array();
    $data_arr['title'] = "Quickart";
    $data_arr['keywords'] = "";
    $data_arr['description'] = "";
    $data_arr['canonical'] = "";
    return view('Rating/rating-reviews', ['data_arr' => $data_arr]);
});
Route::get('/rating-list', function () {
    $data_arr = array();
    $data_arr['title'] = "Quickart";
    $data_arr['keywords'] = "";
    $data_arr['description'] = "";
    $data_arr['canonical'] = "";
    return view('Rating/rating-list', ['data_arr' => $data_arr]);
});
Route::get('/order-cancelled', function () {
    $data_arr = array();
    $data_arr['title'] = "Quickart";
    $data_arr['keywords'] = "";
    $data_arr['description'] = "";
    $data_arr['canonical'] = "";
    return view('order-cancelled', ['data_arr' => $data_arr]);
});

//Home Controller...G1
Route::get('/', [HomeController::class, 'oneapiList'])->name('index');
Route::any('/product-list', [ProductController::class, 'productList']);
//Categories Controller...G1
Route::get('/all-categories', [CategoriesController::class, 'categoryList']);
Route::get('/subcategories-product-list/{cat_name}', [CategoriesController::class, 'productList']);
Route::get('/all-brands', [CategoriesController::class, 'brandList']);
Route::get('/product-details', [ProductDetailController::class, 'getProductDetail']);
Route::post('/showWeekListA', [ProductDetailController::class, 'showWeekList']);
Route::any('/handleDateSelection', [ProductDetailController::class, 'handleDateSelection']);
Route::post('/addToSubCart', [ProductDetailController::class, 'addToSubCart']);


Route::any('/fetch-sub-category-products', [ProductListController::class, 'fetchSubCategoryProducts']);

//Card Controller...G1
Route::get('/card-details', [CardController::class, 'cardList']);
Route::post('/removeCardAPICall', [CardController::class, 'removeCardAPICall']);
// Route::post('/addCardAPICall', action: [CardController::class, 'addCardAPICall']);
Route::post('/addCardAPICall', [CardController::class, 'addCardAPICall']);
Route::get('/wallet', [CardController::class, 'appInfo']);


//Banner Controller...G1
Route::get('/banner-product-list', [BannersController::class, 'productList']);
Route::post('/addRemoveWishlist', [BannersController::class, 'addRemoveWishlist']);

//Subscription Order Controller...G1
Route::get('/subscription-orders', [SubscriptionOrderController::class, 'subscriptionOrderList']);
Route::get('/subscription-order-product', [SubscriptionOrderController::class, 'subscriptionOrderProductList']);
Route::get('/subscription-order-info', [SubscriptionOrderController::class, 'subscriptionOrderProductDetail']);
Route::post('/cancelOrderReasonsList', [SubscriptionOrderController::class, 'cancelOrderReasonsList']);
Route::post('/cancelOrderAPICall', [SubscriptionOrderController::class, 'cancelOrderAPICall']);
Route::post('/buyAgainAPICall', [SubscriptionOrderController::class, 'buyAgainAPICall']);
Route::post('/changeCardAPICall', [SubscriptionOrderController::class, 'changeCardAPICall']);
Route::post('/showResumeOrderDate', [SubscriptionOrderController::class, 'showResumeOrderDatelistAPICall']);
Route::post('/resumePauseOrder', [SubscriptionOrderController::class, 'resumePauseOrderAPICall']);
Route::post('/pauseOrderDate', [SubscriptionOrderController::class, 'pauseOrderDateAPICall']);


//Daily Order Controller...G1
Route::get('/daily-orders', [DailyOrderController::class, 'dailyOrderList']);
Route::get('/daily-order-details', [DailyOrderController::class, 'dailyOrderDetailsList']);


//Profile controller...G1
Route::get('/terms-conditions', [ProfileController::class, 'getTermsCondition']);
Route::get('/profile', [ProfileController::class, 'getUserProfile']);
Route::get('/faq', [ProfileController::class, 'getFaq']);


//Address controller...G1
Route::get('/address-list', [AddressController::class, 'showAddressList'])->name('address.list');
Route::post('/deleteAddressAPICall', [AddressController::class, 'deleteAddressAPICall']);
// Get Map  ---Aniket
Route::get('/google-map', [AddressController::class, 'getmap']);
Route::get('/add-address', [AddressController::class, 'Address']);
Route::post('/get-address', [AddressController::class, 'addaddress'])->name('get-address');
Route::put('/edit-address', [AddressController::class, 'editAddress'])->name('update-address');

//Notification controller...G1
Route::get('/notification', [NotificationController::class, 'showNotificationList']);

//Trial pack controller...G1
Route::get('/trial-pack', [TrialPackController::class, 'trialPackList']);
Route::get('/trial-pack-cart', [TrialPackController::class, 'trialPackCart']);
Route::post('showTrialPackProduct', [TrialPackController::class, 'showTrialPackProduct']);
Route::post('buyNowTrialPack', [TrialPackController::class, 'buyNowTrailPack']);
Route::post('checkoutTrialPack', [TrialPackController::class, 'checkoutTrialPackAPICall']);
Route::post('showAddressList', [TrialPackController::class, 'showAddressList']);
Route::post('showCardList', [TrialPackController::class, 'showCardList']);
Route::post('quickPayTrialPack', [TrialPackController::class, 'quickPayTrialPackAPICall']);

//Cart controller...G1
Route::get('/cart', [CartController::class, 'showSubCartAPICall']);
Route::post('/update-cart-quantity', [CartController::class, 'updateQuantity']);
Route::post('checkoutsubcribtionorder', [CartController::class, 'checkoutSubscriptionOrderAPICall']);
Route::post('checkoutPaymentSubcribtionOrder', [CartController::class, 'checkoutPaymentSubcribtionOrderAPICall']);
Route::get('/order-complete', [CartController::class, 'orderCompletedPage']);
Route::post('saveSelectedDateTimeDB', [CartController::class, 'saveSelectedDateTimeAPI']);
Route::post('/checkoutdailyorder', [CartController::class, 'checkoutDailyOrderAPICall']);
Route::post('/checkoutpaymentdailyorder', [CartController::class, 'checkoutDailyPaymentOrderAPICall']);



// cart controller ---Aniket
Route::post('/add-to-cart', [CartController::class, 'addQuantityCart']);

//Notifyme controller ---Aniket
Route::get('/wishlist', [BannersController::class, 'showWishlist']);
Route::post('/addNotifyMe', [NotifyMeController::class, 'addNotifyMe']);
Route::post('/RemoveNotifyMe', [NotifyMeController::class, 'RemoveNotifyMe']);
Route::get('/notify', [NotifyMeController::class, 'showNotify']);

// Search controller ---Aniket
Route::get('/product-search', [SearchController::class, 'productSearch']);
Route::get('/search', [SearchController::class, 'Search']);

// Coupon controller...G1
Route::get('/coupon', [CouponController::class, 'geCouponList']);
Route::post('showCouponlist', [CouponController::class, 'showCouponlistAPICall']);
Route::post('applyCouponCall', [CouponController::class, 'applyCouponAPICall']);



// Auth GET login methods ---Aniket
Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/loginotp/{id?}', [AuthController::class, 'loginotp'])->name('loginotp');
// Auth POST login methods ---Aniket
Route::post('/loginsubmit', [AuthController::class, 'loginsubmit'])->name('loginsubmit');
Route::post('/registeruser', [AuthController::class, 'registeruser'])->name('registeruser');
Route::post('/loginotpsubmit', [AuthController::class, 'loginotpsubmit'])->name('loginotpsubmit');
Route::post('/resend-otp', [AuthController::class, 'resend_otp']);


Route::get('/repeat-orders', [RepeatOrderController::class, 'ProductList']);