<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Poll</title>
    <style>
        /* Paste the provided CSS here */
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            margin-left: 15%;
            margin-right: 15%;
            width: 72%;
        }

        /* Styles for input fields */
        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="submit"],
        input[type="radio"] {
            width: 300px;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Styles for submit button */
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }

        /* Change submit button color on hover */
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Styles for radio buttons */
        input[type="radio"] {
            margin-right: 1 px;
        }

        /* Responsive styles */
        @media (max-width: 600px) {
            form {
                width: 80%;
                margin: 0 auto;
            }
        }
    </style>
</head>

<body>
<h2>Voting poll</h2>
    <form action="submit_vote.php" method="post">
        <?php include 'retrieve_candidates.php'; ?>
        <input type="submit" value="Vote">
    </form>
<a href="adminhome.html">Back</a>
</body>

</html>
