@include('header')

<section class="login_section">
    <div class="login_mainbox">
        <div class="login_background_img">
            <img src="{{asset('assets/images/login-background.webp')}}" alt="Login image" class="img-fluid">
        </div>
        <div class="login_content_mainbox">
            <div class="login_logobox">
                <img src="{{asset('assets/images/QuicKart_logo.png')}}" alt="Logo" class="img-fluid">
            </div>
            <h1 class="login_headingbox">
                Sign Up
            </h1>
            <p class="sign_up_para">
                Already have an account? <span><a href="{{ENV('APP_URL')}}login">Login here</a></span>
            </p>
            <form id="signupForm" action="{{ route('registeruser') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Your Name <span class="required_icon">*</span></label>
                    <input type="text" id="name" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="name">Mobile Number <span class="required_icon">*</span></label>
                    <input type="text" id="mobile_code" class="form-control" name="number" value="{{$number}}" required>
                    <input type="hidden" id="countryCode" name="country_code" value="{{$country_code}}">
                    <div id="error-msg" class="hide"></div>
                    <input type="hidden" id="flagcode" name="flag_code" value="{{$flag_code}}">
                </div>
                <div class="form-group">
                    <label for="email">Email <span class="required_icon">*</span></label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="referel_code">Referral code (Optional)</label>
                    <input type="text" id="referel_code" class="form-control" name="referel_code">
                </div>
                <div class="form-group form-group-accept">
                    <input type="radio" name="accept" value="accept">
                    <label for="accept">I accept the <span class="term_condition_text">Term & condition & Privacy
                            Policy.</span> <span class="required_icon">*</span></label>
                </div>
                <input type="hidden" name="is_terms_cond_unable" id="is_terms_cond_unable" value="false">
                <div class="login_submit_box">
                    <button class="submit_btn">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>

    function updateTermsValue() {
        const isAccepted = document.querySelector('input[name="accept"]:checked') ? true : false;
        document.getElementById('is_terms_cond_unable').value = isAccepted ? 'true' : 'false';
    }

    document.querySelector('input[name="accept"]').addEventListener('change', updateTermsValue);

    document.getElementById('signupForm').addEventListener('submit', function (event) {
        updateTermsValue();
        if (document.getElementById('is_terms_cond_unable').value === 'false') {
            event.preventDefault();
            alert("Please accept the terms and conditions to proceed.");
        }
    });
</script>
<script>
    const input = document.querySelector("#mobile_code");
    const errorMsg = document.querySelector("#error-msg");
    const validMsg = document.querySelector("#valid-msg");
    const countryCodeInput = document.querySelector("#countryCode");
    const flagcode = document.querySelector("#flagcode");
    const initialDialCode = "{{$country_code}}" || "971";


    const dialCodeToIso2 = {
        "1": "US",
        "7": "RU",
        "20": "EG",
        "27": "ZA",
        "30": "GR",
        "31": "NL",
        "32": "BE",
        "33": "FR",
        "34": "ES",
        "36": "HU",
        "39": "IT",
        "40": "RO",
        "41": "CH",
        "43": "AT",
        "44": "GB",
        "45": "DK",
        "46": "SE",
        "47": "NO",
        "48": "PL",
        "49": "DE",
        "51": "PE",
        "52": "MX",
        "53": "CU",
        "54": "AR",
        "55": "BR",
        "56": "CL",
        "57": "CO",
        "58": "VE",
        "60": "MY",
        "61": "AU",
        "62": "ID",
        "63": "PH",
        "64": "NZ",
        "65": "SG",
        "66": "TH",
        "81": "JP",
        "82": "KR",
        "84": "VN",
        "86": "CN",
        "90": "TR",
        "91": "IN",
        "92": "PK",
        "93": "AF",
        "94": "LK",
        "95": "MM",
        "98": "IR",
        "211": "SS",
        "212": "MA",
        "213": "DZ",
        "216": "TN",
        "218": "LY",
        "220": "GM",
        "221": "SN",
        "222": "MR",
        "223": "ML",
        "224": "GN",
        "225": "CI",
        "226": "BF",
        "227": "NE",
        "228": "TG",
        "229": "BJ",
        "230": "MU",
        "231": "LR",
        "232": "SL",
        "233": "GH",
        "234": "NG",
        "235": "TD",
        "236": "CF",
        "237": "CM",
        "238": "CV",
        "239": "ST",
        "240": "GQ",
        "241": "GA",
        "242": "CG",
        "243": "CD",
        "244": "AO",
        "245": "GW",
        "246": "IO",
        "248": "SC",
        "249": "SD",
        "250": "RW",
        "251": "ET",
        "252": "SO",
        "253": "DJ",
        "254": "KE",
        "255": "TZ",
        "256": "UG",
        "257": "BI",
        "258": "MZ",
        "260": "ZM",
        "261": "MG",
        "262": "RE",
        "263": "ZW",
        "264": "NA",
        "265": "MW",
        "266": "LS",
        "267": "BW",
        "268": "SZ",
        "269": "KM",
        "290": "SH",
        "291": "ER",
        "297": "AW",
        "298": "FO",
        "299": "GL",
        "350": "GI",
        "351": "PT",
        "352": "LU",
        "353": "IE",
        "354": "IS",
        "355": "AL",
        "356": "MT",
        "357": "CY",
        "358": "FI",
        "359": "BG",
        "370": "LT",
        "371": "LV",
        "372": "EE",
        "373": "MD",
        "374": "AM",
        "375": "BY",
        "376": "AD",
        "377": "MC",
        "378": "SM",
        "379": "VA",
        "380": "UA",
        "381": "RS",
        "382": "ME",
        "383": "XK",
        "385": "HR",
        "386": "SI",
        "387": "BA",
        "389": "MK",
        "420": "CZ",
        "421": "SK",
        "423": "LI",
        "500": "FK",
        "501": "BZ",
        "502": "GT",
        "503": "SV",
        "504": "HN",
        "505": "NI",
        "506": "CR",
        "507": "PA",
        "508": "PM",
        "509": "HT",
        "590": "BL",
        "591": "BO",
        "592": "GY",
        "593": "EC",
        "594": "GF",
        "595": "PY",
        "596": "MQ",
        "597": "SR",
        "598": "UY",
        "599": "CW",
        "670": "TL",
        "672": "NF",
        "673": "BN",
        "674": "NR",
        "675": "PG",
        "676": "TO",
        "677": "SB",
        "678": "VU",
        "679": "FJ",
        "680": "PW",
        "681": "WF",
        "682": "CK",
        "683": "NU",
        "685": "WS",
        "686": "KI",
        "687": "NC",
        "688": "TV",
        "689": "PF",
        "690": "TK",
        "691": "FM",
        "692": "MH",
        "850": "KP",
        "852": "HK",
        "853": "MO",
        "855": "KH",
        "856": "LA",
        "880": "BD",
        "886": "TW",
        "960": "MV",
        "961": "LB",
        "962": "JO",
        "963": "SY",
        "964": "IQ",
        "965": "KW",
        "966": "SA",
        "967": "YE",
        "968": "OM",
        "970": "PS",
        "971": "AE",
        "972": "IL",
        "973": "BH",
        "974": "QA",
        "975": "BT",
        "976": "MN",
        "977": "NP",
        "992": "TJ",
        "993": "TM",
        "994": "AZ",
        "995": "GE",
        "996": "KG",
        "998": "UZ"
    };

    const initialCountry = dialCodeToIso2[initialDialCode] || "ae";

    const errorMap = [
        "Invalid number",
        "Invalid country code",
        "Invalid number",
        "Invalid number",
        "Invalid number"
    ];

    const iti = window.intlTelInput(input, {
        initialCountry: initialCountry,
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
        const countryData = iti.getSelectedCountryData();

        if (phoneNumber === "" || !iti.isValidNumber()) {
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

    const addSpacesToPhoneNumber = (phoneNumber) => {
        return phoneNumber.replace(/(\d{4})(\d{3})(\d+)/, '$1 $2 $3');
    };

    input.addEventListener('input', () => {
        const countryData = iti.getSelectedCountryData();
        const phoneNumber = input.value.replace(/\s+/g, ''); // Remove spaces for length check
        const maxLength = getRequiredNumberLength(countryData);

        if (phoneNumber.length > maxLength) {
            input.value = addSpacesToPhoneNumber(phoneNumber.slice(0, maxLength));
        } else {
            input.value = addSpacesToPhoneNumber(phoneNumber);
        }
    });

    input.addEventListener('countrychange', () => {
        reset();
        updateCountryCode();
        validateInput();
        input.placeholder = "";
    });
</script>
@include('footer')