<?php

class SearchWorkSlotController extends WorkSlotClass
{
    public static function searchWorkSlot($date) {
        $workslot = new WorkSlotClass();
        $workslot->set_date($date);

        $error = $workslot->search();
        return $error;
    }
}
?>