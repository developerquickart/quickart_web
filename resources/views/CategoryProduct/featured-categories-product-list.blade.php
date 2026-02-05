@include('header')

<?php
$featuredCategories =  $Sub_cat_name;
$defaultSubCatId = request('fid', $subCatList['data'][0]['id']);
if (!isset($subCatList['data'][0]['id'])) {
    $defaultSubCatId = $subCatList['data'][array_key_first($subCatList['data'])]['title'];
}
?>

<!-- cart section start -->
<section class="cart_section subcate_section section-padding nikita">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart_tabbing_mainBox">
                            <div class="all_categories_listing_mainBox mt-4">
                                @if(isset($subCatList['data']) && count($subCatList['data']) > 0)
                                <div class="left_subCate_listingMainBox">
                                    <ul class="sub_cate_nav" id="pills-tab" role="tablist">
                                        @foreach($subCatList['data'] as $subcat)
                                        <a class="all_cate_subCate_list"
                                            onclick="SubCategoryList('{{ $subcat['id'] }}', '{{ $subcat['title'] }}');"
                                            href="{{ENV('APP_URL')}}featured-categories-product-list/{{$subcat['id']}}/{{Str::slug($subcat['title'])}}">
                                            <li class=" nav-item" role="presentation">
                                                <button
                                                    class="nav-link {{ $subcat['id'] == $defaultSubCatId ? 'active' : '' }}"
                                                    id="categories{{$subcat['id']}}" data-bs-toggle="pill"
                                                    data-bs-target="#categories_box{{$subcat['id']}}" type="button"
                                                    role="tab" aria-controls="categories_box{{$subcat['id']}}"
                                                    aria-selected="{{ $subcat['id'] == $subcat['id'] ? 'true' : 'false' }}">
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
                                @endif

                                <div class="right_subCate_listingMainBox">
                                     <input type="hidden" name="fcategory_id" id="fcategory_id" value="{{\Request::get('fid')}}" />
                                    <div class="section-header">
                                        <h5 class="heading-design-h5" id='selectedCatID'>{{str_replace('-',' ',$Sub_cat_name)}} Category
                                        </h5>
                                    </div>
                                     @if(isset($productList['data']) && count($productList['data']) > 0)
                                        <div id="featuredproductList">
                                            <div class="product_list_box">
                                                @include('CategoryProduct.featured-categories-product-list-partial', ['productList' => $productList['data']])
                                            </div>
                                        </div>
                                        @else
                                        <div class="shop-list section-padding">
                                            <div class="container">
                                                <div class="row align-items-center justify-content-center">
                                                    <div class="col-lg-6">
                                                        <div class="data_not_available">
                                                            <div class="imageBox">
                                                                <img src="{{asset('assets/images/No_product_available.png')}}"
                                                                    alt="empty cart" class="img-fluid">
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
                                        </div>
                                        @endif
                                        <div class="ploader">
                                            <div id="loader" style="display: flex; justify-content: center; align-items: center;">
                                                <img src="{{ asset('assets/images/loader.gif') }}" alt="Loading..." class="img-fluid" style="max-width:7%;" />
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

<!-- cart section end -->



<!-- TABBING SCRIPT END -->

// <script>
// function toggleOrderBox(event) {
//     event.stopPropagation();
//     const orderBox = document.getElementById('orderBox');
//     orderBox.style.display = orderBox.style.display === 'none' ? 'block' : 'none';
// }
// document.addEventListener('click', function(event) {
//     const orderBox = document.getElementById('orderBox');
//     const cartButton = document.querySelector('.cart_flating_btn');

//     if (!orderBox.contains(event.target) && !cartButton.contains(event.target)) {
//         orderBox.style.display = 'none';
//     }
// });
// </script>


@include('footer')
<!-- TABBING SCRIPT START -->
<script>
$('.ploader').hide();
let page = 2;
let isLoading = false;
let hasMorePages = true;
$(document).ready(function () {
    
   
    $(window).scroll(function() {
        let totalPages = document.getElementById("totalPages").value;
        
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
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

 function loadMoreData(page,loadSubcategory) {
        isLoading = true;
        $('.ploader').show();
 
        var cat_id=document.getElementById("fcategory_id").value;
        $.ajax({
            url: '{{url("featured-categories-product-list")}}',
            type: "get",
            data: {'page':page,'fid':cat_id},
            success: function(data) {
                  gtag('event', 'page_viewW', {
                    page_title: document.title,
                    page_location: window.location.href,
                    page_path: window.location.pathname,
                     debug_mode: false
                    });
                if (data.trim().length === 0) {
                    hasMorePages = false;
                    $('.ploader').html("");
                } else {
                   // console.log(data);
                    if(loadSubcategory == true){
                        $(".product_list_box").html(data);
                    }else{
                        $(".product_list_box").append(data);
                    }
                    bindCartButtons();
                    $('.ploader').hide();
                    
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
</script>
<script>
function SubCategoryList(id, title) {

    document.getElementById("selectedCatID").innerText = title + " Category";
    document.getElementById("fcategory_id").value = id;
    
    var  loadSubcategory = true;
    // Reset state
      page = 2;
      isLoading = false;
      hasMorePages = true;
      loadMoreData(1,loadSubcategory);

    // jQuery.ajax({
    //     url: "{{url('selected-featured-categories-product-list')}}",
    //     method: "POST",
    //     data: {
    //         fid: id,
    //         title: title,
    //         _token: "{{ csrf_token() }}",
    //     },

    //     success: function(result) {

    //         jQuery(`#featuredproductList`).html(result);
    //         jQuery('html, body').scrollTop(0);

    //     },
    //     error: function(err) {
    //         console.error("Error:", err.responseJSON || err);
    //         alert("Failed to fetch products. Please try again.");
    //     }
    // });
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
