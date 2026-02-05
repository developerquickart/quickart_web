@include('header')
<section class="order_successful_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="order_confirmed_box">
                    <img src="{{asset('assets/images/failed.png')}}" alt="Check" class="img-fluid">
                    <div class="heading-design-h5 text-center my-3">Order Cancelled !</div>
                    <p>Your order has been cancelled successfully</p>
                    <p>Check our range of products & shop again.</p>
                    <div class="btn_wrap">
                        @if(\Request::get('tab') == 1)
                            <a href="{{url('/')}}" class="button continue_btn">Continue Shopping</a>
                        @else
                            <a href="{{url('/')}}" class="button continue_btn">Continue Shopping</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('footer')