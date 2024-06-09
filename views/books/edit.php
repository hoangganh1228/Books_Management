<?php
    layouts('header');
?>


<div class="row">
    <div class="col-3" style="margin: 50px auto">
        <h2 class="text-center text-uppercase">Chỉnh sửa thông tin sách </h2>
        
        <form action="" method="POST">
            <div class="form-group mb-2 mt-3px">
                <label for="" class="mb-2">Tên sách</label>
                <input type="text" name="nameb" class="form-control" placeholder="Nhập tên sách" value="<?php echo old('nameb', $old)?>">
            </div>
            <div class="form-group mb-2">
                <label for="" class="mb-2">Tác giả</label>
                <input type="text" name="author" class="form-control" placeholder="Nhập tên tác giả" value="<?php echo old('author', $old)?>">
            </div>
            <div class="form-group mb-2">
                <label for="" class="mb-2">Năm phát hành</label>
                <input type="text" name="publish" class="form-control" placeholder="Nhập năm phát hành" value="<?php echo old('publish', $old)?>">
            </div>
            <div class="form-group mb-3">
                <label for="" class="mb-2">Thể loại</label>
                <input type="text" name="genre" class="form-control" placeholder="Nhập thể loại sách" value="<?php echo old('genre', $old)?>">
                
            </div>
            <div class="form-group mb-3">
                <label for="" class="mb-2">Nhập giá</label>
                <input type="text" name="price" class="form-control" placeholder="Nhập giá sách" value="<?php echo old('price', $old)?>">
            </div>
            
            <input type="hidden" name="id" value="<?php echo $bookId?>">

            <div>
                <button type="submit" class="btn btn-primary btn-block mg-btn">Chỉnh sửa thông tin sách</button>
                <a href="?action=list" class="btn btn-success btn-block mg-btn">Quay lại</a>
            </div>

        </form>
    </div>
</div>