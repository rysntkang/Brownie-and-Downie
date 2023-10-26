<!-- WIP -->

<!-- 
    ----------------------------------------
    //VIEW AVAILABLE BIDS
    #5 - As a cafe staff, I want to be able to view the available bids for the work slot,
    so that I know when to work.


    ----------------------------------------
    //SEARCH FOR WORK SLOTS
    #7 - As a cafe staff, I want to be able to search for work slots 
    so that I can make bids more easily. 


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


    #date {
        width: 300px;
        height: 40px;
    }
    
</style>


<body>
    <!-- #5 VIEW AVAILABLE BIDS-->
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>01-10-2023</td>
                <td>Available</td>
            </tr>
            <!-- You can add more rows with data as needed -->
        </tbody>
    </table>

    <!-- #7 SEARCH FOR WORK SLOT -->
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

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-light">Reset</button>
                    <button type="submit" class="btn btn-light">Cancel</button>
                    <button type="submit" class="btn btn-light">Search</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    </div>
</body>