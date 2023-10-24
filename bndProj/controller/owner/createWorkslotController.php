<?php

class CreateWorkSlotController extends WorkSlotClass
{
    public static function createWorkSlot($date, $role) {
        $workslot = new WorkSlotClass();
        $workslot->set_date($date);
        $workslot->set_role($role);

        $error = $workslot->create();
        return $error;
    }
}
?>