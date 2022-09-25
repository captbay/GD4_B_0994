<?php
include '../component/sidebar.php';
?>
<div class="card card-body shadow"
    style=" *box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Add Movie</h4>
    </div>
    <hr>
    <form method="POST" action="../process/addMovie.php" autocomplete="off">
        <div class="mb-4">
            <label for="in-name" class="form-label">Name</label>
            <input class="form-control" id="in-name" name="name" required>
        </div>
        <div class="mb-4">
            <label for="in-genre" class="form-label">Genre</label>
            <select class="form-select" name="genre" id="in-genre" required>
                <option disabled hidden selected value="">Choose...</option>
                <option value="Action">Action</option>
                <option value="Adventure">Adventure</option>
                <option value="Animation">Animation</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="in-realese" class="form-label">Release Year</label>
            <input type="number" class="form-control" id="in-realese" name="realese" required>
        </div>
        <div class="mb-4">
            <label for="in-season" class="form-label">Season</label>
            <input type="number" class="form-control" id="in-season" name="season" required>
        </div>
        <div class="mb-4">
            <label for="in-synopsis" class="form-label">Synopsis</label>
            <textarea name="synopsis" id="in-synopsis" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-dark w-100" name="tambah" value="add">Save Details</button>
        </div>
    </form>
</div>
</main>
</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>