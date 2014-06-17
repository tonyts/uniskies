<?php
/**
 * The sidebar containing the latest news.
 *
 * If no active widgets in either sidebar, they will be hidden completely.
 *
 * @package WordPress
 * @subpackage Uniskies
 * @since Uniskies 1.0
 */
?>

<div class="portlet">
	<?php if(ICL_LANGUAGE_CODE == "en"){?>
	<h2>Latest from Uniskies</h2>
    <img src="<?php echo get_template_directory_uri(); ?>/images/school.jpg">
    <p>test content</p>
    <?php } else if(ICL_LANGUAGE_CODE == "zh-hant"){?>
	<h2 style="color:red;">特別通告</h2>
    <!--img src="<?php echo get_template_directory_uri(); ?>/images/school.jpg"-->

        <p>本會為簡化架構，同一藍天第二屆第二十六次董事會通過決議，由2013年8月31日開始，不保留社群心作香港長者服務之稱號。所有原以社群心發起的項目，如敬老福袋、長者同樂日，已於2013年8月31日之前完滿結束！2013年9月1日開始，所有本港長者服務及內地助學活動，皆以同一藍天為號召！以精簡架構，減低因宣傳而衍生的項目成本。<br><br></p>
    <?php } else if(ICL_LANGUAGE_CODE == "zh-hans"){?>
	<h2>Latest from Uniskies</h2>
    <img src="<?php echo get_template_directory_uri(); ?>/images/school.jpg">
        <p>test content</p>
    <?php } ?>
    <div class="clear"></div>
</div>