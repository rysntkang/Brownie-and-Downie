<?php

class ViewWorkslotController extends WorkslotEntity
{
    public function viewWorkslot()
    {
        $workslot = new WorkslotEntity();
        $array = $workslot->view();

        return $array;
    }
}
?>