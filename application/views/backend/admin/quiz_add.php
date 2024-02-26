<?php
$sections = $this->crud_model->get_section('course', $param2)->result_array();
?>
<form action="<?php echo site_url('admin/quizes/'.$param2.'/add'); ?>" method="post">
    <div class="form-group">
        <label for="title"><?php echo get_phrase('quiz_title'); ?></label>
        <input class="form-control" type="text" name="title" id="title" required>
    </div>
    <div class="form-group">
        <label for="section_id"><?php echo get_phrase('section'); ?></label>
        <select class="form-control select2" data-toggle="select2" name="section_id" id="section_id" required>
            <?php foreach ($sections as $section): ?>
                <option value="<?php echo $section['id']; ?>"><?php echo $section['title']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="quiz_duration"><?php echo get_phrase('quiz_duration'); ?></label>
        <input type="text" class="form-control" data-toggle='timepicker' data-minute-step="5" name="quiz_duration" id = "quiz_duration" data-show-meridian="false" value="00:00:00">
        <small class="badge badge-info"><?php echo get_phrase('if_you_want_to_disable_the_timer,_set_the_duration_to'); ?> 00:00:00.</small>
    </div>

    <div class="form-group">
        <label for="total_marks"><?php echo get_phrase('total_marks'); ?></label>
        <input type="number" min="0" class="form-control" name="total_marks" id = "total_marks">
    </div>

    <div class="form-group">
        <label for="pass_mark"><?php echo get_phrase('Pass mark'); ?></label>
        <input type="number" min="0" class="form-control" name="pass_mark" id = "pass_mark" required>
    </div>

    <div class="form-group">
        <label><?php echo get_phrase('Drip content rule for quiz'); ?></label> <small class="text-12px">(<?php echo get_phrase('This will only work if drip content is enabled'); ?>)</small><br>
        <input name="drip_content_for_passing_rule" type="radio" value="not_applicable" id = "drip_content_rule_not_applicable"> <label for="drip_content_rule_not_applicable"><?php echo get_phrase('Students can start the next lesson by submitting the quiz'); ?></label>
        <br>
        <input name="drip_content_for_passing_rule" type="radio" value="applicable" id = "drip_content_rule_applicable"> <label for="drip_content_rule_applicable"><?php echo get_phrase('Students must achieve pass mark to start the next lesson'); ?></label>
    </div>

    <div class="form-group">
        <label for="number_of_quiz_retakes"><?php echo get_phrase('number_of_quiz_retakes'); ?></label>
        <input type="number" min="0" max="50" class="form-control" name="number_of_quiz_retakes" id = "number_of_quiz_retakes">
        <small class="badge badge-info"><?php echo get_phrase('enter_0_if_you_want_to_disable_multiple_attempts'); ?></small>
    </div>
    
    <div class="form-group">
        <label><?php echo get_phrase('instruction'); ?></label>
        <textarea name="summary" class="form-control"></textarea>
    </div>
    <div class="text-center">
        <button class = "btn btn-success" type="submit" name="button"><?php echo get_phrase('submit'); ?></button>
    </div>
</form>
<script type="text/javascript">
$(document).ready(function() {
    initSelect2(['#section_id']);
    initTimepicker();
});
</script>
