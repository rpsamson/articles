<?php

namespace Admin\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Shield\Entities\User ;

class Users extends BaseController
{
    private  UserModel $model;

    public function __construct() 
    {
        $this->model = new UserModel;
        helper('admin');
    }
    public function index()
    {
        $users = $this->model->orderBy('created_at')->paginate(3);
        return view('Admin\Views\Users\index', [
            'users' => $users, 
            'pager' => $this->model->pager
        ]);
    }

    public function show($id)
    {
        $user = $this->getUserOr404($id);
        
        return view('Admin\Views\Users\show', ['user' => $user]);

    }
    //-------------------------------------------------------------

    public function edit($id)
    {
        $user = $this->getUserOr404($id);
        return view('Admin\Views\Users\edit', ['user' => $user]);

    }
    //-------------------------------------------------------------

    public function update($id)
    {
        $user = $this->getUserOr404($id);
        if(!$user->hasChanged()) {
            return redirect()->back()
                             ->with('message', 'Nothing to Update');
        }

        if($this->model->save($user)) {
            return redirect()->to('admin/users/' . $id)
                             ->with('message', 'User Saved');
        }

        return redirect()->back()
                         ->with('errors', $this->model->errors())
                         ->withInput();

    }
    public function toggleBan($id)
    {
        $user = $this->getUserOr404($id);
        if ($user->isBanned()) 
        {
            $user->unBan();
        } else {
            $user->ban();
        }

        return redirect()->back()
                         ->with('message', 'User Saved');
    }


    public function groups($id)
    {
        $user = $this->getUserOr404($id);

        if ($this->request->is('post')) {
            $groups = $this->request->getPost('groups') ?? [];
            $user->syncGroups(...$groups);
            return redirect()->to("admin/users/$id")
                             ->with('message', 'User Saved');
        }
        return view('Admin\Views\Users\groups', ['user' => $user]);
    }
    public function permissions($id)
    {
        $user = $this->getUserOr404($id);

        if ($this->request->is('post')) {
            $permissions = $this->request->getPost('permissions') ?? [];
            $user->syncPermissions(...$permissions);
            return redirect()->to("admin/users/$id")
                             ->with('message', 'User Saved');
        }
        return view('Admin\Views\Users\permissions', ['user' => $user]);
    }

   
    private function getUserOr404($id) : User {

        $user = $this->model->find($id);

        if($user === null) {
            throw new PageNotFoundException("User with id $id not found.");
        }

        return $user;
    }

}
