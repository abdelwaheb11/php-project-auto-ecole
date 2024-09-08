<?php include_once("../navbar.php");
session_start();
if($_SESSION['role']!='admin'){
    header("location: ../not_access");
}
?>

<form action="ajouteraction.php" method="post" class="w-50 mt-5 m-auto">
    <input type="date" name="date" value="<?php 
        echo isset($_SESSION['date']) ? DateTime::createFromFormat('Y-m-d', $_SESSION['date'])->format('Y-m-d') : ''; 
    ?>" class="form-control mb-1"  <?php echo isset($_SESSION['date']) ? 'disabled' : ''; ?>>
    <select name="heure" class="form-select mb-2"  <?php echo isset($_SESSION['heure']) ? 'disabled' : ''; ?>>
        <option value="0">Heure debut de la seance</option>
        <?php
            $heures = array(8, 9, 10, 11, 13, 14, 15, 16, 17);
            foreach ($heures as $h) {
                $selected = ($h == $_SESSION['heure']) ? 'selected' : '';
                echo '<option value="'.$h.'" '.$selected.'>'.$h.'</option>';
            }
        ?>
    </select>
    <?php 
    if(isset($_SESSION['despo']) && !empty($_SESSION['despo'])) {
        echo '<select name="i" class="form-select mb-3">
            <option value="0">Choix l ingenieure </option>';
                foreach ($_SESSION['despo'] as $l) {
                    echo '<option value="'.$l['id'].'">'.$l['cin'].'   '.$l['prenom'].' '.$l['nom'].'</option>';
                }
            }
    else if (isset($_SESSION['despo']) && empty($_SESSION['despo'])) {
        echo '<div class ="text-danger text-center mb-3">Aucune ingenieure disponible a cette date</div>';
    }
        ?>
    </select>
    <input type="submit" value="Ajouter" class="btn btn-primary w-100">
</form>
