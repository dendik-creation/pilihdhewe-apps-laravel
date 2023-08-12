<?php

namespace App\Observers;

use App\Events\NISEvent;
use App\Models\User;

class NISObserver
{

    public function creating(User $user)
    {
        $getCard = User::latest()->value('number_card');
        $split = str_split($getCard);
        $currentCard = array_splice($split, 4);
        $implode = implode($currentCard);
        $setInt = intval($implode);

        if($setInt < 10){
            $newCard = '000'. $setInt + 1;
        }
        if($setInt == 9){
            $newCard = '00'. $setInt + 1;
        }
        if($setInt >= 10){
            $newCard = '00'. $setInt + 1;
        }
        if($setInt == 21 || $setInt == 31 || $setInt == 41 || $setInt == 51 || $setInt == 61 || $setInt == 71 || $setInt == 81 || $setInt == 91){
            $newCard = '00'. $setInt + 1;
        }
        if($setInt == 99){
            $newCard = '0'. $setInt + 1;
        }
        if($setInt >= 100){
            $newCard = '0'. $setInt + 1;
        }

        $user->number_card = 'SMK-'.$newCard;
        event(new NISEvent($newCard));
    }
}
