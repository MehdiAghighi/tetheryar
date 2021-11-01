<?php

namespace App\Policies;

use App\Models\BuyRequest;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResultPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function show(User $user , BuyRequest $buyRequest)
    {
        return $user->id === $buyRequest->user_id;
    }
}
