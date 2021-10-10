<h3>شاشة الموظفين </h3>
<hr>
@if ($errors->any())
     <div class="">
          <ul>
             @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
             @endforeach
           </ul>
    </div>
@endif
<table style="color:red;text-align:center;padding:4px">
   <thead>
     <tr>
        <th>إسم المستخدم</th>
        <th>الإسم</th>
        <th>التليفون</th>
        <th>المسمى الوظيفي</th>
        <th>الراتب</th>
        <th>القسم التابع لها</th>
        <th>الحالة</th>
        <th>الحركات</th>

      </tr>
   </thead>
   <tbody>
      @foreach($employes as $employe)
      <tr>
         <td>{{$employe->username}}</td>
         <td>{{$employe->name}}</td>
         <td>{{$employe->phone}}</td>
         <td>{{$employe->title}}</td>
         <td>{{$employe->salary}}</td>
         <td>{{$employe->status==1?'نشط':'غير نشط'}}</td>
         <td><a href="{{route('editemployes',$employe->id)}}">تعديل </a></td>
         <td><a href="{{route('deleteemployes',$employe->id)}}">حذف </a></td>
      </tr>
      @endforeach;
   </tbody>
</table>
<hr/>
<hr><hr>
@include('pages.backend.h_employes.create')