<?php

namespace App\Services\Backend;

use App\Models\Shed;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ShedsService
{

    public function getSheds()
    {
        return Shed::with('company')->get();
    }
    public function view_sheds($company_id)
    {
        return Shed::where('company_id', $company_id)->where('is_active', 1)->get();
    }

    public function store($request)
    {
        Shed::create([
            'user_id' => auth()->id(),
            'company_id' => $request->company_id,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'is_active' => $request->is_active,
        ]);
    }

    public function update($request, $shed_id)
    {
        $shed = Shed::find($shed_id);
        if($shed){
            $shed->update([
                // 'user_id' => auth()->id(),
                // 'company_id' => $request->company_id,
                'name' => $request->name,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'is_active' => $request->is_active ?? 0,
            ]);
        }
    }

    // ------------------------------------------

    // Users functionallity start
    public function storeUser($request)
    {
        $user = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'pass' => $request->password,
            'password' => Hash::make($request->password),
            'contact' => $request->contact,
            'status' => 'active',
        ]);
        if($user){
            $user->roles()->attach($request->role);
        }
    }
}
