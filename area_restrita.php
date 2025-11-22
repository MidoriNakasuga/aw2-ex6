<?php
session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    header('Location: login.php?msg=acesso_negado');
    exit();
}

$itens = [
    ['id' => 1, 'nome' => 'Notebook Dell', 'categoria' => 'Eletrônicos'],
    ['id' => 2, 'nome' => 'Mouse Logitech', 'categoria' => 'Periféricos'],
    ['id' => 3, 'nome' => 'Teclado Mecânico', 'categoria' => 'Periféricos'],
    ['id' => 4, 'nome' => 'Monitor LG 24"', 'categoria' => 'Eletrônicos'],
    ['id' => 5, 'nome' => 'Webcam HD', 'categoria' => 'Periféricos'],
    ['id' => 6, 'nome' => 'Headset Gamer', 'categoria' => 'Áudio'],
    ['id' => 7, 'nome' => 'Smartphone Samsung', 'categoria' => 'Eletrônicos'],
    ['id' => 8, 'nome' => 'Tablet iPad', 'categoria' => 'Eletrônicos'],
    ['id' => 9, 'nome' => 'Caixa de Som Bluetooth', 'categoria' => 'Áudio'],
    ['id' => 10, 'nome' => 'Microfone Profissional', 'categoria' => 'Áudio'],
    ['id' => 11, 'nome' => 'SSD 500GB', 'categoria' => 'Armazenamento'],
    ['id' => 12, 'nome' => 'HD Externo 1TB', 'categoria' => 'Armazenamento'],
    ['id' => 13, 'nome' => 'Impressora HP', 'categoria' => 'Escritório'],
    ['id' => 14, 'nome' => 'Scanner Epson', 'categoria' => 'Escritório'],
    ['id' => 15, 'nome' => 'Roteador Wi-Fi', 'categoria' => 'Redes']
];

$filtro = isset($_GET['filtro']) ? trim($_GET['filtro']) : '';
$categoria_filtro = isset($_GET['categoria']) ? trim($_GET['categoria']) : '';

$itens_filtrados = $itens;

if (!empty($filtro)) {
    $itens_filtrados = array_filter($itens_filtrados, function($item) use ($filtro) {
        return stripos($item['nome'], $filtro) !== false || stripos($item['categoria'], $filtro) !== false;
    });
}

if (!empty($categoria_filtro)) {
    $itens_filtrados = array_filter($itens_filtrados, function($item) use ($categoria_filtro) {
        return $item['categoria'] === $categoria_filtro;
    });
}

$categorias = array_unique(array_column($itens, 'categoria'));
sort($categorias);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Restrita - Sistema PHP</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .header h1 {
            font-size: 24px;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .logout-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 10px 20px;
            border: 2px solid white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s;
        }
        
        .logout-btn:hover {
            background: rgba(255,255,255,0.3);
        }
        
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .filter-section {
            margin-bottom: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
        }
        
        .filter-section h2 {
            color: #333;
            margin-bottom: 15px;
            font-size: 18px;
        }
        
        .filter-form {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: flex-end;
        }
        
        .form-group {
            flex: 1;
            min-width: 200px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: 500;
            font-size: 14px;
        }
        
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        
        .btn-group {
            display: flex;
            gap: 10px;
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }
        
        .btn:hover {
            transform: translateY(-2px);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            font-weight: 600;
        }
        
        tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        .no-results {
            text-align: center;
            padding: 40px;
            color: #999;
        }
        
        .result-count {
            color: #666;
            margin-bottom: 10px;
            font-size: 14px;
        }
        
        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .badge-eletronicos {
            background-color: #e3f2fd;
            color: #1976d2;
        }
        
        .badge-perifericos {
            background-color: #f3e5f5;
            color: #7b1fa2;
        }
        
        .badge-audio {
            background-color: #fff3e0;
            color: #f57c00;
        }
        
        .badge-armazenamento {
            background-color: #e8f5e9;
            color: #388e3c;
        }
        
        .badge-escritorio {
            background-color: #fce4ec;
            color: #c2185b;
        }
        
        .badge-redes {
            background-color: #e0f2f1;
            color: #00796b;
        }
    </style>
</head>
<body>
    <div class="header">
        <div>
            <h1>Área Restrita</h1>
            <p>Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome']); ?>!</p>
        </div>
        <div class="user-info">
            <a href="logout.php" class="logout-btn">Sair</a>
        </div>
    </div>
    
    <div class="container">
        <div class="filter-section">
            <h2>Filtrar Produtos</h2>
            <form method="GET" action="area_restrita.php" class="filter-form">
                <div class="form-group">
                    <label for="filtro">Buscar por nome:</label>
                    <input type="text" id="filtro" name="filtro" 
                           placeholder="Digite o nome do produto..." 
                           value="<?php echo htmlspecialchars($filtro); ?>">
                </div>
                
                <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <select id="categoria" name="categoria">
                        <option value="">Todas as categorias</option>
                        <?php foreach ($categorias as $cat): ?>
                            <option value="<?php echo htmlspecialchars($cat); ?>" 
                                    <?php echo ($categoria_filtro === $cat) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($cat); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                    <a href="area_restrita.php" class="btn btn-secondary">Limpar</a>
                </div>
            </form>
        </div>
        
        <div class="result-count">
            <strong><?php echo count($itens_filtrados); ?></strong> produto(s) encontrado(s)
        </div>
        
        <?php if (count($itens_filtrados) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($itens_filtrados as $item): 
                        $categoria_class = strtolower(str_replace(['ô', 'í', 'é', ' '], ['o', 'i', 'e', ''], $item['categoria']));
                    ?>
                        <tr>
                            <td><?php echo $item['id']; ?></td>
                            <td><?php echo htmlspecialchars($item['nome']); ?></td>
                            <td>
                                <span class="badge badge-<?php echo $categoria_class; ?>">
                                    <?php echo htmlspecialchars($item['categoria']); ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-results">
                Nenhum produto encontrado com os filtros aplicados.
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
