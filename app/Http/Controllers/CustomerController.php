<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Throwable;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        // 学習用：Laravelの提供するモデルにはpagenateメソッドがあり、pageパラメータを読み取って、それに合うオブジェクトを返してくれる！！
        // $customers = Customer::select('id', 'name', 'kana', 'tel')->paginate(50);
        $search_val = $request->search;
        $customers = Customer::searchCustomers($search_val)->select('id', 'name', 'kana', 'tel')->paginate(50);
        // dd($customers);
        return Inertia::render('Customers/Index', [
            'customers' => $customers,
            'search_val' => $search_val
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response 
     */
    public function create()
    {
        return Inertia::render('Customers/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\RedirectResponse 
     */
    public function store(StoreCustomerRequest $request)
    {
        // dd($request);
        try {
            Customer::create([
                'name' => $request->name,
                'kana' => $request->kana,
                'tel' => $request->tel,
                'email' => $request->email,
                'postcode' => $request->postcode,
                'address' => $request->address,
                'birthday' => $request->birthday,
                'gender' => $request->gender,
                'memo' => $request->memo,
            ]);
            return to_route('customers.index')
                ->with(['message' => '登録完了！', 'status' => 'success']);
        } catch (Throwable $e) {
            $err = $e->getMessage();
            // dump($err);
            return back()->withInput()
                ->with(['message' => '何かがおかしいようです。。。', 'status' => 'danger']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
