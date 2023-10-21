<!-- WIP -->
<style>

    .card {
        margin-top: 5em !important;
        margin-left: auto;
        margin-right: auto;
        width: 90%;
        background-color: #d9d9d9;
    }

    .card-footer {
        background-color: #d9d9d9;
    }

</style>

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form method="POST">
                <div class="mb-3">
                    <label for="profileName" class="form-label">Profile Name</label>
                    <input type="email" class="form-control" id="profileName">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="password" class="form-control" id="description">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <input type="password" class="form-control" id="role">
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-light">Cancel</button>
                    <button type="submit" class="btn btn-light">Create</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>