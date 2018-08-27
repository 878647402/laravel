@extends("Admin/default")
@section('title','后台会员注册')
@section("index")
 
 @if(count($errors)>0)
    <div class="mws-form-message error"> 
    @foreach($errors->all() as $e)
         <center> {{$e}}</center>
          <br>
    @endforeach
    </div>
    @elseif(count($errors))
      <div class="mws-form-message error"> 
       <center> 添加成功</center>
     </div>
 @endif
 
  <div class="container"> 
  <!--  <div class="mws-form-message success"> 
   </div> 
   <div class="mws-form-message error"> 
   </div>  -->
   <div class="mws-panel grid_8"> 
    <div class="mws-panel-header"> 
     <span>用户添加</span> 
    </div> 
    <div class="mws-panel-body no-padding"> 
     <form action="/admin/user/" method="post" class="mws-form">
       
      <div class="mws-form-inline"> 
       <div class="mws-form-row"> 
        <label class="mws-form-label">用户名:</label> 
        <div class="mws-form-item"> 
         <input  class="small" value="{{old('username')}}" name="username" type="text" /> 
        </div> 
       </div> 
       <div class="mws-form-row"> 
        <label class="mws-form-label">密码:</label> 
        <div class="mws-form-item"> 
         <input   name="password" class="small" type="password" /> 
        </div> 
       </div> 
       <div class="mws-form-row"> 
        <label class="mws-form-label">确认密码:</label> 
        <div class="mws-form-item"> 
         <input   name="repassword" class="small" type="password" /> 
        </div> 
       </div> 
       <div class="mws-form-row"> 
        <label class="mws-form-label">邮箱:</label> 
        <div class="mws-form-item"> 
         <input  value="{{old('email')}}" name="email" class="small" type="text" /> 
        </div> 
       </div> 
      </div> 
      {{csrf_field()}} 
      <div class="mws-button-row"> 
       <input class="btn btn-danger" value="添加" type="submit" /> 
       <input class="btn " value="重置" type="reset" /> 
      </div> 
     </form> 
    </div> 
   </div> 
   <!-- Panels End --> 
 
@endsection