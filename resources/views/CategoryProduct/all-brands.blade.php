@include('header')
<section class="top-category section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Brands</h5>
                </div>
                <div class="category-listbox brand_list">
                    @foreach($brandList['data'] as $brand)
                    <div class="brand_list_item">
                        <div class="brand_item_box">
                             <a href="{{ENV('APP_URL')}}brand-product-list?brand_id={{$brand['cat_id']}}&name={{ urlencode($brand['title']) }}">
                                <img class="img-fluid" src="{{$brand['image']}}" alt="Product">
                         
                            </a>
                        </div>
                    </div>
                    @endforeach
               </div>
            </div>
        </div>
    </div>
</section>
@include('footer')