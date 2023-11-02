<?php

class SearchByRoleDateWorkSlotController extends WorkSlotEntity
{
    public function searchByRoleDateWorkslot($userProfileId, $date)
    {
        $workslot = new WorkslotEntity();
        $workslot->set_userProfileIdWorkslot($userProfileId);
        $workslot->set_date($date);
        $array = $workslot->searchByRoleDate();

        return $array;
    }
}
?>