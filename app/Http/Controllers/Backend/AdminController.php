<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminProfileRequest;
use App\Models\Client;
use App\Models\Company;
use App\Models\Shed;
use App\Models\User;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    use JsonResponse;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companies = Company::all();
        $sheds = Shed::all();
        $clients = Client::all();

        return view('backend.index', compact('companies', 'sheds', 'clients'));
    }

    public function viewProfile($id)
    {
        $admin = User::where('id', $id)->first();
        return view('backend.account.show', compact('admin'));
    }

    public function editProfile($id)
    {
        $admin = User::where('id', $id)->first();
        return view('backend.account.edit', compact('admin'));
    }


    public function updateProfile(AdminProfileRequest $request, $id)
    {
        $admin = User::where('id', $id)->first();
        if($admin){
            $fileName = $admin->image;
            if($request->has('image') && !is_null($request->image))
            {
                $image = $request->file('image');
                $fileName = date('d').'_'.date('m').'_'.date('Y').'_'.$image->getClientOriginalName();
                $destinationPath = public_path().'/Uploads/user' ;
                $image->move($destinationPath,$fileName);
            };
            User::where('id', $id)->update([
                'full_name' => $request->full_name,
                'contact' => $request->contact,
                'profile_picture' => $fileName,
            ]);
            return $this->success('Record update successfully.', ['success' => true, 'data' => null]);
        }
        else{
            return $this->error('Record not found', Response::HTTP_NOT_FOUND, ['success' => false, 'data' => null]);
        }
    }
}
