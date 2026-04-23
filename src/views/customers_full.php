
<h1>Klienti un Pasūtījumi (Full View)</h1>

<ul>
    <?php foreach ($customers as $c): ?>
        <li style="margin-bottom: 15px;">
            <strong><?= htmlspecialchars($c->name ?? 'Unknown') ?></strong>
            (ID: <?= htmlspecialchars($c->client_id) ?>)

            <?php if (!empty($c['orders'])): ?>
                <ul style="margin-top: 5px; color: #555;">
                    <?php foreach ($c->orders as $order): ?>
                        <li>
                            Pasūtījums #<?= htmlspecialchars($order->id) ?> —
                            Datums: <?= htmlspecialchars($order->date) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p style="margin: 0; font-size: 0.9em; color: #999; font-style: italic;">
                    Nav pasūtījumu.
                </p>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>