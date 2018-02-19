<?php 
     
     require_once '../db/Connection.php';

     $dataIni = $_POST['dataI'];
     $dataFin = $_POST['dataF'];
     $idU     = $_POST['idUser'];

     getRelatorio($dataIni, $dataFin, $idU);
 

    function getRelatorio($dataI, $dataF, $idUser){

        $pdo = connection();

        if($idUser == 0){
            $filtro = '<>';
        }else{
            $filtro = '=';
        }

        $relatorio = $pdo->prepare("select      h.id,
                                                date_format(h.data, '%d/%m/%Y') as data, 
                                                u.nome, 
                                                h.operacao
                                    from        historicos h
                                    inner join  usuarios u on u.id = h.idUsuario
                                    where data  between :dataInicial and :dataFinal
                                    and         idUsuario {$filtro} :codigo"
                                );
        $relatorio->bindValue(":dataInicial", $dataI);
        $relatorio->bindValue(":dataFinal",   $dataF);
        $relatorio->bindValue(":codigo",      $idUser);
        $relatorio->execute();
        
        while($row = $relatorio->fetch(PDO::FETCH_ASSOC)){
            $listRel[$row['id']]['id']     = $row['id'];
            $listRel[$row['id']]['data']     = $row['data'];
            $listRel[$row['id']]['nome']     = $row['nome'];
            $listRel[$row['id']]['operacao'] = $row['operacao'];
        }

        echo json_encode($listRel);

    }


?>