<div id="sidebar-overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden transition-opacity"></div>

<aside id="sidebar-menu" class="fixed md:relative inset-y-0 left-0 bg-[#232336] border-r border-sidebarBorder z-50 flex flex-col h-full transition-all duration-300 ease-in-out
    w-64 -translate-x-full md:translate-x-0 md:w-64 overflow-hidden">
    
    <div class="h-20 flex items-center justify-center border-b border-sidebarBorder gap-3 whitespace-nowrap px-4">
        <img src="{{ asset('image/logo.png') }}" alt="Sleepy Panda" class="w-8 h-8 object-contain shrink-0">
        <h1 class="text-xl font-bold tracking-wider text-white sidebar-text transition-opacity duration-300">Sleepy Panda</h1>
    </div>

    <nav class="flex-1 overflow-y-auto overflow-x-hidden py-6 px-4 space-y-2">
        
        <button id="btn-dashboard" onclick="switchTab('dashboard')" 
            class="nav-btn block w-full border border-gray-500 bg-white/10 text-white rounded-2xl py-3 text-center text-sm font-medium transition duration-200 whitespace-nowrap">
            Dashboard
        </button>

        <button id="btn-jurnal" onclick="switchTab('jurnal')" 
            class="nav-btn block w-full border border-gray-600 text-gray-400 rounded-2xl py-3 text-center text-sm font-medium hover:text-white hover:border-gray-500 transition duration-200 whitespace-nowrap">
            Jurnal
        </button>

        <button id="btn-report" onclick="switchTab('report')" 
            class="nav-btn block w-full border border-gray-600 text-gray-400 rounded-2xl py-3 text-center text-sm font-medium hover:text-white hover:border-gray-500 transition duration-200 whitespace-nowrap">
            Report
        </button>

        <button id="btn-database-parent" onclick="toggleSubmenu('submenu-database')" 
            class="nav-btn block w-full border border-gray-600 text-gray-400 rounded-2xl py-3 px-4 text-center text-sm font-medium hover:text-white hover:border-gray-500 transition duration-200 whitespace-nowrap relative">
            User Data
            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-xs opacity-50">▼</span>
        </button>

        <div id="submenu-database" class="hidden flex flex-col space-y-2 pl-4 mt-2 bg-black/10 rounded-2xl p-2 transition-all duration-300">
            
            <button id="btn-database" onclick="switchTab('database')" 
                class="nav-btn block w-full text-gray-400 hover:text-white text-sm py-2 text-left px-4 rounded-xl hover:bg-white/5 transition duration-200">
                • Update Data
            </button>
            
            <button id="btn-reset" onclick="switchTab('reset')" 
                class="nav-btn block w-full text-gray-400 hover:text-white text-sm py-2 text-left px-4 rounded-xl hover:bg-white/5 transition duration-200">
                • Reset Password
            </button>
        </div>

    </nav>

    <div class="p-4 border-t border-sidebarBorder">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center justify-center gap-2 w-full text-red-400 hover:text-red-300 hover:bg-white/5 py-3 rounded-xl transition whitespace-nowrap">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <span class="text-sm font-medium">Log Out</span>
            </button>
        </form>
    </div>

</aside>