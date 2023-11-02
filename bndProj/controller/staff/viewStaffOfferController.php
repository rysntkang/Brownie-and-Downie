<?php

class ViewStaffOfferController extends OfferEntity
{
    public function viewStaffOffer($userId_offer)
    {
        $offer = new OfferEntity();
        $offer->set_userIdOffer($userId_offer);
        $array = $offer->viewStaff();

        return $array;
    }
}
?>