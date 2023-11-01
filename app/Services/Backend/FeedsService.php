<?php

namespace App\Services\Backend;

use App\Models\Feed;
use App\Models\Mortality;
use App\Models\Shed;
use Illuminate\Support\Str;
use Carbon\Carbon;

class FeedsService
{

    public function getFeed()
    {
        return Feed::whereHas('company', function ($query) {
            $query->where('is_active', 1);
        })->whereHas('sheds', function ($query) {
            $query->where('is_active', 1);
        })->get();
    }

    public function store($request)
    {
        Feed::create([
            'company_id' => $request->company_id,
            'shed_id' => $request->shed_id,
            'day_feed' => $request->day_feed,
            'night_feed' => $request->night_feed,
            'date' => $request->date,
        ]);
    }

    public function update($request, $feed)
    {
        $feed->update([
            'day_feed' => $request->day_feed,
            'night_feed' => $request->night_feed,
            'date' => $request->date,
        ]);
    }

    public function weekly_report($shed_id)
    {
        $allData = Feed::where('shed_id', $shed_id)
            ->orderBy('date')
            ->get();

        $groupedData = [];
        $chunkedData = $allData->chunk(7);

        foreach ($chunkedData as $chunk) {
            $groupedData[] = $chunk;
        }

        return $groupedData;

    }

    // store avg weight of feed weekly
    public function storeAvgWeights($request)
    {
        if($request->week == 'remaning_week'){
            $company_id = $request->company_id;
            $shed_id = $request->shed_id;
            $avg_weight = $request->avg_weight;

            $feeds = Feed::where('company_id', $company_id)->where('shed_id', $shed_id)->get();

            $shed = Shed::where('company_id', $company_id)->where('is_active', 1)->firstOrFail();

            $weekly_mortality = Mortality::where('company_id', $company_id)->where('shed_id', $shed_id)
                ->orderBy('created_at', 'desc')->get();

            $total_mortality = $weekly_mortality->sum(function ($mortality) {
                return $mortality->day_mortality + $mortality->night_mortality;
            });

            $remaining_quantity = $shed->quantity - $total_mortality;

            $feeds = Feed::where('company_id', $company_id)->where('shed_id', $shed_id)
                ->orderBy('created_at', 'desc')->get();

            $total_feed = $feeds->sum(function ($feed) {
                return $feed->day_feed + $feed->night_feed;
            });

            $fcr = ($avg_weight * $remaining_quantity) / 1000;
            $fcr = ($fcr / $total_feed);

            $updateFeed = Feed::where('company_id', $company_id)->where('shed_id', $shed_id)
                ->orderBy('id', 'desc')->first();
            // Update feeds with avg_weight and fcr
            $updateFeed->update([
                'avg_weight' => $avg_weight,
                'fcr' => round($fcr,2)
            ]);
        }
        else{
            $week = (int) ($request->week)*7;
            $company_id = $request->company_id;
            $shed_id = $request->shed_id;
            $avg_weight = $request->avg_weight;

            $feeds = Feed::where('company_id', $company_id)->where('shed_id', $shed_id)->get();

            $shed = Shed::where('company_id', $company_id)->where('is_active', 1)->firstOrFail();

            $weekly_mortality = Mortality::where('company_id', $company_id)->where('shed_id', $shed_id)
                            ->take($week)->get();

            $total_mortality = $weekly_mortality->sum(function ($mortality) {
                return $mortality->day_mortality + $mortality->night_mortality;
            });

            $remaining_quantity = $shed->quantity - $total_mortality;

            $feeds = Feed::where('company_id', $company_id)->where('shed_id', $shed_id)
                    ->take($week)->get();

            $total_feed = $feeds->sum(function ($feed) {
                return $feed->day_feed + $feed->night_feed;
            });


            $fcr = ($avg_weight * $remaining_quantity) / 1000;
            $fcr = ($fcr / $total_feed);

            $updateFeed = Feed::where('company_id', $company_id)->where('shed_id', $shed_id)
                ->orderBy('id', 'asc')->skip($week-1)->take($week)->first();
            // Update feeds with avg_weight and fcr
            $updateFeed->update([
                'avg_weight' => $avg_weight,
                'fcr' => round($fcr,2)
            ]);
        }
    }
}
