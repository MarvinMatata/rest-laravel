<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>REST Work</title>
</head>

<body>

    <!-- navbar -->
    <nav>
        <a href=""><i><span> REST API</span></i></a>
        <button  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
        </button>

        <div id="navbarSupportedContent">
            <ul>
                <li>
            </ul>

            <ul>
                <li>
                <a href="{{route('courses.create')}}">Manage Course</a>
                </li>
                <li>
                    <a href="{{route('students.create')}}">Manage Student</a>
                </li>
                
            </ul>


        </div>
    </nav>
    <!-- end of navbar -->

    <div class="container">
        @yield('main')
    </div>
</body>

</html>
