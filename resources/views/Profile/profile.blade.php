@include('header')

<?php
$tag=@$_GET['tag'];
$referralCode = $getUserProfile['data']['referral_code'] ?? '';
$referralText = $getUserProfile['data']['referral_message'] ?? '';
?>
<section class="account-page section-padding">
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
                                    <a onclick="openOrderPage()" href="javascript:void(0)" class="sub-menu-list-link">My Order</a>
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
                                <div class="sub-menu-list dropdown" data-bs-toggle="collapse" data-bs-target="#referFriend" aria-expanded="false" aria-controls="referFriend">Refer with friends</div>
                                <div class="collapse" id="referFriend" data-bs-parent="#side-menu" style="background-color: transparent;">
                                    <div class="share-options1 justify-content-center my-2">
                                        <a class="share-facebook" target="_blank">
                                            <img src="{{ asset('assets/images/facebook-fill.svg') }}" alt="Facebook">
                                        </a>
                                        <a class="share-twitter" target="_blank">
                                            <img src="{{ asset('assets/images/twitter-fill.svg') }}" alt="Twitter">
                                        </a>
                                        <a class="share-linkedin" target="_blank">
                                            <img src="{{ asset('assets/images/linkedin-fill.svg') }}" alt="Linkedin">
                                        </a>
                                        <a class="share-instagram" target="_blank">
                                            <img src="{{ asset('assets/images/instagram-fill.svg') }}" alt="Instagram">
                                        </a>
                                        <a class="share-whatsapp" target="_blank">
                                            <img src="{{ asset('assets/images/whatsapp-fill.svg') }}" alt="Whatsapp">
                                        </a>
                                    </div>
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
            <div class="sidemenu_content_mainBox">
                <div class="content_headingBox">
                    <div class="heading-design-h5">My Account</div>
                    <div class="edit_btn" data-bs-toggle="modal" data-bs-target="#profile">
                        <img src="{{asset('assets/images/edit.png')}}" alt="edit">
                    </div>
                </div>
                @if(isset($getUserProfile['data']))
                <div class="contentData">
                    <div class="added_profileData">
                        <div class="profile_img">
                            <div class="profile_detail">
                                <div class="avatar-upload">
                                    <div class="avatar-preview">
                                        <div id="profileImagePreview"
                                            style="background-image: url({{$getUserProfile['data']['user_image']}});">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile_formBox">
                            <fieldset class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{$getUserProfile['data']['name']}}" disabled>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="mobile">Mobile Number</label>
                                <input type="text" name="mobile" id="mobile"
                                    class="form-control"
                                    value="{{$getUserProfile['data']['country_code']}} {{$getUserProfile['data']['user_phone']}}"
                                    disabled>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{$getUserProfile['data']['email']}}" disabled>
                            </fieldset>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>


<!-- EDIT PROFILE MODEL START -->
<div class="modal" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="row">
                <div class="col-lg-12">
                    <div class="loginBox">
                        <div class="heading-design-h5 text-center my-3">Profile Edit</div>
                        <div class="formBox">
                            <form action="" method="post" id="edit-profile-form" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-lg-11">
                                        <div class="profile_img">
                                            <div class="profile_detail">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type='file' id="imageUpload"
                                                            accept=".png, .jpg, .jpeg" name="image" />
                                                        <label for="imageUpload"></label>
                                                    </div>
                                                    <div class="avatar-preview">
                                                        <div id="imagePreview"
                                                            style="background-image: url({{$getUserProfile['data']['user_image']}});">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <fieldset class="form-group">
                                            <label for="profile-name">Full Name</label>
                                            <input type="name" class="form-control" id="profile-name"
                                                name="profile_name" pattern="[a-zA-Z\s]*" required="" autocomplete="off"
                                                value="{{$getUserProfile['data']['name']}}">
                                        </fieldset>
                                        <fieldset class="form-group" data-bs-toggle="modal"
                                            data-bs-target="#edit-mobile">
                                            <label for="profile-mobile">Mobile Number</label>
                                            <input type="text" class="form-control" id="profile-mobile"
                                                name="profile_mobile" maxlength="12" minlength="12" required value="{{$getUserProfile['data']['country_code']}} {{$getUserProfile['data']['user_phone']}}">
                                            <input type="hidden" name="country_code" value="{{$getUserProfile['data']['country_code']}}">    
                                            <input type="hidden" name="user_phone" value="{{$getUserProfile['data']['user_phone']}}">    
                                        </fieldset>
                                        <fieldset class="form-group" data-bs-toggle="modal"
                                            data-bs-target="#edit-email">
                                            <label for="profile_email">Email</label>
                                            <input type="email" class="form-control" id="profile-email"
                                                name="profile_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                                                required="" autocomplete="off" value="{{$getUserProfile['data']['email']}}">
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <fieldset class="form-group mb-0 text-center">
                                            <button type="submit" class="submit_btn text-center">Save & Update</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                            <div class="row justify-content-center">
                                <div class="col-lg-11">
                                    <hr>
                                    <div class="delete_accountBox pb-3">
                                        <a href="" class="delete_account">Delete My Quickart Account > </a>
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
<!-- EDIT PROFILE MODEL END -->

<!-- EDIT MOBILE MODEL START -->
<div class="modal" id="edit-mobile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-5">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="row">
                <div class="col-lg-12">
                    <div class="loginBox text-center">
                        <div class="order-subheading">Add Your Phone Number</div>
                        <p>Add Your Phone Number. You will recieve an OTP</p>
                        <form action="" class="update-mobile">
                            @csrf
                            <fieldset>
                                <!-- <input type="text" name="mobile" id="mobile" class="form-control"
                                    value="{{$getUserProfile['data']['country_code']}} {{$getUserProfile['data']['user_phone']}}" required>
 -->
                                <div class ="form-group">
                                <label for="mobile_code">Mobile Number <span
                                        class="required_icon">*</span></label>
                                <input type="text" id="mobile_code3" class="form-control"  name="mobile_code" data-index="1" required value="{{$getUserProfile['data']['user_phone']}}">
                                <input type="hidden" id="countryCode3" name="country_code" class="" value="{{$getUserProfile['data']['country_code']}}">
                                <input type="hidden" id="flagcode3" name="flag_code" class="" value="{{$getUserProfile['data']['dial_code']}}">
                                <input type="hidden" name="change_type" value="mobile" />
                                <div id="error-msg3" class="hide error-msg error"></div>
                                <!-- <div id="valid-msg3" class="hide valid-msg"></div> -->
                                <div class="error" id="error-mobile_code"></div>    
                                
                            </div>    
                            </fieldset>
                            <fieldset class="form-group my-3 text-center">
                                <button type="button" class="submit_btn text-center mobile_otp_request" >Get OTP</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- EDIT MOBILE MODAL END -->
<!-- EDIT EMAIL ID MODEL START -->
<div class="modal" id="edit-email" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-5">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="row">
                <div class="col-lg-12">
                    <div class="loginBox text-center">
                        <div class="order-subheading">Add Your Email Id</div>
                        <p>Add Your Email Id. You will recieve an OTP</p>
                        <form action=" " class="update-email">
                             @csrf
                            <fieldset>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{$getUserProfile['data']['email']}}" required>
                                <input type="hidden" name="change_type" value="email" />    
                                <div class="error" id="error-email"></div>    
                            </fieldset>
                            <fieldset class="form-group my-3 text-center">
                                <button type="button" class="submit_btn text-center email_otp_request">Get OTP</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- EDIT EMAIL ID MODAL END -->
<!-- GET OTP MODEL START -->
<div class="modal" id="get-otp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-5">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="row">
                <div class="col-lg-12">
                    <div class="loginBox text-center">
                        <div class="order-subheading">Verify your details</div>
                        <p class="text-center mobile-otp-text">Your OTP has been sent to <span class="entered_mobile"> </span> through SMS &  WhatsApp</p>
                        <p class="text-center email-otp-text">Your OTP has been sent to <span class="entered_email"> </span> via email</p>
                        <form action="" class="update-verify-otp-form">
                            @csrf
                            <input type="hidden" name="otp" class="otp" id="otp" />
                            <input type="hidden" name="lastid" class="lastid" id="lastid" />
                            <input type="hidden" name="resend" class="resend" id="resend"/>
                            <fieldset>
                                <div class="otp-input">
                                   <input type="text" min="0" max="1" maxlength="1"
                                        class="form-control otp-value" required id="otpf" oninput="jumpNext(this, 'otps')">
                                    <input type="text" min="0" max="1" maxlength="1"
                                        class="form-control otp-value" required id="otps" oninput="jumpNext(this, 'otpt')">
                                    <input type="text" min="0" max="1" maxlength="1"
                                        class="form-control otp-value" required id="otpt" oninput="jumpNext(this, 'otpft')">
                                    <input type="text" min="0" max="1" maxlength="1"
                                        class="form-control otp-value" required id="otpft">
                                </div>
                                 <div class="resend-text" id="resendWrapper1">
                                    <span id="profileOtpText">
                                        Didn't receive OTP?
                                        <span id="profileTimer">00:30</span>
                                    </span>
                                    <a href="javascript:void(0)" id="profileResendLink"
                                        style="display:none;" >Resend
                                        OTP</a>
                                </div>
                            </fieldset>
                            <fieldset class="form-group my-3 text-center">
                                <button type="button" class="submit_btn text-center back_btn">Back</button>
                                <button type="button" class="submit_btn text-center update_otp_submit">Verify & Continue</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- GET OTP MODAL END -->

<!-- TABBING SCRIPT START -->
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

document.addEventListener("DOMContentLoaded", function() {
    openCity(null, savedTab);

});



function openOrderPage() {
    localStorage.setItem("selectedOrderTab", "1");
    navigateToNextPage(href = '{{ env('
        APP_URL ') }}my-orders?tab=1');
}

function navigateToNextPage(url) {
    const nextPageUrl = url;
    window.location.href = nextPageUrl;
}


</script>
<!-- TABBING SCRIPT END -->
<!-- PRODUCT SHARE BUTTON SCRIPT START -->

<script>
document.addEventListener('DOMContentLoaded', function () {
    const referralCode = @json($referralCode);
     const referralText = @json($referralText);

    const productUrl = encodeURIComponent(`https://www.quickart.ae/SignUpScreen?refCode=${referralCode}`);
    // const shareText = encodeURIComponent(`Hi! Use my reference code ${referralCode} to signup in QuicKart app. After successful sign up you will get wallet amount. Tap link to download app -`);
    const shareText = encodeURIComponent(`${referralText} Tap link to download app -`);

    // Update share links
    document.querySelector('.share-facebook').href = `https://www.facebook.com/sharer/sharer.php?u=${productUrl}`;
    // document.querySelector('.share-linkedin').href = `https://www.linkedin.com/sharing/share-offsite/?url=${productUrl}`;
    document.querySelector('.share-twitter').href = `https://twitter.com/intent/tweet?url=${productUrl}&text=${shareText}`;
    document.querySelector('.share-whatsapp').href = `https://wa.me/?text=${shareText}%20${productUrl}`;
    // document.querySelector('.share-instagram').href = `https://www.instagram.com/`; // Instagram has no direct share-to-post
    document.querySelector('.share-linkedin').addEventListener('click', () => {
      const productUrl = window.location.href;

      if (navigator.share) {
        navigator.share({
          title: "My Product",
          text: shareText,
          url: productUrl
        }).catch(err => console.log("Share failed:", err));
      } else {
        // fallback to LinkedIn web share
        window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(productUrl)}`, "_blank");
      }
    });
    function isMobile() {
      return /Mobi|Android|iPhone|iPad|iPod/i.test(navigator.userAgent);
    }
    if (isMobile()) {
    document.querySelector('.share-instagram').addEventListener('click', () => {
        const productUrl = window.location.href;

      if (navigator.share) {
        navigator.share({
          title: "My Product",
          text: shareText,
          url: productUrl
        })
        .then(() => console.log("Shared successfully"))
        .catch(err => console.error("Share failed:", err));
      } else {
        alert("Sharing not supported in this browser. Copy this link: " + productUrl);
      }
    });
    } else {
         document.querySelector('.share-instagram').href = "https://www.instagram.com/direct/new/?text=" + productUrl;
    }
    // Copy to clipboard
    const copyBtn = document.querySelector('.copy-link');
    copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(window.location.href).then(() => {
            alert('Link copied to clipboard!');
        });
    });
});
</script>
<!-- PROFILE SCRIPT START -->
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').style.backgroundImage = 'url(' + e.target.result + ')';
            document.getElementById('imagePreview').style.display = 'none';
            document.getElementById('imagePreview').style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}

document.getElementById("imageUpload").addEventListener("change", function() {
    readURL(this);
});

$(document).ready(function() {
    
    const myModal = document.getElementById('edit-mobile');
    myModal.addEventListener('hidden.bs.modal', function () {
      location.reload();
    });
    
    const myModal1 = document.getElementById('edit-email');
    myModal1.addEventListener('hidden.bs.modal', function () {
      location.reload();
    });
    
    const myModal2 = document.getElementById('get-otp');
    myModal2.addEventListener('hidden.bs.modal', function () {
      location.reload();
    });
    
    
    $('.back_btn').on('click',function(){
        if($('#resend').val() == 'mobile'){
            $('#edit-mobile').modal('show');
        }else{
            $('#edit-email').modal('show');
        }
        $('#get-otp').modal('hide');
    });
    
    $('#get-otp').on('show.bs.modal', function (e) {
      $('.otp-value').val('');
    });
      
    $('#edit-profile-form').on('submit', function(e) {
      e.preventDefault();

      $('#formErrors').html('');

       let form = $('#edit-profile-form')[0]; // plain DOM element
       let formData = new FormData(form); // includes file

        jQuery.ajax({
            url:"{{route('update-profile')}}",
            method: "POST",
            data: formData, 
            processData: false, // Don't process data
            contentType: false, // Let browser set it (multipart/form-data)
            success: function(response) {
              Swal.fire({
                    icon: 'success',
                    title: 'Profile updated Successfully!',
                    text: response.message,
                    timer: 3000,
                    showConfirmButton: false
                });
                gtag('event', 'update_profileW', {
                  method: 'form', 
                  status: 'success',
                   debug_mode: false
                });
                window.location.reload();
            },
            error: function(xhr) {
              if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                let html = '<ul>';
                $.each(errors, function(field, messages) {
                  messages.forEach(msg => {
                    html += `<li>${msg}</li>`;
                  });
                });
                html += '</ul>';
                $('#formErrors').html(html);
              }
            }
        });
    });

    $('.mobile_otp_request').on('click',function(){
          
            $.ajax({
              url: "{{ route('sendOtp') }}", // Change this to your actual URL
              type: 'POST',
              data: $('.update-mobile').serialize(), // Send form data
              success: function (response) {
                // alert('Form submitted successfully!');
                console.log(response);
                if(response.success == true){
                    $('.mobile-otp-text').find('.entered_mobile').html(response.country_code+' '+response.number);
                    $('.email-otp-text').addClass('d-none');
                    $('.mobile-otp-text').removeClass('d-none');
                    $('.update-mobile').find('#error-mobile').html('');

                    $('.number').val(response.number);
                    $('.country_code').val(response.country_code);
                    $('.lastid').val(response.lastid);
                    $('.resend').val('mobile');
                   
                    $('#get-otp').modal('show');
                    $('#edit-mobile').addClass('d-none');  //.modal('hide');
                    

                    startOTPTimer('profileTimer','profileResendLink','profileOtpText');
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error Occured',
                        text:  response.message,
                        timer: 3000,
                        showConfirmButton: false
                    });
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

    $('.email_otp_request').on('click',function(){
           console.log($('.update-email').serialize());
            $.ajax({
              url: "{{ route('sendOtp') }}", // Change this to your actual URL
              type: 'POST',
              data: $('.update-email').serialize(), // Send form data
              success: function (response) {
                console.log(response);
                if(response.success == true){
                    $('.email-otp-text').find('.entered_email').html(response.email);
                    $('.email-otp-text').removeClass('d-none');
                    $('.mobile-otp-text').addClass('d-none');
                    $('.update-email').find('#error-email').html('');
                    
                    $('.lastid').val(response.lastid);
                    $('.resend').val('email');
                   
                    $('#get-otp').modal('show');
                    $('#edit-email').addClass('d-none') //.modal('hide');

                    startOTPTimer('profileTimer','profileResendLink','profileOtpText');
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error Occured',
                        text:  response.message,
                        timer: 3000,
                        showConfirmButton: false
                    });
                }
              },
              error: function (xhr, status, error) {
                if (xhr.status === 422) {
                  const errors = xhr.responseJSON.errors;

                  // Loop through each error and display it after the corresponding input
                  for (let field in errors) {
                     console.log(field);
                    $('.update-email').find(`#error-${field}`).html(`<small style="color:red;">${errors[field][0]}</small>`);
                  }
                }
                // console.error(error);
              }
            });
    
    });

    $('.update_otp_submit').on('click',function(){
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
                    $('.otp-value').val('');
                }else{
                    $('.otp').val(otp);

                    $.ajax({
                      url: "{{ route('verifyotpsubmit') }}", // Change this to your actual URL
                      type: 'POST',
                      data: $('.update-verify-otp-form').serialize(), // Send form data
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
                            Swal.fire({
                                icon: 'success',
                                title: 'OTP Verified Successfully!',
                                text: response.message,
                                timer: 3000,
                                showConfirmButton: false
                            });
                            window.location.reload();
                           
                        }
                      },
                      error: function (xhr, status, error) {
                        // alert('Error submitting the form.');
                        console.error(error);
                      }
                     });  
                }                              
                
    });

    $('#profileResendLink').on('click',function(){
        $('.otp-value').val('');
        if($('.resend').val() == 'mobile'){
            $(".mobile_otp_request" ).trigger( "click" );
        }else{
            $(".email_otp_request" ).trigger( "click" );
        }
    });

    $('.delete_account').on('click',function(e){
        e.preventDefault();
            
        Swal.fire({
          title: 'Alert!',
          text: "Are you sure you want to delete an account?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'Cancel',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            // If confirmed, make the AJAX request
            $.ajax({
              url: "{{route('userDeactivateSubmit')}}", // Change this to your actual URL
              type: 'POST',
              data: {
              'countryCode':{{$getUserProfile['data']['country_code']}},
              'userMobile':{{$getUserProfile['data']['user_phone']}},
              '_token': $('meta[name="csrf-token"]').attr('content')
              }, // Send form data
              success: function (response) {
                console.log(response);
                if(response.res == true){
                    Swal.fire({
                            icon: 'success',
                            title: 'Your Account deleted successfully',
                            text: response.message,
                            timer: 3000,
                            showConfirmButton: false
                        });

                    userLogout();
                }else{
                    var message = '';
                    if(response.message == 'User not Found'){
                        message = 'Please Enter Correct Mobile Number';
                    }else if(response.message == 'User is already deactivated'){
                        message = 'Your account is already deleted';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Error Occured',
                        text:  message,
                        timer: 3000,
                        showConfirmButton: false
                    });
                }
                
              },
              error: function (xhr, status, error) {
                console.error(error);
              }
            });
          } 
        });
        
    });

    const input = document.querySelector("#mobile_code3");
    const errorMsg = document.querySelector("#error-msg3");
    const validMsg = document.querySelector("#valid-msg3");
    const countryCodeInput = document.querySelector("#countryCode3");
    const flagcode = document.querySelector("#flagcode3");

    const errorMap = [
        "Invalid number",
        "Invalid country code",
    ];

    const selectedFlagCode = "{{$getUserProfile['data']['dial_code']}}";
    const iti = window.intlTelInput(input, {
        initialCountry: selectedFlagCode? selectedFlagCode: "ae", // set initial country as needed
        separateDialCode: true,
        formatOnDisplay: false,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });

    const reset = () => {
        input.classList.remove("error");
        if (errorMsg) {
            errorMsg.innerHTML = "";
            errorMsg.classList.add("hide");
        }
        if (validMsg) {
            validMsg.innerHTML = "";
            validMsg.classList.add("hide");
        }
    };

    const validateInput = () => {
        reset();
        const phoneNumber = input.value.trim();
        console.log(phoneNumber);
        if (phoneNumber === "") {
            input.classList.add("error");
            errorMsg.innerHTML = "Mobile number is required";
            errorMsg.classList.remove("hide");
            return;
        }

        if (!iti.isValidNumber()) {
            input.classList.add("error");
            errorMsg.innerHTML = errorMap[0];
            errorMsg.classList.remove("hide");
            $('.mobile_otp_request').attr('disabled',true);
        } else {
            // validMsg.innerHTML = "Valid number";
            // validMsg.classList.remove("hide");
            errorMsg.classList.add("hide");
            $('.mobile_otp_request').removeAttr('disabled');
        }
    };

    const updateCountryCode = () => {
        const countryData = iti.getSelectedCountryData();
        countryCodeInput.value = countryData.dialCode;
        flagcode.value = countryData.iso2;
        const numericPhoneNumber = input.value.replace(/\D/g, '');
        const maxLength = getRequiredNumberLength(countryData);
        input.maxLength =maxLength;
    };

    const numberLengths = {
        us: 10,
        ae: 9,
    };

    const getRequiredNumberLength = (countryData) => {
        return numberLengths[countryData.iso2] || 10;
    };

    input.addEventListener('input', () => {
    
        const countryData = iti.getSelectedCountryData();
        const numericPhoneNumber = input.value.replace(/\D/g, '');
        const maxLength = getRequiredNumberLength(countryData);
        input.maxLength =maxLength;
        
        validateInput();

        if (numericPhoneNumber.length > maxLength) {
            input.value = numericPhoneNumber.slice(0, maxLength);
            
        }
    });

      // validateInput();
    input.addEventListener('countrychange', () => {
        reset();
        updateCountryCode();
       input.setAttribute("placeholder", "Please enter Mobile No");
        // const countryData = iti.getSelectedCountryData();
        // const requiredLength = getRequiredNumberLength(countryData);
        // const numericPhoneNumber = input.value.replace(/\D/g, '');
        //input.value = numericPhoneNumber.slice(0, requiredLength);
        input.value = '';
        
    });
    
   input.setAttribute("placeholder", "Please enter Mobile No");

    updateCountryCode();
});
</script>
<!-- PROFILE SCRIPT END -->
@include('footer')