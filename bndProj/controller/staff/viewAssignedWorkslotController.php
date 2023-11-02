<?php

class ViewAssignedWorkSlotController extends WorkSlotEntity
{
    public function viewAssignedWorkslot($userId)
    {
        $workslot = new WorkslotEntity();
        $workslot->set_userIdWorkslot($userId);
        $array = $workslot->viewAssigned();

        return $array;
    }
}
?>