<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    
   
    <meta property="og:title" content="{{ $data_arr['title'] ?? 'QuicKart - Fresh Farm-to-Door Delivery' }}" />
    <meta property="og:description" content="{{ $data_arr['description'] ?? 'Get fresh milk, premium dairy, fruits, vegetables, and daily essentials delivered to your doorstep with QuicKart' }}" />
    <meta property="og:image" content="{{ $data_arr['image'] ?? 'https://quickart2.democheck.in/quickart_web/assets/images/QuicKart_New_Final.png' }}" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <!--<meta property="og:url" content="{{ $data_arr['url'] ?? 'https://quickart2.democheck.in/quickart_web/' }}" />-->
    <meta property="og:type" content="{{ $data_arr['type'] ?? 'website' }}" />
    
	
	
    
    <!-- Favicon Icon -->
    <link rel="icon" type="{{asset('assets/images/favicon.ico')}}" href="{{asset('assets/images/favicon.ico')}}">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Material Design Icons -->
    <link href="{{asset('assets/vendor/icons/css/materialdesignicons.min.css')}}" media="all" rel="stylesheet"
        type="text/css" />
    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- FANCY BOX SCRIPT  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">

    <!-- COUNTRY-CODE-SCRIPT-START -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <!-- COUNTRY-CODE-SCRIPT-END -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="2qG49yvooIbKV2bQ623tBRZoxKxgcA9kJTd678BSLP8" />

    <script>
    function checkStickyCondition() {
        var header = document.querySelector("header");
        if (!header) {
            return;
        }
        var isMobile = window.matchMedia("(max-width: 991px)").matches;
        if (isMobile) {
            // Keep header stable on mobile across all pages.
            header.classList.add("sticky");
            document.documentElement.style.setProperty('--qk-mobile-header-height', header.offsetHeight + 'px');
            return;
        }
        document.documentElement.style.setProperty('--qk-mobile-header-height', '0px');
        if (window.pageYOffset > 0) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
    window.addEventListener('scroll', checkStickyCondition);
    window.addEventListener('resize', checkStickyCondition);
    window.addEventListener('load', checkStickyCondition);
    // window.addEventListener('pageshow', function (event) {
    //     if (event.persisted || window.performance.getEntriesByType("navigation")[0].type === 'back_forward') {
    //         window.location.reload();
    //     }
    // });
    </script>

    <script>
    // window.onscroll = function() {
    //     var header = document.querySelector("header");
    //     if (window.pageYOffset > 0) {
    //         header.classList.add("sticky");
    //     } else {
    //         header.classList.remove("sticky");
    //     }
    // };
    
    // window.addEventListener('pageshow', function (event) {
    //     if (event.persisted || window.performance.getEntriesByType("navigation")[0].type === 'back_forward') {
    //         window.location.reload();
    //     }
    // });
    </script>
    <script>
    (function () {
        if (typeof window === 'undefined') return;

        function getCsrfToken() {
            var meta = document.querySelector('meta[name="csrf-token"]');
            return meta ? meta.getAttribute('content') : '';
        }

        function handleCsrfMismatch() {
            var key = 'qk_csrf_reload_once';
            if (sessionStorage.getItem(key) === '1') {
                sessionStorage.removeItem(key);
                return;
            }
            sessionStorage.setItem(key, '1');
            window.location.reload();
        }

        document.addEventListener('DOMContentLoaded', function () {
            if (typeof jQuery === 'undefined') return;

            // Always attach current CSRF token header for all jQuery AJAX requests.
            jQuery.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': getCsrfToken()
                }
            });

            // Auto-recover stale-token AJAX requests after idle/restore.
            jQuery(document).ajaxError(function (_event, xhr) {
                if (xhr && xhr.status === 419) {
                    handleCsrfMismatch();
                }
            });
        });
    })();
    </script>
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-256458028-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-256458028-1');
    </script>
<!-- Google tag (gtag.js) START-->
    <!--<script async src="https://www.googletagmanager.com/gtag/js?id=G-PY3NQWFYR1"></script>-->
    <!--<script>-->
    <!--    window.dataLayer = window.dataLayer || [];-->
    <!--    function gtag() {-->
    <!--        dataLayer.push(arguments);-->
    <!--    }-->
    <!--    gtag('js', new Date());-->
    <!--    gtag('config', 'G-PY3NQWFYR1');-->
    <!--</script>-->
    <!-- Google tag (gtag.js) END-->
    <script type="application/ld+json">
    {
    "@context": "https://schema.org/",
    "@type": "WebSite",
    "name": "Quickart",
    "url": "https://www.quickart.ae/",
    "potentialAction": {
    "@type": "SearchAction",
    "target": "{search_term_string}",
    "query-input": "required name=search_term_string"
    }
    }
    </script>
    
     <!-- Added by GA4 by ... G1 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YRNMV9TMD8"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){ dataLayer.push(arguments); }
    gtag('js', new Date());

    //gtag('config', 'G-YRNMV9TMD8'); 
    gtag('config', 'G-YRNMV9TMD8', {
        send_page_view: true
    });
    </script>
    
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '722097952778496');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=722097952778496&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
       <?php //if (!empty($pixelEventScript)) echo $pixelEventScript; ?>
    {{-- Login location step: inline critical CSS so it always wins over cache / Bootstrap reboot --}}
    <style id="login-location-critical-css">
        #login .login-location-step { max-width: 420px; margin: 0 auto; padding: 0 4px 8px; }
        #login .login-location-hero { text-align: center; margin-bottom: 1.25rem; }
        #login .login-location-hero-badge {
            display: inline-flex; align-items: center; justify-content: center;
            width: 48px; height: 48px; margin: 0 auto 0.75rem; border-radius: 14px;
            background: linear-gradient(145deg, rgba(255, 222, 52, 0.35), rgba(255, 222, 52, 0.08));
            color: var(--indigo-color, #1a237e); box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
        }
        #login .login-location-title { font-weight: 700; color: var(--indigo-color, #1a237e); line-height: 1.3; }
        #login .login-location-sub {
            font-size: 14px; line-height: 1.5; color: #5c5c6b; max-width: 340px; margin-left: auto; margin-right: auto;
        }
        #login .login-location-actions {
            display: grid; grid-template-columns: 1fr; gap: 12px; margin-bottom: 0.5rem;
        }
        @media (min-width: 480px) {
            #login .login-location-actions { grid-template-columns: 1fr 1fr; gap: 10px; }
        }
        #login button.login-location-option {
            display: flex !important; align-items: flex-start; gap: 12px; width: 100%; text-align: left;
            padding: 14px 16px !important; border-radius: 14px !important;
            border: 2px solid #e8e8ed !important; background: #fafafb !important;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06) !important;
            cursor: pointer; font-family: inherit !important; -webkit-appearance: none !important; appearance: none !important;
            color: inherit !important;
        }
        #login button.login-location-option--primary {
            border-color: rgba(255, 222, 52, 0.85) !important;
            background: linear-gradient(180deg, #fffef8 0%, #fff 100%) !important;
        }
        #login button.login-location-option:hover {
            transform: translateY(-1px); box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1) !important;
        }
        #login button.login-location-option:focus { outline: none !important; box-shadow: 0 0 0 3px rgba(255, 222, 52, 0.45) !important; }
        #login .login-location-option-icon {
            flex-shrink: 0; display: flex; align-items: center; justify-content: center;
            width: 44px; height: 44px; border-radius: 12px;
            background: rgba(255, 222, 52, 0.25); color: var(--indigo-color, #1a237e);
        }
        #login .login-location-option--outline .login-location-option-icon { background: #eef0f4 !important; }
        #login .login-location-option-title { font-weight: 700; font-size: 15px; color: var(--indigo-color, #1a237e); display: block; }
        #login .login-location-option-desc { font-size: 12px; color: #6b6b78; display: block; line-height: 1.35; }
        #login .login-location-map-panel {
            margin-top: 1.25rem; padding: 16px; border-radius: 16px;
            background: linear-gradient(180deg, #f8f9fc 0%, #fff 40%);
            border: 1px solid #e8eaf0 !important; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }
        #login .login-location-search-label { display: block; font-size: 13px; font-weight: 600; color: var(--indigo-color, #1a237e); margin-bottom: 8px; }
        #login .login-location-search-wrap { position: relative; margin-bottom: 12px; }
        #login .login-location-search-icon { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #8b8b98; pointer-events: none; z-index: 1; }
        #login .login-location-search-input.form-control {
            padding: 12px 14px 12px 44px !important; border-radius: 12px !important;
            border: 1px solid #d8dbe6 !important; font-size: 14px; background: #fff !important;
        }
        #login .login-location-search-clear {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 24px;
            height: 24px;
            border: 0;
            border-radius: 50%;
            background: #eef1f6;
            color: #5f6678;
            display: none;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            line-height: 1;
            padding: 0;
            cursor: pointer;
            z-index: 2;
        }
        #login .login-location-search-clear.qk-visible { display: inline-flex; }
        #login .login-location-map-canvas { height: 260px; width: 100%; border-radius: 12px; overflow: hidden; border: 1px solid #e0e3eb; margin-bottom: 14px; }
        #login .login-location-confirm-btn { width: 100%; padding: 12px 20px !important; font-size: 15px; border-radius: 12px !important; font-weight: 700; }
        #login .login-waitlist-card { margin-top: 1.25rem; border: none !important; background: transparent !important; padding: 0 !important; }
        #login .login-waitlist-card-inner {
            padding: 20px 18px 22px; text-align: center; border-radius: 16px;
            background: linear-gradient(160deg, #fff8e8 0%, #fff4dc 35%, #fff 100%);
            border: 1px solid #f0d9a8 !important; box-shadow: 0 8px 28px rgba(200, 150, 60, 0.12);
        }
        #login .login-waitlist-visual {
            display: inline-flex; align-items: center; justify-content: center; width: 56px; height: 56px;
            margin: 0 auto 12px; border-radius: 50%; background: #fff; color: #c48a1a;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }
        #login .login-waitlist-message { font-size: 14px; line-height: 1.55; color: #4a4035; margin-bottom: 16px; max-width: 320px; margin-left: auto; margin-right: auto; }
        #login .login-waitlist-btn { min-width: 200px; padding: 12px 28px !important; border-radius: 12px !important; font-weight: 700; }
        #login button.login-location-back {
            background: none !important; border: none !important; padding: 8px 12px !important;
            font-size: 14px; font-weight: 600; color: #6b6b78 !important; text-decoration: underline;
            cursor: pointer; -webkit-appearance: none !important; appearance: none !important;
        }
        #login button.login-location-back:hover { color: var(--indigo-color, #1a237e) !important; }
        .pac-container { z-index: 20000 !important; }
        /* Separate delivery top strip for logged-in users */
        .qk-loggedin-menu .container-fluid {
            max-width: 100% !important;
            width: 100% !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        .osahan-menu.qk-loggedin-menu {
            margin-bottom: 0 !important;
        }
        .qk-delivery-topstrip {
            margin: 0;
            padding: 10px 12px 18px;
            background: #2E317E;
            box-shadow: 0 10px 26px rgba(46, 49, 126, 0.35);
        }
        .qk-delivery-eta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            width: 100%;
            padding: 10px 12px;
            border-radius: 14px;
            background: linear-gradient(135deg, #2E317E 0%, #3a3ea1 60%, #282b70 100%);
            box-shadow: 0 12px 26px rgba(30, 33, 94, 0.4);
            color: #fff;
            font-family: inherit;
            /* So address max-width can be exactly half of this strip */
            container-type: inline-size;
            container-name: qk-delivery-eta;
        }
        .qk-delivery-eta__glow {
            display: none;
        }
        .qk-delivery-eta__left {
            display: flex;
            align-items: center;
            gap: 10px;
            flex: 1;
            min-width: 0;
        }
        .qk-delivery-eta__label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.3px;
            text-transform: uppercase;
            opacity: 0.88;
            line-height: 1.2;
        }
        .qk-delivery-eta__time {
            display: block;
            font-size: 28px;
            font-weight: 800;
            line-height: 1;
            letter-spacing: -0.02em;
            color: #fff;
            text-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
        }
        .qk-delivery-eta__headline {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 2px;
            min-width: 0;
        }
        .qk-delivery-eta__distance-tag {
            display: none;
            align-items: center;
            justify-content: center;
            padding: 2px 7px;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.35);
            background: rgba(255, 255, 255, 0.18);
            color: #ffd54f;
            font-size: 11px;
            font-weight: 700;
            line-height: 1.1;
            white-space: nowrap;
            flex-shrink: 0;
        }
        .qk-delivery-eta__body {
            display: flex;
            flex-direction: column;
            flex: 1;
            min-width: 0;
            align-self: stretch;
        }
        .qk-delivery-eta__meta {
            display: flex;
            align-items: center;
            margin-top: 2px;
            font-size: 12px;
            line-height: 1.35;
            color: #f3f3f3;
            opacity: 0.92;
            min-width: 0;
            gap: 8px;
        }
        /* Location row: label + chevron share one control — both open change-location modal (ETA block stays separate link to home). */
        .qk-delivery-eta__meta .qk-delivery-eta__location-row-btn {
            appearance: none;
            -webkit-appearance: none;
            background: transparent;
            border: none;
            padding: 0;
            margin: 0;
            font: inherit;
            color: inherit;
            cursor: pointer;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 8px;
            width: 100%;
            min-width: 0;
            outline: none;
        }
        .qk-delivery-eta__meta .qk-delivery-eta__location-row-btn:hover .qk-delivery-eta__location {
            text-decoration: underline;
            text-underline-offset: 2px;
        }
        .qk-delivery-eta__meta .qk-delivery-eta__location-row-btn:focus-visible {
            border-radius: 8px;
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.45);
        }
        .qk-delivery-eta__distance-text {
            display: none;
        }
        .qk-delivery-eta__location {
            display: block;
            flex: 0 1 auto;
            min-width: 0;
            color: #ffffff;
            opacity: 0.9;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            /* Half of the delivery strip width (see .qk-delivery-eta container) */
            max-width: 50%;
        }
        @supports (max-width: 50cqw) {
            .qk-delivery-eta__location {
                max-width: 50cqw;
            }
        }
        .qk-delivery-eta__location-row-btn .qk-delivery-eta__location {
            flex: 1 1 auto;
            min-width: 0;
        }
        .qk-location-switch-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.55);
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            padding: 0;
            cursor: pointer;
            flex-shrink: 0;
        }
        .qk-location-switch-btn svg {
            display: block;
            width: 16px;
            height: 16px;
        }
        .qk-location-switch-sheet .modal-dialog {
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
            margin: 0;
            width: 100%;
            max-width: 100%;
            transform: translateY(100%);
            transition: transform .22s ease-out;
        }
        .qk-location-switch-sheet.show .modal-dialog { transform: translateY(0); }
        .qk-location-switch-sheet .modal-content {
            border: 0;
            border-radius: 18px 18px 0 0;
            max-height: 85vh;
            overflow-y: auto;
            overscroll-behavior: contain;
            touch-action: pan-y;
        }
        .qk-location-switch-close {
            border: 0;
            background: transparent;
            color: #1a237e;
            font-size: 24px;
            line-height: 1;
            padding: 0 2px;
            cursor: pointer;
        }
        .qk-location-switch-body {
            padding: 14px;
            /* Extra room below primary CTA — avoids home indicator / rounded corners clipping the button */
            padding-bottom: calc(36px + env(safe-area-inset-bottom, 0px));
        }
        .qk-header-location-actions { margin-bottom: 10px; }
        .qk-header-current-location-card {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            border: 1px solid #e4e8ef;
            border-radius: 12px;
            background: #fff;
            padding: 10px 12px;
            color: #1a237e;
        }
        .qk-header-current-location-card:hover { background: #f8fbff; }
        .qk-header-current-location-left { display: flex; align-items: flex-start; gap: 10px; min-width: 0; }
        .qk-header-current-location-icon {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: #e9f7ec;
            color: #1f8f3a;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-top: 1px;
        }
        .qk-header-current-location-title {
            display: block;
            font-size: 16px;
            font-weight: 700;
            color: #2a8e3a;
            line-height: 1.1;
            text-align: left;
        }
        .qk-header-current-location-sub {
            display: block;
            margin-top: 2px;
            font-size: 12px;
            color: #6f7484;
            line-height: 1.25;
            text-align: left;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
        }
        .qk-header-current-location-arrow {
            color: #8b91a4;
            flex-shrink: 0;
        }
        .qk-header-add-address-btn {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            border: 1px solid #e4e8ef;
            border-radius: 12px;
            background: #fff;
            padding: 10px 12px;
            color: #1a237e;
            margin-top: 8px;
            text-decoration: none;
        }
        .qk-header-add-address-btn:hover { text-decoration: none; color: #1a237e; background: #fafcff; }
        .qk-header-add-address-left { display: flex; align-items: center; gap: 10px; }
        .qk-header-add-address-plus {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: #eef2ff;
            color: #2e317e;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            line-height: 1;
            flex-shrink: 0;
        }
        .qk-header-add-address-text { font-size: 16px; font-weight: 700; color: #2e317e; }
        .qk-header-pick-map-btn {
            width: 100%;
            margin-top: 10px;
            padding: 10px 14px;
            border: 1px dashed #2e317e;
            border-radius: 12px;
            background: #f6f7ff;
            color: #2e317e;
            font-weight: 600;
            font-size: 14px;
            text-align: left;
        }
        .qk-header-location-search-wrap {
            position: relative;
            z-index: 2;
        }
        .qk-header-location-search {
            padding-right: 34px;
        }
        .qk-header-search-clear {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 22px;
            height: 22px;
            border: 0;
            border-radius: 50%;
            background: #eef1f6;
            color: #5f6678;
            display: none;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            line-height: 1;
            padding: 0;
            cursor: pointer;
        }
        .qk-header-search-clear.qk-visible { display: inline-flex; }
        .qk-header-map-wrap {
            position: relative;
            margin-top: 8px;
        }
        .qk-header-map-wrap .qk-header-location-search-wrap {
            position: absolute;
            left: 10px;
            right: 10px;
            top: 10px;
        }
        .qk-header-map-wrap .qk-header-location-search {
            background: #fff;
            border: 1px solid #e4e8ef;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
        }
        .qk-header-map {
            height: 220px;
            border-radius: 12px;
            border: 1px solid #e3e6ef;
            margin-top: 0;
        }
        .qk-header-address-list {
            margin-top: 12px;
            max-height: 210px;
            overflow-y: auto;
            border: 1px solid #eceef3;
            border-radius: 10px;
            background: #fafbff;
        }
        .qk-header-address-item {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            padding: 10px 12px;
            border-bottom: 1px solid #eceef3;
            cursor: pointer;
        }
        .qk-header-address-item:last-child { border-bottom: none; }
        .qk-header-address-item input { margin-top: 4px; }
        .qk-header-address-item strong { display: block; font-size: 13px; color: #1a237e; }
        .qk-header-address-item span { display: block; font-size: 12px; color: #666; }
        .login-saved-addresses-section {
            margin-top: 1rem;
        }
        .login-saved-addresses-heading {
            font-size: 13px;
            font-weight: 600;
            color: #1a237e;
            margin-bottom: 8px;
            text-align: center;
        }
        .login-saved-address-list {
            margin-top: 8px;
        }
        button.login-saved-address-btn.qk-header-address-item {
            width: 100%;
            border: none;
            background: transparent;
            font: inherit;
            font-family: inherit;
            margin: 0;
            text-align: left;
        }
        button.login-saved-address-btn.qk-header-address-item:focus-visible {
            outline: 2px solid #1a237e;
            outline-offset: 2px;
        }
        .qk-header-selected-source {
            margin-top: 10px;
            margin-bottom: 2px;
            padding: 8px 10px;
            border-radius: 8px;
            background: #eef2ff;
            color: #1a237e;
            font-size: 12px;
            font-weight: 600;
        }
        @media (max-width: 480px) {
            .qk-header-current-location-title { font-size: 15px; }
        }
        @media (max-width: 767.98px) {
            .feature_section,
            .footer_box {
                display: none !important;
            }
        }
        .qk-delivery-eta__link {
            color: inherit;
            text-decoration: none;
            display: block;
            min-width: 0;
            cursor: pointer;
            flex: 1 1 auto;
            align-self: stretch;
            min-height: 0;
        }
        .qk-delivery-eta__link:hover {
            color: inherit;
            text-decoration: none;
        }
        .qk-delivery-search {
            margin-top: 10px;
            padding: 0 8px;
        }
        .qk-delivery-search .search-wrapBox {
            background: #fff;
            border-radius: 28px;
            padding: 4px;
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.06);
        }
        .qk-delivery-search .search-input {
            border: none !important;
        }
        .qk-delivery-eta__profile {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.24);
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            flex-shrink: 0;
            text-decoration: none;
        }
        .qk-delivery-eta__profile svg { display: block; }
        .qk-store-status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.2px;
            white-space: nowrap;
            border: 1px solid transparent;
            color: #fff;
            flex-shrink: 0;
        }
        .qk-store-status-badge__dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: currentColor;
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.25);
        }
        .qk-store-status-badge--online {
            background: linear-gradient(135deg, #1f9d55 0%, #2ecc71 100%);
            border-color: rgba(255, 255, 255, 0.18);
        }
        .qk-store-status-badge--offline {
            background: linear-gradient(135deg, #6c757d 0%, #8a94a1 100%);
            border-color: rgba(255, 255, 255, 0.18);
        }
        .qk-delivery-eta--offline {
            padding-top: 12px;
            padding-bottom: 12px;
        }
        .qk-delivery-eta__offline-msg {
            flex: 1;
            min-width: 0;
            text-align: center;
            color: #fef7ff;
            line-height: 1.2;
        }
        .qk-delivery-eta__offline-title {
            display: block;
            font-size: 17px;
            font-weight: 800;
            color: #ffd8ea;
            letter-spacing: 0.2px;
        }
        .qk-delivery-eta__offline-sub {
            display: block;
            margin-top: 3px;
            font-size: 13px;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.92);
        }
        .qk-on-the-way-tag {
            position: fixed;
            z-index: 1050;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-sizing: border-box;
            padding: 12px 16px;
            /* Uniform cuboid (rounded rectangle), not a curved “sheet” edge */
            border-radius: 12px;
            background: linear-gradient(135deg, #2e317e 0%, #3a3ea1 100%);
            color: #fff;
            text-decoration: none;
            box-shadow: 0 6px 20px rgba(15, 18, 64, 0.42);
            animation: qkOnTheWayFloat 1.8s ease-in-out infinite;
        }
        .qk-on-the-way-tag:hover {
            color: #fff;
            text-decoration: none;
        }
        .qk-on-the-way-tag.qk-on-the-way-tag--suppressed {
            display: none !important;
        }
        .qk-on-the-way-tag__icon {
            width: 14px;
            height: 14px;
            flex-shrink: 0;
            border-radius: 4px;
            overflow: hidden;
            background: #00e676;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 0 0 rgba(0, 230, 118, 0.65);
            animation: qkOnTheWayPulse 1.8s ease-out infinite;
        }
        .qk-on-the-way-tag__text {
            font-size: 12px;
            font-weight: 700;
            line-height: 1.1;
            letter-spacing: 0.15px;
            white-space: nowrap;
        }
        @keyframes qkOnTheWayFloat {
            0% { transform: translateY(0); }
            50% { transform: translateY(-1px); }
            100% { transform: translateY(0); }
        }
        @keyframes qkOnTheWayPulse {
            0% { box-shadow: 0 0 0 0 rgba(76, 175, 80, 0.55); }
            70% { box-shadow: 0 0 0 9px rgba(76, 175, 80, 0); }
            100% { box-shadow: 0 0 0 0 rgba(76, 175, 80, 0); }
        }
        /* Mobile app-style bottom tab bar (hidden on lg+) */
        @media (max-width: 991.98px) {
            :root {
                /* Content row only (icons + labels); safe-area is added on the bar + in these calcs */
                /* Must match rendered row height (padding + icon + gap + label) for body offset + zapping badge */
                --qk-tabbar-content-h: 62px;
                /* Air between tab bar top and the bottom edge of the zapping badge */
                --qk-on-the-way-gap: 10px;
            }
            body {
                padding-bottom: calc(var(--qk-tabbar-content-h) + env(safe-area-inset-bottom, 0px));
            }
            .qk-mobile-tabbar {
                min-height: calc(var(--qk-tabbar-content-h) + env(safe-area-inset-bottom, 0px));
            }
            .qk-on-the-way-tag {
                left: max(14px, env(safe-area-inset-left, 0px));
                right: max(14px, env(safe-area-inset-right, 0px));
                width: auto;
                margin: 0 auto;
                max-width: 100%;
                /* Tab bar height + safe area + visible gap so the badge reads as a separate cuboid block */
                bottom: calc(
                    var(--qk-tabbar-content-h) +
                    env(safe-area-inset-bottom, 0px) +
                    var(--qk-on-the-way-gap)
                );
                z-index: 1050;
            }
        }
        @media (min-width: 992px) {
            body {
                padding-bottom: 0 !important;
            }
        }
        .qk-mobile-tabbar {
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1040;
            display: flex;
            justify-content: space-around;
            align-items: stretch;
            min-height: 0;
            height: auto;
            padding: 0;
            padding-bottom: env(safe-area-inset-bottom, 0px);
            background: #fff;
            border-top: 1px solid #e8e8ed;
            border-radius: 16px 16px 0 0;
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.06);
            box-sizing: border-box;
        }
        .qk-mobile-tab {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 3px;
            min-width: 0;
            padding: 8px 6px 10px;
            font-size: 12px;
            font-weight: 600;
            line-height: 1.15;
            letter-spacing: 0.02em;
            color: #8b8b98;
            text-decoration: none;
            -webkit-tap-highlight-color: transparent;
        }
        .qk-mobile-tab:hover,
        .qk-mobile-tab:focus-visible {
            color: #5c5c6b;
            text-decoration: none;
        }
        .qk-mobile-tab.is-active {
            color: #1a237e;
        }
        .qk-mobile-tab__icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
        }
        .qk-mobile-tab__icon svg {
            width: 26px;
            height: 26px;
            stroke: currentColor;
            fill: none;
            stroke-width: 1.75;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        .qk-mobile-tab.is-active .qk-mobile-tab__icon svg {
            stroke-width: 2.1;
        }
        @media (min-width: 992px) {
            .qk-mobile-tabbar {
                display: none !important;
            }
        }
        @media print {
            .qk-mobile-tabbar {
                display: none !important;
            }
        }
        /* Sticky cart shortcut (all pages except /cart; same target as side menu My Cart) */
        .qk-sticky-cart-fab {
            position: fixed;
            right: max(14px, env(safe-area-inset-right, 0px));
            top: 80%;
            transform: translateY(-50%);
            z-index: 1230;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: linear-gradient(145deg, #2e317e 0%, #454aad 100%);
            color: #fff;
            text-decoration: none;
            box-shadow: 0 8px 24px rgba(30, 33, 94, 0.4);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .qk-sticky-cart-fab:hover {
            color: #fff;
            text-decoration: none;
            transform: translateY(-50%) scale(1.04);
            box-shadow: 0 10px 28px rgba(30, 33, 94, 0.48);
        }
        .qk-sticky-cart-fab:focus-visible {
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 222, 52, 0.85), 0 8px 24px rgba(30, 33, 94, 0.4);
        }
        .qk-sticky-cart-fab__inner {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
        }
        .qk-sticky-cart-fab__img {
            width: 24px;
            height: 24px;
            object-fit: contain;
            filter: brightness(0) invert(1);
        }
        .qk-sticky-cart-fab__badge {
            position: absolute;
            top: -2px;
            right: -2px;
            min-width: 18px;
            height: 18px;
            padding: 0 5px;
            border-radius: 999px;
            background: #ffde34;
            color: #2e317e;
            font-size: 11px;
            font-weight: 800;
            line-height: 18px;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            pointer-events: none;
        }
        @media (max-width: 991.98px) {
            .qk-sticky-cart-fab {
                touch-action: none;
                -webkit-user-select: none;
                user-select: none;
            }
            .qk-sticky-cart-fab.qk-sticky-cart-fab--placed,
            .qk-sticky-cart-fab.qk-sticky-cart-fab--dragging {
                right: auto !important;
                transform: none;
            }
            .qk-sticky-cart-fab.qk-sticky-cart-fab--dragging {
                transition: none;
                box-shadow: 0 12px 32px rgba(30, 33, 94, 0.5);
            }
            .qk-sticky-cart-fab:hover {
                transform: none;
            }
            .qk-sticky-cart-fab.qk-sticky-cart-fab--placed:active {
                transform: scale(1.04);
            }
        }
        @media (min-width: 992px) {
            .qk-on-the-way-tag {
                left: auto;
                right: max(22px, env(safe-area-inset-right, 0px));
                bottom: max(24px, env(safe-area-inset-bottom, 0px));
                width: max-content;
                max-width: min(420px, calc(100vw - 44px));
                border-radius: 12px;
                padding: 10px 16px;
                box-shadow: 0 8px 24px rgba(30, 33, 94, 0.38);
            }
            .qk-loggedin-menu .main-nav-right {
                display: none !important;
            }
            .qk-loggedin-menu #menu_mainbox {
                position: static;
                width: auto !important;
            }
            .qk-loggedin-menu #menu_mainbox .overlay {
                display: block !important;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                background: rgba(0, 0, 0, 0.45);
                z-index: 1190;
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
            }
            .qk-loggedin-menu #menu_mainbox .login_cartbox {
                display: none;
                position: fixed;
                right: 0;
                top: 0;
                width: 360px;
                height: 100vh;
                overflow-y: auto;
                background: #fff;
                border: 1px solid #e5e7ef;
                border-radius: 0;
                box-shadow: 0 16px 36px rgba(0, 0, 0, 0.2);
                z-index: 1200;
                padding: 14px 10px 10px;
                text-align: left !important;
            }
            .qk-loggedin-menu #menu_mainbox.menu_open .login_cartbox {
                display: block;
            }
            .qk-loggedin-menu #menu_mainbox.menu_open .overlay {
                opacity: 1;
                visibility: visible;
            }
            .qk-loggedin-menu #menu_mainbox .toggle_close_logo {
                display: block;
                position: sticky;
                top: 0;
                text-align: end;
                background: #fff;
                padding: 4px 0;
                z-index: 2;
                cursor: pointer;
            }
            .qk-loggedin-menu #menu_mainbox .toggle_close_logo img {
                width: 20px;
                height: 20px;
            }
            .qk-loggedin-menu #menu_mainbox .mobile_text {
                display: block;
                font-size: 12px;
                color: #6b7280;
                margin-bottom: 6px;
            }
            .qk-loggedin-menu #menu_mainbox .qk-menu-user-meta {
                display: block;
                text-align: left;
                margin: 4px 2px 10px;
                padding-right: 34px;
            }
            .qk-loggedin-menu #menu_mainbox .qk-menu-user-meta__name {
                font-size: 16px;
                font-weight: 700;
                color: #1f2937;
                line-height: 1.2;
            }
            .qk-loggedin-menu #menu_mainbox .qk-menu-user-meta__phone {
                margin-top: 2px;
                font-size: 13px;
                font-weight: 600;
                color: #4b5563;
                line-height: 1.25;
                word-break: break-word;
            }
            .qk-loggedin-menu #menu_mainbox .login_cartbox.text-end .qk-menu-user-meta {
                text-align: left !important;
            }
            .qk-loggedin-menu #menu_mainbox .qk-menu-user-meta__name {
                font-size: 18px;
            }
            .qk-loggedin-menu #menu_mainbox .qk-menu-user-meta__phone {
                font-size: 15px;
            }
            .qk-loggedin-menu #menu_mainbox .main_menu_mobile {
                display: block;
            }
            .qk-loggedin-menu #menu_mainbox .main_menu_mobile .list-inline-item {
                display: block;
                width: 100%;
                margin: 0 !important;
            }
            .qk-loggedin-menu #menu_mainbox .main_menu_mobile .list-inline-item a {
                display: flex;
                align-items: center;
                gap: 8px;
                padding: 8px 2px;
                border-bottom: 1px dashed #d6d9e4;
            }
            .qk-loggedin-menu #menu_mainbox .main_menu_mobile .list-inline-item:last-child a {
                border-bottom: 0;
            }
            .qk-loggedin-menu #menu_mainbox .main_menu_mobile .top_other_icon_img {
                width: 30px;
                height: 30px;
                border-radius: 10px;
                background: #f5f6fb;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 !important;
                flex-shrink: 0;
            }
            .qk-loggedin-menu #menu_mainbox .main_menu_mobile .top_other_icon_heading {
                font-size: 13px;
                color: #1f2937;
                line-height: 1.2;
            }
            .qk-loggedin-menu #menu_mainbox .main_menu_mobile {
                overflow-y: auto;
                max-height: calc(100vh - 80px);
            }
        }
        /* Login/register country quick search — global positioning so clear (×) stays inside the field. */
        .country-code-search {
            margin: 8px 0 10px;
            font-size: 13px;
            padding-right: 34px;
        }
        .country-code-search-wrap {
            position: relative;
        }
        .country-code-search-clear {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            width: 22px;
            height: 22px;
            border: 0;
            border-radius: 50%;
            background: #eef1f6;
            color: #5f6678;
            display: none;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            line-height: 1;
            padding: 0;
            cursor: pointer;
            z-index: 2;
        }
        .country-code-search-clear.qk-visible {
            display: inline-flex;
        }
        .country-search-suggestions {
            position: absolute;
            top: calc(100% - 8px);
            left: 0;
            right: 0;
            z-index: 1000;
            max-height: 180px;
            overflow-y: auto;
            background: #fff;
            border: 1px solid #d7d7d7;
            border-radius: 8px;
            box-shadow: 0 8px 18px rgba(0,0,0,0.12);
            display: none;
        }
        .country-search-suggestion-item {
            padding: 8px 10px;
            font-size: 13px;
            line-height: 1.3;
            cursor: pointer;
        }
        .country-search-suggestion-item:hover {
            background: #f5f7ff;
        }
        /* Large screens: one country UI — flag dropdown only (no extra search inputs). */
        @media (min-width: 992px) {
            #login .country-code-search-wrap,
            #registration .country-code-search-wrap {
                display: none !important;
            }
        }
        /* Hide intl-tel-input's inner country search ("Search country or code") on all screens. */
        #login .iti__search-container,
        #registration .iti__search-container,
        .iti .iti__search-container,
        .iti .iti__search-input {
            display: none !important;
        }
        @media (max-width: 991px) {
            .main-wrapper {
                padding-top: var(--qk-mobile-header-height, 0px);
            }
            body.qk-home-page .main-wrapper {
                padding-top: calc(var(--qk-mobile-header-height, 0px) + 8px);
            }
            header,
            header.sticky {
                position: fixed !important;
                top: 0;
                width: 100%;
                z-index: 999;
                animation: none !important;
                transition: none !important;
                transform: none !important;
            }
            .qk-delivery-topstrip {
                margin: 0 -12px 0;
                padding: 7px 10px 12px;
            }
            /* Logged-in mobile header uses top strip; collapse legacy header row to remove white gap. */
            .qk-loggedin-menu .headerBox {
                padding: 0 !important;
                margin: 0 !important;
                min-height: 0 !important;
                height: 0 !important;
                overflow: visible !important;
            }
            .qk-loggedin-menu .header_icons_box {
                min-height: 0 !important;
                height: 0 !important;
                margin: 0 !important;
                padding: 0 !important;
                overflow: visible !important;
            }
            .qk-delivery-search {
                margin-top: 8px;
                padding: 0 6px;
            }
            #menu_mainbox .qk-menu-user-meta {
                margin: 10px 12px 8px;
                padding-right: 44px; /* keep clear of close icon */
                text-align: left !important;
            }
            #menu_mainbox .qk-menu-user-meta__name {
                font-size: 15px !important;
                line-height: 1.2;
            }
            #menu_mainbox .qk-menu-user-meta__phone {
                font-size: 13px !important;
                line-height: 1.3;
            }
            .qk-delivery-eta__time { font-size: 24px; }
        }
    </style>
    @php
        $qkGuestHomeLoginLock = empty(session('user_id')) && request()->routeIs('index');
    @endphp
    @if($qkGuestHomeLoginLock)
    <style>
        #login.qk-guest-login-locked .btn-close { display: none !important; }
    </style>
    @endif
</head>

<body class="{{ request()->routeIs('index') ? 'qk-home-page' : '' }}"@if($qkGuestHomeLoginLock) data-qk-guest-login-required="1"@endif>
      <!--<script src="https://chat.bot247.live/api/chatbot-script" data-chatbot-id="cb_1749551624924"></script>-->
    <div class="main-wrapper">
    <div class="modal fade @if($qkGuestHomeLoginLock) qk-guest-login-locked @endif" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel"@if($qkGuestHomeLoginLock) data-bs-backdrop="static" data-bs-keyboard="false"@endif>
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="login-modal">
                        @if(!$qkGuestHomeLoginLock)
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
                        @endif
                        <div class="login_box">
                            <div class="login_img_box">
                                <img src="{{asset('assets/images/Fresh_Farm_Delight.png')}}" alt="logo">
                            </div>
                            <div class="login_form_mainbox">
                                <!-- <form> -->
                                    <div class="login-modal-right">
                                        <div class="login_form_box login_step1" >
                                            <div class="login_logobox">
                                                <img src="{{asset('assets/images/QuicKart_logo.png')}}" alt="Logo"
                                                    class="img-fluid">
                                            </div>
                                            <h1 class="heading-design-h5 my-4">
                                                Login / SignUp
                                            </h1>
                                            <form action="" method="POST"
                                                enctype="multipart/form-data" class="login_form_step1">
                                                <!--@csrf-->
                                                <div class="form-group">
                                                    <label for="mobile_code">Mobile Number <span
                                                            class="required_icon">*</span></label>
                                                    <div class="country-code-search-wrap">
                                                        <input type="text" id="country_search_1" class="form-control country-code-search"
                                                            placeholder="Search country (e.g. India / +91)" list="country-search-datalist" autocomplete="off">
                                                        <button type="button" class="country-code-search-clear" data-target="country_search_1" aria-label="Clear country search">&times;</button>
                                                        <div class="country-search-suggestions" id="country_search_1_suggestions"></div>
                                                    </div>
                                                    <input type="text" id="mobile_code" class="form-control mobile_code"  name="number" data-index="1" required >
                                                    <input type="hidden" id="countryCode1" name="country_code" class="country_code">
                                                    <div id="error-msg" class="hide error-msg error"></div>
                                                    <!-- <div id="valid-msg" class="hide valid-msg"></div> -->
                                                    <input type="hidden" id="flagcode1" name="flag_code" class="flag_code">
                                                </div>
                                                <div class="login_submit_box">
                                                    <button type="button" class="submit_btn otp_request">Continue</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="login_form_box login_step2  d-none">
                                            <div class="login_logobox">
                                                <img src="{{asset('assets/images/QuicKart_logo.png')}}" alt="Logo"
                                                    class="img-fluid">
                                            </div>
                                            <div class="heading-design-h5 my-4">Verify your details</div>
                                            <p class="text-center">Your OTP has been sent to <span class="entered_mobile">921 541234566 </span> through SMS or  WhatsApp</p>

                                            <div class="alert alert-danger error-msg d-none"></div>
                                            <div class="alert alert-success success-msg d-none"></div>
                                            <form action="" class="login_form_step2">
                                                <!--@csrf-->

                                                <input type="hidden" name="number" class="number" id="number" />
                                                <input type="hidden" name="country_code" class="country_code" id="country_code" />
                                                <input type="hidden" name="user_email" class="user_email" id="user_email" />
                                                <input type="hidden" name="name" class="name" id="name" />
                                                <input type="hidden" name="referral_code" class="referral_code" id="referral_code" />
                                                <input type="hidden" name="otp" class="otp" id="otp" />
                                                <input type="hidden" name="userid" class="userid" id="userid" />
                                                
                                                <fieldset>
                                                    <div class="otp-input">
                                                        <input type="text" min="0" max="1" maxlength="1" class="form-control otp-value" required id="otp1" oninput="jumpNext(this, 'otp2')" inputmode="numeric">
                                                        <input type="text" min="0" max="1" maxlength="1" class="form-control otp-value" required id="otp2" oninput="jumpNext(this, 'otp3')" inputmode="numeric">
                                                        <input type="text" min="0" max="1" maxlength="1" class="form-control otp-value" required id="otp3" oninput="jumpNext(this, 'otp4')" inputmode="numeric">
                                                        <input type="text" min="0" max="1" maxlength="1" class="form-control otp-value" required id="otp4" inputmode="numeric">
                                                    </div>
                                                   
                                                    <div class="resend-text" id="resendWrapper">
                                                        <span id="otpText">
                                                            Didn't receive OTP?
                                                            <span id="timer">00:30</span>
                                                        </span>
                                                        <a href="javascript:void(0)" id="resendLink"
                                                            style="display:none;" onclick="resendOtp(this)">Resend
                                                            OTP</a>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group my-3 text-center">
                                                    <button type="button" class="submit_btn text-center back_login_btn">Back</button>
                                                    <button type="button" class="submit_btn text-center otp_submit">Verify & Continue</button>
                                                </fieldset>
                                            </form>
                                        </div>
                                        <div class="login_form_box login_step3 d-none">
                                            <div class="login_logobox">
                                                <img src="{{asset('assets/images/QuicKart_logo.png')}}" alt="Logo"
                                                    class="img-fluid">
                                            </div>
                                            <div class="login-location-step">
                                                <div class="login-location-hero">
                                                    <div class="login-location-hero-badge" aria-hidden="true">
                                                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="currentColor"/></svg>
                                                    </div>
                                                    <h2 class="heading-design-h5 login-location-title mb-2">Where should we deliver?</h2>
                                                    <p class="login-location-sub text-center mb-0">Set your area once so we can show the right products, prices, and delivery options for you.</p>
                                                </div>
                                                <div class="login-location-actions">
                                                    <button type="button" class="login-location-option login-location-option--primary use_current_location_btn">
                                                        <span class="login-location-option-icon" aria-hidden="true">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm8.94 3A8.994 8.994 0 0013 3.06V1h-2v2.06A8.994 8.994 0 003.06 11H1v2h2.06A8.994 8.994 0 0011 20.94V23h2v-2.06A8.994 8.994 0 0020.94 13H23v-2h-2.06zM12 19c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7z" fill="currentColor"/></svg>
                                                        </span>
                                                        <span class="login-location-option-body">
                                                            <span class="login-location-option-title">Use current location</span>
                                                            <span class="login-location-option-desc">Fastest — we’ll detect where you are</span>
                                                        </span>
                                                    </button>
                                                    <button type="button" class="login-location-option login-location-option--outline pick_map_location_btn">
                                                        <span class="login-location-option-icon" aria-hidden="true">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM15 19l-6-2.11V5l6 2.11V19z" fill="currentColor"/></svg>
                                                        </span>
                                                        <span class="login-location-option-body">
                                                            <span class="login-location-option-title">Choose on map</span>
                                                            <span class="login-location-option-desc">Search or tap to drop a pin</span>
                                                        </span>
                                                    </button>
                                                </div>
                                                @php
                                                    $loginStep3HasAddresses = ! empty($headerAddressList) && is_array($headerAddressList) && count($headerAddressList) > 0;
                                                @endphp
                                                <div class="login-saved-addresses-section {{ $loginStep3HasAddresses ? '' : 'd-none' }}" id="login-saved-addresses-root">
                                                    <p class="login-saved-addresses-heading mb-0">Or use a saved address</p>
                                                    <div class="qk-header-address-list login-saved-address-list" id="login-saved-address-list-inner">
                                                        @if($loginStep3HasAddresses)
                                                            @foreach($headerAddressList as $hAddress)
                                                                @php
                                                                    $loginAddrLabel = trim(($hAddress['house_no'] ?? '') . ', ' . ($hAddress['society_name'] ?? ''));
                                                                @endphp
                                                                <button type="button"
                                                                    class="qk-header-address-item login-saved-address-btn"
                                                                    data-address-id="{{ $hAddress['address_id'] ?? '' }}"
                                                                    data-house-no="{{ $hAddress['house_no'] ?? '' }}"
                                                                    data-type="{{ $hAddress['type'] ?? 'Address' }}"
                                                                    data-lat="{{ $hAddress['lat'] ?? '' }}"
                                                                    data-lng="{{ $hAddress['lng'] ?? '' }}"
                                                                    data-name="{{ $loginAddrLabel }}">
                                                                    <div>
                                                                        <strong>{{ $hAddress['type'] ?? 'Address' }}</strong>
                                                                        <span>{{ $loginAddrLabel }}</span>
                                                                    </div>
                                                                </button>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="location_picker_map_box login-location-map-panel d-none">
                                                    <label class="login-location-search-label" for="login-location-search">Search your address or landmark</label>
                                                    <div class="login-location-search-wrap">
                                                        <span class="login-location-search-icon" aria-hidden="true">
                                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" fill="currentColor"/></svg>
                                                        </span>
                                                        <input type="text" class="form-control login-location-search-input" id="login-location-search"
                                                            placeholder="e.g. Dubai Marina, building name, street" autocomplete="off">
                                                        <button type="button" class="login-location-search-clear" aria-label="Clear search">&times;</button>
                                                    </div>
                                                    <div id="login-location-map" class="login-location-map-canvas"></div>
                                                    <button type="button" class="submit_btn login-location-confirm-btn confirm_map_location_btn" disabled>
                                                        Confirm this location
                                                    </button>
                                                </div>
                                                <div class="out_of_range_box login-waitlist-card d-none">
                                                    <div class="login-waitlist-card-inner">
                                                        <div class="login-waitlist-visual" aria-hidden="true">
                                                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z" fill="currentColor"/></svg>
                                                        </div>
                                                        <div class="out_of_range_message login-waitlist-message"></div>
                                                        <div class="join_waitlist_cta login-waitlist-cta">
                                                            <button type="button" class="submit_btn join_waitlist_btn login-waitlist-btn">Join the waitlist</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center login-location-back-wrap">
                                                    <button type="button" class="login-location-back back_to_otp_btn">← Back to verification</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="registration" tabindex="-1" role="dialog" aria-labelledby="registrationLabel">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="login-modal">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-bs-label="Close"></button>
                            <div class="login_box">
                                <div class="login_img_box">
                                    <img src="{{asset('assets/images/Fresh_Farm_Delight.png')}}" alt="logo">
                                </div>
                                <div class="login_form_mainbox1">
                                  
                                    <div class="login-modal-right">
                                        <div class="login_form_box">
                                            <div class="login_logobox">
                                                <img src="{{asset('assets/images/QuicKart_logo.png')}}" alt="Logo"
                                                    class="img-fluid">
                                            </div>
                                            <h1 class="heading-design-h5 my-3 text-center">
                                                Registration
                                            </h1>
                                            <div id="errorMessages" style="color: red;"></div>
                                            <form action="" method="POST" enctype="multipart/form-data" class="register_form">
                                                <!--@csrf-->
                                                <div class="form-fields">
                                                    <fieldset class="form-group">
                                                        <label for="name">Name <span
                                                                class="required_icon">*</span></label>
                                                        <input type="text" name="name" id="name"
                                                            class="form-control" placeholder="Full Name" required pattern="[a-zA-Z\s]*">
                                                        <div class="error" id="error-name"></div>    
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <label for="mobile_code">Mobile Number <span
                                                                class="required_icon">*</span></label>
                                                        <div class="country-code-search-wrap">
                                                            <input type="text" id="country_search_2" class="form-control country-code-search"
                                                                placeholder="Search country (e.g. India / +91)" list="country-search-datalist" autocomplete="off">
                                                            <button type="button" class="country-code-search-clear" data-target="country_search_2" aria-label="Clear country search">&times;</button>
                                                            <div class="country-search-suggestions" id="country_search_2_suggestions"></div>
                                                        </div>
                                                        <input type="text" id="mobile_code2" class="form-control mobile_code" name="number" required data-index="2">
                                                        <input type="hidden" id="countryCode2" name="country_code" class="country_code">
                                                        <div id="error-msg1" class="hide error-msg error"></div>
                                                        <div id="valid-msg1" class="hide valid-msg"></div>
                                                        <input type="hidden" id="flagcode2" name="flag_code" class="flagcode">
                                                        <div class="error" id="error-number"></div>    
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <label for="email">Email <span
                                                                class="required_icon">*</span></label>
                                                        <input type="email" name="email" id="email"
                                                            class="form-control" placeholder="Email" required>
                                                        <div class="error" id="error-email"></div>    
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <label for="referral-code">Referral Code (Optional)</label>
                                                        <input type="text" class="form-control" name="referral_code"
                                                            id="referral-code"
                                                            placeholder="Referral Code (Optional)">
                                                    </fieldset>

                                                </div>

                                                <div class="login_submit_box">
                                                      <fieldset class="d-flex gap-2">
                                                        <input type="checkbox" name="accept" id="accept" value="1"
                                                            checked required>
                                                        <label for="accept">I accept the <a
                                                                href="{{ENV('APP_URL')}}terms-conditions">Terms &
                                                                Condition</a>
                                                            & <a href="{{ENV('APP_URL')}}privacy-policy">Privacy
                                                                Policy</a></label>
                                                    </fieldset>
                                                    <div class="error" id="error-accept"></div> 
                                                    <button type="button" class="submit_btn text-center back_register_btn">Back</button>
                                                    <button type="button" class="submit_btn btn_register">Continue</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <datalist id="country-search-datalist"></datalist>
    <header>
        <div class="osahan-menu {{ !empty(session('user_id')) ? 'qk-loggedin-menu' : '' }}">
            <div class="container-fluid">
                @if(!empty(session('user_id')))
                @php
                    $qkStoreIsOnline = false;
                    try {
                        $qkStoreId = trim((string) env('GO_STORE_ID', ''));
                        if ($qkStoreId !== '') {
                            $qkStoreRow = \Illuminate\Support\Facades\DB::table('store')
                                ->where('id', $qkStoreId)
                                ->first(['store_opening_time', 'store_closing_time']);
                            if ($qkStoreRow) {
                                $qkDubaiNow = \Carbon\Carbon::now('Asia/Dubai');
                                $qkOpenText = trim((string) ($qkStoreRow->store_opening_time ?? ''));
                                $qkCloseText = trim((string) ($qkStoreRow->store_closing_time ?? ''));
                                $qkOpen = null;
                                $qkClose = null;
                                if ($qkOpenText !== '') {
                                    $qkOpen = \Carbon\Carbon::createFromFormat('H:i', $qkOpenText, 'Asia/Dubai');
                                }
                                if ($qkCloseText !== '') {
                                    $qkClose = \Carbon\Carbon::createFromFormat('H:i', $qkCloseText, 'Asia/Dubai');
                                }
                                if ($qkOpen && $qkClose) {
                                    $qkOpen = $qkOpen->setDate($qkDubaiNow->year, $qkDubaiNow->month, $qkDubaiNow->day);
                                    $qkClose = $qkClose->setDate($qkDubaiNow->year, $qkDubaiNow->month, $qkDubaiNow->day);
                                    if ($qkClose->lessThanOrEqualTo($qkOpen)) {
                                        $qkClose->addDay();
                                    }
                                    $qkStoreIsOnline = $qkDubaiNow->betweenIncluded($qkOpen, $qkClose);
                                }
                            }
                        }
                    } catch (\Throwable $e) {
                        // Keep default offline state on query/parse error.
                    }
                @endphp
                <div class="qk-delivery-topstrip">
                    <div class="qk-delivery-eta {{ $qkStoreIsOnline ? '' : 'qk-delivery-eta--offline' }}" role="status" aria-live="polite" title="Estimated delivery time" data-delivery-eta-root>
                        @if($qkStoreIsOnline)
                        <span class="qk-delivery-eta__glow" aria-hidden="true"></span>
                        <div class="qk-delivery-eta__left">
                            <div class="qk-delivery-eta__body">
                                <a href="{{ route('index') }}" class="qk-delivery-eta__link">
                                    <span class="qk-delivery-eta__label">Delivery in</span>
                                    <div class="qk-delivery-eta__headline">
                                        <span class="qk-delivery-eta__time" data-delivery-eta-time>…</span>
                                        <span class="qk-delivery-eta__distance-tag" data-delivery-eta-distance>...</span>
                                    </div>
                                </a>
                                <div class="qk-delivery-eta__meta">
                                    <button type="button"
                                        class="qk-delivery-eta__location-row-btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#headerLocationSwitchModal"
                                        aria-label="Change delivery location">
                                        <span class="qk-delivery-eta__location" data-delivery-eta-location>{{ session('delivery_location_name') ?: 'Current location' }}</span>
                                        <span class="qk-location-switch-btn" aria-hidden="true">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="qk-delivery-eta__offline-msg">
                            <span class="qk-delivery-eta__offline-title">Store is currently closed</span>
                            <span class="qk-delivery-eta__offline-sub">Apologies for the inconvenience caused. We'll be back soon</span>
                        </div>
                        @endif
                        <a href="javascript:void(0)"
                           onclick="menu()"
                           class="qk-delivery-eta__profile qk-menu-toggle"
                           aria-label="Open menu">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 12c2.761 0 5-2.462 5-5.5S14.761 1 12 1 7 3.462 7 6.5 9.239 12 12 12zm0 2c-3.866 0-7 2.91-7 6.5 0 .828.672 1.5 1.5 1.5h11c.828 0 1.5-.672 1.5-1.5 0-3.59-3.134-6.5-7-6.5z" fill="currentColor"/>
                            </svg>
                        </a>
                    </div>
                    <div class="qk-delivery-search">
                        <div class="search-wrapper">
                            <div class="search-wrapBox">
                                <input type="text" id="searchInput" placeholder="Search products..." class="search-input form-control" autocomplete="off">
                                <button class="btn search_buttonBox" type="submit" id="searchBtn">
                                    <img src="https://www.quickart.ae/assets/images/search_icon.png" alt="search" class="img-fluid search_icon">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade qk-location-switch-sheet"
                     id="headerLocationSwitchModal"
                     tabindex="-1"
                     aria-hidden="true"
                     data-bs-backdrop="static"
                     data-bs-keyboard="false">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Change delivery location</h5>
                                <button type="button" class="qk-location-switch-close" data-bs-dismiss="modal" aria-label="Close popup">&times;</button>
                            </div>
                            <div class="qk-location-switch-body">
                                <div class="qk-header-location-actions">
                                    <button type="button" class="qk-header-current-location-card qk-header-current-location-btn">
                                        <span class="qk-header-current-location-left">
                                            <span class="qk-header-current-location-icon" aria-hidden="true">
                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 8a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm9 3h-2.07A7.01 7.01 0 0 0 13 5.07V3h-2v2.07A7.01 7.01 0 0 0 5.07 11H3v2h2.07A7.01 7.01 0 0 0 11 18.93V21h2v-2.07A7.01 7.01 0 0 0 18.93 13H21v-2Zm-9 6a5 5 0 1 1 0-10 5 5 0 0 1 0 10Z" fill="currentColor"/>
                                                </svg>
                                            </span>
                                            <span>
                                                <span class="qk-header-current-location-title">Use current location</span>
                                                <span class="qk-header-current-location-sub">Get your exact location automatically</span>
                                            </span>
                                        </span>
                                        <span class="qk-header-current-location-arrow" aria-hidden="true">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                                <a href="{{ url('/add-address?screen_name=add-address') }}" class="qk-header-add-address-btn">
                                    <span class="qk-header-add-address-left">
                                        <span class="qk-header-add-address-plus">+</span>
                                        <span class="qk-header-add-address-text">Add address</span>
                                    </span>
                                    <span class="qk-header-current-location-arrow" aria-hidden="true">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </a>
                                <button type="button" class="qk-header-pick-map-btn">Use map to manually add</button>
                                <div class="qk-header-map-wrap">
                                    <div class="qk-header-location-search-wrap">
                                        <input type="text" class="form-control form-control-sm qk-header-location-search" placeholder="Search location or landmark">
                                        <button type="button" class="qk-header-search-clear" aria-label="Clear search">&times;</button>
                                    </div>
                                    <div id="qk-header-location-map" class="qk-header-map"></div>
                                </div>
                                <div class="qk-header-selected-source">
                                    Selected source: <span class="qk-header-selected-source-value">Not selected</span>
                                </div>

                                <div class="qk-header-address-list">
                                    @if(!empty($headerAddressList) && is_array($headerAddressList))
                                        @foreach($headerAddressList as $hAddress)
                                            <label class="qk-header-address-item">
                                                <input type="radio"
                                                    name="qk_header_location_choice"
                                                    class="qk-header-address-radio"
                                                    data-lat="{{ $hAddress['lat'] ?? '' }}"
                                                    data-lng="{{ $hAddress['lng'] ?? '' }}"
                                                    data-house-no="{{ $hAddress['house_no'] ?? '' }}"
                                                    data-type="{{ $hAddress['type'] ?? 'Address' }}"
                                                    data-name="{{ trim(($hAddress['house_no'] ?? '') . ', ' . ($hAddress['society_name'] ?? '')) }}"
                                                    value="{{ $hAddress['address_id'] ?? '' }}">
                                                <div>
                                                    <strong>{{ $hAddress['type'] ?? 'Address' }}</strong>
                                                    <span>{{ trim(($hAddress['house_no'] ?? '') . ', ' . ($hAddress['society_name'] ?? '')) }}</span>
                                                </div>
                                            </label>
                                        @endforeach
                                    @else
                                        <div class="p-3 small text-muted">No saved addresses found. Choose on map or fetch current location.</div>
                                    @endif
                                </div>

                                <button type="button" class="submit_btn w-100 mt-3 qk-header-location-apply-btn">Change location</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="headerBox">
                    @if(empty(session('user_id')))
                    <div class="logoBox">
                        <a class="navbar-brand" href="{{ENV('APP_URL')}}"> 
                            <img src="{{asset('assets/images/QuicKart_logo.png')}}" 
                                alt="logo" class="img-fluid desktop-logo">
                            <img src="{{asset('assets/images/QuicKart_Icon.png')}}" 
                                alt="logo" class="img-fluid mobile-logo">
                        </a>
                        <button class="navbar-toggler navbar-toggler-white d-none" type="button"
                            data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    @endif
                    <div class="header_icons_box">
                        @if(empty(session('user_id')))
                            <div class="search-wrapper">
                                <div class="search-wrapBox">
                                    <input type="text" id="searchInput" placeholder="Search products..." class="search-input form-control" autocomplete="off">
                                    <button class="btn search_buttonBox" type="submit" id="searchBtn"> <img src="https://www.quickart.ae/assets/images/search_icon.png" alt="search" class="img-fluid search_icon"></button>
                                </div>
                            </div>
                        @endif
                        
                        
                        <div id="search-overlay" style="
                            display: none;
                            position: fixed;
                            top: 0; left: 0; right: 0; bottom: 0;
                            background: rgba(0, 0, 0, 0.5);
                            z-index: 1000;
                            height:100vh;width:100%;">
                           
                        </div>
                        
                        <div class="loginBox" id="menu_mainbox">
                            <div class="login_cartbox_mobile">
                                @if(empty(session('user_id')))
                                <div class="mobile_profile_box" onclick="menu()">
                                    <img src="{{asset('assets/images/mobile_profile_icon.svg')}}" alt="Signin">
                                </div>
                                @endif
                            </div>
                            <span class="overlay"></span>
                            <div class="login_cartbox text-end">
                                <div class="toggle_close_logo" onclick="menu()">
                                    <img src="{{asset('assets/images/order-cancel.png')}}" alt="Close Icon" class="img-fluid">
                                </div>
                                @if(!empty(session('user_id')))
                                    @php
                                        $qkSidebarName = trim((string) (session('user_name') ?? session('name') ?? ''));
                                        $qkSidebarPhone = trim((string) (session('user_phone') ?? session('number') ?? ''));
                                    @endphp
                                    <div class="qk-menu-user-meta">
                                        <div class="qk-menu-user-meta__name">Hi, <span id="qkSidebarUserName">{{ $qkSidebarName !== '' ? $qkSidebarName : 'User' }}</span></div>
                                        <div class="qk-menu-user-meta__phone" id="qkSidebarUserPhone">{{ $qkSidebarPhone }}</div>
                                    </div>
                                @endif
                                <ul class="list-inline main-nav-right">
                                    
                                    @if(empty($data_arr['user_id']) && $data_arr['user_id'] == '')
                                    <li class="list-inline-item">
                                        <a href="{{ENV('APP_URL')}}login" class="top_icon" data-toggle="modal"
                                            data-bs-toggle="modal" data-bs-target="#login" title="Sign in">
                                            <div class="top_other_icon_img">
                                                <img src="{{asset('assets/images/top_login.png')}}" alt="Signin">
                                            </div>
                                            <div class="top_other_icon_heading">Sign in</div>
                                        </a>
                                    </li>
                                    @else
                                    @if(!request()->is('/'))
                                        <li class="list-inline-item">
                                            <a href="{{ENV('APP_URL')}}repeat-orders" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/repeat.svg')}}" alt="Repeat">
                                                </div>
                                                <div class="top_other_icon_heading">Repeat</div>
                                            </a>
                                        </li>
                                    @endif
                                    <li class="list-inline-item cart-btn">
                                        <a href="{{url('cart?tab=1')}}" onclick="openCart()">
                                            <div class="top_other_icon_img">
                                                <img src="{{asset('assets/images/top_cart.png')}}" alt="Cart">
                                            </div>
                                            <div class="top_other_icon_heading">My Cart <small
                                                    class="cart-value">{{$totalCartCount ?? 0}}</small>
                                            </div>
                                        </a>
                                    </li>
                                    {{-- Profile link hidden for logged-in users (moved to top delivery strip) --}}
                                    <li class="list-inline-item">
                                        <a class="top_icon" data-toggle="modal"
                                            data-bs-toggle="modal" data-bs-target="#logout">
                                            <div class="top_other_icon_img">
                                                <img src="{{asset('assets/images/top_login.png')}}" alt="Signin">
                                            </div>
                                            <div class="top_other_icon_heading">Logout</div>
                                        </a>
                                    </li>
                                     @endif
                                </ul>
                                <div class="main_menu_mobile">
                                    <ul class="main-mobile-nav">
                                        @if(!empty($data_arr['user_id']) && $data_arr['user_id'] != '')
                                        {{-- Profile link hidden for logged-in users (moved to top delivery strip) --}}
                                        <li class="list-inline-item cart-btn">
                                            <a onclick="openCart()">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/top_cart.png')}}" alt="Cart">
                                                </div>
                                                <div class="top_other_icon_heading">My Cart <small
                                                        class="cart-value">{{$totalCartCount ?? 0}}</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a onclick='openOrderPage()'>
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/menu_order.png')}}" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">My Order</div>
                                            </a>
                                        </li>
                                        @if(!request()->is('/'))
                                            <li class="list-inline-item">
                                                <a href="{{ENV('APP_URL')}}repeat-orders" class="top_icon">
                                                    <div class="top_other_icon_img">
                                                        <img src="{{asset('assets/images/repeat.svg')}}" alt="Repeat">
                                                    </div>
                                                    <div class="top_other_icon_heading">Repeat</div>
                                                </a>
                                            </li>
                                        @endif
                                        <li class="list-inline-item">
                                            <a href="{{ENV('APP_URL')}}address-list" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/menu_location.png')}}" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">My Address</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ENV('APP_URL')}}coupon" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/menu_offer.png')}}" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">My Offers</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ENV('APP_URL')}}wallet" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/wallet.png')}}" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">Wallet</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ENV('APP_URL')}}card-details" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/menu_payment.png')}}" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">Card Details</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ENV('APP_URL')}}wishlist" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/menu-wishlist.png')}}" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">Wishlist</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ENV('APP_URL')}}notify" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/menu-notifyMe.png')}}" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">Notify Me</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ENV('APP_URL')}}faq" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/menu_faq.png')}}" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">FAQ's</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="top_icon" data-toggle="modal"
                                                data-bs-toggle="modal" data-bs-target="#logout">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/top_login.png')}}" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">Logout</div>
                                            </a>
                                        </li>
                                        @endif
                                        @if(empty($data_arr['user_id']) && $data_arr['user_id'] == '')
                                        <li class="list-inline-item">
                                            <a href="{{ENV('APP_URL')}}login" class="top_icon" data-toggle="modal"
                                                data-bs-toggle="modal" data-bs-target="#login">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/top_login.png')}}" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">Sign in</div>
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
       

    </header>
    @if(!empty(session('user_id')) && !request()->is('cart') && !request()->is('cart/*'))
    <a href="{{ url('cart?tab=1') }}"
       onclick="openCart()"
       class="qk-sticky-cart-fab"
       aria-label="My cart"
       data-sticky-cart-fab>
        <span class="qk-sticky-cart-fab__inner">
            <img src="{{ asset('assets/images/top_cart.png') }}" alt="" width="24" height="24" class="qk-sticky-cart-fab__img">
            <span class="qk-sticky-cart-fab__badge" data-sticky-cart-badge aria-hidden="true">{{ (int) ($dailyCartCountSticky ?? 0) }}</span>
        </span>
    </a>
    <script>
    (function () {
        window.__QK_NODE_APP_BASE__ = @json(rtrim((string) env('NODE_APP_URL'), '/'));
        window.__QK_USER_ID__ = @json(session('user_id'));
        /** Updates sticky FAB badge instantly (same dailycartCount as Node API; avoids browser CORS on NODE_APP_URL). */
        window.setStickyDailyCartBadge = function (n) {
            var badge = document.querySelector('[data-sticky-cart-badge]');
            if (!badge) return;
            var v = parseInt(n, 10);
            badge.textContent = isFinite(v) && v > 0 ? String(v) : '0';
        };
        /** Optional: direct fetch to Node (often blocked by CORS from the browser). Prefer setStickyDailyCartBadge from Laravel AJAX cart_count. */
        window.refreshStickyCartCount = function () {
            var badge = document.querySelector('[data-sticky-cart-badge]');
            if (!badge || !window.__QK_USER_ID__ || !window.__QK_NODE_APP_BASE__) {
                return;
            }
            var url = window.__QK_NODE_APP_BASE__ + '/updateproductdetails';
            fetch(url, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify({ user_id: window.__QK_USER_ID__ })
            })
                .then(function (r) { return r.json(); })
                .then(function (json) {
                    var n = 0;
                    if (json && json.data && json.data.dailycartCount != null) {
                        n = parseInt(json.data.dailycartCount, 10) || 0;
                    }
                    window.setStickyDailyCartBadge(n);
                })
                .catch(function () {});
        };

        /** Mobile: drag FAB to any screen position; position persists in localStorage. */
        (function initStickyCartFabDrag() {
            var fab = document.querySelector('[data-sticky-cart-fab]');
            if (!fab) return;

            var mq = window.matchMedia('(max-width: 991.98px)');
            var STORAGE_KEY = 'qk_sticky_cart_fab_pos';
            var DRAG_THRESHOLD = 8;
            var EDGE_PAD = 14;
            var dragState = null;
            var suppressClick = false;

            function isMobile() {
                return mq.matches;
            }

            function getBottomReserve() {
                var pb = parseFloat(window.getComputedStyle(document.body).paddingBottom) || 0;
                return Math.max(pb, 62);
            }

            function getBounds() {
                var w = fab.offsetWidth;
                var h = fab.offsetHeight;
                var bottom = getBottomReserve();
                return {
                    minX: EDGE_PAD,
                    minY: EDGE_PAD,
                    maxX: Math.max(EDGE_PAD, window.innerWidth - w - EDGE_PAD),
                    maxY: Math.max(EDGE_PAD, window.innerHeight - h - bottom - EDGE_PAD)
                };
            }

            function clampPos(x, y) {
                var b = getBounds();
                return {
                    x: Math.min(b.maxX, Math.max(b.minX, x)),
                    y: Math.min(b.maxY, Math.max(b.minY, y))
                };
            }

            function applyFabPos(x, y) {
                var c = clampPos(x, y);
                fab.style.left = c.x + 'px';
                fab.style.top = c.y + 'px';
                fab.style.right = 'auto';
                fab.classList.add('qk-sticky-cart-fab--placed');
                return c;
            }

            function saveFabPos(x, y) {
                try {
                    localStorage.setItem(STORAGE_KEY, JSON.stringify({
                        xRatio: x / window.innerWidth,
                        yRatio: y / window.innerHeight
                    }));
                } catch (e) {}
            }

            function restoreFabPos() {
                if (!isMobile()) return;
                try {
                    var raw = localStorage.getItem(STORAGE_KEY);
                    if (!raw) return;
                    var p = JSON.parse(raw);
                    if (p.xRatio == null || p.yRatio == null) return;
                    var c = applyFabPos(p.xRatio * window.innerWidth, p.yRatio * window.innerHeight);
                    saveFabPos(c.x, c.y);
                } catch (e) {}
            }

            function resetDesktopLayout() {
                fab.style.left = '';
                fab.style.top = '';
                fab.style.right = '';
                fab.classList.remove('qk-sticky-cart-fab--placed', 'qk-sticky-cart-fab--dragging');
            }

            function ensurePlacedFromLayout() {
                if (fab.classList.contains('qk-sticky-cart-fab--placed')) return;
                var rect = fab.getBoundingClientRect();
                applyFabPos(rect.left, rect.top);
            }

            fab.addEventListener('dragstart', function (e) {
                e.preventDefault();
            });

            fab.addEventListener('pointerdown', function (e) {
                if (!isMobile() || e.button !== 0) return;
                ensurePlacedFromLayout();
                var rect = fab.getBoundingClientRect();
                dragState = {
                    pointerId: e.pointerId,
                    startX: e.clientX,
                    startY: e.clientY,
                    originX: rect.left,
                    originY: rect.top,
                    moved: false
                };
                fab.setPointerCapture(e.pointerId);
                fab.classList.add('qk-sticky-cart-fab--dragging');
            });

            fab.addEventListener('pointermove', function (e) {
                if (!dragState || e.pointerId !== dragState.pointerId) return;
                var dx = e.clientX - dragState.startX;
                var dy = e.clientY - dragState.startY;
                if (!dragState.moved && Math.hypot(dx, dy) < DRAG_THRESHOLD) return;
                dragState.moved = true;
                e.preventDefault();
                applyFabPos(dragState.originX + dx, dragState.originY + dy);
            });

            function endDrag(e) {
                if (!dragState || e.pointerId !== dragState.pointerId) return;
                try {
                    fab.releasePointerCapture(e.pointerId);
                } catch (err) {}
                fab.classList.remove('qk-sticky-cart-fab--dragging');
                if (dragState.moved) {
                    var rect = fab.getBoundingClientRect();
                    var c = applyFabPos(rect.left, rect.top);
                    saveFabPos(c.x, c.y);
                    suppressClick = true;
                    setTimeout(function () { suppressClick = false; }, 400);
                }
                dragState = null;
            }

            fab.addEventListener('pointerup', endDrag);
            fab.addEventListener('pointercancel', endDrag);

            fab.addEventListener('click', function (e) {
                if (suppressClick) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                }
            }, true);

            restoreFabPos();

            window.addEventListener('resize', function () {
                if (!isMobile() || !fab.classList.contains('qk-sticky-cart-fab--placed')) return;
                restoreFabPos();
            });

            if (typeof mq.addEventListener === 'function') {
                mq.addEventListener('change', function () {
                    if (mq.matches) {
                        restoreFabPos();
                    } else {
                        resetDesktopLayout();
                    }
                });
            } else if (typeof mq.addListener === 'function') {
                mq.addListener(function () {
                    if (mq.matches) {
                        restoreFabPos();
                    } else {
                        resetDesktopLayout();
                    }
                });
            }
        })();
    })();
    </script>
    @endif
    @php
        $qkHideZappingBadgePage = request()->is('cart') || request()->is('cart/*')
            || request()->is('daily-order-details') || request()->is('rating-reviews');
    @endphp
    @if(!empty(session('user_id')) && !empty($onTheWayOrder['show']) && !empty($onTheWayOrder['group_id']) && !$qkHideZappingBadgePage)
    <a href="{{ url('/daily-order-details?group_id=' . urlencode($onTheWayOrder['group_id'])) }}"
       class="qk-on-the-way-tag"
       aria-label="Order zapping soon!">
        <span class="qk-on-the-way-tag__icon" aria-hidden="true">
            <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.9 1.2a.6.6 0 0 0-1.07-.36L4.2 6.5a.6.6 0 0 0 .47.97H7L5.4 14.7a.6.6 0 0 0 1.07.44l4.1-5.6a.6.6 0 0 0-.47-.97H9.1L8.9 1.2Z"
                      fill="#00e676"/>
            </svg>
        </span>
        <span class="qk-on-the-way-tag__text">GO mode on: Order almost there!</span>
    </a>
    @endif
    @if(!empty(session('user_id')) && !$qkHideZappingBadgePage)
    <script>
    (function () {
        var modal = document.getElementById('headerLocationSwitchModal');
        if (!modal) return;
        function setZappingBadgeSuppressed(on) {
            document.querySelectorAll('.qk-on-the-way-tag').forEach(function (el) {
                el.classList.toggle('qk-on-the-way-tag--suppressed', !!on);
            });
        }
        modal.addEventListener('show.bs.modal', function () { setZappingBadgeSuppressed(true); });
        modal.addEventListener('hidden.bs.modal', function () { setZappingBadgeSuppressed(false); });
    })();
    </script>
    @endif
    <main>
        @if(!empty(session('user_id')))
        <script>
        (function () {
            var roots = document.querySelectorAll('[data-delivery-eta-root]');
            if (!roots.length) return;
            var ETA_CACHE_PREFIX = 'qk_delivery_eta_cache:';
            function getCurrentEtaAddressKey() {
                var locationEl = document.querySelector('[data-delivery-eta-location]');
                var locationText = locationEl ? String(locationEl.textContent || '').trim().toLowerCase() : '';
                return locationText || 'current_location';
            }
            function applyEtaToStrip(data) {
                // Match server 30/60/90 buckets; never show raw unbucketed minutes as a fallback.
                var displayValue = '30 mins';
                if (data && data.label) {
                    displayValue = data.label;
                } else if (data && data.minutes != null) {
                    displayValue = data.minutes + ' mins';
                }
                roots.forEach(function (root) {
                    var timeEl = root.querySelector('[data-delivery-eta-time]');
                    var distanceEl = root.querySelector('[data-delivery-eta-distance]');
                    if (timeEl) timeEl.textContent = displayValue;
                    if (distanceEl) {
                        if (data && data.distance_label) {
                            distanceEl.textContent = data.distance_label;
                            distanceEl.style.display = 'inline-flex';
                        } else if (data && data.distance_meters != null) {
                            distanceEl.textContent = data.distance_meters + ' mtrs away';
                            distanceEl.style.display = 'inline-flex';
                        } else {
                            distanceEl.style.display = 'none';
                        }
                    }
                });
            }
            window.qkRefreshDeliveryEtaStrip = function () {
                var addressKey = getCurrentEtaAddressKey();
                var cacheKey = ETA_CACHE_PREFIX + addressKey;
                try {
                    var cached = sessionStorage.getItem(cacheKey);
                    if (cached) {
                        var parsed = JSON.parse(cached);
                        if (parsed && typeof parsed === 'object') {
                            applyEtaToStrip(parsed);
                            return;
                        }
                    }
                } catch (e) {}

                fetch('{{ url('/delivery-eta') }}', { credentials: 'same-origin', headers: { 'Accept': 'application/json' } })
                .then(function (r) {
                    if (!r.ok) throw new Error('delivery-eta');
                    return r.json();
                })
                .then(function (data) {
                    console.log('[qk-login-location] /delivery-eta response (header strip)', data && {
                        source: data.source,
                        minutes: data.minutes,
                        label: data.label,
                        distance_label: data.distance_label,
                        distance_meters: data.distance_meters
                    });
                    if (data && data.eta_coords_used) {
                        console.log('[qk-login-location] /delivery-eta session coords → Google origins/destinations', data.eta_coords_used);
                    }
                    if (data && data.route_matrix_debug) {
                        console.log('[qk-login-location] Google Routes computeRouteMatrix debug (URL, field mask, full request_json per attempt)', data.route_matrix_debug);
                    }
                    if (data && (data.route_matrix_response != null || data.route_matrix_response_raw != null)) {
                        console.log('[delivery-eta] Google Route Matrix HTTP status:', data.route_matrix_http_status);
                        console.log('[delivery-eta] Google Route Matrix (parsed JSON):', data.route_matrix_response);
                        if (data.route_matrix_response_raw) {
                            console.log('[delivery-eta] Google Route Matrix (raw response body string):', data.route_matrix_response_raw);
                        }
                        if (data.route_matrix_debug_note) {
                            console.info('[delivery-eta]', data.route_matrix_debug_note);
                        }
                    }
                    applyEtaToStrip(data);
                    try {
                        sessionStorage.setItem(cacheKey, JSON.stringify(data || {}));
                    } catch (e) {}
                })
                .catch(function (err) {
                    console.warn('[qk-login-location] /delivery-eta fetch failed', err);
                    roots.forEach(function (root) {
                        var timeEl = root.querySelector('[data-delivery-eta-time]');
                        var distanceEl = root.querySelector('[data-delivery-eta-distance]');
                        if (timeEl) timeEl.textContent = '30 mins';
                        if (distanceEl) distanceEl.style.display = 'none';
                    });
                });
            };
            window.qkRefreshDeliveryEtaStrip();
        })();
        </script>
        @endif
        <div id="searchLoader" style="display: none; text-align: center; padding: 20px;">
            <img src="https://www.quickart.ae/assets/images/loader.gif" alt="Loading..." width="100">
        </div>
                <!-- Popup Modal -->
        <div id="suggestionsModal" style="position: fixed;
    top: 0px;
    left: 0px;
    z-index: 1000;
    display: none;
    height: 70vh;
    overflow: hidden;
    outline: 0px;
    bottom: 0;
    right:0;
    margin: auto;">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="suggestionsModalLabel">Suggested Items for You</h5>
                        <button type="button" id="suggestionsModal-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body suggestions-scroll-box" id="modalSuggestionsBox">
                    </div>
                </div>
            </div>
        </div>
        
    <!-- Navigrate to next page...G1 -->
    <script>
    let pendingProductId = null;
    let action = null;
        function openCart() {
            localStorage.setItem("selectedTab", "1");
            navigateToNextPage(href = '{{ env('APP_URL') }}cart?tab=1');
        }
        function navigateToNextPage(url) {
            const nextPageUrl = url;
            window.location.href = nextPageUrl;
        }
        function openOrderPage() {
            localStorage.setItem("selectedOrderTab", "1");
            navigateToNextPage(href = '{{ env('APP_URL') }}my-orders?tab=1');
        }
        
        function jumpNext(current, nextFieldId) {
            if (current.value.length >= 1) {
                current.value = current.value.replace(/\D/g, '').slice(0, 1); // Ensure only 1 digit
                document.getElementById(nextFieldId)?.focus();
            }
        }
        // Apply backspace clearing and focus logic
        document.querySelectorAll('.otp-value').forEach((input, index, inputs) => {
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace') {
                    if (input.value === '') {
                        if (index > 0) {
                            inputs[index - 1].focus();
                            inputs[index - 1].value = '';
                            e.preventDefault();
                        }
                    }
                }
            });
        });

        let isTimerRunning = false;
        let loginLocationMap = null;
        let loginLocationMarker = null;
        let loginLocationAutocomplete = null;
        let selectedLoginLat = null;
        let selectedLoginLng = null;
        let waitlistUserId = null;
        let headerSwitchMap = null;
        let headerSwitchMarker = null;
        let headerSwitchAutocomplete = null;
        let selectedHeaderLat = null;
        let selectedHeaderLng = null;
        let selectedHeaderLocationName = '';
        let selectedHeaderSavedAddress = null;
        /** 'map' | 'saved' | 'current' | null — drives Change location behavior */
        let selectedHeaderSource = null;

        function clearHeaderSavedAddressSelection() {
            selectedHeaderSavedAddress = null;
        }

        function setHeaderSavedAddressFromRadio($radio) {
            if (!$radio || !$radio.length) {
                return;
            }
            var lat = Number($radio.data('lat'));
            var lng = Number($radio.data('lng'));
            if (!isFinite(lat) || !isFinite(lng)) {
                return;
            }
            selectedHeaderSavedAddress = {
                address_id: String($radio.val() || ''),
                house_no: String($radio.data('name') || $radio.data('house-no') || '').trim(),
                type: String($radio.data('type') || 'Address').trim(),
                lat: lat,
                lng: lng
            };
            selectedHeaderSource = 'saved';
        }

        window.qkPersistDeliveryAddressSelection = function (addressData) {
            if (!addressData || !addressData.address_id) {
                return;
            }
            try {
                localStorage.setItem('selectedAddress', JSON.stringify(addressData));
            } catch (e) {}
            if (typeof window.saveSelectedAddress === 'function') {
                window.saveSelectedAddress(addressData);
            }
            try {
                window.dispatchEvent(new CustomEvent('qk-delivery-address-changed', { detail: addressData }));
            } catch (e) {}
        };

        // After header map → add-address save: persist the new address as the selected delivery address.
        (function applyFlashedHeaderAddress() {
            var flashed = @json(session('qk_header_address_just_saved'));
            if (!flashed || !flashed.address_id) {
                return;
            }
            window.qkPersistDeliveryAddressSelection(flashed);
            if (flashed.house_no) {
                $('[data-delivery-eta-location]').text(flashed.house_no);
            }
            try {
                Object.keys(sessionStorage).forEach(function (k) {
                    if (k.indexOf('qk_delivery_eta_cache:') === 0) {
                        sessionStorage.removeItem(k);
                    }
                });
            } catch (e) {}
            if (typeof window.qkRefreshDeliveryEtaStrip === 'function') {
                window.qkRefreshDeliveryEtaStrip();
            }
        })();

        function qkIsDailyCartPage() {
            var path = (window.location.pathname || '').toLowerCase();
            if (path.indexOf('/cart') === -1) {
                return false;
            }
            var tab = new URLSearchParams(window.location.search || '').get('tab');
            return tab === '1' || tab === null || tab === '';
        }

        function qkRedirectCartCurrentLocationToAddAddress(lat, lng) {
            var tab = new URLSearchParams(window.location.search || '').get('tab') || '1';
            var params = new URLSearchParams({
                addedFrom: 'cart',
                tab: tab,
                prefill: '1',
                lat: String(lat),
                lng: String(lng)
            });
            $('#headerLocationSwitchModal').modal('hide');
            window.location.href = "{{ url('/add-address') }}?" + params.toString();
        }

        /**
         * Header map pick → add-address with pin prefilled.
         * Does not apply the pin as the active delivery location until the address is saved.
         */
        function qkRedirectHeaderMapToAddAddress(lat, lng) {
            var norm = normalizeLoginCoordsForSubmit(lat, lng, 'qkRedirectHeaderMapToAddAddress');
            if (!norm) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error Occured',
                    text: 'Invalid coordinates. Please pick a location on the map again.'
                });
                return;
            }
            var params = new URLSearchParams({
                prefill: '1',
                lat: String(norm.lat),
                lng: String(norm.lng)
            });
            if (qkIsDailyCartPage()) {
                var tab = new URLSearchParams(window.location.search || '').get('tab') || '1';
                params.set('addedFrom', 'cart');
                params.set('tab', tab);
            } else {
                params.set('addedFrom', 'header');
                params.set('tab', '1');
                var returnTo = (window.location.pathname || '/') + (window.location.search || '');
                if (returnTo.indexOf('/add-address') === -1) {
                    params.set('return_to', returnTo);
                }
            }
            $('#headerLocationSwitchModal').modal('hide');
            window.location.href = "{{ url('/add-address') }}?" + params.toString();
        }

        /** Validate range only (no session delivery update) then open add-address for map picks. */
        function qkValidateThenRedirectHeaderMapToAddAddress(lat, lng, locationName) {
            var _token = jQuery('meta[name="csrf-token"]').attr('content');
            var norm = normalizeLoginCoordsForSubmit(lat, lng, 'qkValidateThenRedirectHeaderMapToAddAddress');
            if (!norm) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error Occured',
                    text: 'Invalid coordinates. Please pick a location on the map again.'
                });
                return;
            }
            qkHeaderLocationShowLoader('Checking location…');
            $.ajax({
                url: "{{ route('checkAddressLocationRange') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: _token,
                    lat: norm.lat,
                    lng: norm.lng,
                    location_name: locationName || 'Selected location',
                    validate_only: 1
                },
                complete: function () {
                    qkHeaderLocationHideLoader();
                },
                success: function (response) {
                    if (response && response.success && response.in_range === true) {
                        qkRedirectHeaderMapToAddAddress(norm.lat, norm.lng);
                        return;
                    }
                    Swal.fire({
                        icon: 'warning',
                        title: 'Out of range',
                        text: (response && response.message)
                            ? response.message
                            : 'please select a location in our servicable area'
                    });
                },
                error: function (xhr) {
                    var msg = 'Unable to validate location. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        msg = xhr.responseJSON.message;
                    }
                    Swal.fire({ icon: 'error', title: 'Error', text: msg });
                }
            });
        }

        /** After login current-location / map pick: open add-address with that pin prefilled (same as cart header prefill). */
        function qkRedirectLoginLocationToAddAddress(lat, lng) {
            try {
                sessionStorage.setItem('qk_login_pending_after_address', JSON.stringify({
                    action: typeof action !== 'undefined' ? action : null,
                    pendingProductId: typeof pendingProductId !== 'undefined' ? pendingProductId : null
                }));
            } catch (e) {}
            var params = new URLSearchParams({
                addedFrom: 'login',
                tab: '1',
                prefill: '1',
                lat: String(lat),
                lng: String(lng)
            });
            window.__qkAllowLoginModalClose = true;
            try {
                $('#login').modal('hide');
            } catch (e) {}
            qkDeferNavigate(function () {
                window.location.href = "{{ url('/add-address') }}?" + params.toString();
            });
        }

        /** Run any pending product action saved before the login → add-address redirect. */
        window.qkResumePendingAfterLoginAddress = function qkResumePendingAfterLoginAddress() {
            var raw = null;
            try {
                raw = sessionStorage.getItem('qk_login_pending_after_address');
                sessionStorage.removeItem('qk_login_pending_after_address');
            } catch (e) {
                return;
            }
            if (!raw) {
                return;
            }
            var pending = null;
            try {
                pending = JSON.parse(raw);
            } catch (e) {
                return;
            }
            if (!pending) {
                return;
            }
            var pendingAction = pending.action || null;
            var productId = pending.pendingProductId || null;
            if (productId && pendingAction === 'addToCart') {
                localStorage.setItem('selectedTab', 1);
                if (typeof addToCart === 'function') {
                    addToCart(productId, 1, true);
                }
                return;
            }
            if (productId && pendingAction === 'addToSubCart') {
                qkDeferNavigate(function () { window.location.reload(); });
                return;
            }
            if (productId && pendingAction === 'wishlist') {
                if (typeof addToWishList === 'function') {
                    addToWishList(productId, 1, true);
                }
                qkDeferNavigate(function () { window.location.href = "{{ url('wishlist') }}"; });
                return;
            }
            if (productId && pendingAction === 'notifyme') {
                if (typeof notifyMe === 'function') {
                    notifyMe(productId, productId, 0, '');
                }
                qkDeferNavigate(function () { window.location.href = "{{ url('notify') }}"; });
                return;
            }
            if (pendingAction === 'trailpack') {
                qkDeferNavigate(function () { window.location.href = "{{ url('trial-pack') }}"; });
            }
        }

        function qkValidateCurrentLocationForCartAddAddress(lat, lng, onSuccess, onFail) {
            var _token = jQuery('meta[name="csrf-token"]').attr('content');
            var norm = normalizeLoginCoordsForSubmit(lat, lng, 'qkValidateCurrentLocationForCartAddAddress');
            if (!norm) {
                if (typeof onFail === 'function') {
                    onFail('Invalid coordinates. Please try again.');
                }
                return;
            }
            $.ajax({
                url: "{{ route('checkAddressLocationRange') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: _token,
                    lat: norm.lat,
                    lng: norm.lng,
                    location_name: 'Current location'
                },
                success: function (response) {
                    if (response && response.success && response.in_range === true) {
                        if (typeof onSuccess === 'function') {
                            onSuccess(norm.lat, norm.lng);
                        }
                        return;
                    }
                    var msg = (response && response.message)
                        ? response.message
                        : 'please select a location in our servicable area';
                    if (typeof onFail === 'function') {
                        onFail(msg);
                    }
                },
                error: function (xhr) {
                    var msg = 'Unable to validate location. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        msg = xhr.responseJSON.message;
                    }
                    if (typeof onFail === 'function') {
                        onFail(msg);
                    }
                }
            });
        }

        function resetLoginLocationStep() {
            selectedLoginLat = null;
            selectedLoginLng = null;
            waitlistUserId = null;
            $('.location_picker_map_box').addClass('d-none');
            $('.out_of_range_box').addClass('d-none');
            $('.join_waitlist_cta').removeClass('d-none');
            $('.out_of_range_message').text('You are currently outside our delivery area. Join the waitlist and we will notify you as soon as we start serving your location.');
            $('.confirm_map_location_btn').prop('disabled', true);
            $('#login-location-search').val('');
            if (loginLocationMarker) {
                loginLocationMarker.setMap(null);
                loginLocationMarker = null;
            }
        }

        function renderLoginSavedAddresses(savedAddresses) {
            var $root = $('#login-saved-addresses-root');
            var $inner = $('#login-saved-address-list-inner');
            if (!$root.length || !$inner.length) {
                return;
            }
            var list = Array.isArray(savedAddresses) ? savedAddresses : [];
            if (list.length === 0) {
                $root.addClass('d-none');
                $inner.empty();
                return;
            }
            $root.removeClass('d-none');
            $inner.empty();
            list.forEach(function (h) {
                var house = (h && h.house_no) ? String(h.house_no).trim() : '';
                var society = (h && h.society_name) ? String(h.society_name).trim() : '';
                var labelParts = [];
                if (house) {
                    labelParts.push(house);
                }
                if (society) {
                    labelParts.push(society);
                }
                var label = labelParts.join(', ');
                var typeLabel = (h && h.type) ? String(h.type) : 'Address';
                var lat = h && h.lat !== undefined && h.lat !== null ? String(h.lat) : '';
                var lng = h && h.lng !== undefined && h.lng !== null ? String(h.lng) : '';
                var addressId = h && (h.address_id !== undefined && h.address_id !== null)
                    ? String(h.address_id)
                    : (h && h.id !== undefined && h.id !== null ? String(h.id) : '');
                var $btn = $('<button type="button" class="qk-header-address-item login-saved-address-btn"></button>');
                $btn.attr('data-lat', lat)
                    .attr('data-lng', lng)
                    .attr('data-name', label || 'Saved address')
                    .attr('data-address-id', addressId)
                    .attr('data-house-no', house || label || '')
                    .attr('data-type', typeLabel);
                var $div = $('<div></div>');
                $div.append($('<strong></strong>').text(typeLabel));
                $div.append($('<span></span>').text(label));
                $btn.append($div);
                $inner.append($btn);
            });
        }

        function showLocationGateStep(savedAddresses) {
            $('.login_step1').addClass('d-none');
            $('.login_step2').addClass('d-none');
            $('.login_step3').removeClass('d-none');
            resetLoginLocationStep();
            if (arguments.length >= 1) {
                renderLoginSavedAddresses(savedAddresses);
            }
        }

        /** Let the browser apply Set-Cookie from the location-check XHR before navigating (avoids empty ETA session on fast redirects). */
        function qkDeferNavigate(run) {
            setTimeout(run, 250);
        }

        /**
         * Use the same numeric path as the map picker: Number(), optional google.maps.LatLng snap, then 6-decimal round.
         * debugTag: optional string; logs to console with prefix [qk-login-location]
         * Returns an object with lat/lng numbers, or null if invalid.
         */
        function normalizeLoginCoordsForSubmit(rawLat, rawLng, debugTag) {
            var lat = Number(rawLat);
            var lng = Number(rawLng);
            if (!isFinite(lat) || !isFinite(lng)) {
                console.warn('[qk-login-location] normalize: non-finite input', debugTag || '', { rawLat: rawLat, rawLng: rawLng });
                return null;
            }
            if (window.google && google.maps && typeof google.maps.LatLng === 'function') {
                try {
                    var ll = new google.maps.LatLng(lat, lng);
                    lat = ll.lat();
                    lng = ll.lng();
                } catch (e) {
                    console.warn('[qk-login-location] normalize: LatLng() failed, using numbers', debugTag || '', e);
                }
            } else if (debugTag) {
                console.info('[qk-login-location] normalize: google.maps not ready, skipping LatLng() —', debugTag);
            }
            lat = Math.round(lat * 1e6) / 1e6;
            lng = Math.round(lng * 1e6) / 1e6;
            if (debugTag) {
                console.log('[qk-login-location] normalize: result', debugTag, { lat: lat, lng: lng });
            }
            return { lat: lat, lng: lng };
        }

        function handleSuccessfulLoginAfterLocation(serverMessage) {
            window.__qkAllowLoginModalClose = true;
            if (pendingProductId) {
                if(action == 'addToCart'){
                    localStorage.setItem("selectedTab", 1);
                    addToCart(pendingProductId,1,true);
                    pendingProductId = null;
                    openCart();
                    return;
                }
                if(action == 'addToSubCart'){
                    pendingProductId = null;
                    $('#login').modal('hide');
                    $('#subscribe').modal('hide');
                    qkDeferNavigate(function () { window.location.reload(); });
                    return;
                }
                if(action == 'wishlist'){
                    addToWishList(pendingProductId,1,true);
                    pendingProductId = null;
                    Swal.fire({
                        icon: 'success',
                        title: 'Product added!',
                        text: 'Product added in wishlist successfully !',
                        timer: 3000,
                        showConfirmButton: false
                    });
                    qkDeferNavigate(function () { window.location.href="{{url('wishlist')}}"; });
                    return;
                }
                if(action == 'notifyme'){
                    notifyMe(pendingProductId,pendingProductId,0,'');
                    pendingProductId = null;
                    Swal.fire({
                        icon: 'success',
                        title: 'Product added!',
                        text: 'Product added in notifylist successfully !',
                        timer: 3000,
                        showConfirmButton: false
                    });
                    qkDeferNavigate(function () { window.location.href="{{url('notify')}}"; });
                    return;
                }
            } else {
                if(action == 'trailpack'){
                    qkDeferNavigate(function () { window.location.href="{{url('trial-pack')}}"; });
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Successful!',
                        text: serverMessage || 'Location verified. Login successful.',
                        timer: 3000,
                        showConfirmButton: false
                    });
                    qkDeferNavigate(function () { window.location.href="{{route('index')}}"; });
                }
            }
        }

        function submitLoginLocationCheck(lat, lng, locationName, options) {
            if (window.__qkLoginLocBusy) {
                return;
            }
            options = options || {};
            var requireNewAddress = options.requireNewAddress === true;
            window.__qkLoginLocBusy = true;
            var _token = jQuery('meta[name="csrf-token"]').attr('content');
            var norm = normalizeLoginCoordsForSubmit(lat, lng, 'submitLoginLocationCheck(in=' + (locationName || '') + ')');
            if (!norm) {
                window.__qkLoginLocBusy = false;
                $('.use_current_location_btn').data('qk-location-loading', false);
                Swal.fire({
                    icon: 'error',
                    title: 'Error Occured',
                    text: 'Invalid coordinates. Please try again or pick your location on the map.'
                });
                return;
            }
            var latNum = norm.lat;
            var lngNum = norm.lng;
            console.log('[qk-login-location] POST /check-login-location-range', {
                lat: latNum,
                lng: lngNum,
                location_name: locationName || '',
                requireNewAddress: requireNewAddress
            });
            $.ajax({
                url: "{{ route('checkLoginLocationRange') }}",
                type: 'POST',
                dataType: 'json',
                xhrFields: { withCredentials: true },
                data: {
                    lat: latNum,
                    lng: lngNum,
                    location_name: locationName || '',
                    require_new_address: requireNewAddress ? 1 : 0,
                    _token: _token
                },
                complete: function () {
                    window.__qkLoginLocBusy = false;
                    $('.use_current_location_btn').data('qk-location-loading', false);
                },
                success: function (response) {
                    console.log('[qk-login-location] check-login-location-range response', response);
                    if (response && response.debug_sql) {
                        console.log('[qk-login-location] SQL', response.debug_sql);
                        console.log('[qk-login-location] SQL bindings', response.debug_bindings || []);
                    }
                    if (response.success && response.in_range) {
                        // Current location / map: finish login session then collect a full address before continuing.
                        // Saved address selection keeps the direct post-login path.
                        if (requireNewAddress || response.require_new_address === true) {
                            qkRedirectLoginLocationToAddAddress(latNum, lngNum);
                        } else {
                            // Persist saved address so cart?tab=1 shows the same selection.
                            var savedForCart = options.saved_address || null;
                            if (savedForCart && savedForCart.address_id && typeof window.qkPersistDeliveryAddressSelection === 'function') {
                                window.qkPersistDeliveryAddressSelection(savedForCart);
                                if (savedForCart.house_no) {
                                    $('[data-delivery-eta-location]').text(savedForCart.house_no);
                                }
                            }
                            handleSuccessfulLoginAfterLocation(response.message);
                        }
                    } else if (response.success && response.in_range === false) {
                        waitlistUserId = response.waitlist_user_id || null;
                        if (response.already_waitlisted === true) {
                            $('.out_of_range_message').text('You are already on our waitlist. Thank you for your interest - we will let you know as soon as delivery starts in your area.');
                            $('.join_waitlist_cta').addClass('d-none');
                        } else {
                            $('.out_of_range_message').text('You are currently outside our delivery area. Join the waitlist and we will notify you as soon as we start serving your location.');
                            $('.join_waitlist_cta').removeClass('d-none');
                        }
                        $('.out_of_range_box').removeClass('d-none');
                        Swal.fire({
                            icon: 'warning',
                            title: 'Out of Range',
                            text: response.already_waitlisted === true
                                ? 'You are already on our waitlist. We will notify you when we start delivery in your area.'
                                : 'You are currently outside our delivery area. Join the waitlist to get notified when we start serving your location.'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error Occured',
                            text: response.message || 'Unable to validate location.'
                        });
                    }
                },
                error: function (xhr, status, err) {
                    console.warn('[qk-login-location] check-login-location-range HTTP error', {
                        status: xhr.status,
                        statusText: xhr.statusText,
                        ajaxStatus: status,
                        err: err,
                        responseJSON: xhr.responseJSON
                    });
                    if (xhr.responseJSON && xhr.responseJSON.debug_sql) {
                        console.log('[qk-login-location] SQL (error path)', xhr.responseJSON.debug_sql);
                        console.log('[qk-login-location] SQL bindings (error path)', xhr.responseJSON.debug_bindings || []);
                    }
                    let msg = 'Unable to validate location. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        msg = xhr.responseJSON.message;
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Error Occured',
                        text: msg
                    });
                }
            });
        }

        function ensureLoginMapLoaded(callback) {
            if (window.google && window.google.maps) {
                callback();
                return;
            }

            window.initLoginLocationMap = function () {
                callback();
            };

            if (document.getElementById('login-location-map-script')) {
                return;
            }

            const script = document.createElement('script');
            script.id = 'login-location-map-script';
            script.async = true;
            script.defer = true;
            script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyDjGU6WbSwLK9d7_CAVYQ1Br0DpFhx3Rt0&callback=initLoginLocationMap&libraries=places&v=weekly";
            document.head.appendChild(script);
        }

        function initLoginMapPicker(defaultLat, defaultLng) {
            const mapCenter = {
                lat: defaultLat || 25.2048,
                lng: defaultLng || 55.2708
            };

            loginLocationMap = new google.maps.Map(document.getElementById("login-location-map"), {
                center: mapCenter,
                zoom: 14,
                mapTypeId: "roadmap",
            });

            const input = document.getElementById("login-location-search");
            loginLocationAutocomplete = new google.maps.places.Autocomplete(input);
            loginLocationAutocomplete.addListener('place_changed', function () {
                const place = loginLocationAutocomplete.getPlace();
                if (!place.geometry || !place.geometry.location) {
                    return;
                }
                const lat = place.geometry.location.lat();
                const lng = place.geometry.location.lng();
                setMapLocationMarker(lat, lng);
            });

            loginLocationMap.addListener("click", function(event) {
                setMapLocationMarker(event.latLng.lat(), event.latLng.lng());
            });
        }

        function setMapLocationMarker(lat, lng) {
            selectedLoginLat = lat;
            selectedLoginLng = lng;
            if (!loginLocationMap) {
                return;
            }
            if (loginLocationMarker) {
                loginLocationMarker.setMap(null);
            }
            loginLocationMarker = new google.maps.Marker({
                position: { lat: lat, lng: lng },
                map: loginLocationMap
            });
            loginLocationMap.setCenter({ lat: lat, lng: lng });
            $('.confirm_map_location_btn').prop('disabled', false);
        }

        function initHeaderLocationSwitchMap(defaultLat, defaultLng) {
            const mapCenter = {
                lat: defaultLat || 25.2048,
                lng: defaultLng || 55.2708
            };
            headerSwitchMap = new google.maps.Map(document.getElementById('qk-header-location-map'), {
                center: mapCenter,
                zoom: 14,
                mapTypeId: 'roadmap',
            });
            const input = document.querySelector('.qk-header-location-search');
            if (input) {
                headerSwitchAutocomplete = new google.maps.places.Autocomplete(input);
                headerSwitchAutocomplete.addListener('place_changed', function () {
                    const place = headerSwitchAutocomplete.getPlace();
                    if (!place.geometry || !place.geometry.location) {
                        return;
                    }
                    const lat = place.geometry.location.lat();
                    const lng = place.geometry.location.lng();
                    const name = (place.formatted_address || input.value || 'Selected location').trim();
                    setHeaderLocationMarker(lat, lng, name);
                    selectedHeaderSource = 'map';
                    setHeaderSelectedSourceLabel('Map selection', name);
                });
            }
            headerSwitchMap.addListener('click', function (event) {
                const lat = event.latLng.lat();
                const lng = event.latLng.lng();
                setHeaderLocationMarker(lat, lng, 'Selected location');
                selectedHeaderSource = 'map';
                setHeaderSelectedSourceLabel('Map selection', 'Selected location');
            });
        }

        function setHeaderLocationMarker(lat, lng, locationName, preserveSelectedAddressRadio) {
            selectedHeaderLat = lat;
            selectedHeaderLng = lng;
            selectedHeaderLocationName = (locationName || 'Selected location').trim();
            if (!headerSwitchMap) {
                return;
            }
            if (headerSwitchMarker) {
                headerSwitchMarker.setMap(null);
            }
            headerSwitchMarker = new google.maps.Marker({
                position: { lat: lat, lng: lng },
                map: headerSwitchMap
            });
            headerSwitchMap.setCenter({ lat: lat, lng: lng });
            if (!preserveSelectedAddressRadio) {
                $('.qk-header-address-radio').prop('checked', false);
                clearHeaderSavedAddressSelection();
            }
        }

        function setHeaderSelectedSourceLabel(source, locationName) {
            var sourceText = source || 'Not selected';
            var nameText = (locationName || '').trim();
            var finalText = sourceText;
            if (nameText) {
                finalText += ' - ' + nameText;
            }
            $('.qk-header-selected-source-value').text(finalText);
        }

        function qkHeaderLocationShowLoader(text) {
            try {
                Swal.fire({
                    title: text || 'Please wait…',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    didOpen: function () { Swal.showLoading(); }
                });
            } catch (e) {}
        }

        function qkHeaderLocationHideLoader() {
            try { Swal.close(); } catch (e) {}
        }

        function submitHeaderLocationCheck(lat, lng, locationName, opts) {
            opts = opts || {};
            var _token = jQuery('meta[name="csrf-token"]').attr('content');
            var norm = normalizeLoginCoordsForSubmit(lat, lng, 'submitHeaderLocationCheck');
            if (!norm) {
                if (opts && opts.show_loader) qkHeaderLocationHideLoader();
                Swal.fire({ icon: 'error', title: 'Error Occured', text: 'Invalid coordinates selected.' });
                return;
            }
            $.ajax({
                url: "{{ route('checkAddressLocationRange') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: _token,
                    lat: norm.lat,
                    lng: norm.lng,
                    location_name: locationName || 'Selected location'
                },
                success: function (response) {
                    if (response && response.debug_sql) {
                        console.log('[qk-header-location] SQL', response.debug_sql);
                        console.log('[qk-header-location] SQL bindings', response.debug_bindings || []);
                    }
                    if (response.success && response.in_range === true) {
                        var label = response.location_name || locationName || 'Current location';
                        $('[data-delivery-eta-location]').text(label);
                        var savedAddress = (opts && opts.saved_address) ? opts.saved_address : selectedHeaderSavedAddress;
                        if (savedAddress && savedAddress.address_id) {
                            if (!savedAddress.house_no) {
                                savedAddress.house_no = label;
                            }
                            window.qkPersistDeliveryAddressSelection(savedAddress);
                        }
                        try {
                            Object.keys(sessionStorage).forEach(function (k) {
                                if (k.indexOf('qk_delivery_eta_cache:') === 0) {
                                    sessionStorage.removeItem(k);
                                }
                            });
                        } catch (e) {}
                        if (typeof window.qkRefreshDeliveryEtaStrip === 'function') {
                            window.qkRefreshDeliveryEtaStrip();
                        }
                        $('#headerLocationSwitchModal').modal('hide');
                        if (opts && opts.reload_on_success) {
                            if (opts && opts.show_loader) qkHeaderLocationHideLoader();
                            window.location.reload();
                            return;
                        }
                        if (opts && opts.show_loader) qkHeaderLocationHideLoader();
                        Swal.fire({
                            icon: 'success',
                            title: 'Location updated',
                            text: response.message || 'Delivery location changed successfully.'
                        });
                    } else if (response.success && response.in_range === false) {
                        if (opts && opts.show_loader) qkHeaderLocationHideLoader();
                        Swal.fire({
                            icon: 'warning',
                            title: 'Out of range',
                            text: response.message || 'please select a location in our servicable area'
                        });
                    } else {
                        if (opts && opts.show_loader) qkHeaderLocationHideLoader();
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: (response && response.message) ? response.message : 'Unable to validate location.'
                        });
                    }
                },
                error: function (xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.debug_sql) {
                        console.log('[qk-header-location] SQL (error path)', xhr.responseJSON.debug_sql);
                        console.log('[qk-header-location] SQL bindings (error path)', xhr.responseJSON.debug_bindings || []);
                    }
                    let msg = 'Unable to validate location. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        msg = xhr.responseJSON.message;
                    }
                    if (opts && opts.show_loader) qkHeaderLocationHideLoader();
                    Swal.fire({ icon: 'error', title: 'Error', text: msg });
                }
            });
        }

        function resendOtp(element) {
            if (isTimerRunning) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Please Wait!',
                    text: 'Try again after the timer ends.',
                    timer: 3000,
                    showConfirmButton: false
                });
                return;
            }

            $('.resend_otp').hide();

            var number = document.getElementById('number').value;
            var country_code = document.getElementById('country_code').value;
            var _token = jQuery('meta[name="csrf-token"]').attr('content');
            var url = "{{ENV('APP_URL')}}resend-otp";

            jQuery.ajax({
                url: url,
                method: "POST",
                data: {
                    number: number,
                    country_code: country_code,
                    _token: _token
                },
                success: function(result) {
                    Swal.fire({
                        icon: 'success',
                        title: 'OTP Sent Successfully!',
                        text: 'Please check your phone for the OTP.',
                        timer: 3000,
                        showConfirmButton: false
                    });
                    $('.otp-value').val('');
                    startOTPTimer('timer','resendLink','otpText');
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to Send OTP',
                        text: 'An error occurred: ' + error,
                        timer: 3000,
                        showConfirmButton: false
                    });
                    $('.resend_otp').show();
                }
            });
        }

        
       $(document).ready(function(){
            $('#login').on('show.bs.modal', function (e) {
              $('#mobile_code').val(''); 
              $('#error-msg').html('');
              $('.otp-value').val('');
              updateCountryCodel();
            });
           
           $('.login_form_step1,.login_form_step2,.register_form').on('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    return false;
                }
            });
            
            
            $('.back_login_btn').on('click',function(){
                $('.login_step2').addClass('d-none');
                $('.login_step1').removeClass('d-none');
            });

            $('.back_to_otp_btn').on('click', function(){
                $('.login_step3').addClass('d-none');
                $('.login_step2').removeClass('d-none');
                resetLoginLocationStep();
            });
            
            $('.back_register_btn').on('click',function(){
                $('#registration').modal('hide');
                $('#login').modal('show');
            });
            
            function qkSyncSidebarUserInfo(name, phone) {
                var finalName = (name || '').toString().trim();
                var finalPhone = (phone || '').toString().trim();
                var nameEl = document.getElementById('qkSidebarUserName');
                var phoneEl = document.getElementById('qkSidebarUserPhone');
                if (nameEl && finalName) nameEl.textContent = finalName;
                if (phoneEl) phoneEl.textContent = finalPhone;
            }

            function qkStoreSidebarUserInfo(name, phone) {
                try {
                    if (name) sessionStorage.setItem('qk_user_name', String(name));
                    if (phone) sessionStorage.setItem('qk_user_phone', String(phone));
                } catch (e) {}
                qkSyncSidebarUserInfo(name, phone);
            }

            (function qkHydrateSidebarUserInfoFromSessionStorage() {
                try {
                    var savedName = sessionStorage.getItem('qk_user_name') || '';
                    var savedPhone = sessionStorage.getItem('qk_user_phone') || '';
                    if (savedName || savedPhone) {
                        qkSyncSidebarUserInfo(savedName, savedPhone);
                    }
                } catch (e) {}
            })();

            $('.otp_request').on('click',function(){
                    var _token = jQuery('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                      url: "{{ route('loginsubmit') }}", // Change this to your actual URL
                      type: 'POST',
                      data: $('.login_form_step1').serialize()+'&_token='+_token, // Send form data
                      success: function (response) {
                        // alert('Form submitted successfully!');
                        console.log(response);
                        // If backend (or underlying Node API) indicates user is not a ZAP customer,
                        // show a message and do NOT proceed to login/OTP/register flows.
                        if (response.status === 0 && response.message === 'Sorry you are not a zap customer') {
                            Swal.fire({
                                icon: 'info',
                                title: 'Sorry you are not a ZAP customer',
                                text: response.message,
                                timer: 4000,
                                showConfirmButton: false
                            });
                            return;
                        }

                        if(response.success == true && response.popup == 'otp'){
                            var qkLoginName = response.name || '';
                            var qkLoginPhone = response.user_phone || response.number || '';
                            qkStoreSidebarUserInfo(qkLoginName, qkLoginPhone);
                            $('.entered_mobile').html(response.country_code+' '+response.number);

                            $('.number').val(response.number);
                            $('.country_code').val(response.country_code);
                            $('.user_email').val(response.email);
                            $('.name').val(response.name);
                            $('.referral_code').val(response.referral_code);
                            $('.userid').val(response.id);
                            $('.otp-value').val('');
                            $('.login_step2').removeClass('d-none');
                            $('.login_step1').addClass('d-none');

                            startOTPTimer('timer','resendLink','otpText');


                        }else if(response.success == true && response.popup == 'register'){
                            var qkRegisterName = response.name || '';
                            var qkRegisterPhone = response.user_phone || response.number || '';
                            qkStoreSidebarUserInfo(qkRegisterName, qkRegisterPhone);
                            // Temporarily block registration flow for ZAP users.
                            Swal.fire({
                                icon: 'info',
                                title: 'Notice',
                                text: 'The zap feature is only for already existing users',
                                timer: 4000,
                                showConfirmButton: false
                            });

                            // $('#registration').modal('show');
                            //
                            // $('.register_form').find('.country_code').val(response.country_code);
                            // $('.register_form').find('.mobile_code').val(response.number);
                            // $('.register_form').find('.flagcode').val(response.flag_code);
                            // $('#login').modal('hide');
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: response.message || 'Sorry you are not a ZAP customer',
                                text: response.message || 'Sorry you are not a zap customer',
                                timer: 3000,
                                showConfirmButton: false
                            });
                            return;
                        }
                        
                      },
                      error: function (xhr, status, error) {
                        // alert('Error submitting the form.');
                        console.error(error);
                      }
                    });
                
            
                
            });

        
            $('.otp_submit').on('click',function(){
                 var _token = jQuery('meta[name="csrf-token"]').attr('content');
                // Collect all values from input fields with class 'allotp'
                let otpValues = Array.from(document.querySelectorAll('.otp-value')).map(input => input.value);

                // Join them into a single string (if needed)
                let otp = otpValues.join('');

                if(otp == ''){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error Occured',
                        text:  'OTP is required',
                        timer: 3000,
                        showConfirmButton: false
                    });
                }else{
                    $('.otp').val(otp);

                    $.ajax({
                      url: "{{ route('loginotpsubmit') }}", // Change this to your actual URL
                      type: 'POST',
                      data: $('.login_form_step2').serialize()+'&_token='+_token, // Send form data
                      success: function (response) {
                        if(response.success == false){
                             Swal.fire({
                                icon: 'error',
                                title: 'Error Occured',
                                text:  response.message,
                                timer: 3000,
                                showConfirmButton: false
                            });
                            $('.otp-value').val('');
                        }else{
                            qkStoreSidebarUserInfo($('.login_form_step2 .name').val() || '', $('.login_form_step2 .number').val() || '');
                            if (Array.isArray(response.saved_addresses)) {
                                showLocationGateStep(response.saved_addresses);
                            } else {
                                showLocationGateStep();
                            }
                        }
                      },
                      error: function (xhr, status, error) {
                        // alert('Error submitting the form.');
                        if (xhr.status === 422) {
                          const errors = xhr.responseJSON.errors;
                          // Loop through each error and display it after the corresponding input
                          for (let field in errors) {
                            // $(`#error-${field}`).html(`<small style="color:red;">${errors[field][0]}</small>`);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error Occured',
                                text:  errors[field][0],
                                timer: 3000,
                                showConfirmButton: false
                            });
                          }
                        }
                      }
                     });  
                }                              
                
            });

            $('.btn_register').on('click',function(){
                 var _token = jQuery('meta[name="csrf-token"]').attr('content');
                $.ajax({
                  url: "{{ route('registeruser') }}", // Change this to your actual URL
                  type: 'POST',
                  data: $('.register_form').serialize()+'&_token='+_token, // Send form data
                  success: function (response) {
                    // alert('Form submitted successfully!');
                    console.log(response);
                    if(response.success == true && response.popup == 'otp'){
                        $('#registration').modal('hide');
                        $('#login').modal('show');
                        $('.login_step2').removeClass('d-none');
                        $('.login_step1').addClass('d-none');

                        $('.entered_mobile').html(response.country_code+' '+response.number);

                        $('.number').val(response.number);
                        $('.country_code').val(response.country_code);
                        $('.user_email').val(response.email);
                        $('.name').val(response.name);
                        $('.referral_code').val(response.referral_code);
                        $('.userid').val(response.id);
                        $('.login_step2').removeClass('d-none');
                        $('.register_form').addClass('d-none');

                        startOTPTimer('timer','resendLink','otpText');
                        fbq('track', 'CompleteRegistration', {
                                value: 0.00,
                                currency: 'AED',
                                content_name: response.name + ', ' + response.number
                            });

                    }else{
                        if(response.message == 'The given data was invalid.'){

                        }
                    }
                    
                  },
                  error: function (xhr, status, error) {
                    if (xhr.status === 422) {
                      const errors = xhr.responseJSON.errors;
                      // Loop through each error and display it after the corresponding input
                      for (let field in errors) {
                        $(`#error-${field}`).html(`<small style="color:red;">${errors[field][0]}</small>`);
                      }
                    }
                    console.error(error);
                  }
                });
                
            });

            $('.use_current_location_btn').on('click', function () {
                var $btn = $(this);
                if (!navigator.geolocation) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error Occured',
                        text: 'Your browser does not support geolocation. Please use map selection.'
                    });
                    return;
                }
                if ($btn.data('qk-location-loading')) {
                    return;
                }
                $btn.data('qk-location-loading', true);
                console.log('[qk-login-location] use current location: waiting for Maps (if needed) then geolocation…');

                function runGeolocationWhenReady() {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var c = position.coords;
                        console.log('[qk-login-location] geolocation raw Coordinates', {
                            latitude: c.latitude,
                            longitude: c.longitude,
                            accuracy: c.accuracy,
                            altitude: c.altitude,
                            altitudeAccuracy: c.altitudeAccuracy,
                            heading: c.heading,
                            speed: c.speed
                        });
                        console.log('[qk-login-location] geolocation position.timestamp', position.timestamp);
                        console.log('[qk-login-location] geolocation → submitLoginLocationCheck (require add-address)');
                        submitLoginLocationCheck(c.latitude, c.longitude, 'Current location', { requireNewAddress: true });
                    }, function (geoErr) {
                        $btn.data('qk-location-loading', false);
                        console.warn('[qk-login-location] geolocation error', geoErr);
                        Swal.fire({
                            icon: 'warning',
                            title: 'Location Permission Required',
                            text: 'Unable to fetch current location. Please select location on map.'
                        });
                    }, {
                        enableHighAccuracy: true,
                        timeout: 10000,
                        maximumAge: 0
                    });
                }

                ensureLoginMapLoaded(function () {
                    console.log('[qk-login-location] Maps API ready for LatLng normalization:', !!(window.google && google.maps));
                    runGeolocationWhenReady();
                });
            });

            $('.pick_map_location_btn').on('click', function () {
                $('.location_picker_map_box').removeClass('d-none');
                var loginMapPanel = document.querySelector('.location_picker_map_box.login-location-map-panel');
                if (loginMapPanel) {
                    setTimeout(function () {
                        loginMapPanel.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }, 80);
                }
                ensureLoginMapLoaded(function () {
                    if (!loginLocationMap) {
                        initLoginMapPicker();
                    }
                    setTimeout(function() {
                        google.maps.event.trigger(loginLocationMap, 'resize');
                        loginLocationMap.setCenter(loginLocationMap.getCenter());
                    }, 100);
                });
            });

            $('.qk-header-pick-map-btn').on('click', function () {
                var mapWrap = document.querySelector('#headerLocationSwitchModal .qk-header-map-wrap');
                if (mapWrap) {
                    mapWrap.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
                ensureLoginMapLoaded(function () {
                    if (!headerSwitchMap) {
                        var initLat = Number('{{ session('delivery_user_lat') ?: 25.2048 }}');
                        var initLng = Number('{{ session('delivery_user_lng') ?: 55.2708 }}');
                        initHeaderLocationSwitchMap(initLat, initLng);
                    }
                    setTimeout(function () {
                        if (headerSwitchMap) {
                            google.maps.event.trigger(headerSwitchMap, 'resize');
                            if (selectedHeaderLat !== null && selectedHeaderLng !== null) {
                                headerSwitchMap.setCenter({ lat: selectedHeaderLat, lng: selectedHeaderLng });
                            }
                        }
                    }, 120);
                });
            });

            $('.confirm_map_location_btn').on('click', function () {
                if (selectedLoginLat === null || selectedLoginLng === null) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Select Location',
                        text: 'Please select and confirm a location on map.'
                    });
                    return;
                }
                const pickedLocationName = ($('#login-location-search').val() || '').trim() || 'Selected location';
                submitLoginLocationCheck(selectedLoginLat, selectedLoginLng, pickedLocationName, { requireNewAddress: true });
            });

            $(document).on('click', '.login-saved-address-btn', function () {
                var $btn = $(this);
                var lat = parseFloat($btn.attr('data-lat'));
                var lng = parseFloat($btn.attr('data-lng'));
                var name = ($btn.attr('data-name') || '').toString().trim() || 'Saved address';
                var addressId = String($btn.attr('data-address-id') || '').trim();
                var houseNo = String($btn.attr('data-house-no') || name).trim();
                var addressType = String($btn.attr('data-type') || 'Address').trim();
                if (!isFinite(lat) || !isFinite(lng)) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Address unavailable',
                        text: 'This address has no coordinates. Please use map or current location.'
                    });
                    return;
                }
                // Saved address: complete login immediately and lock this address for cart checkout.
                var savedAddressPayload = null;
                if (addressId) {
                    savedAddressPayload = {
                        address_id: addressId,
                        house_no: name || houseNo,
                        type: addressType || 'Address',
                        lat: lat,
                        lng: lng
                    };
                }
                submitLoginLocationCheck(lat, lng, name, { saved_address: savedAddressPayload });
            });

            $('#headerLocationSwitchModal').on('shown.bs.modal', function () {
                selectedHeaderSource = null;
                clearHeaderSavedAddressSelection();
                setHeaderSelectedSourceLabel('Not selected', '');
                ensureLoginMapLoaded(function () {
                    if (!headerSwitchMap) {
                        var initLat = Number('{{ session('delivery_user_lat') ?: 25.2048 }}');
                        var initLng = Number('{{ session('delivery_user_lng') ?: 55.2708 }}');
                        initHeaderLocationSwitchMap(initLat, initLng);
                        if (isFinite(initLat) && isFinite(initLng)) {
                            setHeaderLocationMarker(initLat, initLng, '{{ session('delivery_location_name') ?: 'Current location' }}');
                        }
                    }
                    setTimeout(function () {
                        if (headerSwitchMap) {
                            google.maps.event.trigger(headerSwitchMap, 'resize');
                            if (selectedHeaderLat !== null && selectedHeaderLng !== null) {
                                headerSwitchMap.setCenter({ lat: selectedHeaderLat, lng: selectedHeaderLng });
                            }
                        }
                    }, 120);
                });
            });

            $('.qk-header-address-radio').on('change', function () {
                var rawLat = $(this).data('lat');
                var rawLng = $(this).data('lng');
                var name = ($(this).data('name') || 'Saved address').toString().trim();
                var lat = Number(rawLat);
                var lng = Number(rawLng);
                if (!isFinite(lat) || !isFinite(lng)) {
                    return;
                }
                setHeaderSavedAddressFromRadio($(this));
                setHeaderLocationMarker(lat, lng, name, true);
                setHeaderSelectedSourceLabel('Saved address', name);
            });

            $('.qk-header-current-location-btn').on('click', function () {
                var $btn = $(this);
                if (!navigator.geolocation) {
                    Swal.fire({ icon: 'error', title: 'Error Occured', text: 'Your browser does not support geolocation.' });
                    return;
                }
                if ($btn.data('qk-location-loading')) {
                    return;
                }
                $btn.data('qk-location-loading', true);
                qkHeaderLocationShowLoader('Fetching current location…');
                ensureLoginMapLoaded(function () {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var lat = position.coords.latitude;
                        var lng = position.coords.longitude;
                        if (qkIsDailyCartPage()) {
                            qkValidateCurrentLocationForCartAddAddress(lat, lng, function (validLat, validLng) {
                                $btn.data('qk-location-loading', false);
                                qkHeaderLocationHideLoader();
                                qkRedirectCartCurrentLocationToAddAddress(validLat, validLng);
                            }, function (message) {
                                $btn.data('qk-location-loading', false);
                                qkHeaderLocationHideLoader();
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Out of range',
                                    text: message || 'please select a location in our servicable area'
                                });
                            });
                            return;
                        }
                        $btn.data('qk-location-loading', false);
                        setHeaderLocationMarker(lat, lng, 'Current location');
                        selectedHeaderSource = 'current';
                        setHeaderSelectedSourceLabel('Current location', 'Current location');
                        submitHeaderLocationCheck(lat, lng, 'Current location', { reload_on_success: true, show_loader: true });
                    }, function () {
                        $btn.data('qk-location-loading', false);
                        qkHeaderLocationHideLoader();
                        Swal.fire({
                            icon: 'warning',
                            title: 'Location Permission Required',
                            text: 'Unable to fetch current location. Please choose from map or saved address.'
                        });
                    }, {
                        enableHighAccuracy: true,
                        timeout: 10000,
                        maximumAge: 0
                    });
                });
            });

            (function initHeaderLocationSearchClear() {
                var searchInput = document.querySelector('.qk-header-location-search');
                var clearBtn = document.querySelector('.qk-header-search-clear');
                if (!searchInput || !clearBtn) return;

                function toggleClearBtn() {
                    if ((searchInput.value || '').trim() !== '') {
                        clearBtn.classList.add('qk-visible');
                    } else {
                        clearBtn.classList.remove('qk-visible');
                    }
                }

                searchInput.addEventListener('input', toggleClearBtn);
                searchInput.addEventListener('focus', toggleClearBtn);
                clearBtn.addEventListener('click', function () {
                    searchInput.value = '';
                    clearBtn.classList.remove('qk-visible');
                    searchInput.dispatchEvent(new Event('input', { bubbles: true }));
                    searchInput.focus();
                });
                $('#headerLocationSwitchModal').on('shown.bs.modal', toggleClearBtn);
            })();

            (function initLoginLocationSearchClear() {
                var searchInput = document.getElementById('login-location-search');
                var clearBtn = document.querySelector('.login-location-search-clear');
                if (!searchInput || !clearBtn) return;

                function toggleClearBtn() {
                    if ((searchInput.value || '').trim() !== '') {
                        clearBtn.classList.add('qk-visible');
                    } else {
                        clearBtn.classList.remove('qk-visible');
                    }
                }

                searchInput.addEventListener('input', toggleClearBtn);
                searchInput.addEventListener('focus', toggleClearBtn);
                clearBtn.addEventListener('click', function () {
                    searchInput.value = '';
                    clearBtn.classList.remove('qk-visible');
                    searchInput.dispatchEvent(new Event('input', { bubbles: true }));
                    searchInput.focus();
                });

                $('#login').on('shown.bs.modal', toggleClearBtn);
                $('.pick_map_location_btn').on('click', function () {
                    setTimeout(toggleClearBtn, 0);
                });
            })();

            $('.qk-header-location-apply-btn').on('click', function () {
                if (selectedHeaderLat === null || selectedHeaderLng === null) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Select Location',
                        text: 'Please select a saved address, pick on map, or fetch current location first.'
                    });
                    return;
                }
                var savedAddress = selectedHeaderSavedAddress;
                var $checkedRadio = $('.qk-header-address-radio:checked');
                if ((!savedAddress || !savedAddress.address_id) && $checkedRadio.length) {
                    setHeaderSavedAddressFromRadio($checkedRadio);
                    savedAddress = selectedHeaderSavedAddress;
                }

                // Map pick only: open add-address with pin prefilled — do not apply as delivery location yet.
                if (selectedHeaderSource === 'map') {
                    qkValidateThenRedirectHeaderMapToAddAddress(
                        selectedHeaderLat,
                        selectedHeaderLng,
                        selectedHeaderLocationName || 'Selected location'
                    );
                    return;
                }

                submitHeaderLocationCheck(
                    selectedHeaderLat,
                    selectedHeaderLng,
                    selectedHeaderLocationName || 'Selected location',
                    { saved_address: savedAddress }
                );
            });

            $('.join_waitlist_btn').on('click', function () {
                var _token = jQuery('meta[name="csrf-token"]').attr('content');
                const sentUserId = waitlistUserId;
                console.log('join-waitlist sent user_id:', sentUserId);
                $.ajax({
                    url: "{{ route('joinWaitlist') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        user_id: sentUserId,
                        number: $('.login_form_step2 .number').val(),
                        country_code: $('.login_form_step2 .country_code').val()
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Waitlist Joined',
                            text: response.message || 'You have been added to the waitlist.'
                        }).then(() => {
                            window.location.href = "{{ route('index') }}";
                        });
                    },
                    error: function (xhr) {
                        let msg = 'Unable to join waitlist. Please try again.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            msg = xhr.responseJSON.message;
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Error Occured',
                            text: msg
                        });
                    }
                });
            });
            
        });

        
        function userLogout() {
            // Get CSRF token value
            var _token = $('meta[name="csrf-token"]').attr('content');
            // Perform AJAX request
            $.ajax({
            url: "{{ route('userLogout') }}",
            method: "POST",
            data: {},
            headers: {
            'X-CSRF-TOKEN': _token
            },
            success: function (response) {
                try {
                    sessionStorage.removeItem('qk_user_name');
                    sessionStorage.removeItem('qk_user_phone');
                    Object.keys(sessionStorage).forEach(function (k) {
                        if (k.indexOf('qk_delivery_eta_cache:') === 0) {
                            sessionStorage.removeItem(k);
                        }
                    });
                } catch (e) {}
                Swal.fire({
                title: 'Success!',
                text:'Logout successful. Have a great day!',
                icon: 'success',
                confirmButtonText: 'Ok'
                }).then((result) => {
                if (result.isConfirmed) {
                // Reload the page
                window.location.href="{{route('index')}}";
                }
                });   
            }
            });
        }
        
        document.addEventListener("DOMContentLoaded", function () {
            const loginModal = document.getElementById('login');
            if (!loginModal) {
                return;
            }
            if (document.body.getAttribute('data-qk-guest-login-required') === '1') {
                window.__qkAllowLoginModalClose = false;
                loginModal.addEventListener('hide.bs.modal', function (e) {
                    if (!window.__qkAllowLoginModalClose) {
                        e.preventDefault();
                        e.stopImmediatePropagation();
                    }
                }, true);
            }
            // Listen for modal close event
            loginModal.addEventListener('hidden.bs.modal', function () {
                // Reset to login_step1
                const step1 = document.querySelector('.login_step1');
                const step2 = document.querySelector('.login_step2');
                const step3 = document.querySelector('.login_step3');
                if (step1) step1.classList.remove('d-none');
                if (step2) step2.classList.add('d-none');
                if (step3) step3.classList.add('d-none');
                // Optionally clear form fields or error messages
                const formStep1 = document.querySelector('.login_form_step1');
                const formStep2 = document.querySelector('.login_form_step2');
                if (formStep1 && typeof formStep1.reset === 'function') formStep1.reset();
                if (formStep2 && typeof formStep2.reset === 'function') formStep2.reset();
                resetLoginLocationStep();
                // Optional: Reset timer or messages
                const otpTextEl = document.getElementById('otpText');
                const resendLinkEl = document.getElementById('resendLink');
                if (otpTextEl) otpTextEl.style.display = 'block';
                if (resendLinkEl) resendLinkEl.style.display = 'none';
            });
        });
    </script>
    
    <!-- Search api call for autosuggest...G1 -->
    <script>

        function fetchSearchSuggestions(keyword) {
            const suggestionsBox = document.getElementById('modalSuggestionsBox');
            const modal = document.getElementById('suggestionsModal');
            const overlay = document.getElementById('search-overlay');
            const loader = document.getElementById('searchLoader');

            if (keyword.length < 1) {
                modal.style.display = 'none';
                overlay.style.display = 'none';
                return;
            }

            loader.style.display = 'block';
            overlay.style.display = 'block';
            const url = "https://lwjwrnpfftdevebgvcmz.supabase.co/functions/v1/smart-responder";
            const userId = "{{ session()->get('user_id') ?? '' }}";
            const deviceId = localStorage.getItem('device_id') || 'test123';

            suggestionsBox.innerHTML = '<div style="text-align:center;">Loading...</div>';
            modal.style.display = 'block';

            jQuery.ajax({
                url: url,
                method: "POST",
                contentType: "application/json",
                dataType: "json",
                data: JSON.stringify({
                    store_id: 7,
                    keyword: keyword,
                    user_id: userId ? String(userId) : "",
                    device_id: deviceId,
                    sub_cat_id: "null",
                    cat_id: "null",
                    sortprice: "null",
                    sortname: "null",
                    page: 1,
                    perpage: 20,
                    min_price: "null",
                    max_price: "null",
                    min_discount: "null",
                    max_discount: "null",
                    stock: "null",
                    byname: "null"
                }),
                success: function(data) {
                    suggestionsBox.innerHTML = '';
                    loader.style.display = 'none';

                    if (data.status === "1" && Array.isArray(data.data) && data.data.length > 0) {
                        data.data.forEach(product => {
                            const productName = typeof product === 'string' ? product : (product.product_name || '');
                            if (!productName) return;

                            const div = document.createElement('div');
                            div.textContent = productName;
                            div.classList.add('suggestion-item');
                            div.style.cursor = "pointer";
                            div.style.padding = "8px 0";
                            div.onclick = () => {
                                const searchInput = document.getElementById('searchInput');
                                const popup = document.getElementById('suggestionsModal');
                                searchInput.value = '';
                                modal.style.display = 'none';
                                popup.style.display = 'none';
                                overlay.style.display = 'none';
                                gtag('event', 'view_search_resultsW', {
                                    search_term: productName,
                                    method: 'search_input_box',
                                    page_location: window.location.href,
                                    debug_mode: true
                                });
                                const slug = encodeURIComponent(productName.toLowerCase());
                                window.location.href = `{{ENV('APP_URL')}}search?name=${slug}`;
                            };
                            suggestionsBox.appendChild(div);
                        });
                        modal.style.display = 'block';
                    } else {
                        suggestionsBox.innerHTML = '<div style="padding:10px;">No products found</div>';
                    }
                },
                error: function() {
                    loader.style.display = 'none';
                    suggestionsBox.innerHTML = '<div style="padding:10px;">Something went wrong</div>';
                }
            });
        }
    
        function navigateToNextPage(url) {
            const nextPageUrl = url;
            window.location.href = nextPageUrl;
            // console.log(window.location.href);
        }
        
          const searchBtnEl = document.getElementById('searchBtn');
          if (searchBtnEl) searchBtnEl.addEventListener('click', function () {
            const input = document.getElementById('searchInput');
            if (!input) return;
            const keyword = input.value.trim();
        
            if (keyword.length > 0) {
                gtag('event', 'view_search_resultsW', {
                  search_term: input.value,  
                  method: 'search_input_box',      
                  page_location: window.location.href,
                  debug_mode: true                  // true if testing in DebugView
                });
               fetchSearchSuggestions(keyword);
            }
          });
    </script>
    <!--Search overlay-->
    <script>
  document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const overlay = document.getElementById('search-overlay');
    const popup = document.getElementById('suggestionsModal');
    const popupClose = document.getElementById('suggestionsModal-close');
    if (!searchInput || !overlay || !popup || !popupClose) {
      return;
    }
    
    const urlParams = new URLSearchParams(window.location.search);
    const name = urlParams.get('name');
    if (name) {
        if (window.location.href.includes('product-details')) {
            const txtProductNameEl = document.getElementById('txt_product_name');
            if (txtProductNameEl) {
                document.getElementById('searchInput').value = txtProductNameEl.value;
            }
        }else{
            document.getElementById('searchInput').value = decodeURIComponent(name); //.replace(/-/g, ' '));
        }
    }
    
    searchInput.addEventListener('focus', () => {
      overlay.style.display = 'block';
     // popup.style.display = 'block';
    });
    popupClose.addEventListener('click', () => {
      popup.style.display = 'none';
      overlay.style.display = 'none';
      searchInput.value = '';
      searchInput.blur();
    });
    overlay.addEventListener('click', (e) => {
      if (
        !popup.contains(e.target) &&
        !searchInput.contains(e.target)
      ) {
        popup.style.display = 'none';
        overlay.style.display = 'none';
        searchInput.value = '';
        searchInput.blur();
      }
    });
    
    searchInput.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
      event.preventDefault(); 

      const keyword = searchInput.value.trim();
      if (keyword.length > 0) {
          gtag('event', 'view_search_resultsW', {
                  search_term: searchInput.value,  
                  method: 'search_input_box',      
                  page_location: window.location.href,
                  debug_mode: true                  // true if testing in DebugView
                });
        fetchSearchSuggestions(keyword);
      }
    }
  });
  });
</script>

   