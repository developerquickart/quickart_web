@include('header')
<section class="top-category section-padding ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Product Categories</h5>
                </div>
                <div class="category-listbox">
                    <div class="categories_list">
                        @foreach($categories['data'] as $category)
                            <div class="category-item">
                                <a href="{{ env('APP_URL') }}subcategories-product-list/{{ Str::slug($category['title']) }}/{{ $category['cat_id'] }}/{{ Str::slug($category['subcategory'][0]['title']) }}/{{ $category['subcategory'][0]['cat_id'] }}">
                                    <img class="img-fluid" src="{{$category['image']}}" alt="Category">
                                    <h6>{{$category['title']}}</h6>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ONCLICK CART BOX START -->
<div class="cart_flating_btn" onclick="toggleOrderBox(event)">
    <small class="cart-value">0</small> <!-- This will be updated dynamically -->
    <img src="{{asset('assets/images/grocery-store.svg')}}" alt="">
</div>
<div class="order_placeBox" id="orderBox" style="display: none;">
    <div class="row align-items-center">
        <div class="col-12">
            <div class="freeDeliverytext">Congratulations! You've got <span>FREE DELIVERY</span></div>
            <div class="countText">0 items | AED 0</div> <!-- This will be updated -->
            <div class="saveText">You have saved <span>AED 0</span> on your order</div> <!-- This will be updated -->
        </div>
    </div>
</div>
<!-- ONCLICK CART BOX END -->

<script>
    function toggleOrderBox(event) {
        event.stopPropagation();
        const orderBox = document.getElementById('orderBox');
        orderBox.style.display = orderBox.style.display === 'none' ? 'block' : 'none';
    }
    document.addEventListener('click', function (event) {
        const orderBox = document.getElementById('orderBox');
        const cartButton = document.querySelector('.cart_flating_btn');

        if (!orderBox.contains(event.target) && !cartButton.contains(event.target)) {
            orderBox.style.display = 'none';
        }
    });
</script>
@include('footer')
