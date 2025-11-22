<?php
session_start();

$usuarios = [
    [
        'usuario' => 'admin',
        'senha' => '123456',
        'nome' => 'Administrador'
    ],
    [
        'usuario' => 'user',
        'senha' => 'senha123',
        'nome' => 'Usuário Comum'
    ]
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
    $senha = isset($_POST['senha']) ? trim($_POST['senha']) : '';
    
    $autenticado = false;
    $nome_usuario = '';
    
    foreach ($usuarios as $user) {
        if ($user['usuario'] === $usuario && $user['senha'] === $senha) {
            $autenticado = true;
            $nome_usuario = $user['nome'];
            break;
        }
    }
    
    if ($autenticado) {
        $_SESSION['autenticado'] = true;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nome'] = $nome_usuario;
        
        header('Location: area_restrita.php');
        exit();
    } else {
        header('Location: login.php?erro=invalido');
        exit();
    }
} else {
    header('Location: login.php');
    exit();
}
?>
