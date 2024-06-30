<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | {{ $active }}</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        <!-- <style>
      
      .sidebar {
            transition: transform 0.3s ease-in-out;
            z-index: 50; 
        }
        .sidebar-closed {
            transform: translateX(-100%);
        }
        .sidebar-open {
            transform: translateX(0);
        }
      
        .overlay {
            transition: opacity 0.3s ease-in-out;
            opacity: 0;
            visibility: hidden;
            z-index: 40;
        }
        .overlay-open {
            opacity: 0.5;
            visibility: visible;
        }
    
        .slideshow-container {
    position: relative;
    max-width: 100%;
    margin: auto;
}

.mySlides {
    display: none;
}

img {
    vertical-align: middle;
}

.fade {
    animation-name: fade;
    animation-duration: 1.5s;
}

@keyframes fade {
    from {opacity: .4} 
    to {opacity: 1}
}
    </style> -->
</head>
<body class="overflow-x-hidden">

    <nav>
        @include('components.header')
    </nav>
     
    <div>
        @yield('content')
    </div>

    <footer>
        @include('components.footer')
    </footer>

    <script>
        feather.replace();
//           document.addEventListener('DOMContentLoaded', function () {

//         const menuToggle = document.getElementById('menu-toggle');
//         const sidebar = document.getElementById('sidebar');
//         const closeSidebar = document.getElementById('close-sidebar');
//         const overlay = document.getElementById('overlay');

//         menuToggle.addEventListener('click', function () {
//             sidebar.classList.toggle('sidebar-open');
//             sidebar.classList.toggle('sidebar-closed');
//             overlay.classList.toggle('overlay-open');
//         });

//         closeSidebar.addEventListener('click', function () {
//             sidebar.classList.add('sidebar-closed');
//             sidebar.classList.remove('sidebar-open');
//             overlay.classList.remove('overlay-open');
//         });

//         overlay.addEventListener('click', function () {
//             sidebar.classList.add('sidebar-closed');
//             sidebar.classList.remove('sidebar-open');
//             overlay.classList.remove('overlay-open');
//         });
//     });


       
//         let slideIndex = 0;
// showSlides();

// function showSlides() {
//     let i;
//     let slides = document.getElementsByClassName("mySlides");
//     for (i = 0; i < slides.length; i++) {
//         slides[i].style.display = "none";  
//     }
//     slideIndex++;
//     if (slideIndex > slides.length) {slideIndex = 1}    
//     slides[slideIndex-1].style.display = "block";  
//     setTimeout(showSlides, 7000); 
// }
    </script>
</body>
</html>