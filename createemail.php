<?php 

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

for($i = 0; $i <= 1000 ; $i++){

        $nroAleatorio =  rand(0,count($nomes) - 1);

        $stringAleatoria = uniqid();
        $email = "$nomes[$nroAleatorio].$stringAleatoria@Email.com ";

        echo " $email<br>" ;
}

?> 