<!-- WIP -->

<!-- 
    //UPDATE WORKSLOT

    #8 - As a cafe staff, I want to be able to update my work slots 
    so that I can attend to other personal urgent matters. 

-->


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

    #date {
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
                    <label for="date" class="form-label">Select date to change:</label>
                    <br>
                    <select class="form-select" id="date">
                        <option value="option1">01-10-2023</option>
                        <option value="option2">02-10-2023</option>
                        <option value="option3">03-10-2023</option>
                        <!-- Dropdown list only display the dates (workslot) that 
                            the *cafe staff* has bid on -->
                    </select>
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">New date:</label>
                    <br>
                    <select class="form-select" id="date">
                        <option value="option1">01-10-2023</option>
                        <option value="option2">02-10-2023</option>
                        <option value="option3">03-10-2023</option>
                        <!-- Dropdown list only display the dates (workslot) that
                        have already been created by the Cafe Owner -->
                    </select>
                </div>


                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-light">Cancel</button>
                    <button type="submit" class="btn btn-light">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>