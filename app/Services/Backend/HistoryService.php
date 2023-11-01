<?php

namespace App\Services\Backend;

use App\Models\Mortality;
use App\Models\Sale;
use App\Models\Expense;
use App\Models\Feed;

class HistoryService
{

    // Mortality Weekly history
    public function showMortalityWeeklyhistory($request)
    {
        $allData = Mortality::where('company_id', $request->company_id_history)->where('shed_id', $request->shed_id)
            ->orderBy('date')
            ->get();

        $groupedData = [];
        $chunkedData = $allData->chunk(7);

        foreach ($chunkedData as $chunk) {
            $groupedData[] = $chunk;
        }

        return $groupedData;

    }

    // Feeds Weekly history
    public function showFeedWeeklyhistory($request)
    {
        $allData = Feed::where('company_id', $request->company_id_history)->where('shed_id', $request->shed_id)
            ->orderBy('date')
            ->get();

        $groupedData = [];
        $chunkedData = $allData->chunk(7);

        foreach ($chunkedData as $chunk) {
            $groupedData[] = $chunk;
        }

        return $groupedData;

    }

    // Expense total history
    public function showExpenseWeeklyhistory($request)
    {
        $allData = Expense::where('company_id', $request->company_id_history)->where('shed_id', $request->shed_id)
            ->orderBy('date')
            ->get();

        return $allData;

    }

    // Sale total history
    public function showSalesTotalhistory($request)
    {
        $allData = Sale::where('company_id', $request->company_id_history)->where('shed_id', $request->shed_id)->with('clients')->get();
        return $allData;

    }
}
