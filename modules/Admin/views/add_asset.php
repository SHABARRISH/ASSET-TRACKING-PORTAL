<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: /ASSET-TRACKING-PORTAL/public/admin/login");
    exit;
}
require __DIR__ . '/../../../views/layouts/header.php';
?>

<div class="container mt-5">
    <h3>Add New Asset</h3>

    <form method="POST" action="/ASSET-TRACKING-PORTAL/public/admin/add-asset" enctype="multipart/form-data">

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Asset Name</label>
                <input type="text" name="asset_name" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Asset Type</label>
                <input type="text" name="asset_type" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Category</label>
                <select name="category" class="form-control">
                    <option>IT Equipment</option>
                    <option>Furniture</option>
                    <option>Vehicles</option>
                    <option>Others</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Serial Number</label>
                <input type="text" name="serial_number" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Purchase Date</label>
                <input type="date" name="purchase_date" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Cost</label>
                <input type="number" step="0.01" name="cost" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Assigned To</label>
                <input type="text" name="assigned_to" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Location</label>
                <input type="text" name="location" class="form-control">
            </div>
<div class="col-md-6 mb-3">
    <label>Warranty Expiry</label>
    <input type="date" 
           name="warranty_expiry" 
           class="form-control"
           min="<?= date('Y-m-d'); ?>">
</div>

            <div class="col-md-6 mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option>Active</option>
                    <option>Under Maintenance</option>
                    <option>Retired</option>
                    <option>Lost/Stolen</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Upload Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Upload Document</label>
                <input type="file" name="document" class="form-control">
            </div>

        </div>

        <button class="btn btn-light mt-3">Add Asset</button>

    </form>
</div>

<?php require __DIR__ . '/../../../views/layouts/footer.php'; ?>