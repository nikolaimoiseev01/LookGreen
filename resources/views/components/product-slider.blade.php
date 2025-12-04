<div class="productsSlider swiper !flex flex-col gap-4">
    <style>
        .swiper-button-disabled {
            opacity: 0.7;
        }
    </style>
    <x-heroicon-c-chevron-left id="SliderPrev" class="w-24 h-auto absolute top-1/2 left-[10%] fill-white z-[99] transition hover:scale-110 cursor-pointer lg:hidden"/>
    <x-heroicon-c-chevron-right id="SliderNext" class="w-24 h-auto absolute top-1/2 right-[10%] fill-white z-[99] transition hover:scale-110 cursor-pointer lg:hidden"/>
    <div class="swiper-wrapper">
        @foreach($products as $product)
            <div class="swiper-slide h-[90vh] overflow-hidden"
                 style="background: linear-gradient(0deg,{{$product['gradient_from']}}, {{$product['gradient_to']}});"
            >
                <div
                    class="flex flex-col h-full text-center py-8 relative max-w-[1440px] w-full mx-auto content">

                    <h2 class="font-bold text-6xl mb-8 md:text-5xl uppercase">
                        {{ $product['name'] }}
                    </h2>

                    <p class="text-3xl md:text-xl font-medium max-w-4xl mx-auto mb-12">
                        {{ $product['description'] }}
                    </p>

                    <!-- Картинка + props -->
                    <div class="flex md:flex-col gap-16 justify-center items-center flex-1 min-h-0 pl-20">

                        <div style="background-color: {{$product['props_color']}}" class="flex flex-col md:flex-row rounded-full p-2 gap-8 min-w-fit">
                            @foreach($product->getMedia('props') as $prop)
                                <img src="{{ $prop->getUrl() }}" class="md:max-w-20" alt="">
                            @endforeach
                        </div>

                        <img
                            src="{{ $product->getFirstMediaUrl('cover') }}"
                            class="max-h-[60vh] md:w-3/5 w-auto object-contain md:hidden"
                            alt=""
                        >
                        <img
                            src="{{ $product->getFirstMediaUrl('cover_mobile') }}"
                            class="w-full object-contain hidden md:block"
                            alt=""
                        >
                    </div>

                    <img
                        src="{{ $product->getFirstMediaUrl('emoji') }}"
                        class="absolute bottom-16 right-16 md:hidden"
                        alt=""
                    >
                </div>
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>

<style>
    .swiper-pagination-bullet {
        width: 16px;
        height: 16px;
        background-color: #b1b1b1 !important;
        &.swiper-pagination-bullet-active {
            background-color: #B0B0B0 !important;
        }
    }

    .swiper-pagination {
        position: relative;
        top: 0 !important;
        padding-bottom: 8px;
    }
</style>
@push('scripts')
    <script type="module">
        console.log(123)
        var swiper = new Swiper(".productsSlider", {
            slidesPerView: 'auto',
            spaceBetween: 30,
            autoHeight: true,
            navigation: {
                nextEl: "#SliderNext",
                prevEl: "#SliderPrev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            clickable: true,
            allowTouchMove: true,
        });
    </script>
@endpush
