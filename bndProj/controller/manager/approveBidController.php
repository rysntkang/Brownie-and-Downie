<?php

class ApproveBidController extends BidEntity
{
    public function approveBid($bidId, $approval)
    {
        $bid = new BidEntity();
        $bid->set_bidId($bidId);
        $bid->set_approval($approval);
        $error = $bid->approve();

        return $error;
    }
}
?>