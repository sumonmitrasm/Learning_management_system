<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <tr><td>Dear {{$name}}!</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Please click on beloe link to confirm your vendor ccount:-</td></tr>
        <tr><td><a href="{{url('vendor/confirm/'.$code)}}">Confirm Account</a></td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Thanks & Regards</td></tr>
        <tr><td>Daily Shop</td></tr>
    </body>
</html>