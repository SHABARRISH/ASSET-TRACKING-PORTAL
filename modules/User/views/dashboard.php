<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: /ASSET-TRACKING-PORTAL/public/user/login");
    exit;
}

require_once __DIR__ . '/../../../config/database.php';
$db = Database::connect();
$userId = $_SESSION['user_id'];

/* =========================
   FETCH USER OWNED ASSETS
========================= */
$ownedAssets = $db->prepare("
    SELECT a.* FROM assets a
    JOIN user_assets ua ON a.id = ua.asset_id
    WHERE ua.user_id = ? AND ua.type = 'buy'
");
$ownedAssets->execute([$userId]);
$ownedAssets = $ownedAssets->fetchAll(PDO::FETCH_ASSOC);

/* =========================
   FETCH USER RENTED ASSETS
========================= */
$rentedAssets = $db->prepare("
    SELECT a.*, ua.rent_start, ua.rent_end FROM assets a
    JOIN user_assets ua ON a.id = ua.asset_id
    WHERE ua.user_id = ? AND ua.type = 'rent'
");
$rentedAssets->execute([$userId]);
$rentedAssets = $rentedAssets->fetchAll(PDO::FETCH_ASSOC);

/* =========================
   CATEGORY STATS
========================= */
$categoryStats = $db->prepare("
    SELECT category, COUNT(*) as total FROM assets a
    JOIN user_assets ua ON a.id = ua.asset_id
    WHERE ua.user_id = ?
    GROUP BY category
");
$categoryStats->execute([$userId]);
$categoryStats = $categoryStats->fetchAll(PDO::FETCH_ASSOC);

/* =========================
   STATUS STATS
========================= */
$statusStats = $db->prepare("
    SELECT status, COUNT(*) as total FROM assets a
    JOIN user_assets ua ON a.id = ua.asset_id
    WHERE ua.user_id = ?
    GROUP BY status
");
$statusStats->execute([$userId]);
$statusStats = $statusStats->fetchAll(PDO::FETCH_ASSOC);

/* =========================
   MAINTENANCE DUE (Next 30 Days)
========================= */
$maintenanceDue = $db->prepare("
    SELECT * FROM assets
    WHERE warranty_expiry BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY)
");
$maintenanceDue->execute();
$maintenanceDue = $maintenanceDue->fetchAll(PDO::FETCH_ASSOC);

/* =========================
   HIGH MAINTENANCE COST (Threshold ₹50,000)
========================= */
$highCostAssets = $db->query("
    SELECT * FROM assets WHERE cost >= 50000
")->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/../../../views/layouts/header.php';
?>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>User Dashboard</h2>
        <a href="/ASSET-TRACKING-PORTAL/public/user/assets" class="btn btn-light">
            Browse Assets
        </a>
    </div>

    <!-- CATEGORY STATS -->
    <div class="card-glass p-4 mb-4">
        <h4>Assets by Category</h4>
        <?php foreach ($categoryStats as $stat): ?>
            <p><?= $stat['category']; ?> : <?= $stat['total']; ?></p>
        <?php endforeach; ?>
    </div>

    <!-- STATUS STATS -->
    <div class="card-glass p-4 mb-4">
        <h4>Assets by Status</h4>
        <?php foreach ($statusStats as $stat): ?>
            <p><?= $stat['status']; ?> : <?= $stat['total']; ?></p>
        <?php endforeach; ?>
    </div>

    <!-- OWNED ASSETS -->
    <div class="card-glass p-4 mb-4">
        <h4>Assets Owned</h4>
        <?php if (count($ownedAssets) > 0): ?>
            <?php foreach ($ownedAssets as $asset): ?>
                <p>
                    <a href="/ASSET-TRACKING-PORTAL/public/user/asset?id=<?= $asset['id']; ?>" class="text-white">
                   <strong><?= $asset['asset_name']; ?></strong></a> |
                    ₹ <?= number_format($asset['cost'], 2); ?> |
                    <?= $asset['category']; ?>
                </p>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No owned assets.</p>
        <?php endif; ?>
    </div>

    <!-- RENTED ASSETS -->
    <div class="card-glass p-4 mb-4">
        <h4>Assets Rented</h4>
        <?php if (count($rentedAssets) > 0): ?>
            <?php foreach ($rentedAssets as $asset): ?>
                <p>
                    <strong><?= $asset['asset_name']; ?></strong> |
                    Rent Period: <?= $asset['rent_start']; ?> to <?= $asset['rent_end']; ?>
                </p>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No rented assets.</p>
        <?php endif; ?>
    </div>

    <!-- MAINTENANCE DUE -->
    <div class="card-glass p-4 mb-4">
        <h4>Assets Due for Maintenance (Next 30 Days)</h4>
        <?php if (count($maintenanceDue) > 0): ?>
            <?php foreach ($maintenanceDue as $asset): ?>
                <p><?= $asset['asset_name']; ?> - Warranty Expiry: <?= $asset['warranty_expiry']; ?></p>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No assets due for maintenance.</p>
        <?php endif; ?>
    </div>

    <!-- HIGH COST ASSETS -->
    <div class="card-glass p-4 mb-4">
        <h4>High Value Assets (₹50,000+)</h4>
        <?php if (count($highCostAssets) > 0): ?>
            <?php foreach ($highCostAssets as $asset): ?>
                <p><?= $asset['asset_name']; ?> - ₹ <?= number_format($asset['cost'], 2); ?></p>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No high value assets.</p>
        <?php endif; ?>
    </div>

</div>

<?php require __DIR__ . '/../../../views/layouts/footer.php'; ?>