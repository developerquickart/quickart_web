@include('header')
<section class="terms_section section-padding py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="section-header">
                    <h5 class="heading-design-h5">Terms & Conditions</h5>
                </div>
                @if(isset($getTermsCondition['data']))
                    <div class="width100 terms_content">
                        {!!$getTermsCondition['data']['description'] !!}
                    </div>

                @endif
            </div>
        </div>
    </div>
</section>
@include('footer')