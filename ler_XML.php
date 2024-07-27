<?php

$xml = simplexml_load_file('pessoa.xml');

$nome = (string)$xml->nome;
$dataNascimento = (string)$xml->dataNascimento;
$altura = (float)$xml->altura;

echo "-----------------------------------------------\n";
echo "Nome: ";
var_dump($nome);
echo "Data de Nascimento: ";
var_dump ($dataNascimento);
echo "Altura: ";
var_dump($altura);
echo "\n";


foreach ($xml->dependentes->dependente as $dependente) {
    $nomeDependente = (string)$dependente->nomeDep;
    $dataNascimentoDep = (string)$dependente->dataNascimentoDep;
    echo "Nome do dependente: ";
    var_dump($nomeDependente);
    echo "Data de nascimento do dependente: ";
    var_dump($dataNascimentoDep);
}
echo "-----------------------------------------------";