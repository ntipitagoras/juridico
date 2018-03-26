
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-9">        
          <h1>Todos os órgãos</h1>
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



if (isset($orgaos)) {
 echo "<table id='table' class='table table-hover ' cellspacing='0' width='100%'>";
        echo "<thead>";
          echo "<tr>";
            echo "<th><b>Nome</b></th>";           
          echo "</tr>";
        echo "</thead>";
 echo "<tbody>";

foreach ($orgaos as $orgao) {

 
echo "<tr>";  
 echo "<td>".$orgao->nome."</td>";
 echo "<td></td>";
 echo "<td></td>";
 echo "<td></td>";
 echo "<td></td>";
 echo "<td></td>";
 echo "<td></td>";
 echo "<td></td>";
 echo "<td></td>";
 echo "<td></td>";
 echo "<td></td>";
 echo "<td></td>";
 echo "<td></td>";
 echo "<td></td>";
 echo "<td></td>";
 echo "<td></td>";
 echo "<td></td>";
 echo "<td></td>";
 echo "<td></td>";
 echo "<td></td>";
 echo "<td></td>";
 echo "<td><button type='button' class='btn btn-success'  data-toggle='modal'  data-target='#editModal".$orgao->id_orgao."'><span class='glyphicon glyphicon-edit'></span></button></td>";
echo "</tr>";







?>


<div id="editModal<?php echo $orgao->id_orgao ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Atualizar dados</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="orgaos/atualizar">
        <label for="nome">Nome</label>
        <input type="text" required  class="form-control" name="nome" id="nome" value="<?php echo $orgao->nome ?>" placeholder="Nome do órgao">        
        <input type="hidden" name="id" value="<?php echo $orgao->id_orgao ?>">
        
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
        <h4 class="modal-title">Adicionar órgao</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="orgaos/adicionar">
        <label for="nome">Nome</label>
        <input type="text" required  class="form-control"  name="nome" id="nome" placeholder="Nome do órgão">       
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
