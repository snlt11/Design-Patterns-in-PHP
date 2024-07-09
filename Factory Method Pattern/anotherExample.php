<?php

interface paymentMethod
{
    public function pay($amount);
}

class Paypal implements paymentMethod
{
    public function pay($amount): void
    {
        echo "Payment with PayPal. Amount: $amount";
    }
}

class CreditCard implements paymentMethod
{
    public function pay($amount): void
    {
        echo "Payment with Credit Card. Amount: $amount";
    }
}

abstract class PaymentGateway
{
    abstract public function makePayment(string $type);
}

class StripePaymentGateway extends PaymentGateway
{
    /**
     * @throws Exception
     */
    public function makePayment(string $type): CreditCard|Paypal
    {
        return match ($type) {
            'paypal' => new PayPal(),
            'credit_card' => new CreditCard(),
            default => throw new Exception('Invalid payment method'),
        };
    }
}

function processPayment(paymentMethod $method, $amount): void
{
    $method->pay($amount);
}

$payment = new StripePaymentGateway();
try {
    $paypal = $payment->makePayment('paypal');
} catch (Exception $e) {
    echo $e->getMessage();
}
processPayment($paypal, 100);
