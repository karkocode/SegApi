<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Set content type
header('Content-Type: application/json');

// Include the shared DB connection
require_once 'conexao.php';
$con->set_charset("utf8");

// Get JSON input
$jsonParam = json_decode(file_get_contents('php://input'), true);

if (!$jsonParam) {
    echo json_encode(['success' => false, 'message' => 'Dados JSON inválidos ou ausentes.']);
    exit;
}

// Extract and validate data
$nome            = trim($jsonParam['nome'] ?? '');
$email           = trim($jsonParam['email'] ?? '');
$senha           = trim($jsonParam['senha'] ?? '');
$perfil          = intval($jsonParam['perfil'] ?? 0);
$sexo            = intval($jsonParam['sexo'] ?? 0);
$aceiteTermos    = !empty($jsonParam['aceiteTermos']) ? 1 : 0;
$dataNascimento  = !empty($jsonParam['dataNascimento']) ? date('Y-m-d', strtotime($jsonParam['dataNascimento'])) : null;

// Validate required fields
if (empty($nome) || empty($email) || empty($senha) || !$perfil || !$sexo || !$dataNascimento) {
    echo json_encode(['success' => false, 'message' => 'Campos obrigatórios ausentes.']);
    exit;
}

// Prepare and bind
$stmt = $con->prepare("
    INSERT INTO Usuario (nome, email, senha, perfil, sexo, aceiteTermos, dataNascimento)
    VALUES (?, ?, ?, ?, ?, ?, ?)
");

if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Erro ao preparar a consulta: ' . $con->error]);
    exit;
}

$stmt->bind_param("sssiiis", $nome, $email, $senha, $perfil, $sexo, $aceiteTermos, $dataNascimento);

// Execute and return result
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Usuário inserido com sucesso!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro no registro do usuário: ' . $stmt->error]);
}

$stmt->close();
$con->close();
?>