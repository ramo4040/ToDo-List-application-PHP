const taskModal = document.querySelector('#addTask');

document.querySelectorAll('#closeTaskModal, #addTaskBtn').forEach(el => {
    el.addEventListener('click', () => el.id === 'addTaskBtn' ? taskModal.showModal() : taskModal.close() || editTask.close());
});

const formTaskList = document.forms['taskList'];

if (formTaskList) {
    document.querySelector('#deleteTask').addEventListener('click', async () => {
        const formdata = new FormData(formTaskList);

        const request = await fetch('./api/task', {
            method: 'DELETE',
            body: JSON.stringify(formdata.getAll('check')),
        });

        if (request.ok) {
            formdata.getAll('check').forEach(e => {
                document.querySelector(`.taskList [value="${e}"]`).closest('li').remove();
            });
        }
    });
}




const editTaskForm = document.forms['editTaskForm'];
if (editTaskForm) {
    editTaskForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const id = window.location.href.split('/').at(-1);
        const data = new FormData(editTaskForm);
        const request = await fetch(`../api/task/${id}`, {
            method: 'PUT',
            body: JSON.stringify({ title: data.get('title'), description: data.get('description') })
        });
        if (request.ok) {
            window.location.href = "../tasks";
        }
    });
}
