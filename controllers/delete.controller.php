<?php
    function deleteBook() {
        $filterAll = filter();
        // print_r($filterAll);
        if(!empty($filterAll['id'])) {
            $bookId = $filterAll['id'];
            $bookDetail = getRows("SELECT * FROM sach WHERE id = $bookId");
            if($bookDetail > 0) {
                $deleteBook = delete('sach', "id= $bookId");
            } 
        }

        redirect('?action=list');
    }
?>