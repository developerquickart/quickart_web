@include('header')

<?php
$strToArr = $appInfo['data']['country_list'];
$countries = explode(',', $strToArr);
?>

<input id="pac-input" class="controls" type="text" placeholder="Search Place" />
<input type="hidden" name="mapLat" id="mapLat" />
<input type="hidden" name="mapLng" id="mapLng" />
<div id="map"></div>
<div class="text-center">
    <button type="button" class="btnConfirm">Confirm Location</button>
</div>

<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADPEHze6hgRTG83JXfEJ6owhtNTmJJWwg&callback=initAutocomplete&libraries=places&v=weekly"
    async defer></script>

<script type="text/javascript">
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(locationSuccess);
} else {
    $("#locationData").html('Your browser does not support location data retrieval.');
}

var map; // Declare map variable globally
var markers = []; // Store markers globally

function locationSuccess(position) {
    var mapLat = position.coords.latitude;
    var mapLng = position.coords.longitude;
    $('#mapLat').val(mapLat);
    $('#mapLng').val(mapLng);

    var currentLocation = new google.maps.LatLng(mapLat, mapLng);

    // Define a blue marker icon (default Google Maps current location symbol)
    const blueMarkerIcon = {
        url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(40, 40), // Make it slightly larger
    };

    // Create a marker for the current location
    var currentMarker = new google.maps.Marker({
        position: currentLocation,
        map: map,
        title: "Your Current Location",
        icon: blueMarkerIcon
    });

    // Center the map on the current location
    map.setCenter(currentLocation);
    map.setZoom(17); // Zoom closer for better visibility
}

var selected_location = '';
var selected_lat = '';
var selected_lng = '';
var selected_adr_components = [];
var selected_country = [];
var geocoder;

function initAutocomplete() {
    var mapLat = ($('#mapLat').val()) ? $('#mapLat').val() : 25.2048;
    var mapLng = ($('#mapLng').val()) ? $('#mapLng').val() : 55.2708;

    map = new google.maps.Map(document.getElementById("map"), {
        center: {
            lat: parseFloat(mapLat),
            lng: parseFloat(mapLng)
        },
        zoom: 19,
        mapTypeId: "roadmap",
    });

    const input = document.getElementById("pac-input");
    const searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    map.addListener("bounds_changed", () => {
        searchBox.setBounds(map.getBounds());
    });

    var autocomplete = new google.maps.places.Autocomplete(input, {
        fields: ['ALL'],
    });

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        selected_country = [];
        var near_place = autocomplete.getPlace();

        if (!near_place || near_place.location) {
            console.log('Please select location');
            return;
        } else {
            selected_location = near_place.formatted_address;
            selected_lat = near_place.geometry.location.lat() || '';
            selected_lng = near_place.geometry.location.lng() || '';
            selected_adr_components = near_place.address_components;

            $.each(selected_adr_components, function(key, value) {
                var vtype = value.types;
                if (vtype.indexOf("country") != -1 || vtype.indexOf("administrative_area_level_1") != -
                    1) {
                    selected_country.push(value.short_name);
                }
            });
        }

        // Clear out the old markers.
        markers.forEach((marker) => {
            marker.setMap(null);
        });
        markers = [];

        const bounds = new google.maps.LatLngBounds();
        if (!near_place.geometry || !near_place.geometry.location) {
            console.log("Returned place contains no geometry");
            return;
        }

        const icon = {
            url: near_place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(25, 25),
        };

        markers.push(new google.maps.Marker({
            map,
            icon,
            title: near_place.name,
            position: near_place.geometry.location,
        }));

        if (near_place.geometry.viewport) {
            bounds.union(near_place.geometry.viewport);
        } else {
            bounds.extend(near_place.geometry.location);
        }

        map.fitBounds(bounds);
    });

    geocoder = new google.maps.Geocoder();

    google.maps.event.addListener(map, 'click', function(event) {
        placeMarker(event.latLng);
    });

    function placeMarker(location) {
        markers.forEach((marker) => {
            marker.setMap(null);
        });
        markers = [];
        markers.push(new google.maps.Marker({
            position: location,
            map: map
        }));
        getAddress(location);
    }

    function getAddress(latLng) {
        geocoder.geocode({
            'latLng': latLng
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    document.getElementById("pac-input").value = results[0].formatted_address;
                    selected_location = results[0].formatted_address || '';
                    selected_lat = results[0].geometry.location.lat() || '';
                    selected_lng = results[0].geometry.location.lng() || '';
                    selected_adr_components = results[0].address_components;

                    $.each(selected_adr_components, function(key, value) {
                        var vtype = value.types;
                        if (vtype.indexOf("country") != -1 || vtype.indexOf(
                                "administrative_area_level_1") != -1) {
                            selected_country.push(value.short_name);
                        }
                    });
                } else {
                    console.log("No results");
                }
            } else {
                console.log(status);
            }
        });
    }
}

window.initAutocomplete = initAutocomplete;

$(document).ready(function() {
    $('.btnConfirm').on('click', function() {
        let validLocations = <?php echo json_encode($countries); ?>;
        let isValid = validLocations.some(loc => selected_location.includes(loc));
        let _token = jQuery('meta[name="csrf-token"]').attr('content');

        if (!isValid) {
            alert('Service is not available in this area');
            return;
        }

        let user_id = "{{$user_ID}}";
        if (!selected_location) {
            alert('Please select a location');
            return;
        }

        console.log("Saving Location:", selected_location, selected_lat, selected_lng,
            selected_country);
        saveDataAndGoBack(selected_location, selected_lat, selected_lng);
    });
});
</script>
<script>
function navigateToNextPage(url) {
    const nextPageUrl = url;

    window.location.href = nextPageUrl;
    console.log(window.location.href);
}
</script>
<script>
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