<div class="page-header">
    <h1>Order A Pizza</h1>
</div>

{% if order is defined %}
    <p>
        <span>Order ID: </span>{{order['orderId']}}<br />
        <span>Status: </span>{{order['status']}}
    </p>
{% else %}
    <p>Order with id {{orderId}}</p>
{% endif %}