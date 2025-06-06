<h2>Order Status</h2>
<p>Address: {{ $order->address }}</p>
<p>Pin Code: {{ $order->pin_code }}</p>
<p>Status: {{ ucfirst($order->status) }}</p>

<!-- Admin can update the status -->
<form action="{{ route('order.updateStatus', $order->id) }}" method="POST">
    @csrf
    <select name="status">
        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="approved" {{ $order->status == 'approved' ? 'selected' : '' }}>Approved</option>
        <option value="shipping" {{ $order->status == 'shipping' ? 'selected' : '' }}>Shipping</option>
        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
    </select>
    <button type="submit">Update Status</button>
</form>
