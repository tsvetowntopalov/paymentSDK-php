<?php
// # SEPA amount reservation
// The method `reserve` of the _transactionService_ provides the means
// to reserve an amount (also known as authorization).

// ## Required objects
// To include the necessary files, use the composer for PSR-4 autoloading.
require __DIR__ . '/../../vendor/autoload.php';

use Wirecard\PaymentSdk\Config;
use Wirecard\PaymentSdk\Entity\AccountHolder;
use Wirecard\PaymentSdk\Response\FailureResponse;
use Wirecard\PaymentSdk\Entity\Money;
use Wirecard\PaymentSdk\Response\SuccessResponse;
use Wirecard\PaymentSdk\Transaction\SepaTransaction;
use Wirecard\PaymentSdk\TransactionService;

// ### Config
// #### Basic configuration
// The basic configuration requires the base URL for Wirecard and the username and password for the HTTP requests.
$baseUrl = 'https://api-test.wirecard.com';
$httpUser = '70000-APITEST-AP';
$httpPass = 'qD2wzQ_hrc!8';

// The configuration is stored in an object, containing the connection settings set above.
// A default currency can also be provided.
$config = new Config\Config($baseUrl, $httpUser, $httpPass, 'EUR');

// SEPA configuration
// Create and add a configuration object with the settings for SEPA.
$sepaMId = '4c901196-eff7-411e-82a3-5ef6b6860d64';
$sepaKey = 'ecdf5990-0372-47cd-a55d-037dccfe9d25';
// For reserve transactions you can use a PaymentConfig object or a SepaConfig object as well.
$sepaConfig = new Config\SepaConfig($sepaMId, $sepaKey);
$config->add($sepaConfig);

// ### Transaction related objects

// Create a money object as amount which has to be payed by the consumer.
$amount = new Money(7, 'EUR');

$accountHolder = new AccountHolder('Doe');
$accountHolder->setFirstName('Jane');


// ## Transaction

// Create a `SepaTransaction` object, which contains all relevant data for the payment process.
$transaction = new SepaTransaction();
$transaction->setAmount($amount);
$transaction->setIban($_POST['iban']);
if (null !== $_POST['bic']) {
    $transaction->setBic($_POST['bic']);
}
$transaction->setAccountHolder($accountHolder);

// ### Transaction Service
// The service is used to execute the reservation (authorization) operation itself. A response object is returned.
$transactionService = new TransactionService($config);
$response = $transactionService->reserve($transaction);


// ## Response handling

// The response from the service can be used for disambiguation.
// In case of a successful transaction, a `SuccessResponse` object is returned.
if ($response instanceof SuccessResponse) {
    echo sprintf('Payment with id %s successfully completed.<br>', $response->getTransactionId());
    $txDetailsLink = sprintf(
        'https://api-test.wirecard.com/engine/rest/merchants/%s/payments/%s',
        $sepaMId,
        $response->getTransactionId()
    );
    ?>

    <a href="<?= $txDetailsLink ?>">View transaction details</a>
    <br>
    <form action="pay.php" method="post">
        <input type="hidden" name="parentTransactionId" value="<?= $response->getTransactionId() ?>"/>
        <label for="amount">Amount:</label><br>
        <input id="amount" name="amount" style="width:100px" />
        <p>
            <input type="submit" value="Execute a new payment based on this">
        </p>
    </form>
    <?php
// In case of a failed transaction, a `FailureResponse` object is returned.
} elseif ($response instanceof FailureResponse) {
    // In our example we iterate over all errors and display them in a raw state.
    // You should handle them based on the given severity as error, warning or information.
    foreach ($response->getStatusCollection() as $status) {
        /**
         * @var $status \Wirecard\PaymentSdk\Entity\Status
         */
        $severity = ucfirst($status->getSeverity());
        $code = $status->getCode();
        $description = $status->getDescription();
        echo sprintf('%s with code %s and message "%s" occured.<br>', $severity, $code, $description);
    }
}
