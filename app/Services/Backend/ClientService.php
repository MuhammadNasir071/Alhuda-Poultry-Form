<?php

namespace App\Services\Backend;

use App\Models\Client;
use Illuminate\Support\Str;

class ClientService
{

    public function getClients()
    {
        return Client::get();
    }


    public function store($request)
    {
        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
    }

    public function update($request, $client_id)
    {
        $client = Client::find($client_id);
        if($client){
            $client->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
        }
    }
}
