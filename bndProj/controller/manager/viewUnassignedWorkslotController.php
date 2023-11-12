<?php

class ViewUnassignedWorkslotController extends WorkslotEntity
{
    public function viewUnassignedWorkslot()
    {
        $workslot = new WorkslotEntity();
        $array = $workslot->viewUnassigned();

        return $array;
    }
}
?>