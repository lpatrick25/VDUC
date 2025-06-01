@extends('landing.master')

@section('content')
    <!-- HERO SECTION  -->
    <div class="site-hero_2">
        <div class="page-title">
            <div class="big-title montserrat-text uppercase">Rent</div>
            <div class="small-title montserrat-text uppercase">home / operation/ rent</div>
        </div>
    </div>

    <!-- PORTFOLIO -->
    <section class="portfolio">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <span>rent an equipment</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>


            <!-- categories  -->
            <div class="col-md-3">
                <div class="row categories-grid wow fadeInLeft">
                    <span class="montserrat-text uppercase">choose category</span>

                    <nav class="categories">
                        <ul class="portfolio_filter">
                            <li><a href="" class="active" data-filter="*">all</a></li>
                            <li><a href="" data-filter=".personal">Personal Diving Gear</a></li>
                            <li><a href="" data-filter=".breathing">Breathing Apparatus</a></li>
                            <li><a href="" data-filter=".dive">Dive Instruments</a></li>
                            <li><a href="" data-filter=".communication">Communication & Safety Tools</a></li>
                            <li><a href="" data-filter=".special">Specialized Survey Equipment</a></li>
                        </ul>
                    </nav>
                </div>

                <div style="text-align: left;">
                <a href="/sign-in" class="btn"
                    style="margin-top:30px; width:200px; background-color:#64c9d8; color:#ffffff; border-radius:5px;">
                    <span>rent now</span>
                </a>
            </div>

            </div>



            <!-- all works -->
            <div class="col-md-9">
                <div class="row portfolio_container">

                    <div class="col-md-4 personal">
                        <a href="sign-in" class="portfolio_item work-grid wow fadeInUp">
                            <img src="images/scuba diving mask.jpg" alt="image">
                            <div class="portfolio_item_hover">
                                <div class="item_info">
                                    <span>scuba diving mask</span>
                                    <em> Personal Diving Gear</em>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 fashion breathing">
                        <a href="sign-in" class="portfolio_item work-grid wow fadeInUp" data-wow-delay=".2s">
                            <img src="images/scuba tank.jpg" alt="image">
                            <div class="portfolio_item_hover">
                                <div class="item_info">
                                    <span>Scuba Tank</span>
                                    <em>Breathing Apparatus</em>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 fashion dive">
                        <a href="sign-in" class="portfolio_item work-grid wow fadeInUp" data-wow-delay=".2s">
                            <img src="images/watch.jpg" alt="image">
                            <div class="portfolio_item_hover">
                                <div class="item_info">
                                    <span>Dive Computer</span>
                                    <em>Dive Instruments</em>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 fashion communication">
                        <a href="sign-in" class="portfolio_item work-grid wow fadeInUp" data-wow-delay=".2s">
                            <img src="images/smb.jpg" alt="image">
                            <div class="portfolio_item_hover">
                                <div class="item_info">
                                    <span>Surface Marker Buoy (SMB)</span>
                                    <em>Communication & Safety Tools</em>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 fashion special">
                        <a href="sign-in" class="portfolio_item work-grid wow fadeInUp" data-wow-delay=".2s">
                            <img src="images/camera.jpg" alt="image">
                            <div class="portfolio_item_hover">
                                <div class="item_info">
                                    <span>Underwater Camera </span>
                                    <em>Specialized Survey Equipment</em>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 personal">
                        <a href="sign-in" class="portfolio_item work-grid wow fadeInUp">
                            <img src="images/scuba fins.jpg" alt="image">
                            <div class="portfolio_item_hover">
                                <div class="item_info">
                                    <span>scuba fins</span>
                                    <em> Personal Diving Gear</em>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 fashion breathing">
                        <a href="sign-in" class="portfolio_item work-grid wow fadeInUp" data-wow-delay=".2s">
                            <img src="images/regulator.jpg" alt="image">
                            <div class="portfolio_item_hover">
                                <div class="item_info">
                                    <span>Regulator</span>
                                    <em>Breathing Apparatus</em>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 fashion dive">
                        <a href="sign-in" class="portfolio_item work-grid wow fadeInUp" data-wow-delay=".2s">
                            <img src="images/pressure.jpg" alt="image">
                            <div class="portfolio_item_hover">
                                <div class="item_info">
                                    <span>Pressure Gauge (SPG)</span>
                                    <em>Dive Instruments</em>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 fashion communication">
                        <a href="sign-in" class="portfolio_item work-grid wow fadeInUp" data-wow-delay=".2s">
                            <img src="images/torch.jpg" alt="image">
                            <div class="portfolio_item_hover">
                                <div class="item_info">
                                    <span>Underwater Light</span>
                                    <em>Communication & Safety Tools</em>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 fashion special">
                        <a href="sign-in" class="portfolio_item work-grid wow fadeInUp" data-wow-delay=".2s">
                            <img src="images/slate.jpg" alt="image">
                            <div class="portfolio_item_hover">
                                <div class="item_info">
                                    <span>Underwater Slate</span>
                                    <em>Specialized Survey Equipment</em>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 personal">
                        <a href="sign-in" class="portfolio_item work-grid wow fadeInUp">
                            <img src="images/scuba snorkel set.jpg" alt="image">
                            <div class="portfolio_item_hover">
                                <div class="item_info">
                                    <span>scuba snorkel set</span>
                                    <em> Personal Diving Gear</em>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 fashion breathing">
                        <a href="sign-in" class="portfolio_item work-grid wow fadeInUp" data-wow-delay=".2s">
                            <img src="images/bcd.jpg" alt="image">
                            <div class="portfolio_item_hover">
                                <div class="item_info">
                                    <span>BCD (Buoyancy Control Device) </span>
                                    <em>Breathing Apparatus</em>
                                </div>
                            </div>
                        </a>
                    </div>

                      <div class="col-md-4 fashion dive">
                        <a href="sign-in" class="portfolio_item work-grid wow fadeInUp" data-wow-delay=".2s">
                            <img src="images/compass.jpg" alt="image">
                            <div class="portfolio_item_hover">
                                <div class="item_info">
                                    <span>Compass</span>
                                    <em>Dive Instruments</em>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 fashion communication">
                        <a href="sign-in" class="portfolio_item work-grid wow fadeInUp" data-wow-delay=".2s">
                            <img src="images/knife.jpg" alt="image">
                            <div class="portfolio_item_hover">
                                <div class="item_info">
                                    <span>Dive Knife</span>
                                    <em>Communication & Safety Tools</em>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 fashion special">
                        <a href="sign-in" class="portfolio_item work-grid wow fadeInUp" data-wow-delay=".2s">
                            <img src="images/sonar.jpg" alt="image">
                            <div class="portfolio_item_hover">
                                <div class="item_info">
                                    <span>Sonar Imaging Device</span>
                                    <em>Specialized Survey Equipment</em>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 personal">
                        <a href="sign-in" class="portfolio_item work-grid wow fadeInUp">
                            <img src="images/scuba wetsuit.jpg" alt="image">
                            <div class="portfolio_item_hover">
                                <div class="item_info">
                                    <span>scuba wetsuit</span>
                                    <em> Personal Diving Gear</em>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 fashion breathing">
                        <a href="sign-in" class="portfolio_item work-grid wow fadeInUp" data-wow-delay=".2s">
                            <img src="images/belt.jpg" alt="image">
                            <div class="portfolio_item_hover">
                                <div class="item_info">
                                    <span>weight belt</span>
                                    <em>Breathing Apparatus</em>
                                </div>
                            </div>
                        </a>
                    </div>

                     <div class="col-md-4 personal">
                        <a href="sign-in" class="portfolio_item work-grid wow fadeInUp">
                            <img src="images/neoprene dive gloves and boots.jpg" alt="image">
                            <div class="portfolio_item_hover">
                                <div class="item_info">
                                    <span>boots and gloves</span>
                                    <em> Personal Diving Gear</em>
                                </div>
                            </div>
                        </a>
                    </div>



                    <!-- end single work -->
                </div>
                <!-- end row -->
            </div>
            <!-- all works end -->
        </div>
        <!-- end container -->
    </section>
    <!-- portfolio -->



    <div class="container" style="width: 80%;">
        <div
            style="display: flex; justify-content: space-between; align-items: center; padding: 0 10px; margin-top: 50px;">

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
