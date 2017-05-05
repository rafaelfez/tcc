<?php

//funçoes da aplicação

function mesErro($texto){
    echo '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$texto.'</div>';
}

function mesSucesso($texto){
  echo '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$texto.'</div>';
}

function mesAlerta($texto){
  echo '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$texto.'</div>';
}

function mesFalha($texto){
  echo '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$texto.'</div>';
}


function add_fil($matricula, $nome, $telefone, $nascimento, $rg, $cpf, $celular,
  $sexo, $email, $taxa_rcs, $pis, $carteiratrab, $eleitor, $banco, $agencia, $conta, $digito, $civil, $escolaridade,
  $cnhnum, $cnhtipo, $cnhvalidade, $endcep, $endrua, $endnum, $endbairro, $endcidade, $enduf){

  include 'conexao.php';

  $sql = "INSERT INTO filiado(matricula,nome,telefone,nascimento,rg,cpf,celular,sexo,email,taxa_rcs,"
  ."pis, carteiratrab, eleitor, banco, agencia, conta, digito, civil, escolaridade,"
  ."cnhnum, cnhtipo, cnhvalidade, endcep, endrua, endnum, endbairro, endcidade, enduf)"
  ." VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

  try {
    $resultado = $db->prepare($sql);
    $resultado->bindValue(1, $matricula, PDO::PARAM_INT);
    $resultado->bindValue(2, $nome, PDO::PARAM_STR);
    $resultado->bindValue(3, $telefone, PDO::PARAM_INT);
    $resultado->bindValue(4, $nascimento, PDO::PARAM_STR);
    $resultado->bindValue(5, $rg, PDO::PARAM_INT);
    $resultado->bindValue(6, $cpf, PDO::PARAM_INT);
    $resultado->bindValue(7, $celular, PDO::PARAM_INT);
    $resultado->bindValue(8, $sexo, PDO::PARAM_STR);
    $resultado->bindValue(9, $email, PDO::PARAM_INT);
    $resultado->bindValue(10, $taxa_rcs, PDO::PARAM_INT);
    $resultado->bindValue(11, $pis, PDO::PARAM_INT);
    $resultado->bindValue(12, $carteiratrab, PDO::PARAM_INT);
    $resultado->bindValue(13, $eleitor, PDO::PARAM_INT);
    $resultado->bindValue(14, $banco, PDO::PARAM_STR);
    $resultado->bindValue(15, $agencia, PDO::PARAM_INT);
    $resultado->bindValue(16, $conta, PDO::PARAM_INT);
    $resultado->bindValue(17, $digito, PDO::PARAM_INT);
    $resultado->bindValue(18, $civil, PDO::PARAM_STR);
    $resultado->bindValue(19, $escolaridade, PDO::PARAM_STR);
    $resultado->bindValue(20, $cnhnum, PDO::PARAM_INT);
    $resultado->bindValue(21, $cnhtipo, PDO::PARAM_STR);
    $resultado->bindValue(22, $cnhvalidade, PDO::PARAM_STR);
    $resultado->bindValue(23, $endcep, PDO::PARAM_INT);
    $resultado->bindValue(24, $endrua, PDO::PARAM_STR);
    $resultado->bindValue(25, $endnum, PDO::PARAM_INT);
    $resultado->bindValue(26, $endbairro, PDO::PARAM_STR);
    $resultado->bindValue(27, $endcidade, PDO::PARAM_STR);
    $resultado->bindValue(28, $enduf, PDO::PARAM_STR);
    $resultado->execute();

  } catch (Exception $e) {

    //echo $e->getCode();

    echo "Error!: " . $e->getMessage(). "<br />";

      mesErro('Matrícula já cadastrada. Por favor, verifique o número e tente novamente.');

    return false;
  }
  return true;
}


function add_dep($afiliado_matricula, $nome, $telefone, $nascimento, $rg, $cpf, $celular, $sexo, $email,
  $eleitor, $civil, $parentesco, $principal, $endcep, $endrua, $endnum, $endbairro, $endcidade, $enduf){

  include 'conexao.php';

  $sql = "INSERT INTO dependente(Afiliado_matricula, nome, telefone, nascimento, rg, cpf, celular, sexo, email,"
    ."eleitor, civil, parentesco, principal, endcep, endrua, endnum, endbairro, endcidade, enduf)"
    ." VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

  try{
    if(get_filiado($afiliado_matricula)==true){
      $resultado = $db->prepare($sql);
      $resultado->bindValue(1, $afiliado_matricula, PDO::PARAM_INT);
      $resultado->bindValue(2, $nome, PDO::PARAM_STR);
      $resultado->bindValue(3, $telefone, PDO::PARAM_INT);
      $resultado->bindValue(4, $nascimento, PDO::PARAM_STR);
      $resultado->bindValue(5, $rg, PDO::PARAM_INT);
      $resultado->bindValue(6, $cpf, PDO::PARAM_INT);
      $resultado->bindValue(7, $celular, PDO::PARAM_INT);
      $resultado->bindValue(8, $sexo, PDO::PARAM_STR);
      $resultado->bindValue(9, $email, PDO::PARAM_STR);
      $resultado->bindValue(10, $eleitor, PDO::PARAM_INT);
      $resultado->bindValue(11, $civil, PDO::PARAM_STR);
      $resultado->bindValue(12, $parentesco, PDO::PARAM_STR);
      $resultado->bindValue(13, $principal, PDO::PARAM_INT);
      $resultado->bindValue(14, $endcep, PDO::PARAM_INT);
      $resultado->bindValue(15, $endrua, PDO::PARAM_STR);
      $resultado->bindValue(16, $endnum, PDO::PARAM_INT);
      $resultado->bindValue(17, $endbairro, PDO::PARAM_STR);
      $resultado->bindValue(18, $endcidade, PDO::PARAM_STR);
      $resultado->bindValue(19, $enduf, PDO::PARAM_STR);
      $resultado->execute();
    }else{
      mesErro('Matrícula não cadastrada. Por favor, verifique o número e tente novamente.');
      return false;
    }
      } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return true;
}

function add_con($cnpj,$nome,$categoria, $empresa, $mensalidade, $desconto, $DAS_Afiliado_Matricula, $RCS_Afiliado_Matricula){
  include 'conexao.php';

  $sql = "INSERT INTO convenio(cnpj,nome,categoria,empresa,mensalidade,desconto,DAS_Afiliado_Matricula,RCS_Afiliado_Matricula) VALUES(?,?,?,?,?,?,?,?)";
  try {
    $resultado = $db->prepare($sql);
  	$resultado->bindValue(1, $cnpj, PDO::PARAM_INT);
    $resultado->bindValue(2, $nome, PDO::PARAM_STR);
    $resultado->bindValue(3, $categoria, PDO::PARAM_STR);
    $resultado->bindValue(4, $empresa, PDO::PARAM_STR);
    $resultado->bindValue(5, $mensalidade, PDO::PARAM_INT);
    $resultado->bindValue(6, $desconto, PDO::PARAM_STR);
    $resultado->bindValue(7, $DAS_Afiliado_Matricula, PDO::PARAM_INT);
    $resultado->bindValue(8, $RCS_Afiliado_Matricula, PDO::PARAM_INT);
    $resultado->execute();
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return true;
}

function alterarFiliado($matricula, $nome, $telefone, $nascimento, $rg, $cpf, $celular,
  $sexo, $email, $taxa_rcs, $pis, $carteiratrab, $eleitor, $banco, $agencia, $conta, $digito, $civil, $escolaridade,
  $cnhnum, $cnhtipo, $cnhvalidade, $endcep, $endrua, $endnum, $endbairro, $endcidade, $enduf){

  include 'conexao.php';

  $sql = "UPDATE filiado SET nome = ?, telefone = ?, nascimento = ?, rg = ?, cpf = ?, celular = ?, sexo = ?, email = ?, taxa_rcs = ?, pis = ?, carteiratrab = ?, eleitor = ?, banco = ?, agencia = ?, conta = ?, digito = ?, civil = ?, escolaridade = ?, cnhnum = ?, cnhtipo = ?, cnhvalidade = ?, endcep = ?, endrua = ?, endnum = ?, endbairro = ?, endcidade = ?, enduf = ? WHERE matricula = ?";

  try {
    $resultado = $db->prepare($sql);
    $resultado->bindValue(1, $nome, PDO::PARAM_STR);
    $resultado->bindValue(2, $telefone, PDO::PARAM_INT);
    $resultado->bindValue(3, $nascimento, PDO::PARAM_STR);
    $resultado->bindValue(4, $rg, PDO::PARAM_INT);
    $resultado->bindValue(5, $cpf, PDO::PARAM_INT);
    $resultado->bindValue(6, $celular, PDO::PARAM_INT);
    $resultado->bindValue(7, $sexo, PDO::PARAM_STR);
    $resultado->bindValue(8, $email, PDO::PARAM_INT);
    $resultado->bindValue(9, $taxa_rcs, PDO::PARAM_INT);
    $resultado->bindValue(10, $pis, PDO::PARAM_INT);
    $resultado->bindValue(11, $carteiratrab, PDO::PARAM_INT);
    $resultado->bindValue(12, $eleitor, PDO::PARAM_INT);
    $resultado->bindValue(13, $banco, PDO::PARAM_STR);
    $resultado->bindValue(14, $agencia, PDO::PARAM_INT);
    $resultado->bindValue(15, $conta, PDO::PARAM_INT);
    $resultado->bindValue(16, $digito, PDO::PARAM_INT);
    $resultado->bindValue(17, $civil, PDO::PARAM_STR);
    $resultado->bindValue(18, $escolaridade, PDO::PARAM_STR);
    $resultado->bindValue(19, $cnhnum, PDO::PARAM_INT);
    $resultado->bindValue(20, $cnhtipo, PDO::PARAM_STR);
    $resultado->bindValue(21, $cnhvalidade, PDO::PARAM_STR);
    $resultado->bindValue(22, $endcep, PDO::PARAM_INT);
    $resultado->bindValue(23, $endrua, PDO::PARAM_STR);
    $resultado->bindValue(24, $endnum, PDO::PARAM_INT);
    $resultado->bindValue(25, $endbairro, PDO::PARAM_STR);
    $resultado->bindValue(26, $endcidade, PDO::PARAM_STR);
    $resultado->bindValue(27, $enduf, PDO::PARAM_STR);
    $resultado->bindValue(28, $matricula, PDO::PARAM_INT);
    $resultado->execute();
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return true;
}

function alterarDependente($afiliado_matricula, $nome, $telefone, $nascimento, $rg, $cpf, $celular, $sexo, $email,
  $eleitor, $civil, $parentesco, $principal, $endcep, $endrua, $endnum, $endbairro, $endcidade, $enduf){
  include 'conexao.php';

  $sql = "UPDATE dependente SET Afiliado_matricula = ?, nome = ?, telefone = ?, nascimento = ?, rg = ?, celular = ?, sexo = ?, email = ?, eleitor = ?, civil = ?, parentesco = ?, principal = ?, endcep = ?, endrua = ?, endnum = ?, endbairro = ?, endcidade = ?, enduf = ? WHERE cpf = ?";

  try{
  	$resultado = $db->prepare($sql);
    $resultado->bindValue(1, $afiliado_matricula, PDO::PARAM_INT);
    $resultado->bindValue(2, $nome, PDO::PARAM_STR);
    $resultado->bindValue(3, $telefone, PDO::PARAM_INT);
    $resultado->bindValue(4, $nascimento, PDO::PARAM_STR);
    $resultado->bindValue(5, $rg, PDO::PARAM_INT);
    $resultado->bindValue(6, $celular, PDO::PARAM_INT);
    $resultado->bindValue(7, $sexo, PDO::PARAM_STR);
    $resultado->bindValue(8, $email, PDO::PARAM_STR);
    $resultado->bindValue(9, $eleitor, PDO::PARAM_INT);
    $resultado->bindValue(10, $civil, PDO::PARAM_STR);
    $resultado->bindValue(11, $parentesco, PDO::PARAM_STR);
    $resultado->bindValue(12, $principal, PDO::PARAM_INT);
    $resultado->bindValue(13, $endcep, PDO::PARAM_INT);
    $resultado->bindValue(14, $endrua, PDO::PARAM_STR);
    $resultado->bindValue(15, $endnum, PDO::PARAM_INT);
    $resultado->bindValue(16, $endbairro, PDO::PARAM_STR);
    $resultado->bindValue(17, $endcidade, PDO::PARAM_STR);
    $resultado->bindValue(18, $enduf, PDO::PARAM_STR);
    $resultado->bindValue(19, $cpf, PDO::PARAM_INT);
    $resultado->execute();
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return true;
}

function alterarConvenio($cnpj,$nome,$categoria, $empresa, $mensalidade, $desconto){
  include 'conexao.php';

  $sql = "UPDATE convenio SET nome =  ?, categoria =  ?, empresa =  ?, mensalidade =  ?, desconto =  ? WHERE cnpj = ?";
  try {
    $resultado = $db->prepare($sql);
    $resultado->bindValue(1, $nome, PDO::PARAM_STR);
    $resultado->bindValue(2, $categoria, PDO::PARAM_STR);
    $resultado->bindValue(3, $empresa, PDO::PARAM_STR);
    $resultado->bindValue(4, $mensalidade, PDO::PARAM_INT);
    $resultado->bindValue(5, $desconto, PDO::PARAM_STR);
    $resultado->bindValue(6, $cnpj, PDO::PARAM_INT);
    $resultado->execute();
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return true;
}

function get_devedores() {
    include 'conexao.php';

      try {
          return $db->query('SELECT afiliado.nome, afiliado.celular, folhadepagamento.devendo, folhadepagamento.mes FROM afiliado
                              INNER JOIN folhadepagamento ON afiliado.matricula = folhadepagamento.Afiliado_matricula
                                WHERE folhadepagamento.devendo > 0 ORDER BY folhadepagamento.idPagamento DESC');
      } catch (Exception $e) {
          echo "Error!: " . $e->getMessage() . "<br />";
          return array();
      }
}



function get_convenio() {
  include 'conexao.php';

  try {
      return $db->query('SELECT nome, mensalidade, desconto FROM convenio');
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return array();
  }
}


function pagamento($afiliado_matricula,$taxa_rcs, $bruto, $unimed, $uniodonto, $rcs, $das, $mes, $ano, $descontounimed, $descontouniodonto){
  include 'conexao.php';

  if(get_filiado($afiliado_matricula)==true){
      if(unico($afiliado_matricula, $mes, $ano)==false){
        try {
          $statement = $db->query("SELECT taxa_rcs FROM afiliado WHERE matricula = $afiliado_matricula");
          $result = $statement->fetch();
          $taxa_rcs = $result[0];
        } catch (Exception $e) {
            echo "Error!: " . $e->getMessage() . "<br />";
            return array();
        }
    }else{
      mesErro('Já existe um pagamento para este Filiado neste período.');
      return false;
    }
  }else{
    mesErro('Matrícula não cadastrada. Por favor, verifique o número e tente novamente.');
    return false;
  }

  $rcs = ($bruto*$taxa_rcs)/100;
  $salario = $bruto - $rcs;
  $das = $salario * 0.1;
  $salario = $salario - $das;

  if($descontounimed == 'DAS'){
      $das = $das - $unimed;
  }elseif ($descontounimed == 'RCS') {
      $rcs = $rcs - $unimed;
  }

  if($descontouniodonto == 'DAS'){
      $das = $das - $uniodonto;
  }elseif ($descontouniodonto == 'RCS') {
      $rcs = $rcs - $uniodonto;
  }

  if($rcs>0){
    $salario = $salario+$rcs;
    $devendo = 0;
  }else{
    $devendo = abs($rcs);
    $rcs = 0;
  }

  if($das<0){
    $devendo = $devendo + abs($das);
    $das=0;
  }


  $query1 = "INSERT INTO folhadepagamento(bruto, salario, das, rcs, taxa_rcs, devendo, mes, ano, Afiliado_matricula, unimed, uniodonto) VALUES(?,?,?,?,?,?,?,?,?,?,?)";

  if($bruto>=0){
    try {
      $resultado = $db->prepare($query1);
      $resultado->bindValue(1, $bruto, PDO::PARAM_INT);
      $resultado->bindValue(2, $salario, PDO::PARAM_STR);
      $resultado->bindValue(3, $das, PDO::PARAM_STR);
      $resultado->bindValue(4, $rcs, PDO::PARAM_INT);
      $resultado->bindValue(5, $taxa_rcs, PDO::PARAM_INT);
      $resultado->bindValue(6, $devendo, PDO::PARAM_INT);
      $resultado->bindValue(7, $mes, PDO::PARAM_STR);
      $resultado->bindValue(8, $ano, PDO::PARAM_INT);
      $resultado->bindValue(9, $afiliado_matricula, PDO::PARAM_INT);
      $resultado->bindValue(10, $unimed, PDO::PARAM_INT);
      $resultado->bindValue(11, $uniodonto, PDO::PARAM_INT);
      $resultado->execute();
    } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
    }
  }
  return "Bruto:" . $bruto . " Salario:" .$salario. " RCS:" . $rcs . " DAS:" . $das . " Devendo:" . $devendo . " Desc Unimed:" . $descontounimed . " Desc Uniodonto:" . $descontouniodonto;
}

function unico($matricula, $mes, $ano){
  //função para não haver dois ou mais pagamentos no mesmo periodo da mesma pessoa

    include 'conexao.php';

    $sql = "SELECT * FROM folhadepagamento WHERE Afiliado_matricula = $matricula AND mes='$mes' AND ano='$ano'";

    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $matricula, PDO::PARAM_INT);
        $results->bindValue(2, $mes, PDO::PARAM_STR);
        $results->bindValue(3, $ano, PDO::PARAM_STR);
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return $results->fetchAll(PDO::FETCH_ASSOC);
}

function adicional($afiliado_matricula, $mes, $ano, $adicional){

  include 'conexao.php';

  try {
    if(get_filiado($afiliado_matricula)==true){
      $statement = $db->query("SELECT devendo FROM folhadepagamento WHERE Afiliado_matricula = $afiliado_matricula AND ano= '$ano' AND mes='$mes'");
      $result = $statement->fetch();
      $devendo = $result[0];
    }else{
      mesErro('Matrícula não cadastrada. Por favor, verifique o número e tente novamente.');
      return false;
    }
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return array();
  }

  if($adicional==$devendo){
    $query = "UPDATE folhadepagamento SET adicional=?, devendo=0 WHERE Afiliado_matricula=? AND ano=? AND mes=?";
    try {
        $resultado = $db->prepare($query);
        $resultado->bindValue(1, $adicional, PDO::PARAM_INT);
        $resultado->bindValue(2, $afiliado_matricula, PDO::PARAM_INT);
        $resultado->bindValue(3, $ano, PDO::PARAM_INT);
        $resultado->bindValue(4, $mes, PDO::PARAM_STR);;
        $resultado->execute();
      } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
      }
    }else{
      mesErro('Adicional diferente do valor Devendo');
      return false;
    }
    return true;
}


function get_das(){
  include 'conexao.php';

  try {
    $statement = $db->query("SELECT SUM(das) from folhadepagamento");
    $result = $statement->fetch();
    $das = $result[0];
  } catch (Exception $e) {
    echo "Error!: " . $e->getr() . "<br />";
    return false;
  }
  return $das;
}

function get_pagamentos_das(){
  include 'conexao.php';

  try {
    return $db->query("SELECT idPagamento, Afiliado_matricula, salario, mes, ano, das FROM folhadepagamento");
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
}

function get_filiado($matricula){
    include 'conexao.php';

    $sql = 'SELECT matricula,nome,telefone,nascimento,rg,cpf,celular,sexo,email,taxa_rcs, pis, carteiratrab, eleitor, banco, agencia, conta, digito, civil, escolaridade, cnhnum, cnhtipo, cnhvalidade, endcep, endrua, endnum, endbairro, endcidade, enduf FROM filiado WHERE matricula = ?';

    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $matricula, PDO::PARAM_INT);
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return $results->fetch();
}

function lista_filiado($matricula){
  include 'conexao.php';

  if($matricula==''){
    $sql = 'SELECT nome, matricula, celular, taxa_rcs FROM filiado';
  }else{
    $sql = 'SELECT nome, matricula, nascimento, sexo, telefone, celular, email, rg, cpf, endereco, taxa_rcs FROM filiado WHERE matricula = ?';
  }

  try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $matricula, PDO::PARAM_INT);
      $results->execute();
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
  }
  return $results->fetchAll(PDO::FETCH_ASSOC);
}


function get_dependente($cpf) {
  include 'conexao.php';

  $sql = 'SELECT Afiliado_matricula, nome, telefone, nascimento, rg, cpf, celular, sexo, email, eleitor, civil, parentesco, principal, endcep, endrua, endnum, endbairro, endcidade, enduf FROM dependente WHERE cpf = ?';

  try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $cpf, PDO::PARAM_INT);
      $results->execute();
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
  }
  return $results->fetch();
}

function lista_dependente($matricula){
  include 'conexao.php';

  if($matricula==''){
    $sql = 'SELECT nome, nascimento, sexo, telefone, celular, email, rg, cpf, endereco, parentesco, Afiliado_matricula FROM dependente';
  }else{
    $sql = 'SELECT nome, nascimento, sexo, telefone, celular, email, rg, cpf, endereco, parentesco, Afiliado_matricula FROM dependente WHERE Afiliado_matricula = ?';
  }

  try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $matricula, PDO::PARAM_INT);
      $results->execute();
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
  }
  return $results->fetchAll(PDO::FETCH_ASSOC);

}

function get_pagamentos($id){
  include 'conexao.php';

  $sql = 'SELECT Afiliado_matricula, ano, mes, bruto, unimed, uniodonto, adicional, das, rcs, salario, devendo, idPagamento FROM folhadepagamento WHERE idPagamento = ?';

  try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $id, PDO::PARAM_INT);
      $results->execute();
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
  }
  return $results->fetch();
}

function listaPagamentos($matricula){
  include 'conexao.php';

  if($matricula==''){
    $sql = 'SELECT Afiliado_matricula, ano, mes, bruto, unimed, uniodonto, adicional, das, rcs, salario, devendo, idPagamento FROM folhadepagamento';
  }else{
    $sql = 'SELECT Afiliado_matricula, ano, mes, bruto, unimed, uniodonto, adicional, das, rcs, salario, devendo, idPagamento FROM folhadepagamento WHERE Afiliado_matricula = ?';
  }

  try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $matricula, PDO::PARAM_INT);
      $results->execute();
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
  }
  return $results->fetchAll(PDO::FETCH_ASSOC);
}




function alterarPagamento($Afiliado_matricula, $ano, $mes, $bruto, $unimed, $uniodonto, $adicional, $das, $rcs, $salario, $devendo, $idPagamento) {
  include 'conexao.php';


  $sql = "UPDATE folhadepagamento SET Afiliado_matricula = ?, ano = ?, mes = ?, bruto = ?, unimed = ?, uniodonto = ?, adicional = ?, das = ?, rcs = ?, salario = ?, devendo = ? WHERE idPagamento = ?";

  try {
    $resultado = $db->prepare($sql);
    $resultado->bindValue(1, $Afiliado_matricula, PDO::PARAM_INT);
    $resultado->bindValue(2, $ano, PDO::PARAM_INT);
    $resultado->bindValue(3, $mes, PDO::PARAM_STR);
    $resultado->bindValue(4, $bruto, PDO::PARAM_INT);
    $resultado->bindValue(5, $unimed, PDO::PARAM_INT);
    $resultado->bindValue(6, $uniodonto, PDO::PARAM_INT);
    $resultado->bindValue(7, $adicional, PDO::PARAM_INT);
    $resultado->bindValue(8, $das, PDO::PARAM_STR);
    $resultado->bindValue(9, $rcs, PDO::PARAM_INT);
    $resultado->bindValue(10, $salario, PDO::PARAM_INT);
    $resultado->bindValue(11, $devendo, PDO::PARAM_INT);
    $resultado->bindValue(12, $idPagamento, PDO::PARAM_INT);
    $resultado->execute();
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return true;

}

function get_celular(){
  include 'conexao.php';

  $sql = "SELECT celular from afiliado";

  try {
      $results = $db->prepare($sql);
      $results->execute();
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
  }
  return $results->fetchAll(PDO::FETCH_ASSOC);
}

function encargo($afiliado_matricula, $mes, $ano, $decimoterceiro, $refeicao, $ferias){

  include 'conexao.php';

  $query = "INSERT INTO encargo(Afiliado_matricula, mes, ano, decimoterceiro, refeicao, ferias) VALUES(?,?,?,?,?,?)";

  if(get_filiado($afiliado_matricula)==true){
    if(unico($afiliado_matricula, $mes, $ano)==false){
      try {
        $resultado = $db->prepare($query);
        $resultado->bindValue(1, $afiliado_matricula, PDO::PARAM_INT);
        $resultado->bindValue(2, $mes, PDO::PARAM_STR);
        $resultado->bindValue(3, $ano, PDO::PARAM_INT);
        $resultado->bindValue(4, $decimoterceiro, PDO::PARAM_INT);
        $resultado->bindValue(5, $refeicao, PDO::PARAM_INT);
        $resultado->bindValue(6, $ferias, PDO::PARAM_INT);
        $resultado->execute();
        } catch (Exception $e) {
          echo "Error!: " . $e->getMessage() . "<br />";
          return false;
        }
        }else{
        mesErro('Já existe encargos para esse Filiado neste período.');
        return false;
      }
      }else{
      mesErro('Matrícula não cadastrada.');
      return false;
    }
  return true;
}

function get_encargos($id){
  include 'conexao.php';

  $sql = 'SELECT Afiliado_matricula, mes, ano, decimoterceiro, refeicao, ferias, idEncargo FROM encargo WHERE idEncargo = ?';

  try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $id, PDO::PARAM_INT);
      $results->execute();
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
  }
  return $results->fetch();
}

function listaEncargos($matricula){
  include 'conexao.php';

  if($matricula==''){
    $sql = 'SELECT Afiliado_matricula, mes, ano, decimoterceiro, refeicao, ferias, idEncargo FROM encargo';
  }else{
    $sql = 'SELECT Afiliado_matricula, mes, ano, decimoterceiro, refeicao, ferias, idEncargo FROM encargo WHERE Afiliado_matricula = ?';
  }

  try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $matricula, PDO::PARAM_INT);
      $results->execute();
  } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
  }
  return $results->fetchAll(PDO::FETCH_ASSOC);
}

function alterarEncargo($afiliado_matricula, $mes, $ano, $decimoterceiro, $refeicao, $ferias, $id){
  include 'conexao.php';

  $sql = "UPDATE encargo SET Afiliado_matricula = ?, mes = ?, ano = ?, decimoterceiro = ?, refeicao = ?, ferias = ?  WHERE idEncargo = ?";

  if(get_filiado($afiliado_matricula)==true){
    try {
      $resultado = $db->prepare($sql);
      $resultado->bindValue(1, $afiliado_matricula, PDO::PARAM_INT);
      $resultado->bindValue(2, $mes, PDO::PARAM_STR);
      $resultado->bindValue(3, $ano, PDO::PARAM_INT);
      $resultado->bindValue(4, $decimoterceiro, PDO::PARAM_INT);
      $resultado->bindValue(5, $refeicao, PDO::PARAM_INT);
      $resultado->bindValue(6, $ferias, PDO::PARAM_INT);
      $resultado->bindValue(7, $id, PDO::PARAM_INT);
      $resultado->execute();
      } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
      }
      }else{
      mesErro('Matrícula não cadastrada. Por favor, verifique o número e tente novamente.');
      return false;
    }
  return true;
}
