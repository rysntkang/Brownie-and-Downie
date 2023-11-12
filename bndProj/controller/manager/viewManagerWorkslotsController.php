<?php

class ViewManagerWorkslotController extends WorkslotEntity
{
    public function viewManagerWorkslot()
    {
        $workslot = new WorkslotEntity();
        $array = $workslot->viewManager();

        return $array;
    }
}
?>