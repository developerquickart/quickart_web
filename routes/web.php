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
use App\Http\Controllers\DeliveryEtaController;
use App\Http\Controllers\RepeatOrderController;
use App\Http\Controllers\RateReviewController;
use App\Http\Controllers\SitemapController;
use Illuminate\Http\Request;


// Route::get('/sitemap.xml', [SitemapController::class, 'index']);
Route::get('/generate-sitemap', [SitemapController::class, 'generateAllSitemaps']);

// Route::get('/dashboardScreen', function () {
//     return redirect('/');
// });
// Route::get('/dashboardScreen', function (Request $request) {
//      $userAgent = $request->header('User-Agent');

//     // Define store URLs
//     $androidStore = 'https://play.google.com/store/apps/details?id=com.quickart.customer';
//     $iosStore = 'https://apps.apple.com/in/app/quickart/id1624846848';
//     $webUrl = url('/');

//     if (stripos($userAgent, 'android') !== false) {
//         return redirect()->away($androidStore);
//     } elseif (
//         stripos($userAgent, 'iphone') !== false ||
//         stripos($userAgent, 'ipad') !== false ||
//         stripos($userAgent, 'ios') !== false
//     ) {
//         return redirect()->away($iosStore);
//     } else {
//         return redirect($webUrl);
//     }
// });

Route::get('/return-refund',  [HomeController::class, 'refund']);
Route::get('/privacy-policy',  [HomeController::class, 'privacypolicy']);

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

Route::get('/order-cancelled', function () {
    $data_arr = array();
    $data_arr['title'] = "Quickart";
    $data_arr['keywords'] = "";
    $data_arr['description'] = "";
    $data_arr['canonical'] = "";
    return view('order-cancelled', ['data_arr' => $data_arr]);
});

// Route::get('/my-orders', function () {
//     $data_arr = array();
//     $data_arr['title'] = "Quickart";
//     $data_arr['keywords'] = "";
//     $data_arr['description'] = "";
//     $data_arr['canonical'] = "";
//     return view('Orders/my-orders', ['data_arr' => $data_arr]);
// });


//Home Controller...G1
Route::get('/', [HomeController::class, 'oneapiList'])->name('index');
Route::any('/product-list', [ProductController::class, 'productList']);
Route: Route::get('/searchProductList', [ProductController::class, 'searchProductList']);
Route::any('/additional-categories', [ProductController::class, 'additionalProductList']);
Route::any('/additional-categories/{name}', [ProductController::class, 'additionalProductList']);
Route::any('/brand-product-list', [ProductController::class, 'brandProductList']);
Route::any('/occasional-product-list', [ProductController::class, 'OccasionalProductList']);
Route::any('/top-selling-product-list', [ProductController::class, 'TopSellingProductList']);
Route::any('/recent-selling-product-list', [ProductController::class, 'RecentSellingProductList']);

//Categories Controller...G1
Route::get('/all-categories', [CategoriesController::class, 'categoryList']);
Route::get('/subcategories-product-list', [CategoriesController::class, 'productList']);
Route::get('subcategories-product-list/{category}/{catid}/{name}/{subcatid}', [CategoriesController::class, 'productList'])->name('subcategory.products');

Route::get('/all-brands', [CategoriesController::class, 'brandList']);
Route::get('/product-details', [ProductDetailController::class, 'getProductDetail']);
Route::get('/product-details/{name}/{id}', [ProductDetailController::class, 'getProductDetail']);
Route::post('/showWeekListA', [ProductDetailController::class, 'showWeekList']);
Route::any('/handleDateSelection', [ProductDetailController::class, 'handleDateSelection']);
Route::post('/addToSubCart', [ProductDetailController::class, 'addToSubCart']);
Route::post('/cateegoriesList', [CategoriesController::class, 'categoryListFooter']);

//Featured categories product list
Route::any('/featured-categories-product-list', [ProductController::class, 'FeaturedProductList']);
Route::any('/featured-categories-product-list/{fid}/{name}', [ProductController::class, 'FeaturedProductList']);
Route::any('/selected-featured-categories-product-list', [ProductController::class, 'fetchFeatureCategoryProducts']);


Route::any('/fetch-sub-category-products', [ProductListController::class, 'fetchSubCategoryProducts']);

//Card Controller...G1
Route::get('/card-details', [CardController::class, 'cardList']);
Route::post('/removeCardAPICall', [CardController::class, 'removeCardAPICall']);
// Route::post('/addCardAPICall', action: [CardController::class, 'addCardAPICall']);
Route::post('/addCardAPICall', [CardController::class, 'addCardAPICall']);
Route::get('/wallet', [CardController::class, 'appInfo']);
Route::get('/cardSuccessCall', [CardController::class, 'cardSuccessCall']);
Route::get('/cardFailureCall', [CardController::class, 'cardFailureCall']);

//Banner Controller...G1
Route::get('/banner-product-list/{name}', [BannersController::class, 'productList'])->name('bannerName');
Route::post('/addRemoveWishlist', [BannersController::class, 'addRemoveWishlist']);
Route::get('/offers', [BannersController::class, 'offers']);

//Subscription Order Controller...G1
Route::get('/subscription-orders', [SubscriptionOrderController::class, 'subscriptionOrderList']);
Route::get('/subscription-order-product', [SubscriptionOrderController::class, 'subscriptionOrderProductList']);
Route::get('/subscription-order-info', [SubscriptionOrderController::class, 'subscriptionOrderProductDetail']);
Route::post('/cancelOrderReasonsList', [SubscriptionOrderController::class, 'cancelOrderReasonsList']);
Route::post('/cancelOrderAPICall', [SubscriptionOrderController::class, 'cancelOrderAPICall']);
Route::post('/buyAgainAPICall', [SubscriptionOrderController::class, 'buyAgainAPICall']);
Route::post('/changeCardAPICall', [SubscriptionOrderController::class, 'changeCardAPICall']);
Route::post('/showResumeOrderDate', [SubscriptionOrderController::class, 'showResumeOrderDatelistAPICall']);
Route::post('/resumePauseOrder', [SubscriptionOrderController::class, 'resumePauseOrderAPICall'])->name('resumePauseOrder');
Route::post('/pauseOrderDate', [SubscriptionOrderController::class, 'pauseOrderDateAPICall'])->name('pauseOrderDateAPICall');
Route::get('/generate_invoce', [SubscriptionOrderController::class, 'generate_invoce']);

//Daily Order Controller...G1
Route::get('/my-orders', [DailyOrderController::class, 'dailyOrderList']);
Route::get('/daily-order-details', [DailyOrderController::class, 'dailyOrderDetailsList']);


//Profile controller...G1
Route::get('/terms-conditions', [ProfileController::class, 'getTermsCondition']);
Route::get('/profile', [ProfileController::class, 'getUserProfile']);
Route::post('/update-profile', [ProfileController::class, 'updateUserProfile'])->name('update-profile');
Route::post('/sendOtp', [ProfileController::class, 'sendOtp'])->name('sendOtp');
Route::post('/verifyotpsubmit', [ProfileController::class, 'verifyotpsubmit'])->name('verifyotpsubmit');
Route::get('/faq', [ProfileController::class, 'getFaq']);
Route::get('/help', [ProfileController::class, 'getHelp']);
Route::get('/careers', [ProfileController::class, 'careers']);
Route::get('/blog', [ProfileController::class, 'blog']);
Route::get('/mobile', [ProfileController::class, 'mobile']);
Route::get('/about', [ProfileController::class, 'about']);

//Address controller...G1
Route::get('/address-list', [AddressController::class, 'showAddressList'])->name('address.list');
Route::post('/deleteAddressAPICall', [AddressController::class, 'deleteAddressAPICall']);
// Get Map  ---Aniket
Route::get('/google-map', [AddressController::class, 'getmap']);
Route::get('/add-address', [AddressController::class, 'Address']);
Route::post('/get-address', [AddressController::class, 'addaddress'])->name('get-address');
Route::post('/edit-address', [AddressController::class, 'editAddress'])->name('update-address');

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
Route::get('/success', [CartController::class, 'dailyOrderSuccess']);
Route::get('/failure', [CartController::class, 'dailyOrderFailure']);
Route::get('/loading', [CartController::class, 'loaderPage']);

Route::post('/update-cart', [CartController::class, 'updateCart']);
Route::post('/update-subcart', [CartController::class, 'updateSubCart']);
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
Route::post('/check-login-location-range', [AuthController::class, 'checkLoginLocationRange'])->name('checkLoginLocationRange');
Route::get('/delivery-eta', [DeliveryEtaController::class, 'show'])->name('deliveryEta');
Route::post('/join-waitlist', [AuthController::class, 'joinWaitlist'])->name('joinWaitlist');
Route::post('/resend-otp', [AuthController::class, 'resend_otp']);
Route::post('/logout', [AuthController::class,'userLogout'])->name('userLogout');
Route::post('/userDeactivateSubmit', [AuthController::class,'userDeactivateSubmit'])->name('userDeactivateSubmit');

Route::get('/repeat-orders', [RepeatOrderController::class, 'ProductList']);

//RateReview Controller...G1
Route::get('/rating-reviews', [RateReviewController::class, 'getReviewProductList']);
Route::post('/reviewAddedByOrder', [RateReviewController::class, 'reviewAddedByOrderAPICall']);
Route::post('/reviewAddedByProduct', [RateReviewController::class, 'ratingReviewAddedByProduct']);
Route::get('/rating-list', [RateReviewController::class, 'getRatingReviewListAPICall']);

Route::get('/dashboardScreen', [HomeController::class, 'seoCallForIndex']);
Route::post('/search-autosuggest-products', [ProductController::class, 'searchProductsName']);
