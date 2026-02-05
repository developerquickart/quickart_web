@include('header')
<!-- cart section start -->
<section class="cart_section section-padding">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart_tabbing_mainBox">
                            <div class="cart_tabbing_tabs">
                                <a class="tablinks cart-tab-item active" id="dailyOrders"
                                    onclick="openCity(event, '1')">Daily Orders</a>
                                <a class="tablinks cart-tab-item" id="subscriptionOrders"
                                    onclick="openCity(event, '2')">Subscription Orders</a>
                            </div>
                            <div class="cart_tabbing_content" id="content">
                                <div id="1" class="tabcontent">
                                    <div class="content_Mainbox">
                                        @if(isset($dailyOrderList['status']) == 1)
                                        @if(!empty($dailyOrderList['data']))
                                        <div class="order-infoMainBox my-order-mainList">
                                            @foreach($dailyOrderList['data'] as $orderList)
                                            <div class="daily_order_infoBox my-order-list">
                                                <a
                                                    href="{{ url(ENV('APP_URL') . 'daily-order-details?group_id=' . $orderList['group_id']) }}">
                                                    <div class="daily_product">
                                                        <div class="order_info">
                                                            <div class="order_details">
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6">
                                                                        <ul>
                                                                            <li>Order ID:
                                                                                <span>{{$orderList['group_id']}}</span>
                                                                            </li>
                                                                            <li>Order Date:
                                                                                <span>{{ date("d-m-Y", strtotime($orderList['order_date'])) }}</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    @if ($orderList['orderType'] !="trail")
                                                                    <div class="col-lg-6 col-md-6 text-end">
                                                                        <div class="cancel_order_btn">
                                                                            <div class="daily-order-status-btn"
                                                                                style="color: {{ getProdOrderStatusColor($orderList['order_status']) }};"> 
                                                                                {{ $orderList['order_status'] == 'Out_For_Delivery' ? "Out For Delivery": getOrderStatus($orderList['order_status'])}}
                                                                            </div>
                                                                        </div>
                                                                        <ul>
                                                                            <li>AED
                                                                                <span>{{number_format($orderList['price_without_delivery'], 2)}}</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    @endif
                                                                    @if ($orderList['orderType'] =="trail")
                                                                    <div class="col-lg-6 col-md-6 text-end">
                                                                        <p class="text-with-bg">Trial Pack</p>
                                                                        <ul>
                                                                            <li>AED
                                                                                <span>{{number_format($orderList['price_without_delivery'], 2)}}</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    @endif
                                                                    <div
                                                                        style="border-bottom: 0.3px solid #dadbf0; margin-top: 5px; margin-bottom: 5px ">
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <ul>
                                                                            <li>{{$orderList['productname']}}</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @endforeach
                                        </div>
                                        @else
                                        <div class="shop-list section-padding">
                                            <div class="container">
                                                <div class="row align-items-center justify-content-center">
                                                    <div class="col-lg-6">
                                                        <div class="data_not_available">
                                                            <div class="imageBox">
                                                                <img src="{{asset('assets/images/No_product_available.png')}}" alt="empty cart"
                                                                    class="img-fluid">
                                                            </div>
                                                            <div class="textBox text-center">
                                                                <a href="/" class="my-4 d-block">
                                                                    <div class="cancel_btn">Let's Shop</div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endif
                                    </div>
                                </div>
                                <div id="2" class="tabcontent" style="display: none;">
                                    <div class="content_Mainbox">
                                        @if(isset($subscriptionOrderList['status']) == 1)
                                        @if(!empty($subscriptionOrderList['data']))
                                        <div class="sub_order_listBox my-order-mainList">
                                            @foreach($subscriptionOrderList['data'] as $orderList)
                                            <div class="sub_order_list my-order-list">
                                                <div class="sub_order_details">
                                                    <!--<a class="orderBox_box"-->
                                                    <!--    onclick="navigateToNextPage('{{ url(ENV('APP_URL') . 'subscription-order-product?group_id=' . $orderList['group_id']) }}')">-->
                                                    <a class="orderBox_box" href="{{ url(ENV('APP_URL') . 'subscription-order-product?group_id=' . $orderList['group_id']) }}" >
                                                        <div class="sub_order_name" id="sgroup_id">Order ID:
                                                            <span>#{{$orderList['group_id']}}</span>
                                                        </div>
                                                        <div class="sub_order_id">Order Date:
                                                            <span>{{ date("d-m-Y", strtotime($orderList['order_date']))}}</span>
                                                        </div>
                                                    </a>
                                                   
                                                    <hr>
                                                    <!-- <div style="border-bottom: 0.3px solid #dadbf0; margin-top: 5px; margin-bottom: 5px"></div> -->
                                                    <div class="col-lg-12">
                                                        <ul>
                                                            <li>{{$orderList['productname']}}</span></li>
                                                        </ul>
                                                        <div class="sub_order_btns">
                                                        @if(isset($orderList['order_status']) && $orderList['order_status'] == 'Completed')                                                        
                                                        <div class="buyAgain_btn" onclick="buyAgain('{{ $orderList['group_id'] }}')">
                                                            <img src="{{asset('assets/images/buyagain.png')}}"
                                                                alt="buyAgain" class="img-fluid">
                                                            Buy Again</div>
                                                        @endif
                                                        @if(isset($orderList['si_order']) && $orderList['si_order'] == 'yes' && $orderList['order_status'] != 'Completed' && $orderList['order_status'] != 'Cancelled')
                                                        <div class="change_card" data-bs-toggle="modal"
                                                            data-bs-target="#cardModal"
                                                            onclick="fetchCardList('{{ $orderList['si_sub_ref_no'] }}', '{{ $orderList['cart_id'] }}')">
                                                            <img src="{{asset('assets/images/card.png')}}" alt="card"
                                                                class="img-fluid">Change Card
                                                        </div>
                                                        @endif
                                                        @if(isset($orderList['order_status']) &&
                                                        $orderList['order_status'] == 'Completed')

                                                        @php
                                                            $jsonData1 = json_encode($orderList);
                                                         //   print_r($jsonData1);
                                                            $encodedData1 = urlencode($jsonData1);
                                                        @endphp
                                                        <a href="{{ ENV('APP_URL') }}rating-reviews?screenName=subreview&data={{ $encodedData1 }}">
                                                            <div class="rate_order_btn">Rate Order</div>
                                                        </a>
                                                        @endif
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="sub_order_priceBox"
                                                    onclick="navigateToNextPage('{{ url(ENV('APP_URL') . 'subscription-order-product?group_id=' . $orderList['group_id']) }}')">
                                                    <div class="priceBox">AED
                                                        <span>{{number_format($orderList['total_mrp'], 2)}}</span>
                                                    </div>
                                                </div>
                                                <div class="view_box"
                                                    onclick="navigateToNextPage('{{ url(ENV('APP_URL') . 'subscription-order-product?group_id=' . $orderList['group_id']) }}')">
                                                    View Details</div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @else
                                        <div class="shop-list section-padding">
                                            <div class="container">
                                                <div class="row align-items-center justify-content-center">
                                                    <div class="col-lg-6">
                                                        <div class="data_not_available">
                                                            <div class="imageBox">
                                                                <img src="{{asset('assets/images/No_product_available.png')}}" alt="empty cart"
                                                                    class="img-fluid">
                                                            </div>
                                                            <div class="textBox text-center">
                                                                <a href="{{url('/')}}" class="my-4 d-block">
                                                                    <div class="cancel_btn">Let's Shop</div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Selected card list modal...G1 -->
<div class="modal fade" id="cardModal" tabindex="-1" aria-labelledby="cardModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cardModalLabel">Saved Cards</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="cardListContainer">
                        <p>Loading...</p> <!-- This will be replaced with actual data -->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Loader (Initially Hidden) -->
    <div id="loader" style="display: flex; justify-content: center; align-items: center;">
        <img src="{{ asset('assets/images/loader.gif') }}" alt="Loading..." class="img-fluid" style="max-width:10%" />
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        showLoader();
        setTimeout(() => {
            hideLoader();
        }, 2000);
    });

    function showLoader() {
        document.getElementById("loader").style.display = "flex";
        document.getElementById("content").style.display = "none";
    }

    function hideLoader() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("content").style.display = "block";
    }

    function switchTab(tabId) {
        showLoader();
        setTimeout(() => {
            hideLoader();
            let tabs = document.querySelectorAll(".tabcontent");
            tabs.forEach(tab => tab.style.display = "none");

            document.getElementById(tabId).style.display = "block";
        }, 1500);
    }
    </script>


    <!-- <div id="ajaxLoader" style="display: none;">
        <img src="{{asset('assets/images/loader.gif')}}" alt="Loading...">
    </div> -->
</section>
<!-- cart section end -->

@include('footer')

<!-- TABBING SCRIPT START -->
<script>
function openCity(evt, tabId) {
    

    var tabcontent = document.querySelectorAll(".tabcontent");
    tabcontent.forEach(tab => tab.style.display = "none");

    var tablinks = document.querySelectorAll(".tablinks");
    tablinks.forEach(tab => tab.classList.remove("active"));
    var activeTab = document.getElementById(tabId);
    if (activeTab) {
        activeTab.style.display = "block";
    }

    if (evt) {
        evt.currentTarget.classList.add("active");
    } else {
        var savedTabLink = document.querySelector(`[onclick="openCity(event, '${tabId}')"]`);
        if (savedTabLink) {
            savedTabLink.classList.add("active");
        }
    }

    // Store selected tab in localStorage
    localStorage.setItem("selectedOrderTab", tabId);
}

document.addEventListener("DOMContentLoaded", function() {
    var savedTab = localStorage.getItem("selectedOrderTab") || "1";
    openCity(null, savedTab);

    document.getElementById("dailyOrders").addEventListener("click", function(event) {
        localStorage.setItem("selectedOrderTab", 1);
        let url = new URL(window.location);
        url.searchParams.set('tab', 1);
        window.location.href = url.toString();
        openCity(event, "1");
    });

    document.getElementById("subscriptionOrders").addEventListener("click", function(event) {
        openSubscriptionTap(event);
    });
});

function openSubscriptionTap(event) {
    localStorage.setItem("selectedOrderTab", 2);
    let url = new URL(window.location);
    url.searchParams.set('tab', 2);
    window.location.href = url.toString();
    openCity(event, "2");
}
</script>

<!-- TABBING SCRIPT END -->

<!-- Show card list api call...G1 -->
<script>

    function fetchCardList(siNO,cartId) {
        console.log("AJAX si:1", siNO);
        console.log("AJAX cartId:1", cartId);

        var _token = jQuery('meta[name="csrf-token"]').attr('content');
        var url = "{{ENV('APP_URL')}}showCardList";

        jQuery.ajax({
            url: url, method: "POST", data: {
                screenName: "subscription",
                _token: _token
            },

            success: function (response) {
                // console.log("AJAX Success:", btnName);
                if (response.success === '1') {
                    let cardListContainer = $("#cardListContainer");
                    cardListContainer.empty(); // Clear previous content
                    let data = response.action;

                    if (data && data.data.length > 0) {
                        let cardHtml = '<div class="card_listingBox"><form>';

                        data.data.forEach((cardList, index) => {
                            // Start a new row for every even index
                            if (index % 2 === 0) {
                                cardHtml += `<div class="row">`;
                            }

                            cardHtml += `
                                <div class="col-lg-6">
                                    <div class="payment_method">
                                        <label class="payment_option cards" for="card${cardList.si_sub_ref_no}">
                                            <div style="display: flex; justify-content: space-between;">
                                                <div class="card_text">Card</div>
                                            </div>
                                            <input type="radio" name="payment" id="card${cardList.si_sub_ref_no}" 
                                                data-subref="${cardList.si_sub_ref_no}" 
                                                data-cardno="${cardList.card_no}"  
                                                data-cartid="${cartId}" 
                                                ${cardList.si_sub_ref_no == siNO ? 'checked' : ''} 
                                                onchange="saveSelectedCardData(this)"/>

                                            <div class="plan-content">
                                                <div class="plan-details">
                                                    <div class="payment_details">
                                                        <div class="cards_img">
                                                            <img src="{{asset('assets/images/card.png')}}" alt="card">
                                                        </div>
                                                        <div class="card_text">${cardList.card_no}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            `;

                            // Close the row after two items or when it's the last item
                            if (index % 2 === 1 || index === data.data.length - 1) {
                                cardHtml += `</div>`; 
                            }
                        });

                        cardHtml += '</form></div>';
                        cardListContainer.html(cardHtml);
                    } else {
                        cardListContainer.html("<p>No cards found.</p>");
                    }
                } else {
                    alert("Error: " + response.message);
                }

            }
            , error: function (xhr, status, error) {

                alert("An error occurred: " + xhr.responseText);
            }
            ,
        });

    }

    // Function to handle selected address
    function saveSelectedCardData(element) {
        let siSubRefNo = element.getAttribute("data-subref");
        let cartNo = element.getAttribute("data-cartid");
            changeCardApiCall(siSubRefNo, cartNo)
        $('#cardModal').modal('hide');


    }

</script>
<!-- Change card api call...G1 -->
<script>
    function changeCardApiCall(siNo, cartId) {
        const sgroup_id = document.getElementById("sgroup_id").value;
        var _token = jQuery('meta[name="csrf-token"]').attr('content');
        var url = "{{ENV('APP_URL')}}changeCardAPICall";

        jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                cartID: cartId,
                siNo:siNo,
                screenName:"subscription",
                _token: _token,
            },
            success: function (result) {
                //  console.log("done", result.success);
                 var status = result.success;
                 Swal.fire({
                            title: result.message
                            , showDenyButton: false
                            , showCancelButton: false
                            , icon: "sucess"
                            , confirmButtonText: "OK"
                        , }).then((result) => {
                            if (result.isConfirmed) {
                                if(status== 1) {
                                window.location.reload();
                                }
                            }
                        });
            },
            error: function (xhr, status, error) {
                console.error("XHR:", xhr);
                console.error("Status:", status);
                console.error("Error:", error);
                alert("An error occurred: " + xhr.responseText);
            },
        });

    }

</script>
<!-- Buy again api call...G1 -->
<script>
    function buyAgain(gid) {
        const sgroup_id = document.getElementById("sgroup_id").value;
        var _token = jQuery('meta[name="csrf-token"]').attr('content');
        var url = "{{ENV('APP_URL')}}buyAgainAPICall";
//    console.log("sgroup_id", gid);
        jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                cartID: gid,
                screenName:"subscription",
                _token: _token,
            },
            success: function (result) {
                gtag('event', 'buy_againW', {
                  group_id: gid,
                  currency: 'AED',
                  type: "subscription",
                  items: [],
                  debug_mode: false
                });
                localStorage.setItem("selectedTab", "2");
                navigateToNextPage(href="{{ENV('APP_URL')}}cart?tab=2");
            },
            error: function (xhr, status, error) {
                console.error("XHR:", xhr);
                console.error("Status:", status);
                console.error("Error:", error);
                alert("An error occurred: " + xhr.responseText);
            },
        });

    }

</script>