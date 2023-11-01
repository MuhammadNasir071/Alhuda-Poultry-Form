<?php

namespace App\Services\Backend;

use App\Models\Mortality;
use App\Models\Sale;
use App\Models\Expense;
use App\Models\Feed;

class ReportsService
{

    // Mortality Weekly report
    public function showMortalityWeeklyReport($request)
    {
        $allData = Mortality::where('company_id', $request->company_id)->where('shed_id', $request->shed_id)
            ->orderBy('date')
            ->get();

        $groupedData = [];
        $chunkedData = $allData->chunk(7);

        foreach ($chunkedData as $chunk) {
            $groupedData[] = $chunk;
        }

        return $groupedData;

    }

    // Feeds Weekly report
    public function showFeedWeeklyReport($request)
    {
        $allData = Feed::where('company_id', $request->company_id)->where('shed_id', $request->shed_id)
            ->orderBy('date')
            ->get();

        $groupedData = [];
        $chunkedData = $allData->chunk(7);

        foreach ($chunkedData as $chunk) {
            $groupedData[] = $chunk;
        }

        return $groupedData;

    }

    // Expense total report
    public function showExpenseWeeklyReport($request)
    {
        $allData = Expense::where('company_id', $request->company_id)->where('shed_id', $request->shed_id)
            ->orderBy('date')
            ->get();

        return $allData;

    }

    // Sale total report
    public function showSalesTotalReport($request)
    {
        $allData = Sale::where('company_id', $request->company_id)->where('shed_id', $request->shed_id)->with('clients')->get();
        return $allData;

    }
}
