<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>To Do List</title>
</head>
<body>
    <h1>To Do List</h1>
    {% if tasks is not empty %}
        <p>Here are your tasks:</p>
        <ul>
            {% for task in tasks %}
                <li>{{ task.getDescription }}</li>
            {% endfor %}
        </ul>
    {% endif %}

    <form action='/tasks' method='post'>
        <label for='description'>Task Description</label>
        <input id='description' name='description' type='text'>

        <button type='submit'>Add task</button>
    </form>
    <form action='/delete_tasks' method='post'>
        <button type='submit'>Delete All</button>
    </form>
</body>
</html>
