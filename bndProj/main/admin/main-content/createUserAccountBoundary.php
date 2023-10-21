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

    #profile {
        width: 300px;
        height: 40px;
    }

</style>

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="profileName" class="form-label">Username</label>
                    <input type="email" class="form-control" id="profileName">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address">
                </div>

                <div class="mb-3">
                    <label for="mobileNumber" class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" id="mobileNumber">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password">
                </div>

                <div class="mb-3">
                    <label for="profile" class="form-label">Profile</label>
                    <br>
                    <select class="form-select" id="profile">
                        <option value="option1">Chef</option>
                        <option value="option2">Cashier</option>
                        <option value="option3">Waiter</option>
                        <!-- Add more options as needed -->
                    </select>
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
