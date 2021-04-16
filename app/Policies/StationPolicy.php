<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Station;
use Illuminate\Auth\Access\HandlesAuthorization;

class StationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {

        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Station $vacancy
     * @return mixed
     */
    public function view(User $user)
    {

            return true;

    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->role === User::ROLE_ADMIN ) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Station $station
     * @return mixed
     */
    public function update(User $user, Station $station)
    {
        if ($user->role === User::ROLE_ADMIN) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Station $station
     * @return mixed
     */
    public function delete(User $user, Station $station)
    {
        if ($user->role === User::ROLE_ADMIN) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Station $station
     * @return mixed
     */
    public function restore(User $user, Station $station)
    {
        if ($user->role === User::ROLE_ADMIN) {
            return true;
        }
    }


}
