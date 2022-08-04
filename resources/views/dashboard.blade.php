<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $data->id }}"></script>

    <title>Document</title>
</head>
<style>
    body {
        background-color: #f6f6f5;
    }
</style>

<body>
    <form action="{{ route('welcome') }}" class="paymentWidgets" data-brands="VISA MASTER MADA"></form>
</body>
<script>
    var wpwlOptions = {
        style: "card"
    }
</script>

</html>
