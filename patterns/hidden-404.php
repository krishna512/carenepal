<?php
/**
 * Title: Hidden 404
 * Slug: twentytwentythree/hidden-404
 * Inserter: no
 */
?>
<!-- wp:spacer {"height":"var(--wp--preset--spacing--30)"} -->
<div style="height:var(--wp--preset--spacing--30)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"align":"wide","layout":{"type":"default"},"style":{"spacing":{"margin":{"top":"5px"}}}} -->
<div class="wp-block-group alignwide" style="margin-top:5px">
    <!-- wp:paragraph -->
    <div class="error-details py-16 md:py-24 lg:py-32">
        <div class="w-[300px] sm:w-[350px] h-[201px] relative mx-auto">
            <div class="four-first absolute left-0 top-0 text-[#1C1D30] text-[150px] sm:text-[170px]">
                <?php echo useSvg('four'); ?>
            </div>
            <div
                class="zero absolute left-[116px] sm:left-[132px] top-[70px] z-[30] text-[#F4B223] text-[108px] sm:text-[124px]">
                <?php echo useSvg('zero'); ?>
            </div>
            <div
                class="patch absolute left-[44px] sm:left-[60px] top-[154px] text-n-40 sm:top-[170px] z-[20] text-n-90 text-[30px]">
                <?php echo useSvg('patch'); ?>
            </div>
            <div
                class="patch absolute left-[44px] sm:left-[60px] top-[164px] sm:top-[180px] z-[20] text-n-100 text-[20px]">
                <?php echo useSvg('patch-second'); ?>
            </div>
            <div class="four-second absolute right-0 -top-5 z-[10] text-[#1C1D30] text-[150px] sm:text-[170px]">
                <?php echo useSvg('four'); ?>
            </div>
        </div>
        <div class="text-center">
            <h2 class="mt-6 sm:mt-10 mb-1 sm:mb-4 font-bold">
                Looks like you are lost.
            </h2>
            <div class="text-xl mb-[5px]">
                We couldn’t find the page you’re looking for.
            </div>
            <div class="text-base back-links">
                Go back to
                <a href="<?php echo get_home_url(); ?>">
                    homepage
                </a> or <a href="<?php echo get_home_url();?>/contact">
                    contact us </a>
                about a problem.
            </div>
        </div>
    </div>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->