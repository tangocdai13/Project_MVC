<?php
class OrderController {
    protected $model;

    public function __construct()
    {
        $this->model = new Order;
    }

    public function index()
    {
        view('orders.index', [
            'orders' => $this->model->getAll()
        ]);
    }

    public function create()
    {
        view('orders.form', [
            'headingTitle' => 'Create a Order',
            'actionUrl' => 'index.php?controller=order&action=store'
        ]);
    }

    public function store()
    {
        $inputs = $_POST;

        $errorMessage = $this->validate();
        if (empty($errorMessage)) {
            //Insert data to dabase
            $this->model->create([
                'name' => $inputs['name'],
                'amount' => $inputs['amount'],
                'price' => $inputs['price']
            ]);
            return redirect('index.php?controller=order');
        }

        view('orders.form', [
            'errorMessage' => $errorMessage
        ]);
    }

    public function edit()
    {
        $order = $this->model->findById($_GET['id']);
        if (!$order) {
            echo 'Order Not Found';
            return;
        }

        view('orders.form', [
            'headingTitle' => 'Edit a Order',
            'order' => $order,
            'actionUrl' => 'index.php?controller=order&action=update&id='. $order->id
        ]);
    }

    public function update()
    {
        $inputs = $_POST;

        $orderId = $_GET['id'] ?? 0;

        $order = $this->model->findById($_GET['id'] ?? 0);

        if (!$order) {
            echo 'Order not found';
            return;
        }

        $errorMessage = $this->validate();
        if (empty($errorMessage)) {
            //Update to database
            $this->model->update([
                'name' => $inputs['name'],
                'amount' => $inputs['amount'],
                'price' => $inputs['price']
            ], $orderId);

            return redirect('index.php?controller=order');
        }

        view('orders.form', [
            'headingTitle' => 'Edit a Order',
            'family' => $order,
            'errorMessage' => $errorMessage
        ]);
    }

    public function delete()
    {
        $this->model->deleteById($_GET['id'] ?? 0);
        return redirect('index.php?controller=order');
    }

    public function validate()
    {
        $inputs = $_POST;
        //validate data
        $errorMessage = [];
        if (empty($inputs['name'])) {
            $errorMessage['name']['required'] = "The name is required";
        }
        if (empty($inputs['amount'])) {
            $errorMessage['amount']['required'] = "The amount is required";
        }
        if (empty($inputs['price'])) {
            $errorMessage['price']['required'] = "The price is required";
        }

        return $errorMessage;
    }
}