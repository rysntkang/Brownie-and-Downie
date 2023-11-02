<?php

class ViewStaffBidController extends BidEntity
{
    public static function viewStaffBid($userId)
    {
        $bid = new BidEntity();
        $bid->set_userIdBids($userId);
        $array = $bid->viewStaff();

        return $array;
    }
}
?>