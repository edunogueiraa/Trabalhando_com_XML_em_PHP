<?php

$nomeDaPessoa = (string) readline("Digite o seu nome: ");
$dataNascimento = (string) readline("Digite sua data de nascimento: ");
$altura = (float) readline("Digite sua altura: ");
$dependentes = [];

while (true) {
    $nomeDoDependente = readline("Digite o nome do dependente e 'fim' para terminar: ");

    if ($nomeDoDependente == 'fim') {
        break;
    }

    $dataNascimentoDependente = readline("Digite a data de nascimento do dependente: ");
    $dependentes[] = ['nome' => $nomeDoDependente, 'dataNascimento' => $dataNascimentoDependente];
}

$w = new XMLWriter();
$w->openMemory();
$w->setIndent(1);
$w->setIndentString('  ');

$w->startDocument('1.0', 'UTF-8');

$w->startElement('pessoa');

$w->startElement('nome');
$w->text($nomeDaPessoa);
$w->endElement();

$w->startElement('dataNascimento');
$w->text($dataNascimento);
$w->endElement();

$w->startElement('altura');
$w->text($altura);
$w->endElement();

$w->startElement('dependentes');

foreach ($dependentes as $dependente) {
    $w->startElement('dependente');
    
    $w->startElement('nomeDep');
    $w->text($dependente['nome']);
    $w->endElement();
    
    $w->startElement('dataNascimentoDep');
    $w->text($dependente['dataNascimento']);
    $w->endElement();
    
    $w->endElement();
}
$w->endElement();

$w->endElement();
$w->endDocument();

$resultado = $w->outputMemory();

file_put_contents('pessoa.xml', $resultado);

echo "Salvo com sucesso!";