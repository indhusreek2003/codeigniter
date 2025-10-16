<?php
namespace App\Controllers;

use App\Models\EmployeeModel;
use CodeIgniter\Controller;

class ControllerEmployee extends Controller
{

    // Display all employees
    public function index()

    {
        $model= new employeemodel();
        $data['employees'] = $model->orderBy('id','DESC')->findAll();
        return view('employee/index', $data);
    }

    // Show form to create new employee
    public function create()
    {
        return view('employee/create');
    }
    public function store(){
        helper(['form,url']);
        $model = new employeemodel();
        $file = $this->request->getfile('image');
        $imageName = '';
        if ($file && $file->isvaild()&&!$file->hasmoved()){
            $imageName = $file->getRandomName();
            $file->move('uploads/', $imageName);
        }
          $data =[
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'image' => $imageName,
        ];
        $model->insert($data);
        return redirect()->to('/employees')->with('message','Employee created successfully.');
    }
        
    public function edit($id)
    {
        $model = new employeemodel();
        $data['employee']=$model->find($id);
         
      if (!$employee){
        return redirect()->to('/employees')->with('error', 'Employee not found.');
                    }
    return view('employee/edit',['employee'=> $employee]);
    }

    // Show form to edit employee
    
    // Update employee
    public function update($id)
    {
        helper(['form','url']);
        $model = new employeeModel();
        $employee = $model->find($id); 
        if (!$employee) {
            return redirect()->to('/employee')->with ('error','Employee not found.');
        }
        
                $file = $this->request->getFile('image');
                $imageName= $employee['image'];
                if( $file && $file->isvaild() && !$file->hasmoved()){
                if(!empty($employee['image'])&& file_exists('uploads/'. $employee['image'])){
                    unlink ('upload/' .$employee['image']);
                }
                 $newName = $file->getRandomName();
            $file->move( 'uploads/', $imageName);
                }
       
                
         $data =[
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'image' => $imageName,
        ];
         $model->update($id,$data);
         return redirect()->to ('/employees')->with('message','Employee updated successfully.');
    }
    public function delete($id)
    {
        

{

    $model= new employeemode();
    $employee = $model->find($id);
    if (!$employee){
        return redirect()->to('/employee')->with('error','Employee not found');
    }
    if(!empty($employee['image']) && file_exists('uploads/'.$employee['image'])){
        unlink ('upload/'.$employee['image']);
    }
    $imageName = $file->getRandomName();
    $file->move('uploads/',$imageName);
}
         $data =[
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'image' => $newName,
        ];
    $model->delete($id);
    return redirect()->to('/employees')->with('message','employee delted successfully');
}
    }


    
