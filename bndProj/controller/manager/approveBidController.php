<?php

class ApproveBidController extends BidEntity
{
    public function approveBid($bidId, $workslotId_bids, $date, $userId_bids, $approval)
    {
        $bid = new BidEntity();
        $bid->set_bidId($bidId);
        $bid->set_workslotIdBids($workslotId_bids);
        $bid->set_date($date);
        $bid->set_userIdBids($userId_bids);
        $bid->set_approval($approval);
        $error = $bid->approve();

        return $error;
    }
}
?>