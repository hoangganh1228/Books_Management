<?php
    if(isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = '';
    }
    $path = './views/books/';
    switch ($action) {
        case 'add':
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
            require_once $path.'add.php';
            break;
        case 'edit':
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
            require_once $path.'edit.php';
            break;
        
        
        case 'delete' :
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

        case 'search' :
                $keyword = '';  
                if(isGet()) {
                    $filterAll = filter();
                    // echo '<pre>';
                    // print_r($filterAll);
                    // echo '</pre>';
                    if(!empty($filterAll['keyword'])) {
                        
                        $keyword = $filterAll['keyword'];
                        if(!empty($keyword)) {
                            // echo $keyword;
                            $dataSearch = getRaw("SELECT * FROM sach WHERE nameb REGEXP '$keyword' OR author REGEXP '$keyword' OR publish REGEXP '$keyword'  ORDER BY id DESC");
                            // echo '<pre>';
                            // print_r($dataSearch);
                            // echo '</pre>';
                        } else {
                            redirect('?action=list');
                        }
                    }
                }
                if(empty($keyword)) {
                    redirect('?action=list');
                }
                require_once $path.'search.php';
                break;
            
        default :
            require_once $path.'list.php';        
                
    }
?>