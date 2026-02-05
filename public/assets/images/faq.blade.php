@include('header')
<section class="rating_review_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="rating_review_mainbox">
                    <h5 class="heading-design-h5">FAQ's</h5>
                    <div class="faq_mainBox">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="faq_listingBox">
                                    <div class="accordion accordion-flush" id="accordion1">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#Que1"
                                                    aria-expanded="false" aria-controls="Que1">
                                                    How Can I Place a One-Time Order?
                                                </button>
                                            </h2>
                                            <div id="Que1" class="accordion-collapse collapse"
                                                data-bs-parent="#accordion1">
                                                <div class="accordion-body">
                                                    You can easily place a one-time order by adding your desired
                                                    products. Click on the "ADD" button on the selected products. Once
                                                    the products are added click on the Cart icon which will take you to
                                                    the Daily Cart.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#Que2"
                                                    aria-expanded="false" aria-controls="Que2">
                                                    How Can I Place a Subscription Order?
                                                </button>
                                            </h2>
                                            <div id="Que2" class="accordion-collapse collapse"
                                                data-bs-parent="#accordion2">
                                                <div class="accordion-body">
                                                    You can easily place a one-time order by adding your desired
                                                    products. Click on the "ADD" button on the selected products. Once
                                                    the products are added click on the Cart icon which will take you to
                                                    the Daily Cart.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#Que3"
                                                    aria-expanded="false" aria-controls="Que3">
                                                    How Can I Order Both a One-Time Order and a Subscription Order?
                                                </button>
                                            </h2>
                                            <div id="Que3" class="accordion-collapse collapse"
                                                data-bs-parent="#accordion2">
                                                <div class="accordion-body">
                                                    You can easily place a one-time order by adding your desired
                                                    products. Click on the "ADD" button on the selected products. Once
                                                    the products are added click on the Cart icon which will take you to
                                                    the Daily Cart.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="faq_contact_details">
                                    <div class="contact_data pt-0">Still need a support? We are available 24x7</div>
                                    <div class="form_links d-flex align-items-center">
                                        <img src="{{asset('assets/images/contact_call.png')}}" alt="Call">
                                        <a href="tel:+971 42390322">971 42390322</a>
                                    </div>
                                    <div class="form_links d-flex align-items-center">
                                        <img src="{{asset('assets/images/contact_mail.png')}}" alt="Email">
                                        <a
                                            href="https://mail.google.com/mail/?view=cm&fs=1&to=email@domain.example">customersupport@quickart.ae</a>

                                    </div>
                                    <div class="form_links d-flex align-items-center">
                                        <img src="{{asset('assets/images/contact-whatsapp.png')}}" alt="Whatsapp">
                                        <a href="//api.whatsapp.com/send?phone=97142390322&text=Wel-Come">Chat
                                            with us</a>
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
@include('footer')