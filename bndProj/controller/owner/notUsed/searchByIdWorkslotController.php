<?php

class SearchByIdWorkslotController extends WorkslotEntity
{
    public function searchByIdWorkslot($workslotId) {
        $workslot = new WorkslotEntity();
        $workslot->set_workslotId($workslotId);

        $error = $workslot->searchById();
        return $error;
    }
}
?>