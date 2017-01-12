<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Credit Card Payment</title>
    </head>

    <body>
        <div class="flex-center position-ref full-height">
            <form id="myCCForm" action="paypal" method="POST">
                {{ csrf_field() }}
                <input name="ccNo" type="text" value="4032034115320791" autocomplete="off" required />
                <input name="expMonth" type="text" size="2" required value="01"/>
                <input name="expYear" type="text" size="4" required value="2020"/>
                <input name="cvv" type="text" value="123" required />
                <input type="submit" value="Submit Payment" />
            </form>
        </div>
    </body>
</html>
