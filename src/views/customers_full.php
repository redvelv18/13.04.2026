
<h1>Clients and Orders (Full View)</h1>

<ul>
    <?php foreach ($customers as $c): ?>
        <li style="margin-bottom: 15px;">
            <strong><?= htmlspecialchars($c->name ?? 'Unknown') ?></strong>
            (ID: <?= htmlspecialchars($c->client_id) ?>)

            <?php if (!empty($c['orders'])): ?>
                <ul style="margin-top: 5px; color: #555;">
                    <?php foreach ($c->orders as $order): ?>
                        <li>
                            Order #<?= htmlspecialchars($order->id) ?> —
                            Date: <?= htmlspecialchars($order->date) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p style="margin: 0; font-size: 0.9em; color: #999; font-style: italic;">
                    No orders.
                </p>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>