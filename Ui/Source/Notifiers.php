<?php

declare(strict_types=1);

namespace MageOS\AsyncEventsAdminUi\Ui\Source;

use \MageOS\AsyncEvents\Service\AsyncEvent\NotifierFactoryInterface;

class Notifiers implements \Magento\Framework\Data\OptionSourceInterface
{
    public function __construct(private readonly NotifierFactoryInterface $notifierFactory) {}

    /**
     * @return array[]
     */
    public function toOptionArray()
    {
        $options = [];

        foreach ($this->notifierFactory->getSinks() as $sink) {
            $options[] = [
                'value' => $sink,
                'label' => $sink,
            ];
        }

        return $options;
    }
}
