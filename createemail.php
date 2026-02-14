<?php 
require_once 'db.php';
set_time_limit(0); // Para o PHP não parar no meio dos 100 mil registros

// LIMPEZA: Se houve um erro anterior, o Postgres trava. Isso destrava.
@pg_query($conecta, "ROLLBACK");

$nomes = [
    "Felipe", "Bruno", "Eduardo", "Mariana", "Letícia", 
    "Gustavo", "Larissa", "Rodrigo", "Aline", "Ricardo", 
    "Patrícia", "Leonardo", "Camila", "Thiago", "Isabela", 
    "Vinícius", "Beatriz", "Marcelo", "Amanda", "Gabriel", 
    "Fernanda", "Rafael", "Júlia", "Daniel", "Carolina", 
    "André", "Bianca", "Lucas", "Vanessa", "Guilherme", 
    "Priscila", "Fernando", "Renata", "Diego", "Tatiane", 
    "Caio", "Monique", "Hugo", "Sabrina", "Renan", 
    "Débora", "Igor", "Natália", "Douglas", "Vitor", "Talita", "Fábio", "Raquel", "Arthur"
];

try { 
    pg_query($conecta, "BEGIN");

    $sql = "INSERT INTO email (email) VALUES ($1)";

   
    $nomeComando = "identificador_" . uniqid();

    $preparo = pg_prepare($conecta, $nomeComando, $sql);


  

    for ($i = 0; $i <= 100000; $i++) {

        $nroAleatorio = rand(0, count($nomes) - 1);

        $stringAleatoria = uniqid();
        
        $emailGerado = $nomes[$nroAleatorio] . "." . $stringAleatoria . "@Email.com";

        $resultado = @pg_execute($conecta, $nomeComando, array($emailGerado));

        if (!$resultado) {
            throw new Exception("Erro no registro $i: " . pg_last_error($conecta));
        }

    
    }

    pg_query($conecta, "COMMIT");
   

} catch (Exception $e) {
    pg_query($conecta, "ROLLBACK");
    echo "Erro: " . $e->getMessage();
}
?>