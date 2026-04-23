<h1>Create a new order</h1>

<form action="?page=order_store" method="POST" enctype="multipart/form-data" style="max-width: 400px;">
    <div style="margin-bottom: 10px;">
        <label>Clients:</label><br>
        <select name="client_id" required>
            <option value="">-- Choose a client --</option>
            <?php foreach ($customers as $c): ?>
                <option value="<?= $c->client_id ?>">
                    <?= htmlspecialchars($c->name) ?> (ID: <?= $c->client_id ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div style="margin-bottom: 10px;">
        <label>Date:</label><br>
        <input type="date" name="order_date" required style="width: 100%;">
    </div>

    <div style="margin-bottom: 10px;">
        <label>Status:</label><br>
        <select name="status" style="width: 100%;">
            <option value="incomplete">New (incomplete)</option>
            <option value="complete">Complete</option>
        </select>
    </div>

    <div style="margin-bottom: 10px;">
        <label>Review:</label><br>
        <textarea name="comment" style="width: 100%;"></textarea>
    </div>

    <div style="margin-bottom: 10px;">
        <label>Order upload:</label><br>
        <input type="file" name="order_image" accept="image/*">
    </div>

    <button type="submit" style="background: green; color: white; padding: 10px;">Save order</button>
</form>