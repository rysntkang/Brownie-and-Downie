<?php

class ViewWorkSlotController extends WorkSlotClass
{
    public static function viewWorkslot()
    {
        $workslot = new WorkslotClass();
        $array = $workslot->view();

        return $array;
    }
}
?>