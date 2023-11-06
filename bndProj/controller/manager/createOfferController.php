<?php
    
class CreateOfferController extends OfferEntity
{
    public function createOffer($workslotId_offer, $date, $userProfileId_offer, $userId_offer) {
        $offer = new OfferEntity();
        $offer->set_workslotIdOffer($workslotId_offer);
        $offer->set_date($date);
        $offer->set_userProfileIdOffer($userProfileId_offer);
        $offer->set_userIdOffer($userId_offer);
        $offer->set_accepted(0);

        $error = $offer->create();
        return $error;
    }
}
?>