@include('header')
@if (\Request::get('screen') == 'daily')
<style>
    /* Mobile: short confirmation copy makes the footer feel like main content; stretch this section so the footer sits lower. */
    @media (max-width: 767.98px) {
        .order_successful_section.order-successful--daily {
            min-height: calc(100dvh - 3.5rem);
            padding-top: 1.5rem;
            padding-bottom: 4rem;
            box-sizing: border-box;
        }
    }
</style>
@endif
<section class="order_successful_section @if (\Request::get('screen') == 'daily')order-successful--daily @endif">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="order_confirmed_box">
                    <img src="{{asset('assets/images/Success.png')}}" alt="Check" class="img-fluid">
                    <div class="heading-design-h5 text-center my-3">Order Confirmed !</div>

                    @if (\Request::get('screen') == 'daily' && !empty($CartCount) && !empty($CartCount['subscriptioncartCount']))
                        <p>You're almost done! Your Daily Cart is checked out. Complete your order by checking out your
                            Subscription Cart.</p>
                    @endif
                    @if (\Request::get('screen') == "subscription" && !empty($CartCount) && !empty($CartCount['dailycartCount']))
                        <p>You're almost done! Your Subscription Cart is checked out. Complete your order by checking out
                            your
                            Daily Cart.</p>
                    @endif
                    <p>You will receive your order on selected date.</p>
                    <p>
                    <div class="green_text" onclick="onClickTrackOrderBtn('{{ \Request::get('screen') }}')">
                        Track Order
                    </div>
                    </p>
                    <div class="btn_wrap">
                        <a class="button continue_btn" href="{{ENV('APP_URL')}}">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function onClickTrackOrderBtn(screenString) {
        localStorage.removeItem("selectedAddress");
        if (screenString == "daily") {
        localStorage.setItem("selectedOrderTab", "1");
        navigateToNextPage(href = '{{ env('APP_URL ') }}my-orders?tab=1');
        // navigateToNextPage(href = "{{ENV('APP_URL')}}daily-orders");
        } else if (screenString == "subscription") {
        // navigateToNextPage(href = "{{ENV('APP_URL')}}subscription-orders");
        localStorage.setItem("selectedOrderTab", "2");
        navigateToNextPage(href = '{{ env('APP_URL ') }}my-orders?tab=2');
        } else if (screenString == "index") {
        navigateToNextPage(href="/");
        }else {
        localStorage.setItem("selectedOrderTab", "1");
        navigateToNextPage(href = '{{ env('APP_URL ') }}my-orders?tab=1');
        }
    } 
</script>
<script>
    function navigateToNextPage(url) {
        const nextPageUrl = url;
        window.location.href = nextPageUrl;
        // console.log(window.location.href);
    }
</script>
@include('footer')