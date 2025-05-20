<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Registered Members</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            padding: 20px;
            background-color: #f9f9f9;
        }

        h2 {
            color: #0d6efd;
            margin-bottom: 20px;
        }

        table th, table td {
            vertical-align: middle;
        }

        select, input[type="text"] {
            width: auto;
            display: inline-block;
            margin-right: 5px;
        }

        .table-actions form {
            display: inline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>All Registered Members</h2>

    <table class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
                <tr>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ ucfirst($member->status) }}</td>
                    <td>{{ ucfirst($member->role) }}</td>

                   
                    <td class="table-actions">
                    <!-- ✅ UPDATE FORM -->
                    <form method="POST" action="{{ route('admin.members.update', $member->id) }}" class="d-inline">
                     @csrf
                     @method('PUT')
        
                    <!-- Status Dropdown -->
                  <select name="status" class="form-select form-select-sm d-inline w-auto">
                     <option value="pending" {{ $member->status == 'pending' ? 'selected' : '' }}>Pending</option>
                     <option value="approved" {{ $member->status == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ $member->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                  </select>

                 <!-- Role Dropdown -->
                 <select name="role" class="form-select form-select-sm w-auto mt-1">
                  <option value="member" {{ $member->role == 'member' ? 'selected' : '' }}>Member</option>
                  <option value="leader" {{ $member->role == 'leader' ? 'selected' : '' }}>Leader</option>
                  <option value="usher" {{ $member->role == 'usher' ? 'selected' : '' }}>Usher</option>
                 <option value="choir" {{ $member->role == 'choir' ? 'selected' : '' }}>Choir</option>
                </select>

              <button type="submit" class="btn btn-success btn-sm mt-1">Update</button>
               </form>

             <!-- ✅ DELETE FORM (only shown if not admin/pastor) -->
             @if($member->role !== 'admin' && $member->role !== 'pastor')
              <form method="POST" action="{{ route('admin.members.destroy', $member->id) }}" 
              onsubmit="return confirm('Are you sure you want to delete this member?');" 
              class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm mt-1">Remove</button>
           </form>
          @endif
        </td>

        </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
