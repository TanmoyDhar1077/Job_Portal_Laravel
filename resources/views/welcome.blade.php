<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerConnect - Find Your Dream Job</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="font-sans antialiased text-gray-800">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <div
                    class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-xl">

                    <svg width="48" height="48" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <rect width="64" height="64" rx="12" fill="#1E3A8A" />
                        <!-- Briefcase -->
                        <rect x="16" y="26" width="32" height="22" rx="2" fill="#3B82F6" />
                        <rect x="24" y="22" width="16" height="6" rx="1" fill="#60A5FA" />
                        <!-- Handle -->
                        <rect x="28" y="18" width="8" height="4" rx="1" fill="#BFDBFE" />
                        <!-- Person Icon (Head) -->
                        <circle cx="32" cy="46" r="4" fill="#FBBF24" />
                    </svg>
                </div>
                <span class="text-xl font-bold text-blue-600">CareerConnect</span>
            </div>

            <div class="hidden md:flex space-x-8">
                <a href="#" class="text-blue-600 font-medium">Home</a>
                <a href="#" class="text-gray-600 hover:text-blue-600">Jobs</a>
                <a href="#" class="text-gray-600 hover:text-blue-600">Companies</a>
                <a href="#" class="text-gray-600 hover:text-blue-600">Career Resources</a>
                <a href="#" class="text-gray-600 hover:text-blue-600">About Us</a>
            </div>

            <div class="flex items-center space-x-4">
                @auth
                    <a href="{{ route('dashboard') }}"
                        class="hidden md:block text-gray-600 hover:text-blue-600">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                            class="hidden md:block text-gray-600 hover:text-blue-600 ml-4">Logout</a>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hidden md:block text-gray-600 hover:text-blue-600">Sign In</a>
                    <a href="{{ route('register') }}" class="hidden md:block text-gray-600 hover:text-blue-600">Register</a>
                @endauth
                <a href="#"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 ml-2">Post
                    a Job</a>
                <button class="md:hidden text-gray-600 focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="gradient-bg text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Find Your Dream Job Today</h1>
            <p class="text-xl md:text-2xl mb-10 max-w-2xl mx-auto">Join thousands of professionals who found their
                perfect match through CareerConnect</p>

            <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-2">
                <div class="flex flex-col gap-3 md:flex-row">
                    <input type="text" placeholder="Job title, skills, or company"
                        class="flex-grow p-4 rounded-lg focus:outline-none text-gray-800">
                    <input type="text" placeholder="Location"
                        class="p-4 rounded-lg focus:outline-none text-gray-800 border-l md:border-l-0 md:border-t border-gray-200">
                    <button
                        class="bg-blue-600 text-white px-6 py-4 rounded-lg hover:bg-blue-700 transition duration-300">Search
                        Jobs</button>
                </div>
            </div>

            <div class="mt-8 flex flex-wrap items-center justify-center gap-2">
                <span class="text-sm">Popular Searches:</span>
                <a href="#" class="text-sm bg-white bg-opacity-20 px-3 py-1 rounded-full hover:bg-opacity-30">Software
                    Engineer</a>
                <a href="#" class="text-sm bg-white bg-opacity-20 px-3 py-1 rounded-full hover:bg-opacity-30">Marketing
                    Manager</a>
                <a href="#" class="text-sm bg-white bg-opacity-20 px-3 py-1 rounded-full hover:bg-opacity-30">Data
                    Analyst</a>
                <a href="#" class="text-sm bg-white bg-opacity-20 px-3 py-1 rounded-full hover:bg-opacity-30">Graphic
                    Designer</a>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Connecting Talent with Opportunities</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">CareerConnect is trusted by thousands of candidates and
                    companies worldwide</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="stat-card bg-white p-8 rounded-xl shadow-md text-center transition duration-300">
                    <div class="text-4xl font-bold text-blue-600 mb-2">
                        <span class="counter" data-target="15200">0</span>+
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Jobs Available</h3>
                    <p class="text-gray-600">Find your perfect match from our extensive job listings</p>
                </div>

                <div class="stat-card bg-white p-8 rounded-xl shadow-md text-center transition duration-300">
                    <div class="text-4xl font-bold text-blue-600 mb-2">
                        <span class="counter" data-target="4200">0</span>+
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Recruiting Companies</h3>
                    <p class="text-gray-600">Trusted by top employers worldwide</p>
                </div>

                <div class="stat-card bg-white p-8 rounded-xl shadow-md text-center transition duration-300">
                    <div class="text-4xl font-bold text-blue-600 mb-2">
                        <span class="counter" data-target="18500">0</span>+
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Candidates Hired</h3>
                    <p class="text-gray-600">Professionals who found their dream jobs</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Categories Section -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Browse Top Categories</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Find jobs in the most in-demand industries</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <a href="#"
                    class="bg-white p-6 rounded-lg shadow-sm text-center hover:shadow-md transition duration-300">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-laptop-code text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="font-medium">Technology</h3>
                    <p class="text-sm text-gray-500">856 jobs</p>
                </a>

                <a href="#"
                    class="bg-white p-6 rounded-lg shadow-sm text-center hover:shadow-md transition duration-300">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-chart-line text-green-600 text-xl"></i>
                    </div>
                    <h3 class="font-medium">Finance</h3>
                    <p class="text-sm text-gray-500">642 jobs</p>
                </a>

                <a href="#"
                    class="bg-white p-6 rounded-lg shadow-sm text-center hover:shadow-md transition duration-300">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-stethoscope text-purple-600 text-xl"></i>
                    </div>
                    <h3 class="font-medium">Healthcare</h3>
                    <p class="text-sm text-gray-500">523 jobs</p>
                </a>

                <a href="#"
                    class="bg-white p-6 rounded-lg shadow-sm text-center hover:shadow-md transition duration-300">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-book text-red-600 text-xl"></i>
                    </div>
                    <h3 class="font-medium">Education</h3>
                    <p class="text-sm text-gray-500">487 jobs</p>
                </a>

                <a href="#"
                    class="bg-white p-6 rounded-lg shadow-sm text-center hover:shadow-md transition duration-300">
                    <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-shopping-bag text-yellow-600 text-xl"></i>
                    </div>
                    <h3 class="font-medium">Retail</h3>
                    <p class="text-sm text-gray-500">398 jobs</p>
                </a>

                <a href="#"
                    class="bg-white p-6 rounded-lg shadow-sm text-center hover:shadow-md transition duration-300">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-paint-brush text-indigo-600 text-xl"></i>
                    </div>
                    <h3 class="font-medium">Design</h3>
                    <p class="text-sm text-gray-500">375 jobs</p>
                </a>
            </div>
        </div>
    </section>

    <!-- Hot Jobs Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center mb-12">
                <div>
                    <h2 class="text-3xl font-bold mb-2">Hot Jobs Right Now</h2>
                    <p class="text-gray-600">Latest job postings with competitive salaries</p>
                </div>
                <a href="#" class="mt-4 md:mt-0 text-blue-600 font-medium hover:text-blue-800">View all jobs <i
                        class="fas fa-arrow-right ml-1"></i></a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Job Card 1 -->
                <div class="job-card bg-white p-6 rounded-xl shadow-sm transition duration-300">
                    <div class="flex justify-between mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-laptop-code text-blue-600 text-xl"></i>
                        </div>
                        <div class="text-sm bg-green-100 text-green-800 p-2 flex justify-center items-center rounded">
                            Full Time</div>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Senior Frontend Developer</h3>
                    <div class="flex items-center text-gray-600 mb-3">
                        <i class="fas fa-building mr-2"></i>
                        <span>TechCorp Solutions</span>
                    </div>
                    <div class="flex items-center text-gray-600 mb-4">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span>San Francisco, Remote</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-blue-600">$120,000 - $150,000</span>
                        <a href="#" class="text-blue-600 hover:text-blue-800">View Details</a>
                    </div>
                </div>

                <!-- Job Card 2 -->
                <div class="job-card bg-white p-6 rounded-xl shadow-sm transition duration-300">
                    <div class="flex justify-between mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-chart-line text-green-600 text-xl"></i>
                        </div>
                        <div class="text-sm bg-blue-100 text-blue-800 p-2 flex justify-center items-center rounded">
                            Contract</div>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Marketing Analytics Manager</h3>
                    <div class="flex items-center text-gray-600 mb-3">
                        <i class="fas fa-building mr-2"></i>
                        <span>Global Advisors</span>
                    </div>
                    <div class="flex items-center text-gray-600 mb-4">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span>New York, NY</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-blue-600">$95,000 - $120,000</span>
                        <a href="#" class="text-blue-600 hover:text-blue-800">View Details</a>
                    </div>
                </div>

                <!-- Job Card 3 -->
                <div class="job-card bg-white p-6 rounded-xl shadow-sm transition duration-300">
                    <div class="flex justify-between mb-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user-md text-purple-600 text-xl"></i>
                        </div>
                        <div class="text-sm bg-yellow-100 text-yellow-800 p-2 flex justify-center items-center rounded">
                            Part Time</div>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Registered Nurse</h3>
                    <div class="flex items-center text-gray-600 mb-3">
                        <i class="fas fa-building mr-2"></i>
                        <span>City Medical Center</span>
                    </div>
                    <div class="flex items-center text-gray-600 mb-4">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span>Chicago, IL</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-blue-600">$45 - $60/hr</span>
                        <a href="#" class="text-blue-600 hover:text-blue-800">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Success Stories</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Hear from professionals who found their dream jobs through
                    CareerConnect</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="testimonial-card bg-white p-6 rounded-xl shadow-sm transition duration-300">
                    <div class="flex items-center mb-4">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/c32773ae-6b77-4d7b-85a0-463707bdf573.png"
                            alt="Headshot of Sarah Johnson, a professional woman smiling with confidence"
                            class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Sarah Johnson</h4>
                            <p class="text-sm text-gray-600">UX Designer at TechVision</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">"CareerConnect helped me transition from graphic design to UX design.
                        Their job matching system is incredible and the resources helped me prepare for interviews."</p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="testimonial-card bg-white p-6 rounded-xl shadow-sm transition duration-300">
                    <div class="flex items-center mb-4">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/77307541-f865-4ecb-a3a5-6ebb7b90021c.png"
                            alt="Headshot of Michael Chen, a young professional wearing glasses"
                            class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Michael Chen</h4>
                            <p class="text-sm text-gray-600">Data Scientist at DataWorks</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">"After months of searching, I found my perfect role through
                        CareerConnect. The salary comparison tools helped me negotiate a 20% higher offer than I
                        expected."</p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="testimonial-card bg-white p-6 rounded-xl shadow-sm transition duration-300">
                    <div class="flex items-center mb-4">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/ba976c7e-e79c-42e5-8781-5b5c6622dd68.png"
                            alt="Headshot of David Rodriguez, a professional with beard smiling confidently"
                            class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">David Rodriguez</h4>
                            <p class="text-sm text-gray-600">Marketing Director at BrightHouse</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">"The career advice articles on CareerConnect helped me revamp my
                        resume and LinkedIn profile. Within 2 weeks, I had 5 interview requests!"</p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-16 gradient-bg text-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-6">Ready to Find Your Dream Job?</h2>
            <p class="text-xl mb-10 max-w-2xl mx-auto">Join thousands of professionals who accelerated their careers
                with CareerConnect</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#"
                    class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-opacity-90 transition duration-300">Find
                    Jobs</a>
                <a href="#"
                    class="border-2 border-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:bg-opacity-10 transition duration-300">Post
                    a Job</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-12 pb-8">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div
                            class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-xl">
                            <svg width="48" height="48" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"
                                fill="none">
                                <rect width="64" height="64" rx="12" fill="#1E3A8A" />
                                <!-- Briefcase -->
                                <rect x="16" y="26" width="32" height="22" rx="2" fill="#3B82F6" />
                                <rect x="24" y="22" width="16" height="6" rx="1" fill="#60A5FA" />
                                <!-- Handle -->
                                <rect x="28" y="18" width="8" height="4" rx="1" fill="#BFDBFE" />
                                <!-- Person Icon (Head) -->
                                <circle cx="32" cy="46" r="4" fill="#FBBF24" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold">CareerConnect</span>
                    </div>
                    <p class="text-gray-400 mb-4">Connecting talent with opportunity since 2015. Our mission is to help
                        professionals find fulfilling careers and companies build exceptional teams.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">For Job Seekers</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Browse Jobs</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Job Alerts</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Career Advice</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Resume Builder</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Salary Calculator</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">For Employers</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Post a Job</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Browse Candidates</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Recruiting Solutions</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Employer Dashboard</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Talent Pool</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-400"><i
                                class="fas fa-map-marker-alt mr-2 text-blue-500"></i> 123 Career Blvd, Suite 500<br>San
                            Francisco, CA 94105</li>
                        <li class="flex items-center text-gray-400"><i class="fas fa-phone-alt mr-2 text-blue-500"></i>
                            (800) 555-1234</li>
                        <li class="flex items-center text-gray-400"><i class="fas fa-envelope mr-2 text-blue-500"></i>
                            support@careerconnect.com</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-6 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm mb-4 md:mb-0">© <span id="currentYear"></span> CareerConnect. All rights
                    reserved.</p>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white text-sm">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript for Counter Animation -->
    <script>
        // Counter animation
        const counters = document.querySelectorAll('.counter');
        const speed = 200;

        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;
                const increment = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(updateCount, 1);
                } else {
                    counter.innerText = target + '+';
                }
            }

            updateCount();
        });
        document.getElementById('currentYear').textContent = new Date().getFullYear();
    </script>
</body>

</html>