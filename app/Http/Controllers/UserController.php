<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public readonly User $user;

    public function __construct()
    {
        $this->user = new User();
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this ->user->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => password_hash($request->input('password'),PASSWORD_DEFAULT),       
        
        ]);

        if($created){
            return redirect()->back()->with('message','Successfully created');
        }

        return redirect()->back()->with('message','Error created');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user_show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user_edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    // Atualizando o usuário com os dados do formulário, exceto '_token' e '_method'
    $update = $this->user->where('id', $id)->update($request->except('_token', '_method'));

    // Verificando se a atualização foi bem-sucedida
    if ($update) {
        // Redirecionando para a lista de usuários com uma mensagem de sucesso
        return redirect()->route('users.index')->with('message', 'Usuário atualizado com sucesso!');
    }

    // Se falhar, redireciona de volta com uma mensagem de erro
    return redirect()->route('users.index')->with('message', 'Erro ao atualizar usuário.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $this->user->where('id', $id)->delete();
        return redirect()->route('users.index');
        //var_dump('delete');
    }
}
