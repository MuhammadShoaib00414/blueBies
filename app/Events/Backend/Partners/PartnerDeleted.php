<?php

namespace App\Events\Backend\Partners;

use Illuminate\Queue\SerializesModels;

/**
 * Class PartnerDeleted.
 */
class PartnerDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $partner;

    /**
     * @param $partner
     */
    public function __construct($partner)
    {
        $this->partner = $partner;
    }
}
