            <!-- ===== Sidebar Start ===== -->
            <aside :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
                class="sidebar fixed left-0 top-0 z-[9999] flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0">
                <!-- SIDEBAR HEADER -->
                <div :class="sidebarToggle ? 'justify-center' : 'justify-between'"
                    class="flex items-center gap-2 pt-8 sidebar-header pb-7">
                    <a>
                        <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
                            <img class="dark:hidden" src="{{ asset('images/logo/IMG20250919111349.png') }}" alt="Logo" />
                            <img class="hidden dark:block" src="{{ asset('images/logo/IMG20250919111349.png') }}" alt="Logo" />
                        </span>

                        <img class="logo-icon" :class="sidebarToggle ? 'lg:block' : 'hidden'"
                            src="{{ asset('images/logo/IMG20250919111349.png') }}" alt="Logo" />
                    </a>
                </div>  
                <!-- SIDEBAR HEADER -->

                <div class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar">
                    <!-- Sidebar Menu -->
                    <nav x-data="{ selected: $persist('Dashboard') }">
                        <!-- Menu Group -->
                        <div>
                            <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
                                <span class="menu-group-title" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    MENU
                                </span>

                                <svg :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
                                    class="mx-auto fill-current menu-group-icon" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
                                        fill="" />
                                </svg>
                            </h3>

                            <ul class="flex flex-col gap-4 mb-6">
                                <!-- Menu Item Dashboard -->
                                <li>
                                    <a href="{{ route('Dashboard_Pemilik') }}"
                                        @click.prevent="selected = (selected === 'Dashboard' ? '':'Dashboard'); window.location.href='{{ route('Dashboard_Pemilik') }}'"
                                        class="menu-item group"
                                        :class="(selected === 'Dashboard') ? 'menu-item-active' : 'menu-item-inactive'">
                                        <svg :class="(selected === 'Dashboard') ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z"
                                                fill="" />
                                        </svg>

                                        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                            Dashboard
                                        </span>
                                    </a>
                                </li>
                                <!-- Menu Item Dashboard -->

                                <!-- Menu Item Daftar Hewan -->
                                <li>
                                    <a href="{{ route('pemilik.hewan') }}"
                                        @click.prevent="selected = (selected === 'Daftar Hewan' ? '':'Daftar Hewan'); window.location.href='{{ route('pemilik.hewan') }}'"
                                        class="menu-item group"
                                        :class="(selected === 'Daftar Hewan') ? 'menu-item-active' : 'menu-item-inactive'">
                                        <svg :class="(selected === 'Daftar Hewan') ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <!-- Paw print icon (approximated/placeholder) -->
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" fill="currentColor"/>
                                            <circle cx="12" cy="12" r="3" fill="currentColor"/>
                                        </svg>
                                        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                            Daftar Hewan
                                        </span>
                                    </a>
                                </li>

                                <!-- Menu Item Daftar Reservasi -->
                                <li>
                                    <a href="{{ route('pemilik.reservasi') }}"
                                        @click.prevent="selected = (selected === 'Daftar Reservasi' ? '':'Daftar Reservasi'); window.location.href='{{ route('pemilik.reservasi') }}'"
                                        class="menu-item group"
                                        :class="(selected === 'Daftar Reservasi') ? 'menu-item-active' : 'menu-item-inactive'">
                                        <svg :class="(selected === 'Daftar Reservasi') ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <!-- Calendar icon -->
                                            <path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 002 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2zm-7 5h5v5h-5v-5z" fill="currentColor"/>
                                        </svg>
                                        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                            Daftar Reservasi
                                        </span>
                                    </a>
                                </li>

                                <!-- Menu Item Rekam Medis -->
                                <li>
                                    <a href="{{ route('pemilik.rekam_medis') }}"
                                        @click.prevent="selected = (selected === 'Rekam Medis' ? '':'Rekam Medis'); window.location.href='{{ route('pemilik.rekam_medis') }}'"
                                        class="menu-item group"
                                        :class="(selected === 'Rekam Medis') ? 'menu-item-active' : 'menu-item-inactive'">
                                        <svg :class="(selected === 'Rekam Medis') ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <!-- Clipboard/Medical icon -->
                                            <path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z" fill="currentColor"/>
                                        </svg>
                                        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                            Rekam Medis
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Sidebar Menu -->
                </div>
            </aside>
            <!-- ===== Sidebar End ===== -->