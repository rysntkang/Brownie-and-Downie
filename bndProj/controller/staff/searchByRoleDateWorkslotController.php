<?php

class SearchByRoleDateWorkSlotController extends WorkSlotClass
{
    public static function searchByRoleDateWorkslot($role, $date)
    {
        $workslot = new WorkslotClass();
        $workslot->set_role($role);
        $workslot->set_date($date);
        $array = $workslot->searchByRoleDate();

        return $array;
    }
}
?>