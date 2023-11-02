<?php

class DeleteWorkslotController extends WorkslotEntity
{
    public function deleteWorkslot($workslotId) {
        $workslot = new WorkslotEntity();
        $workslot->set_workslotId($workslotId);

        $error = $workslot->delete();
        return $error;
    }
}
?>
