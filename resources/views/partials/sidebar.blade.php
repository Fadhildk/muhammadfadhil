<aside id="sidebar-menu" class="fixed left-0 top-0 w-64 h-full bg-mainBg border-r border-sidebarBorder flex flex-col p-6 z-50 transform -translate-x-full transition-transform duration-300 ease-in-out shadow-2xl">
    
    <div class="flex justify-between items-center mb-10">
        <h1 class="text-2xl font-bold tracking-wide text-white">Admin Site</h1>
        <button onclick="toggleSidebar()" class="text-gray-400 hover:text-white text-2xl focus:outline-none">
            &times;
        </button>
    </div>

    <nav class="space-y-4 w-full h-full overflow-y-auto pb-10 scrollbar-hide">
        
        <button onclick="switchTab('dashboard')" id="btn-dashboard" 
            class="nav-btn block w-full border border-gray-500 bg-white/10 text-white rounded-2xl py-3 text-center text-sm font-medium transition duration-200">
            Dashboard
        </button>
        
        <button onclick="switchTab('jurnal')" id="btn-jurnal" 
            class="nav-btn block w-full border border-gray-600 text-gray-400 rounded-2xl py-3 text-center text-sm font-medium hover:text-white hover:border-gray-500 transition duration-200">
            Jurnal
        </button>
        
        <button onclick="switchTab('report')" id="btn-report" 
            class="nav-btn block w-full border border-gray-600 text-gray-400 rounded-2xl py-3 text-center text-sm font-medium hover:text-white hover:border-gray-500 transition duration-200">
            Report
        </button>
        
        <button onclick="switchTab('database'); toggleSubmenu('submenu-database')" id="btn-database" 
            class="nav-btn block w-full border border-gray-600 text-gray-400 rounded-2xl py-3 text-center text-sm font-medium hover:text-white hover:border-gray-500 transition duration-200">
            Database User
        </button>

        <div id="submenu-database" class="hidden space-y-4 animate-fadeIn">
             
             <button class="nav-btn block w-full border border-gray-600 text-gray-400 rounded-2xl py-3 text-center text-sm font-medium hover:text-white hover:border-gray-500 transition duration-200">
                Update Data
            </button>
            
            <button class="nav-btn block w-full border border-gray-600 text-gray-400 rounded-2xl py-3 text-center text-sm font-medium hover:text-white hover:border-gray-500 transition duration-200">
                Reset Password
            </button>

        </div>
    </nav>
</aside>

<div id="sidebar-overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden transition-opacity duration-300"></div>

<style>
    .animate-fadeIn { animation: fadeIn 0.3s ease-in-out; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
    .scrollbar-hide::-webkit-scrollbar { display: none; }
</style>