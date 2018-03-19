
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Processos em atraso
        
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
            echo "<th><b>Prazo</b></th>";
            echo "<th><b>Atrasado</b></th>";  
          echo "</tr>";
        echo "</thead>";
 echo "<tbody>";

foreach ($dados as $process) {
  $data = new DateTime(date('Y/m/d'));
  $data2 = new DateTime($process->data_final);
  $intervalo = $data->diff($data2);
 
echo "<tr class='bg-danger'>";  
 echo "<td>".$process->requerente."</td>";
 echo "<td>".date('d/m/Y',strtotime($process->data_recebimento))."</td>";
 echo "<td>".$process->assunto."</td>";
 echo "<td>".$process->comentario."</td>";
 echo "<td>".$process->nome."</td>";
 echo "<td>".date('d/m/Y',strtotime($process->data_final))."</td>";
 echo "<td><b>".$intervalo->format('%a')." Dias</b></td>";
 echo "<td><button type='button' class='btn btn-default btn-xs'  data-toggle='modal'  data-target='#editModal".$process->id."'>Remarcar</button>";
 echo "<button type='button' class='btn btn-default btn-xs'  data-toggle='modal'  data-target='#finModal".$process->id."'>Finalizar</button></td>";
echo "</tr>";







?>
<div id="editModal<?php echo $process->id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Adicionar prazo</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="remarcarProcesso">
        <p>Informe um prazo final para o processo: <b><?php echo $process->assunto ?></b></p>
        <label for="requerente">Requerente</label>
        <input type="text" required value="<?php echo $process->requerente ?>" class="form-control" name="requerente" id="requerente" placeholde="Nome do requerente">
        <label for="requerente">Assunto</label>
        <input type="text" required value="<?php echo $process->assunto ?>" class="form-control" name="assunto" id="assunto" placeholder="informe um assunto">
        <label for="coment">Observação</label>
        <textarea id="coment" name="coment" class="form-control" placeholder="Opcional" rows="5" cols="4"></textarea>
        
        <label for="date">Novo prazo</label>
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
</div> <!-- Fim do modal -->

<div id="finModal<?php echo $process->id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Finalizar processo</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="finalizar">
        <p>Informe um resultado para o processo: <b><?php echo $process->assunto ?></b></p>
        <label for="requerente">Requerente</label>
        <input type="text" required value="<?php echo $process->requerente ?>" class="form-control" name="requerente" id="requerente" placeholde="Nome do requerente">
        <label for="assunto">Assunto</label>
        <input type="text" required value="<?php echo $process->assunto ?>" class="form-control" name="assunto" id="assunto" placeholder="informe um assunto">
        <label for="coment">Resultado</label>
        <textarea id="coment" name="resultado" class="form-control" placeholder="Opcional" rows="5" cols="4"></textarea>
        <input type="hidden" name="id" value="<?php echo $process->id ?>">
        <input type="hidden" name="data_recebimento" value="<?php echo $process->data_recebimento?>">
        <input type="hidden" name="orgao_id" value="<?php echo $process->id_orgao ?>">
        <input type="hidden" name="comentario" value="<?php echo $process->comentario ?>">
        <input type="hidden" name="data_final" value="<?php echo $process->data_final?>">
        
        
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-danger">Finalizar</button>
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
