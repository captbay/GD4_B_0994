<?php
include '../component/sidebar.php';

$user = null;
// get user data
$query = "SELECT * FROM users WHERE id = ?;";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, 'i', $_SESSION['user']["id"]);
mysqli_stmt_execute($stmt);
$user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
?>
<div class="card card-body shadow"
    style=" *box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Edit Akun</h4>
    </div>
    <hr>
    <form method="POST" action="../process/editAkun.php" autocomplete="off">
        <div class="mb-3">
            <label for="in-name" class="form-label">Name</label>
            <input class="form-control" id="in-name" name="name" value="<?php echo htmlspecialchars($user["name"]);?>"
                required>
        </div>
        <div class="mb-3">
            <label for="in-phonenum" class="form-label">Phone Number</label>
            <input class="form-control" id="in-phonenum" name="phonenum"
                value="<?php echo htmlspecialchars($user["phonenum"]);?>" required>
        </div>
        <div class="mb-3">
            <label for="in-email" class="form-label">Email</label>
            <input class="form-control" id="in-email" name="email"
                value="<?php echo htmlspecialchars($user["email"]);?>" required>
        </div>
        <div class="mb-3">
            <label for="in-membership" class="form-label">Membership</label>
            <input type="text" disabled class="form-control" id="in-membership"
                value="<?php echo htmlspecialchars($user["membership"]);?>" required>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-dark w-100" name="edit" value="edit">Save Update</button>
        </div>
    </form>
</div>
</main>
</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>