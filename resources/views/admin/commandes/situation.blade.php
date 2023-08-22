@extends("layouts.admin")
@section("content")

<table id="myTable">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">First Name</th>
            <th class="text-center">Last Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Gender</th>
            <th class="text-center">Country</th>
            <th class="text-center">Salary ($)</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>

</table>


@endsection
@section("script")
<script>
 $(document).ready(function() {
    $('#myTable').DataTable();
} );</script>
@endsection