<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="top-category section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Brands</h5>
                </div>
                <div class="category-listbox brand_list">
                    <?php $__currentLoopData = $brandList['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="brand_list_item">
                        <div class="brand_item_box">
                             <a href="<?php echo e(ENV('APP_URL')); ?>brand-product-list?brand_id=<?php echo e($brand['cat_id']); ?>&name=<?php echo e(urlencode($brand['title'])); ?>">
                                <img class="img-fluid" src="<?php echo e($brand['image']); ?>" alt="Product">
                         
                            </a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </div>
            </div>
        </div>
    </div>
</section>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/CategoryProduct/all-brands.blade.php ENDPATH**/ ?>