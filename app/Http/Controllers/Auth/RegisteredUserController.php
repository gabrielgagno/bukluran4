<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use App\Models\Role;
use App\Models\Organization;
use App\Models\Student;
use App\Models\Faculty;

class RegisteredUserController extends Controller
{
    /**
     * Display the Select Role view.
     * 
     * @return \Illuminate\View\View
     */
    public function selectRole()
    {
        return Inertia::render('Auth/RegisterSelectRole');
    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $selectedRole = $request->query('selectedRole');
        $roleObject = null;
        $userable = null;
        switch ($selectedRole) {
            case 'student':
                $userable = Student::where('student_num', $request->query('code'))->first();
                $roleObject = Role::where('name', 'student')->first();
                break;
            case 'org':
                $userable = Organization::where('org_code', $request->query('code'))->first();
                $roleObject = Role::where('name', 'organization')->first();
                break;
            case 'faculty':
                $userable = Faculty::where('faculty_number', $request->query('code'))->first();
                $roleObject = Role::where('name', 'faculty')->first();
                break;
            default:
            return redirect()->route('register.select');
                break;
        }

        if(is_null($userable)) {
            return redirect()->route('register.select')
                ->with('status', 'The code you entered is invalid. Please try again or contact OSPA if you think this is a mistake.');
        }

        $roles = Role::all();
        return Inertia::render('Auth/Register', [
            'userable' => $userable,
            'role' => $roleObject,
        ]);
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
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        // associate role
        $role = Role::find($request->role);

        $user->role()->associate($role);

        // associate userable
        $userable = null;
        switch ($role->name) {
            case 'student':
                $userable = Student::find($request->userable_id);
                
                break;
            case 'organization':
                $userable = Organization::find($request->userable_id);
                break;
            case 'faculty':
                $userable = Faculty::find($request->userable_id);
                break;
            default:
            return redirect()->route('register.select');
                break;
        }

        $user->userable()->associate($userable);
        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
