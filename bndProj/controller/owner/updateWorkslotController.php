<?php

class UpdateWorkslotController extends WorkslotEntity
{
    public function updateWorkslot($workslotId, $date, $userProfileId) {
        $workslot = new WorkslotEntity();
        $workslot->set_workslotId($workslotId);
        $workslot->set_date($date);
        $workslot->set_userProfileIdWorkslot($userProfileId);

        $error = $workslot->update();
        return $error;
    }
}
?>