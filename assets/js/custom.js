/*
Template Name: Groci - Organic Food & Grocery Market Template
Author: Askbootstrap
Author URI: https://themeforest.net/user/askbootstrap
Version: 1.1
*/
$('[data-toggle="offcanvas"]').on('click', function () {
    $('body').toggleClass('toggled');
});

$('.owl-carousel-slider').owlCarousel({
    loop: true,
    nav: false,
    autoplay: true,
    autoplaySpeed: 3000,
    items: 1,
    margin:2,
})

$('.owl-carousel-one').owlCarousel({
    items: 1,
    lazyLoad: true,
    pagination: false,
    loop: true,
    dots: false,
    autoPlay: false,
    navigation: true,
    stopOnHover: true,
    nav: true,
})

$('.owl-carousel-two').owlCarousel({
    loop: true,
    nav: false,
    autoplay: true,
    autoplaySpeed: 4000,
    items: 2,
    dots: false,
    responsive: {
        0: {
            items: 1,
            center: true
        },
        500: {
            items: 2,
        }
    }
})
$(".owl-carousel-three").owlCarousel({
    loop: true, 
    margin: 10,
    nav: false, 
    dots: false, 
    autoplay: false,
    autoplayTimeout: 6000,
    slideTransition: 'linear',
    autoplaySpeed: 6000, 
    responsive: {
        0: {
            items: 1, 
            stagePadding: 20 
        },
        768: {
            items: 2, 
            stagePadding: 20 
        },
        1025: {
            items: 2, 
            stagePadding: 50 
        }
    }
});


$('.owl-carousel-four').owlCarousel({
    loop: true,
    nav: false,
    autoplay: true,
    autoplaySpeed: 4000,
    items: 4,
    margin: 10,
    dots: false,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 2,
        },
        1020: {
            items: 3,
        },
        1300: {
            items: 3,
        },
    }
})
$('.main_cate_slider').owlCarousel({
    loop: true,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 4000,
    slideTransition: 'linear',
    autoplaySpeed: 4000, 
    autoplayHoverPause: false, 
    margin: 4,
    items: 6,
    responsive: {
        0: {
            items: 2,
        },
        600: {
            items: 4,
        },
        1020: {
            items: 5,
        },
        1200: {
            items: 6,
        },
    }
});

$('.owl-carousel-orderAgain').owlCarousel({
    loop: false,
    nav: false,
    autoplay: true,
    autoplaySpeed: 4000,
    items: 6,
    margin: 10,
    dots: false,
    responsive: {
        0: {
            items: 3,
        },
        600: {
            items: 5,
        },
        1020: {
            items: 6,
        },
        1300: {
            items: 6,
        },
    }
})
$(document).ready(function () {
    let featuredCarousel = $('.owl-carousel-featured');

    featuredCarousel.owlCarousel({
        responsive: {
            0: {
                items: 2,
                autoWidth: true,
                nav: false,
                loop: true,
            },
            1025: {
                items: 5,
                margin: 10, 
            },
            1300: { 
                items: 6, 
                
            }
        },
        lazyLoad: true,
        pagination: false,
        loop: false,  // Set to false to manually handle navigation visibility
        dots: false,
        autoPlay: false,
        navigation: true,
        stopOnHover: true,
        autoWidth: false,
        nav: true,
        margin: 15,
        navText: ["<i class='mdi mdi-chevron-left'></i>", "<i class='mdi mdi-chevron-right'></i>"]
    });

    let prevArrow = featuredCarousel.parent().find('.owl-prev');
    let nextArrow = featuredCarousel.parent().find('.owl-next');

    prevArrow.hide(); // Initially hide the left arrow

    featuredCarousel.on('changed.owl.carousel', function (event) {
        let currentIndex = event.item.index;
        let itemCount = event.item.count;

        prevArrow.toggle(currentIndex !== 0);
        nextArrow.toggle(currentIndex < itemCount - event.page.size);
    });
});

$(document).ready(function () {
    let categoryCarousel = $('.owl-carousel-category');

    categoryCarousel.owlCarousel({
        responsive: {
            0: { items: 2 },
            600: { items: 4 },
            1000: { items: 5 },
            1200: { items: 8 }
        },
        items: 7,
        lazyLoad: true,
        pagination: false,
        loop: false,
        dots: false,
        autoPlay: 2000,
        navigation: true,
        stopOnHover: true,
        nav: true,
        navText: ["<i class='mdi mdi-chevron-left'></i>", "<i class='mdi mdi-chevron-right'></i>"]
    });

    let prevArrow = categoryCarousel.parent().find('.owl-prev');
    let nextArrow = categoryCarousel.parent().find('.owl-next');

    prevArrow.hide(); // Initially hide left arrow

    categoryCarousel.on('changed.owl.carousel', function (event) {
        let currentIndex = event.item.index;
        let itemCount = event.item.count;

        prevArrow.toggle(currentIndex !== 0);
        nextArrow.toggle(currentIndex < itemCount - event.page.size);
    });
});

$(document).ready(function () {
    let brandsCarousel = $('.owl-carousel-brands');

    brandsCarousel.owlCarousel({
        responsive: {
            0: {
                items: 2,
                autoWidth: true,
                nav: false,
                loop: true,
            },
            1025: { items: 5 },
            1200: { items: 8 }
        },
        items: 8,
        lazyLoad: true,
        pagination: false,
        loop: false,
        dots: false,
        autoPlay: 2000,
        navigation: true,
        stopOnHover: true,
        nav: true,
        margin: 5,
        navText: ["<i class='mdi mdi-chevron-left'></i>", "<i class='mdi mdi-chevron-right'></i>"]
    });

    let prevArrow = brandsCarousel.parent().find('.owl-prev');
    let nextArrow = brandsCarousel.parent().find('.owl-next');

    prevArrow.hide(); // Initially hide left arrow

    brandsCarousel.on('changed.owl.carousel', function (event) {
        let currentIndex = event.item.index;
        let itemCount = event.item.count;

        prevArrow.toggle(currentIndex !== 0);
        nextArrow.toggle(currentIndex < itemCount - event.page.size);
    });
});


// ===========Single Items Slider============   
$(document).ready(function () {
    var sync1 = $("#sync1");
    var sync2 = $("#sync2");

    sync1.owlCarousel({
        items: 1,
        autoplay: true,
        animateIn: 'flipInX',
        slideTransition: 'linear',
        autoplayTimeout: 6000,
        autoplaySpeed: 6000,
        animateOut: 'fadeOut',
        pagination: false,
        dots: false,
        navigation: false,
        afterAction: syncPosition,
        responsiveRefreshRate: 200
    });

    sync2.owlCarousel({
        items: 5,
        navigation: true,
        dots: false,
        margin:5,
        pagination: false,
        nav: true,
        navigationText: ["<i class='mdi mdi-chevron-left'></i>", "<i class='mdi mdi-chevron-right'></i>"],
        responsiveRefreshRate: 100,
        afterInit: function (el) {
            el.find(".owl-item").eq(0).addClass("synced");
        }
    });

    function syncPosition(el) {
        var current = this.currentItem;
        sync2
            .find(".owl-item")
            .removeClass("synced")
            .eq(current)
            .addClass("synced");
        if (sync2.data("owl.carousel") !== undefined) {
            center(current);
        }
    }

    sync2.on("click", ".owl-item", function (e) {
        e.preventDefault();
        var number = $(this).index();
        sync1.trigger("to.owl.carousel", [number, 300, true]);
    });

    function center(number) {
        var sync2visible = sync2.data("owl.carousel").owl.visibleItems;
        var num = number;
        var found = false;
        for (var i in sync2visible) {
            if (num === sync2visible[i]) {
                found = true;
            }
        }
        if (!found) {
            if (num > sync2visible[sync2visible.length - 1]) {
                sync2.trigger("to.owl.carousel", [num - sync2visible.length + 2, 100, true]);
            } else {
                if (num - 1 === -1) {
                    num = 0;
                }
                sync2.trigger("to.owl.carousel", [num, 100, true]);
            }
        } else if (num === sync2visible[sync2visible.length - 1]) {
            sync2.trigger("to.owl.carousel", [sync2visible[1], 100, true]);
        } else if (num === sync2visible[0]) {
            sync2.trigger("to.owl.carousel", [num - 1, 100, true]);
        }
    }
});

//login
const inputl = document.querySelector("#mobile_code");
    const errorMsgl = document.querySelector("#error-msg");
    const validMsgl = document.querySelector("#valid-msg");
    const countryCodeInputl = document.querySelector("#countryCode1");
    const flagcodel = document.querySelector("#flagcode1");

    const errorMap = [
        "Invalid number",
        "Invalid country code",
    ];

 
    const itil = window.intlTelInput(inputl, {
        initialCountry: "ae", // set initial country as needed
        separateDialCode: true,
        formatOnDisplay: false,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

    const resetl = () => {
        inputl.classList.remove("error");
        if (errorMsgl) {
            errorMsgl.innerHTML = "";
            errorMsgl.classList.add("hide");
        }
        if (validMsgl) {
            validMsgl.innerHTML = "";
            validMsgl.classList.add("hide");
        }
    };

    const validateInputl = () => {
        resetl();
        const phoneNumber = inputl.value.trim();
        if (phoneNumber === "") {
            inputl.classList.add("error");
            errorMsgl.innerHTML = "Mobile number is required";
            errorMsgl.classList.remove("hide");
            return;
        }

        if (!itil.isValidNumber()) {
            inputl.classList.add("error");
            errorMsgl.innerHTML = errorMap[0];
            errorMsgl.classList.remove("hide");
            $('.otp_request').attr('disabled',true);
        } else {
            // validMsgl.innerHTML = "Valid number";
            // validMsgl.classList.remove("hide");
            errorMsgl.classList.add("hide");
            $('.otp_request').removeAttr('disabled');
        }
    };

    const updateCountryCodel = () => {
        const countryDatal = itil.getSelectedCountryData();
        console.log(countryDatal);
        countryCodeInputl.value = countryDatal.dialCode;
        flagcodel.value = countryDatal.iso2;
        const numericPhoneNumber = inputl.value.replace(/\D/g, '');
        const maxLength = getRequiredNumberLength(countryDatal);
        inputl.maxLength =maxLength;
    };

    const numberLengths = {
        us: 10,
        ae: 9,
    };

    const getRequiredNumberLength = (countryData) => {
        return numberLengths[countryData.iso2] || 10;
    };

    inputl.addEventListener('input', () => {
        inputl.setAttribute("placeholder", "Please enter mobile no");
        validateInputl();
        const countryData = itil.getSelectedCountryData();
        const numericPhoneNumber = inputl.value.replace(/\D/g, '');
        const maxLength = getRequiredNumberLength(countryData);
        inputl.maxLength =maxLength;
        if (numericPhoneNumber.length > maxLength) {
            inputl.value = numericPhoneNumber.slice(0, maxLength);
        }
        // Prevent entering 0 at the start on input
        const val = inputl.value;
        if (val.length === 1 && val === '0') {
            inputl.value = '';
        }
    }); 
    
  // validateInputl();
    inputl.addEventListener('countrychange', () => {
        resetl();
        updateCountryCodel();
        inputl.setAttribute("placeholder", "Please enter mobile no");
        const countryData = itil.getSelectedCountryData();
        const requiredLength = getRequiredNumberLength(countryData);
        const numericPhoneNumber = inputl.value.replace(/\D/g, '');
        // Slice to required length and remove leading 0 if present
        let cleanedNumber = numericPhoneNumber.slice(0, requiredLength);
        if (cleanedNumber.startsWith('0')) {
            cleanedNumber = cleanedNumber.slice(1);
        }
        inputl.value = cleanedNumber;
        itir.setCountry(countryData.iso2);
    });
    inputl.setAttribute("placeholder", "Please enter mobile no");
    updateCountryCodel();


    //register
    const inputr = document.querySelector("#mobile_code2");
    const errorMsgr = document.querySelector("#error-msg1");
    const validMsgr = document.querySelector("#valid-msg1");
    const countryCodeInputr = document.querySelector("#countryCode2");
    const flagcoder = document.querySelector("#flagcode2");

    const errorMapr = [
        "Invalid number",
        "Invalid country code",
    ];

    const itir = window.intlTelInput(inputr, {
        initialCountry: "ae", // set initial country as needed
        separateDialCode: true,
        formatOnDisplay: false,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

    const resetr = () => {
        inputr.classList.remove("error");
        if (errorMsgr) {
            errorMsgr.innerHTML = "";
            errorMsgr.classList.add("hide");
        }
        if (validMsgr) {
            validMsgr.innerHTML = "";
            validMsgr.classList.add("hide");
        }
    };

    const validateInputr = () => {
        resetr();
        const phoneNumberr = inputr.value.trim();
        if (phoneNumberr === "") {
            inputr.classList.add("error");
            errorMsgr.innerHTML = "Mobile number is required";
            errorMsgr.classList.remove("hide");
            return;
        }

        if (!itir.isValidNumber()) {
            inputr.classList.add("error");
            errorMsgr.innerHTML = errorMap[0];
            errorMsgr.classList.remove("hide");
            $('.btn_register').attr('disabled',true);
        } else {
            // validMsgr.innerHTML = "Valid number";
            // validMsgr.classList.remove("hide");
            errorMsgr.classList.add("hide");
            $('.btn_register').removeAttr('disabled');
        }
    };

    const updateCountryCoder = () => {
        const countryDatar = itir.getSelectedCountryData();
        countryCodeInputr.value = countryDatar.dialCode;
        flagcoder.value = countryDatar.iso2;
        const numericPhoneNumber = inputr.value.replace(/\D/g, '');
        const maxLength = getRequiredNumberLength(countryDatar);
        inputr.maxLength =maxLength;
    };

    const numberLengthsr = {
        us: 10,
        ae: 9,
    };

    const getRequiredNumberLengthr = (countryData) => {
        return numberLengthsr[countryData.iso2] || 10;
    };

    inputr.addEventListener('input', () => {
        inputr.setAttribute("placeholder", "Please enter mobile no");
        validateInputr();
        const countryDatar = itir.getSelectedCountryData();
        const maxLength = getRequiredNumberLengthr(countryDatar);
        // Remove all non-numeric characters
        let numericPhoneNumberr = inputr.value.replace(/\D/g, '');
        // Prevent first digit from being 0
        if (numericPhoneNumberr.startsWith('0')) {
            numericPhoneNumberr = numericPhoneNumberr.slice(1);
        }
        // Limit to required maxLength
        numericPhoneNumberr = numericPhoneNumberr.slice(0, maxLength);
        inputr.value = numericPhoneNumberr;
    });

    //validateInputr();
    inputr.addEventListener('countrychange', () => {
        resetr();
        updateCountryCoder();
        
        inputr.setAttribute("placeholder", "Please enter Mobile No");
      
        const countryDatar = itir.getSelectedCountryData();
        const requiredLengthr = getRequiredNumberLength(countryDatar);
        const numericPhoneNumberr = inputr.value.replace(/\D/g, '');
        //inputr.value = numericPhoneNumberr.slice(0, requiredLengthr);
        inputr.value = '';
    });
    
    inputr.setAttribute("placeholder", "Please enter Mobile No");

    updateCountryCoder();
    

// MENU OPEN CLOSE SCRIPT
function menu() {
        var x = document.getElementById("menu_mainbox");
        if (!x.classList.contains("menu_open")) {
            x.classList.add("menu_open");
            document.addEventListener('click', closeMenuOutsideClick);
        } else {
            x.classList.remove("menu_open");
            document.removeEventListener('click', closeMenuOutsideClick);
        }
    }
    
    function closeMenuOutsideClick(event) {
        var menu = document.getElementById("menu_mainbox");
        var toggleButton = document.querySelector('.mobile_profile_box'); // Old toggle (may not exist for logged-in users)
        var targetElement = event.target;
    
        // Check if the click is outside the menu and not on the toggle button
        var clickedOnToggle = toggleButton ? toggleButton.contains(targetElement) : false;
        if (!menu.contains(targetElement) && !clickedOnToggle) {
            menu.classList.remove("menu_open");
            document.removeEventListener('click', closeMenuOutsideClick);
        }
    }
    
    // OTP TIMER
let countdown;
let timerDuration = 30; // in seconds
function startOTPTimer(timerId,resendId,otptextId) {
    if (countdown) {
        clearInterval(countdown);
    }

    let timeLeft = timerDuration;
    const timerDisplay = document.getElementById(timerId);
    const resendLink = document.getElementById(resendId);
    const otpText = document.getElementById(otptextId);
    resendLink.style.display = 'none';
    otpText.style.display = 'inline';
    countdown = setInterval(() => {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;
        timerDisplay.innerText = '';
        timerDisplay.innerText = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        timeLeft--;
        if (timeLeft < 0) {
            clearInterval(countdown);
            otpText.style.display = 'none';
            resendLink.style.display = 'inline';
        }
    }, 1000);
}


    