<!-- resources/views/register.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter Registration</title>
</head>
<body>
    <center>
    <h2>Voter Registration</h2>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        
        
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="region">Region:</label><br>
        <input type="text" id="region" name="region" required><br><br>
        <label for="district">District:</label><br>
        <input type="text" id="district" name="district" required><br><br>
        <label for="ward">Ward:</label><br>
        <input type="text" id="ward" name="ward" required><br><br>
        <label for="dob">Date of birth:</label><br>
        <input type="date" id="dob" name="dob" required><br><br>
        
        <!-- Add more fields as needed -->
        
        <button type="submit">Register</button>
    </form>
</center>
</body>
</html>
