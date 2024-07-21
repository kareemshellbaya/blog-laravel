<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('dash.user.all', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataRole =  User::distinct()->pluck('role');
        return view('dash.user.add', compact('dataRole'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|Email|unique:user,email',
            'password' => 'required',
            'role' => 'required ' . Rule::in(['user', 'admin']),
        ]);

        $allData = $request->except('password');
        $allData['password'] = Hash::make($request->password);
        User::create($allData);

        return to_route('dashboard.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $dataRole =  User::distinct()->pluck('role');
        return view('dash.user.edit', compact('user', 'dataRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|Email|unique:user,email' . $user->id,
            'password' => 'nullable',
            'role' => 'required ' . Rule::in(['user', 'admin']),
        ]);

        $allData = $request->except('password');
        if ($request->filled('password')) {
            # code...
            $allData['password'] = Hash::make($request->password);
        }
        $user->update($allData);

        return to_route('dashboard.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('dashboard.users.index');
    }
}
