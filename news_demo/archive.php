<!-- <?php
        include "header.php";
        // if(isset($_GET['cate'])){
        //     $cate = $_GET['cate'];
        // }
        // else{
        //     header('location;index.php');
        // }
        if (isset($_GET['cate'])):
            $cate_id = $_GET['cate'];
            //Hiển thị sản phẩm trên 1 trang
            $perPage = 5;
            //Lấy số trang trên thanh địa chỉ
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            //Tính tổng số dòng,ex : 18
            $total = count($item->getAllItemsByCate($cate_id));
            //Lấy đường dẫn đến file hiện hành
            $url = $_SERVER['PHP_SELF'];
            // $getItemByCat = $item->getItemByCat($cate);
            // $cateName = $item->getCatNameById($cate)[0]['name'];
            // $get3NewstItem = $item->getItemById($cate);//Xuất Các Thời Sự
            // var_dump($cateName);
        ?> -->
<!-- News With Sidebar Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">Category: <?php echo $item->getCatNameById($cate_id)[0]['name']; ?></h4>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <?php
                            foreach ($get3NewstItem as $value):
                            ?>
                                <img class="img-fluid w-100" src="anh/<?php echo $value['image'] ?>" style="object-fit: cover;">

                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="">Business</a>
                                        <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                    </div>

                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href=""><?php echo $value['tile'] ?></a>
                                    <p class="m-0"><?php echo $value['excerpt'] ?></p>
                                <?php endforeach; ?>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                        <small>John Doe</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php
            include "social-sidebar.php"
            ?>

        </div>
    </div>
</div>
<!-- News With Sidebar End -->


<?php
        endif;
        include "footer.php" ?>