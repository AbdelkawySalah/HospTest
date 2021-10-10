<div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
<br>
<a href="{{route('admins.index')}}">Click Here Test Route</a>
<br /><br />

<a href="{{route('logout')}}">Click Here Logout</a>
<hr>
<table style="float:right">
    <tr>
        <td>
            <a href="{{route('showdepartments')}}" style="float:right;color:white;font-size:20px;background:gray;border-radius:4px">الأقســام</a>
        </td>
        <td>
            <a href="{{route('showNurses')}}" style="float:right;color:white;font-size:20px;background:gray;border-radius:4px">شاشة الممرضات</a>
        </td>
        <td>
            <a href="{{route('showemployes')}}" style="float:right;color:white;font-size:20px;background:gray;border-radius:4px">شاشة الموظفين</a>
        </td>
    </tr>
</table>