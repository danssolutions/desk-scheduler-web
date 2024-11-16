<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: white;
        }

        .team {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            justify-items: center;
            margin: 20px;
        }


        .member {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 10px;
            width: 100%;
            border-radius: 15px;
            background-color: #005B96;
            padding: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }


        .member-image {
            height: 200px;
            width: 150px;
            border-radius: 50px;
            object-fit: cover;
        }

        .dreamteam {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    </style>
    <title>Test</title>
</head>

<body>

    <div class="team">


        <div class="member"><img class="member-image" src="/public/images/ada.jpg" alt="Adriana"><br>
            <h3> Adriana Jaworska</h3>
        </div>
        <div class="member"><img class="member-image" src="/public/images/iana.jpg" alt="Iana"><br>
            <h3>Iana Pavliuk</h3>
        </div>
        <div class="member"><img class="member-image" src="/public/images/daniel.jpg" alt="Daniel"><br>
            <h3>Daniel Vacas Crespo</h3>
        </div>
        <div class="member"><img class="member-image" src="/public/images/dainius.png" alt="Dainius"><br>
            <h3>Dainius Čeliauskas</h3>
        </div>
        <div class="member"><img class="member-image" src="/public/images/marius.png" alt="Marius"><br>
            <h3>Marius Chirița </h3>
        </div>
        <div class="member"><img class="member-image" src="/public/images/maciej.jpg" alt="Maciej"><br>
            <h3>Maciej Grasela</h3>
        </div>
        <div class="dreamteam">
            <h1>Deam Team</h1>
        </div>

    </div>




    <script src="./app.js"></script>
</body>

</html>
