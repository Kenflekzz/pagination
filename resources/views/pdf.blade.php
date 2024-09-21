<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance List</title>
    <style>
        body {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 100px; /* Adjust based on your header's height */
            text-align: center;
            line-height: 1.5;
            border-bottom: 1px solid #ddd;
            background: #fff; /* Ensure background is white */
            z-index: 1000; /* Ensure it is on top */
        }

        .header img {
            width: 100%;
        }

        .header .header-tag {
            font-weight: bold;
            margin: 0;
        }

        .info {
            font-size: 10px;
            text-align: left;
            margin-top: 120px; /* Adjust this to ensure space for the header */
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; /* Ensure there is space between header and table */
        }

        .table th,
        .table td {
            border: 1px solid #000000;
            padding: 8px;
            text-align: left;
            font-size: 9px;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <header class="header">
        <img src="{{ public_path('images/header1.png') }}" alt="School Logo">
        <p class="header-tag">Monitoring Sheet</p>
        <p class="header-tag">Class Orientation</p>
    </header>

    <div class="info">
        @if ($pageNumber === 1) <!-- Show this content only on the first page -->
            <p>Course: IT 107 - Information Assurance and Security I</p>
            <p>Sem: 1st semester</p>
            <p>S.Y.: 2024-2025</p>
            <p>Code: CDIJ1</p>
            <p>Instructor: Federico M. Griño</p>
        @endif
    </div>

    @foreach ($students->chunk($itemsPerPage) as $chunk)
        @if (!$loop->first)
            <div class="page-break"></div>
        @endif

        <!-- Apply different top margin for the first page and subsequent pages -->
        <table class="table" style="margin-top: {{ $loop->first ? '20px' : '150px' }}">
            <thead>
                <tr>
                    <th>NAME OF STUDENTS</th>
                    <th>Status Vision, Mission & College Goals</th>
                    <th>Syllabus/Course Outline</th>
                    <th>School Classroom Policies</th>
                    <th>Grading System</th>
                    <th>Course Requirements/Project</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($chunk as $student)
                    <tr>
                        <td>{{ $student['name'] ?? 'N/A' }}</td>
                        <td>{{ $student['status_vision_mission'] ?? 'N/A' }}</td>
                        <td>{{ $student['syllabus'] ?? 'N/A' }}</td>
                        <td>{{ $student['classroom_policies'] ?? 'N/A' }}</td>
                        <td>{{ $student['grading_system'] ?? 'N/A' }}</td>
                        <td>{{ $student['requirements_project'] ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach

    <script type="text/php">
        if (isset($pdf)) {
            $pdf->page_script(function ($pageNumber, $pageCount, $fontMetrics) use ($pdf) {
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $size = 10;
                $x = 520; // X-coordinate for the text
                $y = 15;  // Y-coordinate for the text
                $text = "Page " . $pageNumber . " of " . $pageCount;
                $pdf->text($x, $y, $text, $font, $size);
            });
        }
    </script>
</body>
</html>
