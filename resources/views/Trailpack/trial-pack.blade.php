@include('header')
<section class="trial_pack_section">
    <div class="container">
        <div class="section-header">
            <h5 class="heading-design-h5">Trial Pack</h5>
        </div>
        @if(isset($productList['data']) && count($productList['data']) > 0)
        <div class="row">

                <div class="col-lg-12">

                    <div class="trial_pack_mainbox">
                        @foreach($productList['data'] as $productListT)
                            <div class="trial_pack_listing">
                                <div class="tial_pack_img">
                                    <img src="{{$productListT['image']}}" alt="Trial Pack Images" class="img-fluid">
                                </div>
                                <div class="trial_pack_headingbox"
                                    onclick="ShowTrailPackProduct('<?= $productListT['id'] ?>', '<?= $productListT['title'] ?>')">
                                    <h2 class="trial_pack_heading">
                                        {{$productListT['title']}}
                                    </h2>
                                    <div class="trial_pack_arrow">
                                        <img src="assets/images/next.svg" alt="Arrow" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        @else
        <div class="shop-list section-padding">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-6">
                            <div class="data_not_available">
                                <div class="imageBox">
                                    <img src="{{asset('assets/images/No_product_available.png')}}"
                                        alt="empty cart" class="img-fluid">
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
    </div>
</section>

<!-- Pop up start -->
<!-- Modal -->
<div class="modal fade trial_pack_model" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Pack</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBodyContent">
                <!-- Dynamic content will be loaded here -->
            </div>
            <div class="modal-footer">
                <div class="cart_btn" id="cartButtonContainer">
                    <!-- Dynamic button will be inserted here -->
                </div>
                <div class="go_to_cart_btn1" id="buyNowButtonContainer">
                    <!-- Dynamic button will be inserted here -->
                </div>
                <!-- <button type="button" class="go_to_cart_btn" onclick="buyNow()">BUY NOW</button> -->
            </div>
        </div>
    </div>
</div>
<!-- Pop up ends -->



<!-- Show trial pack product api call...G1 -->
<script>
    var currentUserID = "{{$data_arr['user_id'] ?? ''}}";
    $(document).on('click','.add-to-cart-btn',function(){
        if(currentUserID == ''){
             action = 'trailpack';
             afterLoginAction = jQuery(this).data('action');
             pendingProductId = jQuery(this).data('id');
             console.log(pendingProductId,action);
             $('.trial_pack_model').modal('hide');
             $('#login').modal('show');
        }else{
            var varientId = jQuery(this).data('id');
            var action1 = jQuery(this).data('action');
            buyNow(varientId,action1);
        }
    });
    
    function ShowTrailPackProduct(trialPID, title) {

        // console.log("First ID:", trialPID);
        // console.log("Second ID:", cartQty);

        var _token = jQuery('meta[name="csrf-token"]').attr('content');
        var url = "{{ENV('APP_URL')}}showTrialPackProduct";

        jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                trialPID: trialPID,
                _token: _token,
            },

            success: function (result) {
                // console.log("AJAX Success:", result); 

                if (result.status === 'success') {

                    // console.log("Second ID:", result.data);

                    $('#staticBackdropLabel').text(title);
                    $('#modalBodyContent').html(result.htmlcode);

                    // Update the cart button based on cartQty
                    const cartButtonContainer = document.getElementById('cartButtonContainer');
                    if (result.data['cartQty'] > 0) {
                        cartButtonContainer.innerHTML = `
                                <button class="add-to-cart-btn" data-action="buyNow">
                                    GO TO CART
                                </button>
                            `;
                    } else {
                        // onclick="buyNow('${result.data.id}', 'add')"
                        cartButtonContainer.innerHTML = `
                            <button class="add-to-cart-btn" data-id="${result.data.id}" data-action="add" >
                                ADD TO CART
                            </button>
                        `;
                        
                         // onclick="buyNow('${result.data.id}', 'buyNow')"
                        const buyNowButtonContainer = document.getElementById('buyNowButtonContainer');
                        buyNowButtonContainer.innerHTML = `
                            <button class="go_to_cart_btn add-to-cart-btn" data-id="${result.data.id}" data-action="add" >
                                BUY NOW
                            </button>
                        `;
                    }
                    
                   

                    const modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
                    modal.show();
                } else {
                    alert("Error: " + result.message);
                }
            },
            error: function (xhr, status, error) {

                alert("An error occurred: " + xhr.responseText);
            },
        });

    }
</script>


@include('footer')