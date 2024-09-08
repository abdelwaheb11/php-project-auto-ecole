<?php include_once("../navbar.php"); ?>
<?php
    include_once("../../controleur/vehicule.php");
    include_once("../../controleur/ingenieure.php");
    $v=new vehicule_cont();
    $i=new ingenieure_cont();
    $countTypeVehicule = $v->get_count_type();
    $specialiteIng=$i->get_count_specialite();

?>
<head>
    <title>Dashboard</title>
    <style>
        a{
            text-decoration: none;
        }
        .card {
            transition: 0.5s;
        }

        .card:hover {
            box-shadow: 10px 10px 0 #002;
            color: #004;
 
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<div class="container mt-5">
    <div class="card shadow bg-dark-subtle bg-gradient"> 
        <div class="card-body">
            <h1 class="text-center">Gestion Auto-école</h1><br>
            <div class="row">

            <a href="../seance_conduit" class="col-3 mb-3">
                    <div class="card card-stats text-white bg-info bg-gradient ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="icon-big text-center">
                                        <i class="bi bi-journal-bookmark-fill fs-1"></i>
                                    </div>
                                </div>
                                <div class="col-8 d-flex align-items-center">
                                    <div class="numbers">
                                        <span class="card-category fw-bold fs-5">Séance conduite</p>
                                        <h4 class="card-title">
                                            <?php
                                                include_once("../../controleur/conduit.php");
                                                $cl = new conduit();
                                                $can = $cl->liste();
                                                echo $can->rowCount();
                                            ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="../seance_de_code" class="col-3 mb-3">
                    <div class="card card-stats text-white bg-danger bg-gradient">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="icon-big text-center">
                                        <i class="bi bi-card-checklist fs-1"></i>
                                    </div>
                                </div>
                                <div class="col-8 d-flex align-items-center">
                                    <div class="numbers">
                                        <span class="card-category  fw-bold fs-5">Séance code</p>
                                        <h4 class="card-title">
                                            <?php
                                                include_once("../../controleur/code.php");
                                                $cl = new code();
                                                $can = $cl->liste();
                                                echo $can->rowCount();
                                            ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="../ingenieure" class="col mb-3">
                    <div class="card card-stats text-white bg-success bg-gradient">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="icon-big text-center">
                                        <i class="bi bi-person-vcard-fill fs-1"></i>
                                    </div>
                                </div>
                                <div class="col-8 d-flex align-items-center">
                                    <div class="numbers">
                                        <span class="card-category  fw-bold fs-5" >Ingénieure</p>
                                        <h4 class="card-title">
                                            <?php
                                                include_once("../../controleur/ingenieure.php");
                                                $cl = new ingenieure_cont();
                                                $can = $cl->liste();
                                                echo $can->rowCount();
                                            ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="../candidat" class="col mb-3">
                    <div class="card card-stats text-white bg-primary bg-gradient">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="icon-big text-center">
                                        <i class="bi bi-people-fill fs-1"></i>
                                    </div>
                                </div>
                                <div class="col-8 d-flex align-items-center">
                                    <div class="numbers">
                                        <span class="card-category  fw-bold fs-5"  >Candidat</p>
                                        <h4 class="card-title">
                                            <?php 
                                                include_once("../../controleur/candidat.php");
                                                $cl = new candidat_cont();
                                                $can = $cl->liste();
                                                echo $can->rowCount();
                                            ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="../vehicules" class="col mb-3">
                    <div class="card card-stats text-white bg-warning bg-gradient">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="icon-big text-center">
                                        <i class="bi bi-car-front-fill fs-1"></i>
                                    </div>
                                </div>
                                <div class="col-8 d-flex align-items-center">
                                    <div class="numbers">
                                        <span class="card-category  fw-bold fs-5"  >Véhicule</p>
                                        <h4 class="card-title">
                                            <?php
                                                include_once("../../controleur/Vehicule.php");
                                                $cl = new Vehicule_cont();
                                                $can = $cl->liste();
                                                echo $can->rowCount();
                                            ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                
            </div>
        </div>


        <div class="charts">
            <div class="row">
                <div class="col-6">
                    <canvas id="vehicule_chart"></canvas>
                </div>
                <div class="col-6">
                    <canvas id="ingeneure_chart"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
        const labelsVehiculesChart = <?php echo json_encode(array_keys($countTypeVehicule)); ?>;
        const valuesVehiculesChart = <?php echo json_encode(array_values($countTypeVehicule)); ?>;
        const labelsIngeneureChart = <?php echo json_encode(array_keys($specialiteIng)); ?>;
        const valuesIngeneureChart = <?php echo json_encode(array_values($specialiteIng)); ?>;

        const vehicule_chart = document.getElementById('vehicule_chart').getContext('2d');
        const ingeneure_chart = document.getElementById('ingeneure_chart').getContext('2d');

        const vehiculesChart = new Chart(vehicule_chart, {
            type: 'bar', 
            data: {
                labels: labelsVehiculesChart,
                datasets: [{
                    label: 'Nombre de véhicules par type',
                    data: valuesVehiculesChart,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                }]
            }
        });

        const ingeneuresChart = new Chart(ingeneure_chart, {
            type: 'bar', 
            data: {
                labels: labelsIngeneureChart,
                datasets: [{
                    label: 'Nombre de Ingeneures par Specialite',
                    data: valuesIngeneureChart,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    
                }]
            }
        });
</script>
</body>
</html>
