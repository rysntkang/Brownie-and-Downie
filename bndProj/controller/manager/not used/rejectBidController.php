<?php

class RejectBidController extends BidEntity
{
    public function rejectBid($bidId, $approval)
    {
        $bid = new BidEntity();
        $bid->set_bidId($bidId);
        $bid->set_approval($approval);
        $error = $bid->reject();

        return $error;
    }
}
?>