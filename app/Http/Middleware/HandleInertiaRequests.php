<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tighten\Ziggy\Ziggy;

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
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $user = $request->user();
        if ($user) {
            $permisos = $user->getAllPermissions()->pluck('name')->toArray();
            $roles = $user->getRoleNames();
            unset($user->roles);
        }

        return [
            ...parent::share($request),
            'auth' => [
                'user' => $user,
                'roles' => $roles ?? '',
                'permisos' => $permisos ?? '',
            ],
            'app_name' => config('app.name'),
            // 'ziggy' => fn () => [
            //     ...(new Ziggy)->toArray(),
            //     'location' => $request->url(),
            // ],
        ];
    }
}
