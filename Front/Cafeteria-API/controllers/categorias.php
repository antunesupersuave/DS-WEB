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
    // GET /categorias 
    // -------------------------------------------------------
    case 'GET':
        $resultado = $database->executeQuery('SELECT * FROM categorias');
        $categorias = $resultado->fetchAll();

        echo json_encode([
            'status' => 'success',
            'data'   => $categorias
        ]);
        break;

    // -------------------------------------------------------
    // POST /categorias
    // -------------------------------------------------------
    case 'POST':
        $body = json_decode(file_get_contents('php://input'), true);
        $nome = isset($body['nome']) ? trim($body['nome']) : '';

        if(!$nome){
            echo json_encode([
                'status'  => 'error',
                'message' => 'O campo nome é obrigatório.'
            ]);
            break;
        }

        $database->executeQuery(
            "INSERT INTO categorias (nome) VALUES (:nome)",
            [':nome' => $nome]
        );
        
        http_response_code(201);
        echo json_encode([
            'status'  => 'success',
            'message' => 'Categoria criada com sucesso.',
            'idCategoria' => $database->lastInsertId()
        ]);
        break;

    // -------------------------------------------------------
    // PUT /categorias/1
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
            "UPDATE categorias SET nome = :nome WHERE id = :id",
            [
                ':nome' => $body['nome'],
                ':id'   => $id
            ]
        );

        echo json_encode([
            'status' => 'success',
            'message' => 'Categoria atualizada.'
        ]);
        break;

    // -------------------------------------------------------
    // DELETE /categorias/1
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
            "DELETE FROM categorias WHERE id = :id",
            [':id' => $id]
        );

        echo json_encode([
            'status' => 'success',
            'message' => 'Categoria deletada com sucesso.'
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