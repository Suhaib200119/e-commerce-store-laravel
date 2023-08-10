@extends("layouts.master-website")
@section("css")
<link href="{{asset("website-styles/css/detail-page.css")}}" rel="stylesheet">
@endsection

@section("page-content")
<div class="main_title center">
    <span><em></em></span>
    <h2>Product Details</h2>
    <p>In This Section Details {{$product->name}} </p>
</div>
<div class="hero_in detail_page background-image" data-background="url({{asset("storage/$product->image")}})">
    <div class="wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
        <div class="container">
            <div class="main_info">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <div class="head"><div class="score"><span>@if ($product->avgRating()>=60)
                            Superb
                            @else
                            Quite good
                        @endif <em>350 Reviews</em></span><strong>{{$product->avgRating()}}</strong></div></div>
                        <h1>{{$product->name}}</h1>
                        {{$product->description}}
                    </div>
                    <div class="col-xl-8 col-lg-7 col-md-6 position-relative">
                        <div class="buttons clearfix">
                            {{-- <span class="magnific-gallery">
                                <a href="img/detail_1.jpg" class="btn_hero" title="Photo title" data-effect="mfp-zoom-in"><i class="icon_image"></i>View photos</a>
                                <a href="img/detail_2.jpg" title="Photo title" data-effect="mfp-zoom-in"></a>
                                <a href="img/detail_3.jpg" title="Photo title" data-effect="mfp-zoom-in"></a>
                            </span> --}}
                            <a title="rate value {10}" href="#0" class="btn_hero wishlist"><i class="icon_star"></i>rating</a>
                            <a title="comments" href="#reviews" class="btn_hero wishlist"><i class="icon_comment"></i>comments</a>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /main_info -->
        </div>
    </div>
</div>
<!--/hero_in-->
<div class="container margin_30_20">
    <div class="row">
        <div class="col-lg-12 list_menu">
            <section id="section-5">
                <h4>Reviews</h4>
                <form action="{{ route("comments.store") }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Comment</label>
                            <input type="text" class="form-control" style="height: 150px" name="comment" value="{{old("comment")}}">
                            <x-error-hint name="comment"/>
                        </div>
                    </div>
                    <button class="btn_1 gradient">publish</button>
                </form>
                <br>
                 <div id="reviews">
                    @foreach ($product->comments as $comment)
                    <div class="review_card">
                        <div class="row">
                            <div class="col-md-2 user_info">
                                <figure><img src="{{asset("storage/".$comment->user->user_image)}}" alt=""></figure>
                                <h5>{{$comment->user->name}}</h5>
                            </div>
                            <div class="col-md-10 review_content">
                                <div class="clearfix add_bottom_15">
                                    <em>{{$comment->created_at->diffForHumans()}}</em>
                                </div>
                                <p>Comment Details</p>
                                <h4>{{$comment->comment}}</h4>
                            </div>
                        </div>
                        <!-- /row -->
                    </div>
                    @endforeach
                </div>
                <!-- /reviews -->
            </section>
            <!-- /section -->
        </div>
    </div>
</div>
<!-- /container -->
@endsection
@section("js")
    <!-- SPECIFIC SCRIPTS -->
    <script src="{{asset("website-styles/js/sticky_sidebar.min.js")}}"></script>
    <script src="{{asset("website-styles/js/sticky-kit.min.js")}}"></script>
    <script src="{{asset("website-styles/js/specific_detail.js")}}"></script>
@endsection