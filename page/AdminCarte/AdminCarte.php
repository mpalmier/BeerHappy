<?php
?>
<h1> Ajouter une catégorie </h1>
<form action=index.php?page=AddCategorie method='post'> <input type=text name=nom> <input value='Ajouter' type='submit'  </form><br>
<?php
AdminCarteController::afficherCategorie();

