<?php

class AssignWorkslotController extends WorkslotEntity
{
    public function assignWorkslot($workslotId, $date, $userId_workslot)
    {
        $workslot = new WorkslotEntity();
        $workslot->set_workslotId($workslotId);
        $workslot->set_date($date);
        $workslot->set_userIdWorkslot($userId_workslot);
        $error = $workslot->assign();

        return $error;
    }
}
?>