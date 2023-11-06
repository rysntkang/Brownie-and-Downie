<?php

class CreateWorkslotController extends WorkslotEntity
{
    public function createWorkslot($date, $userProfileId_workslot) {
        $workslot = new WorkslotEntity();
        $workslot->set_date($date);
        $workslot->set_userProfileIdWorkslot($userProfileId_workslot);

        $error = $workslot->create();
        return $error;
    }
}
?>