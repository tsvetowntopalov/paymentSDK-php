<?php

/* Shop System SDK:
 * - Terms of Use can be found under:
 * https://github.com/wirecard/paymentSDK-php/blob/master/_TERMS_OF_USE
 * - License can be found under:
 * https://github.com/wirecard/paymentSDK-php/blob/master/LICENSE
 */

namespace Page;

use Facebook\WebDriver\Exception\NoSuchElementException;

class PayPalReview extends Base
{
    //page specific text that can be found in the URL
    public $pageSpecific = 'checkout';

    //page elements
    public $elements = array(
        'Continue' => "//*[@id='button']",
        'Pay Now' => "//*[@id='confirmButtonTop']",
        'Accept Cookies' => "//*[@id='acceptAllButton']",
        'Transaction Identification' => "//div[contains(@class, 'content')]/a"
    );

    /**
     * Method acceptCookies
     *
     * @since 4.0.1
     */
    public function acceptCookies()
    {
        $I = $this->tester;

        try {
            $I->waitForElement($this->getElement('Accept Cookies'), 15);
            $I->waitForElementVisible($this->getElement('Accept Cookies'), 15);
            $I->waitForElementClickable($this->getElement('Accept Cookies'), 60);
            $I->click($this->getElement('Accept Cookies'));
        } catch (NoSuchElementException $e) {
            $I->seeInCurrentUrl($this->getPageSpecific());
        }
    }

    /**
     * Method payNow
     *
     * @since 4.0.1
     */
    public function payNow()
    {
        $I = $this->tester;

        $I->wait(1);
        try {
            $I->waitForElementVisible($this->getElement('Pay Now'), 60); // secs
            $I->waitForElementClickable($this->getElement('Pay Now'), 60);
            $I->click($this->getElement('Pay Now'));
        } catch (NoSuchElementException $e) {
            $I->seeInCurrentUrl($this->getPageSpecific());
        }
    }
}
