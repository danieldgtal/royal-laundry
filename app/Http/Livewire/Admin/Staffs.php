<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Staff;
use App\Models\Branch;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class Staffs extends Component
{
  public $per_page;
  protected $listeners = ['confirmDelete' => 'staffDeleted' ];
  public $branch, $firstname, $lastname,$gender,$phone,$email,$password, $password_confirmation;
  public $staff_id;

  public function addStaff()
  {
    $this->validate([
      'firstname' => ['required', 'string', 'max:255'],
      'lastname' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'gender' => ['required','string','max:10'],
      'phone' => 'required|string',
      'branch' => 'required|integer|max:2',
      'password'=> ['required', 'confirmed', Password::defaults()],
    ]);


    $user = new User();
    $user->name = $this->firstname. " " .$this->lastname;
    $user->email = $this->email;
    $user->phone = $this->phone;
    $user->user_type = '1';
    $user->password = Hash::make($this->password);
    
    $user->save();

    
    $staff = new Staff();
    $staff->staff_id = $user->id;
    $staff->branch_id = $this->branch;
    $staff->firstname = $this->firstname;
    $staff->lastname = $this->lastname;
    $staff->gender = $this->gender;
    $staff->email = $this->email;
    $staff->created_at = now();
    $staff->updated_at = now();

    $staff->save();
  

    session()->flash('message', 'New Staff Has been added successfully');

    $this->reset();

    $this->dispatchBrowserEvent('close-modal');

  }

  public function deleteDialog($id)
  {
    $this->staff_id = $id;
    $this->dispatchBrowserEvent('show-delete-alert');
  }

  public function staffDeleted()
  {

    // $staff = Staff::where('staff_id', $this->staff_id)->first();
    $user = User::where('id', $this->staff_id)->first();
    
    $user->delete();

    $this->dispatchBrowserEvent('itemDeleted');
  }

  public function editStaff($id)
  {
    if($id){

      $staff = Staff::where('staff_id',$id)->first();
      $user = User::where('id', $id)->first();

      $this->staff_id = $id;
      $this->phone = $user->phone;
      $this->firstname = $staff->firstname;
      $this->lastname = $staff->lastname;
      $this->branch = $staff->branch_id;
      $this->gender = $staff->gender;
      $this->email = $staff->email;
      $this->password = $user->password;
      $this->password_confirmation = $user->password;
      

      $this->dispatchBrowserEvent('show-edit-staff-model');

    }else {
      abort('404');
    }
  }

  public function editStaffData()
  {
    
    $this->validate([
      'firstname' => ['required', 'string', 'max:255'],
      'lastname' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255'],
      'gender' => ['required','string','max:10'],
      'phone' => 'required|string',
      'branch' => 'required|integer|max:2',
      'password'=> ['required', 'confirmed', Password::defaults()],
    ]);

    $user = User::where('id', $this->staff_id)->first();
    $user->name = $this->firstname. " ".$this->lastname;
    $user->phone = $this->phone;
    $user->email = $this->email;
    $user->user_type = '1';
    $user->password = Hash::make($this->password);

    $user->save();

    $staff = Staff::where('staff_id', $this->staff_id)->first();
    $staff->branch_id = $this->branch;
    $staff->firstname = $this->firstname;
    $staff->lastname = $this->lastname;
    $staff->gender = $this->gender;
    $staff->email = $this->email;
    $staff->updated_at = now();

    $staff->save();

    session()->flash('message', 'Staff details updated successfully!');

    $this->reset();

    $this->dispatchBrowserEvent('close-modal');

  }

  public function render()
  { 
    $branches = Branch::all();
    $staffs = Staff::paginate($this->per_page);
    return view('livewire.admin.staffs', [
      'staffs' => $staffs,
      'branches' => $branches,
    ]);
  }
}
