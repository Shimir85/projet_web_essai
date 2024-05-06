<body>

<div class="container-fluid row col-6">
    <div class="dropdown col-md-3" style="margin-left: 4%">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Classes
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/projet_web/controller/classe/create.php">Création</a></li>
            <li><a class="dropdown-item" href="/projet_web/controller/classe/read.php">Liste classes</a></li>
        </ul>
    </div>
    <div class="dropdown col-md-5">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Epreuves
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/projet_web/controller/epreuve/create.php">Création</a></li>
            <li><a class="dropdown-item" href="/projet_web/controller/epreuve/read.php">Liste épreuves</a></li>
            <li><a class="dropdown-item" href="/projet_web/controller/arrivee/create.php">Encodage des arrivées</a></li>
            <li><a class="dropdown-item" href="/projet_web/controller/arrivee/read.php">Classement</a></li>
        </ul>
    </div>
        <div class="col-md-3">
            <button onclick="confirmationQuit()">Quitter</button>
            <script>
                function confirmationQuit()
                {
                    if (confirm("Êtes-vous sûr de vouloir quitter ?")) window.location.href = "/projet_web/controller/logout";
                }
            </script>
        </div>
    </div>
<br>
<br>

</body>