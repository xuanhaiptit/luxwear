<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Auth;

class Common
{

    public function prev_segments($uri)
    {
        $segments = explode('/', str_replace(''.url('').'', '', $uri));

        return array_values(array_filter($segments, function ($value) {
            return $value !== '';
        }));
    }


}