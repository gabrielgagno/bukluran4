<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        $userable = null;
        $userableName = null;
        if($request->user()) {
            $userable = $request->user()->userable;
            $userableName = is_null($request->user()->userable) ? null : explode("\\", $request->user()->userable_type)[2];
        }
        return array_merge(parent::share($request), [
            'status' => session('status'),
            'auth' => [
                'user' => $request->user(),
                'userable_name' => $userableName,
                'userable' => $userable,
            ],
        ]);
    }
}
