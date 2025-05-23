@extends('front-end.layouts.app')
@section('title', 'FAQ')
@section('main_content')

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $page->faq_title }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $page->faq_title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            @if($page->faq_detail != '')
            <div class="col-md-12">
               {!! $page->faq_detail !!}
            </div>
            @endif

            <div class="col-md-12">
                <div class="accordion" id="accordionExample">

                    @php
                        $i=0;
                    @endphp
                    @foreach($faq_data as $item)
                    @php
                        $i++
                    @endphp
                   
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $i }}">
                        <button class="accordion-button @if($i!=1) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="@if($i==1)  true @else false @endif" aria-controls="collapse{{ $i }}">
                            {{ $item->faq_title }}
                        </button>
                        </h2>
                        <div id="collapse{{ $i }}" class="accordion-collapse collapse @if($i==1) show @endif" aria-labelledby="heading{{ $i }}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                {!! $item->faq_detail !!}
                                
                            </div>
                        </div>
                    </div>

                    @endforeach
                    
                   
                </div>
            </div>

        </div>
    </div>
</div>

@endsection