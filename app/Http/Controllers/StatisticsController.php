<?php

namespace App\Http\Controllers;

use App\Concert;
use App\Services\ConcertMetricsService;

class StatisticsController extends Controller
{
    /**
     * Show the statistics for all concerts.
     *
     * @return View
     */
    public function index()
    {
        $concerts = Concert::all();

        return view('index', compact('concerts'));
    }

    /**
     * Show the statistics for the specified concert.
     *
     * @return View
     */
    public function concert(Concert $concert)
    {
        $concertMetrics = new ConcertMetricsService($concert);

        return view('concert', compact('concert', 'concertMetrics'));
    }
}
