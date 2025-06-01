@extends('landing.master')
@section('content')
    <!-- HERO SECTION  -->
    <div class="site-hero_2">
        <div class="page-title">
            <div class="big-title montserrat-text uppercase">Lesson</div>
            <div class="small-title montserrat-text uppercase">home / operation / lesson</div>
        </div>
    </div>

    {{-- 5 level lesson

    openwater diver
    advanced openwater diver
    rescue diver
    divemaster
    instructor --}}
    <section>
        <div class="container">
            <div class="section-title">
                <span>diving lesson</span>
                <p>
                    Explore our comprehensive diving lessons designed for all levels, from beginners to advanced divers,
                    ensuring safety, skill development, and underwater exploration.
                </p>
            </div>

            <!-- Lesson Image -->
            <div class="small-title montserrat-text uppercase"
                style="margin-top:30px; background-color:#64c9d8; color:#ffffff; border-radius:5px; text-align: center; font-weight: 700; padding: 12px 20px; font-size: 18px;">
                one of our journey
            </div>

            <div class="col-md-12 text-center" style="margin: 40px;">
                <img src="{{ asset('images/diving-1.jpg') }}" alt="Lesson Image" class="img-responsive"
                    style="width: 80%; height: 70%; border-radius: 5px; display: inline-block; object-fit: cover;">
            </div>

            <div class="container">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-xs-12 col-sm-6 col-md-4 text-center" style="margin-bottom: 30px;">
                        <img src="{{ asset('images/diving-2.jpg') }}" alt="Image 1"
                            style="width: 100%; height: 250px; border-radius: 5px; object-fit: cover;">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 text-center" style="margin-bottom: 30px;">
                        <img src="{{ asset('images/diving-3.jpg') }}" alt="Image 2"
                            style="width: 100%; height: 250px; border-radius: 5px; object-fit: cover;">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 text-center" style="margin-bottom: 30px;">
                        <img src="{{ asset('images/diving-1.jpg') }}" alt="Image 3"
                            style="width: 100%; height: 250px; border-radius: 5px; object-fit: cover;">
                    </div>
                </div>
            </div>
            <!-- Lesson Description -->
            <div class="row">
                <div class="col-md-12 wow fadeInUp">
                    <p style="text-indent: 30px;">
                        Our diving lessons are designed to cater to all skill levels, from beginners to advanced divers.
                        Each course is structured to provide comprehensive training, ensuring participants gain the
                        necessary
                        skills and knowledge for safe and enjoyable diving experiences. Our certified instructors guide
                        students
                        through practical exercises and theoretical knowledge, covering essential topics such as dive
                        planning,
                        safety protocols, and underwater navigation.
                    </p>
                </div>
            </div>

             <div style="text-align: right;">
            <a href="/sign-in" class="btn"
                style="margin-top:30px; width:200px; background-color:#64c9d8; color:#ffffff; border-radius:5px;">
                <span>Enroll Now</span>
            </a>
        </div>

        </div>

    </section>

    <div class="container" style="width: 80%;">
        <div style="display: flex; justify-content: space-between; align-items: center; padding: 0 10px; margin-top: 50px;">

            <!-- Left Arrow Button -->
            <a href="{{ url('/operation_survey') }}" title="Previous"
                style="display: inline-flex; align-items: center; justify-content: center;
                    width: 50px; height: 50px; border-radius: 50%;
                    background-color: #64c9d8; color: white; text-decoration: none;
                    font-size: 24px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                <i class="icon ion-arrow-left-c"></i>
            </a>

            <!-- Right Arrow Button -->
            <a href="{{ url('/operation_lesson') }}" title="Next"
                style="display: inline-flex; align-items: center; justify-content: center;
                    width: 50px; height: 50px; border-radius: 50%;
                    background-color: #64c9d8; color: white; text-decoration: none;
                    font-size: 24px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                <i class="icon ion-arrow-right-c"></i>
            </a>

        </div>
    </div>
@endsection
