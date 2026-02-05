@include('header')
<section class="account-page section-padding">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Daily Orders</h5>
                </div>
                @if(isset($dailyOrderList['data']) && count($dailyOrderList['data']) > 0)
                <div class="order-infoMainBox">
                    <div class="row">
                        @foreach($dailyOrderList['data'] as $orderList)
                        <div class="col-lg-6 col-md-6">
                            <div class="daily_order_infoBox">
                                <a
                                    href="{{ url(ENV('APP_URL') . 'daily-order-details?group_id=' . $orderList['group_id']) }}">
                                    <div class="daily_product">
                                        <div class="order_info">
                                            <div class="order_details">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <ul>
                                                            <li>Order ID : <span>{{$orderList['group_id']}}</span></li>
                                                            <li>Delivery Date :
                                                                <span>{{$orderList['order_date']}}</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3">
                                                        <ul>
                                                            <li>AED
                                                                <span>{{number_format($orderList['price_without_delivery'], 2)}}</span>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                    @if ($orderList['orderType'] =="trail")
                                                    <div class="col-lg-3 col-md-3">
                                                        <p class="text-with-bg">Trial Pack</p>
                                                    </div>
                                                    @endif
                                                    <div
                                                        style="border-bottom: 0.3px solid #dadbf0; margin-top: 5px; margin-bottom: 5px ">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <ul>
                                                            <li>{{$orderList['productname']}}</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@include('footer')