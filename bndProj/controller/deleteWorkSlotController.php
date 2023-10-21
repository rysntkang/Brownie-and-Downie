<?php

class DeleteWorkSlotController extends WorkSlotClass
{
    public static function createWorkSlot($workslotId) {
        $workslot = new WorkSlotClass();
        $workslot->set_workslotId($workslotId);

        $error = $workslot->delete();
        return $error;
    }
}
?>