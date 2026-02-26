<?php

require_once __DIR__ . '/../core/Router.php';




$router = new Router();

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
*/

$router->get('/', function () {
    require __DIR__ . '/../views/home.php';
});

$router->get('/admin', function () {
    require __DIR__ . '/../modules/Admin/views/dashboard.php';
});

$router->get('/user', function () {
    require __DIR__ . '/../modules/User/views/dashboard.php';
});

$router->get('/admin/login', function () {
    require __DIR__ . '/../modules/Auth/views/admin_login.php';
});

$router->get('/user/login', function () {
    require __DIR__ . '/../modules/Auth/views/user_login.php';
});
$router->get('/admin/add-asset', function () {
    require __DIR__ . '/../modules/Admin/views/add_asset.php';
});
$router->get('/user/assets', function () {
    require __DIR__ . '/../modules/User/views/assets.php';
});
$router->get('/user/asset', function () {
    require __DIR__ . '/../modules/User/views/asset_detail.php';
});
$router->get('/admin/analytics', function () {
    require __DIR__ . '/../modules/Admin/views/analytics.php';
});



// Handle Admin Login POST
$router->post('/admin/login', function () {

    require_once __DIR__ . '/../config/database.php';

    session_start();

    $db = Database::connect();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM users WHERE email = ? AND role = 'admin' AND status = 'active'");
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = 'admin';

        header("Location: /ASSET-TRACKING-PORTAL/public/admin");
        exit;

    } else {
        echo "Invalid Admin Credentials";
    }
});


// Handle User Login POST
$router->post('/user/login', function () {

    require_once __DIR__ . '/../config/database.php';

    session_start();

    $db = Database::connect();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM users WHERE email = ? AND role = 'user' AND status = 'active'");
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = 'user';

        header("Location: /ASSET-TRACKING-PORTAL/public/user");
        exit;

    } else {
        echo "Invalid User Credentials";
    }
});

$router->post('/admin/add-asset', function () {

    require_once __DIR__ . '/../config/database.php';
    session_start();

    $db = Database::connect();

    $imagePath = null;
    $docPath = null;

    if (!empty($_FILES['image']['name'])) {
        $imagePath = "uploads/images/" . time() . "_" . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . "/" . $imagePath);
    }

    if (!empty($_FILES['document']['name'])) {
        $docPath = "uploads/documents/" . time() . "_" . $_FILES['document']['name'];
        move_uploaded_file($_FILES['document']['tmp_name'], __DIR__ . "/" . $docPath);
    }

    $stmt = $db->prepare("INSERT INTO assets 
        (asset_name, asset_type, category, serial_number, purchase_date, cost, assigned_to, location, warranty_expiry, status, image_path, document_path)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->execute([
        $_POST['asset_name'],
        $_POST['asset_type'],
        $_POST['category'],
        $_POST['serial_number'],
        $_POST['purchase_date'],
        $_POST['cost'],
        $_POST['assigned_to'],
        $_POST['location'],
        $_POST['warranty_expiry'],
        $_POST['status'],
        $imagePath,
        $docPath
    ]);

    header("Location: /ASSET-TRACKING-PORTAL/public/admin");
});

//DELETE IN ADMIN

$router->post('/admin/delete-asset', function () {

    require_once __DIR__ . '/../config/database.php';
    session_start();

    if ($_SESSION['role'] !== 'admin') {
        exit;
    }

    $db = Database::connect();

    $stmt = $db->prepare("DELETE FROM assets WHERE id = ?");
    $stmt->execute([$_POST['asset_id']]);

    header("Location: /ASSET-TRACKING-PORTAL/public/admin");
});

$router->post('/admin/update-status', function () {

    require_once __DIR__ . '/../config/database.php';
    session_start();

    if ($_SESSION['role'] !== 'admin') {
        exit;
    }

    $db = Database::connect();

    $stmt = $db->prepare("UPDATE assets SET status = ? WHERE id = ?");
    $stmt->execute([$_POST['status'], $_POST['asset_id']]);

    header("Location: /ASSET-TRACKING-PORTAL/public/admin");
});
//user side

$router->post('/user/buy', function () {

    require_once __DIR__ . '/../config/database.php';
    session_start();

    if ($_SESSION['role'] !== 'user') {
        exit;
    }

    $db = Database::connect();

    $assetId = $_POST['asset_id'];
    $userId  = $_SESSION['user_id'];

    // Insert into user_assets
    $stmt = $db->prepare("INSERT INTO user_assets (user_id, asset_id, type) VALUES (?, ?, 'buy')");
    $stmt->execute([$userId, $assetId]);

    // Change asset status to Retired
    $update = $db->prepare("UPDATE assets SET status = 'Retired' WHERE id = ?");
    $update->execute([$assetId]);

    header("Location: /ASSET-TRACKING-PORTAL/public/user/assets");
});

$router->post('/user/rent', function () {

    require_once __DIR__ . '/../config/database.php';
    session_start();

    if ($_SESSION['role'] !== 'user') {
        exit;
    }

    $db = Database::connect();

    $assetId = $_POST['asset_id'];
    $userId  = $_SESSION['user_id'];

    $rentStart = date('Y-m-d');
    $rentEnd   = date('Y-m-d', strtotime('+30 days'));

    // Insert rental record
    $stmt = $db->prepare("INSERT INTO user_assets (user_id, asset_id, type, rent_start, rent_end) VALUES (?, ?, 'rent', ?, ?)");
    $stmt->execute([$userId, $assetId, $rentStart, $rentEnd]);

    header("Location: /ASSET-TRACKING-PORTAL/public/user/assets");
});
$router->post('/user/update-depreciation', function () {

    require_once __DIR__ . '/../config/database.php';
    session_start();

    $db = Database::connect();

    $stmt = $db->prepare("UPDATE assets SET useful_life = ?, salvage_value = ? WHERE id = ?");
    $stmt->execute([
        $_POST['useful_life'],
        $_POST['salvage_value'],
        $_POST['asset_id']
    ]);

    header("Location: /ASSET-TRACKING-PORTAL/public/user/asset?id=" . $_POST['asset_id']);
});


$router->resolve();