<?php require $_SERVER["DOCUMENT_ROOT"] .  "/lessonsProject/includes/checkSession.php"; ?>
<!DOCTYPE html>
<html lang="it-IT">
<head>
  <title>lessonsProject</title>
  <?php include $_SERVER["DOCUMENT_ROOT"] .  "/lessonsProject/includes/head.php"; ?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
  <?php include $_SERVER["DOCUMENT_ROOT"] .  "/lessonsProject/includes/navbar.php";  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-2">
      </div> <!-- .col-md-2 -->
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Inserisci una lezione</h5>
          </div> <!-- .card-header -->
          <div class="card-body">
            <form class="form-horizontal" id="newLesson" method="post" autocomplete="on" enctype="multipart/form-data">
              <div class="form-group">
                <label for="inputathlete">Cognome e nome</label>
                <input type="text" class="form-control" id="inputathlete" placeholder="Inserisci">
                <input type="hidden" id="id">
              </div> <!-- .form-group -->
              <div class="form-group">
                <label for="dateLesson">Data della lezione</label>
                <input type="date" class="form-control" id="dateLesson" value="<?php echo date('Y-m-d');?>" >
              </div> <!-- .form-group -->
              <div class="form-group">
                <label for="weapon">Arma</label>
                <select class="form-control" id="weapon">
                  <option selected value="0">Spada</option>
                  <option value="1">Fioretto</option>
                  <option value="2">Sciabola</option>
                </select>
              </div> <!-- .form-group -->
              <div class="form-group">
                <label for="desc">Descrizione</label>
                <textarea class="form-control" id="desc"></textarea>
              </div> <!-- .form-group -->
              <button class="btn btn-primary" id="btnadd">Salva</button>
            </form>
          </div> <!-- .card-body -->
        </div> <!-- .card -->
      </div> <!-- .col-md-8 -->
      <div class="col-md-2">
      </div> <!-- .col-md-2 -->
    </div> <!-- .row -->
  </div> <!-- .container -->



</body>
</html>

<script>

$(function() {
    $("#inputathlete").autocomplete({
        source: "search_athlete.php",
        select: function( event, ui ) {
            event.preventDefault();
            $("#id").val(ui.item.id);
            $("#inputathlete").val(ui.item.value);
          }
    });
});


$(document).ready(function(){
            $("#btnadd").click(function(){
                var id=$("#id").val();
                var dateLesson=$("#dateLesson").val();
                var weapon=$("#weapon").val();
                var desc=$("#desc").val();
                $.ajax({
                    url:'../ajax/newlesson.php',
                    method:'POST',
                    data:{
                        id:id,
                        dateLesson:dateLesson,
                        weapon:weapon,
                        desc:desc
                    },
                   success:function(data){
                     alert(data);
                   }
                });
            });
        });



</script>

<script src="../js/script.js"></script>
