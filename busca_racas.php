<?php
    include_once"conexao.php";
    $tipo_id = $_POST["tipo_id"];

    $query = "SELECT r_id, r_nome FROM cadastro_raca WHERE r_tipos = $tipo_id ORDER BY r_nome ASC";

    $sql = $mysqli->query($query) or die($mysqli->error);
?>
<option disabled selected value="">Selecione uma Opção</option>';
<?php
    while($raca = $sql->fetch_array()){
?>
<option value="<?php echo $raca["r_id"];?>"><?php echo $raca["r_nome"];?></option>
<?php
}
?>