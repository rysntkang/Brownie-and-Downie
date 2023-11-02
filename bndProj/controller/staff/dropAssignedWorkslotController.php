<?php
    
class DropAssignedWorkslotController extends WorkslotEntity
{
    public function dropAssignedWorkslot($workslotId) {
        $workslot = new WorkslotEntity();
        $workslot->set_workslotId($workslotId);

        $error = $workslot->dropAssigned();
        return $error;
    }
}
?>