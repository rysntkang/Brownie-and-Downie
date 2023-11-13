<?php
    
class CreateBidController extends BidEntity
{
    public function createBid($workslotId_bids, $date, $userProfileId_bids, $userId_bids, $approval) {
        $bid = new BidEntity();
        $bid->set_workslotIdBids($workslotId_bids);
        $bid->set_date($date);
        $bid->set_userProfileIdBids($userProfileId_bids);
        $bid->set_userIdBids($userId_bids);
        $bid->set_approval($approval);

        $error = $bid->create();
        return $error;
    }
}
?>