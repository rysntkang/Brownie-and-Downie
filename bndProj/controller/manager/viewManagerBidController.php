<?php

class ViewManagerBidController extends BidClass
{
    public static function viewManagerBid()
    {
        $bid = new BidClass();
        $array = $bid->viewManager();

        return $array;
    }
}
?>