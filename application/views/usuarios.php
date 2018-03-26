
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-9">        
          <h1>Todos os usuários</h1>
        </div>
        <div class="col-sm-2">
          <center>
          <button class="btn btn-success" data-toggle="modal"  data-target="#addModal" >Novo</button>
          </center>
        </div>
      </div>
    </section>


    <!-- Main content -->
    <section class="content container-fluid">
<?php
if ($this->session->flashdata('msg')) {
   echo "<div class='col-sm-04'><div class='alert alert-success'>".$this->session->flashdata('msg')."</div>";
}
if ($this->session->flashdata('error')) {
   echo "<div class='col-sm-04'><div class='alert alert-danger'>".$this->session->flashdata('error')."</div>";
}
?>

<div class="well">
<div class="row">
<div class="col-sm-04">
    
<?php



if (isset($usuarios)) {
 echo "<table id='table' class='table table-hover ' cellspacing='0' width='100%'>";
        echo "<thead>";
          echo "<tr>";
            echo "<th><b>Nome</b></th>";
            echo "<th><b>E-mail</b></th>";
            echo "<th><b>Nivel</b></th>";
          echo "</tr>";
        echo "</thead>";
 echo "<tbody>";

foreach ($usuarios as $user) {

 
echo "<tr>";  
 echo "<td>".$user->nome."</td>";
 echo "<td>".$user->email."</td>";
 if ($user->nivel_admin = 1) {
  echo "<td>Administrador</td>";
 }else{
   echo "<td>Atendente</td>";
 }
 echo "<td><button type='button' class='btn btn-danger'  data-toggle='modal'  data-target='#removeModal".$user->id."'><span class='glyphicon glyphicon-remove'></span></button>";
 echo "<button type='button' class='btn btn-success'  data-toggle='modal'  data-target='#editModal".$user->id."'><span class='glyphicon glyphicon-edit'></span></button></td>";
echo "</tr>";







?>
<div id="removeModal<?php echo $user->id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Remover usuário</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="usuarios/remover">
        <p>Você deseja remover o usuário: <b><?php echo $user->nome ?></b></p>
        <input type="hidden" name="id" value="<?php echo $user->id ?>">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-danger">Apagar</button>
      </div>
      </form>
    </div>

  </div>
</div> <!-- Fim do modal -->
</div>

<div id="editModal<?php echo $user->id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Atualizar dados</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="usuarios/atualizar">
        <label for="nome">Nome</label>
        <input type="text" required  class="form-control" value="<?php echo $user->nome ?>" name="nome" id="nome" placeholder="Nome do usuário">
        <label for="email">E-mail</label>
        <input type="email" required  class="form-control" value="<?php echo $user->email ?>" name="email" id="email" placeholder="E-mail do usuário">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite uma senha">
        <label for="nivel">Nivel do usuário</label>
        <select name="nivel" id="nivel" class="form-control">
          <option selected value="2">Operador</option>
          <option value="1">Administrador</option>
          
        </select>
        <input type="hidden" name="id" value="<?php echo $user->id ?>">
        
      </div>    
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-success">Salvar</button>
      </div>
      </form>
    </div>

  </div>
</div> <!-- Fim do modal -->

<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Adicionar usuário</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="usuarios/adicionar">
        <label for="nome">Nome</label>
        <input type="text" required  class="form-control"  name="nome" id="nome" placeholder="Nome do usuário">
        <label for="email">E-mail</label>
        <input type="email" required  class="form-control" name="email" id="email" placeholder="E-mail do usuário">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite uma senha">
        <label for="nivel">Nivel do usuário</label>
        <select name="nivel" id="nivel" class="form-control">
          <option selected value="2">Operador</option>
          <option value="1">Administrador</option>         
        </select>
        
      </div>    
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-success">Adicionar</button>
      </div>
      </form>
    </div>

  </div>
</div> <!-- Fim do modal -->



</div>  
</div>
</div>
    
<?php
}
echo "</tbody>";
echo "</table>";
}

?>

</section>

  </div>



  
</div>
