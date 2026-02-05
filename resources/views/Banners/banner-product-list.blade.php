@include('header')
@if(isset($productList['data']) && count($productList['data']) > 0)
<section class="shop-list section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="section-header">
                <h5 id="bannerHeading" class="heading-design-h5">{{($productList['banner_detail']['banner_name'])?$productList['banner_detail']['banner_name']:''}}</h5>
            </div>  
        </div>    
        <div class="product_list_box">
                 @include('Banners.banner-product-list-partial', ['productList' => $productList['data']])
            </div>
             <div class="ploader">
                <div id="loader" style="display: flex; justify-content: center; align-items: center;">
                    <img src="{{ asset('assets/images/loader.gif') }}" alt="Loading..." class="img-fluid" style="max-width:7%;" />
                </div>
            </div>
    </div>
</section>
@else
<section class="shop-list section-padding">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="data_not_available">
                    <div class="imageBox">
                        <img src="{{asset('assets/images/No_product_available.png')}}" alt="empty cart"
                            class="img-fluid">
                    </div>
                    <div class="textBox text-center">
                        <a href="{{url('/')}}" class="my-4 d-block">
                            <div class="cancel_btn">Let's Shop</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<script>
    $('.ploader').hide();
    let page = 2;
    let isLoading = false;
    let hasMorePages = true;
    let totalPages = '{{$productList['data'][0]['totalPages'] ?? 1}}';
    let $lastRow = getLastRowItems();

    $(document).ready(function () {
        $(window).scroll(function() {
            if ($lastRow.length && isRowInView($lastRow)) {
                if (!isLoading && hasMorePages) {
                    console.log(page,totalPages);
                    if(page <= totalPages){
                        loadMoreData(page);
                        page++;
                    }
                     
                }
            }
        });
    });    
    
      // Helper function to slugify text
    function slugify(text) {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')           // Replace spaces with -
            .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
            .replace(/\-\-+/g, '-')         // Replace multiple - with single -
            .replace(/^-+/, '')             // Trim - from start of text
            .replace(/-+$/, '');            // Trim - from end of text
    }


    function loadMoreData(page) {
        isLoading = true;
        $('.ploader').show();

        var banner_id="{{Request::get('banner-id')}}";
        var banner_type="{{Request::get('banner-type')}}";
        const headingText = document.getElementById('bannerHeading')?.innerText || '';
        console.log("Banner Heading Text:", headingText);
    
        const slug = slugify(headingText); // if needed
        console.log("Slugified Heading:", slug);

        $.ajax({
            // url: `/banner-product-list/${slug}?banner-id=${banner_id}&banner-type=${banner_type}`,
            url: "{{url('banner-product-list')}}"+'/'+slug,
            type: "get",
            data: {'page':page,'banner-id':banner_id,'banner-type':banner_type},
            success: function(data) {
                if (data.trim().length === 0) {
                    hasMorePages = false;
                    $('.ploader').html("");
                } else {
                    $(".product_list_box").append(data);
                    $('.ploader').hide();
                }
                isLoading = false;
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
                isLoading = false;
            }
        });
    }
    
    //Get all product items from the last row
   function getLastRowItems() {
    const $items = $('.all_product_list');
    let lastOffsetTop = 0;
    let $lastRowItems = $();

    $items.each(function () {
        const $this = $(this);
        const offsetTop = $this.offset().top;

        if (offsetTop > lastOffsetTop) {
            lastOffsetTop = offsetTop;
            $lastRowItems = $(); // reset for new row
        }

        if (offsetTop === lastOffsetTop) {
            $lastRowItems = $lastRowItems.add($this);
        }
    });

    return $lastRowItems;
}

    //Check if any item in the last row is visible
    function isRowInView($rowItems) {
        const windowBottom = $(window).scrollTop() + $(window).height();
    
        let visible = false;
        $rowItems.each(function () {
            const elTop = $(this).offset().top;
            if (elTop < windowBottom) {
                visible = true;
                return false; // break loop
            }
        });
    
        return visible;
    }
</script>
@include('footer')