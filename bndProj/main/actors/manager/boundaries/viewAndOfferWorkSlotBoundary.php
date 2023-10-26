<!-- WIP -->

<!-- 
    ----------------------------------------
    #7 - As a cafe manager, I want to be able to offer work slots to cafe staff, 
    so sufficient staff are working on that day. 


    ----------------------------------------

    #8 - As a cafe manager, I want to be able to view work slots that are not fully staffed, 
    so that I can offer work slots to cafe staff.

    // Define the maximum slots available
    $maxSlots = 10; // Change this to your actual maximum slot count

    // SQL query to select rows where slots_available is not full
    $sql = "SELECT * FROM work_slots WHERE slots_available < $maxSlots";
    ----------------------------------------


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

    #staff {
        width: 300px;
        height: 40px;
    }
    
    .table {
        margin-top: 1em !important;
        margin-left: auto;
        margin-right: auto;
        border-style: solid;
        border-color: black;
        background-color: #D9D9D9;
        width: 90%;
        text-align: center;
    }

    th, td , tr{
      border-style: solid;
      border-color: black;
    }

    .search-container {
      float: right;
      margin: 1em;
    }


</style>


<body>
    <!-- #8 VIEW WORK SLOT THAT ARE NOT FULLY STAFFED-->
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>01-10-2023</td>
                <td>CHEF</td>
            </tr>
            <!-- You can add more rows with data as needed -->
        </tbody>
    </table>

    <!-- #7 OFFER WORK SLOT -->
    <div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
            <form method="POST">

                
                <div class="mb-3">
                    <label for="date" class="form-label">Search Date:</label>
                    <br>
                    <select class="form-select" id="date">
                        <option value="option1">01-10-2023</option>
                        <option value="option2">02-10-2023</option>
                        <option value="option3">03-10-2023</option>
                        <!-- Dropdown list only display the dates (workslot) that 
                            have been created by the Cafe Owner-->
                    </select>
                </div>

                <div class="mb-3">
                    <label for="staff" class="form-label">Staff name:</label>
                    <br>
                    <select class="form-select" id="date">
                        <option value="option1">John</option>
                        <option value="option2">Peter</option>
                        <option value="option3">Cody</option>
                        <!-- Dropdown list only display the names of the Cafe Staff 
                            who are available to work (according to #6)-->
                    </select>
                </div>

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-light">Cancel</button>
                    <button type="submit" class="btn btn-light">Offer</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    </div>
</body>