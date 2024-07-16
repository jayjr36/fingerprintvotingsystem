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
                    <td>JOHN MAGUFULI</td>
                    <td id="president-candidate1">0</td>
                </tr>
                <tr>
                    <td>JAKAYA KIKWETE</td>
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
                    <td>KASSIM MAJALIWA</td>
                    <td id="mp-candidate1">0</td>
                </tr>
                <tr>
                    <td>TULIA ACKSON</td>
                    <td id="mp-candidate2">0</td>
                </tr>
                <tr>
                    <td>JOSEPH MUSUKUMA</td>
                    <td id="mp-candidate3">0</td>
                </tr>
                <tr>
                    <td class="text-center fw-bold fs-4">Councilors</td>
                </tr>
                <tr>
                    <td>NASSEEB ABDUL</td>
                    <td id="councilor-candidate1">0</td>
                </tr>
                <tr>
                    <td>JACOB STEVEN</td>
                    <td id="councilor-candidate2">0</td>
                </tr>
                <tr>
                    <td>WEMA SEPETU</td>
                    <td id="councilor-candidate3">0</td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- <div class="col-md-7 py-3">
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
    </div> --}}
     
    </div>
    <script>
        function fetchVotes() {
            $.ajax({
                url: '/api/votes',
                method: 'GET',
                success: function(data) {
                    let tableBody = $('#votes-table-body');
                    tableBody.empty();

                    let presidentCounts = {'c1': 0, 'c2': 0, 'c3': 0};
                    let mpCounts = {'c1': 0, 'c2': 0, 'c3': 0};
                    let councilorCounts = {'c1': 0, 'c2': 0, 'c3': 0};

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

                    $('#president-candidate1').text(presidentCounts['c1']);
                    $('#president-candidate2').text(presidentCounts['c2']);
                    $('#president-candidate3').text(presidentCounts['c3']);
                    $('#mp-candidate1').text(mpCounts['c1']);
                    $('#mp-candidate2').text(mpCounts['c2']);
                    $('#mp-candidate3').text(mpCounts['c3']);
                    $('#councilor-candidate1').text(councilorCounts['c1']);
                    $('#councilor-candidate2').text(councilorCounts['c2']);
                    $('#councilor-candidate3').text(councilorCounts['c3']);
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
