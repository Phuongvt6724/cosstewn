<section id="pageFeedback" class="activePaging">
    <div class="wrap-actionTop">
        <h1>Danh sách bình luận</h1>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th>STT</th>
                <th class="th-productfb">Sản phẩm</th>
                <th>Lượt bình luận</th>
                <th>Mới nhất</th>
                <th>Cũ Nhất</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($infoTableFB as $i => $row) : ?>
                <tr>
                    <td><?php $i++;
                        echo $startRow + $i; ?></td>
                    <td><?= $row['ten_sp']; ?></td>
                    <td><?= $row['comment_count']; ?></td>
                    <td><?php $masp = $row['masp'];
                        $getfbNewMost = $feedbackPage->getfbNewMost($masp);
                        $fbNewMost = $getfbNewMost['ngay_bl'];
                        $fbNewMost = new DateTime($fbNewMost);
                        $fbNewMostFormat = $fbNewMost->format('d-m-Y H:i:s');
                        echo $fbNewMostFormat;
                        ?></td>
                    <td><?php $masp = $row['masp'];
                        $getfbOldMost = $feedbackPage->getfbOldMost($masp);
                        $fbOldMost = $getfbOldMost['ngay_bl'];
                        $fbOldMost = new DateTime($fbOldMost);
                        $fbOldMostFormat = $fbOldMost->format('d-m-Y H:i:s');
                        echo $fbOldMostFormat;
                        ?></td>
                    <td>
                        <button class="btn-detailFB" data-tablefb-masp="<?= $masp; ?>" data-tablefb-nameprd="<?= $row['ten_sp']; ?>">Chi tiết</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination-container">
        <ul class="pagination pagingfb">
            <?php if ($pageNumber > 1) : ?>
                <li><a href="javascript:void(0);" class="page-link" data-number-page="1"><i class="fa-solid fa-angles-left"></i></a></li>
                <li><a href="javascript:void(0);" class="page-link" data-number-page="<?php echo $pageNumber - 1; ?>"><i class="fa-solid fa-angle-left"></i></a></li>
            <?php endif; ?>

            <?php if ($totalPages > 1) : ?>
                <li class="wrap-pagenum">
                    <a href="javascript:void(0);" class="page-num active"><?php echo $pageNumber; ?></a>
                </li>
            <?php endif; ?>
            <?php if ($pageNumber < $totalPages) : ?>
                <li><a href="javascript:void(0);" class="page-link" data-number-page="<?php echo $pageNumber + 1; ?>"><i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="javascript:void(0);" class="page-link" data-number-page="<?php echo $totalPages; ?>"><i class="fa-solid fa-angles-right"></i></a></li>
            <?php endif; ?>
        </ul>
    </div>
</section>