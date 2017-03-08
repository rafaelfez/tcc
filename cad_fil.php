<?php

require 'inc/funcoes.php';

$tituloPagina = "Cadastro de Filiado";
$matricula = $nome = $telefone = $nascimento = $endereco = $rg = $cpf = $celular = $sexo = $email = $situacao = $taxa_rcs = $message = "";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
  $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
  $nascimento = filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_STRING);
  $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
  $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_NUMBER_INT);
  $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
  $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_NUMBER_INT);
  $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
  $taxa_rcs = filter_input(INPUT_POST, 'taxa_rcs', FILTER_SANITIZE_NUMBER_INT);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $situacao = filter_input(INPUT_POST, 'situacao', FILTER_SANITIZE_STRING);


  if(empty($matricula) || empty($nome) || empty($telefone) || empty($nascimento) || empty($endereco) || empty($rg) || empty($cpf) || empty($celular) || empty($sexo) || empty($email) || empty($situacao) || empty($taxa_rcs)){
    $message = '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Atenção! </strong> Por favor insira todos os campos</div>';
  }else{
    if(add_arr($matricula,$nome,$telefone,$nascimento,$endereco,$rg,$cpf,$celular,$sexo,$email,$situacao,$taxa_rcs)){
      $message = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Cadastro efetuado com sucesso!</div>';
    }else{
      $message = '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Erro ao efetuar cadastro</div>';
    }
  }
}




include("inc/header.php");
?>
<div class="cad-arr">
<?php
        if(isset($message)){
          echo $message;
        }
      ?>
   <h2 class="bg-info">Cadastro de Filiado</h2>
  <form class="form-group" data-toggle="validator" method="post" action="cad_fil.php">
  
    <table>
        <tr>
          <th><label for="matricula">Matrícula:<span class="required">*</span></label></th>
          <td><input type="text" required placeholder="" class="form-control" id="matricula" name="matricula"  data-error="Por favor, informe um número de matrícula correto." required value="<?php echo htmlspecialchars($matricula); ?>"/> 
          <div class="help-block with-errors"></div>
       </td>
        </tr>
        <tr>
          <th><label for="nome">Nome:<span class="required">*</span></label></th>
          <td><input type="text" required placeholder="" class="form-control" id="nome" name="nome" data-error="Por favor, informe um nome correto." value="<?php echo htmlspecialchars($nome); ?>"/> <div class="help-block with-errors"></div>

          </td>
        </tr>
        <th><label for="nascimento">Data de Nascimento:<span class="required">*</span></label></th>
          <td><input type="text" required placeholder="DD/MM/AAAA" class="form-control" id="nascimento" name="nascimento" value="<?php echo htmlspecialchars($nascimento); ?>"/>
          <div class="help-block with-errors"></div>
          </td>
        </tr>
        <tr>
          <th><label for="sexo">Sexo:<span class="required">*<span></label></th>
          <td><select id="sexo" class="form-control" name="sexo" required>
            <option  required value="">Selecione:</option>
            <option value="Masculino" <?php if($sexo == 'Masculino') echo 'selected'; ?>>Masculino</option>
            <option value="Feminino" <?php if($sexo == 'Feminino') echo 'selected'; ?>>Feminino</option>
          </select> <div class="help-block with-errors"></div></td>
        </tr>
        <tr>
          <th><label for="telefone">Telefone:<span class="required">*</span></label></th>
          <td><input type="text" required placeholder="(xx)xxxx-xxxx" class="form-control" id="telefone" name="telefone" value="<?php echo htmlspecialchars($telefone); ?>"/>
          <div class="help-block with-errors"></div>
          </td>
        </tr>
        <tr>
          <th><label for="celular">Celular:<span class="required">*</span></label></th>
          <td><input type="text" required placeholder="(xx)xxxxx-xxxx" class="form-control" id="celular" name="celular" value="<?php echo htmlspecialchars($celular); ?>"/>
            <div class="help-block with-errors"></div>
          </td>
        </tr>
        <tr>
          <th><label for="email">Email:<span class="required">*</span></label></th>
          <td><input type="text" required placeholder="nome@mail.com" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"/>
            <div class="help-block with-errors"></div>
          </td>
        </tr>
        <tr>
          <th><label for="endereco">Endereço:<span class="required">*</span></label></th>
          <td><input type="text" required placeholder="Rua A, número 20, Centro" class="form-control" id="endereco" name="endereco" value="<?php echo htmlspecialchars($endereco); ?>"/>
            <div class="help-block with-errors"></div>
          </td>
        </tr>
        <tr>
          <th><label for="rg">RG:<span class="required">*</span></label></th>
          <td><input type="text" required placeholder="123456789-0" class="form-control" id="rg" name="rg" value="<?php echo htmlspecialchars($rg); ?>"/>
            <div class="help-block with-errors"></div>
          </td>
        </tr>
        <tr>
          <th><label for="cpf">CPF:<span class="cpf">*</span></label></th>
          <td><input type="text" required placeholder="123456789-0" class="form-control" id="cpf" name="cpf" value="<?php echo htmlspecialchars($cpf); ?>"/>
            <div class="help-block with-errors"></div>
          </td>
        </tr>
        <tr>
          <th><label for="situacao">Situação:<span class="required">*</span></label></th>
          <td><input type="text" required placeholder="Digite a situação..." class="form-control" id="situacao" name="situacao" value="<?php echo htmlspecialchars($situacao); ?>"/>
            <div class="help-block with-errors"></div>
          </td>
        </tr>
        <tr>
          <th><label for="taxa_rcs">RCS(%):<span class="required">*</span></label></th>
          <td><input type="text" required placeholder="Digite a % (somente número)" class="form-control" id="taxa_rcs" name="taxa_rcs" value="<?php echo htmlspecialchars($taxa_rcs); ?>"/>
            <div class="help-block with-errors"></div>
          </td>
        </tr>
      </table>
      <br/>
      <abbr title="Cadastrar Filiado"><input class="btn btn-primary" type="submit" value="Cadastrar"/></abbr>
      <abbr title="Cancelar cadastro"><input class="btn btn-danger" type="button" value="Cancelar" onclick="javascript: location.href='index.php';" /></abbr>
    </form>
  </div>

<?php
include("inc/footer.php");
?>
