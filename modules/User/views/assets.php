<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: /ASSET-TRACKING-PORTAL/public/user/login");
    exit;
}

require_once __DIR__ . '/../../../config/database.php';
$db = Database::connect();

// Show only active assets
$assets = $db->query("SELECT * FROM assets WHERE status = 'Active'")->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/../../../views/layouts/header.php';
?>

<div class="container mt-5">
    <h2 class="mb-4">Available Assets</h2>

    <div class="row">

        <?php foreach ($assets as $asset): ?>
            <div class="col-md-4 mb-4">
                <div class="card-glass p-3">

                    <?php if ($asset['image_path']): ?>
                        <img src="/ASSET-TRACKING-PORTAL/public/<?= $asset['image_path']; ?>"
                             class="img-fluid mb-3"
                             style="height:200px; object-fit:cover; border-radius:10px;">
                    <?php endif; ?>

                    <h5><?= $asset['asset_name']; ?></h5>
                    <p><strong>Category:</strong> <?= $asset['category']; ?></p>
                    <p><strong>Cost:</strong> ₹ <?= number_format($asset['cost'], 2); ?></p>
                    <p><strong>Location:</strong> <?= $asset['location']; ?></p>

                    <div class="d-flex justify-content-between mt-3">

                        <!-- Buy Button -->
                        <form method="POST" action="/ASSET-TRACKING-PORTAL/public/user/buy">
                            <input type="hidden" name="asset_id" value="<?= $asset['id']; ?>">
                            <button class="btn btn-success btn-sm">
                                Buy
                            </button>
                        </form>

                        <!-- Rent Button -->
                        <form method="POST" action="/ASSET-TRACKING-PORTAL/public/user/rent">
                            <input type="hidden" name="asset_id" value="<?= $asset['id']; ?>">
                            <button class="btn btn-warning btn-sm">
                                Rent
                            </button>
                        </form>

                    </div>

                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>


<?php require __DIR__ . '/../../../views/layouts/footer.php'; ?>