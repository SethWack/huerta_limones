<?php

namespace App\Actions\Jetstream;

use App\Models\Carritos;
use App\Models\User_cars;
use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function delete($user)
    {
        $user_car = User_cars::where('USER_ID', $user['id'])->first();
        $user_car_id = $user_car['CAR_ID'];
        User_cars::where('USER_ID', $user['id'])->delete();
        Carritos::where('id', $user_car_id);
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
    }
}
