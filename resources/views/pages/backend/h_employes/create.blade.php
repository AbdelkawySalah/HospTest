<div id="employes">
        <form  method='POST' action="{{route('storeemployes')}}" autocomplete="off">
            @csrf
             <table>
               <tr>
                 <td>
                 <label>إسم المستخدم</label>
                  <input type="text" name="username" value="{{old('username')}}"  required />
                 </td>
                 <td>
                 <label>كلمة المرور</label><br/>
                  <input type="text" name="password" value="{{old('password')}}" required />
                 </td>
               </tr>
               <tr>
                 <td>
                 <label>إسم الموظف</label>
                  <input type="text" name="name" value="{{old('name')}}" required />
                 </td>
                 <td>
                 <label>التليفون</label><br/>
                  <input type="text" name="phone" value="{{old('phone')}}" required 
                  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                  />
                 </td>
               </tr>
               <tr>
                 <td>
                 <label>المسمي الوظيفي</label>
                  <input type="text" name="title" value="{{old('title')}}"  required />
                 </td>
                 <td>
                 <label>الراتب</label><br/>
                 <input type="text" name="salary" value="{{old('salary')}}" required 
                  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1',);"
                  />
                 </td>
               </tr>
               <tr>
                 <td>
                 <label>المهنة</label><br/>
                   <select name="role">
                      <option value="" selected disabled>أختر من القائمة</option>
                      <option value="1">استقبال</option>
                      <option value="2">امن</option>
                      <option value="3"> نظافة</option>
                      <option value="4">سائق </option>
                   </select>
                 </td>
               </tr>
             </table>
              <input type="submit" value="حفظ" >
        </form>
</div>