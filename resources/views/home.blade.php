@extends('layouts.app')

@section('content')


        <section>
            <div class="container">    
                <div class="row">

                    <div class="col-md-12 testimonial">
                      <h1>Quotes of Successful Persons </h1>  
                      <div class="col-md-12" data-wow-delay="0.2s">
                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                            <!-- Bottom Carousel Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#quote-carousel" data-slide-to="0" class="active">
                                <img class="img-responsive " src="https://www.gravatar.com/avatar/00000000000000000000000000000000?s=200&r=pg&d=mm" alt="mark Zuckerberg">
                                </li>
                                <li data-target="#quote-carousel" data-slide-to="1"><img class="img-responsive" src="https://www.gravatar.com/avatar/00000000000000000000000000000000?s=200&r=pg&d=mm" alt="john Wooden">
                                </li>
                                <li data-target="#quote-carousel" data-slide-to="2"><img class="img-responsive" src="https://www.gravatar.com/avatar/00000000000000000000000000000000?s=200&r=pg&d=mm" alt="bill Gates">
                                </li>
                            </ol>

                            <!-- Carousel Slides / Quotes -->
                            <div class="carousel-inner text-center">

                                <!-- Quote 1 -->
                                <div class="item active">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2">

                                                <p>I feel that the best companies are started not because the founder wanted a company but because the founder wanted to change the world... If you decide you want to found a company, you maybe start to develop your first idea. And hire lots of workers.</p>
                                                <small>Mark Zuckerberg</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <!-- Quote 2 -->
                                <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2">

                                                <p>"Things work out best for those who make the best of how things work out."</p>
                                                <small>John Wooden</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <!-- Quote 3 -->
                                <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2">

                                                <p>If you have 50 different plug types, appliances wouldn't be available and would be very expensive. But once an electric outlet becomes standardized, many companies can design appliances, and competition ensues, creating variety and better prices for consumers.</p>
                                                <small>Bill Gates</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                            </div>

                            <!-- Carousel Buttons Next/Prev -->
                            <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                            <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                         </div>
                        </div>
                    </div>
                </div>
             </div>   
                

        <div class="container">   
            <div class="row">
                <div id="search-news">

                    <h1>Find What You Want</h1>
                    

                        <div class="col-md-9 results">

                            <div class="col-md-4">
                               <a>
                                <i class="fa fa-industry" aria-hidden="true"></i>
                                Industry Jobs
                               </a>
                            </div>

                            <div class="col-md-4">
                               <a>
                                <i class="fa fa-calculator" aria-hidden="true"></i>
                                Accounting Jobs
                               </a>
                            </div>

                            <div class="col-md-4">
                               <a>
                                <i class="fa fa-balance-scale" aria-hidden="true"></i>
                                Law Jobs
                               </a>
                            </div>

                            <div class="col-md-4">
                               <a>
                                <i class="fa fa-car" aria-hidden="true"></i>
                                Driving Jobs
                               </a>
                            </div>                                                                                    
                            <div class="col-md-4">
                               <a>
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                Marketing
                               </a>
                            </div>

                            <div class="col-md-4">
                               <a>
                                <i class="fa fa-laptop" aria-hidden="true"></i>
                                Software Jobs
                               </a>
                            </div>

                            <div class="col-md-4">
                               <a>
                                <i class="fa fa-mobile" aria-hidden="true"></i>
                                Sales Jobs
                               </a>
                            </div>                                                                                    
                            <div class="col-md-4">
                               <a>
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                Media and Press Jobs
                               </a>
                            </div>

                            <div class="col-md-4">
                               <a>
                                <i class="fa fa-globe" aria-hidden="true"></i>
                                Translators Jobs
                               </a>
                            </div>

                    </div>  


                    <div class="col-md-3 news">
                        
                        <h3>New Jobs</h3>
                        <hr class="hr">

                        <div class="new-job">
                            <h4>Title of job</h4>
                            <p>Description of the job <a href="#">See More</a></p>
                        </div>
                        <div class="new-job">
                            <h4>Title of job</h4>
                            <p>Description of the job <a href="#">See More</a></p>
                        </div>
                        <div class="new-job">
                            <h4>Title of job</h4>
                            <p>Description of the job <a href="#">See More</a></p>
                        </div>

                    </div>

                </div>  
            </div>
        </div>
      
      </section>  

@endsection
