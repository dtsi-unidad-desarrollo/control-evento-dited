<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    
    public function show($userId)
    {
        return Profile::find($userId);
        return view('admin.profiles', compact('profile'));
    }

    public function store(Request $request)
    {
        //
    }


    public function edit(Profile $profile)
    {
        //
    }


    public function update(Request $request, Profile $profile)
    {
        //
    }

 
    public function destroy(Profile $profile)
    {
        //
    }
}
