<?php

class ViewManagerBidController extends BidEntity
{
    public function viewManagerBid()
    {
        $bid = new BidEntity();
        $array = $bid->viewManager();

        return $array;
    }
}
?>