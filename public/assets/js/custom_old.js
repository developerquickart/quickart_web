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
    autoplayTimeout: 3000,
    slideTransition: 'linear',
    autoplaySpeed: 3000, 
    autoplayHoverPause: false, 
    margin: 4,
    items: 6,
    responsive: {
        0: {
            items: 2,
        },
        600: {
            items: 3,
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
            items: 2,
        },
        600: {
            items: 3,
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
            0: { items: 2 },
            600: { items: 2 },
            1020: { items: 5 },
            1300: { items: 6 }
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
            0: { items: 3 },
            600: { items: 4 },
            1000: { items: 5 },
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

// LOGIN SCREEN START
const input = document.querySelector("#mobile_code");
    const errorMsg = document.querySelector("#error-msg");
    const validMsg = document.querySelector("#valid-msg");
    const countryCodeInput = document.querySelector("#countryCode");
    const flagcode = document.querySelector("#flagcode");

    const errorMap = [
        "Invalid number",
        "Invalid country code",
    ];

    const iti = window.intlTelInput(input, {
        initialCountry: "ae", // set initial country as needed
        separateDialCode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
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
        } else {
            validMsg.innerHTML = "Valid number";
            validMsg.classList.remove("hide");
        }
    };

    const updateCountryCode = () => {
        const countryData = iti.getSelectedCountryData();
        countryCodeInput.value = countryData.dialCode;
        flagcode.value = countryData.iso2;
    };

    const numberLengths = {
        us: 10,
        ae: 9,
    };

    const getRequiredNumberLength = (countryData) => {
        return numberLengths[countryData.iso2] || 10;
    };

    input.addEventListener('input', () => {
        validateInput();

        const countryData = iti.getSelectedCountryData();
        const numericPhoneNumber = input.value.replace(/\D/g, '');
        const maxLength = getRequiredNumberLength(countryData);

        if (numericPhoneNumber.length > maxLength) {
            input.value = numericPhoneNumber.slice(0, maxLength);
        }
    });

    input.addEventListener('countrychange', () => {
        reset();
        updateCountryCode();
        validateInput();

        const countryData = iti.getSelectedCountryData();
        const requiredLength = getRequiredNumberLength(countryData);
        const numericPhoneNumber = input.value.replace(/\D/g, '');
        input.value = numericPhoneNumber.slice(0, requiredLength);
    });

    updateCountryCode();