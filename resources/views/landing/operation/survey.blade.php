@extends('landing.master')

@section('content')
    <!-- HERO SECTION  -->
    <div class="site-hero_2">
        <div class="page-title">
            <div class="big-title montserrat-text uppercase">underwater survey</div>
            <div class="small-title montserrat-text uppercase">home / operation / survey</div>
        </div>
    </div>


    <section>
        <div class="container">
            <div class="section-title">
                <span>survey project</span>
                <p>
                    Explore our latest underwater survey operation showcasing advanced diving, imaging, and inspection
                    techniques for marine asset monitoring.
                </p>
            </div>

            <!-- Survey Image -->

            <div class="small-title montserrat-text uppercase"
                style="margin-top:30px; background-color:#64c9d8; color:#ffffff; border-radius:5px; text-align: center; font-weight: 700; padding: 12px 20px; font-size: 18px;">
                one of our journey
            </div>


            <div class="col-md-12 text-center" style="margin: 40px;">
                <img src="{{ asset('images/pier3.jpg') }}" alt="Survey Image 1" class="img-responsive"
                    style="width: 80%; height: 70%; border-radius: 5px; display: inline-block; object-fit: cover;">
            </div>

            <div class="container">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-xs-12 col-sm-6 col-md-4 text-center" style="margin-bottom: 30px;">
                        <img src="{{ asset('images/pier4.jpg') }}" alt="Image 1"
                            style="width: 100%; height: 250px; border-radius: 5px; object-fit: cover;">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 text-center" style="margin-bottom: 30px;">
                        <img src="{{ asset('images/pier.jpg') }}" alt="Image 2"
                            style="width: 100%; height: 250px; border-radius: 5px; object-fit: cover;">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 text-center" style="margin-bottom: 30px;">
                        <img src="{{ asset('images/pier2.jpg') }}" alt="Image 3"
                            style="width: 100%; height: 250px; border-radius: 5px; object-fit: cover;">
                    </div>
                </div>
            </div>


            <!-- Survey Description -->
            <div class="row">
                <div class="col-md-12 wow fadeInUp">
                    <p style="text-indent: 30px;">
                        LOn March 9, 2017, an underwater survey was conducted in Lipata,
                        Surigao to assess the condition of the port’s submerged structures.
                        The inspection focused on critical areas such as pier foundations,
                        support piles, and the surrounding seabed. Using modern diving equipment and
                        underwater imaging technology, the team documented the structural integrity and
                        identified any potential issues such as corrosion, marine growth, or damage caused by
                        constant exposure to tidal forces.
                    </p>
                    <p style="text-indent: 30px;">
                        The results of the survey offered valuable insights for maintenance planning and
                        infrastructure improvement. By addressing potential risks early, the survey helped
                        ensure the long-term safety and reliability of Lipata Port operations. As one of
                        the key maritime gateways in Surigao, regular underwater assessments like this contribute
                        significantly to safe navigation,
                        efficient logistics, and the continued support of regional economic activities.
                    </p>
                </div>
            </div>


            <div style="text-align: right;">
                <a href="/sign-in" class="btn"
                    style="margin-top:30px; width:200px; background-color:#64c9d8; color:#ffffff; border-radius:5px;">
                    <span>Request a Survey</span>
                </a>
            </div>

        </div>

        </div>
        </div>
    </section>



    <div class="container" style="width: 80%;">
        <div style="display: flex; justify-content: space-between; align-items: center; padding: 0 10px; margin-top: 50px;">

            <!-- Left Arrow Button -->
            <a href="{{ url('/operation_lesson') }}" title="Previous"
                style="display: inline-flex; align-items: center; justify-content: center;
                    width: 50px; height: 50px; border-radius: 50%;
                    background-color: #64c9d8; color: white; text-decoration: none;
                    font-size: 24px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                <i class="icon ion-arrow-left-c"></i>
            </a>

            <!-- Right Arrow Button -->
            <a href="{{ url('/operation_rental') }}" title="Next"
                style="display: inline-flex; align-items: center; justify-content: center;
                    width: 50px; height: 50px; border-radius: 50%;
                    background-color: #64c9d8; color: white; text-decoration: none;
                    font-size: 24px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                <i class="icon ion-arrow-right-c"></i>
            </a>

        </div>
    </div>
@endsection
