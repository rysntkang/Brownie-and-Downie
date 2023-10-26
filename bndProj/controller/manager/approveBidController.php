<?php

class ApproveBidController extends BidClass
{
    public static function approveBid($bidId, $approval)
    {
        $bid = new BidClass();
        $bid->set_bidId($bidId);
        $bid->set_approval($approval);
        $error = $bid->approve();

        return $error;
    }
}
?>