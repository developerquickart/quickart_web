@include('header')
<section class="section-padding">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Apply Coupon</h5>
                </div>
                <div class="coupons_listing_mainbox">
                    <div class="coupon_searchBox">
                        <div class="row">
                            <div class="col-lg-5">
                                <form action="">
                                    <div class="coupon_search">
                                        <input class="form-control" placeholder="Enter Coupon Code" type="text">
                                        <button type="submit" [disabled]="!form.form.valid">
                                            APPLY
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="coupon_list_mainBox">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="coupon_listing_box">
                                            <div class="subheading">Available Coupons</div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="coupon_item">
                                                        <div class="coupon_data">
                                                            <div class="coupon_code_data">
                                                                <div class="coupon_code">
                                                                    <div class="coupon_img">
                                                                        <img src="{{asset('assets/images/cred.png')}}"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="coupon_code_text" onclick="copyText()">
                                                                        QUICKCRED50</div>
                                                                </div>
                                                                <div class="coupon_apply_btn">
                                                                    Apply
                                                                </div>
                                                            </div>
                                                            <p>Unlock flat AED 50 off coupon on CRED Pay </p>
                                                        </div>
                                                        <div class="coupon_details">
                                                            <div class="coupon_details_text">
                                                                Use code QUICKCRED50 on order above AED 200 and get AED
                                                                50 off
                                                                on CRED
                                                                Pay
                                                                app.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="coupon_item">
                                                        <div class="coupon_data">
                                                            <div class="coupon_code_data">
                                                                <div class="coupon_code">
                                                                    <div class="coupon_img">
                                                                        <img src="{{asset('assets/images/pay.png')}}"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="coupon_code_text" onclick="copyText()">
                                                                        QUICFTGE97</div>
                                                                </div>
                                                                <div class="coupon_apply_btn">
                                                                    Apply
                                                                </div>
                                                            </div>
                                                            <p>Unlock flat AED 10 off coupon on Amazon Pay </p>
                                                        </div>
                                                        <div class="coupon_details">
                                                            <div class="coupon_details_text">
                                                                Use code QUICFTGE97 on order above AED 200 and get AED
                                                                50 off on
                                                                CRED
                                                                Pay
                                                                app.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="coupon_item">
                                                        <div class="coupon_data">
                                                            <div class="coupon_code_data">
                                                                <div class="coupon_code">
                                                                    <div class="coupon_img">
                                                                        <img src="{{asset('assets/images/cred.png')}}"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="coupon_code_text" onclick="copyText()">
                                                                        IUTVCKC3E4R</div>
                                                                </div>
                                                                <div class="coupon_apply_btn">
                                                                    Apply
                                                                </div>
                                                            </div>
                                                            <p>Unlock flat AED 50 off coupon on CRED Pay </p>
                                                        </div>
                                                        <div class="coupon_details">
                                                            <div class="coupon_details_text">
                                                                Use code IUTVCKC3E4R on order above AED 200 and get AED
                                                                50 off
                                                                on CRED
                                                                Pay
                                                                app.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="coupon_listing_box">
                                            <div class="subheading">Unavailable Coupons</div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="coupon_item unavailable_coupons">
                                                        <div class="coupon_data">
                                                            <div class="coupon_code_data">
                                                                <div class="coupon_code">
                                                                    <div class="coupon_img">
                                                                        <img src="{{asset('assets/images/pay.png')}}"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="coupon_code_text">QUICKCRED50</div>
                                                                </div>
                                                                <div class="coupon_apply_btn">
                                                                    Apply</div>
                                                            </div>
                                                            <p>Unlock flat AED 50 off coupon on CRED Pay </p>
                                                        </div>
                                                        <div class="coupon_details">
                                                            <div class="unavailble_offer_text">Add AED 50 worth items to
                                                                avail
                                                                this
                                                                offer!
                                                            </div>
                                                            <div class="coupon_details_text">
                                                                Use code QUICKCRED50 on order above AED 200 and get AED
                                                                50 off
                                                                on CRED
                                                                Pay
                                                                app.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="coupon_item unavailable_coupons">
                                                        <div class="coupon_data">
                                                            <div class="coupon_code_data">
                                                                <div class="coupon_code">
                                                                    <div class="coupon_img">
                                                                        <img src="{{asset('assets/images/cred.png')}}"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="coupon_code_text">OEHSTBV23ED4</div>
                                                                </div>
                                                                <div class="coupon_apply_btn">
                                                                    Apply</div>
                                                            </div>
                                                            <p>Unlock flat AED 14 off coupon on CRED Pay </p>
                                                        </div>
                                                        <div class="coupon_details">
                                                            <div class="unavailble_offer_text">Add AED 50 worth items to
                                                                avail
                                                                this
                                                                offer!
                                                            </div>
                                                            <div class="coupon_details_text">
                                                                Use code OEHSTBV23ED4 on order above AED 200 and get AED
                                                                50
                                                                off
                                                                on CRED
                                                                Pay
                                                                app.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="coupon_item unavailable_coupons">
                                                        <div class="coupon_data">
                                                            <div class="coupon_code_data">
                                                                <div class="coupon_code">
                                                                    <div class="coupon_img">
                                                                        <img src="{{asset('assets/images/pay.png')}}"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="coupon_code_text">POIUYTR453W</div>
                                                                </div>
                                                                <div class="coupon_apply_btn">
                                                                    Apply</div>
                                                            </div>
                                                            <p>Unlock flat AED 50 off coupon on CRED Pay </p>
                                                        </div>
                                                        <div class="coupon_details">
                                                            <div class="unavailble_offer_text">Add AED 50 worth items to
                                                                avail
                                                                this
                                                                offer!
                                                            </div>
                                                            <div class="coupon_details_text">
                                                                Use code POIUYTR453W on order above AED 200 and get AED
                                                                50
                                                                off
                                                                on CRED
                                                                Pay
                                                                app.
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- COPY TEXT START -->
<script>
let lastCopiedElement = null;

document.addEventListener("DOMContentLoaded", () => {
    const couponElements = document.querySelectorAll(".coupon_code_text");
    couponElements.forEach(element => {
        element.addEventListener("click", () => {
            const text = element.innerText;
            const textarea = document.createElement("textarea");
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand("copy");
            document.body.removeChild(textarea);

            if (lastCopiedElement) {
                lastCopiedElement.classList.remove("copied");
            }
            element.classList.add("copied");
            lastCopiedElement = element;

            // alert("Text copied to clipboard: " + text);
        });
    });
});
</script>

<!-- COPY TEXT END -->
@include('footer')