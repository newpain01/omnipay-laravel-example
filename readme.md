## Example Laravel 5.3 Project that implements PayPal through Omnipay

## Installation

```git clone https://github.com/newpain01/omnipay-laravel-example.git```

```composer update```

```php artisan key:generate```

## Configuration

Set `PAYPAL_CLIENT_ID` and `PAYPAL_SECRET` in your `.env` file and you are ready to go

## Usage

Visit ```http://localhost:8000/paypal``` and test

## Expected Result

```
Gateway purchase response data ==
Array
(
    [id] => PAY-8RH32334RU5450584LB3SQ5I
    [create_time] => 2017-01-12T06:55:49Z
    [update_time] => 2017-01-12T06:55:52Z
    [state] => approved
    [intent] => sale
    [payer] => Array
        (
            [payment_method] => credit_card
            [funding_instruments] => Array
                (
                    [0] => Array
                        (
                            [credit_card] => Array
                                (
                                    [type] => visa
                                    [number] => xxxxxxxxxxxx0791
                                    [expire_month] => 1
                                    [expire_year] => 2020
                                    [first_name] => FirstName
                                    [last_name] => LastName
                                    [billing_address] => Array
                                        (
                                            [line1] => 1 Scrubby Creek Road
                                            [city] => Scrubby Creek
                                            [state] => QLD
                                            [postal_code] => 4999
                                            [country_code] => AU
                                        )
                                )
                        )
                )
        )

    [transactions] => Array
        (
            [0] => Array
                (
                    [amount] => Array
                        (
                            [total] => 1.01
                            [currency] => USD
                            [details] => Array
                                (
                                    [subtotal] => 1.01
                               )
                        )

                    [description] => This is a test purchase transaction.
                    [related_resources] => Array
                        (
                            [0] => Array
                                (
                                    [sale] => Array
                                        (
                                            [id] => 6D980440Y6486273P
                                            [create_time] => 2017-01-12T06:55:49Z
                                            [update_time] => 2017-01-12T06:55:52Z
                                            [amount] => Array
                                                (
                                                    [total] => 1.01
                                                    [currency] => USD
                                                )

                                            [state] => completed
                                            [parent_payment] => PAY-8RH32334RU5450584LB3SQ5I
                                            [links] => Array
                                                (
                                                    [0] => Array
                                                        (
                                                            [href] => https://api.sandbox.paypal.com/v1/payments/sale/6D980440Y6486273P
                                                            [rel] => self
                                                            [method] => GET
                                                        )

                                                    [1] => Array
                                                        (
                                                            [href] => https://api.sandbox.paypal.com/v1/payments/sale/6D980440Y6486273P/refund
                                                            [rel] => refund
                                                            [method] => POST
                                                        )

                                                    [2] => Array
                                                        (
                                                            [href] => https://api.sandbox.paypal.com/v1/payments/payment/PAY-8RH32334RU5450584LB3SQ5I
                                                            [rel] => parent_payment
                                                            [method] => GET
                                                        )
                                                )

                                            [fmf_details] => Array
                                                (
                                                )

                                            [processor_response] => Array
                                                (
                                                    [avs_code] => X
                                                    [cvv_code] => M
                                                )
                                        )
                                )
                        )
                )
        )

    [links] => Array
        (
            [0] => Array
                (
                    [href] => https://api.sandbox.paypal.com/v1/payments/payment/PAY-8RH32334RU5450584LB3SQ5I
                    [rel] => self
                    [method] => GET
                )
        )
)
The transaction was successful! Thank You!
```
