<?php

require_once 'database.php';
$database = new Database();

$method   = $_SERVER['REQUEST_METHOD'];
$path     = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path     = trim($path, '/');
$segments = explode('/', $path);

$id = isset($segments[2]) ? $segments[2] : null;

switch($method){

    // -------------------------------------------------------
    // GET /produtos 
    // -------------------------------------------------------
    case 'GET':
        $resultado = $database->executeQuery("
            SELECT 
                produtos.id, 
                produtos.nome, 
                produtos.preco, 
                categorias.nome AS categoria
            FROM produtos
            LEFT JOIN categorias 
                ON produtos.categoria_id = categorias.id
        ");

        $produtos = $resultado->fetchAll();

        echo json_encode([
            'status' => 'success',
            'data'   => $produtos
        ]);
        break;

    // -------------------------------------------------------
    // POST /produtos
    // -------------------------------------------------------
    case 'POST':
        $body = json_decode(file_get_contents('php://input'), true);

        $nome = isset($body['nome']) ? trim($body['nome']) : '';
        $preco = isset($body['preco']) ? $body['preco'] : 0;
        $categoria_id = isset($body['categoria_id']) ? $body['categoria_id'] : null;

        if(!$nome){
            echo json_encode([
                'status'  => 'error',
                'message' => 'O campo nome é obrigatório.'
            ]);
            break;
        }

        $database->executeQuery(
            "INSERT INTO produtos (nome, preco, categoria_id) 
             VALUES (:nome, :preco, :categoria_id)",
            [
                ':nome' => $nome,
                ':preco' => $preco,
                ':categoria_id' => $categoria_id
            ]
        );

        http_response_code(201);
        echo json_encode([
            'status' => 'success',
            'message' => 'Produto criado com sucesso.',
            'idProduto' => $database->lastInsertId()
        ]);
        break;

    // -------------------------------------------------------
    // PUT /produtos/1
    // -------------------------------------------------------
    case 'PUT':
        $body = json_decode(file_get_contents('php://input'), true);

        if(!$id || empty($body['nome'])){
            echo json_encode([
                'status' => 'error',
                'message' => 'ID ou nome inválido.'
            ]);
            break;
        }

        $database->executeQuery(
            "UPDATE produtos 
             SET nome = :nome, preco = :preco, categoria_id = :categoria_id 
             WHERE id = :id",
            [
                ':nome' => $body['nome'],
                ':preco' => $body['preco'],
                ':categoria_id' => $body['categoria_id'],
                ':id'   => $id
            ]
        );

        echo json_encode([
            'status' => 'success',
            'message' => 'Produto atualizado.'
        ]);
        break;

    // -------------------------------------------------------
    // DELETE /produtos/1
    // -------------------------------------------------------
    case 'DELETE':
        if(!$id){
            echo json_encode([
                'status' => 'error',
                'message' => 'ID não informado.'
            ]);
            break;
        }

        $database->executeQuery(
            "DELETE FROM produtos WHERE id = :id",
            [':id' => $id]
        );

        echo json_encode([
            'status' => 'success',
            'message' => 'Produto deletado com sucesso.'
        ]);
        break;

    // -------------------------------------------------------
    // Método não permitido
    // -------------------------------------------------------
    default:
        http_response_code(405);
        echo json_encode([
            'status'  => 'error',
            'message' => 'Método não permitido.'
        ]);
}

?>