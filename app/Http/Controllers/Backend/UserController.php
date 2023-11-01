<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ShedsRequest;
use App\Http\Requests\Backend\UserRequest;
use App\Models\Company;
use App\Models\Role;
use App\Models\Shed;
use App\Models\User;
use App\Services\Backend\ShedsService;
use App\Traits\JsonResponse;
use Illuminate\Http\Response;

class UserController extends Controller
{
    use JsonResponse;

    protected $shedsService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ShedsService $shedsService)
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->shedsService = $shedsService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $this->shedsService->storeUser($request);
        return $this->success('User added successfully', ['success' => true, 'data' => null]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user = $user->delete();

            return $this->success('Record deleted successfully', ['success' => true, 'data' => null]);
        } catch (\Throwable $th) {
            return $this->error('Shed not found', Response::HTTP_NOT_FOUND, ['success' => false, 'data' => null]);
        }
    }

}
