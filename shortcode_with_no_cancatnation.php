	6:38 PM
<?php
//register shoetcode to drag and drop
function display_drag_and_drop_question($id){
	global $post;
	$post_id= $id;
	foreach( $dndanswers as $dndanswer): ?>
			<div class="draggable dndanswers" id="<?php echo $post_id.'ans'.$index; ?>">
				<?php echo $dndanswer?>
				<input type="hidden" value="<?php echo $post_id.'ans'.$index; ?>" name="dndAnsID">
			</div>

		<?php $index++; endforeach?>
	</div>
	<div class="qu_button_standard_div">
		<input type="button" id="button_reorder_dnd" class="button_reorder_dnd qu_button_standard" name="button_reorder_dnd" value="Reset">
		<input type="button" id="button_res_dnd" class="button_res_dnd qu_button_standard" name="button_res" value="Reset">
		<input type="button" id="button_check_dnd" class="button_check_dnd qu_button_standard" name="button_check" value="Check">
		<input type="button" id="button_help_dnd" class="button_help_dnd qu_button_standard" name="button_help" value="Help">
	</div>
	</form>
</div>
<?php }

// Register a new shortcode: [drag_and_drop_questions id=]
add_shortcode('drag_and_drop_questions', 'drag_drop_questions_shortcode_function');
// The callback function that will replace [drag_and_drop_questions id=]
function drag_drop_questions_shortcode_function($atts) {
	global $post;
    ob_start();
    $a = shortcode_atts( array(
        'id' => '0',
         ), $atts );
    extract($a);
    display_drag_and_drop_question($id);
	$output = ob_get_clean();
	return $output;
}
?>