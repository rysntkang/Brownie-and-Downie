<?php
    
class CreateBidController extends BidClass
{
    public static function createBid($workslotId, $date, $role, $username_bids) {
        $bid = new BidClass();
        $bid->set_workslotId($workslotId);
        $bid->set_date($date);
        $bid->set_role($role);
        $bid->set_username_bids($username_bids);
        $bid->set_approval(0);

        $error = $bid->create();
        return $error;
    }
}
?>