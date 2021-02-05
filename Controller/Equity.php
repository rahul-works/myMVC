<?php

/**
 * @File : Equity.php Controller
 * @Class : Controller_Equity
 * @Date : 21 Jan 2021
 * @Description	: Equity module operations
*/

require_once (__DIR__ .'/../vendor/autoload.php');

class Equity {
    
    public function __construct() {
        // if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
        //     header('Location: /'); exit;
        // }
    }
    
    public function __destruct() {}

    public function index() {
        $equity_s = new EquityS();
        
        // $contentView = new View(__DIR__ .'/../Views/Equity/List');
        
        // $contentView->equity = $equity_s->get();
        // $listHeader = new View(__DIR__ .'/../Views/Equity/listHeader');
        // $contentView->listHeader = $listHeader->render();
        
        // $templateView = new View(__DIR__ .'/../Views/Template/Admin');
        // $outerHeader = new View(__DIR__ .'/../Views/Template/Header');
        
        // $templateView->outerHeader = $outerHeader->render();
        // $templateView->content = $contentView->render();
        
        // if (isset($_GET['test']) && $_GET['test'] === 1){
        //     return $templateView->render();
        // } else { 
        //     echo $templateView->render();
        // }
    }
    
    public function view(){
        
        // $equity_s = new EquityS();
        // $contentView = new View('./Views/Equity/View');
        
        // $equity_data = $equity_s->get();
        
        // $contentView->equity = $equity_data;
        // $listHeader = new View('./Views/Equity/listHeader');
        // $contentView->listHeader = $listHeader->render();
        
        // $templateView = new View('./Views/Template/Admin');
        // $outerHeader = new View('./Views/Template/Header');
        
        // $templateView->outerHeader = $outerHeader->render();
        // $templateView->content = $contentView->render();
        
        // echo $templateView->render();
    }
    
    public function create(){
        var_dump($_POST); die;
        // $contentView = new View('./Views/Equity/Create');

        // $dropdown_header = new View('./Views/Common/dropdown_header'); 
        // $dropdown_equity = new View('./Views/Equity/equity_dropdown');
        // $dropdown_equity->dropdown_header = $dropdown_header->render();
                    
        // $contentView->equity_dropdown = $dropdown_equity->render();
        // $listHeader = new View('./Views/Equity/listHeader');
        // $contentView->listHeader = $listHeader->render();

        // $templateView = new View('./Views/Template/Main');
        // $outerHeader = new View('./Views/Template/Header');

        // $templateView->outerHeader = $outerHeader->render();
        // $templateView->content = $contentView->render();

        // echo $templateView->render();
    }

    public function save() {
        // $equity_s = new EquityS();
        // $data = $equity_s->post();
        // header('Location: /equity/view?id='.$data['insert_id']);exit;
    }
    
    public function edit(){
        // $equity_s = new EquityS();
        // $contentView = new View('./Views/Equity/Create');
        // $dropdown_header = new View('./Views/Common/dropdown_header'); 
        // $dropdown_equity = new View('./Views/Equity/equity_dropdown');
        // $dropdown_equity->dropdown_header = $dropdown_header->render();
                    
        // $contentView->equity_dropdown = $dropdown_equity->render();
        // $equity_data = $equity_s->get();
        // $contentView->equity_data = $equity_data[0];
        // $listHeader = new View('./Views/Equity/listHeader');
        // $contentView->listHeader = $listHeader->render();

        // $templateView = new View('./Views/Template/Admin');
        // $outerHeader = new View('./Views/Template/Header');

        // $templateView->outerHeader = $outerHeader->render();
        // $templateView->content = $contentView->render();

        // echo $templateView->render();
    }
    public function update(){
        // $equity_s = new EquityS();
        // $id = $equity_s->put();
        // header('Location: /equity/view?id='.$id);exit;
    }
    
    public function delete($job_id){
        // render view here
    }
}
?>