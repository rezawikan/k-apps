<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data = auth()->user();
        return view('profile.edit')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
          'first_name' => 'required',
          'last_name'  => 'required',
          'nick_name'  => 'required',
          'dob'        => 'required',
          'entity'     => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            if (auth()->user()->photo && auth()->user()->photo != 'images/default.png') {
                Storage::disk('public')->delete(auth()->user()->photo);
            }
            $path = $request->photo->store('images');
            $data['photo'] = $path;
        }

        $user = auth()->user();
        $user->update($data);

        return redirect()->route('profile.index');
    }
}
