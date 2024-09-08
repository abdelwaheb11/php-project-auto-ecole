<?php include_once("../navbar.php"); 
 include_once("../../controleur/etude_code.php");
 include_once("../../controleur/code.php");
 include_once("../../model/etude_code.php");
 $access= ($_SESSION['role'] !== 'admin') ? 'style="pointer-events: none; opacity: 0.7;"' : '';
 $e=new etude_code();
 
    $id=$_GET['id'];
    $c=new code();
    $code = $c->getcode($id);
    echo '<h1 class="text-secondry fs-2 text-center mt-3">Seance du code numero '.$code['id'].' implemente a date '.$code['date'].' a heure '.$code['heure'].' .</h1>
    <div class="position-relative w-100">
            <a href="ajouter_candidat.php?id='.$id.'" class="btn btn-info position-absolute top-0 end-0 mt-3 me-5">Ajouter</a>
        </div>';
    $res =$e->liste_candidat($id);
    if($res->rowCount()>0){
        echo '<table class="table table-striped mt-5 w-75  m-auto text-center">
        <thead class="bg-info bg-gradient">
          <tr>
            <th scope="col" class="ps-5">Id</th>
            <th scope="col">Cin</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Suppremer</th>
          </tr>
        </thead>
        <tbody>';
        foreach($res as $c):
            echo '<tr>
            <td scope="col" class="ps-5">'.$c['id'].'</td>
            <td>'.$c['cin'].'</td>
            <td>'.$c['nom'].'</td>
            <td>'.$c['prenom'].'</td>
            <td><a '. $access .' class="btn btn-outline-danger" href="supp_candidat.php?id='.$c['id'].'&id1='.$id.'" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
          </svg></a></td>
        </tr>';
        endforeach;
    }else{
        echo '<div class="alert alert-info w-50 m-auto mt-5 text-center">Aucune candidat inscrit a cette seance!</div>';
    }
 
?>