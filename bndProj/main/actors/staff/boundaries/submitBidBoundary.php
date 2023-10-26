<!-- WIP -->



<!-- 

    //SUBMIT

    #4 - As a cafe staff, I want to be able to submit a bid for a work slot, 
    so that I can work. 

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
                    <label for="date" class="form-label">Select a date:</label>
                    <br>
                    <select class="form-select" id="date">
                        <option value="option1">01-10-2023</option>
                        <option value="option2">02-10-2023</option>
                        <option value="option3">03-10-2023</option>
                        <!-- Dropdown list only display the dates (workslot) that 
                            have been created -->
                    </select>
                </div>

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-light">Cancel</button>
                    <button type="submit" class="btn btn-light">Submit a bid</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>