<!DOCTYPE html>
<html>
<head>
    <title>Real-Time Votes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Real-Time Votes</h1>
        <table class="table">
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
        <h2>Vote Counts</h2>
        <div id="vote-counts">
            <p>President Candidate1: <span id="president-candidate1">0</span></p>
            <p>President Candidate2: <span id="president-candidate2">0</span></p>
            <p>MP Candidate1: <span id="mp-candidate1">0</span></p>
            <p>MP Candidate2: <span id="mp-candidate2">0</span></p>
            <p>Councilor Candidate1: <span id="councilor-candidate1">0</span></p>
            <p>Councilor Candidate2: <span id="councilor-candidate2">0</span></p>
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

                    let presidentCounts = {'candidate1': 0, 'candidate2': 0};
                    let mpCounts = {'candidate1': 0, 'candidate2': 0};
                    let councilorCounts = {'candidate1': 0, 'candidate2': 0};

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
                    $('#mp-candidate1').text(mpCounts['candidate1']);
                    $('#mp-candidate2').text(mpCounts['candidate2']);
                    $('#councilor-candidate1').text(councilorCounts['candidate1']);
                    $('#councilor-candidate2').text(councilorCounts['candidate2']);
                }
            });
        }

        $(document).ready(function() {
            fetchVotes();
            setInterval(fetchVotes, 5000); // Fetch votes every 5 seconds
        });
    </script>
</body>
</html>
