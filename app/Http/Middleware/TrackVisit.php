<?php

namespace App\Http\Middleware;

use App\Models\Tracker;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Не рахуємо службові запити
        if ($request->is('up')) {
            return $response;
        }

        $route  = $request->route();
        $player = $route?->parameter('player');

        $meta = array_filter([
            'route_name'   => $route?->getName(),
            'user_agent'   => $request->userAgent(),
            'device'       => $this->device($request->userAgent()),
            'referer'      => $request->header('referer'),
            'player_id'    => $player instanceof \App\Models\Player ? $player->id : $player,
            'country_code' => $request->query('country_code'),
        ], fn ($value) => $value !== null && $value !== '');

        Tracker::create([
            'page'       => '/' . ltrim($request->path(), '/'),
            'ip'         => $request->ip(),
            'method'     => $request->method(),
            'status'     => $response->getStatusCode(),
            'meta'       => $meta,
            'visited_at' => now(),
        ]);

        return $response;
    }

    private function device(?string $userAgent): string
    {
        $ua = strtolower($userAgent ?? '');

        return match (true) {
            str_contains($ua, 'tablet'), str_contains($ua, 'ipad') => 'tablet',
            str_contains($ua, 'mobile'), str_contains($ua, 'android'), str_contains($ua, 'iphone') => 'mobile',
            default => 'desktop',
        };
    }
}
