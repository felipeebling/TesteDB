<?php 
require_once 'db.php';


$nomes = [
    "Felipe", "Bruno", "Eduardo", "Mariana", "Letícia", 
    "Gustavo", "Larissa", "Rodrigo", "Aline", "Ricardo", 
    "Patrícia", "Leonardo", "Camila", "Thiago", "Isabela", 
    "Vinícius", "Beatriz", "Marcelo", "Amanda", "Gabriel", 
    "Fernanda", "Rafael", "Júlia", "Daniel", "Carolina", 
    "André", "Bianca", "Lucas", "Vanessa", "Guilherme", 
    "Priscila", "Fernando", "Renata", "Diego", "Tatiane", 
    "Caio", "Monique", "Hugo", "Sabrina", "Renan", 
    "Débora", "Igor", "Natália", "Douglas", "Priscila", 
    "Vitor", "Talita", "Fábio", "Raquel", "Arthur"
];

try { 
    $pdo->beginTransaction();

    $sql = "INSERT INTO email (email) VALUES (:email)";
    $stmt = $pdo->prepare($sql);

     for($i = 0; $i <= 100000 ; $i++){

        $nroAleatorio =  rand(0,count($nomes) - 1);

        $stringAleatoria = uniqid();

        $email = "$nomes[$nroAleatorio].$stringAleatoria@Email.com ";

        $stmt->execute(['email' => $email]);

        if ($i % 10000 == 0) {
            echo "Progresso: $i registros inseridos... <br>";
            flush();
        }
}
    $pdo->commit();
}

catch(Exception $e) {
    $pdo->rollBack();
    echo "Erro: " . $e->getMessage();
}

?> 