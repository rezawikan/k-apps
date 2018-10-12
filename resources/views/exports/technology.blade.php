<table>
    <thead>
    <tr>
        <th>Officer</th>
        <th>Project Name</th>
        <th>Project Type</th>
        <th>Country</th>
        <th>Technology Name</th>
        <th>Technology Type</th>
        <th>Price Type</th>
        <th>Distribution Target</th>
        <th>Per Unit</th>
        <th>Distribution Unit</th>
        <th>Total Reached</th>
        <th>Year (Distributed)</th>
    </tr>
    </thead>
    <tbody>
    @foreach($technologies as $technology)
        <tr>
            <td>{{ $technology->po }}</td>
            <td>{{ $technology->project_name }}</td>
            <td>{{ $technology->ptn}}</td>
            <td>{{ $technology->cn}}</td>
            <td>{{ $technology->tn}}</td>
            <td>{{ $technology->tyn}}</td>
            <td>{{ $technology->pricetype }}</td>
            <td>{{ $technology->dt}}</td>
            <td>{{ $technology->per_unit }}</td>
            <td>{{ $technology->distribution_unit }}</td>
            <td>{{ $technology->total_reach }}</td>
            <td>{{ $technology->year }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
