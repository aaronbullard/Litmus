<?php namespace Aaronbullard\LaravelStripe\Billing;

interface BillingInterface
{
    public function charge(array $data);
    public function createCustomer($token, $email);
    public function chargeCustomer($customerId, $amount, $description = 'BYC');
    public function getCustomer($customerId);
    public function getRepository();
}