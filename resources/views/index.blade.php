@extends('layouts.app')
@section('title')
    YourJob
@endsection

@section('content')
            <div class="container">    
                <div class="row">

                @if(Auth::guest())
                    <div class="col-md-12">
                        
                        <h1 class="text-center">{{trans('messages.Make Future')}}</h1>

                    </div>
                @endif  
                    <div class="col-md-12 testimonial">
                      <h1>{{trans('messages.Quotes')}}</h1>  
                      <div class="col-md-12" data-wow-delay="0.2s">
                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                            <!-- Bottom Carousel Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#quote-carousel" data-slide-to="0" class="active">
                                <img class="img-responsive " src="images/mark.jpg" alt="mark Zuckerberg">
                                </li>
                                <li data-target="#quote-carousel" data-slide-to="1"><img class="img-responsive" src="images/john.jpg" alt="john Wooden">
                                </li>
                                <li data-target="#quote-carousel" data-slide-to="2"><img class="img-responsive" src="images/bill.jpg" alt="bill Gates">
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
                

        <section id="companies-testimonial">
                    
                    <h2 class="text-center">{{trans('messages.Searching')}}</h2>
            <!-- #region Jssor Slider Begin -->
            <!-- Generator: Jssor Slider Maker -->
            <!-- Source: http://www.jssor.com -->
            <!-- This code works without jquery library. -->
            <script src="js/jssor.slider-22.2.16.min.js" type="text/javascript"></script>
            <script type="text/javascript">
                jssor_1_slider_init = function() {

                    var jssor_1_options = {
                      $AutoPlay: true,
                      $Idle: 0,
                      $AutoPlaySteps: 4,
                      $SlideDuration: 2500,
                      $SlideEasing: $Jease$.$Linear,
                      $PauseOnHover: 4,
                      $SlideWidth: 140,
                      $Cols: 7
                    };

                    var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                    /*responsive code begin*/
                    /*remove responsive code if you don't want the slider scales while window resizing*/
                    function ScaleSlider() {
                        var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                        if (refSize) {
                            refSize = Math.min(refSize, 809);
                            jssor_1_slider.$ScaleWidth(refSize);
                        }
                        else {
                            window.setTimeout(ScaleSlider, 30);
                        }
                    }
                    ScaleSlider();
                    $Jssor$.$AddEvent(window, "load", ScaleSlider);
                    $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                    $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
                    /*responsive code end*/
                };
            </script>
            <style></style>
            <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:100px;overflow:hidden;visibility:hidden;">
                <!-- Loading Screen -->
                <div data-u="loading" style="position:absolute;top:0px;left:0px;background-color:rgba(0,0,0,0.7);">
                    <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                    <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                </div>
                <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:100px;overflow:hidden;">

                    @if(count($logos)>=10)
                        @foreach($logos as $logo)
                        <div>
                            <img data-u="image" src="{{Storage::disk('local')->url($logo)}}" class="img-responsive" />
                        </div>
                        @endforeach
                    @else
                        <?php $yourjob=array('y','o','u','r',' ','j','o','b',' ') ?>
                        @for($i=0 ;$i<9 ;$i++)
                        <div>
                            <img data-name="{{$yourjob[$i]}}" class="profile_logo"/>
                        </div>
                        @endfor
                    @endif
                </div>
            </div>
            <script type="text/javascript">jssor_1_slider_init();</script>
            <!-- #endregion Jssor Slider End -->
        </section>



        <div class="container">   
            <div class="row">
                <div id="search-news">

                    <h1>{{trans('messages.Find What You Want')}}</h1>
                    

                        <div class="col-md-9 results">
                            @foreach($jobs as $job)
                                <div class="col-md-4">
                                   <a href="/getJobTitle/{{$job->track}}">
                                   @if(trans('navbar.Jobs') == 'Jobs')
                                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                                   @else
                                    <i class="fa fa-hand-o-left" aria-hidden="true"></i>
                                   @endif
                                        {{$job->track}}
                                   </a>

                                </div>
                            @endforeach    
                        </div>  


                    <div class="col-md-3 news">
                        
                        <h4>{{trans('messages.Jobs News')}}</h4>
                        <!-- start sw-rss-feed code --> 
                        <script type="text/javascript"> 
                        <!-- 
                        rssfeed_url = new Array(); 
                        rssfeed_url[0]="http://www.jobs-eg.com/rss/jobs/"; rssfeed_url[1]="https://www.bayt.com/live-bookmarks/eg-rss.xml"; rssfeed_url[2]="http://feeds.mustakbil.com/jobs/egypt";  
                        rssfeed_frame_width="250"; 
                        rssfeed_frame_height="400"; 
                        rssfeed_scroll="on"; 
                        rssfeed_scroll_step="6"; 
                        rssfeed_scroll_bar="off"; 
                        rssfeed_target="_blank"; 
                        rssfeed_font_size="12"; 
                        rssfeed_font_face=""; 
                        rssfeed_border="on"; 
                        rssfeed_css_url="http://feed.surfing-waves.com/css/style7.css"; 
                        rssfeed_title="off"; 
                        rssfeed_title_name=""; 
                        rssfeed_title_bgcolor="#3366ff"; 
                        rssfeed_title_color="#fff"; 
                        rssfeed_title_bgimage="http://"; 
                        rssfeed_footer="off"; 
                        rssfeed_footer_name="rss feed"; 
                        rssfeed_footer_bgcolor="#fff"; 
                        rssfeed_footer_color="#333"; 
                        rssfeed_footer_bgimage="http://"; 
                        rssfeed_item_title_length="50"; 
                        rssfeed_item_title_color="#666"; 
                        rssfeed_item_bgcolor="#fff"; 
                        rssfeed_item_bgimage="http://"; 
                        rssfeed_item_border_bottom="on"; 
                        rssfeed_item_source_icon="off"; 
                        rssfeed_item_date="off"; 
                        rssfeed_item_description="on"; 
                        rssfeed_item_description_length="120"; 
                        rssfeed_item_description_color="#666"; 
                        rssfeed_item_description_link_color="#333"; 
                        rssfeed_item_description_tag="off"; 
                        rssfeed_no_items="0"; 
                        rssfeed_cache = "b5c1b3e05071f93558244e4f1dbeb918"; 
                        //--> 
                        </script> 
                        <script type="text/javascript" src="http://feed.surfing-waves.com/js/rss-feed.js"></script> 
                        <!-- The link below helps keep this service FREE, and helps other people find the SW widget. Please be cool and keep it! Thanks. --> 
                        <!-- end sw-rss-feed code -->
                    </div>

                </div>  
            </div>
        </div>
      

@endsection