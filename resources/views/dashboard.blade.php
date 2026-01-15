<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Site - Sleepy Panda</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        mainBg: '#1a1a2e', 
                        cardBg: '#232336', 
                        accentPink: '#e94560',  
                        accentBlue: '#3e65f2', 
                        textMuted: '#a0a0b0', 
                        sidebarBorder: '#2e2e42' 
                    },
                    fontFamily: { sans: ['Poppins', 'sans-serif'] }
                }
            }
        }
    </script>
    <style>
        body { background-color: #1a1a2e; color: white; }
        .fade-enter { animation: fadeIn 0.4s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        /* Hilangkan scrollbar tapi tetap bisa scroll */
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-mainBg font-sans text-white h-screen overflow-hidden flex flex-col">

    @include('partials.sidebar')

    <main class="flex-1 h-full overflow-y-auto p-6 md:p-8 w-full relative">
        
        <header class="flex items-center justify-between mb-8 relative z-40">
            <div class="flex items-center gap-4">
                <button onclick="toggleSidebar()" class="text-3xl focus:outline-none hover:text-accentBlue transition p-2 border border-transparent hover:border-gray-600 rounded">
                    ☰
                </button>
                
                <div class="flex items-center gap-3">
                    <img src="{{ asset('image/logo.png') }}" alt="Sleepy Panda Logo" class="w-10 h-10 object-contain">
                    <h2 class="text-2xl font-bold tracking-wide hidden sm:block">Sleepy Panda</h2>
                </div>
            </div>

            <div class="hidden md:block relative w-1/3 max-w-sm">
                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-textMuted">🔍</span>
                <input type="text" placeholder="Search" class="w-full bg-[#232336] text-sm text-white rounded-full py-3 pl-12 pr-4 placeholder-textMuted focus:ring-2 focus:ring-accentBlue transition focus:outline-none">
            </div>

            <div class="relative">
                <button onclick="toggleProfileMenu()" class="flex items-center gap-4 focus:outline-none hover:opacity-80 transition">
                    <div class="w-10 h-10 bg-gray-300 rounded-full overflow-hidden border border-gray-600">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random&color=fff" alt="Avatar">
                    </div>
                    <div class="hidden sm:block text-right">
                        <p class="text-xs text-textMuted">Halo,</p>
                        <p class="font-medium text-white flex items-center gap-1">
                            {{ Auth::user()->name }} 
                            <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </p>
                    </div>
                </button>
            
                <div id="profile-menu" class="hidden absolute right-0 mt-2 w-48 bg-[#232336] border border-gray-700 rounded-xl shadow-2xl overflow-hidden animate-fadeIn">
                    <div class="px-4 py-3 border-b border-gray-700 md:hidden">
                        <p class="text-sm text-white font-bold">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-400">{{ Auth::user()->email }}</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-3 text-sm text-red-400 hover:bg-white/5 hover:text-red-300 transition flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <div id="content-dashboard" class="tab-content fade-enter">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-cardBg p-5 rounded-2xl h-48 border border-sidebarBorder relative">
                    <h3 class="absolute top-4 left-5 text-gray-400 text-sm">Daily Report</h3>
                    <div class="h-full w-full pt-6"><canvas id="dailyChart"></canvas></div>
                </div>
                <div class="bg-cardBg p-5 rounded-2xl h-48 border border-sidebarBorder relative">
                    <h3 class="absolute top-4 left-5 text-gray-400 text-sm">Weekly Report</h3>
                    <div class="h-full w-full pt-6"><canvas id="weeklyChart"></canvas></div>
                </div>
                <div class="bg-cardBg p-5 rounded-2xl h-48 border border-sidebarBorder relative">
                    <h3 class="absolute top-4 left-5 text-gray-400 text-sm">Monthly Report</h3>
                    <div class="h-full w-full pt-6"><canvas id="monthlyChart"></canvas></div>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-6 mb-6">
                <div class="bg-cardBg p-6 rounded-2xl border border-sidebarBorder"><h2 class="text-2xl font-bold">4500</h2><p class="text-xs text-textMuted">Total Users</p></div>
                <div class="bg-cardBg p-6 rounded-2xl border border-sidebarBorder"><h2 class="text-2xl font-bold">2000</h2><p class="text-xs text-textMuted">Female</p></div>
                <div class="bg-cardBg p-6 rounded-2xl border border-sidebarBorder"><h2 class="text-2xl font-bold">2500</h2><p class="text-xs text-textMuted">Male</p></div>
                <div class="bg-cardBg p-6 rounded-2xl border border-sidebarBorder"><h2 class="text-2xl font-bold">154.2</h2><p class="text-xs text-textMuted">Avg Time</p></div>
            </div>
            <div class="bg-cardBg p-6 rounded-2xl h-72 border border-sidebarBorder relative">
                <h3 class="absolute top-6 left-6 text-gray-400 text-sm">Average Users Sleep Time</h3>
                <div class="h-full w-full pt-8"><canvas id="sleepLineChart"></canvas></div>
            </div>
        </div>

        <div id="content-jurnal" class="tab-content hidden fade-enter">
            @include('partials.jurnal')
        </div>

        <div id="content-report" class="tab-content hidden fade-enter">
            <div class="bg-cardBg p-20 rounded-2xl text-center border border-sidebarBorder">
                <span class="text-5xl">📊</span><h2 class="text-2xl mt-4">Report Page</h2>
                <p class="text-gray-400">Halaman laporan akan ditampilkan di sini.</p>
            </div>
        </div>

        <div id="content-database" class="tab-content hidden fade-enter space-y-6">
            @include('partials.database')
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // 1. PROFILE MENU
        function toggleProfileMenu() {
            const menu = document.getElementById('profile-menu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        }
        window.addEventListener('click', function(e) {
            const menu = document.getElementById('profile-menu');
            const button = document.querySelector('button[onclick="toggleProfileMenu()"]');
            if (menu && !menu.contains(e.target) && !button.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });

        // 2. SIDEBAR
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar-menu');
            const overlay = document.getElementById('sidebar-overlay');
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full'); 
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }

        // 3. TABS
        function switchTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
            const target = document.getElementById('content-' + tabName);
            if(target) target.classList.remove('hidden');

            const mainButtons = ['btn-dashboard', 'btn-jurnal', 'btn-report', 'btn-database'];
            mainButtons.forEach(id => {
                const btn = document.getElementById(id);
                if(btn) btn.className = 'nav-btn block w-full border border-gray-600 text-gray-400 rounded-2xl py-3 text-center text-sm font-medium hover:text-white hover:border-gray-500 transition duration-200';
            });

            const activeBtn = document.getElementById('btn-' + tabName);
            if(activeBtn) {
                activeBtn.className = 'nav-btn block w-full border border-gray-500 bg-white/10 text-white rounded-2xl py-3 text-center text-sm font-medium transition duration-200';
            }
        }

        // 4. SUBMENU
        function toggleSubmenu(id) {
            const submenu = document.getElementById(id);
            if (submenu) {
                if (submenu.classList.contains('hidden')) {
                    submenu.classList.remove('hidden');
                } else {
                    submenu.classList.add('hidden');
                }
            }
        }

        // 5. CHART DASHBOARD
        document.addEventListener("DOMContentLoaded", function() {
            Chart.defaults.color = '#a0a0b0'; 
            Chart.defaults.borderColor = '#2e2e42'; 
            const pink = '#e94560'; 
            const blue = '#3e65f2';
            const barOpt = { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, grid: { borderDash: [2, 4] } }, x: { grid: { display: false } } } };

            if(document.getElementById('dailyChart')) {
                new Chart(document.getElementById('dailyChart'), { type: 'bar', data: { labels: ['S', 'S', 'R', 'K', 'J', 'S', 'M'], datasets: [{ data: [2100, 1800, 1500, 2200, 2000, 500, 800], backgroundColor: pink, borderRadius: 4 }, { data: [1200, 2100, 1900, 2400, 800, 1200, 900], backgroundColor: blue, borderRadius: 4 }] }, options: barOpt });
                new Chart(document.getElementById('weeklyChart'), { type: 'bar', data: { labels: ['W1', 'W2', 'W3', 'W4'], datasets: [{ data: [2100, 1800, 1200, 2100], backgroundColor: pink, borderRadius: 4 }, { data: [1000, 2000, 1800, 2300], backgroundColor: blue, borderRadius: 4 }] }, options: barOpt });
                new Chart(document.getElementById('monthlyChart'), { type: 'bar', data: { labels: ['J', 'F', 'M', 'A', 'M', 'J', 'J', 'A', 'S', 'O'], datasets: [{ data: [2200, 1900, 1700, 2200, 1500, 2100, 1000, 1900, 1500, 1900], backgroundColor: pink, borderRadius: 4 }, { data: [1600, 2100, 1900, 2400, 1700, 300, 1600, 1900, 1400, 1950], backgroundColor: blue, borderRadius: 4 }] }, options: barOpt });
                new Chart(document.getElementById('sleepLineChart'), { type: 'line', data: { labels: ['Jan 01', 'Jan 02', 'Jan 03', 'Jan 04', 'Jan 05', 'Jan 06'], datasets: [{ label: 'F', data: [15, 25, 50, 40, 70, 45], borderColor: pink, borderWidth: 2, pointRadius: 0 }, { label: 'M', data: [40, 25, 80, 50, 60, 85], borderColor: blue, borderWidth: 2, pointRadius: 0 }] }, options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: true } }, scales: { y: { beginAtZero: true, grid: { borderDash: [2, 4] } }, x: { grid: { display: false } } } } });
            }
        });
    </script>
</body>
</html>