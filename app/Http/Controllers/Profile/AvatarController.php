<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;


class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request)
    {

        dd(auth()->user());
        //$request->file('avatar')->store('avatars');

        // StoreAvatar
        return redirect(route('profile.edit'));
    }
}
