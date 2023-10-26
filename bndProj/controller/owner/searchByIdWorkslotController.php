<?php

class SearchByIdWorkSlotController extends WorkSlotClass
{
    public static function searchByIdWorkSlot($workslotId) {
        $workslot = new WorkSlotClass();
        $workslot->set_workslotId($workslotId);

        $error = $workslot->searchById();
        return $error;
    }
}
?>