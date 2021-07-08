<x-master/>
<x-header/>
<div class="container profile">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
        <table>
                <tr>
                    <td>Name </td>
                    <td>{{$user['name']}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{$user['email']}}</td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td>{{$user['contact']}}</td>
                </tr>
                <tr>
                    <td>Hostel</td>
                    <td>{{$user['hostel']}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<x-footer/>