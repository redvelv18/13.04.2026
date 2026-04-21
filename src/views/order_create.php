<h1>Izveidot jaunu pasūtījumu</h1>

<form action="?page=order_store" method="POST" style="max-width: 400px;">
    <div style="margin-bottom: 10px;">
        <label>Klients:</label><br>
        <select name="client_id" required>
    <option value="">-- Izvēlies klientu --</option>
    <?php foreach ($customers as $c): ?>
        <option value="<?= $c['client_id'] ?>">
            <?= htmlspecialchars($c['name']) ?> (ID: <?= $c['client_id'] ?>)
        </option>
    <?php endforeach; ?>
</select>
    </div>

    <div style="margin-bottom: 10px;">
        <label>Datums:</label><br>
        <input type="date" name="order_date" required style="width: 100%;">
    </div>

    <div style="margin-bottom: 10px;">
        <label>Statuss:</label><br>
        <select name="status" style="width: 100%;">
            <option value="incomplete">Jauns</option>
            <option value="complete">Pabeigts</option>
        </select>
    </div>

    <div style="margin-bottom: 10px;">
        <label>Komentārs:</label><br>
        <textarea name="comment" style="width: 100%;"></textarea>
    </div>

    <button type="submit" style="background: green; color: white; padding: 10px;">Saglabāt pasūtījumu</button>
</form>