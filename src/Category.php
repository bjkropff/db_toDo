<?php

    class Category
    {
        // properties of class Category
        private $name;
        private $id;

        // constructor creates objects out of properties
        function __construct($name, $id = null)
        {
            $this->name = $name;
            $this->id = $id;
        }

        // setter - sets the new_name variable of type string to the property $name
        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        // setter  - sets the new_id variable of the type interger to the property $id
        function setId($new_id)
        {
            $this->id = (int) $new_id;
        }

        // getter - when called, will return the objects name
        function getName()
        {
            return $this->name;
        }

        // getter - when called, will return the objects id
        function getId()
        {
            return $this->id;
        }

        function save()
        {
            // inserts a value into table categories, and returns an id
            $statement = $GLOBALS['DB']->query("INSERT INTO categories (name) VALUES ('{$this->getName()}') RETURNING id;");
            // DONT PANIC - reformatting statement into an associative array (KEY = id, VALUE = row number)
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            // Use setId method to put the id into the object (roommate is a jerk and leaves your bear in the kitchen)
            $this->setId($result['id']);
        }

        static function getAll()
        {
            // getting ALL the data stored in table categories
            $returned_categories = $GLOBALS['DB']->query("SELECT * FROM categories;");
            // sets a blank array to variable categories
            $categories = array();
            // ?? creates an object  new_category using the information from each entry in table categories and stores it into the array categories ??
            foreach($returned_categories as $category) {
                $name = $category['name'];
                $id = $category['id'];
                $new_category = new Category($name, $id);
                array_push($categories, $new_category);
            }
            // returns the array categories
            return $categories;
        }

        // destroys all data in the table categories
        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM categories *;");
        }

        // if what's being searched for is identical to an object in the db, find returns that object to user
        static function find($search_id)
        {
            // storing value null into variable found_category
            $found_category = null;
            // calls getAll method on class Category
            $categories = Category::getAll();
            // searches the values stored in the database for a particular id...
            foreach($categories as $category) {
                $category_id = $category->getId();
                // ... if found, return the found category
                if ($category_id == $search_id) {
                    $found_category = $category;
                }
            }
            return $found_category;
        }
    }

?>
