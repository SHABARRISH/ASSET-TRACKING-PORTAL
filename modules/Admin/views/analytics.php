<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: /ASSET-TRACKING-PORTAL/public/admin/login");
    exit;
}

require_once __DIR__ . '/../../../config/database.php';
$db = Database::connect();

/* ========================
   FETCH COUNTS
======================== */

$totalInventory = $db->query("SELECT COUNT(*) FROM assets")->fetchColumn();
$activeAssets = $db->query("SELECT COUNT(*) FROM assets WHERE status = 'Active'")->fetchColumn();
$maintenanceAssets = $db->query("SELECT COUNT(*) FROM assets WHERE status = 'Under Maintenance'")->fetchColumn();
$retiredAssets = $db->query("SELECT COUNT(*) FROM assets WHERE status = 'Retired'")->fetchColumn();

/* Rented Assets */
$rentedAssets = $db->query("
    SELECT COUNT(DISTINCT asset_id) FROM user_assets WHERE type = 'rent'
")->fetchColumn();

require __DIR__ . '/../../../views/layouts/header.php';
?>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Inventory Analytics</h2>
        <a href="/ASSET-TRACKING-PORTAL/public/admin" class="btn btn-light">
            Back to Dashboard
        </a>
    </div>

    <div class="card-glass p-4">
        <canvas id="inventoryChart" height="120"></canvas>
    </div>

</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('inventoryChart').getContext('2d');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            'Total Inventory',
            'Active',
            'Under Maintenance',
            'Retired',
            'Rented'
        ],
        datasets: [{
            label: 'Asset Count',
            data: [
                <?= $totalInventory ?>,
                <?= $activeAssets ?>,
                <?= $maintenanceAssets ?>,
                <?= $retiredAssets ?>,
                <?= $rentedAssets ?>
            ],
            backgroundColor: [
                '#4e73df',
                '#1cc88a',
                '#f6c23e',
                '#858796',
                '#e74a3b'
            ],
            borderRadius: 6
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<?php require __DIR__ . '/../../../views/layouts/footer.php'; ?>