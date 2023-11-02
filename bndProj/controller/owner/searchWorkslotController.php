<?php

class SearchWorkslotController extends WorkslotEntity
{
    public function searchWorkslot($date) {
        $workslot = new WorkslotEntity();
        $workslot->set_date($date);

        $error = $workslot->search();
        return $error;
    }
}
?>