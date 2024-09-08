<?php include_once("../navbar.php"); 
$access= ($_SESSION['role'] !== 'admin') ? 'style="pointer-events: none; opacity: 0.7;"' : '';
?>

    <h1 class="text-center text-secondry"> Liste des seances de code </h1>
      <div class="position-relative w-100">
            <a <?php echo $access ;?> href="ajouter.php" class="btn btn-info position-absolute top-0 end-0 mt-3 me-5">Ajouter</a>
        </div>
        
        <form class="mt-5 w-50 m-auto mb-3" method="post">
          <div class="input-group">
            <input type="date" class="form-control" name="date" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <button class="input-group-text" type="submit" name="search" id="basic-addon2">Rechercher</button>
          </div>
        </form>
        
  <?php
  unset($_SESSION['date']);
  unset($_SESSION['heure']);
    include_once("../../controleur/code.php");
    $cl=new code();
    $can=$cl->liste();
    if(isset($_POST['date'])){
      $date=$_POST['date'];
      $can=$cl->reche_date($date);
      echo '<div class="w-75 m-auto fw-bold mt-2 fs-4 text-primary">Resultat de rechercher : "'.$date.'"</div>';
    }
    

    if($can->rowCount()>0){
    echo '<table class="table table-striped w-75  m-auto text-center">
  <thead class="bg-info bg-gradient">
    <tr>
      <th scope="col" class="ps-5">Id</th>
      <th scope="col">date</th>
      <th scope="col">heure</th>
      <th scope="col">ingenieure</th>
      <th scope="col">Voir candidats</th>
      <th scope="col">Suppremer</th>
    </tr>
  </thead>
  <tbody>';
        foreach ($can as $c):
            echo '<tr>
                <td scope="col" class="ps-5">'.$c['id'].'</td>
                <td>'.$c['date'].'</td>
                <td>'.$c['heure'].'</td>
                <td>'.$c['ingenieure'].'</td>
                <td><a class="btn btn-outline-success" href="voir_candidat.php?id='.$c['id'].'"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
              </svg></a></td>
                <td><a '. $access.' class="btn btn-outline-danger" href="suppremer.php?id='.$c['id'].'"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
              </svg></a></td>
            </tr>';
        endforeach;
    }else{
        echo '<div class="alert alert-info mt-5 w-50 m-auto text-center" role="alert">Aucune seance du code ajouter!</div>';
    }
    ?>
  </tbody>
</table>