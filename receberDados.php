<?php

$nome = readline("Digite o seu nome: ");
$dataNascimento = readline("Digite sua data de nascimento: ");
$altura = readline("Digite sua altura: "); #float
$denpendentes; #array

#serialização em XML

$w = new XMLWriter(); // Objetos XMLWriter escrevem documentos XML
$w->openMemory(); // Inicializa a memória para escrever o XML
$w->setIndent(1); // Ativa a opção de indentação
$w->setIndentString('  '); // Define a string usada para indentar

// Escrita do documento
$w->startDocument('1.0', 'UTF-8');

$w->startElement('pessoa');

$w->startElement('nome');
$w->text($nome);
$w->endElement();

$w->startElement('Data_nascimento');
$w->text($dataNascimento);

$w->startElement('Altura');
$w->text($altura);
$w->endElement();

$w->endElement(); // Encerra o elemento pessoa

$w->endDocument(); // Finaliza o documento

$resultado = $w->outputMemory(); // Acessa o documento como uma string

echo($resultado);