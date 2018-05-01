<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Engagement;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = [
            [
                'reportTitle' => 'Fans',
                'reportLabel' => 'SUM',
                'chartType' => 'line',
                'results' => Engagement::get()->sortBy('stats_date')->groupBy(function ($entry) {
                        if ($entry->stats_date instanceof \Carbon\Carbon) {
                            return \Carbon\Carbon::parse($entry->stats_date)->format('Y-m-d');
                        }

                        return \Carbon\Carbon::createFromFormat(config('app.date_format'), $entry->stats_date)->format('Y-m-d');
                    })->map(function ($entries, $group) {
                        return $entries->sum('fans');
                    })
            ],
            [
                'reportTitle' => 'Engagements',
                'reportLabel' => 'SUM',
                'chartType' => 'line',
                'results' => Engagement::get()->sortBy('stats_date')->groupBy(function ($entry) {
                    if ($entry->stats_date instanceof \Carbon\Carbon) {
                        return \Carbon\Carbon::parse($entry->stats_date)->format('Y-m-d');
                    }

                    return \Carbon\Carbon::createFromFormat(config('app.date_format'), $entry->stats_date)->format('Y-m-d');
                })->map(function ($entries, $group) {
                    return $entries->sum('engagements');
                })
            ],
            [
                'reportTitle' => 'Reactions',
                'reportLabel' => 'SUM',
                'chartType' => 'line',
                'results' => Engagement::get()->sortBy('stats_date')->groupBy(function ($entry) {
                    if ($entry->stats_date instanceof \Carbon\Carbon) {
                        return \Carbon\Carbon::parse($entry->stats_date)->format('Y-m-d');
                    }

                    return \Carbon\Carbon::createFromFormat(config('app.date_format'), $entry->stats_date)->format('Y-m-d');
                })->map(function ($entries, $group) {
                    return $entries->sum('reactions');
                })
            ],
            [
                'reportTitle' => 'Comments',
                'reportLabel' => 'SUM',
                'chartType' => 'line',
                'results' => Engagement::get()->sortBy('stats_date')->groupBy(function ($entry) {
                    if ($entry->stats_date instanceof \Carbon\Carbon) {
                        return \Carbon\Carbon::parse($entry->stats_date)->format('Y-m-d');
                    }

                    return \Carbon\Carbon::createFromFormat(config('app.date_format'), $entry->stats_date)->format('Y-m-d');
                })->map(function ($entries, $group) {
                    return $entries->sum('comments');
                })
            ],
            [
                'reportTitle' => 'Shares',
                'reportLabel' => 'SUM',
                'chartType' => 'line',
                'results' => Engagement::get()->sortBy('stats_date')->groupBy(function ($entry) {
                    if ($entry->stats_date instanceof \Carbon\Carbon) {
                        return \Carbon\Carbon::parse($entry->stats_date)->format('Y-m-d');
                    }

                    return \Carbon\Carbon::createFromFormat(config('app.date_format'), $entry->stats_date)->format('Y-m-d');
                })->map(function ($entries, $group) {
                    return $entries->sum('shares');
                })
            ],
        ];

        return view('admin.reports', compact('reports'));
    }
}
