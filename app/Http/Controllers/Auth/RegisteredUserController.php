<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'function' => 'required',
            'enrollment' => 'required',
        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'function' => $request->function,
            'enrollment' => $request->enrollment,
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }

    public function show(User $user)
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('profile', compact('user'));
    }

    public function edit(User $user)
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('profile', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|confirmed|min:8',
            'function' => 'required',
            'enrollment' => 'required',
            ]);
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user->update($data);
        return redirect(route('user.show', $user->id));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('dashboard'));
    }
}
