@extends('layouts.admin')

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-gray-800 dark:text-white">
                Dashboard Overview
            </h2>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                Ringkasan data sistem informasi klinik hewan
            </p>
        </div>

        {{-- Statistics Grid --}}
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 2xl:gap-7.5">
            {{-- Card 1: Total User --}}
            <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900">
                <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-900/50 dark:text-blue-400">
                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" fill="" />
                        <path opacity="0.5" d="M12.0002 14.5C6.99016 14.5 2.91016 17.86 2.91016 22H21.0902C21.0902 17.86 17.0102 14.5 12.0002 14.5Z" fill="" />
                    </svg>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            {{ $totalUsers }}
                        </h4>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Users</span>
                    </div>
                </div>
            </div>

            {{-- Card 2: Total Roles --}}
            <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900">
                <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-green-50 text-green-600 dark:bg-green-900/50 dark:text-green-400">
                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.25 5.5H19.5V4.75C19.5 3.37125 18.3787 2.25 17 2.25H7C5.62132 2.25 4.5 3.37125 4.5 4.75V5.5H3.75C2.37132 5.5 1.25 6.62125 1.25 8V17C1.25 18.3787 2.37132 19.5 3.75 19.5H4.5V20.25C4.5 21.6288 5.62132 22.75 7 22.75H17C18.3787 22.75 19.5 21.6288 19.5 20.25V19.5H20.25C21.6287 19.5 22.75 18.3787 22.75 17V8C22.75 6.62125 21.6287 5.5 20.25 5.5ZM17.5 20.25C17.5 20.5256 17.2756 20.75 17 20.75H7C6.72437 20.75 6.5 20.5256 6.5 20.25V4.75C6.5 4.47437 6.72437 4.25 7 4.25H17C17.2756 4.25 17.5 4.47437 17.5 4.75V20.25Z" fill=""/>
                    </svg>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            {{ $totalRoles }}
                        </h4>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Roles</span>
                    </div>
                </div>
            </div>

            {{-- Card 3: Total Dokter --}}
            <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900">
                <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-teal-50 text-teal-600 dark:bg-teal-900/50 dark:text-teal-400">
                    <span class="text-xl">👨‍⚕️</span>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            {{ $totalDokter }}
                        </h4>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Dokter</span>
                    </div>
                </div>
            </div>

            {{-- Card 4: Total Pemilik --}}
            <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900">
                <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-red-50 text-red-600 dark:bg-red-900/50 dark:text-red-400">
                    <span class="text-xl">📋</span>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            {{ $totalPemilik }}
                        </h4>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Pemilik</span>
                    </div>
                </div>
            </div>

            {{-- Card 5: Total Hewan --}}
            <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900">
                <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-purple-50 text-purple-600 dark:bg-purple-900/50 dark:text-purple-400">
                    <span class="text-xl">🐾</span>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            {{ $totalHewan }}
                        </h4>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Hewan</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Charts Section --}}
        <div class="mt-7.5 grid grid-cols-12 gap-4 md:gap-6 2xl:gap-7.5">
            {{-- Chart 1: User Roles Distribution --}}
            <div class="col-span-12 rounded-sm border border-gray-200 bg-white px-5 pt-7.5 pb-5 shadow-default dark:border-gray-800 dark:bg-gray-900 sm:px-7.5 xl:col-span-6">
                <div class="mb-3 justify-between gap-4 sm:flex">
                    <div>
                        <h5 class="text-xl font-bold text-black dark:text-white">
                            Distribusi Role User
                        </h5>
                    </div>
                </div>
                <div class="mb-2">
                    <div id="chartOne" class="mx-auto flex justify-center"></div>
                </div>
            </div>

            {{-- Chart 2: Pet Types Distribution --}}
            <div class="col-span-12 rounded-sm border border-gray-200 bg-white px-5 pt-7.5 pb-5 shadow-default dark:border-gray-800 dark:bg-gray-900 sm:px-7.5 xl:col-span-6">
                <div class="mb-3 justify-between gap-4 sm:flex">
                    <div>
                        <h5 class="text-xl font-bold text-black dark:text-white">
                            Populasi Hewan per Jenis
                        </h5>
                    </div>
                </div>
                <div class="mb-2">
                    <div id="chartTwo" class="mx-auto flex justify-center"></div>
                </div>
            </div>
        </div>

        {{-- Chart 3: Appointment Trend (Full Width) --}}
        <div class="mt-4 rounded-sm border border-gray-200 bg-white px-5 pt-7.5 pb-5 shadow-default dark:border-gray-800 dark:bg-gray-900 sm:px-7.5">
            <div class="mb-3 justify-between gap-4 sm:flex">
                <div>
                    <h5 class="text-xl font-bold text-black dark:text-white">
                        Statistik Temu Dokter (Reservasi)
                    </h5>
                    <p class="text-sm font-medium text-gray-500">Tren reservasi 7 hari terakhir</p>
                </div>
            </div>
            <div class="mb-2">
                <div id="chartThree" class="mx-auto flex justify-center"></div>
            </div>
        </div>

        {{-- Welcome Section --}}
        <div class="mt-8 rounded-3xl border border-gray-200 bg-white p-8 shadow-default dark:border-gray-800 dark:bg-gray-900">
            <div class="flex flex-col gap-4">
                <h3 class="text-2xl font-bold text-black dark:text-white">
                    Selamat Datang kembali, {{ Auth::user()->nama }}! 👋
                </h3>
                <p class="font-medium text-gray-500 dark:text-gray-400">
                    Ini adalah halaman dashboard administrator Anda. Anda dapat mengelola data master, pengguna, dan konfigurasi sistem lainnya melalui menu <a href="{{ route('data_master') }}" class="text-primary hover:underline">Data Master</a>.
                </p>
                <div class="mt-4">
                     <a href="{{ route('data_master') }}" class="inline-flex items-center justify-center rounded-lg bg-primary px-10 py-4 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
                        Ke Data Master
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- ApexCharts Script --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Chart 1: User Roles
            var userRolesData = @json($userRoles);
            var roleLabels = userRolesData.map(item => item.nama_role);
            var roleSeries = userRolesData.map(item => item.total);

            var options1 = {
                series: roleSeries,
                chart: {
                    type: 'donut',
                    width: 380,
                },
                labels: roleLabels,
                colors: ['#3C50E0', '#80CAEE', '#10B981', '#FFBA00', '#FF6766'],
                legend: {
                    position: 'bottom',
                    itemMargin: {
                        horizontal: 10,
                        vertical: 5
                    }
                },
                responsive: [{
                    breakpoint: 640,
                    options: {
                        chart: {
                            width: 300
                        },
                    }
                }]
            };

            var chart1 = new ApexCharts(document.querySelector("#chartOne"), options1);
            chart1.render();

            // Chart 2: Pet Types
            var petTypesData = @json($petTypes);
            var petLabels = petTypesData.map(item => item.nama_jenis_hewan);
            var petSeries = petTypesData.map(item => item.total);

            var options2 = {
                series: [{
                    name: 'Jumlah Hewan',
                    data: petSeries
                }],
                chart: {
                    type: 'bar',
                    height: 350,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: petLabels,
                },
                fill: {
                    opacity: 1,
                    colors: ['#3C50E0']
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val + " Ekor"
                        }
                    }
                }
            };

            var chart2 = new ApexCharts(document.querySelector("#chartTwo"), options2);
            chart2.render();

            // Chart 3: Appointments Trend
            var appointmentData = @json($appointments);
            var appointmentDates = appointmentData.map(item => item.date);
            var appointmentTotals = appointmentData.map(item => item.total);

            var options3 = {
                series: [{
                    name: "Reservasi",
                    data: appointmentTotals
                }],
                chart: {
                    type: 'area', // Area chart for trend
                    height: 350,
                    zoom: {
                        enabled: false
                    },
                    toolbar: {
                        show: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    categories: appointmentDates,
                    type: 'datetime'
                },
                yaxis: {
                    opposite: false
                },
                legend: {
                    horizontalAlign: 'left'
                },
                colors: ['#10B981'], // Green color
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.7,
                        opacityTo: 0.9,
                        stops: [0, 90, 100]
                    }
                },
                tooltip: {
                    x: {
                        format: 'dd MMM yyyy'
                    }
                }
            };

            var chart3 = new ApexCharts(document.querySelector("#chartThree"), options3);
            chart3.render();
        });
    </script>
@endsection