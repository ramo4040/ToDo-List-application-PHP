<?php

namespace app\views;

class TaskListView {
    public static function render($tasks) {
        ob_start();
?>
        <div>
            <h4 class="title2 mb-3">Tasks</h4>
            <form name="taskList">
                <ul class="taskList">

                    <!-- Task -->
                    <?php if (isset($tasks)) : ?>
                        <?php foreach ($tasks as $value) : ?>
                            <li>
                                <a href="./task/<?= $value['idtask'] ?>">
                                    <input type="checkbox" name="check" id="check" value="<?= $value['idtask'] ?>">
                                    <div>
                                        <label for="check"><?= ucfirst($value['TitleTask']) ?></label>
                                        <p><?= $value['descTask'] ?></p>

                                        <div class="--date">
                                            <i class="bi bi-calendar-check"></i>
                                            <?= $value['createdAt'] ?>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach ?>
                    <?php endif ?>

                </ul>
            </form>
        </div>
        <!-- Tasks part  -->
        <dialog id="addTask">
            <form method="POST" id="addTaskForm" action="./api/task">
                <header>
                    <h5>Add task</h5>
                    <i id="closeTaskModal" class="bi bi-x-circle"></i>
                </header>
                <section>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" required />
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="5"></textarea>
                    </div>
                </section>
                <footer>
                    <button type="submit" name="addTask">Submit</button>
                </footer>
            </form>
        </dialog>

        <div class="button_container">
            <i class="bi bi-trash" id="deleteTask"></i>
            <button class="btn1 rounded-pill px-4 pb-1 pt-1" id="addTaskBtn" type="button">Add Task </button>
        </div>
<?php
        return ob_get_clean();
    }
}
