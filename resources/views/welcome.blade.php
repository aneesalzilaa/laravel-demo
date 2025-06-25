@extends('layout_okar.okar_layout')

@section('contant')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <img src="{{ asset('/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">
            <div class="container text-center" data-aos="zoom-out" data-aos-delay="100">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2>Kelly Adams</h2>
                        <p>I'm a professional illustrator from San Francisco</p>
                        <a href="about.html" class="btn-get-started">About Me</a>
                    </div>
                </div>
            </div>
        </section><!-- /Hero Section -->

    </main>
    <main class="main">

        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Art panels</h2>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($artwork as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <img src="{{ asset($item->image_path) }}" class="img-fluid fixed-image" alt="">
                            <div class="portfolio-info">
                                <h4>{{ $item->title }}</h4>
                                <p>{{ $item->artist }}</p>
                                <p>{{ $item->price }}$</p>
                                <a href="{{ asset($item->image_path) }}" title="{{ $item->title }}"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                                    <i class="bi bi-zoom-in"></i>
                                </a>
                                <a href="{{ route('imgdetails',$item->id) }}" title="More Details"
                                    class="btn btn-outline-success">more</a>
                            </div>
                        </div><!-- End Portfolio Item -->
                    @endforeach
                </div><!-- End row -->
            </div>

        </section><!-- /Portfolio Section -->

    </main>

    <style>
        .fixed-image {
            width: 100%;
            height: 300px; /* توحيد ارتفاع الصور */
            object-fit: cover; /* لضبط الصور بدون تشويه */
            border-radius: 10px;
        }
    </style>
@endsection
