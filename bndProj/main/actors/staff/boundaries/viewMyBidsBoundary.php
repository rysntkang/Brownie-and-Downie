<!-- WIP -->

<!-- 
    ----------------------------------------
    // CAFE STAFF

    #3 - As a cafe staff, I want to be able to view my bids, 
    so that I can know if I am approved to work on that slot.

-->
<style>
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

    .search-container input {
      height: 35px;
      margin-left: 1em;
      text-align: center;
    }

    .container {
        text-align: center;
    }

    .form-container {
        display: flex;
        align-items: center;
    }

    .form-container select, .form-container button {
        margin: 5px;
    }
    
</style>


<body>
    <!-- #3 VIEW MY BIDS -->
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
                <td>Approved</td>
            </tr>

            <tr>
                <td>02-10-2023</td>
                <td>Rejected</td>
            </tr>
        </tbody>
    </table>

</body>