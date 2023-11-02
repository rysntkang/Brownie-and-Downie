<?php

class CreateWorkslotController extends WorkslotEntity
{
    public function createWorkslot($date, $userProfileId) {
        $workslot = new WorkslotEntity();
        $workslot->set_date($date);
        $workslot->set_userProfileIdWorkslot($userProfileId);

        $error = $workslot->create();
        return $error;
    }
}
?>