<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
$strToArr = 'Ajman,Dubai,Sharjah,عجمان,دبي,الشارقة';
$countries = explode(',', $strToArr);
?>
<style>
/* Pac-container inside modal */
.pac-container {
    z-index: 2000 !important;
}

  .centerMarker {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -12px;
    margin-top: -34px;
    z-index: 10;
    pointer-events: none;
    max-height:40px;
  }

</style>
<section class="section-padding">
    <div class="container-fluid">
        <div class="sidemenu_mainBox">
            <div class="sidemenu_menu_mainBox">
                <aside id="sidebar" class="sidebar break-point-sm has-bg-image">
                    <nav class="menu open-current-submenu">
                        <div id="side-menu">
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="<?php echo e(ENV('APP_URL')); ?>profile" class="sub-menu-list-link">Profile</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="<?php echo e(ENV('APP_URL')); ?>my-orders?tab=1" class="sub-menu-list-link">My Order</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="<?php echo e(ENV('APP_URL')); ?>address-list" class="sub-menu-list-link">My Address</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="<?php echo e(ENV('APP_URL')); ?>coupon" class="sub-menu-list-link">My Offers</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="<?php echo e(ENV('APP_URL')); ?>notification" class="sub-menu-list-link">Notification</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list dropdown" data-bs-toggle="collapse" data-bs-target="#account" aria-expanded="false" aria-controls="account">Payment Details</div>
                                <div class="collapse" id="account" data-bs-parent="#side-menu">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal small">
                                        <li><a href="<?php echo e(ENV('APP_URL')); ?>wallet" class="sub-inner-links">Wallet</a></li>
                                        <li><a href="<?php echo e(ENV('APP_URL')); ?>card-details" class="sub-inner-links">Card Details</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list dropdown" data-bs-toggle="collapse" data-bs-target="#shopping" aria-expanded="false" aria-controls="shopping">My Shopping</div>
                                <div class="collapse" id="shopping" data-bs-parent="#side-menu">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal small">
                                        <li><a href="<?php echo e(ENV('APP_URL')); ?>wishlist" class="sub-inner-links">Wishlist</a></li>
                                        <li><a href="<?php echo e(ENV('APP_URL')); ?>notify" class="sub-inner-links">Notify Me</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="<?php echo e(ENV('APP_URL')); ?>help" class="sub-menu-list-link">Get Help</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="<?php echo e(ENV('APP_URL')); ?>faq" class="sub-menu-list-link">FAQ's</a>
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
                
                <div class="section-header">
                    <h5 class="heading-design-h5">My Address</h5>

                    <a href="<?php echo e(ENV('APP_URL')); ?>add-address?screen_name=add-address">Add new address</a>
                </div>
                <?php if(isset($showAddressList['data']) && count($showAddressList['data']) > 0): ?>
                <div class="address_listingBox">
                    <form>
                        <?php $__currentLoopData = $showAddressList['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addressList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group">
                            <label class="address" for="930">
                                <div class="address-content">
                                    <div class="address-details">
                                        <div class="addres_type d-flex justify-content-between">
                                            <div class="addressIcon">
                                                <div class="address_img">
                                                    <?php if($addressList['type'] == "Home"): ?>
                                                    <img alt="home" src="<?php echo e(asset('assets/images/home_location.png')); ?>">
                                                    <?php elseif($addressList['type'] == "Others"): ?>
                                                    <img alt="other"
                                                        src="<?php echo e(asset('assets/images/other_location.png')); ?>">
                                                    <?php elseif($addressList['type'] == "Work"): ?>
                                                    <img alt="work"
                                                        src="<?php echo e(asset('assets/images/office_location.png')); ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="addressBox">
                                                    <div class="subtitle"><?php echo e($addressList['type']); ?></div>
                                                    <address><?php echo e($addressList['house_no']); ?></address>
                                                    <a href="tel:+<?php echo e($addressList['country_code']); ?><?php echo e($addressList['receiver_phone']); ?>"></a>
                                                    <div class="subtitle"><span>Mobile No - <?php echo e($addressList['country_code']); ?>

                                                                <?php echo e($addressList['receiver_phone']); ?></span></div>
                                                </div>
                                            </div>
                                            <div class="icons">
                                                <a href="#" data-toggle="modal" data-bs-toggle="modal"
                                                    data-bs-target="#editAddressModal"
                                                    onclick="populateForm('<?php echo e($addressList['address_id']); ?>')">
                                                    <img alt="edit1" src="<?php echo e(asset('assets/images/addedit.png')); ?>">
                                                </a>
                                                <!--<?php if($addressList['type'] != "Home"): ?><?php endif; ?>-->
                                                <div class="remove_address"
                                                    onclick="deleteAddressAlert('<?php echo e($addressList['address_id']); ?>')">
                                                    <img alt="delete" src="<?php echo e(asset('assets/images/adddelete.png')); ?>">
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <input type="hidden" id="address_id<?php echo e($addressList['address_id']); ?>"
                                            name="address_id<?php echo e($addressList['address_id']); ?>"
                                            value="<?php echo e($addressList['address_id']); ?>">
                                        <input type="hidden" id="house_no<?php echo e($addressList['address_id']); ?>"
                                            name="house_no<?php echo e($addressList['address_id']); ?>"
                                            value="<?php echo e($addressList['house_no']); ?>">
                                        <input type="hidden" id="landmark<?php echo e($addressList['address_id']); ?>"
                                            name="landmark<?php echo e($addressList['address_id']); ?>"
                                            value="<?php echo e($addressList['landmark']); ?>">
                                        <input type="hidden" id="Uname<?php echo e($addressList['address_id']); ?>"
                                            name="Uname<?php echo e($addressList['address_id']); ?>"
                                            value="<?php echo e($addressList['receiver_name']); ?>">
                                        <input type="hidden" id="number<?php echo e($addressList['address_id']); ?>"
                                            name="number<?php echo e($addressList['address_id']); ?>"
                                            value="<?php echo e($addressList['receiver_phone']); ?>">
                                        <input type="hidden" id="email<?php echo e($addressList['address_id']); ?>"
                                            name="email<?php echo e($addressList['address_id']); ?>"
                                            value="<?php echo e($addressList['receiver_email']); ?>">
                                        <input type="hidden" id="latitude<?php echo e($addressList['address_id']); ?>"
                                            name="latitude<?php echo e($addressList['address_id']); ?>"
                                            value="<?php echo e($addressList['lat']); ?>">
                                        <input type="hidden" id="longitude<?php echo e($addressList['address_id']); ?>"
                                            name="longitude<?php echo e($addressList['address_id']); ?>"
                                            value="<?php echo e($addressList['lng']); ?>">
                                        <input type="hidden" id="society_name<?php echo e($addressList['address_id']); ?>"
                                            name="society_name<?php echo e($addressList['address_id']); ?>"
                                            value="<?php echo e($addressList['society_name']); ?>">
                                        <input type="hidden" id="countryCode<?php echo e($addressList['address_id']); ?>"
                                            name="country_code<?php echo e($addressList['address_id']); ?>"
                                            value="<?php echo e($addressList['country_code']); ?>">
                                        <input type="hidden" id="flagcode<?php echo e($addressList['address_id']); ?>"
                                            name="flagcode<?php echo e($addressList['address_id']); ?>"
                                            value="<?php echo e($addressList['dial_code']); ?>">
                                        <input type="hidden" id="type<?php echo e($addressList['address_id']); ?>"
                                            name="type<?php echo e($addressList['address_id']); ?>" value="<?php echo e($addressList['type']); ?>">
                                        <input type="hidden" id="door_image<?php echo e($addressList['address_id']); ?>"
                                            name="door_image<?php echo e($addressList['address_id']); ?>" value="<?php echo e($addressList['doorimage']); ?>"> 
                                    </div>
                                </div>
                            </label>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </form>
                </div>
                <?php else: ?>
                <div class="shop-list section-padding">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6">
                                <div class="data_not_available">
                                    <div class="imageBox">
                                        <img src="<?php echo e(asset('assets/images/No_data_available.png')); ?>" alt="empty cart"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="modal fade" id="editAddressModal" tabindex="-1" role="dialog" aria-labelledby="editAddressModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
            <div class="edit_address_mainBox">
               
                 <div class="location_map_MainBox">
                        <div class="locate_map_button_box">
                            <input id="pac-input" class="controls" type="text" placeholder="Search Location"/>
                            <div id="map" style="height: 100%; width: 100%;"></div>
                            <img src="<?php echo e(asset('assets/images/qk_location.webp')); ?>" class="centerMarker" />
                        </div>
                        <div class="location_textBox">
                            <button type="button" class="location_confirm_btn btnConfirm">Confirm Location</button>
                            <!--<div class="location_confirm_btn btnConfirm">Confirm Location</div>-->
                            <div class="location_infoBox">
                                <img src="<?php echo e(asset('assets/images/other-location.svg')); ?>" width="35" height="35" alt="Other">
                                <div class="location_address">Please select location</div>
                            </div>
                        </div>
                    </div>
                <div class="location_form_MainBox">
                    <h5 class="modal-title mb-3" id="editAddressModalLabel">Edit Address</h5>

                    <div class="form_box">
                        <form action="" method="POST" class="update-address" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            
                            <div class="add_adderess_list">
                                <fieldset class=" form-group">
                                    <label for="house_no">Address Details (House No, Building & Block No & Area) <span
                                            class="required_icon">*</span></label>
                                    <input type="text" name="house_no" id="house_no" class="form-control" required  pattern="[a-zA-Z0-9\s,-]*" title="Only letters, numbers, spaces, commas, and hyphens are allowed">
                                    <input type="hidden" name="address_id" id="address_id"
                                        value="">
                                    <input type="hidden" name="address" id="address"
                                        value="">
                                    <input type="hidden" id="latitude" name="latitude">
                                    <input type="hidden" id="longitude" name="longitude">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="landmark">Landmark & Area Name (Optional)</label>
                                    <input type="text" name="landmark" id="landmark" class="form-control" value="" pattern="[a-zA-Z0-9\s,-]*"  title="Only letters, numbers, spaces, commas, and hyphens are allowed">
                                </fieldset>
                            </div>
                            <div class="add_address_subheading">Save as <span class="required_icon">*</span></div>
                            <div class="add_adderess_listing">
                                <div class="add_address_radio_mainbox">
                                    <div class="add_address_radio_listing">
                                        <input type="radio" name="address_type" id="home" value="Home">
                                        <label for="home" class="add_lable_1">
                                            <img src="<?php echo e(asset('assets/images/home-location.svg')); ?>" width="18"
                                                height="18" alt="Home">Home</label>
                                    </div>
                                    <div class="add_address_radio_listing">
                                        <input type="radio" name="address_type" id="work" value="Work">
                                        <label for="work" class="add_lable_2">
                                            <img src="<?php echo e(asset('assets/images/work-location.svg')); ?>" width="18"
                                                height="18" alt="Work">Work</label>
                                    </div>
                                    <div class="add_address_radio_listing">
                                        <input type="radio" name="address_type" id="other" value="Others">
                                        <label for="other" class="add_lable_3">
                                            <img src="<?php echo e(asset('assets/images/other-location.svg')); ?>" width="18"
                                                height="18" alt="Other">Other</label>
                                    </div>
                                </div>
                            </div>
                            <div class="add_address_subheading">Receiver Information</div>
                            <div class="add_adderess_list">
                                <fieldset class="form-group">
                                    <label for="Uname">Name <span class="required_icon">*</span></label>
                                    <input type="text" name="Uname" id="Uname" class="form-control" required pattern="[a-zA-Z\s]*" title="Only letters and spaces are allowed">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="number">Phone Number <span class="required_icon">*</span></label>
                                    <input type="text" name="number" id="addnumber" class="form-control" value="" required>
                                    <input type="hidden" id="addcountryCode" name="country_code" value="<?php echo e($addressList['country_code'] ?? ''); ?>">
                                    <input type="hidden" id="addflagcode" name="flagcode" value="<?php echo e($addressList['dial_code'] ?? ''); ?>"
                                    >
                                    <div id="adderror-msg" class="hide error-msg error"></div>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="email">Email <span class="required_icon">*</span></label>
                                    <input type="email" name="email" id="addemail" class="form-control" required pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
    title="Enter a valid email address (e.g. name@example.com)">
                                </fieldset>
                                <fieldset class="form-group">
                                    <img src="" class="door-img" width="70" height="70" />
                                    <label for="email">Door Image (Optional)</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </fieldset>
                            </div>
                            <div class="submit-button">
                                <input class="btn submitAddress_btn" type="button" value="Save Address">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjGU6WbSwLK9d7_CAVYQ1Br0DpFhx3Rt0&callback=initAutocomplete&libraries=places&v=weekly" async defer></script>
<script>
const input1 = document.querySelector("#addnumber");
const countryCodeInput1 = document.querySelector("#addcountryCode");
const flagcode1 = document.querySelector("#addflagcode");
const errorMsg1 = document.querySelector("#adderror-msg");
const validMsg1 = document.querySelector("#addvalid-msg");

const errorMap1 = [
    "Invalid number",
    "Invalid country code",
];

const iti1 = window.intlTelInput(input1, {
    separateDialCode: true,
    formatOnDisplay: false,
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
});

const reset1 = () => {
    input1.classList.remove("error");
    if (errorMsg1) {
        errorMsg1.innerHTML = "";
        errorMsg1.classList.add("hide");
    }
    if (validMsg1) {
        validMsg1.innerHTML = "";
        validMsg1.classList.add("hide");
    }
};

const validateInput1 = () => {
    reset1();
    const phoneNumber = input1.value.trim();
    const countryData = iti1.getSelectedCountryData();

    if (phoneNumber === "" || !iti1.isValidNumber()) {
        input1.classList.add("error");
        errorMsg1.innerHTML = errorMap1[0];
        errorMsg1.classList.remove("hide");
        $('.submitAddress_btn').attr('disabled',true);
    } else {
        errorMsg1.classList.add("hide");
        $('.submitAddress_btn').removeAttr('disabled'); 
    }
};

const updateCountryCode1 = () => {
    const countryData = iti1.getSelectedCountryData();
    countryCodeInput1.value = countryData.dialCode;
    flagcode1.value = countryData.iso2;
    const maxLength = getRequiredNumberLength1(countryData);
    input1.maxLength =maxLength;
};

const numberLengths1 = {
    us: 10,
    ae: 9,
};

const getRequiredNumberLength1 = (countryData) => {
    return numberLengths1[countryData.iso2] || 10;
};

const addSpacesToPhoneNumber1 = (phoneNumber) => {
    return phoneNumber.replace(/(\d{4})(\d{3})(\d+)/, '$1 $2 $3');
};

input1.addEventListener('input', () => {
    input1.setAttribute("placeholder", "Please enter Mobile No");
    validateInput1();
    const countryData = iti1.getSelectedCountryData();
    const phoneNumber = input1.value.replace(/\s+/g, ''); // Remove spaces for length check
    const maxLength = getRequiredNumberLength1(countryData);
    input1.maxLength =maxLength;

    if (phoneNumber.length > maxLength) {
        input1.value = phoneNumber.slice(0, maxLength);
    } else {
        input1.value = phoneNumber;
    }
    
});

input1.addEventListener('countrychange', () => {
    reset1();
    updateCountryCode1();
    validateInput1();
    input1.placeholder = "";
    input1.setAttribute("placeholder", "Please enter Mobile No");
});


    let map; 
    let markers=[]; 
    let autocomplete; 


    var selected_location = '';
    var selected_lat = '';
    var selected_lng = '';
    var selected_adr_components = [];
    var selected_country = [];
    var geocoder;

    function initAutocomplete(lat, lng) {
        const center = { lat: parseFloat(lat), lng: parseFloat(lng) };
        const mapOptions = {
            center: center,
            zoom: 15,
            zoomControl: true,
            zoomControlOptions: {
            position: google.maps.ControlPosition.RIGHT_CENTER
            },
            streetViewControl: false,
            mapTypeControl: false,
        };

         map = new google.maps.Map(document.getElementById("map"), mapOptions);

        geocoder = new google.maps.Geocoder();

        // Update coordinates and reverse geocode when map becomes idle after drag/zoom
        google.maps.event.addListener(map, 'idle', function () {
            const centerLatLng = map.getCenter();
            selected_lat = centerLatLng.lat();
            selected_lng = centerLatLng.lng();

            geocoder.geocode({ location: centerLatLng }, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK && results[0]) {
                let formatted = results[0].formatted_address;

                // ✅ Remove Plus Code part if present
                if (formatted.includes('+')) {
                const parts = formatted.split(" - ");
                if (parts.length > 1) {
                    formatted = parts.slice(1).join(" - ");
                }
                }

                selected_location = formatted;
                selected_adr_components = results[0].address_components;
                selected_country = [];

                $.each(selected_adr_components, function (key, value) {
                const types = value.types;
                if (types.includes("country") || types.includes("administrative_area_level_1")) {
                    selected_country.push(value.short_name);
                }
                });

                document.getElementById("pac-input").value = formatted;
                document.getElementById("address").value = formatted;
                document.querySelector(".location_address").innerHTML = formatted;
                document.getElementById("latitude").value = selected_lat;
                document.getElementById("longitude").value = selected_lng;

                console.log("Map Center Updated:", formatted, selected_lat, selected_lng);
            } else {
                console.log("Geocode failed:", status);
            }
            });
        });

        const input = document.getElementById("pac-input");
        const autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo("bounds", map);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        autocomplete.addListener("place_changed", function () {
            const place = autocomplete.getPlace();
            if (!place.geometry || !place.geometry.location) {
            alert("No location data available");
            return;
            }
            map.panTo(place.geometry.location);
        });
        }
    window.initAutocomplete = initAutocomplete;


function populateForm(addressId) {
    let societyName = document.getElementById('society_name' + addressId).value;
    let house_no = document.getElementById('house_no' + addressId).value;
    let landmark = document.getElementById('landmark' + addressId).value;
    let Uname = document.getElementById('Uname' + addressId).value;
    let number = document.getElementById('number' + addressId).value;
    let email = document.getElementById('email' + addressId).value;
    let latitude = document.getElementById('latitude' + addressId).value;
    let longitude = document.getElementById('longitude' + addressId).value;
    let countryCode = document.getElementById('countryCode' + addressId).value;
    let type = document.getElementById('type' + addressId).value;
    let flagcode = document.getElementById('flagcode' + addressId).value;
    let doorimage = document.getElementById('door_image' + addressId).value;

    // if (societyName) {
    //     locationAddress.textContent = societyName;
    // }

    document.getElementById('house_no').value = house_no;
    document.getElementById('landmark').value = landmark;
    document.querySelector(`input[name="address_type"][value="${type}"]`).checked = true;
    document.getElementById('Uname').value = Uname;
    document.getElementById('addemail').value = email;
    document.getElementById('addnumber').value = number;
    document.getElementById('addcountryCode').value = countryCode;
    document.getElementById('addflagcode').value = flagcode;
    document.getElementById('latitude').value = latitude;
    console.log(longitude,addressId);
    document.getElementById('longitude').value = longitude;
    document.getElementById('address_id').value = addressId;
    document.getElementById('address').value = societyName;
    document.querySelector('.location_address').innerHTML = societyName;

    if(doorimage){
        document.querySelector('.door-img').src = doorimage;  
         document.querySelector('.door-img').style.display = "block";
    }else{
        document.querySelector('.door-img').src = "";
        document.querySelector('.door-img').style.display = "none";
    }

    iti1.setCountry(flagcode); // Set the country based on the flag code
    
    // initAutocomplete(latitude,longitude);
    if (latitude && longitude) {
        const currentLocation = new google.maps.LatLng(parseFloat(latitude), parseFloat(longitude));
        map.setCenter(currentLocation);
    }
     
    const myLatLng = { lat: parseFloat(latitude), lng:parseFloat(longitude)}; 
    const marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
      });

    $('#editAddressModal').modal('show');

}

</script>

<script>

function deleteAddressAlert(addressId) {
    Swal.fire({
        title: "Do you want to delete address?",
        showCancelButton: true,
        confirmButtonText: "Delete",
    }).then((result) => {
        if (result.isConfirmed) {
            deleteAddress(addressId);
        }
    });
}

function deleteAddress(addressId) {
    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "<?php echo e(ENV('APP_URL')); ?>deleteAddressAPICall";

    jQuery.ajax({
        url: url,
        method: "POST",
        data: {
            addressId: addressId,
            _token: _token,
        },
        success: function(result) {
            if (result.action == "1") {
                Swal.fire({
                    title: result.message,
                    icon: "success",
                    confirmButtonText: "OK",
                }).then(() => location.reload());
            } else {
                Swal.fire({
                    title: result.message,
                    icon: "error",
                });
            }
        },
        error: function(xhr) {
            alert("An error occurred: " + xhr.responseText);
        },
    });
}
</script>


<script>
window.addEventListener("pageshow", function() {
    let storedAddresses = JSON.parse(sessionStorage.getItem("location")) || [];
    if (storedAddresses.length > 0) {
        let lastAddress = storedAddresses[storedAddresses.length - 1];
        let showAddress = document.getElementById("locationAddress");
        let societyAddress = document.getElementById("address");
        let latitude = document.getElementById('latitude');
        let longitude = document.getElementById('longitude');

        if (societyAddress) societyAddress.value = lastAddress.address;
        if (showAddress) showAddress.textContent = lastAddress.address;
        if (latitude) latitude.value = lastAddress.lat;
        if (longitude) longitude.value = lastAddress.lng;

        sessionStorage.removeItem("location");
    }
});

</script>


<script type="text/javascript">

    $(document).ready(function() {
        
        $('.btnConfirm').on('click', function() {
            let validLocations = <?php echo json_encode($countries); ?>;
            let isValid = validLocations.some(loc => selected_location.includes(loc));
            let _token = jQuery('meta[name="csrf-token"]').attr('content');
            let isError = 0;
            if (!isValid) {
                alert('Service is not available in this area');
                isError = 1;
                // return;
            }
            if (!selected_location) {
                alert('Please select a location');
                isError = 1;
                // return;
            }
            console.log('isError',isError);
            
            if(isError == 0){
                $('#latitude').val(selected_lat);
                $('#longitude').val(selected_lng);
                $('.location_address').html(selected_location);
                $('#address').val(selected_location);
            }else{
                $('#latitude').val("");
                $('#longitude').val("");
                $('.location_address').html("Please select a location");
                $('#address').val("");
            }

            console.log("Saving Location:", selected_location, selected_lat, selected_lng, selected_country);
            // saveDataAndGoBack(selected_location, selected_lat, selected_lng);
        });

        $('.submitAddress_btn').on('click',function(){
            let form = $('.update-address')[0]; // plain DOM element
            let formData = new FormData(form); // includes file
            $.ajax({
                  url: "<?php echo e(route('update-address')); ?>", // Change this to your actual URL
                  type: 'POST',
                  headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                  },
                  data: formData, 
                processData: false, // Don't process data
                contentType: false, // Let browser set it (multipart/form-data)
                  success: function (response) {
                    if(response.success == false){
                         Swal.fire({
                            icon: 'error',
                            title: 'Error Occured',
                            text:  response.message,
                            timer: 3000,
                            showConfirmButton: false
                        });
                    
                    }else{
                        Swal.fire({
                            icon: 'success',
                            title: 'Address updated Successfully!',
                            text: response.message,
                            timer: 3000,
                            showConfirmButton: false
                        });
                        window.location.href="<?php echo e(route('address.list')); ?>";
                       
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
                 
        });
    });    

    function saveDataAndGoBack(address, lat, lng) {
        let addressData = {
            address: address,
            lat: lat,
            lng: lng
        };
        console.log("Saving address:", addressData);
        sessionStorage.setItem("location", JSON.stringify([addressData]));
        setTimeout(() => {
            window.history.back();
            setTimeout(() => {
                location.reload();
            }, 100);
        }, 200);
    }


</script>    <?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/Address/address-list.blade.php ENDPATH**/ ?>