<?php 

class BaseController
{
    // Render a view
    public function render($view, $data = [])
    {
        
        extract($data);
        include __DIR__ . '/../app/view/' . $view . '.php';
    }

    
    public function renderStudent($view, $data = [])
    {
        
        extract($data);
        include __DIR__ . '/../app/view/userPages/' . $view . '.php';
    }
    // public function renderAdmin($view, $data = [])
    // {
        
    //     extract($data);
    //     include __DIR__ . '/../app/view/admin/' . $view . '.php';
    // }
   
   
}