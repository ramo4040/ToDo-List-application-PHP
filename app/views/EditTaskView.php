<?php

namespace app\views;

class EditTaskView {
    public static function render($task) {
        ob_start();
?>
        <form id="editTaskForm" name="editTaskForm">
            <div>
                <h4 class="title2 mb-3">Edit task</h4>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="<?= $task['TitleTask'] ?>" required />
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="5"><?= $task['descTask']; ?></textarea>
                </div>
            </div>
            <div class="button_container">
                <button class="btn1 rounded-pill px-4 pb-1 pt-1" id="updateTaskBtn" type="submit">Save </button>
            </div>
        </form>

<?php
        return ob_get_clean();
    }
}
