@extends('layout_okar.okar_layout')
@section('contant')
    <main class="main">

        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Portfolio</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        @foreach ($Category as $item)
                            <li data-filter="._{{ $item->id }}">{{ $item->title }}</li>
                        @endforeach
                    </ul><!-- End Portfolio Filters -->

                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($artwork as $items)
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item _{{ $items->category_id }}">
                                <img src="{{ asset($items->image_path) }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{{ $items->title }}</h4>
                                    <p>{{ $items->artist }}</p>
                                    <p>{{ $items->price }}$</p>
                                    @if ($items->is_sold == 0)
                                        <p class="text-success fw-bold">Available</p>
                                    @else
                                        <p class="text-danger fw-bold" style="text-decoration: line-through;">Sold Out</p>
                                    @endif
                                    <a href="{{ asset($items->image_path) }}" title="App 1"
                                        data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                            class="bi bi-zoom-in"></i></a>
                                    <a href="{{ route('imgdetails',$items->id) }}" title="More Details" class="details-link"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div><!-- End Portfolio Item -->
                        @endforeach
                    </div><!-- End Portfolio Container -->

                </div>

            </div>

        </section><!-- /Portfolio Section -->

    </main>
@endsection
