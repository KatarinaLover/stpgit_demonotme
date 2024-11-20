    <!-- Main News Slider Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 px-0">
                <div class="owl-carousel main-carousel position-relative">
                    <?php
                    $get3NewstItem = $item->getNewItem(0, 3);
                    //var_dump($get3NewstItem);
                    foreach ($get3NewstItem as $value):
                    ?>
                        <div class="position-relative overflow-hidden" style="height: 500px;">
                            <img class="img-fluid h-100" src="anh/<?php echo $value['image'] ?>" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href=""><?php echo $item->getCatNameById($value['category'])[0]['name'];; ?></a>
                                    <a class="text-white" href=""><?php echo date_format(date_create_from_format("Y-m-d H:i:s", $value['created_at']), "M,d Y"); ?></a>
                                </div>
                                <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="single.php?id=<?php echo $value['id'] ?>"><?php echo $value['title'] ?></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-5 px-0">
                <div class="row mx-0">
                    <?php
                    $get4NextNewstItem = $item->getNewItem(0, 4);
                    //var_dump($get3NewstItem);
                    foreach ($get4NextNewstItem as $value):
                    ?>
                        <div class="col-md-6 px-0">
                            <div class="position-relative overflow-hidden" style="height: 250px;">
                                <img class="img-fluid w-100 h-100" src="anh/<?php echo $value['image'] ?>" style="object-fit: cover;">
                                <div class="overlay">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href=""><?php echo $item->getCatNameById($value['category'])[0]['name']; ?></a>
                                        <a class="text-white" href=""><small><?php echo date_format(date_create_from_format("Y-m-d H:i:s", $value['created_at']), "M, d Y"); ?></small></a>
                                    </div>
                                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="single.php?id=<?php echo $value['id'] ?>"><?php echo substr($value['title'], 0, 40) ?>... </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->