<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sortBy = $request->q;

        $users = User::when($sortBy, function ($query, $sortBy) {
                    return $query->where('email', 'LIKE', "%$sortBy%")
                                 ->orWhere('first_name', 'LIKE', "%$sortBy%")
                                 ->orWhere('last_name', 'LIKE', "%$sortBy%");
                }, function ($query) {
                    return $query->orderBy('first_name', 'asc');
                })
                ->paginate(15);

        return view('users.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'email'      => 'required|string|email|max:255|unique:users',
          'nick_name'  => 'required',
          'first_name' => 'required',
          'last_name'  => 'required',
          'dob'        => 'required',
          'entity'     => 'required'
        ]);

        $password = bcrypt('lastmile');
        $user = User::create(array_merge($request->except('photo'),['password' => $password]));

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('users.edit')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'first_name' => 'required',
          'last_name'  => 'required',
          'dob'        => 'required',
          'entity'     => 'required'
        ]);

        $data = User::findOrFail($id);
        $data->update($request->except('photo'));

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('users.index');
    }
}
