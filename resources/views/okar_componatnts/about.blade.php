@extends('layout_okar.okar_layout')

@section('contant')
    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>About</h2>
            <p>Sharif Arabi</p>
        </div><!-- End Section Title -->
        @foreach ($abouts as $item)
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-4">
                    <img src="{{ asset('uploads/' . $item->img) }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 content">
                    <h2>visual artist.</h2>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>{{ $item->birthday }}</span>
                                </li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>{{ $item->phone }}</span>
                                </li>
                                <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>{{ $item->city }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>{{ $item->age }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>{{ $item->degree }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong>
                                    <span>{{ $item->email }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <p class="py-3">
                        This site is dedicated to publishing and displaying the artwork of the artist Sherif Arabi and to
                        helping him spread his paintings to the largest possible number of people.
                    </p>
                </div>
            </div>
        </div>
        @endforeach


    </section><!-- /About Section -->
@endsection
