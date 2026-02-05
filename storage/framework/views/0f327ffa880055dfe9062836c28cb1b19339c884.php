<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="top-category section-padding ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Product Categories</h5>
                </div>
                <div class="category-listbox">
                    <div class="categories_list">
                        <?php $__currentLoopData = $categories['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="category-item">
                                <a href="<?php echo e(env('APP_URL')); ?>subcategories-product-list/<?php echo e(Str::slug($category['title'])); ?>/<?php echo e($category['cat_id']); ?>/<?php echo e(Str::slug($category['subcategory'][0]['title'])); ?>/<?php echo e($category['subcategory'][0]['cat_id']); ?>">
                                    <img class="img-fluid" src="<?php echo e($category['image']); ?>" alt="Category">
                                    <h6><?php echo e($category['title']); ?></h6>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ONCLICK CART BOX START -->
<div class="cart_flating_btn" onclick="toggleOrderBox(event)">
    <small class="cart-value">0</small> <!-- This will be updated dynamically -->
    <img src="<?php echo e(asset('assets/images/grocery-store.svg')); ?>" alt="">
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
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/CategoryProduct/all-categories.blade.php ENDPATH**/ ?>