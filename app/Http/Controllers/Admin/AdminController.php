<?php

   namespace App\Http\Controllers\Admin;

   use App\Http\Controllers\Controller;
   use App\Models\Admin;
   use Illuminate\Http\Request;
   use Illuminate\Support\Facades\Hash;
   use Illuminate\Support\Facades\Auth;

   class AdminController extends Controller
   {
       public function index()
       {
           $admins = Admin::all();
           return view('admin.admins.index', compact('admins'));
       }

       public function create()
       {
           return view('admin.admins.create');
       }

       public function store(Request $request)
       {
           $request->validate([
               'name' => 'required|string|max:255',
               'email' => 'required|email|unique:admins,email',
               'password' => 'required|string|min:8|confirmed',
           ]);

           Admin::create([
               'name' => $request->name,
               'email' => $request->email,
               'password' => Hash::make($request->password),
           ]);

           return redirect()->route('admin.admins.index')->with('success', 'Administrador creado exitosamente.');
       }

       public function show(Admin $admin)
       {
           return view('admin.admins.show', compact('admin'));
       }

       public function edit(Admin $admin)
       {
           return view('admin.admins.edit', compact('admin'));
       }

       public function update(Request $request, Admin $admin)
       {
           $request->validate([
               'name' => 'required|string|max:255',
               'email' => 'required|email|unique:admins,email,' . $admin->id,
               'password' => 'nullable|string|min:8|confirmed',
           ]);

           $admin->update([
               'name' => $request->name,
               'email' => $request->email,
               'password' => $request->password ? Hash::make($request->password) : $admin->password,
           ]);

           return redirect()->route('admin.admins.index')->with('success', 'Administrador actualizado exitosamente.');
       }

       public function destroy(Admin $admin)
       {
           // Evitar que un administrador se elimine a sí mismo
           if ($admin->id === Auth::guard('admin')->user()->id) {
               return redirect()->route('admin.admins.index')->with('error', 'No puedes eliminar tu propia cuenta.');
           }

           $admin->delete();
           return redirect()->route('admin.admins.index')->with('success', 'Administrador eliminado exitosamente.');
       }
   }
