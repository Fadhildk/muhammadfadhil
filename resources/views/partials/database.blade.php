<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
    <div class="bg-cardBg p-5 rounded-xl border border-sidebarBorder flex flex-col justify-between h-28">
        <p class="text-xs text-gray-400 uppercase font-semibold">Total Users</p>
        <div class="flex items-center gap-3">
            <span class="text-2xl">👤</span>
            <h2 class="text-3xl font-bold">4500</h2>
        </div>
    </div>
    <div class="bg-cardBg p-5 rounded-xl border border-sidebarBorder flex flex-col justify-between h-28">
        <p class="text-xs text-gray-400 uppercase font-semibold">Active Users</p>
        <div class="flex items-center gap-3">
            <span class="text-2xl">👤</span>
            <h2 class="text-3xl font-bold">3500</h2>
        </div>
    </div>
    <div class="bg-cardBg p-5 rounded-xl border border-sidebarBorder flex flex-col justify-between h-28">
        <p class="text-xs text-gray-400 uppercase font-semibold">New Users</p>
        <div class="flex items-center gap-3">
            <span class="text-2xl">👤⁺</span>
            <h2 class="text-3xl font-bold">500</h2>
        </div>
    </div>
    <div class="bg-cardBg p-5 rounded-xl border border-sidebarBorder flex flex-col justify-between h-28 relative overflow-hidden">
        <p class="text-xs text-gray-400 uppercase font-semibold">Inactive Users</p>
        <div class="flex items-center gap-3">
             <span class="text-2xl relative z-10">🚫</span>
            <h2 class="text-3xl font-bold relative z-10">500</h2>
        </div>
        <div class="absolute right-0 bottom-0 h-16 w-16 bg-white/5 transform -rotate-45 translate-y-4 translate-x-4"></div>
    </div>
</div>

<div class="flex flex-col md:flex-row gap-4 justify-between items-center bg-cardBg p-4 rounded-xl border border-sidebarBorder">
    <div class="relative w-full md:w-1/2">
        <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">🔍</span>
        <input type="text" placeholder="Search by name, email, or ID" 
               class="w-full bg-[#1a1a2e] text-sm text-white rounded-lg py-3 pl-10 pr-4 placeholder-gray-500 focus:ring-1 focus:ring-accentBlue focus:outline-none border border-gray-700">
    </div>
    <div class="flex gap-3 w-full md:w-auto">
        <button class="flex items-center gap-2 px-6 py-3 bg-[#1a1a2e] border border-gray-700 rounded-lg text-sm text-gray-300 hover:text-white hover:border-gray-500 transition w-1/2 md:w-auto justify-center">
            <span>⚡</span> Sort by
        </button>
        <button class="flex items-center gap-2 px-6 py-3 bg-[#1a1a2e] border border-gray-700 rounded-lg text-sm text-gray-300 hover:text-white hover:border-gray-500 transition w-1/2 md:w-auto justify-center">
            <span>🔄</span> Refresh
        </button>
    </div>
</div>

<div class="bg-cardBg rounded-xl border border-sidebarBorder overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-gray-400 text-xs border-b border-gray-700">
                    <th class="px-6 py-4 font-semibold">User</th>
                    <th class="px-6 py-4 font-semibold">Contact</th>
                    <th class="px-6 py-4 font-semibold">Sleep Status</th>
                    <th class="px-6 py-4 font-semibold">Status</th>
                    <th class="px-6 py-4 font-semibold">Last Active</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700 text-sm">
                <tr class="hover:bg-white/5 transition">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full border border-gray-500 flex items-center justify-center bg-transparent">👤</div>
                            <div><p class="font-bold text-white">Alfonso de</p><p class="text-xs text-gray-500">ID #418230</p></div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col gap-1">
                            <div class="flex items-center gap-2 text-gray-300 text-xs"><span>✉️</span> alfonso.de@gmail.com</div>
                            <div class="flex items-center gap-2 text-gray-300 text-xs"><span>📞</span> +62123456789</div>
                        </div>
                    </td>
                    <td class="px-6 py-4"><p class="text-white">Avg. Sleep: 7.2h</p><p class="text-xs text-gray-500">Quality: 85%</p></td>
                    <td class="px-6 py-4"><span class="bg-accentBlue text-white text-[10px] px-3 py-1 rounded-full font-bold tracking-wide">Active</span></td>
                    <td class="px-6 py-4 text-gray-400 text-xs">2024-02-01<br>14:30</td>
                </tr>
                <tr class="hover:bg-white/5 transition">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full border border-gray-500 flex items-center justify-center bg-transparent">👤</div>
                            <div><p class="font-bold text-white">Alfonso de</p><p class="text-xs text-gray-500">ID #418230</p></div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col gap-1">
                            <div class="flex items-center gap-2 text-gray-300 text-xs"><span>✉️</span> alfonso.de@gmail.com</div>
                            <div class="flex items-center gap-2 text-gray-300 text-xs"><span>📞</span> +62123456789</div>
                        </div>
                    </td>
                    <td class="px-6 py-4"><p class="text-white">Avg. Sleep: 1.2h</p><p class="text-xs text-gray-500">Quality: 20%</p></td>
                    <td class="px-6 py-4"><span class="bg-red-500 text-white text-[10px] px-3 py-1 rounded-full font-bold tracking-wide">Not Active</span></td>
                    <td class="px-6 py-4 text-gray-400 text-xs">2024-02-01<br>14:30</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>