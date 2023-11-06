<?php

class ViewAvailableWorkSlotController extends WorkSlotEntity
{
    public function viewAvailableWorkslot($userProfileId_workslot)
    {
        $workslot = new WorkslotEntity();
        $workslot->set_userProfileIdWorkslot($userProfileId_workslot);
        $array = $workslot->viewAvailable();

        return $array;
    }
}
?>