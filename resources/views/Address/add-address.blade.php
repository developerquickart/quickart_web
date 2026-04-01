@include('header')
<?php
$strToArr = 'Ajman,Dubai,Sharjah,عجمان,دبي,الشارقة';
$countries = explode(',', $strToArr);
?>
<style>
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
#pac-input1 {
  position: absolute;
  top: 10px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 999;
  width: 70%;
  max-width: 400px;
  padding: 8px 12px;
  font-size: 14px;
  border: 2px solid #2e317e;
  border-radius: 30px;
  background: #fff;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
  outline: none;
}
</style>
<section class="add_adderess_section">
    <div class="container">


        <div class="row justify-content-center">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="col-lg-9">
                <div class="edit_address_mainBox add_address_mainBox">
                    <div class="location_map_MainBox">
                        <div class="locate_map_button_box">
                            <input id="pac-input1" class="controls" type="text" placeholder="Search Location"/>
                            <div id="map" style="height: 100%; width: 100%;"></div>
                            <img src="{{asset('assets/images/qk_location.webp')}}" class="centerMarker" />
                        </div>
                        <div class="location_textBox">
                            <button type="button" class="location_confirm_btn btnConfirm">Confirm Location</button>
                            <!--<div class="location_confirm_btn btnConfirm">Confirm Location</div>-->
                            <div class="location_infoBox">
                                <img src="{{asset('assets/images/other-location.svg')}}" width="35" height="35" alt="Other">
                                <div class="location_address">@if(old('address') != '') {{old('address')}} @else Please select location @endif</div>
                            </div>
                        </div>
                    </div>
                    <div class="location_form_MainBox">
                        <h5 class="modal-title mb-3">Add Address</h5>
                        <div class="form_box">
                            <form action="{{ route('get-address') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="add_adderess_list">
                                    <fieldset class="form-group">
                                        <label for="house_no">Address Details (House No, Building & Block No & Area)
                                            <span class="required_icon">*</span></label>
                                        <input type="text" name="house_no" id="house_no" class="form-control" value="{{old('house_no')}}">
                                        <input type="hidden" id="mapLat" value="{{ session('delivery_user_lat') }}">
                                        <input type="hidden" id="mapLng" value="{{ session('delivery_user_lng') }}">
                                        <input type="hidden" id="latitude" name="latitude" value="{{old('latitude')}}">
                                        <input type="hidden" id="longitude" name="longitude" value="{{old('longitude')}}">
                                        <input type="hidden" id="addedFrom" name="addedFrom" value="{{\Request::get('addedFrom')}}">
                                        <input type="hidden" id="tab" name="tab" value="{{\Request::get('tab')}}">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="landmark">Landmark & Area Name (Optional)</label>
                                        <input type="text" name="landmark" id="landmark" class="form-control" value="{{old('landmark')}}">
                                    </fieldset>
                                </div>
                                <div class="add_address_subheading">
                                    Save as <span class="required_icon">*</span>
                                </div>
                                <div class="add_adderess_listing">
                                    <div class="add_address_radio_mainbox">
                                        <div class="add_address_radio_listing">
                                            <input type="radio" name="address_type" id="home" value="Home" @if(old('address_type') == 'Home') checked @endif>
                                            <label for="home" class="add_lable_1">Home</label>
                                        </div>
                                        <div class="add_address_radio_listing">
                                            <input type="radio" name="address_type" id="work" value="Work" @if(old('address_type') == 'Work') checked @endif>
                                            <label for="work" class="add_lable_2">Work</label>
                                        </div>
                                        <div class="add_address_radio_listing">
                                            <input type="radio" name="address_type" id="other" value="Others" @if(old('address_type') == 'Others') checked @endif>
                                            <label for="other" class="add_lable_3">Other</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="add_address_subheading">
                                    Receiver Information
                                </div>
                                <div class="add_adderess_list">
                                    <fieldset class="form-group">
                                        <label for="Uname">Name <span class="required_icon">*</span></label>
                                        <input type="text" name="Uname" id="Uname" class="form-control" value="{{$getUser['data']['name']}}">
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <div class="mobile_number_country_box">
                                            <div id="phone-container" class="input-group-1">
                                                <label for="mobile_code">Phone Number <span
                                                        class="required_icon">*</span></label>
                                                <input type="text" class="form-control" id="addnumber" name="number" value="{{$getUser['data']['user_phone']}}" formControlName="mobile">
                                                <!-- Hidden input for the country code -->
                                                <input type="hidden" id="addcountryCode" name="country_code" value="{{old('country_code')}}">
                                                <input type="hidden" id="addflagcode" name="flagcode" value="{{old('flagcode')}}">
                                                <input type="hidden" id="address" name="address" value="{{old('address')}}">
                                                <div id="adderror-msg" class="hide error-msg error"></div>

                                                <input type="hidden" id="appUrl" name="appUrl"
                                                    value="{{ env('APP_URL') }}">
                                                <input type="hidden" id="NODE_APP_URL" name="NODE_APP_URL"
                                                    value="{{ env('NODE_APP_URL') }}">
                                                <input type="hidden" id="currentcountrycode" name="currentcountrycode"
                                                    value="{{ $data['message'] ?? ''}}">
                                                <input type="hidden" id="reactivate" name="reactivate" value="0">
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="email">Email <span class="required_icon">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{$getUser['data']['email']}}">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="email">Door Image (Optional)</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </fieldset>
                                </div>
                                <div class="submit-button">
                                    <input class="btn submitAddress_btn" type="submit" value="Save Address">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

<!-- Google map added...G1 -->
<!-- Load Google Maps API Script -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjGU6WbSwLK9d7_CAVYQ1Br0DpFhx3Rt0&callback=initAutocomplete&libraries=places&v=weekly" async defer></script>
<script type="text/javascript">
const input1 = document.querySelector("#addnumber");
const countryCodeInput1 = document.querySelector("#addcountryCode");
const flagcode1 = document.querySelector("#addflagcode");
const errorMsg1 = document.querySelector("#adderror-msg");
const validMsg1 = document.querySelector("#addvalid-msg");

const errorMap1 = [
    "Invalid number",
    "Invalid country code",
];

@if($getUser['data']['dial_code'] != '') 
var ccountry_code = "{{$getUser['data']['dial_code']}}";
@else
var ccountry_code = "ae";
@endif
const iti1 = window.intlTelInput(input1, {
    initialCountry: ccountry_code,
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
        // validMsg1.innerHTML = "Valid number";
        // validMsg1.classList.remove("hide");
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
    inputl.maxLength =maxLength;

    if (phoneNumber.length > maxLength) {
        input1.value = phoneNumber.slice(0, maxLength);
    } else {
        input1.value = phoneNumber;
    }
    // updateCountryCode1();
    
});

input1.addEventListener('countrychange', () => {
    reset1();
    updateCountryCode1();
    validateInput1();
    input1.value = "";
    input1.setAttribute("placeholder", "Please enter Mobile No");
});

updateCountryCode1();

    var map; 
    var markers = []; 

    var selected_location = '{{ session('delivery_location_name') ?? '' }}';
    var selected_lat = '';
    var selected_lng = '';
    var selected_adr_components = [];
    var selected_country = [];
    var geocoder;
    
    function initAutocomplete() {
        var mapLat = parseFloat($('#mapLat').val()) || 25.2048;
        var mapLng = parseFloat($('#mapLng').val()) || 55.2708;

        // Initialize the map
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: mapLat, lng: mapLng },
            zoom: 15,
            zoomControl: true,
            zoomControlOptions: {
                position: google.maps.ControlPosition.RIGHT_CENTER
            }
        });

        geocoder = new google.maps.Geocoder();

        // Trigger when the map stops moving (on drag or zoom end)
        google.maps.event.addListener(map, 'idle', function () {
            const center = map.getCenter();
            const lat = center.lat();
            const lng = center.lng();

            // Update hidden fields
          //  $('#latitude').val(lat);
          //  $('#longitude').val(lng);

            // Reverse geocode the center point
            geocoder.geocode({ location: center }, function (results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        var formatted = results[0].formatted_address;
                        console.log("G1-------add--->", results[0]);

                        formatted = formatted.replace(/^[A-Z0-9]+\+[A-Z0-9]+\s*-\s*/i, '').trim();
                        selected_location = formatted;
                        selected_lat = lat;
                        selected_lng = lng;
                        selected_adr_components = results[0].address_components;
                        console.log("G1-------add--->", formatted);

                        // document.getElementById("pac-input").value = formatted;
                        //$('#address').val(formatted);
                       // $('.location_address').html(formatted);

                        selected_country = [];
                        $.each(selected_adr_components, function (key, value) {
                            var vtype = value.types;
                            if (vtype.indexOf("country") != -1 || vtype.indexOf("administrative_area_level_1") != -1) {
                                selected_country.push(value.short_name);

                            }
                        });
                    }
                } else {
                    console.log("Geocoder failed: " + status);
                }
            });
        });

        // Autocomplete search box setup
        const input = document.getElementById("pac-input1");
        const autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.addListener('place_changed', function () {
            const place = autocomplete.getPlace();
            if (!place.geometry) {
                return alert("No details for input");
            }
            map.setCenter(place.geometry.location);
        });
    }


    window.initAutocomplete = initAutocomplete;

    $(document).ready(function() {
        $('.btnConfirm').on('click', function() {
            let _token = jQuery('meta[name="csrf-token"]').attr('content');
            
            let isError = 0;
            if (!selected_location) {
                alert('Please select a location');
                isError = 1;
                // return;
            }
            console.log('isError',isError);
            
            if(isError != 0){
                return;
            }

            $.ajax({
                url: "{{ route('checkAddressLocationRange') }}",
                type: 'POST',
                data: {
                    _token: _token,
                    lat: selected_lat,
                    lng: selected_lng,
                    location_name: selected_location
                },
                success: function (response) {
                    if (response.success && response.in_range === true) {
                        $('#latitude').val(selected_lat);
                        $('#longitude').val(selected_lng);
                        $('.location_address').html(selected_location);
                        $('#address').val(selected_location);
                        Swal.fire({
                            icon: 'success',
                            title: 'Location updated',
                            text: response.message || 'Your delivery location has been updated.'
                        }).then(function () {
                            window.location.reload();
                        });
                    } else if (response.success && response.in_range === false) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Out of range',
                            text: 'please select a location in our servicable area'
                        });
                        $('#latitude').val("");
                        $('#longitude').val("");
                        $('.location_address').html("Please select a location");
                        $('#address').val("");
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: (response && response.message) ? response.message : 'Unable to validate location.'
                        });
                    }
                },
                error: function (xhr) {
                    let msg = 'Unable to validate location. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        msg = xhr.responseJSON.message;
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: msg
                    });
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
</script>
@include('footer')




