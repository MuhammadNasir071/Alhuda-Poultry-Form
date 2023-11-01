<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ClientRequest;
use App\Services\Backend\ClientService;
use App\Models\Client;
use App\Traits\JsonResponse;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    use JsonResponse;

    protected $clientService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClientService $clientService)
    {
        $this->middleware('auth');
        $this->clientService = $clientService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = $this->clientService->getClients();
        return view('backend.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        $this->clientService->store($request);
        return $this->success('Client added successfully', ['success' => true, 'data' => null]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $client = Client::get()->first();
        return view('backend.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('backend.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, Client $client)
    {
        $this->clientService->update($request, $client->id);
        return $this->success('Client updated successfully', ['success' => true, 'data' => null]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        try {
            $client->delete();
            return $this->success('Record deleted successfully', ['success' => true, 'data' => null]);
        } catch (\Throwable $th) {
            return $this->error('Expense not found', Response::HTTP_NOT_FOUND, ['success' => false, 'data' => null]);
        }
    }
}
