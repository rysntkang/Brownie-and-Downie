<?php

class CheckAvailabilityController extends WorkSlotEntity
{
    public function checkAvailability($date, $username_workslot)
    {
        $workslot = new WorkSlotEntity();
        $workslot->set_date($date);
        $workslot->set_userIdWorkslot($username_workslot);
        $available = $workslot->checkMaxShift();

        return $available;
    }
}
?>