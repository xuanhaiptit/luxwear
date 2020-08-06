<div class="section" id="paging-wp">
    <div class="section-detail clearfix">
        <ul class="list-item clearfix">
            <?php if($post->currentPage() != 1): ?>
                <li>
                    <a href="<?php echo $post->url($post->currentPage() - 1); ?>" title=""><?php echo app('translator')->getFromJson('home.before'); ?></a>
                </li>
            <?php endif; ?>
            <?php for($i = 1; $i <= $post->lastPage(); $i++): ?>
                <li class="<?php echo ($post->currentPage() == $i) ? 'active' :null; ?>">
                    <a href="<?php echo $post->url($i); ?>" title=""><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
            <?php if($post->currentPage() != $post->lastPage()): ?>
                <li>
                    <a href="<?php echo $post->url($post->currentPage() + 1); ?>" title=""><?php echo app('translator')->getFromJson('home.after'); ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<?php /**PATH G:\xampp_7\htdocs\ismart\resources\views/layout/paginate.blade.php ENDPATH**/ ?>