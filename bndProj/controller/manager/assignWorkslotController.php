<?php

class AssignWorkslotController extends WorkSlotClass
{
    public static function assignWorkslot($workslotId, $date, $username_workslot)
    {
        $workslot = new WorkSlotClass();
        $workslot->set_workslotId($workslotId);
        $workslot->set_date($date);
        $workslot->set_username_workslot($username_workslot);
        $error = $workslot->assign();

        return $error;
    }
}
?>