<?php
    include_once './mysql.php';

    //  Realiza a busca na base de dados
    $con = new Conexao();
    $link = $con->conexao();

    $request = mysqli_real_escape_string($link, $_POST["query"]);

    $query = "SELECT * FROM cessacao WHERE nome LIKE '%" . $request . "%'";
    
    $result = mysqli_query($link, $query);

    $data = array();

    if(mysqli_num_rows($result) > 0) {
        while ($row =  mysqli_fetch_assoc($result)) {
            $data[] = $row["nome"];
        }
        echo json_encode($data);
    }
?>