@extends('layout_okar.okar_layout')

@section('contant')
    <main class="main">

        <!-- Portfolio Details Section -->
        <section id="portfolio-details" class="portfolio-details section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Portfolio Details</h2>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <!-- عرض صورة العمل الفني -->
                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper init-swiper">
                            <script type="application/json" class="swiper-config">
                            {
                              "loop": true,
                              "speed": 600,
                              "autoplay": {
                                "delay": 5000
                              },
                              "slidesPerView": "auto",
                              "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                              }
                            }
                            </script>

                            <div class="swiper-wrapper align-items-center">
                                <div class="swiper-slide">
                                    <img src="{{ asset($artwork->image_path) }}" class="img-fluid" alt="{{ $artwork->title }}">
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <!-- تفاصيل العمل الفني -->
                    <div class="col-lg-4">
                        <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
                            <h3>Artwork Information</h3>
                            <ul>
                                <li><strong>Category</strong>: {{ $artwork->category->title }}</li>
                                <li><strong>Title</strong>: {{ $artwork->title }}</li>
                                <li><strong>Artist</strong>: {{ $artwork->artist }}</li>
                                <li><strong>Date</strong>: {{ $artwork->created_at->format('Y-m-d') }}</li>
                                <li><strong>Price</strong>: {{ $artwork->price }}$</li>
                                <li>
                                    <strong>Phone Number</strong>:
                                    <a href="https://wa.me/{{ str_replace('+', '', $artwork->contact_number) }}"
                                       target="_blank"
                                       class="btn btn-success">
                                        <i class="bi bi-whatsapp"></i> WhatsApp
                                    </a>
                                </li>
                                <li>
                                    <strong>Email</strong>:
                                    <a href="mailto:{{ $artwork->email }}" class="btn btn-primary">
                                        <i class="bi bi-envelope"></i> Send Email
                                    </a>
                                </li>
                                @if ($artwork->is_sold == 0)
                                    <p class="text-success fw-bold">Available</p>
                                @else
                                    <p class="text-danger fw-bold" style="text-decoration: line-through;">Sold Out</p>
                                @endif
                            </ul>
                        </div>

                        <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
                            <h2>About This Artwork</h2>
                            <p>{{ $artwork->description }}</p>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Portfolio Details Section -->

    </main>
@endsection
