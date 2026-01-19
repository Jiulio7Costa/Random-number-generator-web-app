<?php
// PHP LOGIC
$results = [];
$total = 0;
if (isset($_POST['roll'])) {
    $count = $_POST['dice_count'];
    $sides = $_POST['dice_type'];
    for ($i = 0; $i < $count; $i++) {
        $val = rand(1, $sides);
        $results[] = $val;
        $total += $val;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dice RNG</title>
    <style>
        body { font-family: system-ui; display: flex; justify-content: center; padding: 50px; background: #f0f2f5; }
        .card { background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        input, select, button { width: 100%; padding: 10px; margin: 10px 0; border-radius: 6px; border: 1px solid #ddd; }
        button { background: #0070f3; color: white; border: none; cursor: pointer; font-weight: bold; }
        .die { display: inline-block; width: 40px; height: 40px; line-height: 40px; text-align: center; background: #eee; margin: 5px; border-radius: 4px; border: 1px solid #ccc; font-weight: bold; }
    </style>
</head>
<body>
    <div class="card">
        <h2>🎲 Dice Roller</h2>
        <form method="POST">
            <input type="number" name="dice_count" placeholder="Number of dice" min="1" required>
            <select name="dice_type">
                <option value="6">d6 (Standard)</option>
                <option value="20">d20 (D&D)</option>
                <option value="10">d10</option>
            </select>
            <button type="submit" name="roll">Roll Dice</button>
        </form>

        <?php if (!empty($results)): ?>
            <hr>
            <h3>Total: <?php echo $total; ?></h3>
            <div>
                <?php foreach ($results as $res): ?>
                    <span class="die"><?php echo $res; ?></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>