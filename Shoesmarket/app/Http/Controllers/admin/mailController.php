<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Emailtemplate;
use App\Email;
use App\Seller;
use Carbon\Carbon;
use Mail;
use App\Mail\AdminMailShipped;
class mailController extends Controller
{
    public function index()
    {
        $list = Email::orderBy('created_at','DESC')->get();
        return view('admin.mail.list',['list'=>$list]);
    }
    public function create($id)
    {
        if($seller = Seller::where('id',$id)->first())
        {
            $name = $seller->name;
            $email = $seller->email;
            $list = Emailtemplate::orderBy('updated_at','DESC')->get();
            return view('admin.mail.create',['list'=>$list,'name'=>$name,'email'=>$email]);
        } 
    }
    public function createsubmit(Request $request)
    {
        $this->validate($request,
            [
                'title'=>'required|min:3|max:100',
                'content'=>'required|min:10',
                'nameTo'=>'required',
                'mailTo'=>'required',
            ],
            [
                'title.required'=>'Bạn chưa nhập tiêu đề mail',
                'title.min'=>'Tiêu đề phải dài hơn 3 kí tự',
                'title.max'=>'Tiêu đề không quá 100 kí tự',
                'content.required'=>'Bạn chưa nhập nội dung mail',
                'content.min'=>'Nội dung phải dài hơn 10 kí tự',
                'nameTo.required'=>'Người nhận không được để trống',
                'mailTo.required'=>'Địa chỉ người nhận không được để trống',
            ]);

        $data = array(['mailTo'=>$request->mailTo,'nameTo'=>$request->nameTo,'title'=>$request->title,'content'=>$request->content]);
           if(Mail::send(new AdminMailShipped($data)))
            {
                $email =  new Email;
                $email->nameFrom = (config('mail.from'))['name'];
                $email->mailFrom = (config('mail.from'))['address'];
                $email->nameTo = $request->nameTo;
                $email->mailTo = $request->mailTo;
                $email->title = $request->title;
                $email->content = $request->content;
                $email->save();
                return redirect()->route('admin.mail')->with('thongbao','Gửi thành công !');
            }
            else
                return redirect()->route('admin.mail')->with('thongbao','Gửi thất bại !');
            
            
        
    }
    public function getcontent($id)
    {
        if($emailtemplate = Emailtemplate::where('id',$id)->first())
        {
             $content = $emailtemplate->content;
        }
        else $content = "";
        return $content;
    }
    public function listmailtemplate()
    {
        $list = $emailtemplate = Emailtemplate::all();
        
        return view('admin.mail.updateTemplate',['list'=>$list]);
    }
    public function updatemailTemplate(Request $request)
    {
        $this->validate($request,
            [
                'title'=>'required|min:3|max:100',
                'content'=>'required|min:30'
            ],
            [
                'title.required'=>'Bạn chưa nhập tiêu đề mail',
                'title.min'=>'Tiêu đề phải dài hơn 3 kí tự',
                'title.max'=>'Tiêu đề không quá 100 kí tự',
                'content.required'=>'Bạn chưa nhập nội dung mail',
                'content.min'=>'Nội dung phải dài hơn 30 kí tự',
            ]);
        if($request->has('edit'))
        {
             $template = Emailtemplate::find($request->id);

             $template->title= $request->title;
             $template->content= $request->content;
             $template->updated_at= (Carbon::now())->toDateTimeString(); 
             $template->save();
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
            $emailtemplate= new Emailtemplate;
            $emailtemplate->title = $request->title;
            $emailtemplate->content = $request->content;
            $emailtemplate->save();
            return redirect('admin/mail/mailtemplate')->with('thongbao','Thêm thành công');
        }
       
        
    }
    public function delete($id)
    {
        $emailtemplate = Emailtemplate::where('id',$id)->delete();    
        return redirect('admin/mail/mailtemplate')->with('thongbao','Xoá thành công');
    }

}
