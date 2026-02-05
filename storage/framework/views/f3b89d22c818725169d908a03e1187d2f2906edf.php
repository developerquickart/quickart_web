

<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <section class="shop-list section-padding">
        <div class="container-fluid">
            <div class="row">
                <?php if(isset($searchbysort['data']) && count($searchbysort['data']) > 0): ?>
                <div class="product_list_box">
                    <?php echo $__env->make('Search.search-partial', ['productList' => $searchbysort['data']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               </div>
               <div class="ploader">
                <div id="loader" style="display: flex; justify-content: center; align-items: center;">
                    <img src="<?php echo e(asset('assets/images/loader.gif')); ?>" alt="Loading..." class="img-fluid" style="max-width:7%;" />
                </div>
              </div>
                <?php else: ?>
                <div class="shop-list section-padding">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6">
                                <div class="data_not_available">
                                    <div class="imageBox">
                                        <img src="<?php echo e(asset('assets/images/No_search_data_available.svg')); ?>"
                                            alt="empty cart" class="img-fluid">
                                    </div>
                                    <div class="textBox text-center">
                                        <p>Oops! It looks like we don't have that product right now.</p>
                                        <a href="<?php echo e(url('/')); ?>" class="my-4 d-block">
                                            <div class="cancel_btn">Let's Shop</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>


    <!-- ONCLICK CART BOX START -->
    <div class="cart_flating_btn" onclick="toggleOrderBox(event)">
        <small class="cart-value">0</small> <!-- This will be updated dynamically -->
        <img src="<?php echo e(asset('assets/images/grocery-store.svg')); ?>" alt="">
    </div>
    <div class="order_placeBox" id="orderBox" style="display: none;">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="freeDeliverytext">Congratulations! You've got <span>FREE DELIVERY</span></div>
                <div class="countText">0 items | AED 0</div> <!-- This will be updated -->
                <div class="saveText">You have saved <span>AED 0</span> on your order</div>
                <!-- This will be updated -->
            </div>
        </div>
    </div>
    <!-- ONCLICK CART BOX END -->
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
    function toggleOrderBox(event) {
        event.stopPropagation();
        const orderBox = document.getElementById('orderBox');
        orderBox.style.display = orderBox.style.display === 'none' ? 'block' : 'none';
    }
    document.addEventListener('click', function(event) {
        const orderBox = document.getElementById('orderBox');
        const cartButton = document.querySelector('.cart_flating_btn');

        if (!orderBox.contains(event.target) && !cartButton.contains(event.target)) {
            orderBox.style.display = 'none';
        }
    });
    </script>

   
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- select2 Js -->
    <!-- Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- Custom -->
    <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>

    <!-- FANCY BOX SCRIPT  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    
    <script>
    let pendingProductId = null;
    let action = null;
        function openCart() {
            localStorage.setItem("selectedTab", "1");
            navigateToNextPage(href = '<?php echo e(env('APP_URL')); ?>cart?tab=1');
        }
        function navigateToNextPage(url) {
            const nextPageUrl = url;
            window.location.href = nextPageUrl;
        }
        function openOrderPage() {
            localStorage.setItem("selectedOrderTab", "1");
            navigateToNextPage(href = '<?php echo e(env('
                APP_URL ')); ?>my-orders?tab=1');
        }
        
        function jumpNext(current, nextFieldId) {
          if (current.value.length >= 1) {
            document.getElementById(nextFieldId).focus();
          }
        }

        let isTimerRunning = false;

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
            var url = "<?php echo e(ENV('APP_URL')); ?>resend-otp";

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
            
            $('.back_register_btn').on('click',function(){
                $('#registration').modal('hide');
                $('#login').modal('show');
            });
            
            $('.otp_request').on('click',function(){
                
                    $.ajax({
                      url: "<?php echo e(route('loginsubmit')); ?>", // Change this to your actual URL
                      type: 'POST',
                      data: $('.login_form_step1').serialize(), // Send form data
                      success: function (response) {
                        // alert('Form submitted successfully!');
                        console.log(response);
                        if(response.success == true && response.popup == 'otp'){
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
                            $('#registration').modal('show');

                            $('.register_form').find('.country_code').val(response.country_code);
                            $('.register_form').find('.mobile_code').val(response.number);
                            $('.register_form').find('.flagcode').val(response.flag_code);
                            $('#login').modal('hide');
                        }else{

                        }
                        
                      },
                      error: function (xhr, status, error) {
                        // alert('Error submitting the form.');
                        console.error(error);
                      }
                    });
                
            
                
            });

        
            $('.otp_submit').on('click',function(){
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
                      url: "<?php echo e(route('loginotpsubmit')); ?>", // Change this to your actual URL
                      type: 'POST',
                      data: $('.login_form_step2').serialize(), // Send form data
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
                            if (pendingProductId) {
                                if(action == 'addToCart'){
                                    console.log('pendingProductId header',pendingProductId);
                                    addToCart(pendingProductId,1,true); //productID,change(+/-),isfromlogin(true/false)
                                    pendingProductId = null;
                                    openCart();    
                                }
                                if(action == 'wishlist'){
                                    console.log('pendingProductId header',pendingProductId);
                                    addToWishList(pendingProductId,1,true); //productID,change(+/-),isfromlogin(true/false)
                                    pendingProductId = null;
                                        Swal.fire({
                                        icon: 'success',
                                        title: 'Product added!',
                                        text: 'Product added in wishlist successfully !',
                                        timer: 3000,
                                        showConfirmButton: false
                                    });
                                    window.location.href="<?php echo e(url('wishlist')); ?>";  
                                }
                                if(action == 'notifyme'){
                                    console.log('pendingProductId header',pendingProductId);
                                    notifyMe(pendingProductId,pendingProductId,0,''); //productID,change(+/-),isfromlogin(true/false)
                                    pendingProductId = null;
                                        Swal.fire({
                                        icon: 'success',
                                        title: 'Product added!',
                                        text: 'Product added in notifylist successfully !',
                                        timer: 3000,
                                        showConfirmButton: false
                                    });
                                    window.location.href="<?php echo e(url('notify')); ?>";  
                                }
                            }else{
                                Swal.fire({
                                    icon: 'success',
                                    title: 'OTP Sent Successfully!',
                                    text: response.message,
                                    timer: 3000,
                                    showConfirmButton: false
                                });
                                window.location.href="<?php echo e(route('index')); ?>";
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
                $.ajax({
                  url: "<?php echo e(route('registeruser')); ?>", // Change this to your actual URL
                  type: 'POST',
                  data: $('.register_form').serialize(), // Send form data
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
            
        });

        
        function userLogout() {
            // Get CSRF token value
            var _token = $('meta[name="csrf-token"]').attr('content');
            // Perform AJAX request
            $.ajax({
            url: "<?php echo e(route('userLogout')); ?>",
            method: "POST",
            data: {},
            headers: {
            'X-CSRF-TOKEN': _token
            },
            success: function (response) {
                Swal.fire({
                title: 'Success!',
                text:'Logout successful. Have a great day!',
                icon: 'success',
                confirmButtonText: 'Ok'
                }).then((result) => {
                if (result.isConfirmed) {
                // Reload the page
                window.location.href="<?php echo e(route('index')); ?>";
                }
                });   
            }
            });
        }
    </script>
    
    <script>
    $('.ploader').hide();
    let page = 2;
    let isLoading = false;
    let hasMorePages = true;
    let totalPages = '<?php echo e($searchbysort['data'][0]['totalPages'] ?? 1); ?>';
    let $lastRow = getLastRowItems();

    $(document).ready(function () {
        $(window).scroll(function() {
            if ($lastRow.length && isRowInView($lastRow)) {
                if (!isLoading && hasMorePages) {
                    console.log(page,totalPages);
                    if(page <= totalPages){
                        loadMoreData(page);
                        page++;
                    }
                     
                }
            }
        });
    });    

    function loadMoreData(page) {
        isLoading = true;
        $('.ploader').show();

        var name="<?php echo e($keyword ?? ''); ?>";
        $.ajax({
            url: '<?php echo e(url("search")); ?>',
            type: "get",
            data: {'page':page,'name':name},
            success: function(data) {
                if (data.trim().length === 0) {
                    hasMorePages = false;
                    $('.ploader').html("");
                } else {
                    $(".product_list_box").append(data);
                    $('.ploader').hide();
                }
                isLoading = false;
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
                isLoading = false;
            }
        });
    }
    
    //Get all product items from the last row
   function getLastRowItems() {
    const $items = $('.all_product_list');
    let lastOffsetTop = 0;
    let $lastRowItems = $();

    $items.each(function () {
        const $this = $(this);
        const offsetTop = $this.offset().top;

        if (offsetTop > lastOffsetTop) {
            lastOffsetTop = offsetTop;
            $lastRowItems = $(); // reset for new row
        }

        if (offsetTop === lastOffsetTop) {
            $lastRowItems = $lastRowItems.add($this);
        }
    });

    return $lastRowItems;
}

    //Check if any item in the last row is visible
    function isRowInView($rowItems) {
        const windowBottom = $(window).scrollTop() + $(window).height();
    
        let visible = false;
        $rowItems.each(function () {
            const elTop = $(this).offset().top;
            if (elTop < windowBottom) {
                visible = true;
                return false; // break loop
            }
        });
    
        return visible;
    }
    
    document.addEventListener("DOMContentLoaded", function () {
        const loginModal = document.getElementById('login');
        // Listen for modal close event
        loginModal.addEventListener('hidden.bs.modal', function () {
            // Reset to login_step1
            document.querySelector('.login_step1').classList.remove('d-none');
            document.querySelector('.login_step2').classList.add('d-none');
            // Optionally clear form fields or error messages
            document.querySelector('.login_form_step1').reset();
            document.querySelector('.login_form_step2').reset();
            // Optional: Reset timer or messages
            document.getElementById('otpText').style.display = 'block';
            document.getElementById('resendLink').style.display = 'none';
        });
    });
</script>
<?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/Search/search.blade.php ENDPATH**/ ?>