<?php

class ViewAssignedWorkSlotController extends WorkSlotEntity
{
    public function viewAssignedWorkslot($userId_workslot)
    {
        $workslot = new WorkslotEntity();
        $workslot->set_userIdWorkslot($userId_workslot);
        $array = $workslot->viewAssigned();

        return $array;
    }
}
?>