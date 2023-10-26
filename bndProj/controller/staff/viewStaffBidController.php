<?php

class ViewStaffBidController extends BidClass
{
    public static function viewStaffBid($username_bids)
    {
        $bid = new BidClass();
        $bid->set_username_bids($username_bids);
        $array = $bid->viewStaff();

        return $array;
    }
}
?>