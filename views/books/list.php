<?php

    $listBooks = getRaw("SELECT * FROM sach ORDER BY id");
    // print_r($listBooks);
    layouts('header');
?>



    

<div class="container">
    <hr>    
    <h2><a href="?action=list" class="fix_font">Quản lí sách</a></h2>
    <div class="container_css">
        <p>
            <a href="?action=add" class="btn btn-success btn-sm"> Thêm sách <i class="fa-solid fa-plus"></i></a>
        </p>
        <div class="col-md-6">
                <form method="GET" action="">
                    <input type="hidden" name="action" value="search">
                    <div class="input-group">   
                            <input type="text" class="form-control" placeholder="Tìm kiếm theo tên sách, tác giả,..." name="keyword">
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
                if(!empty($listBooks)): 
                    $count = 0;  //STT
                    foreach ($listBooks as $item):
                        $count++;
            ?>
                <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo $item['nameb']?></td>
                    <td><?php echo $item['author']?></td>
                    <td><?php echo $item['publish']?></td>
                    <td><?php echo $item['genre']?></td>
                    <td><?php echo $item['price']?></td>
                    <td> <a href="<?php echo _WEB_HOST;?> ?action=edit&id=<?php echo $item['id']?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td> <a href="<?php echo _WEB_HOST;?> ?action=delete&id=<?php echo $item['id']?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a></td>
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
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>