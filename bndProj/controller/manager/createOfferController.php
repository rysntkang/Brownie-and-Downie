<?php
    
class CreateOfferController extends OfferEntity
{
    public function createOffer($workslotId, $date, $userProfileId, $userId) {
        $offer = new OfferEntity();
        $offer->set_workslotIdOffer($workslotId);
        $offer->set_date($date);
        $offer->set_userProfileIdOffer($userProfileId);
        $offer->set_userIdOffer($userId);
        $offer->set_accepted(0);

        $error = $offer->create();
        return $error;
    }
}
?>