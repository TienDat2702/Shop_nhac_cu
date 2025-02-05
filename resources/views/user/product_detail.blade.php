@extends('user.layouts.app')
@section('title', $product->name)
@section('content')
    <main class="pt-135">
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li>
                        <a href="{{ route('home.index') }}">Trang chủ</a> 
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </li>
                    <li>
                        <a href="#">{{ $product->category->name }}</a>
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </li>
                    <li><a href="#">{{ $product->name }}</a></li>
                </ul>
            </div>
        </div>
        <div class="mb-md-1 pb-md-3"></div>
        <section class="product-single container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="product-single__media" data-media-type="vertical-thumbnail">
                        <div class="product-single__image">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide product-single__image-item">
                                        <img loading="lazy" class="h-auto"
                                            src="{{ asset('uploads/products/product/' . $product->image) }}" width="674"
                                            height="674" alt="" />
                                    </div>
                                    @foreach ($product->thumbnails as $item)
                                        <div class="swiper-slide product-single__image-item">
                                            <img loading="lazy" class="h-auto" src="{{ $item->path }}" width="674"
                                                height="674" alt="" />
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <use href="#icon_prev_sm" />
                                    </svg></div>
                                <div class="swiper-button-next"><svg width="7" height="11" viewBox="0 0 7 11"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <use href="#icon_next_sm" />
                                    </svg></div>
                            </div>
                        </div>
                        <div class="product-single__thumbnail">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide product-single__image-item"><img loading="lazy" class="h-auto"
                                            src="{{ asset('uploads/products/product/' . $product->image) }}" width="104"
                                            height="104" alt="" /></div>
                                    @foreach ($product->thumbnails as $item)
                                        <div class="swiper-slide product-single__image-item"><img loading="lazy"
                                                class="h-auto" src="{{ $item->path }}" width="104" height="104"
                                                alt="" /></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    {{-- <div class="d-flex justify-content-between mb-4 pb-md-2">
                        <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
                            <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Home</a>
                            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
                            <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">The Shop</a>
                        </div><!-- /.breadcrumb -->
                    </div> --}}
                    <h1 class="product-single__name">{{ $product->name }}</h1>
                    <div class="product-single__rating">
                        @php
                            $averageStarts = $averageStart > 0 ? $averageStart : 5
                        @endphp
                        <span class="reviews-note text-lowercase text-secondary">{{$averageStarts}}</span>
                        <div class="reviews-group d-flex align-content-center">
                            @for ($i = 1; $i <= 5; $i++)
                                <div style="position: relative; display: inline-block; width: 18px; height: 18px;">
                                    <!-- Sao xám (nền) -->
                                    <svg class="review-star" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                        style="position: absolute; top: 0; left: 0;">
                                        <use href="#icon_star" fill="#ccc" />
                                    </svg>

                                    <!-- Sao vàng (phía trên) -->
                                    @if ($i <= floor($averageStarts))
                                        <!-- Hiển thị sao đầy đủ -->
                                        <svg class="review-star" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                            style="position: absolute; top: 0; left: 0;">
                                            <use href="#icon_star" fill="#FFD700" />
                                        </svg>
                                    @elseif ($i == ceil($averageStarts))
                                        <!-- Hiển thị sao một phần theo tỷ lệ -->
                                        @php
                                            $percentage = ($averageStarts - floor($averageStarts)) * 100;
                                        @endphp
                                        <svg class="review-star" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                            style="position: absolute; top: 0; left: 0; clip-path: inset(0 {{ 100 - $percentage }}% 0 0);">
                                            <use href="#icon_star" fill="#FFD700" />
                                        </svg>
                                    @endif
                                </div>
                            @endfor
                        </div>
                        <span class="reviews-note text-lowercase text-secondary ms-1">{{ $product->view }} lượt xem</span>
                    </div>
                    <div class="product-single__price">
                        <span class="current-price">{{ number_format($product->price) }} VNĐ</span>
                    </div>
                    <div class="product-single__short-desc">
                        <p>{!! $product->short_description !!}</p>
                    </div>
                    <div class="product-single__addtocart">
                        {{-- quantity --}}
                        <div class="qty-control position-relative">
                            <input id="quantity" type="number" name="quantity" value="1" min="1"
                                class="qty-control__number text-center">
                            <div class="qty-control__reduce">-</div>
                            <div class="qty-control__increase">+</div>
                        </div><!-- .qty-control -->
                        <button data-url="{{ route('cart.add', $product->id) }}" type="submit"
                            class="btn btn-primary btn-addtocart add-to-cart" data-aside="cartDrawer">Thêm vào giỏ
                            hàng</button>
                    </div>
                    <div class="product-single__addtolinks">

                        <a class="menu-link menu-link_us-s add-to-wishlist btn-redirect" data-route='product.detail' data-slug='{{ $product->slug }}'>
                            @if (array_key_exists($product->id, $product_favourite)) <!-- Sản phẩm đã yêu thích -->
                                <form action="{{ route('wishlist.remove', $product_favourite[$product->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="menu-link menu-link_us-s add-to-wishlist">
                                        <i class="fa-solid fa-heart"></i>
                                        <span>YÊU THÍCH</span>
                                    </button>
                                </form>
                            @else <!-- Sản phẩm chưa yêu thích -->
                                <form action="{{ route('wishlist.add', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="menu-link menu-link_us-s add-to-wishlist">
                                        <i class="fa-regular fa-heart"></i>
                                        <span>YÊU THÍCH</span>
                                    </button>
                                </form>
                            @endif  
                            {{-- <span>Yêu thích</span> --}}
                        </a>
                        <share-button class="share-button">
                            <button
                                class="menu-link menu-link_us-s to-share border-0 bg-transparent d-flex align-items-center">
                                <svg width="16" height="19" viewBox="0 0 16 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <use href="#icon_sharing" />
                                </svg>
                                <span>Chia sẻ</span>
                            </button>
                            <details id="Details-share-template__main" class="m-1 xl:m-1.5" hidden="">
                                <summary class="btn-solid m-1 xl:m-1.5 pt-3.5 pb-3 px-5">+</summary>
                                <div id="Article-share-template__main"
                                    class="share-button__fallback flex items-center absolute top-full left-0 w-full px-2 py-4 bg-container shadow-theme border-t z-10">
                                    <div class="field grow mr-4">
                                        <label class="field__label sr-only" for="url">Link</label>
                                        <input type="text" class="field__input w-full" id="url" 
                                            value="{{ url()->current() }}" 
                                            placeholder="Link" onclick="this.select();" readonly>
                                    </div>
                                    <button class="share-button__copy no-js-hidden">
                                        <svg class="icon icon-clipboard inline-block mr-1" width="11" height="13"
                                            fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                            focusable="false" viewBox="0 0 11 13">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M2 1a1 1 0 011-1h7a1 1 0 011 1v9a1 1 0 01-1 1V1H2zM1 2a1 1 0 00-1 1v9a1 1 0 001 1h7a1 1 0 001-1V3a1 1 0 00-1-1H1zm0 10V3h7v9H1z"
                                                fill="currentColor"></path>
                                        </svg>
                                        <span class="sr-only">Copy link</span>
                                    </button>
                                </div>
                            </details>
                        </share-button>
                        <script src="{{ asset('js/details-disclosure.js') }}" defer></script>
                        <script src="{{ asset('js/share.js') }}" defer></script>
                    </div>
                    <div class="product-single__meta-info">

                        <div class="meta-item">
                            <label>Danh mục</label>
                            <span>{{ $product->productCategory ? $product->productCategory->name : '' }}</span>
                        </div>
                        <div class="meta-item">
                            <label>Thương hiệu:</label>
                            <span>{{ $brand ? $brand->name : '' }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-single__details-tab">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link nav-link_underscore active" id="tab-description-tab" data-bs-toggle="tab"
                            href="#tab-description" role="tab" aria-controls="tab-description"
                            aria-selected="true">Mô tả</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link nav-link_underscore" id="tab-reviews-tab" data-bs-toggle="tab"
                            href="#tab-reviews" role="tab" aria-controls="tab-reviews" aria-selected="false">
                            Reviews ({{ $commentCount }})
                        </a>
                    </li>
                    
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-description" role="tabpanel"
                        aria-labelledby="tab-description-tab">
                        <div class="product-single__description" style="font-size: 16px;">
                            {!! $product->description !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-reviews" role="tabpanel" aria-labelledby="tab-reviews-tab">
                        <h2 class="product-single__reviews-title">ĐÁNH GIÁ SẢN PHẨM</h2>
                        <div class="product-single__comments-list">
                            @forelse($comments as $index => $comment)
                                <div class="product-single__comments-item" style="{{ $index >= 5 ? 'display: none;' : '' }}">
                                    <div class="customer-avatar">
                                        <img loading="lazy" src="assets/images/avatar.jpg" alt="" />
                                    </div>
                                    <div class="customer-review">
                                        <div class="customer-name">
                                            <h6>{{ $comment->customer->name }}</h6>
                                        </div>
                                        <div class="reviews-group d-flex">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"
                                                    fill="{{ $i <= $comment->rating ? '#FFD700' : '#ccc' }}">
                                                    <use href="#icon_star" />
                                                </svg>
                                            @endfor
                                        </div>
                                        <div class="review-date">{{ $comment->created_at->format('d/m/Y H:i:s') }}</div>
                                        <div class="review-text">
                                            <p>{{ $comment->comment }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>Chưa có đánh giá về sản phẩm. Giúp TuneNest biết về cảm nhận của bạn về sản phẩm</p>
                            @endforelse
                        
                            @if($comments->count() > 5)
                                <button id="load-more-comments" class="btn btn-link">Xem thêm</button>
                            @endif
                        </div>
                        

                        <div class="product-single__review-form">
                            @if (Auth::guard('customer')->check() && $product_order_customer)
                                <form id="comment-form" method="POST" action="{{ route('product.comment', ['proId' => $product->id]) }}">
                                    @csrf
                                    @if ($comments->isEmpty())
                                        <h5>Hãy trở thành người đầu tiên bình luận về sản phẩm này “{{ $product->name }}”</h5>
                                    @endif
                                
                                    <div class="select-star-rating">
                                        <label>Đánh giá *</label>
                                        <span class="star-rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc" viewBox="0 0 12 12"
                                                    data-rating="{{ $i }}"
                                                    onclick="document.getElementById('form-input-rating').value = {{ $i }};">
                                                    <path
                                                        d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                                                </svg>
                                            @endfor
                                        </span>
                                        <input type="hidden" id="form-input-rating" name="rating" value="5" />
                                        <!-- Giá trị mặc định là 1 -->
                                    </div>
                                    <div class="mb-4">
                                        <textarea id="form-input-review" class="form-control form-control_gray" placeholder="Bình luận về sản phẩm ..."
                                            cols="30" rows="8" name="comment"></textarea>
                                        @error('comment')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <div class="form-action">
                                        <button type="submit" class="btn btn-primary">Bình Luận</button>
                                    </div>
                                </form>
                            
                            @else
                                {{-- <div class="alert alert-danger">
                                    @if (!$product_order_customer)
                                        <strong>Bạn cần mua sản phẩm mới có thể đánh giá</strong>
                                    @else
                                        <strong>Bạn cần <a class="btn_redirect" href="{{ route('customer.login') }}" data-route='product.detail' data-slug='{{ $product->slug }}'>đăng nhập</a> để bình luận</strong>
                                    @endif
                                </div> --}}
                            @endif
                        </div>
                        

                    </div>
                </div>
            </div>
        </section>
        <section class="products-carousel container">
            <h2 class="h3 text-uppercase mb-4 pb-xl-2 mb-xl-4"> <strong>Các sản phẩm </strong> liên quan</h2>

            <div id="related_products" class="position-relative">
                <div class="swiper-container js-swiper-slider"
                    data-settings='{
            "autoplay": false,
            "slidesPerView": 4,
            "slidesPerGroup": 4,
            "effect": "none",
            "loop": true,
            "pagination": {
              "el": "#related_products .products-pagination",
              "type": "bullets",
              "clickable": true
            },
            "navigation": {
              "nextEl": "#related_products .products-carousel__next",
              "prevEl": "#related_products .products-carousel__prev"
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 2,
                "slidesPerGroup": 2,
                "spaceBetween": 14
              },
              "768": {
                "slidesPerView": 3,
                "slidesPerGroup": 3,
                "spaceBetween": 24
              },
              "992": {
                "slidesPerView": 4,
                "slidesPerGroup": 4,
                "spaceBetween": 30
              }
            }
          }'>
                    <div class="swiper-wrapper">
                        @foreach ($product_related as $product)
                            <div class="swiper-slide product-card-wrapper">
                                <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                                    <div class="pc__img-wrapper">
                                        <div class="swiper-container background-img js-swiper-slider"
                                            data-settings='{"resizeObserver": true}'>
                                            <div class="">
                                                <a href="details.html"><img loading="lazy"
                                                        src="{{ asset('uploads/products/product/' . $product->image) }}"
                                                        width="330" height="400" alt="Cropped Faux leather Jacket"
                                                        class="pc__img"></a>
                                            </div>
                                            <div class="swiper-wrapper">
                                                <div class="swiper">
                                                    <a href="{{ route('product.detail', $product->slug) }}"><img
                                                            loading="lazy"
                                                            src="{{ asset('uploads/products/product/' . $product->image) }}"
                                                            width="330" height="400" alt="{{ $product->name }}"
                                                            class="pc__img"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium add-to-cart"
                                            data-aside="cartDrawer" data-url="{{ route('cart.add', $product->id) }}"
                                            title="Add To Cart">Thêm vào giỏ hàng</a>
                                    </div>

                                    <div class="pc__info position-relative">
                                        <h6 class="pc__title"><a
                                                href="{{ route('product.detail', $product->slug) }}">{{ $product->name }}</a>
                                        </h6>
                                        <div class="product-card__price d-flex justify-content-between">

                                            @if ($product->price_sale > 0)
                                                <span class="money price me-2">
                                                    {{ number_format($product->price_sale) }} VNĐ
                                                </span>
                                                <span class="money price text-secondary"><del>{{ number_format($product->price) }}
                                                        VNĐ</del>
                                                @else
                                                    {{ number_format($product->price) }} VNĐ
                                                 @endif
                                            </span>
                                            @if (array_key_exists($product->id, $product_favourite)) <!-- Sản phẩm đã yêu thích -->
                                                <form action="{{ route('wishlist.remove', $product_favourite[$product->id]) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="menu-link menu-link_us-s add-to-wishlist">
                                                        <i class="fa-solid fa-heart"></i> <!-- Trái tim tô đen -->
                                                    </button>
                                                </form>
                                            @else <!-- Sản phẩm chưa yêu thích -->
                                                <form action="{{ route('wishlist.add', $product->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="menu-link menu-link_us-s add-to-wishlist">
                                                        <i class="fa-regular fa-heart"></i> <!-- Trái tim rỗng -->
                                                    </button>
                                                </form>
                                        @endif 
                                        </div>
                                          
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div><!-- /.swiper-wrapper -->
                </div><!-- /.swiper-container js-swiper-slider -->

                <div
                    class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
                    <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_prev_md" />
                    </svg>
                </div><!-- /.products-carousel__prev -->
                <div
                    class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
                    <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_next_md" />
                    </svg>
                </div><!-- /.products-carousel__next -->

                <div class="products-pagination mt-4 mb-5 d-flex align-items-center justify-content-center"></div>
                <!-- /.products-pagination -->
            </div><!-- /.position-relative -->

        </section><!-- /.products-carousel container -->
    </main>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function () {
    let currentIndex = 5; // Hiện tại đã hiển thị 5 bình luận
    const comments = document.querySelectorAll('.product-single__comments-item');
    const loadMoreButton = document.getElementById('load-more-comments');

    if (loadMoreButton) {
        loadMoreButton.addEventListener('click', function () {
            // Hiển thị thêm 5 bình luận
            for (let i = currentIndex; i < currentIndex + 5 && i < comments.length; i++) {
                comments[i].style.display = 'block';
            }
            currentIndex += 5;

            // Nếu đã hiển thị hết bình luận, ẩn nút "Xem thêm"
            if (currentIndex >= comments.length) {
                loadMoreButton.style.display = 'none';
            }
        });
    }
});



</script>