<?php

class CheckAvailabilityController extends WorkSlotEntity
{
    public function checkAvailabilityUser($date, $userId_workslot)
    {
        $workslot = new WorkSlotEntity();
        $workslot->set_date($date);
        $workslot->set_userIdWorkslot($userId_workslot);
        // $available = $workslot->checkMaxShift();
        $available = $workslot->checkAvailability();

        return $available;
    }
}
?>