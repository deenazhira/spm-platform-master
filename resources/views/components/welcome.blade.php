<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using PHP for Background Image</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url(assets/img/aina.jpeg);
            background-size: cover;
            background-repeat: no-repeat;
        }

        .container {
            max-width: 800px;
            margin: 100px auto;
            padding: 20px;
            background-color: rgba(218, 202, 150, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            color: #666;
            margin-bottom: 10px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        /* Sidebar Styles */
        .sidebar {
            height: 100%;
            width: 200px;
            position: fixed;
            top: 0;
            left: -200px; /* initially hidden */
            background-color: #333;
            padding-top: 20px;
            transition: left 0.3s;
        }

        .sidebar.active {
            left: 0; /* shown */
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }

        /* Logo Styles */
        .logo {
            padding: 20px;
            font-size: 24px;
            color: white;
            background-color: #333;
            text-align: center;
        }

        /* Content Styles */
        .content {
            margin-left: 220px;
            padding: 20px;
        }

        /* Toggle Button Styles */
        .toggle-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: #333;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            z-index: 1000;
        }

        /* Add Subject Button Styles */
        .add-subject-btn {
            display: block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .add-subject-btn:hover {
            background-color: #0056b3;
        }

        /* Responsive Styles */
        @media screen and (max-width: 600px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                left: 0;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>

</head>

<body>
    <!-- Toggle Button -->
    <button class="toggle-btn" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="logo"><img src="LOGO.PNG" alt="Logo"></div>
        <ul>
            <li><a href="/" class="nav-link scrollto active">News</a></li>
            <li><a href="/reflection" class="nav-link scrollto">Reflection</a></li>
            <li><a href="/index" class="nav-link scrollto">Subject</a></li>
        </ul>
    </div>

   {{-- sini utk content dashboard --}}
   @extends('subjects.layouts')
   @section('contents')
   <body>

   <!-- ======= Portfolio Section ======= -->
   <section id="work" class="portfolio-mf sect-pt5 route">
       <div class="container">
           <div class="row">
               <div class="col-sm-12">
                   <div class="title-box text-center header-space">
                       <h3 class="title-a">SUBJECT SPM</h3>
                       <p class="subtitle-a">List of Subject SPM</p>
                       <div class="line-mf"></div>
                   </div>
               </div>
           </div>
           <div class="row">
            @foreach ([
                ['title' => 'Bahasa Melayu', 'code' => 'LMBD 2021', 'image' => 'assets/img/bm.jpg'],
                ['title' => 'English', 'code' => 'ENGL 1234', 'image' => 'assets/img/english.jpg'],
                ['title' => 'Mathematics', 'code' => 'MATH 101', 'image' => 'assets/img/maths.jpeg'],
                ['title' => 'Physics', 'code' => 'PHL 668', 'image' => 'assets/img/physics.png'],
                ['title' => 'Chemistry', 'code' => 'CHEM 555', 'image' => 'assets/img/chemistry.jpg'],
                ['title' => 'Biology', 'code' => 'BIO 303', 'image' => 'assets/img/biology.png'],
                ['title' => 'Sejarah', 'code' => 'SJRH 440', 'image' => 'assets/img/sejarah.jpg'],
                ['title' => 'Pendidikan Islam', 'code' => 'PAI 202', 'image' => 'assets/img/agama.png'],
                ['title' => 'Additional Mathematics', 'code' => 'ADDM 202', 'image' => 'assets/img/addmath.jpg']
            ] as $subject)
            <div class="col-md-4">
                   <div class="work-box">
                       <a href="{{ $subject['image'] }}" data-gallery="portfolioGallery" class="portfolio-lightbox">
                           <div class="work-img">
                               <img src="{{ $subject['image'] }}" alt="" class="img-fluid">
                           </div>
                       </a>
                       <div class="work-content">
                           <div class="row">
                               <div class="col-sm-8">
                                   <h2 class="w-title">{{ $subject['title'] }}</h2>
                                   <div class="w-more">
                                    <span class="w-ctegory">{{ $subject['code'] }}</span> / <span class="w-date">See Topics</span>
                                   </div>
                               </div>
                               <div class="col-sm-4">
                                   <div class="w-like">
                                       <a href="portfolio-details.html"><span class="bi bi-plus-circle"></span></a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               @endforeach
           </div>

           <!-- Add Subject Button -->
           <div class="row">
               <div class="col-sm-12 text-center">
                   <a href="{{ route('add.subject') }}" class="add-subject-btn">ADD A SUBJECT</a>
               </div>
           </div>
       </div>
   </section>

   </body>
   @endsection
   <!-- End Portfolio Section -->



</body>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }
    </script>
</body>

</html>
