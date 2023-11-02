<?php

class ViewAvailableWorkSlotController extends WorkSlotEntity
{
    public function viewAvailableWorkslot($userProfileId)
    {
        $workslot = new WorkslotEntity();
        $workslot->set_userProfileIdWorkslot($userProfileId);
        $array = $workslot->viewAvailable();

        return $array;
    }
}
?>