<?php
include("db.php");

$title = '';
$description= '';
$categoria='';
$imagen= '';
$fecha ='' ;
$autor ='';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM blog WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $title = $row['title'];
    $description = $row['description'];
    $categoria=$row['categoria'];
    $target_file=$row['imagen'];
    $fecha =$row['fecha'];
    $autor =$row['autor'];

  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $title= $_POST['title'];
  $description = $_POST['description'];
  $categoria=$_POST['categoria'];
  $imagen=$_FILES['imagen'];
  $autor = $_POST['autor'];

  $query = "UPDATE blog set 
     title ='$title',
     description = '$description',
     categoria = '$categoria',
     imagen = '$target_file',
     autor ='$autor'
     WHERE id=$id";


  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">

          <input name="title" type="text" class="form-control" value="<?php echo $title; ?>" placeholder="Update Title">

        </div>
        <div class="form-group">
        <textarea name="description" class="form-control" cols="30" rows="10"><?php echo $description;?></textarea>
        </div>

        <div class="form-group">
          <label for="categoria">categoria
    <select name="categoria">
      <option >tipo..</option>
        <option value="personal">Personal</option>
        <option value="profesional">Profesional</option>
        <option value="educativo">Educativo</option>
        <option value="corporativo">Corporativo</option>
        <option value="comercial">Comercial</option>
        <option value="temático">Temático</option>
        
    </select>
    </label>
    </div>



    <div class="form-group">
    <label for="image" id="uploadImage">Subir imagen</label>
         <input type="file" name="image" id="image" hidden value="<?php echo $imagen; ?>">
          </div>

        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>