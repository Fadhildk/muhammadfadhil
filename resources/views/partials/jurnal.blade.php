<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-cardBg p-6 rounded-2xl border border-sidebarBorder shadow-lg flex items-center gap-4">
        <div class="p-3 border border-gray-500 rounded-full text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 mb-1">Total Users</p>
            <h3 class="text-2xl font-bold text-white">4500</h3>
        </div>
    </div>

    <div class="bg-cardBg p-6 rounded-2xl border border-sidebarBorder shadow-lg flex items-center gap-4">
        <div class="p-3 border border-red-500 rounded-full text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 mb-1">Insomnia Cases</p>
            <h3 class="text-2xl font-bold text-white">900</h3>
        </div>
    </div>

    <div class="bg-cardBg p-6 rounded-2xl border border-sidebarBorder shadow-lg flex items-center gap-4">
        <div class="p-3 border border-white rounded-full text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 mb-1">Time to Sleep</p>
            <h3 class="text-2xl font-bold text-white">90 min</h3>
        </div>
    </div>

    <div class="bg-cardBg p-6 rounded-2xl border border-sidebarBorder shadow-lg flex items-center gap-4">
        <div class="p-3 border border-white rounded-full text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-400 mb-1">Average Sleep Time</p>
            <h3 class="text-2xl font-bold text-white">5.2 h</h3>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    
    <div class="lg:col-span-2 bg-[#232336] p-6 rounded-3xl border border-sidebarBorder shadow-lg flex flex-col relative">
        
        <div class="flex justify-end mb-4">
            <div class="relative">
                <select id="chartFilter" onchange="updateChart(this.value)" 
                        class="bg-[#2e2e42] text-white text-sm font-bold py-2 px-4 pr-8 rounded-lg appearance-none cursor-pointer focus:outline-none">
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
        </div>

        <div class="bg-[#2a2a40]/50 p-6 rounded-2xl flex-1 relative">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-gray-300 text-lg">Users</h3>
                <span class="text-xs text-gray-400 bg-white/10 px-2 py-1 rounded">12 Agustus - 18 Agustus 2023</span>
            </div>
            
            <div class="h-[350px]">
                <canvas id="mainChart"></canvas>
            </div>
        </div>
    </div>

    <div class="lg:col-span-1">
        <h3 class="text-xl font-bold text-white mb-4">Alert Insomnia Terbaru</h3>
        
        <div class="space-y-4 h-[500px] overflow-y-auto scrollbar-hide pr-2">
            
            <div class="bg-[#2e2e42] p-4 rounded-xl border border-gray-700 shadow-md">
                <div class="flex justify-between text-[10px] text-gray-400 mb-2">
                    <span>10 Agustus 2023</span>
                    <span>30 menit yang lalu</span>
                </div>
                <div class="flex items-start gap-3">
                    <div class="mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between mb-1">
                            <span class="text-xs text-white font-bold flex items-center gap-1">😁 User ID #12145</span>
                            <span class="text-[10px] text-gray-300 flex items-center gap-1">⏰ Avg Durasi: 1j 30m</span>
                        </div>
                        <p class="text-[11px] text-white font-medium text-center mt-2">Tidak Tidur selama 29 jam terakhir</p>
                    </div>
                </div>
            </div>

            <div class="bg-[#2e2e42] p-4 rounded-xl border border-gray-700 shadow-md">
                <div class="flex justify-between text-[10px] text-gray-400 mb-2">
                    <span>13 Agustus 2023</span>
                    <span>2 jam yang lalu</span>
                </div>
                <div class="flex items-start gap-3">
                    <div class="mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between mb-1">
                            <span class="text-xs text-white font-bold flex items-center gap-1">😁 User ID #17308</span>
                            <span class="text-[10px] text-gray-300 flex items-center gap-1">⏰ Avg Durasi: 1j 15m</span>
                        </div>
                        <p class="text-[11px] text-white font-medium text-center mt-2">Tidak Tidur selama 34 jam terakhir</p>
                    </div>
                </div>
            </div>

            <div class="bg-[#2e2e42] p-4 rounded-xl border border-gray-700 shadow-md">
                <div class="flex justify-between text-[10px] text-gray-400 mb-2">
                    <span>13 Agustus 2023</span>
                    <span>3 jam yang lalu</span>
                </div>
                <div class="flex items-start gap-3">
                    <div class="mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between mb-1">
                            <span class="text-xs text-white font-bold flex items-center gap-1">😁 User ID #18432</span>
                            <span class="text-[10px] text-gray-300 flex items-center gap-1">⏰ Avg Durasi: 1j 25m</span>
                        </div>
                        <p class="text-[11px] text-white font-medium text-center mt-2">Tidak Tidur selama 32 jam terakhir</p>
                    </div>
                </div>
            </div>

             <div class="bg-[#2e2e42] p-4 rounded-xl border border-gray-700 shadow-md">
                <div class="flex justify-between text-[10px] text-gray-400 mb-2">
                    <span>13 Agustus 2023</span>
                    <span>5 jam yang lalu</span>
                </div>
                <div class="flex items-start gap-3">
                    <div class="mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between mb-1">
                            <span class="text-xs text-white font-bold flex items-center gap-1">😁 User ID #28173</span>
                            <span class="text-[10px] text-gray-300 flex items-center gap-1">⏰ Avg Durasi: 1j 40m</span>
                        </div>
                        <p class="text-[11px] text-white font-medium text-center mt-2">Tidak Tidur selama 36 jam terakhir</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    let mainChartInstance = null;

    // Data Dummy untuk masing-masing filter
    const chartData = {
        'daily': {
            labels: ['22:00', '23:00', '00:00', '01:00', '02:00', '03:00', '03:00'],
            data: [900, 300, 900, 2200, 1900, 900, 500]
        },
        'weekly': {
            labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            data: [500, 700, 400, 900, 700, 700, 400]
        },
        'monthly': {
            labels: ['22:00', '23:00', '00:00', '01:00', '02:00', '03:00', '03:00'],
            data: [900, 300, 900, 2200, 1900, 900, 500] 
        }
    };

    function initChart(type = 'daily') {
        const ctx = document.getElementById('mainChart').getContext('2d');
        const currentData = chartData[type];

        // Hancurkan chart lama jika ada
        if (mainChartInstance) {
            mainChartInstance.destroy();
        }

        mainChartInstance = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: currentData.labels,
                datasets: [{
                    label: 'Users',
                    data: currentData.data,
                    backgroundColor: function(context) {
                        // Highlight warna merah cerah, sisanya merah agak gelap
                        const value = context.raw;
                        const max = Math.max(...currentData.data);
                        return value === max ? '#ef4444' : '#cd4a54'; // Tailwind red-500 variant
                    },
                    borderRadius: 4,
                    barThickness: 30,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { display: false },
                        ticks: { color: '#a0a0b0', font: { size: 12 } },
                        border: { display: false }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: '#a0a0b0', font: { size: 12 } },
                        border: { display: false }
                    }
                }
            }
        });
    }

    // Fungsi update saat dropdown berubah
    function updateChart(value) {
        initChart(value);
    }

    // Jalankan pertama kali (Delay dikit biar aman)
    setTimeout(() => {
        initChart('daily');
    }, 300);
</script>