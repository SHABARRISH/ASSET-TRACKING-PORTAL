<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: /ASSET-TRACKING-PORTAL/public/admin/login");
    exit;
}

require_once __DIR__ . '/../../../config/database.php';
$db = Database::connect();

$totalAssets = $db->query("SELECT COUNT(*) FROM assets")->fetchColumn();
$maintenanceCount = $db->query("SELECT COUNT(*) FROM assets WHERE status = 'Under Maintenance'")->fetchColumn();
$assets = $db->query("SELECT * FROM assets ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/../../../views/layouts/header.php';
?>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Admin Dashboard</h2>

        <div>
            <a href="/ASSET-TRACKING-PORTAL/public/admin/add-asset" class="btn btn-light">
                + Add New Asset
            </a>

            <a href="/ASSET-TRACKING-PORTAL/public/admin/analytics" class="btn btn-warning ms-2">
                View Analytics
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row">

        <div class="col-md-4 mb-4">
            <div class="card-glass text-center p-4">
                <h3><?= $totalAssets ?></h3>
                <p>Total Assets</p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card-glass text-center p-4">
                <h3><?= $maintenanceCount ?></h3>
                <p>Under Maintenance</p>
            </div>
        </div>

    </div>

    <!-- Asset Table -->
    <div class="card-glass p-4 mt-4">
        <h4 class="mb-3">All Assets</h4>

        <?php if (count($assets) > 0): ?>
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Location</th>
                            <th>Cost</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($assets as $asset): ?>
                            <tr>
                                <td><?= $asset['id']; ?></td>

                                <!-- Image Preview -->
                                <td>
                                    <?php if ($asset['image_path']): ?>
                                        <img src="/ASSET-TRACKING-PORTAL/public/<?= $asset['image_path']; ?>" 
                                             width="60" height="60"
                                             style="object-fit:cover; border-radius:8px;">
                                    <?php else: ?>
                                        No Image
                                    <?php endif; ?>
                                </td>

                                <td><?= $asset['asset_name']; ?></td>
                                <td><?= $asset['category']; ?></td>

                                <!-- Status Dropdown -->
                                <td>
                                    <form method="POST" action="/ASSET-TRACKING-PORTAL/public/admin/update-status">
                                        <input type="hidden" name="asset_id" value="<?= $asset['id']; ?>">
                                        <select name="status" class="form-select form-select-sm"
                                                onchange="this.form.submit()">

                                            <option <?= $asset['status']=='Active'?'selected':'' ?>>Active</option>
                                            <option <?= $asset['status']=='Under Maintenance'?'selected':'' ?>>Under Maintenance</option>
                                            <option <?= $asset['status']=='Retired'?'selected':'' ?>>Retired</option>
                                            <option <?= $asset['status']=='Lost/Stolen'?'selected':'' ?>>Lost/Stolen</option>

                                        </select>
                                    </form>
                                </td>

                                <td><?= $asset['location']; ?></td>
                                <td>₹ <?= number_format($asset['cost'], 2); ?></td>

                                <!-- Delete Button -->
                                <td>
                                    <form method="POST" action="/ASSET-TRACKING-PORTAL/public/admin/delete-asset"
                                          style="display:inline;">
                                        <input type="hidden" name="asset_id" value="<?= $asset['id']; ?>">
                                        <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Delete this asset?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p>No assets added yet.</p>
        <?php endif; ?>

    </div>

</div>

<?php require __DIR__ . '/../../../views/layouts/footer.php'; ?>