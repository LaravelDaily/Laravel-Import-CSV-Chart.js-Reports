<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Engagement;

class ReportsController extends Controller
{
    public function fans()
    {
        $reports = [
            [
                'reportTitle' => 'Fans',
                'reportLabel' => 'SUM',
                'chartType'   => 'line',

                'results' => Engagement::get()->sortBy('stats_date')->groupBy(function ($entry) {
                    if ($entry->stats_date instanceof \Carbon\Carbon) {
                        return \Carbon\Carbon::parse($entry->stats_date)->format('Y-m-d');
                    }

                    return \Carbon\Carbon::createFromFormat(config('app.date_format'),
                        $entry->stats_date)->format('Y-m-d');
                })->map(function ($entries, $group) {
                    return $entries->sum('fans');
                }),
            ],
        ];

        return view('admin.reports', compact('reports'));
    }

    public function engagements()
    {
        $reports = [
            [
                'reportTitle' => 'Engagements',
                'reportLabel' => 'SUM',
                'chartType'   => 'line',
                'results'     => Engagement::get()->sortBy('stats_date')->groupBy(function ($entry) {
                    if ($entry->stats_date instanceof \Carbon\Carbon) {
                        return \Carbon\Carbon::parse($entry->stats_date)->format('Y-m-d');
                    }

                    return \Carbon\Carbon::createFromFormat(config('app.date_format'),
                        $entry->stats_date)->format('Y-m-d');
                })->map(function ($entries, $group) {
                    return $entries->sum('engagements');
                }),
            ],
        ];

        return view('admin.reports', compact('reports'));
    }

    public function reactions()
    {
        $reports = [
            [
                'reportTitle' => 'Reactions',
                'reportLabel' => 'SUM',
                'chartType'   => 'line',
                'results'     => Engagement::get()->sortBy('stats_date')->groupBy(function ($entry) {
                    if ($entry->stats_date instanceof \Carbon\Carbon) {
                        return \Carbon\Carbon::parse($entry->stats_date)->format('Y-m-d');
                    }

                    return \Carbon\Carbon::createFromFormat(config('app.date_format'),
                        $entry->stats_date)->format('Y-m-d');
                })->map(function ($entries, $group) {
                    return $entries->sum('reactions');
                }),
            ],
        ];

        return view('admin.reports', compact('reports'));
    }

    public function comments()
    {
        $reports = [
            [
                'reportTitle' => 'Comments',
                'reportLabel' => 'SUM',
                'chartType'   => 'line',
                'results'     => Engagement::get()->sortBy('stats_date')->groupBy(function ($entry) {
                    if ($entry->stats_date instanceof \Carbon\Carbon) {
                        return \Carbon\Carbon::parse($entry->stats_date)->format('Y-m-d');
                    }

                    return \Carbon\Carbon::createFromFormat(config('app.date_format'),
                        $entry->stats_date)->format('Y-m-d');
                })->map(function ($entries, $group) {
                    return $entries->sum('comments');
                }),
            ],
        ];

        return view('admin.reports', compact('reports'));
    }

    public function shares()
    {
        $reports = [
            [
                'reportTitle' => 'Shares',
                'reportLabel' => 'SUM',
                'chartType'   => 'line',
                'results'     => Engagement::get()->sortBy('stats_date')->groupBy(function ($entry) {
                    if ($entry->stats_date instanceof \Carbon\Carbon) {
                        return \Carbon\Carbon::parse($entry->stats_date)->format('Y-m-d');
                    }

                    return \Carbon\Carbon::createFromFormat(config('app.date_format'),
                        $entry->stats_date)->format('Y-m-d');
                })->map(function ($entries, $group) {
                    return $entries->sum('shares');
                }),
            ],
        ];

        return view('admin.reports', compact('reports'));
    }

}
