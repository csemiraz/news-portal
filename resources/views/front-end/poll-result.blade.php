@extends('front-end.layouts.app')
@section('title', 'Poll Results')
@section('main_content')

 
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Poll Results</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Poll Results</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @foreach($poll_results as $item)
                    @if($loop->iteration == 1)
                        @continue
                    @endif

                    @php
                        $total_vote = $item->yes_vote + $item->no_vote;

                        if($total_vote == 0) {
                            $total_yes_percentage = 0;
                        }
                        else {
                            $total_yes_percentage = ceil(($item->yes_vote*100)/$total_vote);
                        }

                        if($total_vote == 0) {
                            $total_no_percentage = 0;
                        }
                        else {
                            $total_no_percentage = ceil(($item->no_vote*100)/$total_vote);
                        }

                    @endphp

                    <div class="poll-item">
                        <div class="question">
                            {{ $item->question }}
                        </div>
                        <div class="poll-date">
                            @php
                                $st = strtotime($item->created_at);
                                $date = date(('d F, Y'), $st);
                            @endphp
                            <b>Poll Date:</b> {{ $date }}
                        </div>
                        <div class="total-vote">
                            @php
                                $total_vote = $item->yes_vote + $item->no_vote;
                            @endphp
                            <b>Total Votes:</b> {{ $total_vote }}
                        </div>
                        <div class="poll-result">                        
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Yes ({{ $item->yes_vote }})</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $total_yes_percentage }}%" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100">{{ $total_yes_percentage }}%</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>No ({{ $item->no_vote }})</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $total_no_percentage }}%" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100">{{ $total_no_percentage }}%</div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
          

            </div>
        </div>
    </div>
</div>




@endsection