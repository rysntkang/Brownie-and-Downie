<?php

class UpdateWorkSlotController extends WorkSlotClass
{
    public static function updateWorkSlot($workslotId, $date, $role) {
        $workslot = new WorkSlotClass();
        $workslot->set_workslotId($workslotId);
        $workslot->set_date($date);
        $workslot->set_role($role);

        $error = $workslot->update();
        return $error;
    }
}
?>