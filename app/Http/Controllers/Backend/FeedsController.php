<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FeedRequest;
use App\Http\Requests\Backend\MortalityRequest;
use App\Http\Requests\Backend\UpdateFeedRequest;
use App\Http\Requests\Backend\UpdateMortalityRequest;
use App\Models\Company;
use App\Models\Feed;
use App\Services\Backend\FeedsService;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeedsController extends Controller
{
    use JsonResponse;

    protected $feedService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FeedsService $feedService)
    {
        $this->middleware('auth');
        $this->feedService = $feedService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feeds = $this->feedService->getFeed();
        return view('backend.feeds.index', compact('feeds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::where('is_active', 1)->get();
        return view('backend.feeds.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeedRequest $request)
    {
        $this->feedService->store($request);
        return $this->success('Feed added successfully', ['success' => true, 'data' => null]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Feed $feed)
    {
        return view('backend.feeds.show', compact('feed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feed $feed)
    {
        return view('backend.feeds.edit', compact('feed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeedRequest $request, Feed $feed)
    {
        $this->feedService->update($request, $feed);
        return $this->success('Feed updated successfully', ['success' => true, 'data' => null]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feed $feed)
    {
        try {
            $feed->delete();
            return $this->success('Record deleted successfully', ['success' => true, 'data' => null]);
        } catch (\Throwable $th) {
            return $this->error('Feed not found', Response::HTTP_NOT_FOUND, ['success' => false, 'data' => null]);
        }
    }

    // get total feed for avag weigt
    public function getAvgWeights($company_id, $shed_id){
        $feeds = Feed::where('company_id', $company_id)->where('shed_id', $shed_id)->get();
        return $this->success('', ['success' => true, 'feeds' =>$feeds]);
    }

    // add weekly avg weight
    public function addAvgWeight()
    {
        $companies = Company::where('is_active', 1)->get();
        return view('backend.feeds.add_avg_weight', compact('companies'));
    }

    // store avg weight of feed weekly
    public function storeAvgWeights(Request $request)
    {
        $this->feedService->storeAvgWeights($request);
        return redirect()->route('admin.feeds.index');
    }

}
