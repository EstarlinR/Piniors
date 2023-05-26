<?php include("db.php"); ?>


<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="estilo.css">

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">

            <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
          </div>

          <div class="form-group">

            <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
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
         <input type="file" name="image" id="image" hidden>
          </div>

          

          <div class="form-group">
          <input type="text" name="autor" class="form-control" placeholder="el creador del blog es?" autofocus>
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
        </form>

    

      </div>
    </div>









    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>categoria</th>
            <th>img</th>
            <th>fecha</th>
            <th>autor</th>
            
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM blog";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['categoria']; ?></td>
            <div class="img">
            <td><img src="./<?php echo $row['imagen']; ?>" alt="" class="img"></td>
            <td><?php echo $row['fecha']; ?></td>
            <td><?php echo $row['autor']; ?></td>
            </div>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
