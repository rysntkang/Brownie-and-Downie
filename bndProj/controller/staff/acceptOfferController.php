<?php

class AcceptOfferController extends OfferEntity
{
    public function acceptOffer($offerId, $workslotId_offer, $date, $userId_offer, $accepted)
    {
        $offer = new OfferEntity();
        $offer->set_offerId($offerId);
        $offer->set_workslotIdOffer($workslotId_offer);
        $offer->set_date($date);
        $offer->set_userIdOffer($userId_offer);
        $offer->set_accepted($accepted);
        $error = $offer->accept();

        return $error;
    }
}
?>