<!-- WIP -->

<!-- 
    #3 - As a cafe manager, I want to be able to view the bidding list, 
    so that I can view all the bids submitted by the cafe staff
    
    #4 - As a cafe manager, I want to be able to approve or reject staff bids, 
    so that cafe staff are informed for which day they will be working.

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

    #profile {
        width: 300px;
        height: 40px;
    }

</style>

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


</style>

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            text-align: center;
            padding: 8px;
        }

        td button {
            display: inline-block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <table border="1">
        <tr>
            <th>DATE</th>
            <th>ROLE</th>
            <th>NAME</th>
            <th>ACTION</th>
        </tr>
        <tr>
            <td>2023-10-24</td>
            <td>Sample Role</td>
            <td>John Doe</td>
            <td><button type="submit">Approve</button> <button type="submit">Reject</button></td>
        </tr>
        <tr>
            <td>2023-10-25</td>
            <td>Another Role</td>
            <td>Jane Smith</td>
            <td><button type="submit">Approve</button> <button type="submit">Reject</button></td>
        </tr>
        <!-- You can add more rows with data as needed -->
    </table>
</body>