<?php

namespace App\Http\Controllers\Web;

use App\Entities\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $chart = Question::where('created_at', '>=', Carbon::now()->subMonth())->groupBy('date')->orderBy('date', 'ASC')
            ->get(array(
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) as "views"')
            ));
        return view('home.index', compact('chart'));
    }
}
