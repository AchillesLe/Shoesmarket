<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\emailtemplates;
use App\emails;
use App\seller;
use Carbon\Carbon;
use Mail;
class mailController extends Controller
{
    public function index()
    {
        $list = emails::orderBy('created_at','DESC')->get();
        return view('admin.mail.list',['list'=>$list]);
    }
    public function create($idseller)
    {
        if($seller = seller::where('idseller',$idseller)->first())
        {
            $name = $seller->name;
            $email = $seller->email;
            $list = emailtemplates::orderBy('updated_at','DESC')->get();
            return view('admin.mail.create',['list'=>$list,'name'=>$name,'email'=>$email]);
        } 
    }
    public function createsubmit(Request $request)
    {
        $this->validate($request,
            [
                'title'=>'required|min:3|max:70',
                'content'=>'required|min:10',
                'nameTo'=>'required',
                'mailTo'=>'required',
            ],
            [
                'title.required'=>'Bạn chưa nhập tiêu đề mail',
                'title.min'=>'Tiêu đề phải dài hơn 3 kí tự',
                'title.max'=>'Tiêu đề không quá 70 kí tự',
                'content.required'=>'Bạn chưa nhập nội dung mail',
                'content.min'=>'Nội dung phải dài hơn 10 kí tự',
                'nameTo.required'=>'Người nhận không được để trống',
                'mailTo.required'=>'Địa chỉ người nhận không được để trống',
            ]);
        
        Mail::send(null,array('name'=>$request->nameTo,'email'=>$request->mailTo, 'content'=>$request->content), function($message){
            $message->from('yuriboykasgu@gmil.com', 'ShoesMarket');
            $message->to($request->mailTo, $request->mailTo)->subject($request->content);
        });

        return redirect()->route('admin.mail')->with('thongbao','Gửi thành công !');
    }
    public function getcontent($id)
    {
        if($emailtemplate = emailtemplates::where('id',$id)->first())
        {
             $content = $emailtemplate->content;
        }
        else $content = "";
        return $content;
    }
    public function listmailtemplate()
    {
        $list = $emailtemplate = emailtemplates::all();
        
        return view('admin.mail.updateTemplate',['list'=>$list]);
    }
    public function updatemailTemplate(Request $request)
    {
        $this->validate($request,
            [
                'title'=>'required|min:3|max:70',
                'content'=>'required|min:10'
            ],
            [
                'title.required'=>'Bạn chưa nhập tiêu đề mail',
                'title.min'=>'Tiêu đề phải dài hơn 3 kí tự',
                'title.max'=>'Tiêu đề không quá 70 kí tự',
                'content.required'=>'Bạn chưa nhập nội dung mail',
                'content.min'=>'Nội dung phải dài hơn 10 kí tự',
            ]);
        if($request->has('edit'))
        {
            emailtemplates::where('id',$request->id)->update(['title'=>$request->title,'content'=>$request->content,'updated_at'=>(Carbon::now())->toDateTimeString()]);  
            return redirect('admin/mail/mailtemplate')->with('thongbao','Sửa thành công');      
        }
        else
        {
            $this->validate($request,
                [
                    'title'=>'unique:emailtemplates,title'
                ],
                [
                    'title.unique'=>'Tiêu đề mail đã có trong hệ thống .Vui lòng kiểm tra lại .',
                ]);
            $emailtemplate= new emailtemplates;
            $emailtemplate->title = $request->title;
            $emailtemplate->content = $request->content;
            $emailtemplate->save();
            return redirect('admin/mail/mailtemplate')->with('thongbao','Thêm thành công');
        }
       
        
    }
    public function delete($id)
    {
        $emailtemplate = emailtemplates::where('id',$id)->delete();    
        return redirect('admin/mail/mailtemplate')->with('thongbao','Xoá thành công');
    }

}
