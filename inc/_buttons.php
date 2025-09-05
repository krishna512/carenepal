<?php
function btn_layout_1($btn, $btn_link)
{
    ob_start();
    ?>
    <a href="<?php echo $btn_link; ?> "
        class="view-all-btn inline-flex items-center text-base font-bold md:text-lg gap-x-2" <?php echo (get_post_type() == 'consultancy')?'target="_blank"':''; ?> >
        <?php echo $btn; ?>
        <span class="text-sm">
            <?php echo useSvg('right-arrow'); ?>
        </span>
    </a>
    <?php
    $btn_layout_1_return = ob_get_contents();
    ob_end_clean();

    return $btn_layout_1_return;
}

function btn_layout_2($btn, $btn_link)
{
    ob_start();
    ?>
    <div>
        <a href="<?php echo $btn_link; ?> "
            class="view-all-btn inline-flex gap-2 items-center text-base font-bold md:text-lg sm:max-w-fit justify-center gap-x-4" <?php echo (get_post_type() == 'consultancy')?'target="_blank"':''; ?> >
            <?php echo $btn; ?>
            <span class="text-sm">
                <?php echo useSvg('right-arrow'); ?>
            </span>
        </a>
    </div>
    <?php
    $btn_layout_2_return = ob_get_contents();
    ob_end_clean();

    return $btn_layout_2_return;
}




// thematic arrow button
function btn_layout_3($btn, $btn_link)
{
    ob_start();
    ?>
    <div>

        <div class="arrow">
            <div class="animate">
                <?php echo useSvg('chevron-right'); ?>
                <?php echo useSvg('chevron-right'); ?>
            </div>

        </div>
    </div>

    </div>
    </div>
    </div>
    <?php
    $btn_layout_3_return = ob_get_contents();
    ob_end_clean();

    return $btn_layout_3_return;
}