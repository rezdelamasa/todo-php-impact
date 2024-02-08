// Define the API URL
const apiUrl = 'http://localhost/todo-app-dvpadt/todos.php';

// Make a GET request
fetch(apiUrl)
  .then(response => {
    if (!response.ok) {
      throw new Error('There was an error');
    }
    return response.json();
  })
  .then(data => {
    const todoList = document.getElementById("TodoList");

    data.forEach(todo => {
        todoList.innerHTML += `
            <li class="todo">
                <p>${ todo.name }</p>
                <button class='btn btn-delete' data-id='${todo.id}'>Delete</button>
            </li>
        `
    });
  })
  .catch(error => {
    console.error('Error:', error);
  });

  document.addEventListener("click", function(e){
    const target = e.target.closest(".btn-delete");

    if(target){
        deleteTodo(target.dataset.id);
    }
});

const deleteTodo = (id) => {
  fetch(apiUrl + "/?id=" + id, {method: 'DELETE'})
    .then(response => {
        if (!response.ok) {
            throw new Error('Network error');
        }
        location.reload();
    })
  .catch(error => {
        console.error('Error:', error);
  });
}