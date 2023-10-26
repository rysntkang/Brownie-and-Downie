<?php

class ViewAvailableWorkSlotController extends WorkSlotClass
{
    public static function viewAvailableWorkslot($role)
    {
        $workslot = new WorkslotClass();
        $workslot->set_role($role);
        $array = $workslot->viewAvailable();

        return $array;
    }
}
?>