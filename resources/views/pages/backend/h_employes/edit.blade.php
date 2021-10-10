@if ($errors->any())
     <div class="">
          <ul>
             @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
             @endforeach
           </ul>
    </div>
@endif
<form  method='POST' action="{{route('updateemployes','test')}}" autocomplete="off">
{{ method_field('patch') }}
   @csrf
             <table>
               <tr>
                 <td>
                 <label>إسم المستخدم</label>
                  <input type="text" name="username" value="{{$employes->username}}"  required />
                 </td>
                 <td>
                 <label>كلمة المرور</label><br/>
                  <input type="password" name="password" value="{{$employes->password}}"  required />
                 </td>
               </tr>
               <tr>
                 <td>
                 <label>إسم الممرض</label>
                  <input type="text" name="name" value="{{$employes->name}}"  />
                  <input type="hidden" name="emp_id"   value="{{$employes->id}}" />
                 </td>
                 <td>
                 <label>التليفون</label><br/>
                  <input type="text" name="phone" value="{{$employes->phone}}" 
                    oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                    required />
                 </td>
               </tr>
               <tr>
                 <td>
                 <label>المسمي الوظيفي</label>
                  <input type="text" name="title" value="{{$employes->title}}" required />
                 </td>
                 <td>
                 <label>الراتب</label><br/>
                  <input type="text" name="salary" value="{{$employes->salary}}"  
                  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1',);"
                  required />
                 </td>
               </tr>
               <tr>
                
                 <td>
                 <label>الحالة</label>
                    <select class="form-control" name="status_id">
                        <option value="1" {{$employes->status == '1' ? 'selected':''}}>نشط</option>
                        <option value="2" {{$employes->status == '2' ? 'selected':''}}>غير نشط</option>
                    </select>
                 </td>
               </tr>
             </table>
              <br>   
                <input type="submit" value="حفظ" >
              <hr>

        </form>