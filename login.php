<?php
session_start();

$erro = isset($_GET['erro']) ? $_GET['erro'] : '';
$mensagem = isset($_GET['msg']) ? $_GET['msg'] : '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login - PHP</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .login-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }
        
        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: 500;
        }
        
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        
        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }
        
        .btn:hover {
            transform: translateY(-2px);
        }
        
        .alert {
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .alert-error {
            background-color: #fee;
            color: #c33;
            border: 1px solid #fcc;
        }
        
        .alert-info {
            background-color: #e7f3ff;
            color: #0066cc;
            border: 1px solid #b3d9ff;
        }
        
        .info-box {
            margin-top: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-left: 4px solid #667eea;
            border-radius: 5px;
        }
        
        .info-box h3 {
            color: #667eea;
            margin-bottom: 10px;
            font-size: 14px;
        }
        
        .info-box p {
            color: #666;
            font-size: 13px;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login do Sistema</h1>
        
        <?php if ($erro == 'invalido'): ?>
            <div class="alert alert-error">
                Usuário ou senha inválidos. Tente novamente.
            </div>
        <?php endif; ?>
        
        <?php if ($mensagem == 'acesso_negado'): ?>
            <div class="alert alert-error">
                Acesso negado. Faça login primeiro.
            </div>
        <?php endif; ?>
        
        <?php if ($mensagem == 'logout'): ?>
            <div class="alert alert-info">
                Logout realizado com sucesso!
            </div>
        <?php endif; ?>
        
        <form action="valida_login.php" method="POST">
            <div class="form-group">
                <label for="usuario">Usuário:</label>
                <input type="text" id="usuario" name="usuario" required autofocus>
            </div>
            
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            
            <button type="submit" class="btn">Entrar</button>
        </form>
        
        <div class="info-box">
            <h3>Credenciais de Teste:</h3>
            <p><strong>Usuário:</strong> admin</p>
            <p><strong>Senha:</strong> 123456</p>
        </div>
    </div>
</body>
</html>
