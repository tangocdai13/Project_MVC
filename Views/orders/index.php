<h2>Order List</h2>
<a href="index.php?controller=order&action=create">Create Order</a>
<br/>
<table width='800' border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Amount</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    <?php foreach ($orders as $order): ?>
        <tr>
            <td><?= $order->id ?></td>
            <td><?= $order->name ?></td>
            <td><?= $order->amount ?></td>
            <td><?= $order->price ?></td>
            <td>
                <a href="index.php?controller=order&action=edit&id=<?= $order->id ?>">Sửa</a>
                <a onclick="return confirm('bạn có thực sự muốn xóa không?')" href="index.php?controller=order&action=delete&id=<?= $order->id ?>">Xóa</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>