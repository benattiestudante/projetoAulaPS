<?php 

header('Content-Type: application/json');

$materias = json_decode(file_get_contents('php://input'), true);
$aGrade = [];

foreach($materias as $materia){
 
}

print_r($materias);
echo "olá";