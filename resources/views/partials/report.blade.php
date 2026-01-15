<div class="w-full flex flex-col gap-6">

    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold tracking-wide text-white">Jurnal Tidur Report</h2>
            <p class="text-xs text-textMuted mt-1">Analisis mendalam aktivitas tidur pengguna</p>
        </div>
        
        <div class="relative">
            <select class="appearance-none bg-cardBg border border-sidebarBorder text-white text-sm rounded-xl px-4 py-2 pr-8 focus:outline-none focus:border-accentBlue transition cursor-pointer">
                <option>Daily</option>
                <option>Weekly</option>
                <option>Monthly</option>
            </select>
            <div class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none text-gray-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        <div class="lg:col-span-4 flex flex-col gap-4 h-[500px] overflow-y-auto pr-2 custom-scrollbar">
            
            <div class="bg-cardBg p-5 rounded-2xl border border-sidebarBorder hover:border-gray-600 transition group cursor-pointer">
                <p class="text-xs text-center text-gray-400 mb-3 border-b border-gray-700 pb-2">12 Agustus 2023</p>
                <div class="flex items-center justify-between">
                    <div class="flex flex-col items-center gap-1 mr-4">
                        <span class="text-2xl">😴</span>
                        <div class="text-center">
                            <p class="text-[10px] text-gray-500 uppercase">User</p>
                            <p class="text-lg font-bold text-white">1000</p>
                        </div>
                    </div>
                    <div class="flex-1 grid grid-cols-1 gap-2 border-l border-gray-700 pl-4">
                        <div class="flex items-center gap-2">
                            <span class="text-red-400 text-lg">⏰</span>
                            <div>
                                <p class="text-[10px] text-gray-400">Avg Durasi</p>
                                <p class="text-sm font-semibold text-white">7j 2m</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-yellow-400 text-lg">⭐</span>
                            <div>
                                <p class="text-[10px] text-gray-400">Avg Waktu</p>
                                <p class="text-sm font-semibold text-white">21:30 - 06:10</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-cardBg p-5 rounded-2xl border border-sidebarBorder hover:border-gray-600 transition group cursor-pointer opacity-80 hover:opacity-100">
                <p class="text-xs text-center text-gray-400 mb-3 border-b border-gray-700 pb-2">11 Agustus 2023</p>
                <div class="flex items-center justify-between">
                    <div class="flex flex-col items-center gap-1 mr-4">
                        <span class="text-2xl">😴</span>
                        <div class="text-center">
                            <p class="text-[10px] text-gray-500 uppercase">User</p>
                            <p class="text-lg font-bold text-white">950</p>
                        </div>
                    </div>
                    <div class="flex-1 grid grid-cols-1 gap-2 border-l border-gray-700 pl-4">
                        <div class="flex items-center gap-2">
                            <span class="text-red-400 text-lg">⏰</span>
                            <div>
                                <p class="text-[10px] text-gray-400">Avg Durasi</p>
                                <p class="text-sm font-semibold text-white">6j 45m</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-yellow-400 text-lg">⭐</span>
                            <div>
                                <p class="text-[10px] text-gray-400">Avg Waktu</p>
                                <p class="text-sm font-semibold text-white">22:00 - 05:45</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-cardBg p-5 rounded-2xl border border-sidebarBorder hover:border-gray-600 transition group cursor-pointer opacity-80 hover:opacity-100">
                <p class="text-xs text-center text-gray-400 mb-3 border-b border-gray-700 pb-2">10 Agustus 2023</p>
                <div class="flex items-center justify-between">
                    <div class="flex flex-col items-center gap-1 mr-4">
                        <span class="text-2xl">😴</span>
                        <div class="text-center">
                            <p class="text-[10px] text-gray-500 uppercase">User</p>
                            <p class="text-lg font-bold text-white">1020</p>
                        </div>
                    </div>
                    <div class="flex-1 grid grid-cols-1 gap-2 border-l border-gray-700 pl-4">
                        <div class="flex items-center gap-2">
                            <span class="text-red-400 text-lg">⏰</span>
                            <div>
                                <p class="text-[10px] text-gray-400">Avg Durasi</p>
                                <p class="text-sm font-semibold text-white">7j 15m</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-yellow-400 text-lg">⭐</span>
                            <div>
                                <p class="text-[10px] text-gray-400">Avg Waktu</p>
                                <p class="text-sm font-semibold text-white">21:15 - 05:30</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="lg:col-span-8 bg-cardBg p-6 rounded-2xl border border-sidebarBorder h-[500px] relative flex flex-col">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-200">Users Sleep Trends</h3>
                <span class="text-xs text-gray-400 bg-white/5 px-3 py-1 rounded-full">12 Agustus 2023</span>
            </div>
            
            <div class="flex-1 w-full relative">
                <canvas id="reportMainChart"></canvas>
            </div>
        </div>

    </div>
</div>

<script>
    // Kita jalankan saat user membuka tab report atau saat load
    document.addEventListener("DOMContentLoaded", function() {
        const ctxReport = document.getElementById('reportMainChart');
        if (ctxReport) {
            new Chart(ctxReport, {
                type: 'line', // Ganti 'bar' jika ingin diagram batang
                data: {
                    labels: ['00:00', '04:00', '08:00', '12:00', '16:00', '20:00', '23:59'],
                    datasets: [{
                        label: 'Active Users',
                        data: [10, 800, 100, 100, 50, 100, 2400],
                        borderColor: '#fbbf24', // Warna Kuning Emas sesuai screenshot
                        backgroundColor: 'rgba(251, 191, 36, 0.1)',
                        borderWidth: 2,
                        tension: 0, // Garis lurus patah-patah sesuai screenshot
                        pointBackgroundColor: '#fff',
                        pointBorderColor: '#fbbf24',
                        pointRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false } // Hilangkan legend biar bersih
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: '#2e2e42' },
                            ticks: { color: '#a0a0b0' }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { color: '#a0a0b0' }
                        }
                    }
                }
            });
        }
    });
</script>