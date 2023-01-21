@extends('back-end.layouts.app')
@section('title', 'Update Setting')
@section('heading', 'Update Setting')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_setting_update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                    <a class="nav-link active" id="v-1-tab" data-toggle="pill" href="#v-1" role="tab" aria-controls="v-1" aria-selected="true">
                                        Home Page
                                    </a>

                                    <a class="nav-link" id="v-2-tab" data-toggle="pill" href="#v-2" role="tab" aria-controls="v-2" aria-selected="false">
                                        Logo & Favicon
                                    </a>

                                    <a class="nav-link" id="v-3-tab" data-toggle="pill" href="#v-3" role="tab" aria-controls="v-3" aria-selected="false">
                                        Top Bar
                                    </a>

                                    <a class="nav-link" id="v-4-tab" data-toggle="pill" href="#v-4" role="tab" aria-controls="v-4" aria-selected="false">
                                        Theme Color
                                    </a>

                                    <a class="nav-link" id="v-5-tab" data-toggle="pill" href="#v-5" role="tab" aria-controls="v-5" aria-selected="false">
                                        Google Analytic
                                    </a>

                                    <a class="nav-link" id="v-6-tab" data-toggle="pill" href="#v-6" role="tab" aria-controls="v-6" aria-selected="false">
                                        Disqus Code
                                    </a>

                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-9 col-md-8 col-sm-12">
                                <div class="tab-content" id="v-pills-tabContent">

                                    <div class="pt_0 tab-pane fade show active" id="v-1" role="tabpanel" aria-labelledby="v-1-tab">
                                           <!-- Home Page Start -->
                                        <div class="form-group mb-3">
                                            <label>News Ticker Total</label>
                                            <input type="text" class="form-control" name="news_ticker_total" value="{{ $setting_data->news_ticker_total }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>News Ticker Status</label>
                                            <select name="news_ticker_status" class="form-control">
                                                <option {{ $setting_data->news_ticker_status=='Show' ? 'selected' : '' }} value="Show">Show</option>
                                                <option {{ $setting_data->news_ticker_status=='Hide' ? 'selected' : '' }} value="Hide">Hide</option>
                                            </select>
                                        </div>
                                        <!-- Home page End -->
                                    </div>

                                    <div class="pt_0 tab-pane fade" id="v-2" role="tabpanel" aria-labelledby="v-2-tab">
                                        <!-- Photo Item Start -->
                                        <div class="form-group mb-3">
                                            <label>
                                                Existing Logo
                                            </label>
                                            <div>
                                                <img src="{{ asset('assets/images/'.$setting_data->logo) }}" alt="" class="w_200">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>
                                                Change Logo
                                            </label>
                                            <div>
                                                <input type="file" name="logo">
                                            </div>
                                        </div>

                                        <hr />

                                        <div class="form-group mb-3">
                                            <label>
                                                Existing Favicon
                                            </label>
                                            <div>
                                                <img src="{{ asset('assets/images/'.$setting_data->favicon) }}" alt="" style="height: 50px;">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>
                                                Change Favicon
                                            </label>
                                            <div>
                                                <input type="file" name="favicon">
                                            </div>
                                        </div>
                                        <!-- Photo Item End -->
                                    </div>

                                     <!-- Top Bar Start -->
                                    <div class="pt_0 tab-pane fade" id="v-3" role="tabpanel" aria-labelledby="v-3-tab">
                                    
                                     <div class="form-group mb-3">
                                         <label>Date Status</label>
                                         <select name="top_bar_date_status" class="form-control">
                                             <option {{ $setting_data->top_bar_date_status=='Show' ? 'selected' : '' }} value="Show">Show</option>
                                             <option {{ $setting_data->top_bar_date_status=='Hide' ? 'selected' : '' }} value="Hide">Hide</option>
                                         </select>
                                     </div>

                                     <div class="form-group mb-3">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="top_bar_email" value="{{ $setting_data->top_bar_email }}">
                                    </div>

                                     <div class="form-group mb-3">
                                        <label>Email Status</label>
                                        <select name="top_bar_email_status" class="form-control">
                                            <option {{ $setting_data->top_bar_email_status=='Show' ? 'selected' : '' }} value="Show">Show</option>
                                            <option {{ $setting_data->top_bar_email_status=='Hide' ? 'selected' : '' }} value="Hide">Hide</option>
                                        </select>
                                    </div>

                                 </div>
                                 <!-- Top Bar End -->

                                   <!-- Theme Color Start -->
                                <div class="pt_0 tab-pane fade" id="v-4" role="tabpanel" aria-labelledby="v-4-tab">
                                    
                                    <div class="form-group mb-3">
                                        <label>Theme Color 1</label>
                                        <input type="text" class="form-control jscolor" name="theme_color_1" value="{{ $setting_data->theme_color_1 }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Theme Color 2</label>
                                        <input type="text" class="form-control jscolor" name="theme_color_2" value="{{ $setting_data->theme_color_2 }}">
                                    </div>
                                  
                                </div>
                                <!-- Theme Color End -->

                                 <!-- Analytics Start -->
                                 <div class="pt_0 tab-pane fade" id="v-5" role="tabpanel" aria-labelledby="v-5-tab">
                                    
                                    <div class="form-group mb-3">
                                       <label>Analytic Id</label>
                                       <input type="text" class="form-control" name="analytic_id" value="{{ $setting_data->analytic_id }}">
                                    </div>

                                    <div class="form-group mb-3">
                                       <label>Analytic Status</label>
                                       <select name="analytic_status" class="form-control">
                                           <option {{ $setting_data->analytic_status=='Show' ? 'selected' : '' }} value="Show">Show</option>
                                           <option {{ $setting_data->analytic_status=='Hide' ? 'selected' : '' }} value="Hide">Hide</option>
                                       </select>
                                   </div>

                                </div>
                                <!-- Analytics End -->

                                 <!-- Disqus Code Start -->
                                 <div class="pt_0 tab-pane fade" id="v-6" role="tabpanel" aria-labelledby="v-6-tab">
                                    
                                    <div class="form-group mb-3">
                                       <label>Disqus Code</label>
                                       <textarea class="form-control snote" name="disqus_code" cols="15" rows="10">
                                        {{ $setting_data->disqus_code }}
                                       </textarea>
                                   </div>
                                
                                </div>
                                <!-- Disqus code End -->

                                </div>
                            </div>
                        </div>

                        <div class="form-group mt_30">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                    </form>
            </div>
            </div>
        </div>
    </div>
    </div>
@endsection