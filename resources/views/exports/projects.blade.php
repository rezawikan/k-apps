<table>
    <thead>
    <tr>
        <th>Project Name</th>
        <th>Total Distributed</th>
        <th>Total Reached</th>
    </tr>
    </thead>
    <tbody>
    @foreach($projects as $project)
        <tr>
            <td>{{ $project->project_name }}</td>
            <td>{{ $project->additional_total_distributed}}</td>
            <td>{{ $project->additional_total_reached}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
