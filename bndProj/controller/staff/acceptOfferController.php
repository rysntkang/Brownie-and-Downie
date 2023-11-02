<?php

class AcceptOfferController extends OfferEntity
{
    public function acceptOffer($offerId, $accepted)
    {
        $offer = new OfferEntity();
        $offer->set_offerId($offerId);
        $offer->set_accepted($accepted);
        $error = $offer->accept();

        return $error;
    }
}
?>