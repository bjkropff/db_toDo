<?php
    //These three line each pull a logic file to be used by app.php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Task.php";
    require_once __DIR__."/../src/Category.php";

    //This creates a new instance of the Silex object
    $app = new Silex\Application();

    // This adds a more thorough degugging process
    $app['debug'] = TRUE;

    //Creates a new instance to access the database of the name to_do
    $DB = new PDO('pgsql:host=localhost;dbname=to_do');

    //Boom! Getting Twig to work -> tells twig where to find the template files (in views)
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    //get method that is returning index.twig to the user
    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.twig');
    });

    //get method that is returning tasks.twig to the user
    $app->get("/tasks", function() use ($app) {
        return $app['twig']->render('tasks.twig', array('tasks' => Task::getAll()));
    });

    //get method that is returning categories.twig to the user
    $app->get("/categories", function() use ($app){
        return $app['twig']->render('categories.twig', array('categories' => Category::getAll()));
    });

    //saving the user input from the description field and returning it to tasks.twig
    $app->post("/tasks", function() use ($app) {
        $task = new Task($_POST['description']);
        $task->save();
        return $app['twig']->render('tasks.twig', array('tasks' => Task::getAll()));
    });

    //saving the user input from the name field and returning it to categories.twig
    $app->post("/categories", function() use ($app) {
        $category = new Category($_POST['name']);
        $category->save();
        return $app['twig']->render('categories.twig', array('categories' => Category::getAll()));
    });

    //deletes all the objects in the categories
    $app->post("/delete_categories", function() use ($app) {
        Category::deleteAll();
        return $app['twig']->render('index.twig');
    });

    //deletes all the objects in the tasks
    $app->post("/delete_tasks", function() use ($app) {
        Task::deleteAll();
        return $app['twig']->render('index.twig');
    });

    //I have no idea
    return $app;
?>
