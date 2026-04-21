<h1>Visi Pasūtījumi <?= isset($_GET['status']) ? " - " . htmlspecialchars($_GET['status']) : "" ?></h1>

<div style="margin-bottom: 20px;">
    <strong>Filtrēt pēc statusa:</strong>
    <a href="?page=all_orders">Visi</a> |
    <a href="?page=all_orders&status=complete">Pabeigti</a> |
    <a href="?page=all_orders&status=incomplete">Jauni</a> |
</div>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Klients</th>
            <th>Datums</th>
            <th>Statuss</th>
            <th>Komentārs</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= htmlspecialchars($order['order_id']) ?></td>
                <td><?= htmlspecialchars($order['client_name'] ?? 'Nav piesaistīts') ?></td>
                <td><?= htmlspecialchars($order['order_date']) ?></td>
                <td><?= htmlspecialchars($order['status']) ?></td>
                <td><?= htmlspecialchars($order['comment'] ?? 'no comment') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<br>
