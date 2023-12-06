<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ForestSessionsService
{
    public static function getAllSessions()
    {
        $cacheKey = 'all_sessions';

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $results = self::makeRequest(config('panda.sessions_url'))['results'];

        Cache::put($cacheKey, $results, now()->addhours(5));

        return $results;

    }

    public static function getFilteredSessions($keyword, $date)
    {
        return array_filter(self::getAllSessions(), function ($result) use ($keyword, $date) {

            if (empty($keyword) && empty($date)) {
                return true;
            }

            if (!empty($keyword) && !empty($date)) {
                $resultDate = Carbon::parse($result['date'])->format('Y-m-d');
                $inputDate = Carbon::parse($date)->format('Y-m-d');

                return $resultDate === $inputDate && $result['keywords'][0]['id'] == $keyword;
            }

            if (!empty($keyword)) {
                return $result['keywords'][0]['id'] == $keyword;
            }

            if (!empty($date)) {
                $resultDate = Carbon::parse($result['date'])->format('Y-m-d');
                $inputDate = Carbon::parse($date)->format('Y-m-d');

                return $resultDate === $inputDate;
            }

            return false;
        });
    }


    public static function getKeywords()
    {
        $cacheKey = 'keywords';

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $keywords = self::makeRequest(config('panda.keywords_url'))['keywords'];
        Cache::put($cacheKey, $keywords, now()->addHours(5));

        return $keywords;
    }

    public static function getStatistics()
    {
        $collectionResults = collect(self::getAllSessions());

        $groupedData = $collectionResults->map(function ($item) {
            return [
                'date' => substr($item['date'], 0, 10),
                'count' => 1,
            ];
        })->groupBy('date');

        return $groupedData->map(function ($group) {
            return [
                'date' => $group->first()['date'],
                'count' => $group->sum('count'),
            ];
        })->toArray();
    }

    public static function getAllSessionsCount()
    {
        $cacheKey = 'all_sessions_count';

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $results = self::makeRequest(config('panda.sessions_url'))['count'];

        Cache::put($cacheKey, $results, now()->addhours(5));

        return $results;

    }

    private static function makeRequest($url, $params = [])
    {
        $token = request()->cookie('api_token');
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];

        if (!empty($params)) {
            return Http::withHeaders($headers)->get($url, $params);
        } else {
            return Http::withHeaders($headers)->get($url);
        }
    }
}
