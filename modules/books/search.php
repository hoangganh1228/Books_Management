<?php
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
                redirect('?module=books&action=list');
            }
        }
    }
    if(empty($keyword)) {
        redirect('?module=books&action=list');
    }
    layouts('header');
?>

<div class="container">
    <hr>    
    <h2>Quản lý sách</h2>

    <div class="container_css">
        <p>
            <a href="?module=books&action=add" class="btn btn-success btn-sm"> Thêm sách <i class="fa-solid fa-plus"></i></a>
        </p>
        <div class="col-md-6">
                <form method="GET" action="">
                    <input type="hidden" name="module" value="books">
                    <input type="hidden" name="action" value="search">
                    <div class="input-group">   
                            <input type="text" class="form-control" name="keyword" value="<?php echo $keyword?>">
                        <div class="input-group-append">
                            <input class="btn btn-outline-secondary" type="submit">
                        </div>
                    </div>
                </form>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <th>STT</th>
            <th>Tên sách</th>
            <th>Tác giả</th>
            <th>Năm phát hành</th>
            <th>Thể loại</th>
            <th>Giá</th>
            <th style="width: 5%;">Sửa</th>
            <th style="width: 5%;">Xóa</th>
        </thead>
        <tbody>
            <?php
                if(!empty($dataSearch)): 
                    $count = 0;  //STT
                    foreach ($dataSearch as $item):
                        $count++;
            ?>
                        <tr>
                            <td><?php echo $count?></td>
                            <td><?php echo $item['nameb']?></td>
                            <td><?php echo $item['author']?></td>
                            <td><?php echo $item['publish']?></td>
                            <td><?php echo $item['genre']?></td>
                            <td><?php echo $item['price']?></td>
                            <td> <a href="<?php echo _WEB_HOST;?> ?module=books&action=edit&id=<?php echo $item['id']?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td> <a href="<?php echo _WEB_HOST;?> ?module=books&action=delete&id=<?php echo $item['id']?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
            <?php
                    endforeach;
                else:
            ?>
                <tr>
                    <td colspan="8">
                        <div class="alert alert-danger text-center">Không có sách nào</div>
                    </td>

                </tr>
            <?php
                endif;
            ?>
        </tbody>
    </table>
</div>