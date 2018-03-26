
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Processos Finalizados       
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
<div class="well">
<div class="row">
<div class="col-sm-04">
    
<?php

if (isset($dados)) {
 echo "<table id='table' class='table table-hover' cellspacing='0' width='100%'>";
        echo "<thead>";
          echo "<tr>";
            echo "<th><b>Nome requerente</b></th>";
            echo "<th><b>Assunto</b></th>";
            echo "<th><b>Órgão</b></th>";
            echo "<th><b>Data de finalização</b></th>";
            
          echo "</tr>";
        echo "</thead>";
 echo "<tbody>";

foreach ($dados as $process) {
  $data = new DateTime(date('Y/m/d'));
  $data2 = new DateTime($process->data_final);
  $intervalo = $data->diff($data2);
 
 echo "<tr>";  
 echo "<td>".$process->requerente."</td>";
 echo "<td>".$process->assunto."</td>";
 echo "<td>".$process->nome."</td>";
 echo "<td>".date('d/m/Y',strtotime($process->data_finalizacao))."</td>";
 echo "<td><button type='button' class='btn btn-success'  data-toggle='modal'  data-target='#detalhesModal".$process->id."'>Ver mais</button></td>";
echo "</tr>";




?>


<div id="detalhesModal<?php echo $process->id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detalhes do processo</h4>
      </div>
      <div class="modal-body">
        <ul>
          <li><b>Nome:  </b><?php echo $process->requerente ?></li>
          <li><b>Assunto:  </b><?php echo $process->assunto ?></li>
          <li><b>Data de recebimento:  </b><?php echo date('d/m/Y',strtotime($process->data_recebimento)) ?></li> 
          <li><b>Data final:  </b><?php echo date('d/m/Y',strtotime($process->data_finalizacao))  ?></li>
          <li><b>Órgão:  </b><?php echo $process->nome ?></li>
          <li><b>Código:  </b><?php echo $process->codigo_orgao ?></li> 
          <li><b>Observação:  </b><?php echo $process->comentario ?></li>
          <li><b>Resultado:  </b><?php echo $process->resultado ?></li>
          <?php if ($process->file_path) {
         echo "<li><b>Anexo:  </b> <a href='".base_url()."uploads/documentos/".$process->file_path."' target='_blank'>Arquivo.pdf</a></li>";
          }   ?>

          


        </ul>
        <input type="hidden" name="id" value="<?php echo $process->id ?>">
        <input type="hidden" name="data_recebimento" value="<?php echo $process->data_recebimento?>">
        <input type="hidden" name="orgao_id" value="<?php echo $process->id_orgao ?>">
        <input type="hidden" name="comentario" value="<?php echo $process->comentario ?>">
        <input type="hidden" name="data_final" value="<?php echo $process->data_final?>">
        
        
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        
      </div>
     
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
