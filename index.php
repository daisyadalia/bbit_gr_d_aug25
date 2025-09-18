<?php

class MyClass {

    public function heading(): void {
        echo "Welcome to BBIT DevOps!";
    }
    public function myMethod(): void{
        echo "<p>This is a new semester.</p>";
    }
    public function footer(): void{
        echo "<footer>Contact us at <a href='mailto:info@bbit.edu/a></footer";
    }

} 

//create instance of MyClass
$instance = new MyClass();

//calling the methods
$instance->myMethod();
$instance->heading();
$instance->footer();