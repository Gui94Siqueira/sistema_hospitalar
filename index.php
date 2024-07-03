<?php
    include_once ("routes/routeCargos.php");
    include_once ("routes/routeConsultas.php");
    include_once ("routes/routeExames.php");
    include_once ("routes/routeFuncionarios.php");
    include_once ("routes/routePacientes.php");
    include_once ("routes/routeProcedimentos_exames.php");
    include_once ("routes/routeStatus.php");
    include_once ("routes/routeTipos_procedimentos.php");

    $entity = $_GET['entity'];
    $action = $_GET['action'];

    switch($entity) {
        case 'exames':
            routeExames::handleRequest($action);
            break;
        
        case 'consultas':
            routeConsultas::handleRequest($action);
            break;

        case 'procedimentos_exame':
            routeProcedimentos_exame::handleRequest($action);
            break;
        
        case 'tipos_procedimentos':
            routeTipo_procedimentos::handleRequest($action);
            break;
             
        case 'funcionaios':
            routeFuncionarios::handleRequest($action);
            break;
        
        case 'pacientes':
            routePacientes::handleRequest($action);
            break;

        case 'status':
            routeStatus::handleRequest($action);
            break;
        
        case 'cargos':
            routeCargos::handleRequest($action);
            break;
        default:
            http_response_code(400);
            echo json_encode(['error' => 'Entidade inválida!']);
            break;
    }
?>