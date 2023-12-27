<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{


  public function edit()
  {
    $item = Auth::user();

    return view('profile.edit', compact('item'));
  }


  public function update(UpdateProfileRequest $request)
  {
    $item = Auth::user();

    $item->update([
      'name' => $request->name,
      'username' => $request->username,
      'email' => $request->email,
      'password' => $request->password ? Hash::make($request->password) : $item->password,
    ]);

    return redirect()->route('dashboard.profile.edit')->with('success', 'تم العديل على السجل بنجاح');
  }
}
