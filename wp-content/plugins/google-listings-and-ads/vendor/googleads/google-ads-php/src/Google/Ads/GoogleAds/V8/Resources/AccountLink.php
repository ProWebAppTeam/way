<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v8/resources/account_link.proto

namespace Google\Ads\GoogleAds\V8\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents the data sharing connection between a Google Ads account and
 * another account
 *
 * Generated from protobuf message <code>google.ads.googleads.v8.resources.AccountLink</code>
 */
class AccountLink extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. Resource name of the account link.
     * AccountLink resource names have the form:
     * `customers/{customer_id}/accountLinks/{account_link_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    protected $resource_name = '';
    /**
     * Output only. The ID of the link.
     * This field is read only.
     *
     * Generated from protobuf field <code>int64 account_link_id = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $account_link_id = null;
    /**
     * The status of the link.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v8.enums.AccountLinkStatusEnum.AccountLinkStatus status = 3;</code>
     */
    protected $status = 0;
    /**
     * Output only. The type of the linked account.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v8.enums.LinkedAccountTypeEnum.LinkedAccountType type = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $type = 0;
    protected $linked_account;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $resource_name
     *           Immutable. Resource name of the account link.
     *           AccountLink resource names have the form:
     *           `customers/{customer_id}/accountLinks/{account_link_id}`
     *     @type int|string $account_link_id
     *           Output only. The ID of the link.
     *           This field is read only.
     *     @type int $status
     *           The status of the link.
     *     @type int $type
     *           Output only. The type of the linked account.
     *     @type \Google\Ads\GoogleAds\V8\Resources\ThirdPartyAppAnalyticsLinkIdentifier $third_party_app_analytics
     *           Immutable. A third party app analytics link.
     *     @type \Google\Ads\GoogleAds\V8\Resources\DataPartnerLinkIdentifier $data_partner
     *           Output only. Data partner link.
     *     @type \Google\Ads\GoogleAds\V8\Resources\GoogleAdsLinkIdentifier $google_ads
     *           Output only. Google Ads link.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V8\Resources\AccountLink::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. Resource name of the account link.
     * AccountLink resource names have the form:
     * `customers/{customer_id}/accountLinks/{account_link_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Immutable. Resource name of the account link.
     * AccountLink resource names have the form:
     * `customers/{customer_id}/accountLinks/{account_link_id}`
     *
     * Generated from protobuf field <code>string resource_name = 1 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setResourceName($var)
    {
        GPBUtil::checkString($var, True);
        $this->resource_name = $var;

        return $this;
    }

    /**
     * Output only. The ID of the link.
     * This field is read only.
     *
     * Generated from protobuf field <code>int64 account_link_id = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int|string
     */
    public function getAccountLinkId()
    {
        return isset($this->account_link_id) ? $this->account_link_id : 0;
    }

    public function hasAccountLinkId()
    {
        return isset($this->account_link_id);
    }

    public function clearAccountLinkId()
    {
        unset($this->account_link_id);
    }

    /**
     * Output only. The ID of the link.
     * This field is read only.
     *
     * Generated from protobuf field <code>int64 account_link_id = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int|string $var
     * @return $this
     */
    public function setAccountLinkId($var)
    {
        GPBUtil::checkInt64($var);
        $this->account_link_id = $var;

        return $this;
    }

    /**
     * The status of the link.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v8.enums.AccountLinkStatusEnum.AccountLinkStatus status = 3;</code>
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of the link.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v8.enums.AccountLinkStatusEnum.AccountLinkStatus status = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V8\Enums\AccountLinkStatusEnum\AccountLinkStatus::class);
        $this->status = $var;

        return $this;
    }

    /**
     * Output only. The type of the linked account.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v8.enums.LinkedAccountTypeEnum.LinkedAccountType type = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Output only. The type of the linked account.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v8.enums.LinkedAccountTypeEnum.LinkedAccountType type = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V8\Enums\LinkedAccountTypeEnum\LinkedAccountType::class);
        $this->type = $var;

        return $this;
    }

    /**
     * Immutable. A third party app analytics link.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v8.resources.ThirdPartyAppAnalyticsLinkIdentifier third_party_app_analytics = 5 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return \Google\Ads\GoogleAds\V8\Resources\ThirdPartyAppAnalyticsLinkIdentifier|null
     */
    public function getThirdPartyAppAnalytics()
    {
        return $this->readOneof(5);
    }

    public function hasThirdPartyAppAnalytics()
    {
        return $this->hasOneof(5);
    }

    /**
     * Immutable. A third party app analytics link.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v8.resources.ThirdPartyAppAnalyticsLinkIdentifier third_party_app_analytics = 5 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param \Google\Ads\GoogleAds\V8\Resources\ThirdPartyAppAnalyticsLinkIdentifier $var
     * @return $this
     */
    public function setThirdPartyAppAnalytics($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V8\Resources\ThirdPartyAppAnalyticsLinkIdentifier::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * Output only. Data partner link.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v8.resources.DataPartnerLinkIdentifier data_partner = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V8\Resources\DataPartnerLinkIdentifier|null
     */
    public function getDataPartner()
    {
        return $this->readOneof(6);
    }

    public function hasDataPartner()
    {
        return $this->hasOneof(6);
    }

    /**
     * Output only. Data partner link.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v8.resources.DataPartnerLinkIdentifier data_partner = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V8\Resources\DataPartnerLinkIdentifier $var
     * @return $this
     */
    public function setDataPartner($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V8\Resources\DataPartnerLinkIdentifier::class);
        $this->writeOneof(6, $var);

        return $this;
    }

    /**
     * Output only. Google Ads link.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v8.resources.GoogleAdsLinkIdentifier google_ads = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V8\Resources\GoogleAdsLinkIdentifier|null
     */
    public function getGoogleAds()
    {
        return $this->readOneof(7);
    }

    public function hasGoogleAds()
    {
        return $this->hasOneof(7);
    }

    /**
     * Output only. Google Ads link.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v8.resources.GoogleAdsLinkIdentifier google_ads = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V8\Resources\GoogleAdsLinkIdentifier $var
     * @return $this
     */
    public function setGoogleAds($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V8\Resources\GoogleAdsLinkIdentifier::class);
        $this->writeOneof(7, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getLinkedAccount()
    {
        return $this->whichOneof("linked_account");
    }

}

