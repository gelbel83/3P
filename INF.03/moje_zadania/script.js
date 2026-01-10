// Skrypt 1

const doneButtons = document.getElementsByClassName("doneButton");

for (let i = 0;i < doneButtons.length; i++) {
    doneButtons[i].addEventListener("click", function(e) {
        e.target.parentNode.classList.toggle("strike");
        // gdzie .strike to klasa z text-decoration: line-through
    });
}

// Skrypt 2 

const taskList = document.getElementById("taskList");
const addTaskButton = document.getElementById("addTaskButton");
const taskInput = document.getElementById("taskInput");

addTaskButton.addEventListener("click", function() {
    let doneButton = document.createElement("button");
    doneButton.textContent = "Wykonano";
    doneButton.className = "doneButton";

    doneButton.addEventListener("click", function(e) {
        e.target.parentNode.classList.toggle("strike");
    });

    let newTask = document.createElement("li");
    newTask.textContent = taskInput.value || "Zadanie bez nazwy";

    newTask.append(doneButton);
    taskList.append(newTask);
});






