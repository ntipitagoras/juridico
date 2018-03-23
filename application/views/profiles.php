
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-9">        
          <h1>Meu perfil</h1>
        </div>
       </div>
    </section>


    <!-- Main content -->
    <section class="content container-fluid">
<form action="updateProfile" method="POST" enctype="multipart/form-data">
<div class="well">
    <div class="row">
      <div class="form-group">
        <div class="col-sm-4">
          <label for="nome">Nome</label>
          <input type="text" id="nome" name="nome" class="form-control" name="nome" placeholder="Seu nome" required value="<?php echo $this->session->userdata('nome') ?>">
        </div>
        <div class="col-sm-4">
          <label for="email">E-mail</label>
          <input type="email" id="email" name="email" class="form-control" name="date-receiver" placeholder="Seu E-mail" required value="<?php echo $this->session->userdata('email') ?>">
        </div>
      </div>        
   </div>
   <div class="row">
     <div class="form-group">
       <div class="col-sm-4">
          <label for="senha">Alterar senha</label>
          <input type="password" id="senha" name="senha" class="form-control" name="senha" placeholder="Digite uma nova senha">
        </div>
        <input type="hidden" name="id" value="<?php echo $this->session->userdata('id') ?>">

      
     </div>
   </div>
<br>  
<label for="img">Alterar imagem do perfil</label>
<br>
<input type="file" name="imagem">
<br>

      <img src="<?php echo base_url();?>/uploads/imgs/<?php echo $this->session->userdata('img') ?>" class="img-circle" alt="User Image">


<div class="row">
 <div class="form-group">
   <div class="col-sm-4">
   <br>    
     <input type="submit" name="btnAdd" class="btn btn-success" value="Salvar">
   </div>
 </div> 
</div>
</div>
</form>   
    
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
