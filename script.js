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
                ${renderCheckbox(todo)}
                <p>${ todo.name }</p>
                <button class='btn btn-delete' data-id='${todo.id}'>Delete</button>
            </li>
        `
    });
  })
  .catch(error => {
    console.error('Error:', error);
  });

// render dynamic checkbox
const renderCheckbox = (todo) => {
  return todo.status === "Incomplete" ?
    `<input class="todo-checkbox" type="checkbox" data-id='${todo.id}'>` :
    `<input class="todo-checkbox" type="checkbox" data-id='${todo.id}' checked>`
}


// DELETE
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


// PUT/UPDATE
document.addEventListener("change", function(e){
  const target = e.target.closest(".todo-checkbox");

  if(target){
      const status = target.checked ? 'Complete' : 'Incomplete';
      toggleTodoStatus(target.dataset.id, status);
  }
});

const toggleTodoStatus = (id, status) => {
  fetch(apiUrl + "/?id=" + id, { method: 'PUT', body: JSON.stringify({ status }) })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network error');
        }
        return response.json();
    })
    .catch(error => {
          console.error('Error:', error);
    });
}