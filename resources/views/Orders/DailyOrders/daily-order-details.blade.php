@include('header')
<section class="account-page section-padding">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5"> Order Details</h5>
                </div>

                @php
                    $qkMapsJsKey = trim((string) (config('services.google.maps_server_key') ?: ''));
                @endphp
                @if(!empty($deliveryBoyTracking))
                <style>
                    .qk-dboy-track {
                        margin: 0 0 16px;
                        padding: 14px 16px;
                        border-radius: 14px;
                        background: linear-gradient(135deg, #f4f6ff 0%, #eef2ff 100%);
                        border: 1px solid #e0e5f5;
                    }
                    .qk-dboy-track__title {
                        font-size: 13px;
                        font-weight: 700;
                        color: #1a237e;
                        margin-bottom: 10px;
                    }
                    .qk-dboy-track__hint {
                        font-size: 11px;
                        color: #666;
                        margin-top: 8px;
                    }
                    .qk-dboy-track__map-wrap {
                        margin-top: 12px;
                        border-radius: 12px;
                        overflow: hidden;
                        border: 1px solid #e0e5f5;
                        background: #f5f7ff;
                    }
                    .qk-dboy-track__map {
                        width: 100%;
                        height: 220px;
                        min-height: 200px;
                    }
                </style>
                <div class="qk-dboy-track" id="qkDboyTrack"
                     data-poll-url="{{ url('/delivery-boy-position') }}"
                     data-group-id="{{ e($deliveryBoyTracking['group_id']) }}"
                     data-home-lat="{{ $deliveryBoyTracking['home_lat'] }}"
                     data-home-lng="{{ $deliveryBoyTracking['home_lng'] }}"
                     data-home-icon="{{ asset('assets/images/user_home.png') }}"
                     data-driver-icon="{{ asset('assets/images/delivery_boy.png') }}"
                     data-maps-key="{{ e($qkMapsJsKey) }}">
                    <div class="qk-dboy-track__title">Delivery partner on the way</div>
                    <div class="qk-dboy-track__hint">Live route on the map below — updates every 30 seconds.</div>
                    <div class="qk-dboy-track__map-wrap">
                        <div id="qkOrderTrackMap" class="qk-dboy-track__map" role="img" aria-label="Driving route from delivery partner to your address"></div>
                    </div>
                </div>
                @endif
                
                <?php
                // echo "<pre>";
                // print_r($dailyOrderDetailsList['data']);
                ?>
                
                @if(isset($dailyOrderDetailsList['data']))
                <div class="daily_order_detailsBox">
                    <div class="row ">
                        <div class="col-lg-6">
                            <div class="order_detailsMainbox position__sticky">
                                <div class="order_detailbox">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="your_order_details_box">
                                                <div class="sub_order_details_heading">Your Order Details:</div>
                                                <ul class="order_details_list">
                                                    <li>Order ID:
                                                        <span>{{$dailyOrderDetailsList['data']['group_id']}}</span>
                                                    </li>
                                                    <li>Delivery Date :
                                                        <span>{{$dailyOrderDetailsList['data']['delivery_date']}}</span>
                                                    </li>
                                                    <li>Order total : <span>AED
                                                            @if($dailyOrderDetailsList['data']['order_type'] == 'trail')
                                                            {{number_format($dailyOrderDetailsList['data']['total_price'], 2)}}
                                                            @else
                                                            {{number_format($dailyOrderDetailsList['data']['price_without_delivery'], 2)}}
                                                            @endif
                                                            </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="shipping_order_box">
                                                <div class="sub_order_details_heading">Shipping Address:</div>
                                                <ul class="order_details_list">
                                                    <li>Delivery To: <span>
                                                            {{$dailyOrderDetailsList['data']['address_name']}}</span>
                                                    </li>
                                                    <li>Address :
                                                        <span>{{$dailyOrderDetailsList['data']['delivery_address']}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order_track_mainBox">
                                    <div class="headerBox">
                                        <div class="order-subheading">Order Track</div>
                                        @if($dailyOrderDetailsList['data']['order_status'] == "Completed")
                                        @php
                                            $jsonData = json_encode($dailyOrderDetailsList['data']);
                                            $encodedData = urlencode($jsonData);
                                        @endphp
                                        <a href="{{ ENV('APP_URL') }}rating-reviews?screenName=dailyreview&data={{ $encodedData }}">
                                        <div> <span style="font-weight: 500;  color: green">Rate Order</span> </div>
                                        </a>
                                        @endif
                                    </div>
                                    @if($dailyOrderDetailsList['data']['order_status'] != "Cancelled" && $dailyOrderDetailsList['data']['order_status'] != "Payment_failed")
                                    
                                    @php
                                    $currentStatus = $dailyOrderDetailsList['data']['order_status'];
                                    $statusFlow = ["Placed", "Confirmed", "Out_For_Delivery", "Completed"];
                                    $currentStatusIndex = array_search($currentStatus, $statusFlow);
                                    @endphp

                                    <div class="order_track_listBox">
                                        <div class="track_list">
                                            @foreach ($statusFlow as $index => $status)
                                            <div
                                                class="track_list_check {{ $index <= $currentStatusIndex ? 'track_select' : '' }}">
                                                <img src="{{ asset('assets/images/check.png') }}" alt="Check"
                                                    class="img-fluid">
                                            </div>
                                            @if ($index < count($statusFlow) - 1) 
                                            <div class="track_list_sept {{ $index < $currentStatusIndex ? 'track_select' : '' }}"> </div>
                                            @endif
                                            @endforeach
                                         </div>
                                        <div class="track_list status_list">
                                            @foreach ($statusFlow as $index => $status)
                                            <div class="track_status list{{ $index + 1 }}" @if($currentStatusIndex == $index) style="color: green;" @endif>
                                                @if($status == "Out_For_Delivery")
                                                Out For Delivery
                                                @elseif($status == "Confirmed")
                                                Processed
                                                @else
                                                {{ $status }}
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                    
                                    @if($dailyOrderDetailsList['data']['order_status'] == "Cancelled" || $dailyOrderDetailsList['data']['order_status'] == "Payment_failed")
                                    <div class="order_cancel_statusBox">
                                        <div class="order_cancelled_box">
                                            <div class="order_cancelled_img">
                                                <img src="{{asset('assets/images/failed.png')}}" alt="failed"
                                                    class="img-fluid">
                                            </div>
                                            <div class="order_cancelled_text">
                                                <div class=""> 
                                                @if($dailyOrderDetailsList['data']['order_status'] == "Cancelled")
                                                Order Cancelled
                                                @else
                                                Payment Failed
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="d-flex gap-2 align-items-end flex-wrap">
                                        @if($dailyOrderDetailsList['data']['order_status'] == "Completed")
                                        <div class="cancelBtn text-end"
                                             onclick="openInvoice('{{$dailyOrderDetailsList['data']['prodwiseinvoice']}}')">
                                                <div class="cancel_orderBtn">
                                                    <img src="{{asset('assets/images/invoice.png')}}" alt="Buy"
                                                        class="img-fluid">
                                                    View Order Invoice
                                                </div>
                                        </div>
                                        @endif
                                         @php    // dd($dailyOrderDetailsList); @endphp
                                        @if($dailyOrderDetailsList['data']['order_status'] == "Completed")
                                       
                                        <div class="cancel_orderBtn"
                                            onclick="openImagePopup('{{$dailyOrderDetailsList['data']['delivery_proof']}}')">
                                            <img src="{{ asset('assets/images/boxes.png') }}" alt="Buy" class="img-fluid"
                                                style="width: 50px;">
                                            Delivery Proof
                                        </div>
                                       

                                        <div class="buyAgain_btn"
                                            onclick="buyAgain('{{$dailyOrderDetailsList['data']['cart_id']}}')"><img
                                                src="{{asset('assets/images/buyagain.png')}}" alt="Buy" class="img-fluid">
                                            Buy Again
                                        </div>
                                        @endif
                                        <div class="cancelBtn text-end">
                                            @if($dailyOrderDetailsList['data']['order_status'] == "Pending")
                                            <div class="cancel_order_btn">
                                                <div class="cancel_orderBtn"
                                                    onclick="getCancelReasonList('{{ $dailyOrderDetailsList['data']['group_id'] }}', 'daily', '0')">
                                                    <img src="{{asset('assets/images/order-cancel.png')}}" alt="Cancel"
                                                        class="img-fluid"> Cancel Order
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="daily_payment_detail_section">
                                <div class="order-subheading">Payment Details</div>
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="order_details_list">
                                            <li style="display:flex;justify-content:space-between;align-items:center;gap:12px;">
                                                <span>Total Value:</span>
                                                <span>AED
                                                    {{number_format(($dailyOrderDetailsList['data']['total_products_mrp']+$dailyOrderDetailsList['data']['trail_discount']), 2)}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-12">
                                        <ul class="order_details_list">
                                            <li style="display:flex;justify-content:space-between;align-items:center;gap:12px;">
                                                <span>Delivery fees:</span>
                                                <span>AED
                                                    {{number_format($dailyOrderDetailsList['data']['delivery_charge'], 2)}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-12">
                                        <ul class="order_details_list">
                                            <li style="display:flex;justify-content:space-between;align-items:center;gap:12px;">
                                                <span>Delivery Partner Tip:</span>
                                                <span>AED
                                                    {{number_format($dailyOrderDetailsList['data']['del_partner_tip'], 2)}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-12">
                                        <ul class="order_details_list">
                                            <li style="display:flex;justify-content:space-between;align-items:center;gap:12px;">
                                                <span>Payment method:</span>
                                                <span>{{$dailyOrderDetailsList['data']['payment_method']}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    @if($dailyOrderDetailsList['data']['payment_method'] == "COD")

                                    <div class="col-12">
                                        <ul class="order_details_list">
                                            <li style="display:flex;justify-content:space-between;align-items:center;gap:12px;">
                                                <span>COD Extra Charges:</span>
                                                <span>AED
                                                    {{number_format($dailyOrderDetailsList['data']['cod_charges'], 2)}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                                    <div class="col-12">
                                        <div style="border-bottom: 0.5px solid #000; margin: 3px 0;"></div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                            <li>Order Value:
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                            <li><span>AED
                                                    @if($dailyOrderDetailsList['data']['order_type'] == 'trail')
                                                    {{number_format($dailyOrderDetailsList['data']['price_without_delivery'], 2)}}
                                                    @else
                                                    {{number_format($dailyOrderDetailsList['data']['total_price'], 2)}}
                                                    @endif
                                                    

                                                    </span>
                                            </li>
                                        </ul>
                                    </div>
                                    @if ($dailyOrderDetailsList['data']['order_type'] == 'trail')
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                            <li>Trial pack discount:
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                            <li><span style="color: green;">AED
                                                    {{number_format($dailyOrderDetailsList['data']['trail_discount'], 2)}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    @else
                                      <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                            <li>Wallet Applied:
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                            <li><span style="color: green;">AED
                                                    {{number_format($dailyOrderDetailsList['data']['paid_by_wallet'], 2)}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class=" col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                        <li>Coupon Applied: @if($dailyOrderDetailsList['data']['coupon_code'] != null) <span style="color: green;">({{ $dailyOrderDetailsList['data']['coupon_code'] }})</span> @endif</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                            <li><span style="color: green;">AED
                                                    {{number_format($dailyOrderDetailsList['data']['coupon_discount'], 2)}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif



                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list payment">
                                            <li>Amount to be Paid: </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="">
                                            <li><span><strong>
                                                        AED
                                                    @if($dailyOrderDetailsList['data']['order_type'] == 'trail')
                                                    {{number_format($dailyOrderDetailsList['data']['total_price'], 2)}}
                                                    @else
                                                    {{ number_format($dailyOrderDetailsList['data']['total_price'] - $dailyOrderDetailsList['data']['coupon_discount'] - $dailyOrderDetailsList['data']['paid_by_wallet'], 2) }}
                                                    @endif
                                                    </strong>
                                                </span> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                                @php
                                    $special = $dailyOrderDetailsList['data']['special_instruction'] ?? '';
                                    $partner = $dailyOrderDetailsList['data']['delivery_partner_instruction'] ?? '';
                                @endphp
                                
                                @if(!empty($special) || !empty($partner))
                                <div class="daily_payment_detail_section">
                                    <div class="order-subheading">Order Details</div>
                                    <ul class="order_details_list">
                                        <li>Order Instruction:
                                            <span>
                                                {{$dailyOrderDetailsList['data']['special_instruction']}}</span>
                                        </li>
                                    </ul>
                                    <ul class="order_details_list">
                                        <li>Delivery Partner Instruction:
                                            <span>{{$dailyOrderDetailsList['data']['delivery_partner_instruction']}}</span>
                                        </li>
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                        @if(isset($dailyOrderDetailsList['data']['data']) &&
                        count($dailyOrderDetailsList['data']['data']) > 0)
                        <div class="col-lg-6">
                            @foreach($dailyOrderDetailsList['data']['data'] as $productList)
                            <div class="order_infobox ">
                                <div class="ordered_product">
                                    <div class="product_imgbox">
                                        <a href="{{ url('product-details') }}/{{ Str::slug($productList['product_name']) }}/{{ trim($productList['product_id']) }}">
                                            <img src="{{$productList['varient_image']}}" alt="" class=" img-fluid">
                                        </a>
                                    </div>
                                    <div class="order_info">
                                        <div class="order_product_name">{{$productList['product_name']}}</div>
                                        <div class="order_details">
                                            <div class="row">
                                                <ul>
                                                    <li>Product Order ID: <span>{{$productList['order_cart_id']}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <ul>
                                                        <li>Quantity: <span>{{$productList['qty']}}</span></li>
                                                        <li>Weight: <span>{{$productList['unit']}}</span></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <ul>
                                                        <li>Discounted Price: <span class="price">AED
                                                                {{number_format($productList['price'], 2)}}</span></li>
                                                        <li>Amount: <span class="price">AED
                                                                {{number_format($productList['price'] * $productList['qty'], 2)}}</span>
                                                        </li>
    
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <ul>
                                                <!--<li>Discounted Price:-->
                                                <!--        <span>AED {{number_format($productList['price'], 2)}}</span>-->
                                                <!--    </li>-->
                                                    @if($productList['order_status_delivery'] == "Cancelled" )
                                                    <li>Reason:
                                                        <span>{{$productList['cancel_reason']}}</span>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="row">
                                                <ul>
                                                    @if($productList['product_feature_value'] != "" || $productList['product_feature_value'] != null )
                                                    <li>Your Packaging Preference:
                                                        <span>{{$productList['product_feature_value']}}</span>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="row">
                                                <div class="order_daily_detail_mainbox">
                                                    <ul>
                                                        <li>
                                                            @php
                                                                $hasOffer = false;
                                                                    foreach ($dailyOrderDetailsList['data']['data'] as $product) {
                                                                        $offerValue = $product['is_offer_product'] ?? 0;
                                                            
                                                                        if ($offerValue == 1 || $offerValue === '1') {
                                                                            $hasOffer = true;
                                                                            break;
                                                                        }
                                                                    }
                                                                
                                                            @endphp
                                                         
                                                                @if($productList['order_status_delivery'] == "Pending" && $hasOffer == false && $dailyOrderDetailsList['data']['order_type'] != 'trail' )
                                                            <div class="cancel_order_btn">
                                                                <div class="cancel_orderBtn"
                                                                    onclick="getCancelReasonList('{{ $productList['order_cart_id'] }}', 'dailyProduct', '0')">
                                                                    <img src="{{asset('assets/images/order-cancel.png')}}"
                                                                        alt="Cancel" class="img-fluid"> Cancel Product
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </li>
                                                        <li>
                                                        <div class="cancel_order_btn" style="display: flex; align-items: center; gap: 8px;">
                                                            <div class="daily-order-status-btn1"
                                                                style="color: {{ getProdOrderStatusColor($productList['prodorder_status']) }};">
                                                                {{ $productList['prodorder_status'] == 'Out_For_Delivery' ? "Out For Delivery" : getOrderStatus($productList['prodorder_status']) }}
                                                            </div>
    
                                                            @if($productList['prodorder_status'] == 'Cancelled')
                                                                <img src="{{ asset('assets/images/cancel.png') }}" alt=""
                                                                    style="width: 15px; height: 15px;">
                                                            @endif
                                                            @if($productList['prodorder_status'] == 'Completed')
                                                            <img src="{{ asset('assets/images/Success.png')}}" alt=""
                                                                style="width: 15px; height: 15px;">
                                                            @endif
                                                        </div>
                                                        </li>
                                                      
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Image Popup Modal -->
    <!--<div id="imagePopup" class="popup-container" onclick="closeImagePopup()">-->
    <!--    <div class="popup-content">-->
    <!--        <span class="close-btn" onclick="closeImagePopup()">&times;</span>-->
    <!--        <img id="popupImage" src="" alt="Delivery Proof">-->
    <!--    </div>-->
    <!--</div>-->
    <div class="modal fade" id="imagePopup" tabindex="-1" aria-labelledby="imagePopupLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imagePopupLabel">Delivery Proof</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="popupImage" src="" alt="Delivery Proof" class="img-fluid" />
                </div>

            </div>
        </div>
    </div>
    <script>
    function openImagePopup(imageUrl) {
        if (imageUrl === null || imageUrl === '') {
                Swal.fire({
                icon: 'warning',
                title: 'QuicKart',
                text: 'Delivery proof not available'
            });
        } else {
        const popupImage = document.getElementById('popupImage');
        popupImage.src = imageUrl;

        const myModal = new bootstrap.Modal(document.getElementById('imagePopup'));
        myModal.show();
        }
    }
    </script>
</section>
@include('footer')

@if(!empty($deliveryBoyTracking))
<script>
(function () {
    var box = document.getElementById('qkDboyTrack');
    var mapEl = document.getElementById('qkOrderTrackMap');
    if (!box) return;

    var pollUrl = box.getAttribute('data-poll-url');
    var groupId = box.getAttribute('data-group-id');
    var homeLat = parseFloat(box.getAttribute('data-home-lat'));
    var homeLng = parseFloat(box.getAttribute('data-home-lng'));
    var homeIconUrl = box.getAttribute('data-home-icon') || '';
    var driverIconUrl = box.getAttribute('data-driver-icon') || '';
    var mapsKey = box.getAttribute('data-maps-key') || '';
    if (!pollUrl || !groupId || !isFinite(homeLat) || !isFinite(homeLng)) return;

    var map = null;
    var directionsService = null;
    var directionsRenderer = null;
    var homeMarker = null;
    var driverMarker = null;
    var projectedRouteLine = null;
    var rotatedDriverIconUrl = '';
    var fitBoundsPadding = 56;
    var fitBoundsMaxZoom = 16;

    /** @returns {google.maps.Icon} */
    function markerIconHome() {
        return {
            url: homeIconUrl,
            scaledSize: new google.maps.Size(44, 44),
            anchor: new google.maps.Point(22, 22)
        };
    }

    /** @returns {google.maps.Icon} */
    function markerIconDriver() {
        return {
            url: rotatedDriverIconUrl || driverIconUrl,
            scaledSize: new google.maps.Size(48, 48),
            anchor: new google.maps.Point(24, 24)
        };
    }

    function buildRotatedDriverIcon(url, degrees, onDone) {
        if (!url) {
            onDone('');
            return;
        }
        var img = new Image();
        img.onload = function () {
            try {
                var w = img.naturalWidth || img.width || 48;
                var h = img.naturalHeight || img.height || 48;
                var canvas = document.createElement('canvas');
                canvas.width = w;
                canvas.height = h;
                var ctx = canvas.getContext('2d');
                if (!ctx) {
                    onDone('');
                    return;
                }
                ctx.translate(w / 2, h / 2);
                ctx.rotate((degrees * Math.PI) / 180);
                ctx.drawImage(img, -w / 2, -h / 2);
                onDone(canvas.toDataURL('image/png'));
            } catch (e) {
                onDone('');
            }
        };
        img.onerror = function () { onDone(''); };
        img.src = url;
    }

    function updateDriverMarker(riderLat, riderLng) {
        if (!map || !isFinite(riderLat) || !isFinite(riderLng)) return;
        var pos = { lat: riderLat, lng: riderLng };
        if (!driverMarker) {
            driverMarker = new google.maps.Marker({
                position: pos,
                map: map,
                title: 'Delivery partner (live)',
                icon: markerIconDriver(),
                zIndex: 100,
                optimized: false
            });
        } else {
            driverMarker.setPosition(pos);
        }
    }

    function fitMapToHomeAndDriver(riderLat, riderLng) {
        if (!map || !isFinite(riderLat) || !isFinite(riderLng)) return;
        var b = new google.maps.LatLngBounds();
        b.extend({ lat: riderLat, lng: riderLng });
        b.extend({ lat: homeLat, lng: homeLng });
        map.fitBounds(b, fitBoundsPadding);
        google.maps.event.addListenerOnce(map, 'idle', function () {
            var z = map.getZoom();
            if (isFinite(z) && z > fitBoundsMaxZoom) {
                map.setZoom(fitBoundsMaxZoom);
            }
        });
    }

    function updateProjectedRouteLine(riderLat, riderLng) {
        if (!map || !isFinite(riderLat) || !isFinite(riderLng)) return;
        var linePath = [
            { lat: riderLat, lng: riderLng },
            { lat: homeLat, lng: homeLng }
        ];
        if (!projectedRouteLine) {
            projectedRouteLine = new google.maps.Polyline({
                map: map,
                path: linePath,
                strokeOpacity: 0,
                geodesic: true,
                zIndex: 70,
                icons: [{
                    icon: {
                        path: 'M 0,-1 0,1',
                        strokeOpacity: 0.95,
                        strokeColor: '#2e7d32',
                        scale: 3
                    },
                    offset: '0',
                    repeat: '12px'
                }]
            });
            fitMapToHomeAndDriver(riderLat, riderLng);
            return;
        }
        projectedRouteLine.setPath(linePath);
        fitMapToHomeAndDriver(riderLat, riderLng);
    }

    function initDirectionsMap() {
        if (!mapEl || !window.google || !google.maps) return;
        map = new google.maps.Map(mapEl, {
            center: { lat: homeLat, lng: homeLng },
            zoom: 13,
            mapTypeControl: false,
            streetViewControl: false,
            fullscreenControl: true,
            rotateControl: false,
            gestureHandling: 'cooperative'
        });
        directionsService = new google.maps.DirectionsService();
        directionsRenderer = new google.maps.DirectionsRenderer({
            map: map,
            suppressMarkers: true,
            preserveViewport: false,
            polylineOptions: {
                strokeColor: '#3949ab',
                strokeWeight: 5,
                strokeOpacity: 0.85
            }
        });
        homeMarker = new google.maps.Marker({
            position: { lat: homeLat, lng: homeLng },
            map: map,
            title: 'Your delivery address',
            icon: markerIconHome(),
            zIndex: 50
        });
    }

    function drawDrivingRoute(riderLat, riderLng) {
        if (!directionsService || !directionsRenderer || !isFinite(riderLat) || !isFinite(riderLng)) return;
        updateDriverMarker(riderLat, riderLng);
        updateProjectedRouteLine(riderLat, riderLng);
        directionsService.route({
            origin: { lat: riderLat, lng: riderLng },
            destination: { lat: homeLat, lng: homeLng },
            travelMode: google.maps.TravelMode.DRIVING
        }, function (result, status) {
            if (status === 'OK' && result) {
                directionsRenderer.setDirections(result);
                var b = new google.maps.LatLngBounds();
                result.routes[0].bounds && b.union(result.routes[0].bounds);
                b.extend({ lat: riderLat, lng: riderLng });
                b.extend({ lat: homeLat, lng: homeLng });
                if (b.getNorthEast && b.getSouthWest) {
                    map.fitBounds(b, fitBoundsPadding);
                    google.maps.event.addListenerOnce(map, 'idle', function () {
                        var z = map.getZoom();
                        if (isFinite(z) && z > fitBoundsMaxZoom) {
                            map.setZoom(fitBoundsMaxZoom);
                        }
                    });
                }
                return;
            }
            fitMapToHomeAndDriver(riderLat, riderLng);
        });
    }

    function ensureMapsThen(run) {
        if (window.google && google.maps) {
            run();
            return;
        }
        if (!mapsKey) {
            return;
        }
        var cbName = '__qkOrderTrackMapInit_' + Date.now();
        window[cbName] = function () {
            try {
                run();
            } finally {
                delete window[cbName];
            }
        };
        var s = document.createElement('script');
        s.async = true;
        s.defer = true;
        s.src = 'https://maps.googleapis.com/maps/api/js?key=' + encodeURIComponent(mapsKey) +
            '&callback=' + encodeURIComponent(cbName);
        document.head.appendChild(s);
    }

    function tick() {
        fetch(pollUrl + '?group_id=' + encodeURIComponent(groupId), {
            credentials: 'same-origin',
            headers: { Accept: 'application/json' }
        })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (!data || !data.ok || !isFinite(data.rider_lat) || !isFinite(data.rider_lng)) return;
                if (map && directionsService) {
                    drawDrivingRoute(data.rider_lat, data.rider_lng);
                } else if (map) {
                    updateDriverMarker(data.rider_lat, data.rider_lng);
                    updateProjectedRouteLine(data.rider_lat, data.rider_lng);
                }
            })
            .catch(function () {});
    }

    if (mapsKey && mapEl) {
        buildRotatedDriverIcon(driverIconUrl, 90, function (rotatedUrl) {
            if (!rotatedUrl) return;
            rotatedDriverIconUrl = rotatedUrl;
            if (driverMarker) {
                driverMarker.setIcon(markerIconDriver());
            }
        });
        ensureMapsThen(function () {
            initDirectionsMap();
            tick();
        });
    } else {
        tick();
    }
    setInterval(tick, 30000);
})();
</script>
@endif

<script>
    function openInvoice(data) {
        console.log("Invoice data:", data);
        if (data === null || data === '') {
            Swal.fire({
                icon: 'warning',
                title: 'QuicKart',
                text: 'Order invoice not available'
            });
        } else {
           window.open(data, '_blank');
        }
    }
</script>
<script>
// function openImagePopup(imageSrc) {
//     let popup = document.getElementById("imagePopup");
//     document.getElementById("popupImage").src = imageSrc;
//     popup.classList.add("show-popup"); // Show modal
// }

// function closeImagePopup() {
//     let popup = document.getElementById("imagePopup");
//     popup.classList.remove("show-popup"); // Hide modal
// }
 </script>
<!-- Nevigrate to screen -->
<script>
function navigateToNextPage(url) {
    const nextPageUrl = url;

    window.location.href = nextPageUrl;
    console.log(window.location.href);
}
</script>
<!-- Buy again api call...G1 -->
<script>
function buyAgain(cartId) {
    console.log("Buy Again clicked for cart ID:", cartId);
    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "{{ENV('APP_URL')}}buyAgainAPICall";

    jQuery.ajax({
        url: url,
        method: "POST",
        data: {
            cartID: cartId,
            screenName: "daily",
            _token: _token,
        },
        success: function(result) {
            gtag('event', 'buy_againDailyW', {
                  cartID: cartId,
                  currency: 'AED',
                  type: "daily",
                  items: [],
                  debug_mode: false
                });
            console.log(result);
            localStorage.setItem("selectedTab", "1");
            navigateToNextPage(href = "{{ENV('APP_URL')}}cart?tab=1");



        },
        error: function(xhr, status, error) {
            console.error("XHR:", xhr);
            console.error("Status:", status);
            console.error("Error:", error);
            alert("An error occurred: " + xhr.responseText);
        },
    });

}
</script>
<!-- Nevigrate to screen -->
<script>
function navigateToNextPage(url) {
    const nextPageUrl = url;

    window.location.href = nextPageUrl;
    // console.log(window.location.href);
}
</script>