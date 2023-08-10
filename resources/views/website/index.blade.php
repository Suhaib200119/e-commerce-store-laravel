@extends("layouts.master-website")
@section("page-content")
    <div class="container margin_30_60">
            <div class="main_title center">
                <span><em></em></span>
                <h2>Popular Stores</h2>
                <p>In This Section Most Popular Stores</p>
            </div>
            <!-- /main_title -->
            <div class="owl-carousel owl-theme categories_carousel">
                @foreach ($stores as $store)
                    <div class="item_version_2">
                        <a href="grid-listing-filterscol.html">
                            <figure>
                                <span>{{ $store->created_at->format('Y') }}</span>
                                <img style="width: 250px;height: 200px;" src="{{ asset("storage/$store->logo") }}">
                                <div class="info">
                                    <h3>{{ $store->name }}</h3>
                                    <small>{{ $store->address }}</small>
                                </div>
                            </figure>
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- /carousel -->
        </div>
        <!-- /container -->
        <div class="bg_gray">
            <div class="container margin_60">
                <div class="main_title">
                    <span><em></em></span>
                    <h2>Top Rated Products</h2>
                    <p>In This Section Top Rated Products</p>
                    <a href="{{ route("website.allProducts") }}">View All</a>
                </div>
                <div class="owl-carousel owl-theme carousel_4">
                    @foreach ($productsTopRated as $product)
                        <div class="item">
                            <div class="strip">
                                <figure>
                                    <span class="ribbon off">{{ $product->discount }}%</span>
                                    <img src="{{ asset("storage/$product->image") }}">
                                    <a href="{{ route('website.show', $product->id) }}" class="strip_info">
                                        <small>{{ $product->name }}</small>
                                        <div class="item_title">
                                            <h3
                                                style="@if ($product->discount_flag == 'D') text-decoration: line-through; @endif">
                                                {{ $product->basePrice }}$</h3>
                                            <small
                                                style="font-size: 16px">{{ $product->basePrice - ($product->discount / 100) * 350 }}
                                                After discount</small>
                                        </div>
                                    </a>
                                </figure>
                                <ul>
                                    <li><span>Category: {{ $product->category->name }}</span> , <span>Store:
                                            {{ $product->category->store->name }}</span>
                                    </li>
                                    @if ($product->avgRating())
                                        <li>
                                            <div class="score"><strong>{{ round($product->avgRating()) }}%</strong>
                                            </div>
                                        </li>
                                    @else
                                        <li>
                                            <div class="score"><strong>0%</strong></div>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    @endforeach


                </div>
                <!-- /carousel -->
            </div>
        </div>
        <!-- /bg_gray -->
@endsection