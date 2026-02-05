@include('header')
<section class="rating_review_section">
    <div class="container-fluid">
        <div class="sidemenu_mainBox">
            <div class="sidemenu_menu_mainBox">
                <aside id="sidebar" class="sidebar break-point-sm has-bg-image">
                    <nav class="menu open-current-submenu">
                        <div id="side-menu">
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="{{ENV('APP_URL')}}profile" class="sub-menu-list-link">Profile</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="{{ENV('APP_URL')}}my-order" class="sub-menu-list-link">My Order</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="{{ENV('APP_URL')}}address-list" class="sub-menu-list-link">My Address</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="{{ENV('APP_URL')}}coupon" class="sub-menu-list-link">My Offers</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="{{ENV('APP_URL')}}notification" class="sub-menu-list-link">Notification</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list dropdown" data-bs-toggle="collapse" data-bs-target="#account" aria-expanded="false" aria-controls="account">Payment Details</div>
                                <div class="collapse" id="account" data-bs-parent="#side-menu">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal small">
                                        <li><a href="{{ENV('APP_URL')}}wallet" class="sub-inner-links">Wallet</a></li>
                                        <li><a href="{{ENV('APP_URL')}}card-details" class="sub-inner-links">Card Details</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list dropdown" data-bs-toggle="collapse" data-bs-target="#shopping" aria-expanded="false" aria-controls="shopping">My Shopping</div>
                                <div class="collapse" id="shopping" data-bs-parent="#side-menu">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal small">
                                        <li><a href="{{ENV('APP_URL')}}wishlist" class="sub-inner-links">Wishlist</a></li>
                                        <li><a href="{{ENV('APP_URL')}}notify" class="sub-inner-links">Notify Me</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="{{ENV('APP_URL')}}help" class="sub-menu-list-link">Get Help</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="{{ENV('APP_URL')}}faq" class="sub-menu-list-link">FAQ's</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="javascript(0)" data-bs-toggle="modal" data-bs-target="#logout" class="sub-menu-list-link">Logout</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </aside>
            </div>
            <div class="rating_review_mainbox">
                <h5 class="heading-design-h5">Contact Us</h5>
                <div class="contentData">
                    <div class="contact_data">Any queries, please reach out to us:</div>
                    <div class="form_links d-flex align-items-center">
                        <img src="{{asset('assets/images/contact_call.png')}}" alt="Call">
                        <a href="tel:+97142390322">971 42390322</a>
                    </div>
                    <div class="form_links d-flex align-items-center">
                        <img src="{{asset('assets/images/contact_mail.png')}}" alt="Email">
                        <a
                            href="mailto:customersupport@quickart.ae">customersupport@quickart.ae</a>

                    </div>
                    <div class="form_links d-flex align-items-center">
                        <img src="{{asset('assets/images/contact-whatsapp.png')}}"
                            alt="Whatsapp">
                        <a href="//api.whatsapp.com/send?phone=97142390322&text=Wel-Come">Chat
                            with us</a>
                    </div>
                    <div class="form_links d-flex align-items-center">
                        Follow us on:</a>
                    </div>
                    <div class="form_links d-flex align-items-center">
                        <a href="https://www.facebook.com/QuicKart.uae/" target="_blank">
                            <img src="{{asset('assets/images/facebook.svg')}}" alt="Facebook">
                        </a> 
                        <a href="https://twitter.com/Quickartuae/" target="_blank">
                            <img src="{{asset('assets/images/twitter.svg')}}" alt="Twitter">
                        </a>
                        <a href="https://www.instagram.com/accounts/login/?next=/quickartuae/" target="_blank">
                            <img src="{{asset('assets/images/instagram.svg')}}" alt="Instagram">
                        </a>
                        <a href="https://www.linkedin.com/company/quickart-general-trading-llc/" target="_blank">
                            <img src="{{asset('assets/images/linkedin.svg')}}" alt="Linkedin">
                        </a>
                        <a href="https://www.tiktok.com/@quickartuae?_t=8p59LunNyCH&_r=1" target="_blank">
                            <img src="{{asset('assets/images/contact-tiktok.png')}}"
                                alt="Tiktok" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('footer')