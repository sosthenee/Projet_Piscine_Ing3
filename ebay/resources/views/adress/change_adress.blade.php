
Update adress info

<form method="POST" action="/adress/update/{{$delivery_addresses->id}}">
    {{ csrf_field() }}
    {{ method_field("PUT") }}

    <li> {{ $delivery_addresses->firstName}} </li>
    <li> {{ $delivery_addresses->lastName}} </li>
    <li> {{ $delivery_addresses->phoneNumber}} </li>
    <li> {{ $delivery_addresses->number}} </li>
    <li> {{ $delivery_addresses->street}} </li>
    <li> {{ $delivery_addresses->city}} </li>
    <li> {{ $delivery_addresses->postCode}} </li>
    <li> {{ $delivery_addresses->country}} </li>

    <input type="text" value={{ $delivery_addresses->firstName}} name="firstName" required>
    <input type="text" value={{ $delivery_addresses->lastName}} name="lastName" required>
    <input type="number" value={{ $delivery_addresses->phoneNumber}}  name="phoneNumber" required>
    <input type="number" value={{ $delivery_addresses->number}} name="number" required>
    <input type="text" value={{ $delivery_addresses->street}}  name="street" required>
    <input type="text" value={{ $delivery_addresses->city}}  name="city" required>
    <input type="number" value={{ $delivery_addresses->postCode}} name="postCode" required>
    <input type="text" value={{ $delivery_addresses->country}}  name="country" required>
        
    <button style="primary" type="submit" >Update</button>
    
</form>
