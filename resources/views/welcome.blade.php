@extends('layouts.front.app')

@section('head')
    @parent
    <style>
        .mini-image img {
            width: 100%;
            height: auto;
        }

        .mini-image .overl {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(0, 0, 0, 0.4);
        }

        .mini-image .overl:hover {
            background: none;
        }
    </style>
@endsection

@section('content')
    <div class="flexslider-hero-slider">
        <div id="mainFlexSlider">
            <div class="flexslider">
                <carousel indicators="false" class="slides">
                    <slider>
                        <img src="{{asset('images/banner/home/carousel-1.jpg')}}" class="slider__image">
                    </slider>
                    <slider>
                        <img src="{{asset('images/banner/home/carousel-2.jpg')}}" class="slider__image">
                    </slider>
                    <slider>
                        <img src="{{asset('images/banner/home/carousel-3.jpg')}}" class="slider__image">
                    </slider>
                    <slider>
                        <img src="{{asset('images/banner/home/carousel-4.jpg')}}" class="slider__image">
                    </slider>
                    <slider>
                        <img src="{{asset('images/banner/home/carousel-5.jpg')}}" class="slider__image">
                    </slider>
                    <slider>
                        <img src="{{asset('images/banner/home/carousel-6.jpg')}}" class="slider__image">
                    </slider>
                </carousel><!-- slides end -->
            </div><!-- flexslider end -->
        </div>
    </div>

    <div class="post-hero bg-light">
        <div class="container" style="padding: 0 60px;">
            <div class="row">
                <div class="col-sm-4">
                    <div class="featured-count clearfix mini-image">
                        <a href="/help#pendaftaran_tutor">
                            <div class="col-md-12" style="padding: 0;">
                                <img src="{{asset('images/banner/mini-1.jpg')}}"
                                     alt="Pendaftaram Tutor">
                                <div class="overl"></div>
                            </div>
                        </a>

                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="featured-count clearfix mini-image">
                        <a href="/help#cara">
                            <div class="col-md-12" style="padding: 0;">
                                <img src="{{asset('images/banner/mini-2.jpg')}}"
                                     alt="Kelas Private">
                                <div class="overl"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="featured-count clearfix mini-image">
                        <a href="https://twitter.com/">
                            <div class="col-md-12" style="padding: 0;">
                                <img src="{{asset('images/banner/mini-3.jpg')}}"
                                     alt="Follow twitter!">
                                <div class="overl"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container">
            <div class="jumbotron">
                <h1>{{APP_MOTTO}}</h1>
                <p>This is a template showcasing the optional theme stylesheet included in Bootstrap. Use it as a starting point
                    to create something more unique by building on or modifying it.</p>

                <a class="btn btn-primary" href="#"> Do Something</a>
            </div>
        </div>
    </section>
@endsection

@section('script')
    @parent

    <script>
        const vue = new Vue({
            el: 'body',
            mixins: [store],
            components: {
                'carousel': VueStrap.carousel,
                'slider': VueStrap.slider
            }
        });
    </script>
@endsection