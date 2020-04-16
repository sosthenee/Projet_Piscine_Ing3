
Update payment info

<form method="POST" action="/payment/update/{{$payment_info->id}}">
    {{ csrf_field() }}
    {{ method_field("PUT") }}


    <input type="text" value={{ $payment_info->cardType}} name="cardType" required>
    <input type="text" value={{ $payment_info->cardNumber}} name="cardNumber" required>
    <input type="text" value={{ $payment_info->cardName}}  name="cardName" required>
    <input type="date" value={{ $payment_info->expirationDate}} name="expirationDate" required>
    <input type="number" value={{ $payment_info->securityCode}} name="securityCode" required>

    <button style="primary" type="submit" >Update</button>
    
</form>
