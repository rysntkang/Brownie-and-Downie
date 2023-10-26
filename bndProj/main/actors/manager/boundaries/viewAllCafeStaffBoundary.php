<!-- WIP -->

<!-- 
    #6 - As a cafe manager, I want to be able to view all the cafe staff, 
    so that I can check who is available to work.


    // SQL query to select all cafe staff
    $sql = "SELECT * FROM cafe_staff";

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

</style>


<body>
    <table class="table">
                <thead>
                    <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Role</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Chef</td>
                        <td>John Doe</td>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    



                    
                    ?>
                </tbody>

</body>