<?php

/*
 * List of events:
 * https://www.nicksays.co.uk/magento-events-cheat-sheet-1-9/
 */
class Mycompany_Observerworld_Model_Observer
{
    public function savingCmsPage(Varien_Event_Observer $observer)
    {
        $event = $observer->getEvent();
        $page = $event->getPage();
        echo '<pre>';
        print_r($page->getData());
        die;
    }

    public function processingMyEvent(Varien_Event_Observer $observer)
    {
        $event = $observer->getEvent();
        echo $event->getId();
        die;
    }
}