
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Adicionar novo processo</h1>
      
    </section>
<form method="post" action="processos/adicionar">
    <!-- Main content -->
    <section class="content container-fluid">
<div class="well">
    <div class="row">
      <div class="form-group">
        <div class="col-sm-4">
          <label for="requerente">Requerente</label>
          <input type="text" id="requerente" name="requerente" class="form-control" name="nome" placeholder="Nome do requerente" required>
        </div>
        <div class="col-sm-4">
          <label for="date-receiver">Recebimento</label>
          <input type="date" id="date-receiver" name="date-receiver" class="form-control" name="date-receiver" placeholder="Data do recebimento" required>
        </div>
      </div>        
   </div>
   <div class="row">
     <div class="form-group">
       <div class="col-sm-4">
          <label for="date-receiver">Assunto</label>
          <input type="text" id="assunto" name="assunto" class="form-control" name="assunto" placeholder="Assunto do processo" required>
        </div>
        <div class="col-sm-4">
          <label for="orgao">Órgão</label>
          <select class="form-control" id="orgao" name="orgao">
               <?php 
               foreach ($orgao as $orgaos) {
                 echo "<option  value='".$orgaos->id_orgao."'>".$orgaos->nome."</option>";
                
                }     
            ?>
           
          </select>
        </div>
     </div>
   </div>
<div class="row">
  <div class="form-group">
    <div class="col-sm-4">
      <label for="coment">Comentário</label>
      <textarea id="coment" name="coment" class="form-control" placeholder="Opcional" rows="5" cols="4"></textarea>
    </div>
    <div class="col-sm-4">
      <label for="prazo">Prazo</label>
      <input type="date" id="prazo" name="prazo" class="form-control" >
    </div>
  </div>
</div>
<br>
<div class="row">
 <div class="form-group">
   <div class="col-sm-4">    
     <input type="submit" name="btnAdd" class="btn btn-success" value="Adicionar">
   </div>
 </div> 
</div>
</div>
</form>   



<?php
if ($this->session->flashdata('msg')) {
   echo "<div class='alert alert-success'>".$this->session->flashdata('msg')."</div>";
}
?>

    </section>
    
  </div>



  
</div>
