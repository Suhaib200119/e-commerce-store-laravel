@extends("layouts.master-website")
@section("page-content")
        <!-- /container -->
        <div class="bg_gray">
            <div class="container margin_60">
                <div class="main_title">
                    <span><em></em></span>
                    <h2>All Products</h2>
                    <p>In This Section All Products</p>
                </div>
                <div class="owl-carousel owl-theme carousel_4">
                    @foreach ($products as $product)
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