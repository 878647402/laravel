@extends("Admin/default")
@section('title','后台查看用户')
@section("index")
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> Data Table with Numbered Pagination</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
     <div id="DataTables_Table_1_length" class="dataTables_length">
<form action="/admin/user" method="get">   
      <label>Show 
        <select size="1" name="option" aria-controls="DataTables_Table_1">
         <option value="" selected="selected">----</option>
         <option value="5" >5</option>
         <option value="10" >10</option>
         <option value="25" >25</option>
         <option value="50">50</option>
         <option value="100">100</option>
        </select> entries</label>
     </div>
         <div class="dataTables_filter" id="DataTables_Table_1_filter">
          <label>搜索: <input name="v" aria-controls="DataTables_Table_1" type="text"  /></label>
          <button class="btn btninfo">查找</button>
         </div>
</form>
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 141px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 193px;" aria-label="Browser: activate to sort column ascending">USER</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 179px;" aria-label="Platform(s): activate to sort column ascending">PASSWORLD</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 120px;" aria-label="Engine version: activate to sort column ascending">EMAIL</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 86px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($data as $v)
       <tr class="odd"> 
        <td class="  sorting_1">{{$v->id}}</td> 
        <td class=" ">{{$v->username}}</td> 
        <td class=" ">{{$v->password}}</td> 
        <td class=" ">{{$v->email}}</td> 
        <td class=" ">

          <form action="/admin/user/{{$v->id}}" method="post">
            {{csrf_field()}}
            {{method_field('put')}}
            <button class="btn btn-danger">修改</button>
          </form>
          <form action="/admin/user/{{$v->id}}" method="post">
            {{csrf_field()}}
            {{method_field('delete')}}
            <button class="btn btn-danger">删除</button>
          </form>
        </td> 
       </tr>
       @endforeach
      </tbody>
     </table>
     <div class="dataTables_info" id="DataTables_Table_1_info">
      Showing 1 to 10 of 57 entries
     </div>

      <div class="dataTables_paginate paging_full_numbers" id="pages">
      {{$data->appends($request)->render()}}
      </div>
 
    </div> 
   </div> 
  </div>
 </body>
</html>
@endsection