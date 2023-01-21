<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul>
                    @if($global_setting_data->top_bar_date_status == 'Show')
                        <li class="today-text">Today: {{ date('F d, Y') }}</li>
                    @endif

                    @if($global_setting_data->top_bar_email_status == 'Show')
                        <li class="email-text">{{ $global_setting_data->top_bar_email }}</li>
                    @endif
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="right">
                    @if($global_page_data->faq_status == 'Show')
                        <li class="menu"><a href="{{ route('faq') }}">FAQ</a></li>
                    @endif
                    @if($global_page_data->about_status == 'Show')
                        <li class="menu"><a href="{{ route('about') }}">About</a></li>
                    @endif
                    @if($global_page_data->about_status == 'Show')
                        <li class="menu"><a href="{{ route('contact') }}">Contact</a></li>
                    @endif
                    @if($global_page_data->about_status == 'Show')
                        <li class="menu"><a href="{{ route('author_login') }}">Login</a></li>
                    @endif
                    
                    <li>
                        <div class="language-switch">
                            <select name="">
                                <option value="">English</option>
                                <option value="">Hindi</option>
                                <option value="">Arabic</option>
                            </select>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="heading-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex align-items-center">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/images/'.$global_setting_data->logo) }}" alt="">
                    </a>
                </div>
            </div>

            @if($global_top_ad_data->top_ad_status=='Show')
            <div class="col-md-8">
                <div class="ad-section-1">  
                    @if($global_top_ad_data->top_ad_url!='')
                    <a href="{{ $global_top_ad_data->top_ad_url }}">
                        <img src="{{ asset('assets/front-end/uploads/'. $global_top_ad_data->top_ad) }}" alt="top-ad-photo">
                    </a>
                    @else
                        <img src="{{ asset('assets/front-end/uploads/'. $global_top_ad_data->top_ad) }}" alt="top-ad-photo">
                    @endif
                </div>
            </div>
            @endif
            
        </div>
    </div>
</div>