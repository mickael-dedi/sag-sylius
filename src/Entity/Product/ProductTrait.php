<?php

declare(strict_types=1);

namespace Dedi\SyliusSAGPlugin\Entity\Product;

use Dedi\SyliusSAGPlugin\Entity\Review\ProductReviewInterface;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Review\Model\ReviewInterface;

trait ProductTrait
{
    public function getAcceptedReviewsByCountryCode(
        string $countryCode
    ): Collection {
        return $this->reviews->filter(function (ProductReviewInterface $review) use($countryCode) : bool {
            return
                ReviewInterface::STATUS_ACCEPTED === $review->getStatus() &&
                $countryCode === $review->getSAGCountryCode()
            ;
        });
    }
}
