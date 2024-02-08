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
            </li>
        `
    });
  })
  .catch(error => {
    console.error('Error:', error);
  });