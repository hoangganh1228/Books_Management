<?php
    function editBook() {
        layouts('header');
        $filterAll = filter();
        if(!empty($filterAll['id'])) {
            $bookId = $filterAll['id'];
            // echo $bookId;
            $bookDetail = oneRaw("SELECT * FROM sach WHERE id='$bookId'");
            // echo '<pre>';
            // echo print_r($bookDetail);
            // echo '</pre>';
            if(!empty($bookDetail)) {
                setFlashData('book-detail', $bookDetail);
            
            } else {
                redirect('?action=list');
            }

        }

        if(isPost()) {
            $filterAll = filter();
            $dataUpdate = [
                'nameb' => $filterAll['nameb'],
                'author' => $filterAll['author'],
                'publish' => $filterAll['publish'],
                'genre' => $filterAll['genre'],
                'price' => $filterAll['price'],
            ];
            // echo $bookId;
            $condition = "id = $bookId";
            $updateStatus = update('sach', $dataUpdate, $condition);
            if($updateStatus) {
                setFlashData('smg', 'Sửa thông tin sách thành công!');
                setFlashData('smg_type', 'success');
            } else {
                setFlashData('smg', 'Hệ thống đang lỗi, vui lòng thử lại sau.!!!');
                setFlashData('smg_type', 'danger');
                
            }
            redirect('?action=list');
        } else {
            setFlashData('smg', 'Vui lòng kiểm tra lại dữ liệu!');
            setFlashData('smg_type', 'danger');
            setFlashData('old', $filterAll);
            // redirect('action=list');
        }
        
        
        $smg = getFlashData('smg');
        $smg_type = getFlashData('smg_type');
        $old = getFlashData('old');
        $bookDetailll = getFlashData('book-detail');
        // print_r($bookDetailll);
        if(!empty($bookDetailll)) {
            $old = $bookDetailll;
        }
    }

    function getOld() {
        layouts('header');
        $filterAll = filter();
        if(!empty($filterAll['id'])) {
            $bookId = $filterAll['id'];
            // echo $bookId;
            $bookDetail = oneRaw("SELECT * FROM sach WHERE id='$bookId'");
            // echo '<pre>';
            // echo print_r($bookDetail);
            // echo '</pre>';
            if(!empty($bookDetail)) {
                setFlashData('book-detail', $bookDetail);
            
            } else {
                redirect('?action=list');
            }

        }

        if(isPost()) {
            $filterAll = filter();
            $dataUpdate = [
                'nameb' => $filterAll['nameb'],
                'author' => $filterAll['author'],
                'publish' => $filterAll['publish'],
                'genre' => $filterAll['genre'],
                'price' => $filterAll['price'],
            ];
            // echo $bookId;
            $condition = "id = $bookId";
            $updateStatus = update('sach', $dataUpdate, $condition);
            if($updateStatus) {
                setFlashData('smg', 'Sửa thông tin sách thành công!');
                setFlashData('smg_type', 'success');
            } else {
                setFlashData('smg', 'Hệ thống đang lỗi, vui lòng thử lại sau.!!!');
                setFlashData('smg_type', 'danger');
                
            }
            redirect('?action=list');
        } else {
            setFlashData('smg', 'Vui lòng kiểm tra lại dữ liệu!');
            setFlashData('smg_type', 'danger');
            setFlashData('old', $filterAll);
            // redirect('action=list');
        }
        
        
        $smg = getFlashData('smg');
        $smg_type = getFlashData('smg_type');
        $old = getFlashData('old');
        $bookDetailll = getFlashData('book-detail');
        // print_r($bookDetailll);
        if(!empty($bookDetailll)) {
            $old = $bookDetailll;
        }
        return $old;
    }
?>