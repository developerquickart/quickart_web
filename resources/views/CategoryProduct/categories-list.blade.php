@include('header')
<!-- cart section start -->
<section class="cart_section section-padding">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Grocery & Staples</h5>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart_tabbing_mainBox">
                            <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="categories1" data-bs-toggle="pill"
                                        data-bs-target="#categories_box1" type="button" role="tab"
                                        aria-controls="categories_box1" aria-selected="true">
                                        <div class="categories_list_box text-center">
                                            <div class="categories_list_img">
                                                <img src="{{asset('assets/images/categories1.png')}}" alt="categories">
                                            </div>
                                            <div class="categories_list_text">Rice & Cereals</div>
                                        </div>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="categories2" data-bs-toggle="pill"
                                        data-bs-target="#categories_box2" type="button" role="tab"
                                        aria-controls="categories_box2" aria-selected="false">
                                        <div class="categories_list_box text-center">
                                            <div class="categories_list_img">
                                                <img src="{{asset('assets/images/categories2.png')}}" alt="categories">
                                            </div>
                                            <div class="categories_list_text">Organic & Healthy</div>
                                        </div>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="categories3" data-bs-toggle="pill"
                                        data-bs-target="#categories_box3" type="button" role="tab"
                                        aria-controls="categories_box3" aria-selected="false">
                                        <div class="categories_list_box text-center">
                                            <div class="categories_list_img">
                                                <img src="{{asset('assets/images/categories3.png')}}" alt="categories">
                                            </div>
                                            <div class="categories_list_text">Atta & Other Flours</div>
                                        </div>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="categories4" data-bs-toggle="pill"
                                        data-bs-target="#categories_box4" type="button" role="tab"
                                        aria-controls="categories_box4" aria-selected="false">
                                        <div class="categories_list_box text-center">
                                            <div class="categories_list_img">
                                                <img src="{{asset('assets/images/categories2.png')}}" alt="categories">
                                            </div>
                                            <div class="categories_list_text">Atta & Other Flours</div>
                                        </div>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="categories5" data-bs-toggle="pill"
                                        data-bs-target="#categories_box5" type="button" role="tab"
                                        aria-controls="categories_box5" aria-selected="false">
                                        <div class="categories_list_box text-center">
                                            <div class="categories_list_img">
                                                <img src="{{asset('assets/images/categories1.png')}}" alt="categories">
                                            </div>
                                            <div class="categories_list_text">Atta & Other Flours</div>
                                        </div>
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="categories_box1" role="tabpanel"
                                    aria-labelledby="categories1">
                                    <div class="row no-gutters">

                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product2.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product1.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product3.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product5.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product1.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product4.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product2.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="categories_box2" role="tabpanel"
                                    aria-labelledby="categories2">
                                    <div class="row no-gutters">

                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product4.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product5.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product2.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product1.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="categories_box3" role="tabpanel"
                                    aria-labelledby="categories3">
                                    <div class="row no-gutters">
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/notification.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product1.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product2.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product4.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product5.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product2.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product3.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="categories_box4" role="tabpanel"
                                    aria-labelledby="categories4">
                                    <div class="row no-gutters">
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/notification.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product1.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product2.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product3.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product4.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product5.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="categories_box5" role="tabpanel"
                                    aria-labelledby="categories5">
                                    <div class="row no-gutters">
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product1.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product3.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product5.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product1.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product4.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="product_top_left">
                                                        <div class="discount_text">50% <span>Off</span></div>
                                                        <div class="country_flag">
                                                            <img src="{{asset('assets/images/flag_img.png')}}"
                                                                alt="flag">
                                                        </div>
                                                    </div>
                                                    <div class="product_top_right">
                                                        <div class="product_wishlist">
                                                            <a href="">
                                                                <img src="{{asset('assets/images/wishlist.png')}}"
                                                                    alt="wishlist" style="max-width: 25px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ENV('APP_URL')}}product-details">
                                                    <div class="product-img">
                                                        <img class="img-fluid"
                                                            src="{{asset('assets/images/product2.png')}}" alt="Product">
                                                    </div>
                                                    <div class="product-body">
                                                        <div class="product_name">Product Title Here</div>
                                                        <div class="product_weight">Weight: <span>500 gm</span></div>
                                                    </div>
                                                </a>
                                                <div class="product-footer">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED 450.99<br><span
                                                                        class="regular-price">AED
                                                                        800.99</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="cart_btn">
                                                                <button class="add-to-cart-btn">Add</button>
                                                                <div class="qtyBox" id="qtyBox" style="display: none;">
                                                                    <button class="qty-btn qty-btn-minus"
                                                                        type="button">-</button>
                                                                    <input type="text" name="qty" value="0"
                                                                        class="input-qty input-rounded">
                                                                    <button class="qty-btn qty-btn-plus"
                                                                        type="button">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subscribe_text">Subscribe & Save 5%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- cart section end -->


<!-- TABBING SCRIPT START -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    function openCity(evt, cityName) {
        var tabcontent = document.getElementsByClassName("tabcontent");
        for (var i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        var tablinks = document.getElementsByClassName("tablinks");
        for (var i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("active");
        }
        document.getElementById(cityName).style.display = "block";
        if (evt) {
            evt.currentTarget.classList.add("active");
        }
    }
});
</script>

<!-- TABBING SCRIPT END -->

@include('footer')