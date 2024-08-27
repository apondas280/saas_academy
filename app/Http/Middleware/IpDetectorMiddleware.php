<?php

namespace App\Http\Middleware;

use App\Models\DeviceIp;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class IpDetectorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user            = Auth::user();
            $current_ip      = request()->getClientIp();
            $query           = DeviceIp::where('user_id', $user->id);
            $first_ip        = $query->value('ip_address');
            $ips             = $query->distinct()->count('ip_address');
            $allowed_devices = get_settings('max_device');
            $user_agent      = request()->header('user-agent');

            self::registerDevice($user->id, $current_ip, $user_agent);

            if (self::isAccessRestricted($user, $current_ip, $first_ip, $ips, $allowed_devices)) {
                Session::flash('error', 'Max device limit reached.');
                return redirect()->route('home');
            }

        }
        return $next($request);
    }

    private static function isAccessRestricted($user, $current_ip, $first_ip, $ips, $allowed_devices): bool
    {
        if (is_root_admin($user->id)) {
            return $allowed_devices == 0 && $first_ip != $current_ip;
        }
        return $first_ip != $current_ip && $ips >= $allowed_devices;
    }

    private static function registerDevice($user_id, $current_ip, $user_agent): void
    {
        if (! DeviceIp::where('ip_address', $current_ip)->exists()) {
            DeviceIp::insert([
                'user_id'    => $user_id,
                'ip_address' => $current_ip,
                'user_agent' => $user_agent,
            ]);
        }
    }
}
