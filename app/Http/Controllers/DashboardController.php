<?php

namespace App\Http\Controllers;

use App\Services\ForestSessionsService;

class DashboardController extends Controller
{
    public function index()
    {
        $sessionsCount = ForestSessionsService::getAllSessionsCount();
        $keywordsCount = ForestSessionsService::getKeywords();

        return view('dashboard', [
            'totalSessions' => $sessionsCount,
            'totalHighlights' => count($keywordsCount),
        ]);
    }
}
