<div class="pagination">

    <div class="page-items <?= ($currentPage == 1) ? "disabled" : "" ?>">
        <a href="gestionDesUtilisateurs.php?page=<?php if ($currentPage == 1) {
                                                                                echo $currentPage;
                                                                            } else {
                                                                               
                                                                                echo $currentPage -1;
                                                                            } ?>&pageLimit=<?php 
                                                                            if ($pageLimit != 1) {
                                                                                echo $pageLimit-1;
                                                                            }else{
                                                                                echo $pageLimit;
                                                                            }
                                                                            ?>&pagesLimit=<?php 
                                                                            if ($pageLimit  !=1) {
                                                                                echo $pagesLimit-1;
                                                                            }else{
                                                                                echo $pagesLimit;
                                                                            }
                                                                            ?>" class="page-link">«</a>
    </div>
    <?php for ($page = $pageLimit; $page <= $pagesLimit; $page++) : ?>



    <div class="page-items <?= ($currentPage == $page) ? "active" : "" ?> ">
        <a href="gestionDesUtilisateurs.php?page=<?= $page ?>&pageLimit=<?php echo $pageLimit ?>&pagesLimit=<?php echo $pagesLimit ?>"
            class="page-link"><?= $page ?>

        </a>
    </div>
    <?php endfor ?>




    <div class="page-items <?= ($currentPage == $pages) ? "disabled" : "" ?>">
        <a href="gestionDesUtilisateurs.php?page=<?php if ($currentPage == $pages) {
                                                                                echo $currentPage;
                                                                            } else {
                                                                              
                                                                                echo $currentPage + 1;
                                                                            } ?>&pageLimit=<?php 
                                                                            if ($pagesLimit != $pages) {
                                                                                echo $pageLimit+1;
                                                                            }else{
                                                                                echo $pageLimit;
                                                                            }
                                                                            ?>&pagesLimit=<?php 
                                                                            if ($pagesLimit != $pages) {
                                                                                echo $pagesLimit+1;
                                                                            }else{
                                                                                echo $pagesLimit;
                                                                            }
                                                                            ?>" class="page-link ">»</a>
    </div>