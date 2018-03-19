
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Processos
        <small>Aguardando preenchimento do prazo</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
<div class="well">
<div class="row">
<div class="col-sm-04">
    
<?php

if (isset($processos)) {
 echo "<table id='table' class='table table-hover' cellspacing='0' width='100%'>";
        echo "<thead>";
          echo "<tr>";
            echo "<th><b>Nome requerente</b></th>";
            echo "<th><b>Data de Recebimento</b></th>";
            echo "<th><b>Assunto</b></th>";
            echo "<th><b>Comentário</b></th>";
            echo "<th><b>Órgão</b></th>";
            echo "<th><b>Prazo</b></th>";   
          echo "</tr>";
        echo "</thead>";
 echo "<tbody>";

foreach ($processos as $process) {
echo "<tr>";
 echo "<td>".$process->requerente."</td>";
 echo "<td>".date('d/m/Y',strtotime($process->data_recebimento))."</td>";
 echo "<td>".$process->assunto."</td>";
 echo "<td>".$process->comentario."</td>";
 echo "<td>".$process->nome."</td>";
 echo "<td><button class='btn btn-primary btn-x' data-toggle='modal' data-target='#myModal".$process->id."'>Alterar</button</td>";
echo "</tr>";







?>
<div id="myModal<?php echo $process->id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Adicionar prazo</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="processos\atualizarData">
        <p>Informe um prazo final para o processo: <b><?php echo $process->assunto ?></b></p>
        <label for="date">Prazo</label>
        <input type="hidden" name="id" value="<?php echo $process->id ?>">
      <input class="form-control" type="date" name="data" id="data" required>
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-success">Salvar</button>
      </div>
      </form>
    </div>

  </div>
</div>

</div>  
</div>
</div>
    
<?php
}
echo "</tbody>";
echo "</table>";
}

?>
<?php
if ($this->session->flashdata('msg')) {
   echo "<div class='col-sm-04'><div class='alert alert-success'>".$this->session->flashdata('msg')."</div>";
}
if ($this->session->flashdata('error')) {
   echo "<div class='col-sm-04'><div class='alert alert-danger'>".$this->session->flashdata('error')."</div>";
}
?>
</section>

  </div>



  
</div>
