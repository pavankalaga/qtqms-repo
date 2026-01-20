<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Salesheadquarter;
use Illuminate\Support\Facades\Hash;

class SalesProfile extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $gender;
    public $address;
    public $number;
    public $city;
    public $state;
    public $sales_headquarter_id;

    public $sales_headquarters;

    public function rules()
    {
        return [
           
        ];
    }

    public function mount()
    {
        $this->sales_headquarters = Salesheadquarter::all();
    }

    public function test()
    {
        // $this->validate([
        //     'first_name' => 'required|max:15',
        //     'last_name' => 'required|max:20',
        //     'email' => 'required|email',
        //     'gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
        //     'address' => 'required|max:40',
        //     'number' => 'required|numeric',
        //     'city' => 'required|max:20',
        //     'state' => 'required|max:20',
        //     'sales_headquarter_id' => 'required|exists:salesheadquarters,id', // Ensure this table exists
        // ]);
        User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'gender' => $this->gender,
            'address' => $this->address,
            'number' => $this->number,
            'city' => $this->city,
            'state' => $this->state,
            'sales_headquarter_id' => $this->sales_headquarter_id,
            'password' => Hash::make('password'),
        ]);
        $this->emit('alert', ['type' => 'success', 'message' => 'Sales Profile saved successfully!']);
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->gender = '';
        $this->address = '';
        $this->number = '';
        $this->city = '';
        $this->state = '';
        $this->sales_headquarter_id = '';

    }
   

    public function render()
    {
        return view('livewire.sales-profile');
    }
}
