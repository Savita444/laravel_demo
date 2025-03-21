<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin_login;
use App\Models\services;
use App\Models\about;
use App\Models\slider;
use App\Models\client;
use App\Models\blog;
use App\Models\photos;
use App\Models\blog_comment;
use App\Models\contact_us;
use Redirect;

class UserController extends Controller
{
    // functions for admin (Back-end) pannel
    public function index_admin(Request $req)
    {
        if($req->session()->has('admin_login'))
        {
            return redirect('/admin/dashboard');
        }

        if($req->signin)
        {
            $email = $req->email;
            $password = $req->password;

            $select_data = admin_login::where('email',$email)->where('password',$password)->count();

            if($select_data>0)
            {
                $arr = admin_login::where('email',$email)->where('password',$password)->first();
                session(['admin_login'=>$arr['id']]);
                return redirect('/admin/dashboard');
            }
            else
            {
                return redirect('/admin/index');
            }
        }
        
        return view('admin/index');
    }

    // Dashboard
    public function dashboard(Request $req)
    {
        $slider = slider::count();
        $services = services::count();
        $client = client::count();
        $blog = blog::count();
        $about = about::count();
        $photos = photos::count();
        $contact_us = contact_us::count();
        $notification = contact_us::where('status',1)->count();

        return view('admin/dashboard',['slider'=>$slider,'services'=>$services,'client'=>$client,'blog'=>$blog,'about'=>$about,'photos'=>$photos,'contact_us'=>$contact_us,'notification'=>$notification]);
    }

    // Slider
    public function add_slider(Request $req)
    {
        if($req->submit_slider)
        {
            $title = $req->title;
            $details = $req->details;
            date_default_timezone_set('Asia/Kolkata');
            $image = date('dmY_His_').$req->file('image')->getClientOriginalName();
            $req->image->move(public_path('images'),$image);

            $sql_insert = array('title'=>$title,'details'=>$details,'image'=>$image);
            slider::create($sql_insert);
        }
        return view('admin/add-slider');
    }

    public function view_slider(Request $req)
    {
        $arr = slider::all();

        return view('admin/view-slider',['arr'=>$arr]);
    }

    public function delete_slider(Request $req,$id)
    {
        $image = slider::where('id',$id)->first()->image;

        unlink('images/'.$image);

        slider::where('id',$id)->delete();

        return redirect('/admin/view-slider');
    }

    public function edit_slider(Request $req,$id)
    {
        $arr = slider::where('id',$id)->get();

        return view('admin/edit-slider',['arr'=>$arr]);
    }

    public function submit_edit_slider(Request $req,$id)
    {
        if($req->edit_slider)
        {
            $title = $req->title;
            $details = $req->details;
            $image_chk = $req->file('image');

            if($image_chk==null)
            {
                $image = slider::where('id',$id)->first()->image;
            }
            else
            {
                $image_delete = slider::where('id',$id)->first()->image;
                unlink('images/'.$image_delete);

                date_default_timezone_set('Asia/Kolkata');
                $image = date('dmY_His_').$req->file('image')->getClientOriginalName();

                $req->image->move(public_path('images'),$image);
            }

            $sql_update = array('title'=>$title,'details'=>$details,'image'=>$image);
            slider::where('id',$id)->update($sql_update);

            return redirect('/admin/view-slider');
        }
    }


    // Services
    public function add_services(Request $req)
    {
        if($req->submit_services)
        {
            $title = $req->title;
            $details = $req->details;

            $sql_insert = array('title'=>$title,'details'=>$details);
            services::create($sql_insert);
        }
        return view('admin/add-services');
    }

    public function view_services(Request $req)
    {
        $arr = services::all();

        return view('admin/view-services',['arr'=>$arr]);
    }

    public function delete_services(Request $req,$id)
    {
        $arr = services::where('id',$id)->delete();

        return redirect('/admin/view-services');
    }

    public function edit_services(Request $req,$id)
    {
        $arr = services::where('id',$id)->get();

        return view('admin/edit-services',['arr'=>$arr]);
    }

    public function submit_edit_service(Request $req,$id)
    {
        if($req->edit_services)
        {
            $title = $req->title;
            $details = $req->details;

            $sql_update = array('title'=>$title,'details'=>$details);
            services::where('id',$id)->update($sql_update);

            return redirect('/admin/view-services');
        }
    }

    // Client
    public function add_client(Request $req)
    {
        if($req->submit_client)
        {
            $name = $req->name;
            date_default_timezone_set('Asia/Kolkata');
            $image = date('dmY_His_').$req->file('image')->getClientOriginalName();

            $req->image->move(public_path('images/'),$image);

            $sql_insert = array('name'=>$name,'image'=>$image);
            client::create($sql_insert);
        }
        return view('admin/add-client');
    }

    public function view_client(Request $req)
    {
        $arr = client::all();

        return view('admin/view-client',['arr'=>$arr]);
    }

    public function delete_client(Request $req,$id)
    {
        $image = client::where('id',$id)->first()->image;
        unlink('images/'.$image);

        client::where('id',$id)->delete();

        return redirect('/admin/view-client');
    }

    public function edit_client(Request $req,$id)
    {
        $arr = client::where('id',$id)->get();

        return view('/admin/edit-client',['arr'=>$arr]);
    }

    public function submit_edit_client(Request $req,$id)
    {
        if($req->edit_client)
        {
            $name = $req->name;
            $image_chk = $req->file('image');

            if($image_chk==null)
            {
                $image = client::where('id',$id)->first()->image;
            }
            else
            {
                $image_delete = client::where('id',$id)->first()->image;
                unlink('images/'.$image_delete);
                date_default_timezone_set('Asia/Kolkata');
                $image = date('dmY_His_').$req->file('image')->getClientOriginalName();

                $req->image->move(public_path('images'),$image);
            }

            $sql_update = array('name'=>$name,'image'=>$image);
            client::where('id',$id)->update($sql_update);

            return redirect('/admin/view-client');
        }
    }

    // Blog
    public function add_blog(Request $req)
    {
        if($req->submit_blog)
        {
            $title = $req->title;
            $s_details = $req->s_details;
            $f_details = $req->f_details;
            date_default_timezone_set('Asia/Kolkata');
            $image = date('dmY_His_').$req->file('image')->getClientOriginalName();

            $req->image->move(public_path('images'),$image);

            $sql_insert = array('title'=>$title,'short_details'=>$s_details,'full_details'=>$f_details,'image'=>$image);

            blog::create($sql_insert);
        }
        return view('admin/add-blog');
    }

    public function view_blog(Request $req)
    {
        $arr = blog::all();

        return view('admin/view-blog',['arr'=>$arr]);
    }

    public function delete_blog(Request $req,$id)
    {
        $image_delete = blog::where('id',$id)->first()->image;
        unlink('images/'.$image_delete);

        blog::where('id',$id)->delete();

        return redirect('/admin/view-blog');
    }

    public function edit_blog(Request $req,$id)
    {
        $arr = blog::where('id',$id)->get();

        return view('admin/edit-blog',['arr'=>$arr]);
    }

    public function submit_edit_blog(Request $req,$id)
    {
        if($req->edit_blog)
        {
            $title=$req->title;
            $s_details=$req->s_details;
            $f_details=$req->f_details;
            $image_chk=$req->file('image');

            if($image_chk==null)
            {
                $image = blog::where('id',$id)->first()->image;
            }
            else
            {
                $image_delete = blog::where('id',$id)->first()->image;
                unlink('images/'.$image_delete);

                date_default_timezone_set('Asia/Kolkata');
                $image=date('dmY_His_').$req->file('image')->getClientOriginalName();

                $req->image->move(public_path('images'),$image);
            }

            $sql_update = array('title'=>$title,'short_details'=>$s_details,'full_details'=>$f_details,'image'=>$image);
            blog::where('id',$id)->update($sql_update);

            return redirect('/admin/view-blog');
        }
    }

    // About
    public function add_thought(Request $req)
    {
        if($req->submit_thought)
        {
            $thought = $req->thought;
            $name = $req->name;
            $city = $req->city;

            $sql_insert = array('thought'=>$thought,'name'=>$name,'city'=>$city);
            about::create($sql_insert);
        }
        return view('admin/add-thought');
    }

    public function view_thought(Request $req)
    {
        $arr = about::all();

        return view('admin/view-thought',['arr'=>$arr]);
    }

    public function delete_thought(Request $req,$id)
    {
        about::where('id',$id)->delete();

        return redirect('/admin/view-thought');
    }

    public function edit_thought(Request $req,$id)
    {
        $arr = about::where('id',$id)->get();

        return view('admin/edit-thought',['arr'=>$arr]);
    }

    public function submit_edit_thought(Request $req,$id)
    {
        if($req->edit_thought)
        {
            $thought = $req->thought;
            $name = $req->name;
            $city = $req->city;

            $sql_update = array('thought'=>$thought,'name'=>$name,'city'=>$city);
            about::where('id',$id)->update($sql_update);

            return redirect('/admin/view-thought');
        }
    }

    // Photos
     public function add_photos(Request $req)
    {
        if($req->submit_photos)
        {
            $title=$req->title;
            $details=$req->details;
            $type=$req->type;
            date_default_timezone_set('Asia/Kolkata');
            $image=date('dmY_His_').$req->file('image')->getClientOriginalName();

            $req->image->move(public_path('images'),$image);

            $sql_insert = array('title'=>$title,'details'=>$details,'type'=>$type,'image'=>$image);
            photos::create($sql_insert);
        }
        return view('admin/add-photos');
    }

    public function view_photos(Request $req)
    {
        $arr = photos::all();

        return view('admin/view-photos',['arr'=>$arr]);
    }

    public function delete_photos(Request $req,$id)
    {
        $image_delete = photos::where('id',$id)->first()->image;

        unlink('images/'.$image_delete);

        photos::where('id',$id)->delete();

        return redirect('admin/view-photos');
    }

    public function edit_photos(Request $req,$id)
    {
        $arr = photos::where('id',$id)->get();

        return view('admin/edit-photos',['arr'=>$arr]);
    }

    public function submit_edit_photos(Request $req,$id)
    {
        if($req->edit_photos)
        {
            $title=$req->title;
            $details=$req->details;
            $type=$req->type;
            $image_chk=$req->file('image');

            if($image_chk==null)
            {
                $image = photos::where('id',$id)->first()->image;
            }
            else
            {
                $image_delete = photos::where('id',$id)->first()->image;
                unlink('images/'.$image_delete);

                date_default_timezone_set('Asia/Kolkata');
                $image = date('dmY_His_').$req->file('image')->getClientOriginalName();

                $req->image->move(public_path('images'),$image);
            }

            $sql_update = array('title'=>$title,'details'=>$details,'type'=>$type,'image'=>$image);
            photos::where('id',$id)->update($sql_update);

            return redirect('admin/view-photos');
        }
    }

    public function view_contacts(Request $req)
    {
        $arr = contact_us::all();
        
        return view('admin/view-contacts',['arr'=>$arr]);
    }


    public function logout_admin(Request $req)
    {
        $req->session()->flush();
        return redirect('/admin/index');
    }



    // functions for Frond-end pannel
    public function index(Request $req)
    {
        $slider_i = slider::all();
        $services_i = services::all();
        $photos_i = photos::all();
        $about_i = about::all();
        $blog_i = blog::all();

        return view('index',['slider_i'=>$slider_i,'services_i'=>$services_i,'photos_i'=>$photos_i,'about_i'=>$about_i,'blog_i'=>$blog_i]);
    }

    public function services(Request $req)
    {
        $arr = services::all();

        return view('services',['arr'=>$arr]);
    }

    public function clients(Request $req)
    {
        $arr = client::all();

        return view('clients',['arr'=>$arr]);
    }

    public function about(Request $req)
    {
        $arr = about::all();
        $arr2 = client::all();

        return view('about',['arr'=>$arr,'arr2'=>$arr2]);
    }

    public function blog(Request $req)
    {
        $arr = blog::paginate(6);

        return view('blog',['arr'=>$arr]);
    }


    public function blog_single(Request $req)
    {
        if($req->search_text)
        {
            $search = $req->search_text;

            if(blog::where('title','like','%'.$search.'%')->count() != null)
            {
                $id = blog::where('title','like','%'.$search.'%')->first()->id;

                if($req->submit_comment)
                {
                    $name = $req->name;
                    $email = $req->email;
                    $subject = $req->subject;
                    $message = $req->message;
                    $user_id = $id;

                    $sql_insert = array('user_id'=>$user_id,'name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message);
                    blog_comment::create($sql_insert);

                    return redirect::back();
                }

                $arr = blog::where('id',$id)->get();
                $arr2 = blog_comment::where('user_id',$id)->get();

                $prev = blog::where('title','like','%'.$search.'%')->where('id','<',$id)->orderBy('id','desc')->first();
                $next = blog::where('title','like','%'.$search.'%')->where('id','>',$id)->orderBy('id','asc')->first();

                return view('blog-single',['arr'=>$arr,'arr2'=>$arr2,'prev'=>$prev,'next'=>$next,'search_text'=>$search]);    
            }
            else
            {
                return redirect::back()->withMessage('No records found for "'.$search.'"...!');
            }
        }
        else
        {
            $id = blog::first()->id;

            if($req->submit_comment)
            {
                $name = $req->name;
                $email = $req->email;
                $subject = $req->subject;
                $message = $req->message;
                $user_id = $id;

                $sql_insert = array('user_id'=>$user_id,'name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message);
                blog_comment::create($sql_insert);

                return redirect::back();
            }

            $arr = blog::where('id',$id)->get();
            $arr2 = blog_comment::where('user_id',$id)->get();

            $prev = blog::where('id','<',$id)->orderBy('id','desc')->first();
            $next = blog::where('id','>',$id)->orderBy('id','asc')->first();

            return view('blog-single',['arr'=>$arr,'arr2'=>$arr2,'prev'=>$prev,'next'=>$next]);
        }  

        $req->session('message')->flush();
    }

    public function blog_single_id(Request $req,$id)
    {
        if($req->search_text && $req->_token)
        {
            $search = $req->search_text;

            return redirect()->to('/blog-single?search_text='.$search);
        }
        else if($req->search_text)
        {
            $search = $req->search_text;

            if($req->submit_comment)
            {
                $name = $req->name;
                $email = $req->email;
                $subject = $req->subject;
                $message = $req->message;
                $user_id = $id;

                $sql_insert = array('user_id'=>$user_id,'name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message);
                blog_comment::create($sql_insert);

                return redirect::back();
            }

            $arr = blog::where('id',$id)->get();
            $arr2 = blog_comment::where('user_id',$id)->get();

            $prev = blog::where('title','like','%'.$search.'%')->where('id','<',$id)->orderBy('id','desc')->first();
            $next = blog::where('title','like','%'.$search.'%')->where('id','>',$id)->orderBy('id','asc')->first();

            return view('blog-single',['arr'=>$arr,'arr2'=>$arr2,'prev'=>$prev,'next'=>$next,'search_text'=>$search]);
        }
        else
        {
            if($req->submit_comment)
            {
                $name = $req->name;
                $email = $req->email;
                $subject = $req->subject;
                $message = $req->message;
                $user_id = $id;

                $sql_insert = array('user_id'=>$user_id,'name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message);
                blog_comment::create($sql_insert);

                return redirect::back();
            }

            $arr = blog::where('id',$id)->get();
            $arr2 = blog_comment::where('user_id',$id)->get();

            $prev = blog::where('id','<',$id)->orderBy('id','desc')->first();
            $next = blog::where('id','>',$id)->orderBy('id','asc')->first();

            return view('blog-single',['arr'=>$arr,'arr2'=>$arr2,'prev'=>$prev,'next'=>$next]);  
        }
    }

    public function blog_comment_dlt(Request $req,$id,$d_id)
    {
        blog_comment::where('id',$d_id)->delete();

        return redirect()->back();
    }

    public function photos(Request $req)
    {
        $arr = photos::paginate(6);

        return view('work-3columns',['arr'=>$arr]);
    }

    public function contact(Request $req)
    {
        if($req->submit_contact)
        {
            $name = $req->name;
            $email = $req->email;
            $subject = $req->subject;
            $message = $req->message;

            $sql_insert = array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message);
            contact_us::create($sql_insert);
        }
        return view('contact');
    }   
}
