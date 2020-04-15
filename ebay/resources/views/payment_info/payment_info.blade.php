

@foreach ($payement_infos as $payment_info)
<li> {{ $payment_info->cardType}} </li>
<li> {{ $payment_info->cardNumber}} </li>
<li> {{ $payment_info->cardName}} </li>
<li> {{ $payment_info->expirationDate}} </li>
<li> {{ $payment_info->securityCode}} </li>
@endforeach