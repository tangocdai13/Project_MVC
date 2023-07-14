<?php

class FamilyController
{
 
    protected $model;

    public function __construct()
    {
        $this->model = new Family;
    }

    public function index()
    {

        view('families.index', [
            'families' => $this->model->getAll()
        ]);
    }

    public function create()
    {
        view('families.form', [
            'headingTitle' => 'Create a Family',
            'actionUrl' => 'index.php?controller=family&action=store'
        ]);
    }

    public function store()
    {
        $inputs = $_POST;
        // Validate date
        $errorMessage = $this->validate();

        if (empty($errorMessage)) {
            // Insert to database
            $this->model->create([
                'name' => $inputs['name'],
                'address' => $inputs['address'],
                'phone' => $inputs['phone'],
            ]);

            return redirect('index.php?controller=family');
        }

        view('families.form', [
            'errorMessage' => $errorMessage
        ]);
    }

    public function edit()
    {
        $family = $this->model->findById($_GET['id'] ?? 0);
        
        if (!$family) {
            echo 'Family not found';
            return;
        }

        view('families.form', [
            'headingTitle' => 'Edit a Family',
            'family' => $family,
            'actionUrl' => 'index.php?controller=family&action=update&id=' . $family->id
        ]);
    }

    public function update()
    {
        $inputs = $_POST;

        $familyId = $_GET['id'] ?? 0;

        $family = $this->model->findById($_GET['id'] ?? 0);
        
        if (!$family) {
            echo 'Family not found';
            return;
        }

        $errorMessage = $this->validate();
       
        if (empty($errorMessage)) {
            // Update to database
            $this->model->update([
                'name' => $inputs['name'],
                'address' => $inputs['address'],
                'phone' => $inputs['phone']
            ], $familyId);

            return redirect('index.php?controller=family');
        }

        view('families.form', [
            'headingTitle' => 'Edit a Family',
            'family' => $family,
            'errorMessage' => $errorMessage
        ]);
    }

    public function delete()
    {
        $this->model->deleteById($_GET['id'] ?? 0);
        return redirect('index.php?controller=family');
        // Flash error message
    }

    protected function validate()
    {
        $inputs = $_POST;
        // Validate data
        $errorMessage = [];

        if (empty($inputs['name'])) {
            $errorMessage['name'] = 'name is required';
        }
        if (empty($inputs['address'])) {
            $errorMessage['address'] = 'address is required';
        }
        if (empty($inputs['phone'])) {
            $errorMessage['phone'] = 'phone is required';
         }

        return $errorMessage;
    }
}