<?php

namespace App\Services\Backend;

use App\Models\Mortality;
use Illuminate\Support\Str;
use Carbon\Carbon;

class MortalityService
{

    public function getMortalities()
    {
        return Mortality::whereHas('company', function ($query) {
            $query->where('is_active', 1);
        })->whereHas('sheds', function ($query) {
            $query->where('is_active', 1);
        })->get();
    }


    public function store($request)
    {
        Mortality::create([
            'company_id' => $request->company_id,
            'shed_id' => $request->shed_id,
            'day_mortality' => $request->day_mortality,
            'night_mortality' => $request->night_mortality,
            'date' => $request->date,
        ]);
    }

    public function update($request, $mortality)
    {
        $mortality->update([
            'day_mortality' => $request->day_mortality,
            'night_mortality' => $request->night_mortality,
            'date' => $request->date,
        ]);
    }

    public function weekly_report($shed_id)
    {
        $allData = Mortality::where('shed_id', $shed_id)
            ->orderBy('date')
            ->get();

        $groupedData = [];
        $chunkedData = $allData->chunk(7);

        foreach ($chunkedData as $chunk) {
            $groupedData[] = $chunk;
        }

        return $groupedData;

    }
}
