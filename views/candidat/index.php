<?php include_once("../navbar.php"); 
$access= ($_SESSION['role'] !== 'admin') ? 'style="pointer-events: none; opacity: 0.7;"' : '';
 ?>

    <h1 class="text-center text-secondry"> Liste des candidats </h1>
      <div class="position-relative w-100">
            <a href="ajouter.php" <?php echo $access ;?> class="btn btn-info position-absolute top-0 end-0 mt-3 me-5">Ajouter</a>
      </div>
      <form class="input-group mt-5 w-50 m-auto" method="post">
        <input type="text" class="form-control" name="nom" placeholder="Rechercher par nom" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <button class="input-group-text" type="submit" name="search"  id="basic-addon2">Rechercher</button>
      </form>
    <?php
    include_once("../../controleur/candidat.php");
    $cl=new candidat_cont();
    $can=$cl->liste();
      if(isset($_POST["search"])){
        $n=$_POST['nom'];
        $can=$cl->reche_nom($n);
        if($n!="")
          echo '<div class="w-75 m-auto fw-bold mt-2 fs-4 text-primary">Resultat de rechercher : "'.$n.'"</div>';
      }
    if($can->rowCount()>0){
    echo '<table class="table table-striped mt-3 w-75  m-auto text-center">
  <thead >
    <tr >
      <th scope="col">Id</th>
      <th scope="col">Cin</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Prix total</th>
      <th scope="col">Prix payee</th>
      <th scope="col">Suppremer</th>
      <th scope="col">Modefier</th>
      <th scope="col">voir plus</th>
    </tr>
  </thead>
  <tbody>';
        foreach ($can as $c):
          $prix=$cl->getprixtotal($c['id']);
          $msg="vous avez sur de supremer cet candidat?";
            echo '<tr>
                <td scope="col">'.$c['id'].'</td>
                <td>'.$c['cin'].'</td>
                <td>'.$c['nom'].'</td>
                <td>'.$c['prenom'].'</td>
                <td>'.$prix.'DT</td>';
                if($prix>$c['prix_payee']){
                  echo '<td class="text-danger fw-bold">'.$c['prix_payee'].'DT</td>';
                }
                else{
                  echo '<td class="text-success fw-bold">'.$c['prix_payee'].'DT</td>';
                }
                echo '<td><a '.$access.'  class="btn btn-outline-danger w-50" href="suppremer.php?id='.$c['id'].'">
                <i class="bi bi-trash3-fill fs-4"></i>
                </a></td>
                <td><a '.$access.' class="btn btn-outline-warning w-50" href="modefier.php?id='.$c['id'].'"><i class="bi bi-pencil-square fs-4"></i></a></td>
                <td><a  class="btn btn-outline-primary w-50" href="view-candidat.php?id='.$c['id'].'"><i class="bi bi-eye-fill fs-4"></i></a></td>
            </tr>';
        endforeach;
    }else{
        echo '<div class="alert alert-info mt-5 w-50 m-auto text-center" role="alert">Aucune candidat ajouter!</div>';
    }
    ?>
  </tbody>
</table>