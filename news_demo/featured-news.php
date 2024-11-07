<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Featured News</h4>
        </div>
        <div class="owl-carousel news-carousel carousel-item-4 position-relative">
            <?php
            $getFeatureNewItem = $item->getFeatureNewItem(0, 5);
            //var_dump($get3NewstItem);
            foreach ($getFeatureNewItem as $value):
            ?>
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="anh/<?php echo $value['image'] ?>" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href=""><?php echo $item->getCatNameById($value['category'])[0]['name']; ?></a>
                            <a class="text-white" href=""><small><?php echo date_format(date_create_from_format("Y-m-d H:i:s", $value['created_at']), "M, d Y"); ?></small></a>
                        </div>
                        <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="single.php?id=<?php echo $value['id'] ?>"><?php echo substr($value['tile'], 0, 40) ?>...</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>