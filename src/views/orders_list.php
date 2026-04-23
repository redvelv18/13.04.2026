<h1>All orders <?= isset($_GET['status']) ? " - " . htmlspecialchars($_GET['status']) : "" ?></h1>

<div style="margin-bottom: 20px;">
    <strong>Filter by status:</strong>
    <a href="?page=all_orders">All</a> |
    <a href="?page=all_orders&status=complete">Complete</a> |
    <a href="?page=all_orders&status=incomplete">Incomplete</a> |
</div>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Client</th>
            <th>Date</th>
            <th>Status</th>
            <th>Review</th>
            <th>Uploads</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= htmlspecialchars($order->order_id ?? '') ?></td>
                <td><?= htmlspecialchars($order->client_name ?? 'Not added') ?></td>
                <td><?= htmlspecialchars($order->order_date ?? '') ?></td>
                <td><?= htmlspecialchars($order->status ?? '') ?></td>
                <td><?= htmlspecialchars($order->comment ?? 'no comment') ?></td>
                <td>
                    <?php if ($order->image_path): ?>
                        <a href="uploads/<?= $order->image_path ?>" target="_blank" style="padding: 5px;">
                            View image
                        </a>
                    <?php else: ?>
                        No image
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div style="margin-bottom: 20px;">
    <a href="?page=order_create">
        + New order
    </a>
</div>
<br>