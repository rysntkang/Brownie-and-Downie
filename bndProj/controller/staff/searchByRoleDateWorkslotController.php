<?php

class SearchByRoleDateWorkSlotController extends WorkSlotEntity
{
    public function searchByRoleDateWorkslot($userProfileId_workslot, $date)
    {
        $workslot = new WorkslotEntity();
        $workslot->set_userProfileIdWorkslot($userProfileId_workslot);
        $workslot->set_date($date);
        $array = $workslot->searchByRoleDate();

        return $array;
    }
}
?>