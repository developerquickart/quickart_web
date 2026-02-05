@include('header')
<?php
$selectedMainCat = $category_name;
$selectedMainCatBanner = !empty($banner)?$banner:'';
$selectedSubcat = $Sub_cat_name;
$defaultSubCatId = (!empty($Sub_cat_id)) ? $Sub_cat_id : $subCatList['data'][0]['cat_id'];
?>
<!-- cart section start -->

<section class="cart_section subcate_section section-padding">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="mainCate_listingBox">
                    <div class="owl-carousel main_cate_slider">
                        @foreach($categories['data'] as $category)
                        <a class="mainCate_list {{ $cat_id == $category['cat_id'] ? 'active' : '' }}"
                            onclick="onClickCategory('{{ $category['cat_id'] }}', $category['title']"
                             href="{{ env('APP_URL') }}subcategories-product-list/{{ Str::slug($category['title']) }}/{{ $category['cat_id'] }}/{{ Str::slug($category['subcategory'][0]['title']) }}/{{ $category['subcategory'][0]['cat_id'] }}">
                            {{ $category['title'] }}
                        </a>
                        @endforeach
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart_tabbing_mainBox">
                            <div class="all_categories_listing_mainBox mt-4">
                                <div class="left_subCate_listingMainBox">
                                    <ul class="sub_cate_nav" id="pills-tab" role="tablist">
                                        @foreach($subCatList['data'] as $subcat)
                                        <a class="all_cate_subCate_list"
                                            onclick="SubCategoryList('{{ $cat_id }}', '{{ $subcat['cat_id'] }}', '{{ $subcat['title'] }}', '{{ $subcat['web_banner'] }}',1 );">
                                            <li class=" nav-item" role="presentation">
                                                <button
                                                    class="nav-link {{ $defaultSubCatId == $subcat['cat_id'] ? 'active' : '' }}"
                                                    id="categories{{$subcat['cat_id']}}" data-bs-toggle="pill"
                                                    data-bs-target="#categories_box{{$subcat['cat_id']}}" type="button"
                                                    role="tab" aria-controls="categories_box{{$subcat['cat_id']}}"
                                                    aria-selected="{{ $defaultSubCatId == $subcat['cat_id'] ? 'true' : 'false' }}">
                                                    <div class="categories_list_box">
                                                        <div class="categories_list_img">
                                                            <img src="{{$subcat['image']}}" alt="{{$subcat['title']}}">
                                                        </div>
                                                        <div class="categories_list_text">{{$subcat['title']}}</div>
                                                    </div>
                                                </button>
                                            </li>
                                        </a>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="right_subCate_listingMainBox">
                                     <input type="hidden" name="subcategory_id" id="subcategory_id" value="{{$defaultSubCatId}}" />
                                    
                                    <div class="subcategories_banner" id="subcategories_banner">
                                        <img src="" alt="" id="subcategories_bannerImg">
                                    </div>
                                   
                                    <div class="section-header">
                                        <h5 class="heading-design-h5" id='selectedCatID'>{{$selectedMainCat}}
                                            <span id='selectedSubCatID'>{{str_replace('-',' ',$selectedSubcat)}}</span>
                                        </h5>
                                    </div>
                                    <div class="sloader">
                                        <!-- <div id="loader1" style="display: flex; justify-content: center; align-items: center;">-->
                                        <!--    <img src="{{ asset('assets/images/loader.gif') }}" alt="Loading..." class="img-fluid" style="max-width:7%;" />-->
                                        <!--</div>-->
                                        <!--<p>Loading more products...</p>-->
                                    </div>
                                    <div id="productList">
                                        <div class="product_list_box">
                                         @include('CategoryProduct.subcategories-product-list-partial', ['productList' => $productList['data']])
                                        </div> 
                                    </div>
                                    <div class="ploader">
                                         <div id="loader" style="display: flex; justify-content: center; align-items: center;">
                                            <img src="{{ asset('assets/images/loader.gif') }}" alt="Loading..." class="img-fluid" style="max-width:7%;" />
                                        </div>
                                        <!--<p>Loading more products...</p>-->
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

<!-- cart section end -->

@include('footer')

<!-- TABBING SCRIPT START -->
<script>
let page = 2;
let isLoading = false;
let hasMorePages = true;
$(document).ready(function () {
    $('.ploader, .sloader').hide();
    
    var sub_cat_id = document.getElementById("subcategory_id").value;
    var subcatValue = document.getElementById('selectedSubCatID').innerText.trim();

    // Fallback values from server-side (Blade)
    var fallbackSubCatId = '{{ $subCatList['data'][0]['cat_id'] }}';
    var fallbackSubCatName = '{{ $subCatList['data'][0]['title'] }}';
    var catId = '{{ $cat_id }}';
    var banner = '{{ $subCatList['data'][0]['banner'] }}';

    // Use JavaScript fallback logic
    var finalSubCatId = sub_cat_id ? sub_cat_id : fallbackSubCatId;
    var finalSubCatName = subcatValue ? subcatValue : fallbackSubCatName;

    console.log(finalSubCatName, finalSubCatId);

    SubCategoryList(catId, finalSubCatId, finalSubCatName, banner,0 );
  //  SubCategoryList('{{ $cat_id }}', '{{ $subCatList['data'][0]['cat_id'] }}', '{{ $subCatList['data'][0]['title'] }}', '{{ $subCatList['data'][0]['banner'] }}');
    $(window).scroll(function() {
        let totalPages = document.getElementById("totalPages").value;
        let $lastRow = getLastRowItems();

        if ($lastRow.length && isRowInView($lastRow)) {    
            if (!isLoading && hasMorePages) {
                console.log(page,totalPages);
                if(page <= totalPages){
                    loadMoreData(page,false);
                    page++;
                }
                
            }
        }
    });
    
});    
  // if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
 function loadMoreData(page,loadSubcategory) {
        isLoading = true;
        $('.ploader,.sloader').show();

        var cat_name="{{$cat_name}}";
        var cat_id="{{$cat_id}}";
        var sub_cat_id=document.getElementById("subcategory_id").value;
        let subcatValue = document.getElementById('selectedSubCatID').innerText;
        // let cleanUrl = `/subcategories-product-list/${cat_name}/${cat_id}/${subcatValue}/${sub_cat_id}`;
        let cleanUrl = '{{url("subcategories-product-list/".$cat_name."/".$cat_id."/".$selectedSubcat."/".$defaultSubCatId)}}';

        $.ajax({
            url: cleanUrl,
            type: "get",
            data: {'page':page},
            // data: {'page':page,'category':cat_name,'subcatid':sub_cat_id,'catid':cat_id,'name': subcatValue},
            success: function(data) {
                  gtag('event', 'page_viewW', {
                    page_title: document.title,
                    page_location: window.location.href,
                    page_path: window.location.pathname,
                     debug_mode: false
                    });
                if (data.trim().length === 0) {
                    hasMorePages = false;
                    $('.ploader,.sloader').html("");
                    
                } else {
                   // console.log(data);
                    if(loadSubcategory == true){
                        $(".product_list_box").html(data);
                    }else{
                        $(".product_list_box").append(data);
                    }
                    bindCartButtons();
                    $('.ploader,.sloader').hide();
                    
                    hasMorePages = true;
                    isLoading = false;
                }
                
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
                isLoading = false;
            }
        });
    }
    
     // Get all product items from the last row
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

// Check if any item in the last row is visible
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

<script>
 let totalPages = document.getElementById("totalPages").value;
function SubCategoryList(cat_id, sub_cat_id, title, banner, btnTag) {

    // document.getElementById("selectedSubCatID").innerText = `(${title})`;
    document.getElementById("subcategory_id").value = sub_cat_id;
    
     if (btnTag == 1){
        const categoryName = @json($category_name);
        const slug = categoryName.toLowerCase().replace(/\s+/g, '-').replace(/[^\w-]/g, '');
        const slug1 = title.toLowerCase().replace(/\s+/g, '-').replace(/[^\w-]/g, '');
        const baseUrl = "{{ url('subcategories-product-list') }}";
        const url = `${baseUrl}/${slug}/${cat_id}/${slug1}/${sub_cat_id}`;
        window.location.href = url;
    }
    
    var selectedBaneer = document.getElementById("subcategories_banner");

    if(banner != null && banner != ""){
        selectedBaneer.style.display = 'block';
        document.getElementById("subcategories_bannerImg").src = banner;
    } else {
        selectedBaneer.style.display = 'none';
    }

    
    var  loadSubcategory = true;
    // Reset state
      page = 2;
      isLoading = false;
      hasMorePages = true;
    
    loadMoreData(1,loadSubcategory);
}

function onClickCategory(cat_id, title) {
    document.getElementById("selectedCatID").innerText = title;

    var store_ID = "{{ env('STORE_ID') }}";

    jQuery.ajax({
        url: "/get-category",
        method: "POST",
        data: {
            catid: cat_id,
            _token: "{{ csrf_token() }}",
        },

        success: function(result) {
            console.error("result------:", result);
              gtag('event', 'page_viewW', {
                page_title: document.title,
                page_location: window.location.href,
                page_path: window.location.pathname,
                 debug_mode: false
                });
        },
        error: function(err) {
            console.error("Error:", err.responseJSON || err);
            alert("Failed to fetch products. Please try again.");
        }
    });
}



document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.nav-link');

    tabButtons.forEach((tabButton) => {
        tabButton.addEventListener('click', function() {
            // Remove active state from all tabs
            tabButtons.forEach((btn) => btn.classList.remove('active'));

            // Add active state to the current tab
            this.classList.add('active');
        });
    });
    
    
});
</script>

<!-- TABBING SCRIPT END -->


<script>
function toggleOrderBox(event) {
    event.stopPropagation();
    const orderBox = document.getElementById('orderBox');
    orderBox.style.display = orderBox.style.display === 'none' ? 'block' : 'none';
}

// document.addEventListener('click', function(event) {
//     const orderBox = document.getElementById('orderBox');
//     const cartButton = document.querySelector('.cart_flating_btn');

//     if (!orderBox.contains(event.target) && !cartButton.contains(event.target)) {
//         orderBox.style.display = 'none';
//     }
// });
</script>