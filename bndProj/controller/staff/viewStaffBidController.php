<?php

class ViewStaffBidController extends BidEntity
{
    public static function viewStaffBid($userId_bids)
    {
        $bid = new BidEntity();
        $bid->set_userIdBids($userId_bids);
        $array = $bid->viewStaff();

        return $array;
    }
}
?>