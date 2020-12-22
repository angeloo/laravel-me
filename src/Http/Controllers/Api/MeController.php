<?php

namespace Angeloo\Me\Http\Controllers\Api;

use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class MeController
{
    use Authenticatable;

    /**
     * Return the current logged user
     *
     * @return \App\Http\Resources\MeResource
     */
    public function __invoke()
    {
        $with = config('me.with');

        $me = Auth::user();

        if ($with) {
            $me->load($with);
        }

        $resource = config('me.resource');

        return new $resource($me);
    }
}
