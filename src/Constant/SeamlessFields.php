<?php
/**
 * Shop System SDK:
 * - Terms of Use can be found under:
 * https://github.com/wirecard/paymentSDK-php/blob/master/_TERMS_OF_USE
 * - License can be found under:
 * https://github.com/wirecard/paymentSDK-php/blob/master/LICENSE
 */

namespace Wirecard\PaymentSdk\Constant;

/**
 * Contains mappable fields for the seamless form
 *
 * Class SeamlessFields
 * @package Wirecard\PaymentSdk\Constant
 * @since 4.0.0
 */
class SeamlessFields
{
    const MERCHANT_ACCOUNT_ID = 'merchant_account_id';
    const TRANSACTION_ID = 'transaction_id';
    const TRANSACTION_STATE = 'transaction_state';
    const TRANSACTION_TYPE = 'transaction_type';
    const PAYMENT_METHOD = 'payment_method';
    const REQUEST_ID = 'request_id';
    const NONCE3D = 'nonce3d';

    const REQUESTED_AMOUNT = 'requested_amount';
    const REQUESTED_AMOUNT_CURRENCY = 'requested_amount_currency';

    const ACS_URL = 'acs_url';
    const PAREQ = 'pareq';
    const CARDHOLDER_AUTHENTICATION_STATUS = 'cardholder_authentication_status';

    const PARENT_TRANSACTION_ID = 'parent_transaction_id';

    const EXPIRATION_MONTH = 'expiration_month';
    const EXPIRATION_YEAR = 'expiration_year';
    const CARD_TYPE = 'card_type';
    const TOKEN_ID = 'token_id';
    const MASKED_ACCOUNT_NUMBER = 'masked_account_number';

    const PROCESSING_URL = 'notification_url_1';

    const ACCOUNT_HOLDER_FIRST_NAME = 'first_name';
    const ACCOUNT_HOLDER_LAST_NAME = 'last_name';
    const ACCOUNT_HOLDER_EMAIL = 'email';
    const ACCOUNT_HOLDER_PHONE = 'phone';
    const ACCOUNT_HOLDER_MOBILE_PHONE = 'mobile_phone';
    const ACCOUNT_HOLDER_WORK_PHONE = 'work_phone';
    const ACCOUNT_HOLDER_DATE_OF_BIRTH = 'date_of_birth';
    const ACCOUNT_HOLDER_CRM_ID = 'crm_id';
    const ACCOUNT_HOLDER_GENDER = 'gender';
    const ACCOUNT_HOLDER_SHIPPING_METHOD = 'shipping_method';
    const ACCOUNT_HOLDER_SOCIAL_SECURITY_NUMBER = 'social_security_number';
    const ACCOUNT_HOLDER_COUNTRY = 'country';
    const ACCOUNT_HOLDER_STATE = 'state';
    const ACCOUNT_HOLDER_CITY = 'city';
    const ACCOUNT_HOLDER_STREET_1 = 'street1';
    const ACCOUNT_HOLDER_STREET_2 = 'street2';
    const ACCOUNT_HOLDER_STREET_3 = 'street3';
    const ACCOUNT_HOLDER_POSTAL_CODE = 'postal_code';
    const ACCOUNT_HOLDER_HOUSE_EXTENSION = 'house_extension';
}
