<!DOCTYPE html>
<html>
<head>
    <title>Real-Time Votes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
  
    <div class="container-fluid pt-4 text-center">
       
        <h2 >Vote Counts</h2>
    <div id="vote-counts">
        <table class="col-md-6">
            <thead>
                <tr>
                    <th>Candidate Name</th>
                    <th>Votes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center fw-bold fs-4">President</td>
                </tr>
                <tr>
                    <td>PAUL MAKONDA</td>
                    <td id="president-candidate1">0</td>
                </tr>
                <tr>
                    <td>TUNDU LISU</td>
                    <td id="president-candidate2">0</td>
                </tr>
                <tr>
                    <td>SAMIA HASSAN</td>
                    <td id="president-candidate3">0</td>
                </tr>
                <tr>
                    <td class="text-center fw-bold fs-4">Members of parliament</td>
                </tr>
                <tr>
                    <td>JANETH MAGUFULI</td>
                    <td id="mp-candidate1">0</td>
                </tr>
                <tr>
                    <td>JOSEPH H. SHINDIKA</td>
                    <td id="mp-candidate2">0</td>
                </tr>
                <tr>
                    <td>MWANA FALSAFA</td>
                    <td id="mp-candidate3">0</td>
                </tr>
                <tr>
                    <td class="text-center fw-bold fs-4">Councilors</td>
                </tr>
                <tr>
                    <td>JACK HAMISI</td>
                    <td id="councilor-candidate1">0</td>
                </tr>
                <tr>
                    <td>HAJI S. LIBULULU</td>
                    <td id="councilor-candidate2">0</td>
                </tr>
                <tr>
                    <td>HALIMA MDEE</td>
                    <td id="councilor-candidate3">0</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-7 py-3">
        <h1>Valid Votes</h1>
        <table class="table col-md-6">
            <thead>
                <tr>
                    <th>Voter ID</th>
                    <th>President</th>
                    <th>MP</th>
                    <th>Councilor</th>
                </tr>
            </thead>
            <tbody id="votes-table-body">
                <!-- Votes will be appended here -->
            </tbody>
        </table>
    </div>
     
    </div>
    <script>
        function fetchVotes() {
            $.ajax({
                url: '/api/votes',
                method: 'GET',
                success: function(data) {
                    let tableBody = $('#votes-table-body');
                    tableBody.empty();

                    let presidentCounts = {'candidate1': 0, 'candidate2': 0, 'candidate3': 0};
                    let mpCounts = {'candidate1': 0, 'candidate2': 0, 'candidate3': 0};
                    let councilorCounts = {'candidate1': 0, 'candidate2': 0, 'candidate3': 0};

                    data.forEach(vote => {
                        tableBody.append(`<tr>
                            <td>${vote.voter_id}</td>
                            <td>${vote.president}</td>
                            <td>${vote.MP}</td>
                            <td>${vote.councilor}</td>
                        </tr>`);

                        if (presidentCounts[vote.president] !== undefined) {
                            presidentCounts[vote.president]++;
                        }

                        if (mpCounts[vote.MP] !== undefined) {
                            mpCounts[vote.MP]++;
                        }

                        if (councilorCounts[vote.councilor] !== undefined) {
                            councilorCounts[vote.councilor]++;
                        }
                    });

                    $('#president-candidate1').text(presidentCounts['candidate1']);
                    $('#president-candidate2').text(presidentCounts['candidate2']);
                    $('#president-candidate3').text(presidentCounts['candidate3']);
                    $('#mp-candidate1').text(mpCounts['candidate1']);
                    $('#mp-candidate2').text(mpCounts['candidate2']);
                    $('#mp-candidate3').text(mpCounts['candidate3']);
                    $('#councilor-candidate1').text(councilorCounts['candidate1']);
                    $('#councilor-candidate2').text(councilorCounts['candidate2']);
                    $('#councilor-candidate3').text(councilorCounts['candidate3']);
                }
            });
        }

        $(document).ready(function() {
            fetchVotes();
            setInterval(fetchVotes, 2000);
        });
    </script>
</body>
</html>
