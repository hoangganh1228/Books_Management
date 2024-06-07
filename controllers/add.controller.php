<?php
    function add() {
        if(isPost()) {
            $filterAll = filter();
            $dataInsert = [
                'nameb' => $filterAll['nameb'],
                'author' => $filterAll['author'],
                'publish' => $filterAll['publish'],
                'nameb' => $filterAll['nameb'],
                'genre' => $filterAll['genre'],
                'price' => $filterAll['price'],
            ];
    
            $insertStatus = insert('sach', $dataInsert);
    
            if($insertStatus) {
                redirect('?module=books&action=list');
            } else {
                redirect('?module=books&action=add');
            }
        }
    }
    
?>