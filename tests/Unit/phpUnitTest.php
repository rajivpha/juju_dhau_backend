<?php

namespace Tests\Unit;


use Tests\TestCase;
use Illuminate\Support\Facades\Session;


class phpUnitTest extends TestCase
{
    public function test_Loading_Login_Page_Test()
    {
        $response = $this->get('/login');
        $response->assertSee('Login');
    }

    public function test_User_Login_test(){
        Session::start();
        $response = $this->call('POST', '/login', [
            'email' => 'test@gm.com',
            'password' => 'password',
            '_token' => csrf_token()
        ]);
        $this->assertEquals(302, $response->getStatusCode());
        $response->assertSee('/userdash');
    }

    public function test_Admin_Login_test(){
        Session::start();
        $response = $this->call('POST', '/admin/login', [
            'email' => 'admin@superadmin.com',
            'password' => 'password',
            '_token' => csrf_token()
        ]);
        $this->assertEquals(302, $response->getStatusCode());
        $response->assertSee('/admin/dashboard');
    }

    public function test_create_user_test(){
        Session::start();
        $response = $this->call('POST', '/register', [
            'first_name' => 'Ramesh',
            'last_name' =>'Shahi',
            'name' =>'BhatBhateni',
            'contact_no' =>'9798436513',
            'address' => 'Bhaktapur',
            'email' => 'bbSuperstore@gm.com',
            'password' => '1234567'
        ]);
        $this->addToAssertionCount(1);
    }

    public function test_add_product_test(){
        Session::start();
        $response = $this->call('POST', '/admin/product/add', [
            'product_name'=>'Large',
            'quantity_size'=>'50',
            'category_id'=>'',
            'price'=>'50',
            'image'=>'',
            'mfd_date'=>'2018-07-21',
            'expiry_date'=>'2018-07-25',
            'status'=>'1',
            'admin_id'=>'1'
            ]);
            $this->addToAssertionCount(1);
        }

        public function test_order_product_test(){
            Session::start();
            $response = $this->call('POST', '/order/placeorder', [
                'product_name'=>'Large',
                'quantity'=>'50',
                'order_date'=>'2018-07-21',
                'status'=>'1',
                'user_id'=>'1'
            ]);
            $this->addToAssertionCount(1);
        }

}




