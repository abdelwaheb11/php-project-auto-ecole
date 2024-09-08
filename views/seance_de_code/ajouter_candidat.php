<?php include_once("../navbar.php"); ?>

<?php
 $access= ($_SESSION['role'] !== 'admin') ? 'style="pointer-events: none; opacity: 0.7;"' : '';
    include_once("../../controleur/etude_code.php");
    include_once("../../controleur/code.php");
    include_once("../../model/etude_code.php");

    $id=$_GET['id'];

    $c=new code();
    $code = $c->getcode($id);
    echo '<h1 class="text-secondry fs-3 text-center mt-3">Ajouter des candidat a seance du code numero '.$code['id'].' implemente a date '.$code['date'].' a heure '.$code['heure'].' .</h1>';
    
    $e=new etude_code();
    $res =$e->despo_candidat($id);
    if($res->rowCount()>0){
        echo '<table class="table table-striped mt-5 w-75  m-auto text-center">
        <thead class="bg-info bg-gradient">
          <tr>
            <th scope="col" class="ps-5">Id</th>
            <th scope="col">Cin</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Ajouter</th>
          </tr>
        </thead>
        <tbody>';
        foreach($res as $c):
            echo '<tr>
            <td scope="col" class="ps-5">'.$c['id'].'</td>
            <td>'.$c['cin'].'</td>
            <td>'.$c['nom'].'</td>
            <td>'.$c['prenom'].'</td>
            <td><a '. $access .' class="btn btn-outline-success" href="ajouter_candidat_action.php?id='.$c['id'].'&id1='.$id.'"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4"/>
          </svg></a></td>
        </tr>';
        endforeach;
    }
        
    else{
        echo '<div class="alert alert-info w-50 m-auto mt-5 text-center">Aucune candidat desponible pour cette seance!</div>';
    }
?>