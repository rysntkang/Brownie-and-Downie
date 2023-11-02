<?php
    
class CreateBidController extends BidEntity
{
    public function createBid($workslotId, $date, $userProfileId, $userId) {
        $bid = new BidEntity();
        $bid->set_workslotIdBids($workslotId);
        $bid->set_date($date);
        $bid->set_userProfileIdBids($userProfileId);
        $bid->set_userIdBids($userId);
        $bid->set_approval(0);

        $error = $bid->create();
        return $error;
    }
}
?>