<h1>Visi Pasūtījumi</h1>

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
<a href="?page=clients">Atpakaļ uz klientu sarakstu</a>