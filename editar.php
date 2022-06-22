<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agenda JMF | Home</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background: #DAA520;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
      
    </ul>

    <!-- Right navbar links -->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #DAA520;">
    <!-- Brand Logo -->
    <p class="brand-link">
      <img src="dist/img/system.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="color: #000;">Monitora</span>
    </p>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <p class="d-block" style="color: #000;">System sports</p>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
               <li class="nav-item">
                <a href="home.php" class="nav-link" style="color: #000;">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Cadastro
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="relatorio.php" class="nav-link" style="color: #000;">
                  <i class="nav-icon fas fa-list-ul"></i>
                  <p>
                    Lista
                  </p>
                </a>
              </li>
             </ul>
      </nav>
    
    </div>
    
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-md-5">
            <div class="card card-primary">
            <div class="card-header" style="background: #2F4F4F;">
                <h3 class="card-title">Cadastro de Produtos</h3>
              </div>
              <?php
                      include_once('config/conexao.php');
                      $id = $_GET["id"];
                      $select = "SELECT * FROM Tbprojeto WHERE Idproduto=:id";
                      try{
                        $resultado = $conect->prepare($select);
                        $resultado -> bindParam(":id",$id,PDO::PARAM_STR);
                        $resultado->execute();
                        $contar = $resultado->rowCount();
                        if($contar > 0){
                          while($show = $resultado->FETCH(PDO::FETCH_OBJ)){
                           $nomeProduto = $show->Nomeproduto;
                           $espeProduto = $show->Espeproduto;
                           $precoProduto = $show->PIproduto;
                           $dataProduto = $show->Dataproduto;
                          }
                        }
                      }
                      catch(PDOException $erro){
                        echo $erro->getMessage();
                      }
                    ?>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nome do produto</label>
                    <input name="nome" type="text" class="form-control" id="exampleInputPassword1" placeholder="Insira o nome de Produto..." value="<?php echo $nomeProduto;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Especificações</label>
                    <input name="espe" type="text" class="form-control" id="exampleInputPassword1" placeholder="Insira a especificações..." value="<?php echo $espeProduto;?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputPassword1">Preço bruto</label>
                    <input name="preco" type="text" class="form-control" id="exampleInputPassword1" placeholder="R$ 00,00" style="text-align: center;" value="<?php echo $precoProduto;?>">
                  </div>
                  
                  <div class="form-group col-md-4">
                    <label for="exampleInputPassword1">Data de entrada</label>
                    <input name="data" type="date" class="form-control" id="exampleInputPassword1" placeholder="Insira a Data ...">
                  </div>    
                </div>
                <div class="card-footer">
                    <button name="btnCContato" type="submit" class="btn btn-primary" style="background: #2F4F4F; border: 0;">Cadastrar Produto</button>
                </div>
              </form>
              <div class="col-md-12">
                <?php
                  $insert = "UPDATE Tbprojeto SET Nomeproduto=:nome,Espeproduto=:espe,PIproduto=:preco,Dataproduto=:dataPedido WHERE Idproduto=:id";
                  if(isset($_POST["btnCContato"])){
                    $nome = $_POST["nome"];
                    $espe = $_POST["espe"];
                    $preco = $_POST["preco"];
                    $data = $_POST["data"];
                    try{
                      $resultado = $conect -> prepare($insert);
                      $resultado -> bindParam(":nome",$nome,PDO::PARAM_STR);
                      $resultado -> bindParam(":espe",$espe,PDO::PARAM_STR);
                      $resultado -> bindParam(":preco",$preco,PDO::PARAM_STR);
                      $resultado -> bindParam(":dataPedido",$data,PDO::PARAM_STR);
                      $resultado -> bindParam(":id",$id,PDO::PARAM_STR);
                      $resultado -> execute();
                      $contar = $resultado->rowCount();
                      if($contar>0){
                        echo "<div class='alert alert-success' role='alert'>
                        Produto editado com sucesso!
                      </div>";
                      }
                    }
                    catch(PDOException $erro){
                      echo "ERRO de PDO = ".$erro->getMessage();
                    }
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 - Todos os direitos reservados a</strong>
    Agenda JMF.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
