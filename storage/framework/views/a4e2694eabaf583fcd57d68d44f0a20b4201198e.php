<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="shop-list section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="section-header">
                <h5 class="heading-design-h5"><?php echo e($name); ?></h5>
            </div>
            <?php if(isset($productList['data']) && count($productList['data']) > 0): ?>
              <div id="productList">
                <div class="product_list_box">
                 <?php echo $__env->make('CategoryProduct.top-selling-product-list-partial', ['productList' => $productList['data']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                 </div>
            </div>
            <div class="ploader">
                <div id="loader" style="display: flex; justify-content: center; align-items: center;">
                    <img src="<?php echo e(asset('assets/images/loader.gif')); ?>" alt="Loading..." class="img-fluid" style="max-width:7%;" />
                </div>
            </div>
            <?php else: ?>
            <div class="shop-list section-padding">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-6">
                            <div class="data_not_available">
                                <div class="imageBox">
                                    <img src="<?php echo e(asset('assets/images/No_product_available.png')); ?>"
                                        alt="empty cart" class="img-fluid">
                                </div>
                                <div class="textBox text-center">
                                    <a href="<?php echo e(url('/')); ?>" class="my-4 d-block">
                                        <div class="cancel_btn">Let's Shop</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<script>
function toggleOrderBox(event) {
    event.stopPropagation();
    const orderBox = document.getElementById('orderBox');
    orderBox.style.display = orderBox.style.display === 'none' ? 'block' : 'none';
}
document.addEventListener('click', function(event) {
    const orderBox = document.getElementById('orderBox');
    const cartButton = document.querySelector('.cart_flating_btn');

    if (!orderBox.contains(event.target) && !cartButton.contains(event.target)) {
        orderBox.style.display = 'none';
    }
});
</script>

<script>
    $('.ploader').hide();
    let page = 2;
    let isLoading = false;
    let hasMorePages = true;
    let totalPages = '<?php echo e($productList['data'][0]['totalPages'] ?? 1); ?>';
    // let $lastProduct = $('.all_product_list').last();
    let $lastRow = getLastRowItems();

    $(document).ready(function () {
        $(window).scroll(function() {
           
                if ($lastRow.length && isRowInView($lastRow)) {

                if (!isLoading && hasMorePages) {
                    if(page <= totalPages){
                        loadMoreData(page);
                        page++;
                    }
                    
                }
            }
        });
    });
 // ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) 
    function loadMoreData(page) {
        isLoading = true;
        $('.ploader').show();

        var screen_name="<?php echo e(Request::get('screen_name')); ?>";
        var name="<?php echo e(Request::get('name')); ?>";

        $.ajax({
            url: '<?php echo e(url("top-selling-product-list")); ?>',
            type: "get",
            data: {'page':page,'screen_name':screen_name,'name':name},
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
    
 
    // 🔍 Get all product items from the last row
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

// 📍 Check if any item in the last row is visible
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

<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/CategoryProduct/top-selling-product-list.blade.php ENDPATH**/ ?>