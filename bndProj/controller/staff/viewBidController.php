<?php

class ViewBidController extends BidClass
{
    public static function viewBid($username_bids)
    {
        $bid = new BidClass();
        $bid->set_username_bids($username_bids);
        $array = $bid->view();

        return $array;
    }
}
?>