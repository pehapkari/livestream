<div class="page-header">
    <h1>Order A Pizza</h1>
</div>

<p>Pizza Order Form</p>

<form action="{{ url("index/placeorder")}}" method="post">

    <select name="pizzaId" size="1">
        <option value="1">Pizza Margherita</option>
        <option value="2">Pizza Salami</option>
        <option value="3">Pizza Greasy Goodness</option>
    </select>
<input type="submit" value="Place Order">
</form>