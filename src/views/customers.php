

<h1>Klienti</h1>
<table border='1'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Vārds</th>
            <th>E-pasts</th>
            <th>Pasūtījumi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($customers as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row->client_id) ?></td>
                <td><?= htmlspecialchars($row->name) ?></td>
                <td><?= htmlspecialchars($row->email) ?></td>
                <td>
                    <a href="?page=orders&client_id=<?= $row->client_id ?>">View Orders</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>