<?php include_once("../navbar.php");
$access= ($_SESSION['role'] !== 'admin') ? 'style="pointer-events: none; opacity: 0.7;"' : '';
?>

    <h1 class="text-center text-secondry"> Liste des vehicules </h1>
      <div class="position-relative w-100">
            <a <?php echo $access ;?> href="ajouter.php" class="btn btn-info position-absolute top-0 end-0 mt-3 me-5">Ajouter</a>
        </div>
        
        <form class="input-group w-25 m-auto mt-5" method="post">
          <select name="type" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
            <option selected value="0">Voir tous...</option>
            <option value="moto">Moto</option>
            <option value="voiture">Voiture</option>
            <option value="camian">Camian</option>
          </select>
          <button class="input-group-text" type="submit">Rechercher</button>
        </form>

        <?php
    include_once("../../controleur/vehicule.php");
    $cl=new vehicule_cont();
    $can=$cl->liste();
    if(isset($_POST['type'])){
      $t=$_POST['type'];
      if($t!='0') {
        $can=$cl->gets_type($t);
        echo '<div class="w-50 m-auto fw-bold mt-2 fs-4 text-primary">Resultat de rechercher : "'.$t.'"</div>';
      }
    }
    else{
      $can=$cl->liste();
    }
    if($can->rowCount()>0){
    echo '<table class="table table-striped mt-2 w-50  m-auto text-center">
  <thead class="bg-info bg-gradient">
    <tr>
      <th scope="col" class="ps-5">Id</th>
      <th scope="col">num</th>
      <th scope="col">type</th>
      <th scope="col">Suppremer</th>
    </tr>
  </thead>
  <tbody>';
        foreach ($can as $c):
            echo '<tr>
                <td scope="col" class="ps-5">'.$c['id'].'</td>
                <td>'.$c['num'].'</td>
                <td>'.$c['type'].'</td>
                <td><a '. $access.' class="btn btn-outline-danger" href="suppremer.php?id='.$c['id'].'"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
              </svg></a></td>
            </tr>';
        endforeach;
    }else{
        echo '<div class="alert alert-info mt-5 w-50 m-auto text-center" role="alert">Aucune vehicule ajouter!</div>';
    }
    ?>
  </tbody>
</table>