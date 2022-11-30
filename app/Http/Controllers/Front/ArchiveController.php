<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArchiveController extends Controller
{
    public function show(Request $request)
    {
        $temp = explode('-', $request->archive_month_year);
        $month = $temp[0];
        $year = $temp[1];

        return redirect()->route('archive_detail', [$year, $month]);
    }

    public function archive_detail($year, $month)
    {
        $archive_post_data = Post::whereMonth('created_at', '=', $month)     ->whereYear('created_at', '=', $year)->paginate(2);
       
        foreach($archive_post_data as $item) {
            $st = strtotime($item->created_at);
            $updated_date = date('F, Y', $st);
        }
        
        return view('front-end.archive', compact('archive_post_data', 'updated_date'));
    }
}
