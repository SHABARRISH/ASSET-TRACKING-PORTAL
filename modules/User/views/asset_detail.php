<?php
session_start();
if ($_SESSION['role'] !== 'user') {
    header("Location: /ASSET-TRACKING-PORTAL/public/user/login");
    exit;
}

require_once __DIR__ . '/../../../config/database.php';
$db = Database::connect();

$assetId = $_GET['id'];

$stmt = $db->prepare("SELECT * FROM assets WHERE id = ?");
$stmt->execute([$assetId]);
$asset = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$asset) {
    echo "Asset not found";
    exit;
}

$purchaseCost = $asset['cost'];
$salvageValue = $asset['salvage_value'] ?? 0;
$usefulLife   = $asset['useful_life'] ?? 1;

$purchaseDate = new DateTime($asset['purchase_date']);
$today = new DateTime();
$ageYears = $purchaseDate->diff($today)->y;

/* Straight Line Depreciation */
$annualDepreciation = 0;
$currentValue = $purchaseCost;

if ($usefulLife > 0) {
    $annualDepreciation = ($purchaseCost - $salvageValue) / $usefulLife;
    $totalDepreciation = $annualDepreciation * $ageYears;
    $currentValue = max($purchaseCost - $totalDepreciation, $salvageValue);
} else {
    $totalDepreciation = 0;
}

require __DIR__ . '/../../../views/layouts/header.php';
?>

<div class="container mt-5">

    <h2><?= $asset['asset_name']; ?></h2>

    <div class="card-glass p-4 mt-4">

        <p><strong>Purchase Cost:</strong> ₹ <?= number_format($purchaseCost, 2); ?></p>
        <p><strong>Purchase Date:</strong> <?= $asset['purchase_date']; ?></p>
        <p><strong>Age:</strong> <?= $ageYears; ?> Years</p>
        <p><strong>Useful Life:</strong> <?= $usefulLife; ?> Years</p>
        <p><strong>Salvage Value:</strong> ₹ <?= number_format($salvageValue, 2); ?></p>

        <hr>

        <h4>Depreciation Details</h4>

        <p><strong>Annual Depreciation:</strong> ₹ <?= number_format($annualDepreciation, 2); ?></p>
        <p><strong>Total Depreciation:</strong> ₹ <?= number_format($totalDepreciation, 2); ?></p>
        <p><strong>Current Asset Value:</strong> ₹ <?= number_format($currentValue, 2); ?></p>
         
        <hr>
<h4>Update Depreciation Settings</h4>

<form method="POST" action="/ASSET-TRACKING-PORTAL/public/user/update-depreciation">
    <input type="hidden" name="asset_id" value="<?= $asset['id']; ?>">

    <div class="mb-3">
        <label>Useful Life (Years)</label>
        <input type="number" name="useful_life" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Salvage Value</label>
        <input type="number" step="0.01" name="salvage_value" class="form-control" required>
    </div>

    <button class="btn btn-light">Update</button>
</form>

    </div>

</div>

<?php require __DIR__ . '/../../../views/layouts/footer.php'; ?>