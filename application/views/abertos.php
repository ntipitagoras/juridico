
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Processos abertos
        
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
<div class="well">
<div class="row">
<div class="col-sm-04">
    
<?php



if (isset($dados)) {
 
 echo "<table id='table' class='table table-hover ' cellspacing='0' width='100%'>";
        echo "<thead>";
          echo "<tr>";
            echo "<th><b>Nome requerente</b></th>";
            echo "<th><b>Data de Recebimento</b></th>";
            echo "<th><b>Assunto</b></th>";
            echo "<th><b>Observação</b></th>";
            echo "<th><b>Órgão</b></th>";
            echo "<th><b>Código</b></th>";
            echo "<th><b>Prazo</b></th>";
            echo "<th><b>Restando</b></th>";  
          echo "</tr>";
        echo "</thead>";
 echo "<tbody>";

foreach ($dados as $process) {
  $data = new DateTime(date('Y/m/d'));
  $data2 = new DateTime($process->data_final);
  $intervalo = $data->diff($data2);
  //echo $intervalo->format('%a');
 
  if ($intervalo->format('%a') <=2 ) {
    echo "<tr class='bg-danger'>";
  }
  if ($intervalo->format('%a') >2 && $intervalo->format('%a') <=5) {
    echo "<tr class='bg-warning'>";
  }
  if ($intervalo->format('%a') >5 ){
    echo "<tr class='success'>";
  }
  
 echo "<td>".$process->requerente."</td>";
 echo "<td>".date('d/m/Y',strtotime($process->data_recebimento))."</td>";
 echo "<td>".$process->assunto."</td>";
 echo "<td>".$process->comentario."</td>";
 echo "<td>".$process->nome."</td>";
 echo "<td>".$process->codigo_orgao."</td>";
 echo "<td>".date('d/m/Y',strtotime($process->data_final))."</td>";
 echo "<td><b>".$intervalo->format('%a')." Dias</b></td>";
 echo "<td><button type='button' class='btn btn-default btn-xs'  data-toggle='modal'  data-target='#editModal".$process->id."'>editar</button></td>";
echo "</tr>";


?>

<div id="editModal<?php echo $process->id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alterar processo</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="atualizarDados">
        <p>Informe um prazo final para o processo: <b><?php echo $process->assunto ?></b></p>
        <label for="requerente">Requerente</label>
        <input type="text" required value="<?php echo $process->requerente ?>" class="form-control" name="requerente" id="requerente" placeholde="Nome do requerente">
        <label for="requerente">Assunto</label>
        <input type="text" required value="<?php echo $process->assunto ?>" class="form-control" name="assunto" id="assunto" placeholder="informe um assunto">
        <label for="orgao">Órgão</label>
          <select class="form-control" id="orgao" name="orgao">
               <?php 
               foreach ($orgao as $orgaos) {
                 echo "<option  value='".$orgaos->id_orgao."'>".$orgaos->nome."</option>";
                
                }     
            ?>
           
          </select>
        <label for="codigo">Código</label>
        <input type="text" name="codigo" id="codigo" class="form-control" value="<?php echo $process->codigo_orgao ?>">
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
